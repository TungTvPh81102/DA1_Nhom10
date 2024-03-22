<?php
function brandsList()
{
    $title = 'Danh sách thương hiệu có trên hệ thống';
    $view = 'brands/indexView';
    $script = "../scripts/data-table";
    $style = "../styles/data-table";
    $brands = listAll('brands');
    require_once PATH_VIEW_ADMIN . "layout/master.php";
}

function brandCreate()
{
    $title = 'Thêm mới thương hiệu';
    $view = 'brands/createView';
    $script = "../scripts/drop-zone";
    $style = "../styles/drop-zone";
    if (!empty($_POST)) {
        $data = [
            'name' => $_POST['name'] ?? null,
            'status' => $_POST['status'] ?? null,
            'created_at' => date('Y-m-d H:i:s')
        ];
        validateBrandCreate($data);

        insert('brands', $data);
        $_SESSION['success'] = 'Thêm mới thương hiệu thành công';
        redirect(BASE_URL_ADMIN . "?action=brands-list");
        exit();
    }
    require_once PATH_VIEW_ADMIN . "layout/master.php";
}

function brandDetail()
{
    $id = $_GET['id'];
    $brand = showOne('brands', $id);

    if (empty($brand)) {
        e404();
    }

    $title = 'Chi tiết thương hiệu: ' . $brand['name'];
    $view = 'brands/showView';
    require_once PATH_VIEW_ADMIN . "layout/master.php";
}

function brandUpdate()
{
    $id = $_GET['id'];
    $brand = showOne('brands', $id);

    if (empty($brand)) {
        e404();
    }
    $title = 'Chi tiết thương hiệu: ' . $brand['name'];
    $view = 'brands/updateView';

    if (!empty($_POST)) {
        $data = [
            'name' => $_POST['name'] ?? $brand['name'],
            'status' => $_POST['status'] ?? $brand['status'],
            'updated_at' => date('Y-m-d H:i:s')
        ];

        validateBrandUpdate($id, $data);

        update('brands', $id, $data);
        $_SESSION['success'] = 'Cập nhật thương hiệu thành công';
        redirect(BASE_URL_ADMIN . "?action=brand-update&id=" . $id);
        exit();
    }

    require_once PATH_VIEW_ADMIN . "layout/master.php";
}

function brandDelete()
{
    $id = $_GET['id'];
    $brand = showOne('brands', $id);

    if (empty($brand)) {
        e404();
    }

    deleteRow('brands', $id);

    $_SESSION['success'] = 'Xóa thương hiệu thành công';
    redirect(BASE_URL_ADMIN . "?action=brands-list");
    exit();
}

function validateBrandCreate($data)
{
    $errors = [];

    if (empty(trim($data['name']))) {
        $errors['name']['required'] = 'Vui lòng nhập tên thương hiệu';
    } else {
        if (!preg_match('/^[a-zA-ZÀ-ỹ\s]+$/', $data['name'])) {
            $errors['name']['text'] = 'Tên thương hiệu phải là ký tự';
        } else if (!checkUniqueName('brands', $data['name'])) {
            $errors['name']['unquied'] = 'Tên thương hiệu đã tồn tại';
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
        redirect(BASE_URL_ADMIN . "?action=brand-create");
        exit();
    }
}

function validateBrandUpdate($id, $data)
{
    $errors = [];

    if (empty(trim($data['name']))) {
        $errors['name']['required'] = 'Vui lòng nhập tên thương hiệu';
    } else {
        if (!preg_match('/^[a-zA-ZÀ-ỹ\s]+$/', $data['name'])) {
            $errors['name']['text'] = 'Tên thương hiệu phải là ký tự';
        } else if (!checkUniqueNameForUpdate('brands', $id, $data['name'])) {
            $errors['name']['unquied'] = 'Tên thương hiệu đã tồn tại';
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
        redirect(BASE_URL_ADMIN . "?action=brand-update&id=" . $id);
        exit();
    }
}
