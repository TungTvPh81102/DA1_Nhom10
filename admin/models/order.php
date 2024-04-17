<?php
if (!function_exists('getStatusOrderById')) {
    function getStatusOrderById($id)
    {
        try {
            $sql = "SELECT status_delivery FROM orders WHERE id = :id LIMIT 1";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('updateStatusOrderById')) {
    function updateStatusOrderById($id, $status, $updatedAt)
    {
        try {
            $sql = "UPDATE orders SET status_delivery = :status_delivery, updated_at = '$updatedAt' WHERE id = :id";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':status_delivery', $status);
            $stmt->execute();
        } catch (Exception $e) {
            debug($e);
        }
    }
}


if (!function_exists('showOrderDetail')) {
    function showOrderDetail($order_id)
    {
        try {
            $sql = "
                SELECT 
                p.id as p_id,
                p.name as p_name,
                p.code as p_code,
                p.img_thumbnail as p_img_thumbnail,
                od.price as od_price,
                od.id as od_id,
                od.size_id as od_size_id,
                od.color_id as od_color_id,
                od.quantity as od_quantity,
                ods.id as ods_id,
                ods.status_delivery as ods_status_delivery
                FROM `order_detail` od
                INNER JOIN orders ods ON ods.id = od.order_id
                INNER JOIN products p ON p.id = od.product_id
                WHERE od.order_id = :order_id
            ";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':order_id', $order_id);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('orderByCustomer')) {
    function orderByCustomer($id)
    {
        try {
            $sql = "SELECT * FROM orders WHERE id = :id";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $e) {
            debug($e);
        }
    }
}
