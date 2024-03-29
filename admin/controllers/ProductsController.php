<?php
function productsList()
{
    $title = "Danh sách sản phẩm có trên hệ thống";
    $view = "products/indexView";
    $script = "../scripts/data-table";
    $style = "../styles/data-table";
    $products = listAllProducts();
    require_once PATH_VIEW_ADMIN  . "layout/master.php";
}

function productsCreate()
{
    $title = "Thêm mới sản phẩm";
    $view = "products/createView";
    $script = "../scripts/drop-zone";
    $script2 = "../scripts/tiny-editor";
    $script3 = "../scripts/create-script";
    $style = "../styles/select";

    $categories = listAll('categories');
    $brands = listAll('brands');
    $colors = listAll('product_color');
    $sizes = listAll('product_size');

    if (!empty($_POST)) {
        $data = [
            'code' => $_POST['code'] ?? null,
            'name' => $_POST['name'] ?? null,
            'category_id' => $_POST['category_id'] ?? null,
            'brand_id' => $_POST['brand_id'] ?? null,
            'img_thumbnail' => get_file_upload('img_thumbnail'),
            'over_view' => $_POST['over_view'] ?? null,
            'description' => $_POST['description'] ?? null,
            'price_regular' => $_POST['price_regular'] ?? null,
            'discount' => $_POST['discount'] ?? null,
            'status' => $_POST['status'] ?? null,
            'created_at' => date('Y-m-d H:i:s')
        ];

        validateProductCreate($data);

        $imgThumbnail = $data['img_thumbnail'];
        if (is_array($imgThumbnail)) {
            $data['img_thumbnail'] = upload_file($imgThumbnail, "uploads/products/");
        }

        try {
            // Bắt đầu phiên giao dịch
            $GLOBALS['conn']->beginTransaction();

            // Lấy giá trị id của sản phẩm sau khi thêm
            $productID = insert_get_last_id('products', $data);

            // Xử lý thêm ảnh sản phẩm
            $thumbnails = get_file_upload('thumbnails');
            if (is_array($thumbnails['name'])) {
                foreach ($thumbnails['name'] as $key => $value) {
                    $file = [
                        'name' => $value,
                        'tmp_name' => $thumbnails['tmp_name'][$key]
                    ];

                    $uploadFile = upload_file($file, "uploads/products/gallerys/");
                    if ($uploadFile) {
                        $dataGallerys = [
                            'product_id' => $productID,
                            'thumbnail' => $uploadFile,
                            'created_at' => date('Y-m-d H:i:s')
                        ];
                        insert('gallerys', $dataGallerys);
                    }
                }
            }

            // Xử lý size và kích thước 
            $sizeID = $_POST['size_id'] ?? null;
            $colorID = $_POST['color_id'] ?? null;
            echo '<pre>';
            print_r($colorID);
            if (!empty($sizeID) && !empty($colorID)) {
                foreach ($sizeID as $sizeKey => $size) {
                    $colorValue = $colorID[$sizeKey];
                    $quantity = $_POST['quantity'][$sizeKey];
                    $dataProductAttribute = [
                        'product_id' => $productID,
                        'color_id' => $colorValue,
                        'size_id' => $size,
                        'quantity' => $quantity,
                    ];

                    insert('product_attribute', $dataProductAttribute);
                }
            }
            // Nếu truy vấn thành công ko xảy ra lỗi -> tiến hành commit
            $GLOBALS['conn']->commit();
        } catch (Exception $e) {
            // Lỗi xảy ra quay lại trạng thái bắt đầu phiên làm việc
            $GLOBALS['conn']->rollBack();

            // Xóa đường dẫn ảnh nếu có lỗi
            if (is_array($imgThumbnail) && !empty($data['img_thumbnail']) && file_exists(PATH_UPLOAD . $data['img_thumbnail'])) {
                unlink(PATH_UPLOAD . $data['img_thumbnail']);
            }

            if (is_array($thumbnails) && !empty($data['thumbnail']) && file_exists(PATH_UPLOAD . $data['thumbnail'])) {
                unlink(PATH_UPLOAD . $data['thumbnail']);
            }

            debug($e);
        }
        $_SESSION['success'] = 'Thêm sản phẩm thành công';
        redirect(BASE_URL_ADMIN . "?action=products-list");
        exit();
    }

    require_once PATH_VIEW_ADMIN  . "layout/master.php";
}

function productDetail()
{
    $id = $_GET['id'];
    $product = showOneProduct($id);

    if (empty($product)) {
        e404();
    }

    $title = "Chi tiết sản phẩm: " . $product['p_name'];
    $view = "products/showView";

    $productAttributes = getProductAttributeForProduct($id);
    $sizeID = array_column($productAttributes, 'ps_id');
    $sizeName = array_column($productAttributes, 'ps_name');
    $sizes = array_combine($sizeID, $sizeName);


    $colorID = array_column($productAttributes, 'pc_id');
    $colorName = array_column($productAttributes, 'pc_name');
    $colors = array_combine($colorID, $colorName);

    $arrayQuantity = array_column($productAttributes, 'pa_quantity');
    $quantity = implode(',', $arrayQuantity);
    $thumbnails = explode(",", $product['ga_thumbnail']);

    require_once PATH_VIEW_ADMIN  . "layout/master.php";
}

function productUpdate()
{
    $id = $_GET['id'];
    $product = showOneProduct($id);
    if (empty($product)) {
        e404();
    }

    $title = "Cập nhật sản phẩm: " . $product['p_name'];
    $view = "products/updateView";
    $script = "../scripts/drop-zone";
    $script2 = "../scripts/tiny-editor";
    $script3 = "../scripts/create-script";
    $style = "../styles/select";

    $categories = listAll('categories');
    $brands = listAll('brands');
    $sizeAll = listAll('product_size');
    $colorAll = listAll('product_color');
    $productAttributes = getProductAttributeForProduct($id);
    $arrayQuantity = array_column($productAttributes, 'pa_quantity');
    $quantity =  implode(',', array_unique($arrayQuantity));
    $sizes = array_column($productAttributes, 'ps_id', 'ps_name');
    $colors = array_column($productAttributes, 'pc_id', 'pc_name');
    $thumbnails = explode(",", $product['ga_thumbnail']);

    if (!empty($_POST)) {

        $data = [
            'code' => $_POST['code'] ?? $product['p_id'],
            'name' => $_POST['name'] ?? $product['p_code'],
            'category_id' => $_POST['category_id'] ?? $product['c_id'],
            'brand_id' => $_POST['brand_id'] ?? $product['b_id'],
            'img_thumbnail' => get_file_upload('img_thumbnail') ?? $product['p_img_thumbnail'],
            'over_view' => $_POST['over_view'] ?? $product['p_over_view'],
            'description' => $_POST['description'] ?? $product['p_description'],
            'price_regular' => $_POST['price_regular'] ?? $product['p_regular'],
            'discount' => $_POST['discount'] ?? $product['p_discount'],
            'status' => $_POST['status'] ?? $product['p_status'],
            'view' => $_POST['view'] ?? null,
            'hot' => $_POST['hot'] ?? $product['p_hot'],
            'updated_at' => date('Y-m-d H:i:s')
        ];


        validateProductUpdate($id, $data);

        $imgThumbnail = $data['img_thumbnail'];
        if (is_array($imgThumbnail)) {
            $data['img_thumbnail'] = upload_file($imgThumbnail, "uploads/products/");
        }

        try {
            $GLOBALS['conn']->beginTransaction();

            update('products', $id, $data);

            deleteProductGallery($id);

            $thumbnails = explode(",", $product['ga_thumbnail']);

            $uploadThumbnails = get_file_upload('thumbnails');

            // Nếu ảnh sản phẩm có dữ liệu thì cập nhật
            if (!empty($uploadThumbnails['name']) && is_array($uploadThumbnails['name'])) {
                foreach ($uploadThumbnails['name'] as $key => $value) {
                    $file = [
                        'name' => $value,
                        'tmp_name' => $uploadThumbnails['tmp_name'][$key]
                    ];
                    // debug($file);
                    $uploadFile = upload_file($file, "uploads/products/gallerys/");

                    if ($uploadFile) {
                        $dataGallerys = [
                            'product_id' => $id,
                            'thumbnail' => $uploadFile,
                            'updated_at' => date('Y-m-d H:i:s')
                        ];

                        insert('gallerys', $dataGallerys);
                    }
                }
            }

            // Nếu ảnh sản phẩm không có dữ liệu thì lấy dữ liệu cũ từ data
            foreach ($thumbnails as $key => $value) {
                $dataGallerys = [
                    'product_id' => $id,
                    'thumbnail' => $thumbnails[$key],
                    'updated_at' => date('Y-m-d H:i:s')
                ];
                insert('gallerys', $dataGallerys);
            }


            // Xử lý size và kích thước 
            deleteProductAttribute($id);
            $sizeID = $_POST['size_id'] ??  null;
            $colorID = $_POST['color_id'] ?? null;
            if (!empty($sizeID) && !empty($colorID)) {
                foreach ($sizeID as $sizeKey => $size) {
                    $colorValue = $colorID[$sizeKey];
                    $quantity = $_POST['quantity'][$sizeKey];
                    $dataProductAttribute = [
                        'product_id' => $id,
                        'color_id' => $colorValue,
                        'size_id' => $size,
                        'quantity' => $quantity,
                    ];
                    // debug($dataProductAttribute);
                    insert('product_attribute', $dataProductAttribute);
                }
            }

            // die;

            $GLOBALS['conn']->commit();
        } catch (Exception $e) {
            $GLOBALS['conn']->rollBack();

            if (is_array($imgThumbnail) && !empty($data['img_thumbnail']) && file_exists(PATH_UPLOAD . $data['img_thumbnail'])) {
                unlink(PATH_UPLOAD . $data['img_thumbnail']);
            }

            if (is_array($thumbnails) && !empty($data['thumbnail']) && file_exists(PATH_UPLOAD . $data['thumbnail'])) {
                unlink(PATH_UPLOAD . $data['thumbnail']);
            }


            debug($e);
        }
        $_SESSION['success'] = 'Cập nhật sản phẩm thành công';
        redirect(BASE_URL_ADMIN . "?action=product-update&id=" . $id);
        exit();
    }

    require_once PATH_VIEW_ADMIN  . "layout/master.php";
}

function productDelete()
{
    $id = $_GET['id'];
    $product = showOneProduct($id);

    if (empty($product)) {
        e404();
    }

    try {
        $GLOBALS['conn']->beginTransaction();

        deleteProductAttribute($id);

        deleteProductGallery($id);

        deleteRow('products', $id);

        // die();
        $GLOBALS['conn']->commit();
    } catch (Exception $e) {

        $GLOBALS['conn']->rollBack();

        debug($e);
    }

    if (!empty($product['p_img_thumbnail']) && file_exists(PATH_UPLOAD . $product['p_img_thumbnail'])) {
        unlink(PATH_UPLOAD . $product['p_img_thumbnail']);
    }



    $arrayThumbnails = explode(',', $product['ga_thumbnail']);

    foreach ($arrayThumbnails as $thumbnail => $value) {
        // debug(file_exists(PATH_UPLOAD .  $value));

        unlink($value);
    }

    $_SESSION['success'] = 'Xóa sản phẩm thành công';
    redirect(BASE_URL_ADMIN . "?action=products-list");
    exit();
}

function validateProductCreate($data)
{
    $errors = [];

    if (empty(trim($data['code']))) {
        $errors['code']['required'] = 'Vui lòng nhập mã sản phẩm';
    } else {
        if (strlen(trim($data['code'])) < 4) {
            $errors['code']['length'] = 'Mã sản phẩm phải lớn hơn 4 ký tự';
        } elseif (!checkUniqueCode('products', $data)) {
            $errors['code']['uniqued'] = 'Mã sản phẩm đã tồn tại trên hệ thống';
        }
    }

    if (empty(trim($data['name']))) {
        $errors['name']['required'] = 'Vui lòng nhập tên sản phẩm';
    } elseif (!checkUniqueName('products', $data['name'])) {
        $errors['name']['uniqued'] = 'Tên sản phẩm đã tồn tại trên hệ thống';
    }

    if (empty($data['category_id'])) {
        $errors['category_id']['required'] = 'Vui lòng chọn danh mục';
    }

    if (empty($data['brand_id'])) {
        $errors['brand_id']['required'] = 'Vui lòng chọn thương hiệu';
    }

    if (empty($data['img_thumbnail'])) {
        $errors['img_thumbnail']['required'] = 'Ảnh đại diện là bắt buộc';
    } else {
        if (is_array($data['img_thumbnail'])) {
            $typeImg = ['image/jpg', 'image/png', 'image/jpeg'];
            if ($data['img_thumbnail']['size'] > 2 * 1024 * 1024) {
                $errors['img_thumbnail']['size'] = 'Ảnh phải có dung lượng nhỏ hơn 2M';
            } elseif (!in_array($data['img_thumbnail']['type'], $typeImg)) {
                $errors['img_thumbnail']['type'] = 'Định dạng ảnh phải là jpg, png hoặc jpeg';
            }
        }
    }

    if (!empty($data['thumbnails'])) {
        if (is_array($data['thumbnails'])) {
            $typeImg = ['image/jpg', 'image/png', 'image/jpeg'];
            if ($data['thumbnails']['size'] > 2 * 1024 * 1024) {
                $errors['thumbnails']['size'] = 'Ảnh phải có dung lượng nhỏ hơn 2M';
            } elseif (!in_array($data['thumbnails']['type'], $typeImg)) {
                $errors['thumbnails']['type'] = 'Định dạng ảnh phải là: jpg, png hoặc jpeg';
            }
        }
    }

    if (empty(trim($data['over_view']))) {
        $errors['over_view']['required'] = 'Vui lòng nhập nội dung mô tả ngắn';
    }


    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['data'] = $data;
        redirect(BASE_URL_ADMIN . "?action=product-create");
        exit();
    }
}

function validateProductUpdate($id, $data)
{
    $errors = [];

    if (empty(trim($data['code']))) {
        $errors['code']['required'] = 'Vui lòng nhập mã sản phẩm';
    } else {
        if (strlen(trim($data['code'])) < 4) {
            $errors['code']['length'] = 'Mã sản phẩm phải lớn hơn 4 ký tự';
        }
    }

    if (empty(trim($data['name']))) {
        $errors['name']['required'] = 'Vui lòng nhập tên sản phẩm';
    }

    if (empty($data['category_id'])) {
        $errors['category_id']['required'] = 'Vui lòng chọn danh mục';
    }

    if (empty($data['brand_id'])) {
        $errors['brand_id']['required'] = 'Vui lòng chọn thương hiệu';
    }

    if (empty($data['img_thumbnail'])) {
        $errors['img_thumbnail']['required'] = 'Ảnh đại diện là bắt buộc';
    } else {
        if (is_array($data['img_thumbnail'])) {
            $typeImg = ['image/jpg', 'image/png', 'image/jpeg'];
            if ($data['img_thumbnail']['size'] > 2 * 1024 * 1024) {
                $errors['img_thumbnail']['size'] = 'Ảnh phải có dung lượng nhỏ hơn 2M';
            } elseif (!in_array($data['img_thumbnail']['type'], $typeImg)) {
                $errors['img_thumbnail']['type'] = 'Định dạng ảnh phải là jpg, png hoặc jpeg';
            }
        }
    }

    if (!empty($data['thumbnails'])) {
        if (is_array($data['thumbnails'])) {
            $typeImg = ['image/jpg', 'image/png', 'image/jpeg'];
            if ($data['thumbnails']['size'] > 2 * 1024 * 1024) {
                $errors['thumbnails']['size'] = 'Ảnh phải có dung lượng nhỏ hơn 2M';
            } elseif (!in_array($data['thumbnails']['type'], $typeImg)) {
                $errors['thumbnails']['type'] = 'Định dạng ảnh phải là: jpg, png hoặc jpeg';
            }
        }
    }

    if (empty(trim($data['over_view']))) {
        $errors['over_view']['required'] = 'Vui lòng nhập nội dung mô tả ngắn';
    }


    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['data'] = $data;
        redirect(BASE_URL_ADMIN . "?action=product-update&id=" . $id);
        exit();
    }
}

function gallerys()
{
    $title = "Danh sách hình ảnh sản phẩm có trên hệ thống";
    $view = "products/galleryView";
    $script = "../scripts/data-table";
    $style = "../styles/data-table";
    $gallerys = listAll('gallerys');
    require_once PATH_VIEW_ADMIN  . "layout/master.php";
}
