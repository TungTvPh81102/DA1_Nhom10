<?php
function statisticalManagement()
{
    $title = 'Quản lý thống kê';
    $view = "statistical/indexView";
    $script = '../scripts/e-chart';
    $script2 = '../scripts/data-table';
    $script3 = "../scripts/chart";
    $style = '../styles/e-chart';
    $style2 = '../styles/data-table';
    $totalRevenue = totalRevenue();
    $totalProducts = statisticalOrders('products');
    $totalCategories = statisticalOrders('categories');
    $totalBrands = statisticalOrders('brands');
    $totalUsers = statisticalOrders('users');
    $productView = statisProducts();
    $productByCategory = statisProductsByCategoryAndBrand();
    $productByOrder = statisProductByOrder();

    require_once PATH_VIEW_ADMIN . 'layout/master.php';
}

function statisticalAjax()
{
    try {
        if (!empty($_POST)) {
            $fromDay = $_POST['fromDay'];
            $toDay = $_POST['toDay'];
            $data = listAllOrder($fromDay, $toDay);
            echo json_encode($data);
        }
    } catch (Exception $e) {
        http_response_code(500, $e->getMessage());
    }
}
