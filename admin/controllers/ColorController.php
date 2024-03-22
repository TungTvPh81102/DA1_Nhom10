<?php
function colorsList()
{
    $title = "Danh sách màu sắc có trên hệ thống";
    $view = "colors/indexView";
    $script = "../scripts/data-table";
    $style = "../styles/data-table";
    $colors = listAll('product_color');
    require_once PATH_VIEW_ADMIN . "layout/master.php";
}
function colorCreate()
{
    $title = "Thêm mới màu sắc";
    $view = "colors/createView";
    if (!empty($_POST)) {
        $data = [
            'name' => $_POST['name'] ?? null,
            'color' => $_POST['color'] ?? null,
            'status' => $_POST['status'] ?? null,
            'created_at' => date('Y-m-d H:i:s')
        ];

        validateColorCreate($data);
        insert('product_color', $data);
        $_SESSION['success'] = 'Thêm màu sắc thành công';
        redirect(BASE_URL_ADMIN . "?action=colors-list");
        exit();
    }
    require_once PATH_VIEW_ADMIN . "layout/master.php";
}
function colorUpdate()
{
    $id = $_GET['id'];
    $color = showOne('product_color', $id);

    if (empty($color)) {
        e404();
    }

    if (!empty($_POST)) {
        $data = [
            'name' => $_POST['name'] ?? $color['name'],
            'color' => $_POST['color'] ?? $color['color'],
            'status' => $_POST['status'] ?? $color['status'],
            'updated_at' => date('Y-m-d H:i:s')
        ];

        validateColorUpdate($id, $data);
        update('product_color', $id, $data);
        $_SESSION['success'] = 'Cập nhật màu sắc thành công';
        redirect(BASE_URL_ADMIN . "?action=color-update&id=" . $id);
        exit();
    }

    $title = "Cập nhật màu sắc: ";
    $view = "colors/updateView";


    require_once PATH_VIEW_ADMIN . "layout/master.php";
}
function colorDelete()
{
    $id = $_GET['id'];
    $color = showOne('product_color', $id);

    if (empty($color)) {
        e404();
    }

    deleteRow('product_color', $id);
    $_SESSION['success'] = 'Xóa màu sắc thành công';
    redirect(BASE_URL_ADMIN . "?action=colors-list");
}

function validateColorCreate($data)
{
    $errors = [];

    if (empty(trim($data['name']))) {
        $errors['name']['required'] = 'Vui lòng nhập tên màu';
    } elseif (!checkUniqueName('product_color', $data['name'])) {
        $errors['name']['uniqued'] = 'Tên màu đã tồn tại trên hệ thống';
    }

    if (empty($data['color'])) {
        $errors['color']['required'] = 'Vui lòng chọn mã màu';
    }

    if ($data['status'] === null) {
        $errors['status']['required'] = 'Vui lòng chọn trạng thái';
    } elseif (!in_array($data['status'], [0, 1])) {
        $errors['status']['checkStatus'] = 'Trạng thái phải được chọn là Inactive hoặc Active';
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['data'] = $data;
        redirect(BASE_URL_ADMIN . "?action=color-create");
        exit();
    }
}


function validateColorUpdate($id, $data)
{
    $errors = [];

    if (empty(trim($data['name']))) {
        $errors['name']['required'] = 'Vui lòng nhập tên màu';
    } elseif (!checkUniqueNameForUpdate('product_color', $id, $data['name'])) {
        $errors['name']['uniqued'] = 'Tên màu đã tồn tại trên hệ thống';
    }

    if (empty($data['color'])) {
        $errors['color']['required'] = 'Vui lòng chọn mã màu';
    }

    if ($data['status'] === null) {
        $errors['status']['required'] = 'Vui lòng chọn trạng thái';
    } elseif (!in_array($data['status'], [0, 1])) {
        $errors['status']['checkStatus'] = 'Trạng thái phải được chọn là Inactive hoặc Active';
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['data'] = $data;
        redirect(BASE_URL_ADMIN . "?action=color-create&id=" . $id);
        exit();
    }
}
