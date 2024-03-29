<?php
function categoriesList()
{
    $title = 'Danh sách danh mục có trên hệ thống';
    $view = 'categories/indexView';
    $script = "../scripts/data-table";
    $style = "../styles/data-table";
    $categories = listAll('categories');
    require_once PATH_VIEW_ADMIN . 'layout/master.php';
}

function categoryCreate()

{
    $title = 'Thêm mới danh mục';
    $view = 'categories/createView';
    $script = "../scripts/drop-zone";
    $style = "../styles/drop-zone";

    if (!empty($_POST)) {
        $data = [
            'name' => $_POST['name'] ?? null,
            'status' => $_POST['status'] ?? null,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        validateCreate($data);

        insert('categories', $data);
        $_SESSION['success'] = 'Thêm danh mục thành công';
        redirect(BASE_URL_ADMIN . "?action=categories-list");
        exit();
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

    $title = 'Chi tiết danh mục: ' . $category['name'];
    $view = 'categories/showView';
    require_once PATH_VIEW_ADMIN . 'layout/master.php';
}

function categoryUpdate()
{

    $id = $_GET['id'];
    $category = showOne('categories', $id);

    if (empty($category)) {
        e404();
    }

    $title = 'Cập nhật danh mục: ' . $category['name'];
    $view = 'categories/updateView';
    if (!empty($_POST)) {
        $data = [
            'name' => $_POST['name'] ?? $category['name'],
            'status' => $_POST['status'] ?? $category['status'],
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        validateUpdate($id, $data);

        update('categories', $id, $data);
        $_SESSION['success'] = 'Cập nhật danh mục thành công';
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
    $_SESSION['success'] = 'Xóa danh mục thành công';
    redirect(BASE_URL_ADMIN . "?action=categories-list");
    exit();
}

// HÀM VALIDATE CREATE
function validateCreate($data)
{
    $errors = [];

    if (empty(trim($data['name']))) {
        $errors['name']['required'] = 'Vui lòng nhập tên danh mục';
    } else {
        if (!preg_match('/^[a-zA-ZÀ-ỹ\s]+$/', $data['name'])) {
            $errors['name']['text'] = 'Tên nhanh mục phải là ký tự';
        } else if (!checkUniqueCategory('categories', $data['name'])) {
            $errors['name']['unquied'] = 'Tên danh mục đã tồn tại';
        }
    }

    if ($data['status'] === null) {
        $errors['status']['required'] = 'Vui lòng chọn trạng thái';
    } else {
        if (!in_array($data['status'], [0, 1])) {
            $errors['status']['status'] = 'Trạng thái phải là Active hoặc Inactive';
        }
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['data'] = $data;
        redirect(BASE_URL_ADMIN . "?action=category-create");
        exit();
    }
}

// HÀM VALIDATE UPDATE
function validateUpdate($id, $data)
{


    $errors = [];

    if (empty(trim($data['name']))) {
        $errors['name']['required'] = 'Vui lòng nhập tên danh mục';
    } else {
        if (!preg_match('/^[a-zA-ZÀ-ỹ\s]+$/', $data['name'])) {
            $errors['name']['text'] = 'Tên nhanh mục phải là ký tự';
        } else if (!checkUniqueCategoryForUpdate('categories', $id, $data['name'])) {
            $errors['name']['unquied'] = 'Tên danh mục đã tồn tại';
        }
    }

    if ($data['status'] === null) {
        $errors['status']['required'] = 'Vui lòng chọn trạng thái';
    } else {
        if (!in_array($data['status'], [0, 1])) {
            $errors['status']['status'] = 'Trạng thái phải là Active hoặc Inactive';
        }
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        redirect(BASE_URL_ADMIN . "?action=category-update&id=" . $id);
        exit();
    }
}
