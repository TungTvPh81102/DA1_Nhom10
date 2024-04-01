<?php

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
