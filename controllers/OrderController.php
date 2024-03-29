<?php
function orderCheckOut()
{
    $view = 'order/CheckOutView';
    require_once PATH_VIEW . 'layout/master.php';
}

function orderPurchase()
{
    if (!empty($_POST) && !empty($_SESSION['cart'])) {
        $data = [
            'order_code' => 'TH' . rand(1, 1000),
            'user_id' => $_SESSION['user']['id'],
            'full_name' => $_POST['full_name'] ?? null,
            'country' => $_POST['country'] ?? null,
            'address' => $_POST['address'] ?? null,
            'city' => $_POST['city'] ?? null,
            'zipcode' => $_POST['zipcode'] ?? null,
            'email' => $_POST['email'] ?? null,
            'phone' => $_POST['phone'] ?? null,
            'note' => $_POST['note'] ?? null,
            'paymethod' => $_POST['paymethod'] ?? null,
            'total_money' => caculator_total_order(false),
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
                    'created_at' => date('Y-m-d H:i:s')
                ];
                insert('order_detail', $orderDetail);
                downProductQuantity($item['id'], $item['quantity']);
            }


            deleteCartItemByCartID($_SESSION['cartID']);
            deleteRow('carts', $_SESSION['cartID']);


            // Xóa sesion liên quan đến giỏ hàng
            unset($_SESSION['cart']);
            unset($_SESSION['cartID']);

            $GLOBALS['conn']->commit();
        } catch (Exception $e) {
            $GLOBALS['conn']->rollBack();
            debug($e);
        }
        redirect(BASE_URL  . '?action=order-success');
        exit();
    }

    redirect(BASE_URL);
    exit();
}

function orderSuccess()
{
    $view = 'order/OrderSuccess';
    require_once PATH_VIEW . 'layout/master.php';
}

function onlinePayment()
{
    $view = 'order/OnlinePayment';
    require_once PATH_VIEW . 'layout/master.php';
}

function paymentGateway()
{
    $view = 'order/PaymentGateways';
    require_once PATH_VIEW . 'layout/master.php';
}
