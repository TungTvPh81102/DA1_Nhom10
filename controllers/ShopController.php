<?php

function shopProduct()
{
    $title = 'Danh sách sản phẩm có trong cửa hàng';
    $view = 'shop/products';
    $countProduct = countProducts();
    $categories = listAll('categories');
    $brands = listAll('brands');
    if (isset($_GET['category-id']) && ($_GET['category-id'] > 0)) {
        $categoryID = $_GET['category-id'];
    } else {
        $categoryID = 0;
    }
    if (isset($_GET['brand-id']) && ($_GET['brand-id'] > 0)) {
        $brandID = $_GET['brand-id'];
    } else {
        $brandID = 0;
    }
    $orderBy = 'DESC';
    if (isset($_GET['orderby']) && in_array($_GET['orderby'], ['price-asc', 'price-desc'])) {
        $orderBy = ($_GET['orderby'] == 'price-asc') ? 'ASC' : 'DESC';
    }
    $listProductShop = listAllProductShop($categoryID, $brandID, $orderBy);
    require_once PATH_VIEW . 'layout/master.php';
}

function shopProductDetail()
{
    $id = $_GET['id'];
    $product = showOneProduct($id);
    $title = 'Chi tiết sản phẩm';
    $view = 'shop/product-detail';
    $productAttributes = getProductAttributeForProduct($id);

    $sizeID = array_column($productAttributes, 'ps_id');
    $sizeName = array_column($productAttributes, 'ps_name');
    $sizes = array_combine($sizeID, $sizeName);


    $colorID = array_column($productAttributes, 'pc_name');
    $colorName = array_column($productAttributes, 'pc_color');
    $colors = array_combine($colorID, $colorName);

    $quantity = array_column($productAttributes, 'pa_quantity');
    $quantity = implode(',', $quantity);
    $thumbnails = explode(",", $product['ga_thumbnail']);
    $similarProducts =  similarProducts($product['c_id'], $id);
    require_once PATH_VIEW . 'layout/master.php';
}

function searchProduct()
{
    $title = 'Search Results';
    $view = 'shop/ResultSearch';
    require_once PATH_VIEW . 'layout/master.php';
}
