<?php
if (!function_exists('productHot')) {
    function productHot()
    {
        try {
            $sql = "SELECT * FROM products WHERE status = 1 AND hot = 1 ORDER BY view DESC LIMIT 6";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('newArrivalsProduct')) {
    function newArrivalsProduct()
    {
        try {
            $sql = "SELECT * FROM products WHERE status = 1 ORDER BY id DESC LIMIT 6";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('countProducts')) {
    function countProducts()
    {
        try {
            $sql = "SELECT COUNT(*) as count_product FROM products WHERE status = 1";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result['count_product'];
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('similarProducts')) {
    function similarProducts($categoryID, $productID)
    {
        try {
            $sql = "
            SELECT 
            p.id as p_id,
            p.name as p_name,
            p.price_regular as p_price_regular,
            p.discount as p_discount,
            p.img_thumbnail as p_img_thumbnail
            FROM products p
            INNER JOIN categories ca ON ca.id = p.category_id
            WHERE p.status = 1 AND ca.id = :category_id AND p.id <> :product_id ORDER BY p.id LIMIT 4";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":category_id", $categoryID);
            $stmt->bindParam(":product_id", $productID);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
