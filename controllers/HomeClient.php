<?php
function homeClient()
{
    $view = 'homeClient';
    $productHot = productHot();
    $productNewArrival = newArrivalsProduct();
    $imgThumbnail = imgThumbnail();
    $imgCover = imgCover();
    require_once PATH_VIEW . 'layout/master.php';
}
