<?php
function bannersList()
{
    $title = 'Danh sách banner có trên hệ thống';
    $view = 'banner/indexView';
    $script = "../scripts/data-table";
    $style = "../styles/data-table";
    $banners = listAll('banners');
    require_once PATH_VIEW_ADMIN . 'layout/master.php';
}

function bannerCreate()
{
    $title = 'Thêm mới banner';
    $view = 'banner/createView';
    if (!empty($_POST)) {
        $data = [
            'heading' => $_POST['heading'] ?? null,
            'description' => $_POST['description'] ?? null,
            'image' => get_file_upload('image'),
            'classify' => $_POST['classify'] ?? null,
            'status' => $_POST['status'] ?? null,
            'created_at' => date('Y-m-d H:i:s')
        ];

        $imgThumbnail = $data['image'];
        if (is_array($imgThumbnail)) {
            $data['image'] = upload_file($imgThumbnail, "uploads/banners/");
        }

        insert('banners', $data);
        $_SESSION['success'] = 'Thao tác thành công';
        redirect(BASE_URL_ADMIN . '?action=banners-list');
    }
    require_once PATH_VIEW_ADMIN . 'layout/master.php';
}

function bannerUpdate()
{
    $id = $_GET['id'];
    $banner = showOne('banners', $id);


    if (!empty($_POST)) {
        $data = [
            'heading' => $_POST['heading'] ?? $banner['heading'],
            'description' => $_POST['description'] ?? $banner['description'],
            'image' => get_file_upload('image') ?? $banner['image'],
            'classify' => $_POST['classify'] ?? $banner['classify'],
            'status' => $_POST['status'] ?? $banner['status'],
            'created_at' => date('Y-m-d H:i:s')
        ];

        $imgThumbnail = $data['image'];
        if (is_array($imgThumbnail)) {
            $data['image'] = upload_file($imgThumbnail, "uploads/banners/");
        }

        update('banners', $id, $data);
        $_SESSION['success'] = 'Thao tác thành công';
        redirect(BASE_URL_ADMIN . '??action=banner-update&id=' . $id);
    }

    $title = "Cập nhật Bìa quảng cáo: ";
    $view = "banner/updateView";

    require_once PATH_VIEW_ADMIN . 'layout/master.php';
}

function bannerDetail()
{
    $id = $_GET['id'];
    $banner = showOne('banners', $id);

    if (empty($banner)) {
        e404();
    }

    $title = 'Chi tiết bìa quảng cáo: ' . $banner['heading'];
    $view = 'banner/showView';
    require_once PATH_VIEW_ADMIN . "layout/master.php";
}

function bannerDelete()
{
    $id = $_GET['id'];
    $banner = showOne('banners', $id);

    if (empty($banner)) {
        e404();
    }

    try {
        $GLOBALS['conn']->beginTransaction();

        deleteRow('banners', $id);

        // die();
        $GLOBALS['conn']->commit();
    } catch (Exception $e) {

        $GLOBALS['conn']->rollBack();

        debug($e);
    }

    if (!empty($banner['image']) && file_exists(PATH_UPLOAD . $banner['image'])) {
        unlink(PATH_UPLOAD . $banner['image']);
    }



    $arrayThumbnails = explode(',', $banner['image']);

    foreach ($arrayThumbnails as $image => $value) {
        // debug(file_exists(PATH_UPLOAD .  $value));

        unlink($value);
    }

    $_SESSION['success'] = 'Xóa bìa quảng cáo thành công';
    redirect(BASE_URL_ADMIN . "?action=banners-list");
    exit();
}
