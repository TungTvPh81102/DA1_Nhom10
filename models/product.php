<?php
if (!function_exists('listAllProductShop')) {
    function listAllProductShop($categoryID, $brandID, $priceRange, $orderBy = 'DESC')
    {

        try {


            $sql = "SELECT p.*, ca.name as ca_name, b.name as b_name FROM products p
            INNER JOIN categories ca ON ca.id = p.category_id
            INNER JOIN brands b ON b.id = p.brand_id WHERE 1
            ";

            if ($categoryID || $brandID) {
                if (!empty($categoryID)) {
                    $sql .= " AND ca.id = :categoryID";
                }

                if (!empty($brandID)) {
                    $sql .= " AND b.id = :brandID";
                }
            }

            if (!empty($priceRange)) {
                match ($priceRange) {
                    '1'  => $sql .= " AND p.price_regular < 100000",
                    '2'  => $sql .= " AND p.price_regular BETWEEN 100000 AND 300000",
                    '3'  =>  $sql .= " AND p.price_regular > 300000",
                    default => e404()
                };
            }

            $sql .= " ORDER BY p.price_regular $orderBy";

            $stmt = $GLOBALS['conn']->prepare($sql);

            if (!empty($categoryID)) {
                $stmt->bindParam(':categoryID', $categoryID);
            }

            if (!empty($brandID)) {
                $stmt->bindParam(':brandID', $brandID);
            }

            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}


if (!function_exists('productHot')) {
    function productHot()
    {
        try {
            $sql = "SELECT * FROM products WHERE status = 1 AND hot = 1 ORDER BY view DESC LIMIT 6";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('newArrivalsProduct')) {
    function newArrivalsProduct()
    {
        try {
            $sql = "SELECT * FROM products WHERE status = 1 ORDER BY id DESC LIMIT 6";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('productSales')) {
    function productSales()
    {
        try {
            $sql = "SELECT * FROM products WHERE status = 1  AND discount > 0 ORDER BY discount DESC LIMIT 6";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('countProducts')) {
    function countProducts()
    {
        try {
            $sql = "SELECT COUNT(*) as count_product FROM products WHERE status = 1";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result['count_product'];
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('similarProducts')) {
    function similarProducts($categoryID, $productID)
    {
        try {
            $sql = "
            SELECT 
            p.id as p_id,
            p.name as p_name,
            p.price_regular as p_price_regular,
            p.discount as p_discount,
            p.img_thumbnail as p_img_thumbnail
            FROM products p
            INNER JOIN categories ca ON ca.id = p.category_id
            WHERE p.status = 1 AND ca.id = :category_id AND p.id <> :product_id ORDER BY p.id LIMIT 4";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":category_id", $categoryID);
            $stmt->bindParam(":product_id", $productID);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('getSeachProduct')) {
    function getSeachProduct($keyword, $orderBy = 'DESC')
    {
        try {

            $sql = "SELECT * FROM products";

            if ($keyword) {
                $sql .= " WHERE (name LIKE '%$keyword%' OR over_view LIKE '%$keyword%' OR description LIKE '%$keyword%')";
            }

            if ($orderBy) {
                $sql .= " ORDER BY price_regular $orderBy";
            }

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('updateViewProduct')) {
    function updateViewProduct($productID, $view)
    {
        try {
            $newView = $view + 1;
            $sql = "UPDATE products SET view = :newView WHERE id = :product_id";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":product_id", $productID);
            $stmt->bindParam(":newView", $newView);
            $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('purchasesProduct')) {
    function purchasesProduct($productID)
    {
        try {
            $sql = "
            SELECT COUNT(o.product_id) AS purchases
            FROM order_detail o
            INNER JOIN products p ON p.id = o.product_id
            WHERE p.id = :product_id
            ";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":product_id", $productID);
            $stmt->execute();
            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
