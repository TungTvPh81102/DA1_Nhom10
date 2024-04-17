<?php
function ajaxProduct()
{
    try {
        if (isset($_GET['id'])) {
            $productID = $_GET['id'];
            $priceData = getPriceProduct($productID);
            $price = $priceData['discount'] ? $priceData['discount'] : $priceData['price_regular'];
            $sizeID = getProductBySizeID($productID);
            $colorID = getProductByColorID($productID);
            $data = [
                'price' => $price,
                'sizes' => [],
                'colors' => [],
            ];
            foreach ($sizeID as $item) {
                $data['sizes'][] = [
                    'id' => $item['id'],
                    'name' => $item['name'],
                ];
            }
            foreach ($colorID as $item) {
                $data['colors'][] = [
                    'id' => $item['id'],
                    'name' => $item['name'],
                ];
            }
            echo json_encode($data);
        }

        if (!empty($_POST)) {
            // debug($_POST);

            $dataOrderDetail = [
                'order_id' => $_POST['order_id'],
                'product_id' => $_POST['product_id'],
                'quantity' => $_POST['quantity'],
                'price' => $_POST['price'],
                'size_id' => $_POST['size_id'],
                'color_id' => $_POST['color_id'],
            ];
            insert('order_detail', $dataOrderDetail);
        }
    } catch (Exception $e) {
        http_response_code(500);
    }
}
