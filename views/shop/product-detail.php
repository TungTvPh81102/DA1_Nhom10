<section class="z-index-2 position-relative pb-2 mb-12" data-animated-id="1">
    <div class="bg-body-secondary mb-3">
        <div class="container">
            <nav class="py-4 lh-30px" aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center py-1 mb-0">
                    <li class="breadcrumb-item"><a title="Home" href="<?= BASE_URL ?>" previewlistener="true">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a title="Shop" href="<?= BASE_URL ?>?action=products"
                            previewlistener="true">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $product['p_name'] ?></li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<section class="container container-xxl pt-6 pb-13 pb-lg-20" data-animated-id="2">
    <div class="row ">
        <div class="col-md-6 pe-lg-13">
            <div class="position-sticky top-0">
                <div class="row">
                    <div class="col-xl-2 pe-xl-0 order-1 order-xl-0 mt-5 mt-xl-0">
                        <div id="slide-thumb-5"
                            class="slick-slider-thumb ps-1 ms-n3 me-n4 mx-xl-0 slick-initialized slick-slider slick-vertical"
                            data-slick-options="{&quot;arrows&quot;:false,&quot;asNavFor&quot;:&quot;#slide-5&quot;,&quot;dots&quot;:false,&quot;focusOnSelect&quot;:true,&quot;responsive&quot;:[{&quot;breakpoint&quot;:1260,&quot;settings&quot;:{&quot;vertical&quot;:false}}],&quot;slidesToShow&quot;:4,&quot;vertical&quot;:true}">

                            <div class="slick-list draggable" style="height: 514.5px;">
                                <div class="slick-track"
                                    style="opacity: 1; height: 515px; transform: translate3d(0px, 0px, 0px);">
                                    <?php foreach ($thumbnails as $key => $item) : ?>
                                    <img src="<?= BASE_URL . $item ?>" data-src="<?= BASE_URL . $item ?>"
                                        class="cursor-pointer h-auto mx-3 mx-xl-0 px-0 mb-xl-7 loaded slick-slide slick-current slick-active"
                                        width="540" height="720" alt="" loading="lazy" data-ll-status="loaded"
                                        style="width: 83px;" tabindex="<?= $key ?>" data-slick-index="<?= $key ?>"
                                        aria-hidden="false">
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-10 ps-xl-8 pe-xl-0 order-0 order-xl-1">
                        <div id="slide-5"
                            class="slick-slider slick-slider-arrow-inside slick-slider-dots-inside slick-slider-dots-light g-0 slick-initialized slick-vertical"
                            data-slick-options="{&quot;arrows&quot;:false,&quot;asNavFor&quot;:&quot;#slide-thumb-5&quot;,&quot;dots&quot;:false,&quot;slidesToShow&quot;:1,&quot;vertical&quot;:true}">
                            <div class="slick-list draggable" style="height: 619.463px;">
                                <div class="slick-track"
                                    style="opacity: 1; height: 2478px; transform: translate3d(0px, 0px, 0px);">
                                    <?php foreach ($thumbnails as $key => $item) : ?>
                                    <a href="<?= BASE_URL . $item ?>" data-gallery="gallery5"
                                        class="slick-slide slick-current slick-active" data-slick-index="<?= $key ?>"
                                        aria-hidden="false" tabindex="<?= $key ?>" previewlistener="true">
                                        <img src="<?= BASE_URL . $item ?>" data-src="<?= BASE_URL . $item ?>"
                                            class="h-auto loaded" width="540" height="720" alt="" loading="lazy"
                                            data-ll-status="loaded">
                                    </a>
                                    <?php endforeach; ?>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 pt-md-0 pt-10">
            <p class="d-flex align-items-center mb-6">
                <?php if ($product['p_discount'] > 0) {
                    $percent = floor((($product['p_price_regular'] - $product['p_discount']) / $product['p_price_regular']) * 100);
                ?>
                <span
                    class="text-decoration-line-through"><?= number_format($product['p_price_regular'], 0) . ' đ' ?></span>
                <span
                    class="fs-18px text-body-emphasis ps-6 fw-bold"><?= number_format($product['p_discount'], 0) . ' đ' ?></span>
                <span class="badge text-bg-primary fs-6 fw-semibold ms-7 px-6 py-3"><?= '-' . $percent . '%' ?></span>
                <?php } else { ?>
                <span
                    class="fs-18px text-body-emphasis fw-bold"><?= number_format($product['p_price_regular'], 0) . ' đ' ?>
                </span>
                <?php } ?>
            </p>
            <h1 class="mb-4 pb-2 fs-4"><?= $product['p_name'] ?></h1>
            <div class="d-flex align-items-center fs-15px mb-6">
                <?php if ($purchases['purchases'] > 0) : ?>
                <a href="#" class="text-body">
                    Lượt mua: <?= $purchases['purchases'] ?>
                </a>
                <?php endif; ?>
            </div>
            <p class="fs-15px">
                <?= $product['p_over_view'] ?>

            </p>
            <p class="fs-15px">Tình trạng: <span id="availability"></span> </p>
            <form class="pb-8" action="<?= BASE_URL ?>?action=add-to-cart" method="post">
                <input type="hidden" name="product_id" value="<?= $product['p_id'] ?>">
                <div class="form-group shop-swatch mb-7 d-flex align-items-center">
                    <span class="fw-semibold text-body-emphasis me-7">Size: </span>
                    <ul class="list-inline d-flex justify-content-start mb-0">
                        <?php foreach ($sizes as $key => $value) :
                        ?>
                        <li class="list-inline-item me-4 fw-semibold">
                            <input value="<?= $value ?>" type="radio" id=<?= $value ?> name="size_id"
                                class="product-info-size d-none"
                                <?= ($key === array_key_first($sizes)) ? 'checked' : '' ?>>
                            <label for="<?= $value ?>" class="fs-14px p-4 d-block rounded text-decoration-none border"
                                data-var="<?= $value ?>"><?= $key ?></label>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="form-group product-color mb-7 mt-3">
                    <label class="mb-2 pb-4"><span class="fw-semibold text-body-emphasis me-2 pe-4">Color:</span>
                        <ul class="list-inline d-flex justify-content-start mb-0">
                            <?php foreach ($colors as $key => $value) :

                            ?>
                            <li class="list-inline-item list-color-product selected p-3">
                                <input value="<?= $value ?>" type="radio" id="<?= $value ?>" name="color_id"
                                    class="product-info-size d-none"
                                    <?= ($key === array_key_first($colors)) ? 'checked' : '' ?>>
                                <label style="background-color: <?= $key ?>" for="<?= $value ?>"
                                    class="d-block color-item border" data-var="<?= $key ?>"></label>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                </div>

                <div class="row align-items-end">
                    <div class="form-group col-sm-4">
                        <label class=" text-body-emphasis fw-semibold fs-15px pb-6" for="number">Quantity: </label>
                        <div class="input-group position-relative w-100 input-group-lg">
                            <a href="#"
                                class="shop-down position-absolute translate-middle-y top-50 start-0 ps-7 product-info-2-minus"><i
                                    class="far fa-minus"></i></a>
                            <input name="quantity" type="number" id="number"
                                class="product-info-2-quantity form-control w-100 px-6 text-center" value="1"
                                required="">
                            <a href="#"
                                class="shop-up position-absolute translate-middle-y top-50 end-0 pe-7 product-info-2-plus"><i
                                    class="far fa-plus"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-8 pt-9 mt-2 mt-sm-0 pt-sm-0">
                        <button id="addToCart" type="submit"
                            class="btn-hover-bg-primary btn-hover-border-primary btn btn-lg btn-dark w-100">Add To Cart
                        </button>
                    </div>
                </div>
            </form>

            <ul class="single-product-meta list-unstyled border-top pt-7 mt-7">
                <li class="d-flex mb-4 pb-2 align-items-center">
                    <span class="text-body-emphasis fw-semibold fs-14px">Sku:</span>
                    <span class="ps-4"><?= $product['p_code'] ?></span>
                </li>
                <li class="d-flex mb-4 pb-2 align-items-center">
                    <span class="text-body-emphasis fw-semibold fs-14px">Categories:</span>
                    <span class="ps-4"><?= $product['c_name'] ?></span>
                </li>
            </ul>
            <div class="mt-13">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item pb-4">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <a class="product-info-accordion text-decoration-none collapsed" href="#"
                                data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false"
                                aria-controls="flush-collapseOne">
                                <span class="fs-4">Product Detail</span>
                            </a>
                        </h2>
                    </div>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                        data-bs-parent="#accordionFlushExample">
                        <div class="pt-8 pb-3">
                            <p class="mb-2 pb-4">
                                <?= $product['p_description'] ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="border-top w-100 h-1px" data-animated-id="3"></div>

<?php if (!empty($similarProducts)) { ?>

<section class="container pt-15 pb-15 pt-lg-17 pb-lg-20" data-animated-id="4">
    <div class="text-center">
        <h2 class="mb-12">You may also like</h2>
    </div>
    <div class="row gy-11">
        <?php foreach ($similarProducts as $product) :
                $percent = floor((($product['p_price_regular'] - $product['p_discount']) / $product['p_price_regular']) * 100);

            ?>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="card card-product grid-2 bg-transparent border-0 animate__fadeInUp animate__animated"
                data-animate="fadeInUp">
                <figure class="card-img-top position-relative mb-7 overflow-hidden">
                    <a href="<?= BASE_URL ?>?action=product-detail&id=<?= $product['p_id'] ?>"
                        class="hover-zoom-in d-block" title="Enriched Duo" previewlistener="true">
                        <img style="height: 345px; object-fit: cover;"
                            src="<?= BASE_URL . $product['p_img_thumbnail'] ?>"
                            data-src="<?= BASE_URL . $product['p_img_thumbnail'] ?>" class="img-fluid w-100 loaded"
                            alt="Enriched Duo" width="330" height="440" loading="lazy" data-ll-status="loaded">
                    </a>
                    <?php if ($product['p_discount'] > 0) : ?>
                    <div class="position-absolute product-flash z-index-2">

                        <span class="badge badge-product-flash on-sale bg-primary"><?= '-' . $percent . '%' ?></span>
                    </div>
                    <?php endif; ?>
                </figure>
                <div class="card-body text-center p-0">
                    <span
                        class="d-flex align-items-center price text-body-emphasis fw-bold justify-content-center mb-3 fs-6">
                        <?php if ($product['p_discount'] > 0) { ?>
                        <del
                            class="text-body fw-500 me-4 fs-13px"><?= number_format($product['p_price_regular'], 0) . ' đ' ?></del>
                        <ins
                            class="text-decoration-none"><?= number_format($product['p_discount'], 0) . ' đ' ?></ins></span>
                    <?php } else { ?>
                    <ins
                        class="text-decoration-none"><?= number_format($product['p_price_regular'], 0) . ' đ' ?></ins></span>
                    <?php } ?>
                    <h4 class="product-title card-title text-primary-hover text-body-emphasis fs-15px fw-500 mb-3">
                        <a class="text-decoration-none text-reset"
                            href="<?= BASE_URL ?>?action=product-detail&id=<?= $product['p_id'] ?>"
                            previewlistener="true"><?= $product['p_name'] ?></a>
                    </h4>

                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>
<?php } ?>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const sizes = document.querySelectorAll(".product-info-size");
    const availabilityDiv = document.getElementById("availability");
    const sizesQuantity = <?= $countQuantityJson ?>;
    const addToCart = document.getElementById('addToCart');

    sizes.forEach(function(size) {
        size.addEventListener("change", function() {
            const selectedSize = this.value;
            const selectedSizeQuantity = sizesQuantity[selectedSize];
            if (selectedSizeQuantity > 0) {
                availabilityDiv.innerHTML = `Còn ${selectedSizeQuantity} sản phẩm`;
            } else {
                availabilityDiv.innerHTML = `Hết hàng`;
            }
        });

        const selectedSize = size.value;
        const selectedSizeQuantity = sizesQuantity[selectedSize];
        if (selectedSizeQuantity === 0) {
            size.disabled = true;
        }
    });

    const defaultSize = document.querySelector(".product-info-size:checked");
    if (defaultSize) {
        const selectedSize = defaultSize.value;
        const selectedSizeQuantity = sizesQuantity[selectedSize];
        if (selectedSizeQuantity > 0) {
            addToCart.disabled = true;
            availabilityDiv.innerHTML = `Còn ${selectedSizeQuantity} sản phẩm`;
        } else {
            availabilityDiv.innerHTML = `Hết hàng`;
        }
    }

});
</script>