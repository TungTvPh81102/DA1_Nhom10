<?php
function orderCheckOut()
{
    $view = 'order/CheckOutView';

    if (!empty($_POST) && !empty($_SESSION['cart'])) {

        // THANH TOÁN VNPAY
        if ($_POST['paymethod'] == 1) {

            if (isset($_SESSION['coupon'])) {
                $totalMoney = calculator_total_coupon(false);
            } else {
                $totalMoney = caculator_total_order(false);
            }
            $reduced = $_SESSION['coupon']['maximum_percent'] ? $_SESSION['coupon']['maximum_percent'] : $_SESSION['coupon']['number'];
            $data = [
                'order_code' => 'TH' . rand(1, 1000),
                'user_id' => $_SESSION['user']['id'],
                'full_name' => $_POST['full_name'] ?? null,
                'province' => $_POST['province'] ?? null,
                'district' => $_POST['district'] ?? null,
                'ward' => $_POST['ward'] ?? null,
                'zipcode' => $_POST['zipcode'] ?? null,
                'email' => $_POST['email'] ?? null,
                'phone' => $_POST['phone'] ?? null,
                'note' => $_POST['note'] ?? null,
                'paymethod' => PAYMENT_VNPAY,
                'payment_status' => $_POST['paymethod'] ?? null,
                'reduced' => $reduced ?? null,
                'total_money' =>  $totalMoney,
                'status_delivery' => 1,
                'order_date' => date('Y-m-d H:i:s')
            ];


            $_SESSION['dataOrder'] = $data;

            // TRUY VẤN VNPAY SANBOX
            $vnp_TmnCode = "SH7S871O"; //Mã định danh merchant kết nối (Terminal Id)
            $vnp_HashSecret = "FZSLXCHBHGZGLCGSBNNJFWPSYMGEZHJY"; //Secret key
            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = "http://localhost/project/?action=order-success";

            $vnp_TxnRef = $data['order_code']; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $vnp_OrderInfo = 'Thanh toán hóa đơn';
            $vnp_OrderType = 'billpayment';
            $vnp_Amount = $data['total_money'] * 100;
            $vnp_Locale = 'vn';
            $vnp_BankCode = 'NCB';
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef

            );

            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }

            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }

            redirect($vnp_Url);
        } else {
            if (isset($_SESSION['coupon'])) {
                $totalMoney = calculator_total_coupon(false);
            } else {
                $totalMoney = caculator_total_order(false);
            }
            $reduced = $_SESSION['coupon']['maximum_percent'] ? $_SESSION['coupon']['maximum_percent'] : $_SESSION['coupon']['number'];
            $data = [
                'order_code' => 'TH' . rand(1, 1000),
                'user_id' => $_SESSION['user']['id'],
                'full_name' => $_POST['full_name'] ?? null,
                'province' => $_POST['province'] ?? null,
                'district' => $_POST['district'] ?? null,
                'ward' => $_POST['ward'] ?? null,
                'zipcode' => $_POST['zipcode'] ?? null,
                'email' => $_POST['email'] ?? null,
                'phone' => $_POST['phone'] ?? null,
                'note' => $_POST['note'] ?? null,
                'paymethod' => PAYMENT_CASH,
                'payment_status' => $_POST['paymethod'] ?? null,
                'reduced' => $reduced ?? null,
                'total_money' =>  $totalMoney,
                'status_delivery' => 1,
                'order_date' => date('Y-m-d H:i:s')
            ];
            try {
                $GLOBALS['conn']->beginTransaction();
                $orderID = insert_get_last_id('orders', $data);
                foreach ($_SESSION['cart'] as $item) {
                    $orderDetail = [
                        'order_id' => $orderID,
                        'product_id' => $item['id'],
                        'quantity' => $item['quantity'],
                        'price' => $item['discount'] ?: $item['price_regular'],
                        'coupon' => $_SESSION['coupon']['code'] ?? null,
                        'created_at' => date('Y-m-d H:i:s')
                    ];
                    insert('order_detail', $orderDetail);
                    downProductQuantity($item['id'], $item['size'], $item['color'], $item['quantity']);
                    updateQuantityCoupon($_SESSION['coupon']['id'], $item['quantity']);
                }
                deleteCartItemByCartID($_SESSION['cartID']);
                deleteRow('carts', $_SESSION['cartID']);

                // Xóa sesion liên quan đến giỏ hàng và dữ liệu đơn hàng
                unset($_SESSION['cart']);
                unset($_SESSION['cartID']);
                unset($_SESSION['coupon']);

                $GLOBALS['conn']->commit();

                redirect(BASE_URL . '?action=order-success&status=complete');
            } catch (Exception $e) {
                $GLOBALS['conn']->rollBack();
                debug($e);
            }
        }
    }
    require_once PATH_VIEW . 'layout/master.php';
}

function orderSuccess()
{


    $title = 'Đặt hàng';
    $view = 'order/OrderSuccess';
    $vnp_HashSecret = "FZSLXCHBHGZGLCGSBNNJFWPSYMGEZHJY"; //Secret key
    $vnp_SecureHash = $_GET['vnp_SecureHash'] ?? null;

    if (isset($_GET['vnp_SecureHash']) && isset($_GET['vnp_TxnRef']) && $_GET['vnp_ResponseCode'] == 0 && (!empty($_GET['vnp_TransactionNo']))) {

        try {
            $GLOBALS['conn']->beginTransaction();

            $orderID = insert_get_last_id('orders', $_SESSION['dataOrder']);
            foreach ($_SESSION['cart'] as $item) {
                $orderDetail = [
                    'order_id' => $orderID,
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['discount'] ?: $item['price_regular'],
                    'coupon' => $_SESSION['coupon']['code'] ?? null,
                    'created_at' => date('Y-m-d H:i:s')
                ];
                insert('order_detail', $orderDetail);
                downProductQuantity($item['id'], $item['size'], $item['color'], $item['quantity']);
                if (isset($_SESSION['coupon'])) {
                    updateQuantityCoupon($_SESSION['coupon']['id'], $item['quantity']);
                }
            }

            // Tạo truy vấn thêm thông tin thanh toán vào bảng Payment
            $dataPayment = [
                'full_name' => $_SESSION['dataOrder']['full_name'],
                'vnp_Amount' => $_GET['vnp_Amount'],
                'vnp_BankCode' => $_GET['vnp_BankCode'],
                'vnp_BankTranNo' => $_GET['vnp_BankTranNo'],
                'vnp_CardType' => $_GET['vnp_CardType'],
                'vnp_OrderInfo' => $_GET['vnp_OrderInfo'],
                'vnp_PayDate' => $_GET['vnp_PayDate'],
                'vnp_ResponseCode' => $_GET['vnp_ResponseCode'],
                'vnp_TmnCode' => $_GET['vnp_TmnCode'],
                'vnp_TransactionNo' => $_GET['vnp_TransactionNo'],
                'vnp_TransactionStatus' => $_GET['vnp_TransactionStatus'],
                'vnp_TxnRef' => $_GET['vnp_TxnRef'],
                'vnp_SecureHash' => $_GET['vnp_SecureHash']
            ];

            insert('payment', $dataPayment);

            deleteCartItemByCartID($_SESSION['cartID']);
            deleteRow('carts', $_SESSION['cartID']);

            // Xóa sesion liên quan đến giỏ hàng và dữ liệu đơn hàng
            unset($_SESSION['cart']);
            unset($_SESSION['cartID']);
            unset($_SESSION['dataOrder']);
            unset($_SESSION['coupon']);
            $GLOBALS['conn']->commit();
            redirect(BASE_URL . '?action=order-success&status=complete');
        } catch (Exception $e) {
            $GLOBALS['conn']->rollBack();
            debug($e);
        }
    }

    $inputData = array();
    foreach ($_GET as $key => $value) {
        if (substr($key, 0, 4) == "vnp_") {
            $inputData[$key] = $value;
        }
    }

    unset($inputData['vnp_SecureHash']);
    ksort($inputData);
    $i = 0;
    $hashData = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
        } else {
            $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
            $i = 1;
        }
    }

    $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);


    require_once PATH_VIEW . 'layout/master.php';
}

function onlinePayment()
{
    $view = 'order/OnlinePayment';
    require_once PATH_VIEW . 'layout/master.php';
}

function myOrders()
{
    $view = 'order/myOrders';
    $title = 'My Orders';
    if (isset($_SESSION['user'])) {
        $userID = $_SESSION['user']['id'];
        $orders = listAllUserOrder($userID);

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $statusDelivery = 0;
            $data = [
                'status_delivery' => $statusDelivery,
                'updated_at' => date('Y-m-d H:i:s')
            ];
            update('orders', $id, $data);
            redirect(BASE_URL . '?action=my-orders');
        }
    }
    require_once PATH_VIEW . 'layout/master.php';
}

function showOrder()
{
    $id = $_GET['id'];
    $orderDetail = orderDetail($id);
    if (empty($orderDetail)) {
        e404();
    }
    $view = 'order/OrderDetail';
    $title = 'Order Details';

    require_once PATH_VIEW . 'layout/master.php';
}
