<div id="shoppingCart" data-bs-scroll="false" class="offcanvas offcanvas-end">
    <?php if (isset($_SESSION['cart'])) { ?>
        <div class="offcanvas-header fs-4">
            <h4 class="offcanvas-title fw-semibold">Shopping Bag</h4>
            <button type="button" class="btn-close btn-close-bg-none" data-bs-dismiss="offcanvas" aria-label="Close">
                <i class="far fa-times"></i>
            </button>
        </div>
        <div class="offcanvas-body me-xl-auto pt-0 mb-2 mb-xl-0">
            <form action="<?= BASE_URL ?>?action=view-cart" class="table-responsive-md shopping-cart pb-8 pb-lg-10" method="post">
                <table class="table table-borderless">
                    <thead>
                        <tr class="fw-500">
                            <td colspan="3" class="border-bottom pb-6">
                                <i class="far fa-check fs-12px border me-4 px-2 py-1 text-body-emphasis border-dark rounded-circle"></i>
                                Your cart is saved for the next
                                <span class="text-body-emphasis">4m34s</span>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        foreach ($_SESSION['cart'] as $item) :
                            $subTotal = ($item['discount'] ?: $item['price_regular']) * $item['quantity'];
                            $total += $subTotal;
                        ?>
                            <tr class="position-relative">
                                <td class="align-middle text-center">
                                    <a href="#" class="d-block clear-product">
                                        <i class="far fa-times"></i>
                                    </a>
                                </td>
                                <td class="shop-product">
                                    <div class="d-flex align-items-center">
                                        <div class="me-6">
                                            <img style="object-fit: cover;" src="<?= BASE_URL  . $item['img_thumbnail'] ?>" width="60" height="80" alt="natural coconut cleansing oil" />
                                        </div>
                                        <div class>
                                            <p class="card-text mb-1">
                                                <?php if ($item['discount'] > 0) { ?>
                                                    <span class="fs-13px fw-500 text-decoration-line-through pe-3"><?= number_format($item['price_regular'], 0) . 'đ' ?></span>
                                                    <span class="fs-15px fw-bold text-body-emphasis"><?= number_format($item['discount'], 0) . 'đ' ?></span>
                                                <?php } else { ?>
                                                    <span class="fs-15px fw-bold text-body-emphasis"><?= number_format($item['price_regular'], 0) . 'đ' ?></span>
                                                <?php } ?>
                                            </p>
                                            <p class="fw-500 text-body-emphasis">
                                                <?= $item['name'] ?> x <?= $item['quantity'] ?>
                                            </p>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </form>
        </div>
        <div class="offcanvas-footer flex-wrap">
            <div class="d-flex align-items-center justify-content-between w-100 mb-5">
                <span class="text-body-emphasis">Total price:</span>
                <span class="cart-total fw-bold text-body-emphasis"><?= caculator_total_order() . 'đ' ?></span>
            </div>
            <a href="<?= BASE_URL ?>?action=order-check-out" class="btn btn-dark w-100 mb-7" title="Check Out">Check Out</a>
            <a href="<?= BASE_URL ?>?action=view-cart" class="btn btn-outline-dark w-100" title="View shopping cart">View
                shopping cart</a>
        </div>
    <?php } else { ?>
        <span class="alert alert-danger">Không có sản phẩm nào trong giỏ hàng</span>
    <?php } ?>
</div>