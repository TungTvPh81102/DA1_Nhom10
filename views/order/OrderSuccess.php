<section class="z-index-2 position-relative pb-2 mb-12" data-animated-id="1">
    <div class="bg-body-secondary mb-3">
        <div class="container">
            <nav class="py-4 lh-30px" aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center py-1 mb-0">
                    <li class="breadcrumb-item"><a title="Home" href="../index.html" previewlistener="true">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a title="Shop" href="../shop/shop-layout-v2.html" previewlistener="true">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                </ol>
            </nav>
        </div>
    </div>
</section>


<?php
$vnp_SecureHash = $_GET['vnp_SecureHash'] ?? null;
if (isset($_GET['complete']) || ($vnp_SecureHash == 0) && $secureHash == $vnp_SecureHash) {
?>
    <section class="z-index-2 position-relative pb-2 mb-12 text-center" data-animated-id="1">
        <img style="height: 300px; object-fit: cover;" src="<?= $GLOBALS['settings']['thanks'] ?>" alt="">
    </section>
    <section class="z-index-2 position-relative pb-2 mb-12 text-center" data-animated-id="1">
        <a class="btn btn-primary" href="<?= BASE_URL ?>?action=products">Tiếp mục mua hàng</a>
        <a class="btn btn-primary" href="<?= BASE_URL ?>?action=my-orders">Theo dõi đơn hàng</a>
    </section>
<?php } else { ?>
    <section class="z-index-2 position-relative pb-2 mb-12 text-center" data-animated-id="1">
        <img style="height: 300px; object-fit: cover;" src="<?= $GLOBALS['settings']['fail'] ?>" alt="">
    </section>
    <section class="z-index-2 position-relative pb-2 mb-12 text-center" data-animated-id="1">
        <a class="btn btn-primary" href="<?= BASE_URL ?>?action=order-check-out">Thanh toán lại</a>
        <a class="btn btn-primary" href="<?= BASE_URL ?>?action=/">Quay về trang trủ</a>
    </section>
<?php } ?>