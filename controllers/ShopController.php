<?php
function shopProduct()
{
    $title = 'Danh sách sản phẩm có trong cửa hàng';
    $view = 'shop/products';
    $products = listAll('products');
    $countProduct = countProducts();
    $categories = listAll('categories');

    require_once PATH_VIEW . 'layout/master.php';
}

function shopProductDetail()
{
    $id = $_GET['id'];
    $product = showOneProduct($id);
    $title = 'Chi tiết sản phẩm';
    $view = 'shop/product-detail';
    $productAttributes = getProductAttributeForProduct($id);
    $sizes = array_column($productAttributes, 'ps_name', 'ps_id');
    $colors = array_column($productAttributes, 'pc_color', 'pc_id');
    $quantity = array_column($productAttributes, 'pa_quantity');
    $quantity = implode(',', $quantity);
    $thumbnails = explode(",", $product['ga_thumbnail']);
    $similarProducts =  similarProducts($product['c_id'], $id);
    require_once PATH_VIEW . 'layout/master.php';
}
