<?php
function addToCart()
{
    if (!empty($_POST)) {
        debug($_POST);
    }
}

function viewCart()
{
    $view = 'cart/viewCart';
    require_once PATH_VIEW . 'layout/master.php';
}
