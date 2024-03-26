<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18"><?= $title ?></h4>


            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="checkout-tabs">
        <div class="row">
            <div class="col-xl-2 col-sm-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-shipping-tab" data-bs-toggle="pill" href="#v-pills-shipping" role="tab" aria-controls="v-pills-shipping" aria-selected="true">
                        <i class="bx bxs-truck d-block check-nav-icon mt-4 mb-2"></i>
                        <p class="fw-bold mb-4">Shipping Info</p>
                    </a>
                    <a class="nav-link" id="v-pills-confir-tab" data-bs-toggle="pill" href="#v-pills-confir" role="tab" aria-controls="v-pills-confir" aria-selected="false">
                        <i class="bx bx-badge-check d-block check-nav-icon mt-4 mb-2"></i>
                        <p class="fw-bold mb-4">Confirmation</p>
                    </a>
                    <a class="nav-link" id="v-pills-payment-tab" data-bs-toggle="pill" href="#v-pills-payment" role="tab" aria-controls="v-pills-payment" aria-selected="false">
                        <i class="bx bx-money d-block check-nav-icon mt-4 mb-2"></i>
                        <p class="fw-bold mb-4">Payment Info</p>
                    </a>
                </div>
            </div>
            <div class="col-xl-10 col-sm-9">
                <?php
                if (isset($_SESSION['user'])) {
                    // debug($_SESSION['user']);
                    $fullName = $_SESSION['user']['first_name'] . '' . $_SESSION['user']['last_name'] ?? null;
                    $email = $_SESSION['user']['email'] ?? null;
                    $phone = $_SESSION['user']['phone_number'] ?? null;
                    $address = $_SESSION['user']['address'] ?? null;
                }
                ?>
                <form action="" method="post">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-shipping" role="tabpanel" aria-labelledby="v-pills-shipping-tab">
                                    <div>
                                        <h4 class="card-title">Shipping information</h4>
                                        <p class="card-title-desc">Fill all information below</p>
                                        <div class="form-group row mb-4">
                                            <label for="billing-name" class="col-md-2 col-form-label">Name</label>
                                            <div class="col-md-10">
                                                <input name="full_name" type="text" class="form-control" id="billing-name" placeholder="Enter your name" value="<?= $fullName ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label for="billing-name" class="col-md-2 col-form-label">Email</label>
                                            <div class="col-md-10">
                                                <input name="email" type="email" class="form-control" id="billing-name" placeholder="Enter your name" value="<?= $email ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label for="billing-phone" class="col-md-2 col-form-label">Phone</label>
                                            <div class="col-md-10">
                                                <input name="phone" type="text" class="form-control" id="billing-phone" placeholder="Enter your Phone no." value="<?= $phone ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label for="billing-phone" class="col-md-2 col-form-label">Country</label>
                                            <div class="col-md-10">
                                                <input name="country" type="text" class="form-control" id="billing-phone" placeholder="Enter your Phone no.">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label for="billing-phone" class="col-md-2 col-form-label">Address</label>
                                            <div class="col-md-10">
                                                <input name="address" type="text" class="form-control" id="billing-phone" placeholder="Enter your Phone no.">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label for="billing-phone" class="col-md-2 col-form-label">City</label>
                                            <div class="col-md-10">
                                                <input name="city" type="text" class="form-control" id="billing-phone" placeholder="Enter your Phone no.">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label for="billing-phone" class="col-md-2 col-form-label">Zipcode</label>
                                            <div class="col-md-10">
                                                <input name="zipcode" type="text" class="form-control" id="billing-phone" placeholder="Nhập mã bưu điện">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <label for="example-textarea" class="col-md-2 col-form-label">Note:</label>
                                            <div class="col-md-10">
                                                <textarea name="note" class="form-control" id="example-textarea" rows="3" placeholder="Write some note.."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-payment" role="tabpanel" aria-labelledby="v-pills-payment-tab">
                                    <div>
                                        <h4 class="card-title">Payment information</h4>
                                        <p class="card-title-desc">Fill all information below</p>

                                        <div>
                                            <div class="form-check form-check-inline font-size-16">
                                                <input value="1" name="paymethod" class="form-check-input" type="radio" name="paymentoptionsRadio" id="paymentoptionsRadio1">
                                                <label class="form-check-label font-size-13" for="paymentoptionsRadio1"><i class="fab fa-cc-mastercard me-1 font-size-20 align-top"></i>
                                                    Thanh toán Online</label>
                                            </div>
                                            <div class="form-check form-check-inline font-size-16">
                                                <input value="0" name="paymethod" class="form-check-input" type="radio" name="paymentoptionsRadio" id="paymentoptionsRadio3" checked>
                                                <label class="form-check-label font-size-13" for="paymentoptionsRadio3"><i class="far fa-money-bill-alt me-1 font-size-20 align-top"></i>
                                                    Thanh toán khi nhận hàng</label>
                                            </div>
                                        </div>

                                        <h5 class="mt-5 mb-3 font-size-15">For card Payment</h5>
                                        <div class="p-4 border">
                                            <div class="form-group mb-0">
                                                <label for="cardnumberInput">Card Number</label>
                                                <input type="text" class="form-control" id="cardnumberInput" placeholder="0000 0000 0000 0000">
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group mt-4 mb-0">
                                                        <label for="cardnameInput">Name on card</label>
                                                        <input type="text" class="form-control" id="cardnameInput" placeholder="Name on Card">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group mt-4 mb-0">
                                                        <label for="expirydateInput">Expiry date</label>
                                                        <input type="text" class="form-control" id="expirydateInput" placeholder="MM/YY">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group mt-4 mb-0">
                                                        <label for="cvvcodeInput">CVV Code</label>
                                                        <input type="text" class="form-control" id="cvvcodeInput" placeholder="Enter CVV Code">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-confir" role="tabpanel" aria-labelledby="v-pills-confir-tab">
                                    <div class="card shadow-none border mb-0">
                                        <div class="card-body">
                                            <h4 class="card-title mb-4">Order Summary</h4>

                                            <div class="table-responsive">
                                                <table class="table align-middle mb-0 table-nowrap">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th scope="col">Hình ảnh</th>
                                                            <th scope="col">Sản phẩm</th>
                                                            <th scope="col">Giá</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        if (!empty($cartDetail)) :

                                                            $totalMoney = 0;
                                                            foreach ($cartDetail as $cart) :
                                                                if ($cart['p_discount'] > 0) {
                                                                    $priceSale = $cart['p_price_regular'] - ($cart['p_price_regular'] * $cart['p_discount'] / 100);
                                                                    $total =  $priceSale * $cart['ca_quantity'];
                                                                    $totalMoney += $total;
                                                                } else {
                                                                    $total = $cart['p_price_regular'] * $cart['ca_quantity'];
                                                                    $totalMoney += $total;
                                                                }

                                                        ?>
                                                                <tr>
                                                                    <th scope="row">
                                                                        <img style="height: 100%;" src="<?= BASE_URL . $cart['p_img_thumbnail'] ?>" class="avatar-md">
                                                                    </th>
                                                                    <td>
                                                                        <h5 class="font-size-14 text-truncate">
                                                                            <a href="ecommerce-product-detail.html" class="text-dark">
                                                                                <?= $cart['p_name'] ?>
                                                                            </a>
                                                                        </h5>
                                                                        <?php if ($cart['p_discount'] > 0) { ?>
                                                                            <p class="text-muted mb-0"><?= number_format($priceSale, 0) . ' VNĐ' ?> x <?= $cart['ca_quantity'] ?></p>
                                                                        <?php } else { ?>
                                                                            <p class="text-muted mb-0"><?= number_format($cart['p_price_regular'], 0) . ' VNĐ' ?> x <?= $cart['ca_quantity'] ?></p>
                                                                        <?php } ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                        if ($cart['p_discount'] > 0) {
                                                                            $priceSale = $cart['p_price_regular'] - ($cart['p_price_regular'] * $cart['p_discount'] / 100);
                                                                            $total =  $priceSale * $cart['ca_quantity'];
                                                                            echo number_format($total,0) . ' VNĐ';
                                                                        } else {
                                                                            $total = $cart['p_price_regular'] * $cart['ca_quantity'];
                                                                            echo number_format( $total, 0) . " VNĐ";
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                        <?php endforeach;
                                                        endif; ?>
                                                        <tr>
                                                            <td colspan="3">
                                                                <div class="bg-primary-subtle p-3 rounded">
                                                                    <h5 class="font-size-14 text-primary mb-0">
                                                                        <i class="fas fa-shipping-fast me-2"></i>
                                                                        Shipping <span class="float-end">Free</span>
                                                                    </h5>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                <h6 class="m-0 text-end">Total:</h6>
                                                            </td>
                                                            <td>
                                                                <?= number_format($totalMoney, 0) . "VNĐ" ?>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-sm-6">
                            <a href="ecommerce-cart.html" class="btn text-muted d-none d-sm-inline-block btn-link">
                                <i class="mdi mdi-arrow-left me-1"></i> Back to Shopping Cart </a>
                        </div> <!-- end col -->
                        <div class="col-sm-6 mb-3">
                            <div class="text-end">
                                <button type="submit" class="btn btn-success">
                                    <i class="mdi mdi-truck-fast me-1"></i> Đồng ý đặt hàng </button>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </form>
            </div>
        </div>
    </div>
    <!-- end row -->

</div> <!-- container-fluid -->