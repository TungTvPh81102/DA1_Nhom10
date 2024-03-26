<?php
if (!function_exists('checkUniqueCategory')) {
    function checkUniqueCategory($tableName, $name)
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

if (!function_exists('checkUniqueCategoryForUpdate')) {
    function checkUniqueCategoryForUpdate($tableName, $id, $name)
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
