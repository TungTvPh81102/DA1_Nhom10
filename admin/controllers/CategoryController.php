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
        $errors['name']['length'] = 'Vui lòng nhập độ dài tối đa 50 ký tự';
    } else if (!checkUniqueName('categories', $data['name'])) {
        $errors['name']['unique'] = 'Tên category đã tồn tại, vui lòng nhập tên khác';
    }
}


function validateCategoryUpdate($id, $data)
{

    $errors = [];

    if (empty(trim($data['name']))) {
        $errors['name']['required'] = 'Vui lòng nhập thông tin';
    } else if (strlen(trim($data['name'])) > 20) {
        $errors['name']['length'] = 'Vui lòng nhập độ dài tối đa 50 ký tự';
    } else if (!checkUniqueNameForUpdate('categories', $id, $data['name'])) {
        $errors['name']['unique'] = 'Tên category đã tồn tại, vui lòng nhập tên khác';
    }
}
