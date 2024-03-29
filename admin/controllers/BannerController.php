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

function bannerUpdate(){
    $id = $_GET['id'];
    $banner = showOne('banners', $id);
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