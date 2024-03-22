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


function setUpStatus($status)
{
    switch ($status) {
        case 1:
            $show = '<span class="btn btn-warning btn-sm waves-effect waves-light">Chờ xác nhận</span>';
            break;
        case 2:
            $show = '<span class="btn btn-info btn-sm waves-effect waves-light">Chờ lấy hàng</span>';
            break;
        case 3:
            $show = '<span class="btn btn-primary btn-sm waves-effect waves-light">Đang giao hàng</span>';
            break;
        case 4:
            $show = '<span class="btn btn-success btn-sm waves-effect waves-light">Giao hàng thành công</span>';
            break;
        default:
            $show = '<span class="btn btn-danger btn-sm waves-effect waves-light">Đã hủy hàng</span>';
            break;
    }
    return $show;
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
        $status_delivery = $_POST['status_delivery'];
        $updateTime = date("Y-m-d H:i:s");
        $checkStatus =  $orderByCustomer['status_delivery'];

        $arrStatus = [
            1 => [0, 2, 3, 4],
            2 => [0, 1, 2, 3, 4],
            3 => [4],
            4 => [],
            0 => []
        ];


        if (in_array($status_delivery, $arrStatus[$checkStatus])) {
            updateStatusOrderById($id, $status_delivery, $updateTime);
            $_SESSION['success'] = 'Cập nhật trạng thái đơn hàng thành công';
            redirect(BASE_URL_ADMIN . "?action=order-detail&order_id=$id");
            exit();
        } else {
            // Nếu chuyển đổi trạng thái không được phép, hiển thị thông báo lỗi và chuyển hướng người dùng về trang chi tiết đơn hàng
            $_SESSION['errors'] = 'Không thể chuyển từ trạng thái hiện tại sang trạng thái đã chọn.';
            redirect(BASE_URL_ADMIN . "?action=order-detail&order_id=$id");
            exit();
        }
    }
    require_once PATH_VIEW_ADMIN  . "layout/master.php";
}

function completePayment()
{
    $id = $_GET['order_id'];
    $orderDetail = showOrderDetail($id);
    // debug($orderDetail);
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

function addCart()
{

    if (!empty($_POST)) {

        $data = [
            'product_id' => $_POST['p_id'] ?? null,
            'quantity' => $_POST['quantity'] ?? null,
            'price' => $_POST['p_price_regular'] ?? null,
            'size' => $_POST['size'] ?? null,
            'color' => $_POST['color'] ?? null,
            'created_at' => date('Y-m-d H:i:s')
        ];


        if (!empty($_SESSION['user'])) {
            try {
                $GLOBALS['conn']->beginTransaction();

                $user = $_SESSION['user'];
                $dataUserCart = [
                    'user_id' => $user['id'],
                    'created_at' => date('Y-m-d H:i:s')
                ];

                $cartId = insert_get_last_id('carts', $dataUserCart);

                if (!empty($cartId)) {
                    $dataCartItem = [
                        'cart_id' => $cartId ?? null,
                        'product_id' => $data['product_id'] ?? null,
                        'quantity' => $data['quantity'] ?? null,
                        'price' => $data['price'] ?? null,
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
            'country' => $_POST['country'] ?? null,
            'address' => $_POST['address'] ?? null,
            'city' => $_POST['city'] ?? null,
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
