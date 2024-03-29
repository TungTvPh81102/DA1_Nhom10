<?php

// if (!function_exists('getCartItemByProductSizeAndColor')) {
//     function getCartItemByProductSizeAndColor($cartID, $productID, $size, $color)
//     {
//         try {
//             $sql = "
//             SELECT * FROM cart_items 
//             WHERE cart_id = :cart_id AND
//             product_id = :product_id 
//             AND size = :size AND color = :color";

//             $stmt = $GLOBALS['conn']->prepare($sql);
//             $stmt->bindParam(':product_id', $productID);
//             $stmt->bindParam(':size', $size);
//             $stmt->bindParam(':color', $color);
//             $stmt->bindParam(':cart_id', $cartID);

//             $stmt->execute();
//             return $stmt->fetch();
//         } catch (Exception $e) {
//             debug($e);
//         }
//     }
// }

if (!function_exists('updateQuantityByCartIDProductSizeAndColor')) {
    function updateQuantityByCartIDProductSizeAndColor(
        $cartID,
        $productID,
        $size,
        $color,
        $newQuantity,
    ) {
        try {
            $sql = "
            UPDATE cart_items SET quantity = :quantity 
            WHERE cart_id = :cart_id AND 
            product_id = :product_id AND 
            size = :size AND 
            color = :color
            ";

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':quantity', $newQuantity);
            $stmt->bindParam(':cart_id', $cartID);
            $stmt->bindParam(':product_id', $productID);
            $stmt->bindParam(':size', $size);
            $stmt->bindParam(':color', $color);

            $stmt->execute();
        } catch (Exception $e) {
            debug($e);
        }
    }
}


if (!function_exists('deleteCartItemByCartIDAndProductID')) {
    function deleteCartItemByCartIDAndProductID(
        $cartID,
        $productID,
        $size,
        $color
    ) {
        try {
            $sql = "
            DELETE FROM cart_items
            WHERE cart_id = :cart_id 
            AND product_id = :product_id 
            AND size = :size
            AND color = :color
            ";

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':cart_id', $cartID);
            $stmt->bindParam(':product_id', $productID);
            $stmt->bindParam(':size', $size);
            $stmt->bindParam(':color', $color);

            $stmt->execute();
        } catch (Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('deleteCartItemByCartID')) {
    function deleteCartItemByCartID($cartID)
    {
        try {
            $sql = " DELETE FROM cart_items WHERE cart_id = :cart_id  ";

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':cart_id', $cartID);

            $stmt->execute();
        } catch (Exception $e) {
            debug($e);
        }
    }
}
