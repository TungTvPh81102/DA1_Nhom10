<?php
session_start();
// Required hàm gửi email
require_once "../email/Exception.php";
require_once "../email/PHPMailer.php";
require_once "../email/SMTP.php";

// Required file trong commons
require_once "../commons/env.php";
require_once "../commons/helper.php";
require_once "../commons/connect-db.php";
require_once "../commons/model.php";

// Required file trong controllers và models
require_file(PATH_CONTROLLER_ADMIN);
require_file(PATH_MODEL_ADMIN);


date_default_timezone_set('Asia/Ho_Chi_Minh');


// Điều hướng
$action = $_GET['action'] ?? '/';

match ($action) {
    // HOME DASHBOARD
    '/' => homeDashboard(),

    // LOGIN HỆ THỐNG

    // CRUD SETTINGS

    // CRUD BANNERS

    // CRUD CATEGORIES


    // CRUD PRODUCTS


    // CRUD BRANDS


    // CRUD COLORS


    // CRUD SIZES 


    // CRUD USER

};


require_once "../commons/disconnect-db.php";
