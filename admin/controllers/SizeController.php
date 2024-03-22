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
    require_once PATH_VIEW_ADMIN . "layout/master.php";
}

function sizeUpdate()
{
    $title = "Cập nhậ";
    $view = "sizes/createView";
    require_once PATH_VIEW_ADMIN . "layout/master.php";
}

function sizeDelete()
{
}
