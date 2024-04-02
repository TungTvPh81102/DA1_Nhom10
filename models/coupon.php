<?php
if (!function_exists('updateQuantityCoupon')) {
    function updateQuantityCoupon($id, $quantity)
    {
        try {
            if ($quantity > 0) {
                $sql = "UPDATE coupons SET quantity = quantity - :quantity WHERE id = :id";
            }
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':quantity', $quantity);
            $stmt->execute();
        } catch (Exception $e) {
            debug($e);
        }
    }
}
