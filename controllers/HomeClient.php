<?php
function homeClient()
{
    $view = 'homeClient';
    $productHot = productHot();
    $productNewArrival = newArrivalsProduct();
    $productSales = productSales();
    $imgThumbnail = imgThumbnail();
    $imgCover = imgCover();

    $keyImgCover = array_column($imgCover, 'id');
    $valueImgCover = array_column($imgCover, 'image');
    $dataImgCover = array_combine($keyImgCover, $valueImgCover);

    if (isset($_GET['search'])) {
        $keyword = $_GET['keyword'];
        $searchProduct =  getSeachProduct($keyword);
        redirect(BASE_URL . '?action=search-product&keyword=' . $keyword);
    }

    if (isset($_GET['fillter'])) {
    }
    require_once PATH_VIEW . 'layout/master.php';
}

function contact()
{
    $view = 'contact';
    $title = 'Contact Us';
    require_once PATH_VIEW . 'layout/master.php';
}

function privacyPolicy()
{
    $view = 'privacyPolicy';
    $title = 'Privacy Policy';
    require_once PATH_VIEW . 'layout/master.php';
}

function termsOfUse()
{
    $view = 'termsOfUse';
    $title = 'Terms Of Use';
    require_once PATH_VIEW . 'layout/master.php';
}
