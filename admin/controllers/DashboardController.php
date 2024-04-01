<?php
function homeDashboard()
{
    $view = 'homeDashboard';
    $countOrder = statisticalOrders('orders');
    $countUser = statisticalOrders('users');
    $countProduct = statisticalOrders('products');
    require_once PATH_VIEW_ADMIN . 'layout/master.php';
}
