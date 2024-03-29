<section class="z-index-2 position-relative pb-2 mb-12" data-animated-id="1">
    <div class="bg-body-secondary mb-3">
        <div class="container">
            <nav class="py-4 lh-30px" aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center py-1 mb-0">
                    <li class="breadcrumb-item"><a title="Home" href="../index.html" previewlistener="true">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a title="Shop" href="../shop/shop-layout-v2.html"
                            previewlistener="true">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<section class="container" data-animated-id="2">
    <div class="shopping-cart">
        <h2 class="text-center fs-2 mt-12 mb-13">Shopping Cart</h2>
        <form class="table-responsive-md pb-8 pb-lg-10">
            <?php
            if (isset($_SESSION['success'])) {
                echo '<div class="alert alert-success">' . $_SESSION['success'] . '</div>';
                unset($_SESSION['success']);
            }
            ?>
            <table class="table border">
                <thead class="bg-body-secondary">
                    <tr class="fs-15px letter-spacing-01 fw-semibold text-uppercase text-body-emphasis">
                        <th scope="col" class="fw-semibold border-1 ps-11">products</th>
                        <th scope="col" class="fw-semibold border-1">quantity</th>
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
                                <div class="form-check">
                                    <input class="form-check-input rounded-0" type="checkbox" name="check-product"
                                        value="checkbox">
                                </div>
                                <div class="ms-6 me-7">
                                    <img style="height: 100%; object-fit: cover;"
                                        src="<?= BASE_URL . $item['img_thumbnail'] ?>"
                                        data-src="../assets/images/products/product-03-75x100.jpg" class="loaded"
                                        width="75" height="100" alt="Natural Coconut Cleansing Oil" loading="lazy"
                                        data-ll-status="loaded">
                                </div>
                                <div class="">
                                    <p class="fw-500 mb-1 text-body-emphasis"><?= $item['name'] ?></p>
                                    <p class="card-text">
                                        <?php if ($item['discount'] > 0) { ?>
                                        <span
                                            class="fs-13px fw-500 text-decoration-line-through pe-3"><?= number_format($item['price_regular'], 0) . ' đ' ?></span>
                                        <span
                                            class="fs-15px fw-bold text-body-emphasis"><?= number_format($item['discount'], 0) . ' đ'  ?></span>
                                        <?php } else { ?>
                                        <span
                                            class="fs-15px fw-bold text-body-emphasis"><?= number_format($item['price_regular'], 0) . ' đ' ?></span>
                                        <?php } ?>

                                    </p>
                                    <div class="d-flex">

                                        <p style="margin-right: 10px;" class="fw-500 mb-1 text-body-emphasis">Size:
                                            <?= $item['size'] ?></p>
                                        <p class="fw-500 mb-1 text-body-emphasis">Màu: <?= $item['color'] ?></p>
                                    </div>

                                </div>
                            </div>
                        </th>
                        <td class="align-middle">
                            <a class="btn btn-sm btn-danger"
                                href="<?= BASE_URL . "?action=cart-des&productID=" . $item['id'] ?>">-</a>
                            <input style="width: 70px; text-align: center;" type="text" disabled
                                value="<?= $item['quantity'] ?>">
                            <a class="btn btn-sm btn-success"
                                href="<?= BASE_URL . "?action=cart-inc&productID=" . $item['id'] ?>">+</a>
                        </td>
                        <td class="align-middle">
                            <p class="mb-0 text-body-emphasis fw-bold mr-xl-11">
                                <?= number_format(($item['discount'] ?: $item['price_regular']) * $item['quantity'], 0) . ' đ' ?>
                            </p>
                        </td>
                        <td class="align-middle text-end pe-8">
                            <a onclick="return confirm('Bạn có muốn xóa sản phẩm: <?= $item['name'] ?> không ?')"
                                href="<?= BASE_URL ?>?action=cart-del&productID=<?= $item['id'] ?>"
                                class="d-block text-secondary">
                                <i class="fa fa-times"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php   } ?>
                    <tr>
                        <td class="pt-5 pb-10 position-relative bg-body ps-0 left">
                            <a href="<?= BASE_URL ?>?action=products" title="Countinue Shopping"
                                class="btn btn-outline-dark me-8 text-nowrap my-5" previewlistener="true">
                                Countinue Shopping
                            </a>
                            <button type="submit" value="Clear Shopping Cart"
                                class="btn btn-link p-0 border-0 border-bottom border-secondary text-decoration-none rounded-0 my-5 fw-semibold ">
                                <i class="fa fa-times me-3"></i>
                                Clear Shopping Cart
                            </button>
                        </td>
                        <td colspan="3" class="text-end pt-5 pb-10 position-relative bg-body right pe-0">
                            <button type="submit" value="Update Cart" class="btn btn-outline-dark my-5">Update Cart
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
        <div class="row pt-8 pt-lg-11 pb-16 pb-lg-18">
            <div class="col-lg-4 pt-2">
                <h4 class="fs-24 mb-6">Coupon Discount</h4>
                <p class="mb-7">Enter you coupon code if you have one.</p>
                <form>
                    <input type="text" class="form-control mb-7" placeholder="Enter coupon code here">
                    <button type="submit" class="btn btn-dark btn-hover-bg-primary btn-hover-border-primary">
                        Apply coupon
                    </button>
                </form>
            </div>
            <div class="col-lg-4 pt-lg-2 pt-10">
                <h4 class="fs-24 mb-6">Shipping Caculator</h4>
                <form>
                    <div class="d-flex mb-5">
                        <div class="form-check me-6 me-lg-9">
                            <input class="form-check-input form-check-input-body-emphasis" type="radio"
                                name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Free shipping
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input form-check-input-body-emphasis" type="radio"
                                name="flexRadioDefault" id="flexRadioDefault2" checked="">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Flat rate: $75
                            </label>
                        </div>
                    </div>
                    <div class="dropdown bg-body-secondary rounded mb-7">
                        <a href="#"
                            class="form-select text-body-emphasis dropdown-toggle d-flex justify-content-between align-items-center text-decoration-none text-secondary position-relative d-block"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Viet Nam
                        </a>
                        <div class="dropdown-menu w-100 px-0 py-4" style="">
                            <a class="dropdown-item px-6 py-4" href="#">Andorra</a>
                            <a class="dropdown-item px-6 py-4" href="#">San Marino</a>
                            <a class="dropdown-item px-6 py-4" href="#">Tunisia</a>
                            <a class="dropdown-item px-6 py-4" href="#">Micronesia</a>
                            <a class="dropdown-item px-6 py-4" href="#">Solomon Islands</a>
                            <a class="dropdown-item px-6 py-4" href="#">Macedonia</a>
                        </div>
                    </div>
                    <input type="text" class="form-control mb-7" placeholder="State / County" required="">
                    <input type="text" class="form-control mb-7" placeholder="City" required="">
                    <input type="text" class="form-control mb-7" placeholder="Postcode / Zip">
                    <button type="submit" class="btn btn-dark btn-hover-bg-primary btn-hover-border-primary">
                        Update total
                    </button>
                </form>
            </div>
            <div class="col-lg-4 pt-lg-0 pt-11">
                <div class="card border-0" style="box-shadow: 0 0 10px 0 rgba(0,0,0,0.1)">
                    <div class="card-body px-9 pt-6">
                        <div class="d-flex align-items-center justify-content-between mb-5">
                            <span>Subtotal:</span>
                            <span class="d-block ml-auto text-body-emphasis fw-bold">$99.00</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <span>Shipping:</span>
                            <span class="d-block ml-auto text-body-emphasis fw-bold">$0</span>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent px-0 pt-5 pb-7 mx-9">
                        <div class="d-flex align-items-center justify-content-between fw-bold mb-7">
                            <span class="text-secondary text-body-emphasis">Total pricre:</span>
                            <span
                                class="d-block ml-auto text-body-emphasis fs-4 fw-bold"><?= number_format($total, 0) . ' đ' ?></span>
                        </div>
                        <a href="<?= BASE_URL ?>?action=order-check-out"
                            class="btn w-100 btn-dark btn-hover-bg-primary btn-hover-border-primary" title="Check Out"
                            previewlistener="true">Check Out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>