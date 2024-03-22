<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18"><?= $title ?></h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <?php if (isset($_SESSION['success'])) : ?>
                    <div class="alert alert-success mb-3"><?= $_SESSION['success'] ?></div>
                <?php
                    unset($_SESSION['success']);
                endif; ?>
                <div class="card-body">
                    <?php if (!empty($_SESSION['user'])) { ?>
                        <?php if (!empty($cartDetail)) { ?>
                            <div class="table-responsive">
                                <table class="table align-middle mb-0 table-nowrap">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Sản phẩm</th>
                                            <th>Hình ảnh</th>
                                            <th>Đơn giá</th>
                                            <th>Số lượng</th>
                                            <th>Thành tiền</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($cartDetail as $cart) :
                                            if ($cart['p_discount'] > 0) {
                                                $priceSale = $cart['p_price_regular'] - ($cart['p_price_regular'] * $cart['p_discount'] / 100);
                                                $total =  $priceSale * $cart['ca_quantity'];
                                            } else {
                                                $total = $cart['p_price_regular'] * $cart['ca_quantity'];
                                            }
                                        ?>
                                            <tr class="product">
                                                <td>
                                                    <h5 class="font-size-14 text-truncate"><a href="ecommerce-product-detail.html" class="text-dark"><?= $cart['p_name'] ?></a></h5>
                                                    <p class="mb-0">Color : <span class="fw-medium"><?= $cart['ca_size'] ?></span></p>
                                                    <p class="mb-0">Size : <span class="fw-medium"><?= $cart['ca_color'] ?></span></p>
                                                </td>
                                                <td>
                                                    <img style="object-fit: cover; height:100%;" src="<?= BASE_URL . $cart['p_img_thumbnail'] ?>" alt="product-img" title="product-img" class="avatar-md">
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($cart['p_discount'] > 0) {
                                                    ?>
                                                        <span class="fw-medium"><?= number_format($priceSale, 0) . " VNĐ" ?></span>
                                                        <p class="mb-0"><del><span class="fw-medium"><?= number_format($cart['p_price_regular'], 0) . " VNĐ" ?></del></span></p>
                                                    <?php } else { ?>
                                                        <span class="fw-medium"><?= number_format($cart['p_price_regular'], 0) . " VNĐ" ?></span>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <input style="width: 60px;" value="<?= $cart['ca_quantity'] ?>" type="number" name="" id="" class="form-control">
                                                </td>
                                                <td>
                                                    <span class="product-line-price"><?= number_format($total, 0) . "VNĐ" ?></span>
                                                </td>
                                                <td>
                                                    <div class="d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Remove" data-bs-original-title="Remove">
                                                        <a href="#removeItemModal" data-bs-toggle="modal" class="action-icon text-danger"> <i class="mdi mdi-trash-can font-size-18"></i></a>
                                                    </div>
                                                </td>
                                            <?php endforeach; ?>
                                            </tr>
                                    </tbody>

                                </table>
                            </div>
                            <div class="row mt-4">
                                <div class="col-sm-6">
                                    <a href="ecommerce-products.html" class="btn btn-secondary">
                                        <i class="mdi mdi-arrow-left me-1"></i> Continue Shopping </a>
                                </div> <!-- end col -->
                                <div class="col-sm-6">
                                    <div class="text-sm-end mt-2 mt-sm-0">
                                        <a href="<?= BASE_URL_ADMIN . "?action=check-out" ?>" class="btn btn-success">
                                            <i class="mdi mdi-cart-arrow-right me-1"></i> Checkout </a>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row-->
                        <?php } else { ?>
                            <div class="alert alert-danger">Không có sản phẩm nào trong giỏ hàng</div>
                    <?php }                  
                    } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

</div>