<?php
function homeClient()
{
    $view = 'homeClient';
    $productHot = productHot();
    $productNewArrival = newArrivalsProduct();
    $imgThumbnail = imgThumbnail();
    $imgCover = imgCover();
    if (isset($_GET['search'])) {
        $keyword = $_GET['keyword'];
        $searchProduct =  getSeachProduct($keyword);
        redirect(BASE_URL . '?action=search-product&keyword=' . $keyword);
    }

    if (isset($_GET['fillter'])) {
    }
    require_once PATH_VIEW . 'layout/master.php';
}
