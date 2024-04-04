<?php
function homeDashboard()
{
    $view = 'homeDashboard';
    $countOrder = statisticalOrders('orders');
    $countUser = statisticalOrders('users');
    $countProduct = statisticalOrders('products');
    $countBrand = statisticalOrders('brands');
    $totalRevenue = totalRevenue();
    $jsonData = json_encode($totalRevenue);
    $script = "chart";
    require_once PATH_VIEW_ADMIN . 'layout/master.php';
}
