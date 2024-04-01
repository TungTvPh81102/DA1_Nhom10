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

// Kiểm tra xem user đăng nhập chưa
middleware_auth_check($action);

match ($action) {
    // HOME DASHBOARD
    '/' => homeDashboard(),

    // LOGIN HỆ THỐNG
    'login' => adminLogin(),
    'logout' => adminLogout(),


    // CRUD SETTINGS
    'setting-form' => settingShowForm(),
    'setting-save' => settingSave(),

    // CRUD BANNERS
    'banners-list' => bannersList(),
    'banner-create' => bannerCreate(),

    // CRUD CATEGORIES
    'categories-list' => categoriesList(),
    'category-create' => categoryCreate(),
    'category-detail' => categoryDetail(),
    'category-update' => categoryUpdate(),
    'category-delete' => categoryDelete(),

    // CRUD PRODUCTS
    'products-list' => productsList(),
    'product-create' => productsCreate(),
    'product-detail' => productDetail(),
    'product-update' => productUpdate(),
    'product-delete' => productDelete(),
    'gallerys' => gallerys(),

    // QUẢN LÝ MÃ GIẢM GIÁ
    'coupons-list' => couponList(),
    'coupon-create' => couponCreate(),
    'coupon-update' => couponUpdate(),
    'coupon-delete' => couponDelete(),

    // CRUD BRANDS
    'brands-list' => brandsList(),
    'brand-create' => brandCreate(),
    'brand-detail' => brandDetail(),
    'brand-update' => brandUpdate(),
    'brand-delete' => brandDelete(),

    // CRUD COLORS
    'colors-list' => colorsList(),
    'color-create' => colorCreate(),
    'color-update' => colorUpdate(),
    'color-delete' => colorDelete(),

    // CRUD SIZES 
    'sizes-list' => sizesList(),
    'size-create' => sizeCreate(),
    'size-update' => sizeUpdate(),
    'size-delete' => sizeDelete(),

    // CRUD USER
    'users-list' => usersList(),
    'user-create' => userCreate(),
    'user-detail' => userDetail(),
    'user-update' => userUpdate(),
    'user-delete' => userDelete(),
    'active' => activeStatus(),

    // QUẢN LÝ HÓA ĐƠN
    'orders-list' => ordersList(),
    'order-detail' => orderDetail(),
    'complete-payment' => completePayment(),


    // XỬ LÝ MUA SẢN PHẨM
    'add-cart' => addCart(),
    'cart-view' => cartView(),
    'check-out' => checkOutView(),

    // QUẢN LÝ THỐNG KÊ
    'statistical-management' => statisticalManagement(),
};


require_once "../commons/disconnect-db.php";
