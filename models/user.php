<?php
if (!function_exists('checkUniqueEmail')) {
    function checkUniqueEmail($tableName, $email)
    {
        try {
            $sql = "SELECT * FROM $tableName WHERE email = :email LIMIT 1";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $data = $stmt->fetch();
            return empty($data) ? true : false;
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('checkUniqueEmailForUpdate')) {
    function checkUniqueEmailForUpdate($tableName, $id, $email)
    {
        try {
            $sql = "SELECT * FROM $tableName WHERE email = :email AND id <> :id LIMIT 1";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $data = $stmt->fetch();
            return empty($data) ? true : false; // Nếu mà email trùng lặp thì -> false. Còn rỗng nghĩa là ko trùng thì true
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('checkPasswordUpdate')) {
    function checkPasswordUpdate($password)
    {
        try {
            $sql = "SELECT * FROM users WHERE password = :password LIMIT 1";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}


if (!function_exists('getIdUser')) {
    function getIdUser($email)
    {
        try {
            $sql = "SELECT id, status FROM users WHERE email = :email LIMIT 1";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}


if (!function_exists('getUserClient')) {
    function getUserClient($data)
    {
        try {
            $sql = "SELECT * FROM users WHERE email = :email";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':email', $data['email']);
            $stmt->execute();
            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }   
    }
}

if (!function_exists('getForgotToken')) {
    function getForgotToken($token)
    {
        try {
            $sql = "SELECT id, email FROM users WHERE forgot_token = :forgot_token LIMIT 1";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':forgot_token', $token);
            $stmt->execute();
            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
