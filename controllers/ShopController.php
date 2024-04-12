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

    if (isset($_GET['price-range']) && !empty($_GET['price-range'])) {
        $priceRange = $_GET['price-range'];
    } else {
        $priceRange = '';
    }

    $orderBy = 'DESC';
    if (isset($_GET['orderby']) && in_array($_GET['orderby'], ['price-asc', 'price-desc'])) {
        $orderBy = ($_GET['orderby'] == 'price-asc') ? 'ASC' : 'DESC';
    }
    $listProductShop = listAllProductShop($categoryID, $brandID, $priceRange, $orderBy);
    require_once PATH_VIEW . 'layout/master.php';
}

function shopProductDetail()
{
    $id = $_GET['id'];

    $product = showOneProduct($id);

    if (empty($product['p_id'])) {
        e404();
    }

    $title = 'Chi tiết sản phẩm';
    $view = 'shop/product-detail';

    $productAttributes = getProductAttributeForProduct($id);

    $sizeID = array_column($productAttributes, 'ps_id');
    $sizeName = array_column($productAttributes, 'ps_name');
    $sizes = array_combine($sizeName, $sizeID);

    $colorID = array_column($productAttributes, 'pc_id');
    $color = array_column($productAttributes, 'pc_color');
    $colors = array_combine($color, $colorID);

    $quantity = array_column($productAttributes, 'pa_quantity');
    $quantity = implode(',', $quantity);
    $thumbnails = $product['ga_thumbnail'] ? explode(",", $product['ga_thumbnail']) : [];

    // SẢN PHẨM CÙNG LOẠI
    $similarProducts =  similarProducts($product['c_id'], $id);

    // SỐ LƯỢT MUA
    $purchases = purchasesProduct($product['p_id']);

    require_once PATH_VIEW . 'layout/master.php';
}


function searchProduct()
{
    $title = 'Search Results';
    $view = 'shop/ResultSearch';
    if (isset($_GET['keyword']) && $_GET['keyword'] !== '') {
        $keyword = $_GET['keyword'];
    } else {
        $keyword = '';
    }

    $orderBy = 'DESC';
    if (isset($_GET['orderby']) && in_array($_GET['orderby'], ['price-asc', 'price-desc'])) {
        $orderBy = ($_GET['orderby'] == 'price-asc') ? 'ASC' : 'DESC';
    }

    $searchProduct = getSeachProduct($keyword, $orderBy);
    require_once PATH_VIEW . 'layout/master.php';
}
