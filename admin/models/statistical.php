<?php

if (!function_exists('listAllOrder')) {
    function listAllOrder($fromDate, $toDate)
    {
        try {
            if (!empty($fromDate) && !empty($toDate)) {

                $sql = "
                SELECT SUM(ods.quantity) as total_quantity, SUM(od.total_money) as total, od.order_date FROM order_detail ods
                INNER JOIN orders od ON od.id = ods.order_id
                WHERE od.order_date BETWEEN '$fromDate' AND '$toDate'
                GROUP BY od.order_date
                ORDER BY od.order_date DESC
                ";
            }
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}


if (!function_exists('statisticalOrders')) {
    function statisticalOrders($tableName)
    {
        try {
            $sql = "SELECT count(*) as count FROM $tableName";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('statisProducts')) {
    function statisProducts()
    {
        try {
            $sql = "SELECT name,view FROM products WHERE status = 1 AND view > 0 ORDER BY view DESC LIMIT 10";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('statisProductsByCategoryAndBrand')) {
    function statisProductsByCategoryAndBrand()
    {
        try {
            $sql = "
            SELECT c.name as c_name, b.name as b_name, COUNT(*) as quantity,
            MAX(p.price_regular) as p_max_price,
            MIN(p.price_regular) as p_min_price,
            AVG(p.price_regular) as p_avg_price
            FROM products p 
            INNER JOIN categories c ON c.id = p.category_id
            INNER JOIN brands b ON b.id = p.brand_id
            GROUP BY c.name, b.name
            ";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('statisProductByOrder')) {
    function statisProductByOrder()
    {
        try {
            $sql = " SELECT p.name as p_name, o.quantity as o_quantity FROM order_detail o
            INNER JOIN products p ON p.id = o.product_id GROUP BY p.id, o.quantity LIMIT 10
            ";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('totalRevenue')) {
    function totalRevenue()
    {
        try {
            $sql = "
            SELECT SUM(ods.quantity) as total_quantity, SUM(o.total_money) as total, o.order_date
            FROM order_detail ods 
            INNER JOIN orders o ON o.id = ods.order_id 
            GROUP BY o.order_date;
            ";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
