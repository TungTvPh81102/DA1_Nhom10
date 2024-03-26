<?php
if (!function_exists('imgThumbnail')) {
    function imgThumbnail()
    {
        try {
            $sql = "SELECT * FROM banners WHERE status = 1 AND classify = 0 ORDER BY id DESC LIMIT 3";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('imgCover')) {
    function imgCover()
    {
        try {
            $sql = "SELECT * FROM banners WHERE status = 1 AND classify = 1 ORDER BY id DESC";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
