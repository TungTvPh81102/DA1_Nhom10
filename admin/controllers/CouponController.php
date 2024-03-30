<?php
function couponList()
{
    $title = 'Danh sách mã giảm giá có trên hệ thống';
    $view = 'coupon/indexView';
    $script = '../scripts/data-table';
    $style = '../styles/data-table';
    $coupons = listAll('coupons');
    $today = date('Y-m-d');
    require_once PATH_VIEW_ADMIN . 'layout/master.php';
}

function couponAdd()
{
    $title = 'Thêm mã giảm giá';
    $view = 'coupon/createView';
    if (!empty($_POST)) {
        $data = [
            'name' => $_POST['name'] ?? null,
            'code' => $_POST['code'] ?? null,
            'time' => $_POST['time'] ?? null,
            'condition' => $_POST['condition'] ?? null,
            'maximum_percent' => $_POST['maximum_percent'] ?? null,
            'number' => $_POST['number'] ?? null,
            'created_at' => $_POST['created_at'] ?? null,
            'expires_at' => $_POST['expires_at'] ?? null,
            'status' => $_POST['status'] ?? null
        ];
        insert('coupons', $data);
        $_SESSION['success'] = 'Thêm mã giảm giá thành công';
        redirect(BASE_URL_ADMIN . '?action=coupons-list');
    }
    require_once PATH_VIEW_ADMIN . 'layout/master.php';
}
