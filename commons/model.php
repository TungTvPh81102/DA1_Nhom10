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
