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


if (!function_exists('checkUniqueCode')) {
    function checkUniqueCodeUpdate($tableName, $id, $code)
    {
        try {
            $sql = "SELECT * FROM $tableName WHERE code = :code WHERE id <> :id LIMIT 1";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':id', $id);
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
                p.description as p_description,
                p.price_regular as p_price_regular,
                p.discount as p_discount,
                p.status as p_status,
                p.view as p_view,
                p.created_at as p_created_at,
                p.updated_at as p_updated_at,
                c.name as c_name,
                c.id as c_id,
                b.name as b_name,
                b.id as b_id,
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
                ps.id as ps_id,
                ps.name as ps_name,
                pc.id as pc_id,
                pc.name as pc_name,
                pc.color as pc_color,
                pa.quantity as pa_quantity
                FROM `product_attribute` pa
                JOIN product_size ps ON ps.id = pa.size_id
                JOIN product_color pc ON pc.id = pa.color_id
                WHERE pa.product_id = :product_id 
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

if (!function_exists('updateQuantityBuy')) {
    function updateQuantityBuy($productID, $colorID, $sizeID, $quantity)
    {
        try {
            $sql = "
                UPDATE product_attribute SET quantity = :quantity
                WHERE product_id = :product_id and size_id = :size_id AND color_id = :color_id
            ";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":product_id", $productID);
            $stmt->bindParam(":color_id", $colorID);
            $stmt->bindParam(":size_id", $sizeID);
            $stmt->bindParam(":quantity", $quantity);
            $stmt->execute();
        } catch (Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('listAllGallerys')) {
    function listAllGallerys($productID)
    {
        try {
            $sql = "
                SELECT ga.thumbnail, p.img_thumbnail
                FROM gallerys ga 
                INNER JOIN products p ON p.id = ga.product_id
                WHERE ga.product_id = :id
            ";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":id", $productID);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            debug($e);
        }
    }
}
