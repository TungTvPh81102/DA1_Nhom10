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

function couponCreate()
{
    $title = 'Thêm mã giảm giá';
    $view = 'coupon/createView';
    if (!empty($_POST)) {
        if ($_POST['condition'] == 1) {
            $data = [
                'name' => $_POST['name'] ?? null,
                'code' => $_POST['code'] ?? null,
                'quantity' => $_POST['quantity'] ?? null,
                'condition' => $_POST['condition'] ?? null,
                'maximum_percent' => $_POST['maximum_percent'] ?? null,
                'number' => $_POST['number'] ?? null,
                'created_at' => $_POST['created_at'] ?? null,
                'expires_at' => $_POST['expires_at'] ?? null,
                'status' => $_POST['status'] ?? null
            ];
        } else {
            $data = [
                'name' => $_POST['name'] ?? null,
                'code' => $_POST['code'] ?? null,
                'quantity' => $_POST['quantity'] ?? null,
                'condition' => $_POST['condition'] ?? null,
                'number' => $_POST['number'] ?? null,
                'created_at' => $_POST['created_at'] ?? null,
                'expires_at' => $_POST['expires_at'] ?? null,
                'status' => $_POST['status'] ?? null
            ];
        }

        validateCouponCreate($data);

        insert('coupons', $data);
        $_SESSION['success'] = 'Thêm mã giảm giá thành công';
        redirect(BASE_URL_ADMIN . '?action=coupons-list');
    }
    require_once PATH_VIEW_ADMIN . 'layout/master.php';
}

function couponUpdate()
{
    $id = $_GET['id'];
    $coupon = showOne('coupons', $id);
    if (empty($coupon)) {
        e404();
    }
    $title = 'Cập nhật mã giảm giá: ' . $coupon['name'];
    $view = 'coupon/updateView';

    if (!empty($_POST)) {
        if ($_POST['condition'] == 1) {
            $data = [
                'name' => $_POST['name'] ??  $coupon['name'],
                'code' => $_POST['code'] ??  $coupon['code'],
                'quantity' => $_POST['quantity'] ??  $coupon['quantity'],
                'condition' => $_POST['condition'] ??  $coupon['condition'],
                'maximum_percent' => $_POST['maximum_percent'] ??  $coupon['maximum_percent'],
                'number' => $_POST['number'] ??  $coupon['number'],
                'created_at' => $_POST['created_at'] ??  $coupon['created_at'],
                'expires_at' => $_POST['expires_at'] ??  $coupon['expires_at'],
                'status' => $_POST['status'] ??  $coupon['status']
            ];
        } else {
            $data = [
                'name' => $_POST['name'] ?? $coupon['name'],
                'code' => $_POST['code'] ?? $coupon['code'],
                'quantity' => $_POST['quantity'] ?? $coupon['quantity'],
                'condition' => $_POST['condition'] ?? $coupon['condition'],
                'number' => $_POST['number'] ?? $coupon['number'],
                'created_at' => $_POST['created_at'] ??  $coupon['created_at'],
                'expires_at' => $_POST['expires_at'] ?? $coupon['expires_at'],
                'status' => $_POST['status'] ??  $coupon['status'],
                'updated_at' => date('Y-m-d')
            ];
        }

        validateCouponUpdate($id, $data);
        update('coupons', $id, $data);
        $_SESSION['success'] = 'Cập nhật mã giảm giá thành công';
        redirect(BASE_URL_ADMIN . '?action=coupon-update&id=' . $id);
    }
    require_once PATH_VIEW_ADMIN . 'layout/master.php';
}

function couponDelete()
{
    $id = $_GET['id'];
    $coupon = showOne('coupons', $id);
    if (empty($coupon)) {
        e404();
    }
    deleteRow('coupons', $id);
    $_SESSION['success'] = 'Xóa mã giảm giá thành công';
    redirect(BASE_URL_ADMIN . '?action=coupons-list');
}

function validateCouponCreate($data)
{
    $errors = [];

    if (empty(trim($data['name']))) {
        $errors['name']['required'] = 'Vui lòng nhập tên mã giảm giá';
    }

    if (empty(trim($data['code']))) {
        $errors['code']['required'] = 'Vui lòng nhập mã giảm giá';
    } else if (!checkCodeCouponCreate($data['code'])) {
        $errors['code']['uniqued'] = 'Mã giảm giá đã tồn tại trên hệ thống';
    }

    if (empty(trim($data['quantity']))) {
        $errors['quantity']['required'] = 'Vui lòng nhập số lượng mã';
    }

    if (empty(trim($data['condition']))) {
        $errors['condition']['required'] = 'Vui lòng chọn tính năng';
    }

    if (empty(trim($data['number']))) {
        $errors['number']['required'] = 'Vui lòng nhập số % hoặc tiền được giảm';
    }

    if ($data['condition'] == 1) {
        if (empty($data['maximum_percent'])) {
            $errors['maximum_percent']['required'] = 'Vui lòng nhập số tiền giảm theo %';
        }
    }

    if (empty($data['created_at'])) {
        $errors['created_at']['required'] = 'Vui lòng chọn ngày bắt đầu';
    }

    if (empty($data['expires_at'])) {
        $errors['expires_at']['required'] = 'Vui lòng chọn ngày kết thúc';
    } else if ($data['expires_at'] < $data['created_at']) {
        $errors['expires_at']['time'] = 'Ngày kết thúc phải lớn hơn ngày bắt đầu';
    }

    if (is_array($data['status'])) {
        $errors['status']['required'] = 'Vui lòng chọn trạng thái';
    } else if (!in_array($data['status'], [0, 1])) {
        $errors['status']['uniqed'] = 'Trạng thái phải là kích hoạt hoặc không kích hoạt';
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['data'] = $data;
        redirect(BASE_URL_ADMIN . '?action=coupon-create');
        exit();
    }
}

function validateCouponUpdate($id, $data)
{
    $errors = [];

    if (empty(trim($data['name']))) {
        $errors['name']['required'] = 'Vui lòng nhập tên mã giảm giá';
    }

    if (empty(trim($data['code']))) {
        $errors['code']['required'] = 'Vui lòng nhập mã giảm giá';
    } else if (!checkCodeCouponUpdate($id, $data['code'])) {
        $errors['code']['uniqued'] = 'Mã giảm giá đã tồn tại trên hệ thống';
    }

    if (empty(trim($data['quantity']))) {
        $errors['quantity']['required'] = 'Vui lòng nhập số lượng mã';
    }

    if (empty(trim($data['condition']))) {
        $errors['condition']['required'] = 'Vui lòng chọn tính năng';
    }

    if (empty(trim($data['number']))) {
        $errors['number']['required'] = 'Vui lòng nhập số % hoặc tiền được giảm';
    }

    if ($data['condition'] == 1) {
        if (empty($data['maximum_percent'])) {
            $errors['maximum_percent']['required'] = 'Vui lòng nhập số tiền giảm theo %';
        }
    }

    if (empty($data['created_at'])) {
        $errors['created_at']['required'] = 'Vui lòng chọn ngày bắt đầu';
    }

    if (empty($data['expires_at'])) {
        $errors['expires_at']['required'] = 'Vui lòng chọn ngày kết thúc';
    } else if ($data['expires_at'] < $data['created_at']) {
        $errors['expires_at']['time'] = 'Ngày kết thúc phải lớn hơn ngày bắt đầu';
    }

    if (is_array($data['status'])) {
        $errors['status']['required'] = 'Vui lòng chọn trạng thái';
    } else if (!in_array($data['status'], [0, 1])) {
        $errors['status']['uniqed'] = 'Trạng thái phải là kích hoạt hoặc không kích hoạt';
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        redirect(BASE_URL_ADMIN . '?action=coupon-update&id=' . $id);
        exit();
    }
}
