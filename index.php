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

// Kiểm tra xem user đăng nhập chưa
// middleware_auth_check($action);

match ($action) {
    // HOME DASHBOARD
    '/' => homeClient(),

    // LOGIN AND REGISTER CLIENT
    'login-client' => loginClient(),
    'register-client' => registerClient(),
    'active-account' => activeAccount(),
};


require_once "./commons/disconnect-db.php";
