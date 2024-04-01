<?php
if (!function_exists('checkCodeCouponCreate')) {
    function checkCodeCouponCreate($code)
    {
        try {
            $sql = "SELECT * FROM coupons WHERE code = :code LIMIT 1";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':code', $code);
            $stmt->execute();
            $data = $stmt->fetch();
            return empty($data) ? true : false;
        } catch (Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('checkCodeCouponUpdate')) {
    function checkCodeCouponUpdate($id, $code)
    {
        try {
            $sql = "SELECT * FROM coupons WHERE code = :code AND id <> :id LIMIT 1";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':code', $code);
            $stmt->execute();
            $data = $stmt->fetch();
            return empty($data) ? true : false;
        } catch (Exception $e) {
            debug($e);
        }
    }
}
