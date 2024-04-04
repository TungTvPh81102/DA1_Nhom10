<section class="z-index-2 position-relative pb-2 mb-12" data-animated-id="1">
    <div class="bg-body-secondary mb-3">
        <div class="container">
            <nav class="py-4 lh-30px" aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center py-1 mb-0">
                    <li class="breadcrumb-item"><a title="Home" href="../index.html" previewlistener="true">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a title="Shop" href="../shop/shop-layout-v2.html"
                            previewlistener="true">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Check Out</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<section class="container pb-14 pb-lg-19" data-animated-id="2">
    <div class="text-center">
        <h2 class="mb-6">Check out</h2>
    </div>
    <form class="pt-12" action="<?= BASE_URL ?>?action=order-check-out" method="post">
        <div class="row">
            <div class="col-lg-5 pb-lg-0 pb-14 order-lg-last">
                <div class="card border-0 rounded-0 shadow">
                    <div class="card-header px-0 mx-10 bg-transparent py-8">
                        <h4 class="fs-4 mb-8">Order Summary</h4>
                        <div class="d-flex w-100 mb-7">
                            <table class="table border">
                                <thead class="bg-body-secondary">
                                    <tr class="fs-15px letter-spacing-01 fw-semibold text-uppercase text-body-emphasis">
                                        <th scope="col" class="fw-semibold border-1 ps-11">products</th>
                                        <th colspan="2" class="fw-semibold border-1">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($_SESSION['cart'])) { ?>
                                    <?php
                                        $total = 0;
                                        foreach ($_SESSION['cart'] as $item) :
                                            $subTotal = ($item['discount'] ?: $item['price_regular']) * $item['quantity'];
                                            $total += $subTotal;
                                        ?>
                                    <tr class="position-relative">
                                        <th scope="row" class="pe-5 ps-8 py-7 shop-product">
                                            <div class="d-flex align-items-center">
                                                <div class="me-7">
                                                    <img style="height: 100%; object-fit: cover;"
                                                        src="<?= BASE_URL . $item['img_thumbnail'] ?>"
                                                        data-src="../assets/images/products/product-03-75x100.jpg"
                                                        class="loaded" width="75" height="100"
                                                        alt="Natural Coconut Cleansing Oil" loading="lazy"
                                                        data-ll-status="loaded">
                                                </div>
                                                <div class="">
                                                    <p class="fw-500 mb-1 text-body-emphasis"><?= $item['name'] ?></p>
                                                    <p class="card-text">
                                                        <span class="fs-15px fw-bold text-body-emphasis">
                                                            <?= number_format($item['discount'], 0) . ' đ' ?: number_format($item['price_regular'], 0) . ' đ' ?>
                                                            x<?= $item['quantity'] ?>
                                                        </span>
                                                    </p>
                                                    <div class="d-flex">
                                                        <p style="margin-right: 10px;"
                                                            class="fw-500 mb-1 text-body-emphasis">Size:
                                                            <?= $item['size'] ?></p>
                                                        <p class="fw-500 mb-1 text-body-emphasis">Màu:
                                                            <?= $item['color'] ?></p>
                                                    </div>

                                                </div>
                                            </div>
                                        </th>
                                        <td class="align-middle">
                                            <p class="mb-0 text-body-emphasis fw-bold mr-xl-11">
                                                <?= number_format(($item['discount'] ?: $item['price_regular']) * $item['quantity'], 0) . ' đ' ?>
                                            </p>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php   } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent py-5 px-0 mx-10">
                        <div class="d-flex align-items-center fw-bold mb-6">
                            <span class="text-body-emphasis p-0">Total pricre:</span>
                            <?php if (isset($_SESSION['coupon']) && is_array($_SESSION['coupon'])) { ?>
                            <span
                                class="d-block ms-auto text-body-emphasis fs-4 fw-bold"><?= calculator_total_coupon() . ' đ' ?></span>
                            <?php } else { ?>
                            <span
                                class="d-block ms-auto text-body-emphasis fs-4 fw-bold"><?= caculator_total_order() . ' đ' ?></span>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 order-lg-first pe-xl-20 pe-lg-6">
                <div class="checkout">
                    <p class="mb-5">Returning customer?
                        <a href="#" data-bs-toggle="modal" data-bs-target="#signInModal">Click here to login</a>
                    </p>
                    <p>Have a coupon?
                        <a data-bs-toggle="collapse" href="#collapsecoupon" role="button" aria-expanded="false"
                            aria-controls="collapsecoupon">Click here to enter your code</a>
                    </p>
                    <div class="collapse" id="collapsecoupon">
                        <div class="card mw-60 border-0">
                            <div class="card-body py-10 px-8 my-10 border">
                                <p class="card-text text-body-emphasis mb-8">
                                    If you have a coupon code, please apply it below.</p>
                                <div class="input-group position-relative">
                                    <input type="email" class="form-control bg-body rounded-end"
                                        placeholder="Your Email*">
                                    <button type="submit"
                                        class="btn btn-dark btn-hover-bg-primary btn-hover-border-primary">
                                        Apply Coupon
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4 class="fs-4 pt-4 mb-7">Shipping Information</h4>
                    <div class="mb-7">
                        <label class="mb-5 fs-13px letter-spacing-01 fw-semibold text-uppercase">Full name</label>
                        <div class="">
                            <input type="text" class="form-control" id="first-name" name="full_name"
                                placeholder="First Name" required=""
                                value="<?= $_SESSION['user']['first_name'] . ' ' . $_SESSION['user']['last_name'] ?>">
                        </div>
                    </div>
                    <div class="mb-7">
                        <label class="mb-5 fs-13px letter-spacing-01 fw-semibold text-uppercase">info</label>
                        <div class="row">
                            <div class="col-md-6 mb-md-0 mb-7">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                    required="" value="<?= $_SESSION['user']['email'] ?>">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="phone" name="phone"
                                    placeholder="Phone number" required=""
                                    value="<?= $_SESSION['user']['phone_number'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="mb-7">
                        <label class="mb-5 fs-13px letter-spacing-01 fw-semibold text-uppercase">Zipcode</label>
                        <input class="form-control" type="text" name="zipcode" id="" placeholder="Nhập mã bưu điện">
                    </div>
                    <div class="mb-7">
                        <div class="form-group">
                            <label for="">Tỉnh/Thành phố</label>
                            <input class="form-control mb-5" type="text" name="province" id=""
                                placeholder="Nhập tỉnh thành phố">
                        </div>
                        <div class="form-group">
                            <label for="">Quận/Huyện</label>
                            <input class="form-control mb-5" type="text" name="district" id=""
                                placeholder="Nhập quận huyện">

                        </div>
                        <div class="form-group">
                            <label for="">Phường xã</label>
                            <input class="form-control mb-5" type="text" name="ward" id="" placeholder="Nhập phường xã">

                        </div>
                    </div>
                    <div class="mb-7">
                        <label for="note" class="mb-5 fs-13px letter-spacing-01 fw-semibold text-uppercase">Note</label>
                        <textarea placeholder="Note" class="form-control" name="note" id="" cols="30"
                            rows="4"></textarea>
                    </div>
                </div>
                <div class="checkout mb-7">
                    <div class="mb-7">
                        <h4 class="fs-4 mb-8 mt-12 pt-lg-1">Payment Infomation</h4>
                        <div class="tab-content mt-7">
                            <div class="tab-pane fade active show d-flex" id="paypal-tab" role="tabpanel">
                                <div style="margin-right: 20px;" class="">
                                    <input type="radio" name="paymethod" id="cash" value="0"> Thanh toán khi nhận hàng
                                </div>
                                <div style="margin-right: 20px;" class="">
                                    <input type="radio" name="paymethod" id="vnpay" value="1"> Thanh toán VN PAY
                                </div>
                                <div class="">
                                    <input type="radio" name="paymethod" id="momo" value="2"> Thanh toán MOMO
                                </div>
                            </div>
                        </div>
                    </div>
                    <button name="payUrl" type="submit"
                        class="btn btn-dark btn-hover-bg-primary btn-hover-border-primary px-11 mt-md-7 mt-4">Place
                        Order</button>
                </div>
            </div>
        </div>
    </form>
</section>