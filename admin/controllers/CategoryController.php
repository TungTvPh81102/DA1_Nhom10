<?php
function categoriesList()
{
    $title = "Danh sách category";
    $view = "categories/indexView";
    $script = "../scripts/data-table";
    $style = "../styles/data-table";
    $categories = listAll('categories');
    require_once PATH_VIEW_ADMIN . 'layout/master.php';
}
function categoryCreate()
{
    $title = "Thêm mới category";
    $view = "categories/createView";
    if (!empty($_POST)) {
        $activeToken = sha1(uniqid() . time());
        $data = [
            'name' => $_POST['name'] ?? null,
            'status' => $_POST['status'] ?? null,
            'parent_id' => $_POST['parent_id'] ?? null,
            'created_at' => date('Y-m-d H:i:s')

        ];

        validateCategoryCreate($data);
        $data['active_token'] = $activeToken;
        $insert = insert('categories', $data);
        if ($insert) {
            $_SESSION['success'] = 'Đăng ký category thành công';
            redirect(BASE_URL_ADMIN . "?action=category-create");
            exit();
        } else {
            $_SESSION['errors'] = 'Đăng ký category thất bại, thử lại sau ít phút';
            redirect(BASE_URL_ADMIN . "?action=category-create");
            exit();
        }
    }
    require_once PATH_VIEW_ADMIN . 'layout/master.php';
}
function categoryDetail()
{

    $id = $_GET['id'];
    $category = showOne('categories', $id);
    if (empty($category)) {
        e404();
    }
    $title = "Chi tiết category: " . $category['name'];
    $view = "categories/showView";
    require_once PATH_VIEW_ADMIN . 'layout/master.php';
}
function categoryUpdate()
{

    $id = $_GET['id'];
    $category = showOne('categories', $id);

    if (empty($category)) {
        e404();
    }

    $title = "Cập nhật category: " . $category['name'];
    $view = "categories/updateView";
    if (!empty($_POST)) {
        $data = [
            'name' => $_POST['name'] ?? $category['name'],
            'status' => $_POST['status'] ?? $category['status'],
            'parent_id' => $_POST['parent_id'] ?? $category['parent_id'],
            'updated_at' => date('Y-m-d H:i:s')
        ];
        validateCategoryUpdate($id, $data);
        update('categories', $id, $data);
        $_SESSION['success'] = 'Cập nhật category thành công';
        redirect(BASE_URL_ADMIN . "?action=category-update&id=" . $id);
        exit();
    }

    require_once PATH_VIEW_ADMIN . 'layout/master.php';
}
function categoryDelete()
{
    $id = $_GET['id'];
    $category = showOne('categories', $id);

    if (empty($category)) {
        e404();
    }

    deleteRow('categories', $id);

    $_SESSION['success'] = 'Xóa người category thành công';
    redirect(BASE_URL_ADMIN . "?action=categories-list");
    exit();
}
function activeStatus()
{
    require_once PATH_VIEW_ADMIN . 'users/activeView.php';
}

// HÀM VALIDATE CREATE
function validateCategoryCreate($data)
{
    // Name - bắt buộc, độ dài tối đa 50 ký tự, không được trùng
    $errors = [];

    if (empty(trim($data['name']))) {
        $errors['name']['required'] = 'Vui lòng nhập thông tin';
    } else if (strlen(trim($data['name'])) > 20) {
        $errors['name']['length'] = 'Vui lòng nhập độ dài tối đa 20 ký tự';
    }
}


function validateCategoryUpdate($id, $data)
{

    $errors = [];

    if (empty(trim($data['first_name']))) {
        $errors['first_name']['required'] = 'Vui lòng nhập thông tin';
    } else if (strlen(trim($data['first_name'])) > 20) {
        $errors['first_name']['length'] = 'Vui lòng nhập độ dài tối đa 20 ký tự';
    }

    if (empty(trim($data['last_name']))) {
        $errors['last_name']['required'] = 'Vui lòng nhập thông tin';
    } elseif (strlen(trim($data['last_name'])) > 20) {
        $errors['last_name']['length'] = 'Vui lòng nhập độ dài tối đa 50 ký tự';
    }

    if (empty(trim($data['email']))) {
        $errors['email']['required'] = 'Vui lòng nhập địa chỉ email';
    } else {
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email']['emailcheck'] = 'Email nhập vào sai định dạng, vui lòng kiểm tra lại';
        } else if (!checkUniqueEmailForUpdate('users', $id, $data['email'])) {
            $errors['email']['unique'] = 'Email đã tồn tại trên hệ thống, vui lòng nhập email khác';
        }
    }

    // if (empty(trim($data['phone_number']))) {
    //     $errors['phone_number']['required'] = 'Vui lòng nhập số điện thoại';
    // } else {
    //     if (strlen(trim($data['phone_number'])) > 11) {
    //         $errors['phone_number']['length'] = 'Số điện thoại chỉ tối đa 11 ký tự';
    //     }
    // }

    if (empty(trim($data['address']))) {
        $errors['address']['required'] = 'Vui lòng nhập địa chỉ';
    }

    if (empty(trim($data['password']))) {
        $errors['password']['required'] = 'Vui lòng nhập mật khẩu';
    } elseif (strlen(trim($data['password'])) < 8) {
        $errors['password']['length'] = 'Vui lòng nhập mật khẩu lớn hơn 8 ký tự';
    }

    if (!empty($data['avatar']['name'])) {
        $typeImage = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];
        if ($data['avatar']['size'] >= 2 * 1024 * 1024) {
            $errors['avatar']['size'] = 'Ảnh chỉ nhỏ hơn 2M';
        } else if (!in_array($data['avatar']['type'], $typeImage)) {
            $errors['avatar']['type'] = 'Ảnh chỉ chấp nhận định dạng file: png, jpg, jpeg, gif';
        }
    }

    if ($data['status'] === null) {
        $errors['status']['required'] = 'Vui lòng chọn trạng thái';
    } elseif (!in_array($_POST['status'], [0, 1])) {
        $errors['status']['user'] = 'Trạng thái phải là kích hoặc hoặc không kích hoạt';
    }

    if ($data['role'] === null) {
        $errors['role']['required'] = 'Vui lòng chọn vai trò';
    } elseif (!in_array($data['role'], [0, 1])) {
        $errors['role']['user'] = 'Vai trò phải là người dùng hoặc admin';
    }
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        redirect(BASE_URL_ADMIN . "?action=user-update&id=" . $id);
        exit();
    }
}
