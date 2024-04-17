<?php
if (!function_exists('getProductBySizeID')) {
    function getProductBySizeID($productID)
    {
        try {
            $sql = "SELECT * FROM product_attribute pa INNER JOIN products p
            ON p.id = pa.product_id 
            INNER JOIN product_size pz ON pz.id = pa.size_id
            WHERE pa.product_id = :id";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':id', $productID);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            debug($e);
        }
    }
}
if (!function_exists('getProductByColorID')) {
    function getProductByColorID($productID)
    {
        try {
            $sql = "SELECT * FROM product_attribute pa INNER JOIN products p
            ON p.id = pa.product_id 
            INNER JOIN product_color pc ON pc.id = pa.color_id
            WHERE pa.product_id = :id";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':id', $productID);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('getPriceProduct')) {
    function getPriceProduct($productID)
    {
        try {
            $sql = "SELECT price_regular, discount FROM products 
            WHERE id = :id";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':id', $productID);
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $e) {
            debug($e);
        }
    }
}
