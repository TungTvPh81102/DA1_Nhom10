<?php
if (!function_exists('listAllUserOrder')) {
    function listAllUserOrder($userID)
    {
        try {
            $sql = "SELECT * FROM orders WHERE user_id = :user_id";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':user_id', $userID);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('orderDetail')) {
    function orderDetail($order_id)
    {
        try {
            $sql = "
                SELECT 
                p.id as p_id, 
                p.name as p_name,
                p.code as p_code,
                p.img_thumbnail as p_img_thumbnail,
                od.price as od_price,
                od.quantity as ods_quantity,
                od.size_id as od_size_id,
                od.color_id as od_color_id,
                ods.status_delivery as ods_status_delivery,
                ods.total_money as ods_total_money
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

if (!function_exists('orderCustomer')) {
    function orderCustomer($id)
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


if (!function_exists('updateStatusOrder')) {
    function updateStatusOrder($id, $status, $updateAt)
    {
        try {
            $sql = "
            UPDATE orders SET 
            status_delivery = :status_delivery, 
            updated_at = '$updateAt' WHERE id = :id";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':status_delivery', $status);
            $stmt->execute();
        } catch (Exception $e) {
            debug($e);
        }
    }
}
