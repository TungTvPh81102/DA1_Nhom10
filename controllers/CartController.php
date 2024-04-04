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
                    $checkProduct = true;
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
    $today = date('Y-m-d');
    if (!empty($_SESSION['cart'])) {
        if (!empty($_POST)) {
            $coupon = checkCoupon($_POST['code']);
            if (is_array($coupon) && !empty($coupon) && ($coupon['quantity'] > 0)) {
                // TẠO MẢNG MÃ GIẢM GIÁ NẾU CÓ 
                $dataCoupon = [
                    'id' => $coupon['id'],
                    'code' => $coupon['code'],
                    'quantity' => $coupon['quantity'],
                    'number' => $coupon['number'],
                    'condition' => $coupon['condition'],
                    'created_at' => $coupon['created_at'],
                    'expires_at' => $coupon['expires_at'],
                    'maximum_percent' => $coupon['maximum_percent']
                ];
                // KIỂM TRA XEM MÃ GIẢM GIÁ CÒN HẠN SỬ DỤNG HAY KHÔNG
                if ($today >= $dataCoupon['created_at'] && $today <= $dataCoupon['expires_at'] && !empty($dataCoupon['number'])) {
                    $_SESSION['coupon'] = $dataCoupon;
                    $_SESSION['success'] = 'Thêm mã giảm giá thành công';
                } else {
                    unset($_SESSION['coupon']);
                    $_SESSION['errors'] = 'Mã đã hết hạn sử dụng, hoặc hết số lượng, vui lòng nhập mã khác';
                }
            } else {
                unset($_SESSION['coupon']);
                $_SESSION['errors'] = 'Mã giảm giá không tồn tại hoặc đã hết hạn';
            }
        }
    }
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
    $sizeID = $_GET['sizeID'];
    $colorID = $_GET['colorID'];

    // Kiểm tra sản phẩm có tồn tại không
    $product = showOne('products', $productID);
    if (empty($product)) {
        e404();
    }

    // Xóa bản ghi trong session và cart_items
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['id'] == $productID && $item['size'] == $sizeID && $item['color'] == $colorID) {
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
