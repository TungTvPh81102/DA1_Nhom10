<?php
function addToCart()
{
    if (!empty($_POST)) {
        $productID = $_POST['product_id'] ?? null;
        $quantity = $_POST['quantity'] ?? 1;
        $size = $_POST['size_id'] ?? null;
        $color = $_POST['color_id'] ?? null;

        $product = showOne('products', $productID);

        if (empty($product)) {
            e404();
        }

        // Kiểm tra xem user đăng nhập có bản ghi nào trong carts
        $cartID = getCartID($_SESSION['user']['id']);
        $_SESSION['cartID'] = $cartID;

        // Tìm kiếm xem sản phẩm đã tồn tại trong giỏ hàng chưa
        $checkProduct = false;
        if (!empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $item) {
                if ($item['id'] == $productID && $item['size'] == $size && $item['color'] == $color) {
                    // Nếu sản phẩm đã tồn tại, cập nhật số lượng
                    $_SESSION['cart'][$key]['quantity'] += $quantity;
                    $focheckProduct = true;
                    break;
                }
            }
        }

        // Nếu sản phẩm không tồn tại trong giỏ hàng, thêm mới
        if (!$checkProduct) {
            $productDetails = [
                'id' => $product['id'],
                'name' => $product['name'],
                'img_thumbnail' => $product['img_thumbnail'],
                'price_regular' => $product['price_regular'],
                'discount' => $product['discount'],
                'quantity' => $quantity,
                'size' => $size,
                'color' => $color,
            ];

            // Thêm vào giỏ hàng
            $_SESSION['cart'][] = $productDetails;
        }

        // Cập nhật hoặc thêm mới vào cơ sở dữ liệu
        if (!empty($cartID)) {
            if ($checkProduct) {
                // Nếu sản phẩm đã tồn tại, cập nhật số lượng trong cơ sở dữ liệu
                // Cập nhật số lượng trong bảng cart_items
                updateQuantityByCartIDProductSizeAndColor($cartID, $productID, $size, $color, $item['quantity']);
            } else {
                // Nếu sản phẩm tạo truy vấn mới cart_items
                $data = [
                    'cart_id' => $cartID,
                    'product_id' => $productID,
                    'quantity' => $quantity,
                    'size' => $size,
                    'color' => $color,
                    'created_at' => date('Y-m-d H:i:s'),
                ];
                $cartItemID =  insert_get_last_id('cart_items', $data);
                $_SESSION['cart_item_id'] = $cartItemID;
            }
        }

        $_SESSION['success'] = 'Thêm sản phẩm vào giỏ hàng thành công';
        redirect(BASE_URL . '?action=view-cart');
        exit();
    }
}


function viewCart()
{
    $view = 'cart/viewCart';
    // unset($_SESSION['cart']);
    // debug($_SESSION['cart']);
    require_once PATH_VIEW . 'layout/master.php';
}

function cartInc()
{
    $productID = $_GET['productID'];
    // Kiểm tra sản phẩm có tồn tại không
    $product = showOne('products', $productID);

    if (empty($product)) {
        e404();
    }

    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['id'] == $productID) {
                $item['quantity'] += 1;
                updateQuantityByCartIDProductSizeAndColor($_SESSION['cartID'], $productID, $item['size'], $item['color'], $item['quantity']);
                break;
            }
        }
    }
    redirect(BASE_URL . '?action=view-cart');
    exit();
}

function cartDes()
{
    $productID = $_GET['productID'];
    // Kiểm tra sản phẩm có tồn tại không
    $product = showOne('products', $productID);

    if (empty($product)) {
        e404();
    }

    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['id'] == $productID) {

                $_SESSION['cart'][$key]['quantity'] -= 1;

                // Đảm bảo số lượng không nhỏ hơn 1
                if ($_SESSION['cart'][$key]['quantity'] < 1) {
                    $_SESSION['cart'][$key]['quantity'] = 1;
                }
                // Cập nhật số lượng trong cơ sở dữ liệu
                updateQuantityByCartIDProductSizeAndColor($_SESSION['cartID'], $productID, $item['size'], $item['color'], $_SESSION['cart'][$key]['quantity']);
                break;
            }
        }
    }
    redirect(BASE_URL . '?action=view-cart');
    exit();
}


function cartDel()
{
    $productID = $_GET['productID'];

    // Kiểm tra sản phẩm có tồn tại không
    $product = showOne('products', $productID);
    if (empty($product)) {
        e404();
    }

    // Xóa bản ghi trong session và cart_items
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['id'] == $productID) {
                unset($_SESSION['cart'][$key]);

                // Xóa bản ghi trong cart_items 
                if (!empty($_SESSION['cartID'])) {
                    deleteCartItemByCartIDAndProductID($_SESSION['cartID'], $productID, $item['size'], $item['color']);
                }
                break;
            }
        }
    }


    $_SESSION['success'] = 'Xóa sản phẩm thành công';
    redirect(BASE_URL . '?action=view-cart');
    exit();
}
