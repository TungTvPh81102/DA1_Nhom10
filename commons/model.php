<?php
// CRUD -> Create /READ(Danh sách/Chi tiết) /Update /Delete
if (!function_exists('get_str_keys')) {
    function get_str_keys($data)
    {
        $keys = array_keys($data);

        $keysTenTen = array_map(function ($key) {
            return "`$key`";
        }, $keys);

        return implode(',', $keysTenTen);
    }
}

if (!function_exists('get_virtual_params')) {
    function get_virtual_params($data)
    {
        $keys = array_keys($data);

        $tmp = [];
        foreach ($keys as $key) {
            $tmp[] = ":$key";
        }

        return implode(',', $tmp);
    }
}

if (!function_exists('get_set_params')) {
    function get_set_params($data)
    {
        $keys = array_keys($data);

        $tmp = [];
        foreach ($keys as $key) {
            $tmp[] = "`$key` = :$key";
        }

        return implode(',', $tmp);
    }
}

if (!function_exists('insert')) {
    function insert($tableName, $data = [])
    {
        try {
            $strKey = get_str_keys($data);
            $virtulParams = get_virtual_params($data);

            $sql = "INSERT INTO $tableName($strKey) VALUES ($virtulParams)";
            $stmt = $GLOBALS['conn']->prepare($sql);
            foreach ($data as $fieldName => &$value) { // tham chiếu $value
                $stmt->bindParam(":$fieldName", $value);
            }
            return $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('insert_get_last_id')) {
    function insert_get_last_id($tableName, $data = [])
    {
        try {
            $strKey = get_str_keys($data);
            $virtulParams = get_virtual_params($data);

            $sql = "INSERT INTO $tableName($strKey) VALUES ($virtulParams)";
            $stmt = $GLOBALS['conn']->prepare($sql);
            foreach ($data as $fieldName => &$value) {
                $stmt->bindParam(":$fieldName", $value);
            }
            $stmt->execute();

            return $GLOBALS['conn']->lastInsertId();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('list')) {
    function listAll($tableName)
    {
        try {
            $sql = "SELECT * FROM $tableName ORDER BY id DESC";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}


if (!function_exists('showOne')) {
    function showOne($tableName, $id)
    {
        try {
            $sql = "SELECT * FROM $tableName WHERE id = :id LIMIT 1";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}


if (!function_exists('update')) {
    function update($tableName, $id, $data = [])
    {
        try {
            $setParams = get_set_params($data);
            $sql = "
            UPDATE $tableName 
            SET $setParams 
            WHERE id = :id
            ";
            $stmt = $GLOBALS['conn']->prepare($sql);
            foreach ($data as $fieldName => &$value) { // tham chiếu $value
                $stmt->bindParam(":$fieldName", $value);
            }
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('delete')) {
    function deleteRow($tableName, $id)
    {
        try {
            $sql = "DELETE FROM $tableName WHERE id = :id";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

// CHECK UNQIQUE NAME CREATE
if (!function_exists('checkUniqueName')) {
    function checkUniqueName($tableName, $name)
    {
        try {
            $sql = "SELECT * FROM $tableName WHERE name = :name LIMIT 1";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->execute();
            $data = $stmt->fetch();
            return empty($data) ? true : false;
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

// CHECK UNQIQUE NAME UPDATE

if (!function_exists('checkUniqueNameForUpdate')) {
    function checkUniqueNameForUpdate($tableName, $id, $name)
    {
        try {
            $sql = "SELECT * FROM $tableName WHERE name = :name AND id <> :id LIMIT 1";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $data = $stmt->fetch();
            return empty($data) ? true : false;
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

// Kích hoạt tài khoản
if (!function_exists('activeToken')) {
    function activeToken($token)
    {
        try {
            $sql = "SELECT id FROM users WHERE active_token = :active_token LIMIT 1";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':active_token', $token);
            $stmt->execute();
            return $stmt->fetch();
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
                p.hot as p_hot,
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

if (!function_exists('getUserbyEmail')) {
    function getUserbyEmail($email)
    {
        try {
            $sql = "SELECT * FROM users WHERE email = :email";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('getSizeName')) {
    function getSizeName($id)
    {

        try {
            $sql = "
            SELECT pz.name as pz_name FROM product_attribute pa
            INNER JOIN product_size pz ON pz.id = pa.size_id 
            WHERE pa.size_id = :size_id";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $data = [];
            foreach ($id as $sizeID) {
                $stmt->bindParam(':size_id', $sizeID);
                $stmt->execute();
                $data[] = $stmt->fetchColumn();
            }
            return $data;
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('getColorName')) {
    function getColorName($id)
    {

        try {
            $sql = "
            SELECT pc.name as pc_name FROM product_attribute pa
            INNER JOIN product_color pc ON pc.id = pa.color_id 
            WHERE pa.color_id = :color_id";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $data = [];
            foreach ($id as $colorID) {
                $stmt->bindParam(':color_id', $colorID);
                $stmt->execute();
                $data[] = $stmt->fetchColumn();
            }
            return $data;
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
