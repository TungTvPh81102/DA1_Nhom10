<?php

if (!function_exists('checkUniqueCode')) {
    function checkUniqueCode($tableName, $code)
    {
        try {
            $sql = "SELECT * FROM $tableName WHERE code = :code LIMIT 1";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':code', $code);
            $stmt->execute();
            $data = $stmt->fetch();
            return empty($data) ? true : false;
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('listAllProducts')) {
    function listAllProducts()
    {
        try {
            $sql = "
            SELECT 
            p.id as p_id,
            p.code as p_code, 
            p.name as p_name,
            p.img_thumbnail as p_img_thumbnail,
            p.status as p_status,
            p.created_at as p_created_at,
            p.updated_at as p_updated_at,
            c.name as c_name,
            b.name as b_name
            FROM products p 
            INNER JOIN categories c ON c.id = p.category_id 
            INNER JOIN brands b ON b.id = p.brand_id
            ORDER BY p.id DESC
        ";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('showOneProduct')) {
    function showOneProduct($id)
    {
        try {
            $sql = "
            SELECT 
            p.id as p_id,
            p.code as p_code, 
            p.name as p_name,
            p.img_thumbnail as p_img_thumbnail,
            p.over_view as p_over_view,
            p.price_regular as p_price_regular,
            p.discount as p_discount,
            p.status as p_status,
            p.created_at as p_created_at,
            p.updated_at as p_updated_at,
            c.name as c_name,
            b.name as b_name,
            GROUP_CONCAT(ga.thumbnail) as ga_thumbnail
            FROM products p 
            INNER JOIN categories c ON c.id = p.category_id 
            INNER JOIN brands b ON b.id = p.brand_id
            INNER JOIN gallerys ga ON ga.product_id = p.id
            WHERE p.id = :id LIMIT 1
        ";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('getProductAttributeForProduct')) {
    function  getProductAttributeForProduct($productID)
    {
        try {

            $sql = "
                SELECT 
                pa.quantity as pa_quantity, 
                GROUP_CONCAT(DISTINCT pz.name) as pz_name, 
                GROUP_CONCAT(pc.name) as pc_name, 
                GROUP_CONCAT(DISTINCT pc.color) as pc_color
                FROM product_attribute pa 
                JOin product_size pz ON pz.id = pa.size_id 
                JOIN product_color pc ON pc.id = pa.color_id
                where pa.product_id = :product_id
                GROUP BY pa.quantity, pc.name, pc.color
          ";

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":product_id", $productID);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            debug($e);
        }
    }
}


if (!function_exists('getSize')) {
    function getSize($productID)
    {
        try {
            $sql = "
            SELECT 
            DISTINCT (pz.name) as pz_name,
            pa.size_id as pa_size_id
            FROM product_attribute pa
            INNER JOIN product_size pz ON pz.id = pa.size_id
            WHERE pa.product_id = :product_id
        ";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":product_id", $productID);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('getColor')) {
    function getColor($productID)
    {
        try {
            $sql = "
            SELECT DISTINCT 
            pc.name as pc_name,
            pc.color as pc_color,
            pa.color_id as pa_color_id
            FROM product_attribute pa
            INNER JOIN product_color pc ON pc.id = pa.size_id
            WHERE pa.product_id = :product_id
        ";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":product_id", $productID);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('deleteProductAttribute')) {
    function deleteProductAttribute($productID)
    {
        try {
            $sql = "DELETE FROM product_attribute WHERE product_id = :product_id";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":product_id", $productID);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('deleteProductGallery')) {
    function deleteProductGallery($productID)
    {
        try {
            $sql = "DELETE FROM gallerys WHERE product_id = :product_id";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":product_id", $productID);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            debug($e);
        }
    }
}
