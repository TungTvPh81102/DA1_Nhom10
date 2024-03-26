<?php
function sizesList()
{
    $title = "Danh sách kích cỡ có trên hệ thống";
    $view = "sizes/indexView";
    $script = "../scripts/data-table";
    $style = "../styles/data-table";
    $sizes = listAll('product_size');
    require_once PATH_VIEW_ADMIN . "layout/master.php";
}

function sizeCreate()
{
    $title = "Thêm kích thước";
    $view = "sizes/createView";
    if (!empty($_POST)) {
        $data = [
            'name' => $_POST['name'],
        ];
        insert('product_size', $data);
        $_SESSION['success'] = 'Thêm kích cỡ thành công';
        redirect(BASE_URL_ADMIN . "?action=sizes-list");
        exit();
    }
    require_once PATH_VIEW_ADMIN . "layout/master.php";
}

function sizeUpdate()
{

    $id = $_GET['id'];
    $size = showOne('product_size', $id);


    if (empty($size)) {
        e404();
    }

    $title = "Cập nhật kích cỡ: " . $size['name'];
    $view = "sizes/updateView";
    if (!empty($_POST)) {
        $data = [
            'name' => $_POST['name'],
            'updated_at' => date('Y-m-d H:i:s')
        ];
        update('product_size', $id, $data);
        $_SESSION['success'] = 'Cập nhật kích cỡ thành công';
        redirect(BASE_URL_ADMIN . "?action=size-update&id=" . $id);
        exit();
    }
    require_once PATH_VIEW_ADMIN . "layout/master.php";
}

function sizeDelete()
{
    $id = $_GET['id'];
    $size = showOne('product_size', $id);

    if (empty($size)) {
        e404();
    }

    deleteRow('product_size', $id);
    $_SESSION['success'] = 'Xóa kích cỡ thành công';
    redirect(BASE_URL_ADMIN . "?action=sizes-list");
    exit();
}
