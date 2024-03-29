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
