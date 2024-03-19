<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Quản lý sản phẩm</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active"><?= $title ?></li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="product-detai-imgs">
                                <div class="row">
                                    <div class="col-md-2 col-sm-3 col-4">
                                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <?php
                                            // Chia chuỗi chứa các ảnh thành mảng
                                            $thumbnails = explode(',', $product['ga_thumbnail']);
                                            foreach ($thumbnails as $key => $thumbnail) :
                                            ?>
                                                <a class="nav-link <?= ($key == 0) ? 'active' : ''; ?>" id="product-<?php echo $key; ?>-tab" data-bs-toggle="pill" href="#product-<?php echo $key; ?>" role="tab" aria-controls="product-<?php echo $key; ?>" aria-selected="<?= ($key === 0) ? 'true' : 'false'; ?>">
                                                    <img src="<?= BASE_URL . $thumbnail ?>" alt="" class="img-fluid mx-auto d-block rounded">
                                                </a>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-7 offset-md-1 col-sm-9 col-8">
                                        <div class="tab-content" id="v-pills-tabContent">
                                            <?php foreach ($thumbnails as $key => $thumbnail) : ?>
                                                <div class="tab-pane fade <?= ($key == 0) ? 'show active' : ''; ?>" id="product-<?php echo $key; ?>" role="tabpanel" aria-labelledby="product-<?php echo $key; ?>-tab">
                                                    <div>
                                                        <img src="<?= BASE_URL . $thumbnail ?>" alt="" class="img-fluid mx-auto d-block rounded">
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                        <div class="text-center">
                                            <button type="button" class="btn btn-primary waves-effect waves-light mt-2 me-1">
                                                <i class="bx bx-cart me-2"></i> Add to cart
                                            </button>
                                            <button type="button" class="btn btn-success waves-effect  mt-2 waves-light">
                                                <i class="bx bx-shopping-bag me-2"></i>Buy now
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="mt-4 mt-xl-3">
                                <a href="javascript: void(0);" class="text-primary"><?= $product['c_name'] ?></a>
                                <h4 class="mt-1 mb-3"><?= $product['p_name'] ?></h4>
                                <div class="text-primary mb-2">Code: <?= $product['p_code'] ?></div>
                                <p class="text-muted float-start me-3">
                                    <span class="bx bxs-star text-warning"></span>
                                    <span class="bx bxs-star text-warning"></span>
                                    <span class="bx bxs-star text-warning"></span>
                                    <span class="bx bxs-star text-warning"></span>
                                    <span class="bx bxs-star"></span>
                                </p>
                                <p class="text-muted mb-4">( 152 Customers Review )</p>
                                <?php if ($product['p_discount'] > 0) { ?>
                                    <h6 class="text-success text-uppercase"><?= $product['p_discount'] ?> % Off</h6>
                                <?php } ?>
                                <h5 class="mb-4">Price : <span class="text-muted me-2"><del><?= number_format($product['p_price_regular'], 0) . ' VNĐ' ?></del></span>
                                    <?php
                                    $priceSale = $product['p_price_regular'] - ($product['p_price_regular'] * ($product['p_discount'] / 100));
                                    ?>
                                    <b><?= number_format($priceSale, 0) . " VNĐ" ?></b>
                                </h5>
                                <p class="text-muted mb-4">
                                    <?= $product['p_over_view'] ?>
                                </p>
                                <div class="product-size">
                                    <h5 class="font-size-15">Size :</h5>
                                    <?php foreach ($productSize as $size) : ?>
                                        <input type="radio" name="sizes[]" id="" value="<?= $size['pa_size_id'] ?>" checked>
                                        <!-- <a href="javascript: void(0);" class="active"> -->
                                        <p class="btn btn-info"><?= $size['pz_name'] ?></p>
                                        <!-- </a> -->
                                    <?php endforeach; ?>
                                </div>
                                <div class="product-color">
                                    <h5 class="font-size-15">Color :</h5>
                                    <?php foreach ($productColor as $color) : ?>
                                        <a href="javascript: void(0);" class="active">
                                            <input type="radio" name="color[]" id="" value="<?= $color['pa_color_id'] ?>">
                                            <div class="product-color-item border rounded">
                                                <span style="background-color: <?= $color['pc_color'] ?>; width: 50px; height:50px;" class="btn"> </span>
                                            </div>
                                            <p><?= $color['pc_name'] ?></p>
                                        </a>
                                    <?php endforeach; ?>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="mt-5">
                        <h5 class="mb-3">Specifications :</h5>

                        <div class="table-responsive">
                            <table class="table mb-0 table-bordered">
                                <tbody>
                                    <tr>
                                        <th scope="row" style="width: 400px;">Category</th>
                                        <td><?= $product['c_name'] ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Brand</th>
                                        <td><?= $product['b_name'] ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Color</th>
                                        <td>Black</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end Specifications -->

                </div>
            </div>
            <!-- end card -->
        </div>
    </div>
    <!-- end row -->
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Your existing code here...

        // Function to update price and quantity based on selected size and color
        function updatePriceAndQuantity() {
            var selectedSize = document.querySelector('input[name="sizes[]"]:checked').value;
            var selectedColor = document.querySelector('input[name="color[]"]:checked').value;

            // Fetch the price and quantity based on the selected size and color
            var selectedProduct = getProductDetails(selectedSize, selectedColor);
            var priceElement = document.querySelector('#product-price');
            if (selectedProduct.quantity == 0) {
                priceElement.innerHTML = 'Out of Stock';
            } else {
                priceElement.innerHTML = '<span class="text-muted me-2"><del>$240 USD</del></span><b>$' +
                    selectedProduct.price + ' USD</b>';
            }

            if (selectedProduct.quantity == 0) {
                number_product.textContent = ' Hết hàng trong kho !';
            } else {
                number_product.textContent = 'Còn ' + selectedProduct.quantity + ' Sản Phẩm Trong Kho';
            }

            maxQquantity = selectedProduct.quantity;
            if (element_number_product.textContent > selectedProduct.quantity) {
                element_number_product.textContent = selectedProduct.quantity;
                element_number_product.textContent = selectedProduct.quantity;
                quantityProduct.value = selectedProduct.quantity;
            }
        }

        // Function to fetch product details based on size and color
        function getProductDetails(size, color) {
            // You need to fetch product details from your data source ($sanphamct) based on selected size and color
            // Replace this with your actual implementation
            var productDetails = {
                price: 0, // Fetch the actual price based on size and color
                quantity: 0 // Fetch the actual quantity based on size and color
            };
            // Replace the hardcoded price and quantity with fetched values
            if (size === 'S' && color === 'red') {
                productDetails.price = 100;
                productDetails.quantity = 5;
            } else if (size === 'M' && color === 'blue') {
                productDetails.price = 120;
                productDetails.quantity = 8;
            } else if (size === 'L' && color === 'green') {
                productDetails.price = 150;
                productDetails.quantity = 10;
            } else if (size === 'XL' && color === 'yellow') {
                productDetails.price = 180;
                productDetails.quantity = 3;
            }
            return productDetails;
        }

        // Event listeners for size and color selection
        document.querySelectorAll('input[name="sizes[]"]').forEach(function(sizeInput) {
            sizeInput.addEventListener('click', function() {
                updatePriceAndQuantity();
            });
        });

        document.querySelectorAll('input[name="color[]"]').forEach(function(colorInput) {
            colorInput.addEventListener('click', function() {
                updatePriceAndQuantity();
            });
        });

        // Initialize default price and quantity based on default size and color
        updatePriceAndQuantity();

        // Your existing code here...
    });
</script>