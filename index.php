<?php
session_start();
// Required hàm gửi email
require_once "./email/Exception.php";
require_once "./email/PHPMailer.php";
require_once "./email/SMTP.php";

// Required file trong commons
require_once "./commons/env.php";
require_once "./commons/helper.php";
require_once "./commons/connect-db.php";
require_once "./commons/model.php";

// Required file trong controllers và models
require_file(PATH_CONTROLLER);
require_file(PATH_MODEL);


date_default_timezone_set('Asia/Ho_Chi_Minh');


// Điều hướng
$action = $_GET['action'] ?? '/';

$arrRouteNeedAuth = [
    'add-to-cart',
    'view-cart',
    'cart-inc',
    'cart-des',
    'cart-del',
    'order-check-out',
    'order-purchase'
];

// Kiểm tra xem user đăng nhập chưa
middleware_client_check($action, $arrRouteNeedAuth);

match ($action) {
    // HOME DASHBOARD
    '/' => homeClient(),

    // LOGIN AND REGISTER CLIENT
    'login-client' => loginClient(),
    'register-client' => registerClient(),
    'active-account' => activeAccount(),
    'forgot-password' => forgotPassword(),
    'reset-password' => resetPassword(),
    'logout-client' => logoutClient(),

    // MY ACCOUNT
    'my-account' => myAccount(),
    'change-password' => changePassword(),

    // ORDER
    'my-orders' => myOrders(),
    'show-order' => showOrder(),

    // PRODUCT
    'products' => shopProduct(),
    'product-detail' => shopProductDetail(),
    'search-product' => searchProduct(),

    // CART
    'add-to-cart' => addToCart(),
    'view-cart' => viewCart(),
    'cart-inc' => cartInc(),
    'cart-des' => cartDes(),
    'cart-del' => cartDel(),

    // ORDER
    'order-check-out' => orderCheckOut(),
    'order-purchase' => orderPurchase(),
    'order-success' => orderSuccess(),
    'online-payment' => onlinePayment(),
    'payment-gateway' => paymentGateway(),

    // SEARCH
    // 'search-key' => searchKeywords(),
};


require_once "./commons/disconnect-db.php";
