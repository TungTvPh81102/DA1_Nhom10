<?php
if (!function_exists('cartDetail')) {
    function cartDetail($user_id)
    {
        try {
            // $sql = "
            //     SELECT
            //     p.name as p_name,
            //     p.img_thumbnail as p_img_thumbnail,
            //     p.price_regular as p_price_regular,
            //     p.discount as p_discount,
            //     ca.quantity as ca_quantity,
            //     ca.size as ca_size,
            //     ca.color as ca_color
            //     FROM `cart_items` ca 
            //     INNER JOIN carts c ON c.id = ca.cart_id
            //     INNER JOIN products p ON ca.product_id = p.id
            //     WHERE ca.cart_id = :cart_id;
            // ";

            $sql = "
                SELECT
                p.id as p_id,
                p.name as p_name,
                p.img_thumbnail as p_img_thumbnail,
                p.price_regular as p_price_regular,
                p.discount as p_discount,
                ca.quantity as ca_quantity,
                ca.size as ca_size,
                ca.color as ca_color,
                ca.cart_id as ca_cart_id
                FROM `cart_items` ca 
                INNER JOIN carts c ON c.id = ca.cart_id
                INNER JOIN products p ON ca.product_id = p.id
                WHERE c.user_id = :user_id";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('updateTotalMoneyOrder')) {
    function updateTotalMoneyOrder($id, $totalMoney)
    {
        try {
            $sql = "UPDATE orders SET total_money = :total_money WHERE id = :id";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":total_money", $totalMoney);
            $stmt->execute();
        } catch (Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('deleteCartItems')) {
    function deleteCartItems($cartID)
    {
        try {
            $sql = "DELETE FROM cart_items WHERE cart_id = :cart_id";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':cart_id', $cartID);
            $stmt->execute();
        } catch (Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('deleteCarts')) {
    function deleteCarts($userID)
    {
        try {
            $sql = "DELETE FROM carts WHERE user_id = :user_id";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':user_id', $userID);
            $stmt->execute();
        } catch (Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('getOrdersID')) {
    function getOrdersID($id)
    {
        try {
            $sql = "SELECT id FROM orders WHERE id = :id";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $e) {
            debug($e);
        }
    }
}

