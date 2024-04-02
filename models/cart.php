<?php
if (!function_exists('getCartID')) {
    function getCartID($userID)
    {

        // Lấy dữ liệu trong db
        $cart = getCartByUserID($userID);

        if (empty($cart)) { // chưa có bản ghi nào trong carts => tạo dữ liệu mới
            return  insert_get_last_id('carts', ['user_id' => $userID]);
        }

        return $cart['id'];
    }
}

if (!function_exists('getCartByUserID')) {
    function getCartByUserID($userID)
    {

        try {
            $sql = "SELECT * FROM carts WHERE user_id = :user_id LIMIT 1";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':user_id', $userID);
            $stmt->execute();
            return $stmt->fetch();  // có thì trả về dữ liệu đã có trong carts
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('getViewCart')) {
    function getViewCart($userID)
    {
        try {

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
            $stmt->bindParam(':user_id', $userID);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('checkCoupon')) {
    function checkCoupon($code)
    {

        try {
            $sql = "SELECT * FROM coupons WHERE code = :code  LIMIT 1";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':code', $code);
            $stmt->execute();
            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
