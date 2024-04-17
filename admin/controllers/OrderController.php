<?php
function ordersList()
{
    $title = "Danh sách đơn hàng có trên hệ thống";
    $view = "orders/indexView";
    $script = "../scripts/data-table";
    $script2 = "../scripts/drop-zone";
    $style = "../styles/data-table";
    $style2 = "../styles/select";
    $orders = listAll('orders');

    if (!empty($_POST)) {
        $id = $_POST['id'];
        $status = $_POST['status'];
        debug($status);
        $data = [
            'status' => $_POST['status'],
        ];
        update('orders', $id, $data);
        $_SESSION['success'] = 'Cập nhật trạng thái thành công';
        redirect(BASE_URL_ADMIN . "?action=orders-list");
    }

    require_once PATH_VIEW_ADMIN  . "layout/master.php";
}

function orderDetail()
{
    $id = $_GET['order_id'];
    $orderDetail = showOrderDetail($id);
    // debug($orderDetail);
    $orderByCustomer = orderByCustomer($id);

    if (empty($orderDetail)) {
        e404();
    }

    $title = "Chi tiết đơn hàng: #" .  $orderByCustomer['order_code'];
    $view = "orders/showView";
    $script = "../scripts/data-table";
    $style = "../styles/data-table";

    if (!empty($_POST)) {

        // Lấy dữ liệu từ form 
        $data = [
            'full_name' => $_POST['full_name'] ?? $orderDetail['full_name'],
            'phone' => $_POST['phone'] ?? $orderByCustomer['phone'],
            'province' => $_POST['province'] ?? $orderByCustomer['province'],
            'district' => $_POST['district'] ?? $orderByCustomer['district'],
            'ward' => $_POST['ward'] ?? $orderByCustomer['ward'],
            'email' => $_POST['email'] ?? $orderByCustomer['email'],
            'note' => $_POST['note'] ?? $orderByCustomer['note'],
            'total_money' => $orderByCustomer['total_money'],
            'status_delivery' => $_POST['status_delivery'] ?? $orderByCustomer['status_delivery'],
            'updated_at' => date('Y-m-d H:i:s')
        ];

        // Trạng thái của đơn hàng hiện tại trên hệ thống
        $checkStatus =  $orderByCustomer['status_delivery'];

        $arrStatus = [
            1 => [0, 1, 2, 3, 4],
            2 => [2, 3, 4],
            3 => [3, 4],
            4 => [4],
            0 => [0]
        ];

        if (in_array($data['status_delivery'], $arrStatus[$checkStatus])) {
            try {
                $GLOBALS['conn']->beginTransaction();

                // Nếu trạng thái là 1 và 2 thì cho phép cập nhật toàn bộ thông tin đơn hàng
                if ($checkStatus == 1 || $checkStatus == 2) {
                    update('orders', $id, $data);
                    $newTotal = 0;
                    foreach ($orderDetail as $order) {
                        $orderDetailID =  $order['od_id'];
                        $currentQuantity = getQuantityOrder($orderDetailID);
                        // LẤY GIÁ THEO ORDER ID CỦA SẢN PHẨM
                        $quantity = $_POST['quantity'][$orderDetailID] ?? $order['od_quantity'];
                        $dataOrderDetail = [
                            'quantity' => $quantity,
                            'updated_at' => date('Y-m-d H:i:s')
                        ];

                        if ($quantity !== $currentQuantity) {
                            $newQuantity = $quantity - $currentQuantity;
                            downProductQuantity($order['p_id'], $order['od_size_id'], $order['od_color_id'], $newQuantity);
                        }

                        update('order_detail', $orderDetailID, $dataOrderDetail);
                        $subTotal = $order['od_price'] * $quantity;
                        $newTotal += $subTotal;
                    }

                    if ($newTotal !== $orderByCustomer['total_money']) {
                        $data['total_money'] = $newTotal - $orderByCustomer['reduced'];
                        update('orders', $id, $data);
                    }
                } elseif ($checkStatus == 3 || $checkStatus == 4) { // Nếu là 3 hoặc 4 thì chỉ cho phép cập nhật trạng thái
                    $data = [
                        'status_delivery' => $_POST['status_delivery'] ?? $orderByCustomer['status_delivery'],
                        'updated_at' => date('Y-m-d H:i:s')
                    ];
                    update('orders', $id, $data);
                }

                if ($_POST['status_delivery'] == 4) {
                    $data = [
                        'payment_status' => 1,
                        'updated_at' => date('Y-m-d H:i:s')
                    ];
                    update('orders', $id, $data);
                }

                $GLOBALS['conn']->commit();


                $_SESSION['success'] = 'Cập nhật đơn hàng thành công';
                redirect(BASE_URL_ADMIN . "?action=order-detail&order_id=$id");
            } catch (\Throwable $th) {
                $GLOBALS['conn']->rollBack();
                debug($th);
            }
        } else {
            $_SESSION['errors'] = 'Đơn hàng đang được giao hoặc giao thành công, không thể cập nhật thông tin';
            redirect(BASE_URL_ADMIN . "?action=order-detail&order_id=$id");
            exit();
        }
    }
    $products = listAll('products');
    $sizes = listAll('product_size');
    $colors = listAll('product_color');
    require_once PATH_VIEW_ADMIN  . "layout/master.php";
}

// XEM HÓA ĐƠN
function completePayment()
{
    $id = $_GET['order_id'];
    $orderDetail = showOrderDetail($id);
    $orderByCustomer = orderByCustomer($id);

    if (empty($orderDetail)) {
        e404();
    }

    $title = "Chi tiết đơn hàng: #" .  $orderByCustomer['order_code'];
    $view = "orders/complete-payment";
    $script = "../scripts/data-table";
    $style = "../styles/data-table";
    require_once PATH_VIEW_ADMIN  . "layout/master.php";
}

// THÊM SẢN PHẨM VÀO GIỎ HÀNG ADMIN
function addCart()
{

    if (!empty($_POST)) {

        $data = [
            'product_id' => $_POST['p_id'] ?? null,
            'quantity' => $_POST['quantity'] ?? null,
            'size' => $_POST['size'] ?? null,
            'color' => $_POST['color'] ?? null,
            'created_at' => date('Y-m-d H:i:s')
        ];

        if (!empty($_SESSION['user'])) {
            try {
                $GLOBALS['conn']->beginTransaction();

                $user = $_SESSION['user']['id'];

                $dataUserCart = [
                    'user_id' => $user,
                    'created_at' => date('Y-m-d H:i:s')
                ];

                $cartId = insert_get_last_id('carts', $dataUserCart);

                // $cartId = getCartIDAdmin($_SESSION['user']['id']);

                if (!empty($cartId)) {
                    $dataCartItem = [
                        'cart_id' => $cartId ?? null,
                        'product_id' => $data['product_id'] ?? null,
                        'quantity' => $data['quantity'] ?? null,
                        'size' => $data['size'] ?? null,
                        'color' => $data['color'] ?? null,
                        'created_at' => date('Y-m-d H:i:s'),
                    ];

                    insert('cart_items', $dataCartItem);
                }

                $GLOBALS['conn']->commit();
                $_SESSION['success'] = 'Thêm sản phẩm vào giỏ hàng thành công';
                redirect(BASE_URL_ADMIN . "?action=cart-view");
                exit();
            } catch (Exception $e) {
                $GLOBALS['conn']->rollBack();
                debug($e);
            }
        }
    }
    require_once PATH_VIEW_ADMIN  . "layout/master.php";
}

function cartView()
{
    $title = "Giỏ hàng";
    $view = "orders/cartView";
    $script = "../scripts/cart-init";
    $style = "../styles/cart-init";
    if (isset($_SESSION['user']['id'])) {
        $userId = $_SESSION['user']['id'];
        $cartDetail = cartDetail($userId);
    }
    require_once PATH_VIEW_ADMIN  . "layout/master.php";
}

function checkOutView()
{
    $title = "Thanh toán";
    $view = "orders/checkOut";
    $script = "../scripts/check-out";
    if (!empty($_SESSION['user']['id'])) {
        $userId = $_SESSION['user']['id'];
        $cartDetail = cartDetail($userId);
    }

    if (!empty($_POST)) {
        $data = [
            'order_code' => 'THH' . rand(1, 1000),
            'user_id' => $userId ?? null,
            'full_name' => $_POST['full_name'] ?? null,
            'email' => $_POST['email'] ?? null,
            'phone' => $_POST['phone'] ?? null,
            'province' => $_POST['province'] ?? null,
            'district' => $_POST['district'] ?? null,
            'ward' => $_POST['ward'] ?? null,
            'zipcode' => $_POST['zipcode'] ?? null,
            'note' => $_POST['note'] ?? null,
            'paymethod' => $_POST['paymethod'] ?? null,
            'order_date' => date('Y-m-d H:i:s')
        ];
        try {
            $GLOBALS['conn']->beginTransaction();

            // Tạo hóa đơn
            $orderID = insert_get_last_id('orders', $data);

            if (!empty($cartDetail) && is_array($cartDetail)) {
                $totalMoney = 0;
                // Tính tổng tiền và lưu trữ 
                foreach ($cartDetail as $cart) {
                    $cartIDs[] = $cart['ca_cart_id'];
                    $productID = $cart['p_id'];
                    $quantity = $cart['ca_quantity'];
                    $priceRegular = $cart['p_price_regular'];
                    if ($cart['p_discount'] > 0) {
                        $priceSale = $cart['p_price_regular'] - ($cart['p_price_regular'] * $cart['p_discount'] / 100);
                        $subTotal = $priceSale * $quantity;
                        $totalMoney += $subTotal;
                    } else {
                        $subTotal = $cart['p_price_regular'] * $quantity;
                        $totalMoney += $subTotal;
                    }
                    $dataOrderDetail = [
                        'order_id' => $orderID,
                        'product_id' => $productID,
                        'quantity' => $quantity,
                        'price' => $priceRegular,
                        'created_at' => date('Y-m-d')
                    ];

                    insert('order_detail', $dataOrderDetail);
                }
                // Cập nhật tổng tiền trong bảng orders
                updateTotalMoneyOrder($orderID, $totalMoney);

                // Xóa dữ liệu giỏ hàng sau khi thanh toán thành công
                foreach ($cartIDs as $cardID) {
                    deleteCartItems($cardID);
                }
                deleteCarts($userId);
            }

            $GLOBALS['conn']->commit();
            echo '<script>alert("Thanh toán đơn hàng thành công!!! ?>")</script>';
            redirect(BASE_URL_ADMIN . "?action=orders-list");
            exit();
        } catch (Exception $e) {
            $GLOBALS['conn']->rollBack();
            debug($e);
        }
    }
    require_once PATH_VIEW_ADMIN . "layout/master.php";
}
