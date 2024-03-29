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
                <p class="mb-0 fw-semibold text-body-emphasis">4.86</p>
                <div class="d-flex align-items-center fs-12px justify-content-center mb-0 px-6 rating-result">
                    <div class="rating">
                        <div class="empty-stars">
                            <span class="star">
                                <svg class="icon star-o">
                                    <use xlink:href="#star-o"></use>
                                </svg>
                            </span>
                            <span class="star">
                                <svg class="icon star-o">
                                    <use xlink:href="#star-o"></use>
                                </svg>
                            </span>
                            <span class="star">
                                <svg class="icon star-o">
                                    <use xlink:href="#star-o"></use>
                                </svg>
                            </span>
                            <span class="star">
                                <svg class="icon star-o">
                                    <use xlink:href="#star-o"></use>
                                </svg>
                            </span>
                            <span class="star">
                                <svg class="icon star-o">
                                    <use xlink:href="#star-o"></use>
                                </svg>
                            </span>
                        </div>
                        <div class="filled-stars" style="width: 100%">
                            <span class="star">
                                <svg class="icon star text-primary">
                                    <use xlink:href="#star"></use>
                                </svg>
                            </span>
                            <span class="star">
                                <svg class="icon star text-primary">
                                    <use xlink:href="#star"></use>
                                </svg>
                            </span>
                            <span class="star">
                                <svg class="icon star text-primary">
                                    <use xlink:href="#star"></use>
                                </svg>
                            </span>
                            <span class="star">
                                <svg class="icon star text-primary">
                                    <use xlink:href="#star"></use>
                                </svg>
                            </span>
                            <span class="star">
                                <svg class="icon star text-primary">
                                    <use xlink:href="#star"></use>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
                <a href="#" class="border-start ps-6 text-body">Read 2947 reviews</a>
            </div>
            <p class="fs-15px">
                <?= $product['p_over_view'] ?>
            </p>
            <form class="pb-8" action="<?= BASE_URL ?>?action=add-to-cart" method="post">
                <input type="hidden" name="product_id" value="<?= $product['p_id'] ?>">
                <div class="form-group shop-swatch mb-7 d-flex align-items-center">
                    <span class="fw-semibold text-body-emphasis me-7">Size: </span>
                    <ul class="list-inline d-flex justify-content-start mb-0">
                        <?php foreach ($sizes as $key => $value) :

                        ?>
                        <li class="list-inline-item me-4 fw-semibold">
                            <input value="<?= $value ?>" type="radio" id="<?= $key ?>" name="size_id"
                                class="product-info-size d-none">
                            <label for="<?= $key ?>" class="fs-14px p-4 d-block rounded text-decoration-none border"
                                data-var="<?= $value ?>"><?= $value ?></label>
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
                                <input value="<?= $key ?>" type="radio" id="<?= $key ?>" name="color_id"
                                    class="product-info-size d-none" checked="">
                                <label style="background-color: <?= $value ?>;" for="<?= $key ?>"
                                    class="d-block color-item border" data-var="<?= $value ?>"></label>
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
                        <button type="submit"
                            class="btn-hover-bg-primary btn-hover-border-primary btn btn-lg btn-dark w-100">Add To Bag
                        </button>
                    </div>
                </div>
            </form>
            <div class="d-flex align-items-center flex-wrap">
                <a href="../shop/compare.html"
                    class="text-decoration-none fw-semibold fs-6 me-9 pe-2 d-flex align-items-center"
                    previewlistener="true">
                    <svg class="icon fs-5">
                        <use xlink:href="#icon-arrows-left-right-light"></use>
                    </svg>
                    <span class="ms-4 ps-2">Compare</span>
                </a>
                <a href="#" class="text-decoration-none fw-semibold fs-6 me-9 pe-2 d-flex align-items-center">
                    <svg class="icon fs-5">
                        <use xlink:href="#icon-star-light"></use>
                    </svg>
                    <span class="ms-4 ps-2">Add to wishlist</span>
                </a>
                <a href="#" class="text-decoration-none fw-semibold fs-6 me-9 pe-2 d-flex align-items-center">
                    <svg class="icon fs-5">
                        <use xlink:href="#icon-ShareNetwork"></use>
                    </svg>
                    <span class="ms-4 ps-2">Share</span>
                </a>
            </div>
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
                        data-bs-parent="#accordionFlushExample" style="">
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
                    <div class="position-absolute d-flex z-index-2 product-actions  vertical"><a
                            class="text-body-emphasis bg-body bg-dark-hover text-light-hover rounded-circle square product-action shadow-sm quick-view sm"
                            href="#" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Quick View">
                            <span data-bs-toggle="modal" data-bs-target="#quickViewModal"
                                class="d-flex align-items-center justify-content-center">
                                <svg class="icon icon-eye-light">
                                    <use xlink:href="#icon-eye-light"></use>
                                </svg>
                            </span>
                        </a>
                        <a class="text-body-emphasis bg-body bg-dark-hover text-light-hover rounded-circle square product-action shadow-sm wishlist sm"
                            href="#" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Add To Wishlist">
                            <svg class="icon icon-star-light">
                                <use xlink:href="#icon-star-light"></use>
                            </svg>
                        </a>
                        <a class="text-body-emphasis bg-body bg-dark-hover text-light-hover rounded-circle square product-action shadow-sm compare sm"
                            href="./shop/compare.html" data-bs-toggle="tooltip" data-bs-placement="left"
                            data-bs-title="Compare" previewlistener="true">
                            <svg class="icon icon-arrows-left-right-light">
                                <use xlink:href="#icon-arrows-left-right-light"></use>
                            </svg>
                        </a>
                    </div><a href="#"
                        class="btn btn-add-to-cart btn-dark btn-hover-bg-primary btn-hover-border-primary position-absolute z-index-2 text-nowrap btn-sm px-6 py-3 lh-2">Add
                        To Cart</a>
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
                    <div class="d-flex align-items-center fs-12px justify-content-center">
                        <div class="rating">
                            <div class="empty-stars">
                                <span class="star">
                                    <svg class="icon star-o">
                                        <use xlink:href="#star-o"></use>
                                    </svg>
                                </span>
                                <span class="star">
                                    <svg class="icon star-o">
                                        <use xlink:href="#star-o"></use>
                                    </svg>
                                </span>
                                <span class="star">
                                    <svg class="icon star-o">
                                        <use xlink:href="#star-o"></use>
                                    </svg>
                                </span>
                                <span class="star">
                                    <svg class="icon star-o">
                                        <use xlink:href="#star-o"></use>
                                    </svg>
                                </span>
                                <span class="star">
                                    <svg class="icon star-o">
                                        <use xlink:href="#star-o"></use>
                                    </svg>
                                </span>
                            </div>
                            <div class="filled-stars" style="width: 100%">
                                <span class="star">
                                    <svg class="icon star text-primary">
                                        <use xlink:href="#star"></use>
                                    </svg>
                                </span>
                                <span class="star">
                                    <svg class="icon star text-primary">
                                        <use xlink:href="#star"></use>
                                    </svg>
                                </span>
                                <span class="star">
                                    <svg class="icon star text-primary">
                                        <use xlink:href="#star"></use>
                                    </svg>
                                </span>
                                <span class="star">
                                    <svg class="icon star text-primary">
                                        <use xlink:href="#star"></use>
                                    </svg>
                                </span>
                                <span class="star">
                                    <svg class="icon star text-primary">
                                        <use xlink:href="#star"></use>
                                    </svg>
                                </span>
                            </div>
                        </div><span class="reviews ms-4 pt-3 fs-14px">2947 reviews</span>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>
<?php } ?>

<section class="container container-xxl pt-15 pb-15 pt-lg-17 pb-lg-20" data-animated-id="6">
    <div class="text-center">
        <h2 class="mb-16 fs-3">Customer Reviews</h2>
    </div>
    <div class="row">
        <div class=" col-xl-3 col-md-5">
            <div class="position-sticky top-0 mb-md-0 mb-12">
                <div class="card text-center border border-2 rounded product-review-info">
                    <div class="card-body px-4 py-10">
                        <h5 class="card-title fs-1 mb-6">4.86</h5>
                        <div class="d-flex align-items-center fs-15px ls-0 justify-content-center mb-4">
                            <div class="rating">
                                <div class="empty-stars">
                                    <span class="star">
                                        <svg class="icon star-o">
                                            <use xlink:href="#star-o"></use>
                                        </svg>
                                    </span>
                                    <span class="star">
                                        <svg class="icon star-o">
                                            <use xlink:href="#star-o"></use>
                                        </svg>
                                    </span>
                                    <span class="star">
                                        <svg class="icon star-o">
                                            <use xlink:href="#star-o"></use>
                                        </svg>
                                    </span>
                                    <span class="star">
                                        <svg class="icon star-o">
                                            <use xlink:href="#star-o"></use>
                                        </svg>
                                    </span>
                                    <span class="star">
                                        <svg class="icon star-o">
                                            <use xlink:href="#star-o"></use>
                                        </svg>
                                    </span>
                                </div>
                                <div class="filled-stars" style="width: 90%">
                                    <span class="star">
                                        <svg class="icon star text-primary">
                                            <use xlink:href="#star"></use>
                                        </svg>
                                    </span>
                                    <span class="star">
                                        <svg class="icon star text-primary">
                                            <use xlink:href="#star"></use>
                                        </svg>
                                    </span>
                                    <span class="star">
                                        <svg class="icon star text-primary">
                                            <use xlink:href="#star"></use>
                                        </svg>
                                    </span>
                                    <span class="star">
                                        <svg class="icon star text-primary">
                                            <use xlink:href="#star"></use>
                                        </svg>
                                    </span>
                                    <span class="star">
                                        <svg class="icon star text-primary">
                                            <use xlink:href="#star"></use>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <p class="card-text mb-5 mt-4">2947 Reviews, 18 Q&amp;As</p>
                        <div class="mb-8">
                            <div class="d-flex align-items-center justify-content-center mb-5">
                                <p class="text-start m-0 review-star">5 stars</p>
                                <div class="mx-5 d-block mw-160px mw-lg-120px mw-sm-60 w-100">
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar" role="progressbar" aria-label="Example 1px high"
                                            style="width: 78%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                                <p class="text-end m-0 review-percent">78%</p>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-5">
                                <p class="text-start m-0 review-star">4 stars</p>
                                <div class="mx-5 d-block mw-160px mw-lg-120px mw-sm-60 w-100">
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar" role="progressbar" aria-label="Example 1px high"
                                            style="width: 17%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                                <p class="text-end m-0 review-percent">17%</p>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-5">
                                <p class="text-start m-0 review-star">3 stars</p>
                                <div class="mx-5 d-block mw-160px mw-lg-120px mw-sm-60 w-100">
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar" role="progressbar" aria-label="Example 1px high"
                                            style="width: 3%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                                <p class="text-end m-0 review-percent">3%</p>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-5">
                                <p class="text-start m-0 review-star">2 stars</p>
                                <div class="mx-5 d-block mw-160px mw-lg-120px mw-sm-60 w-100">
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar" role="progressbar" aria-label="Example 1px high"
                                            style="width: 2%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                                <p class="text-end m-0 review-percent">2%</p>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-5">
                                <p class="text-start m-0 review-star">1 stars</p>
                                <div class="mx-5 d-block mw-160px mw-lg-120px mw-sm-60 w-100">
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar" role="progressbar" aria-label="Example 1px high"
                                            style="width: 0%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                                <p class="text-end m-0 review-percent">0%</p>
                            </div>
                        </div>
                        <a href="#customer-review" class="btn btn-outline-dark" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="customer-review"><svg class="icon">
                                <use xlink:href="#icon-Pencil"></use>
                            </svg>
                            Wire A Review</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-lg-12 ps-auto col-xl-9 col-md-7">
            <div class="collapse mb-14" id="customer-review">
                <form class="product-review-form">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group mb-7">
                                <label class="mb-4 fs-6 fw-semibold text-body-emphasis" for="reviewName">Name</label>
                                <input id="reviewName" class="form-control" type="text" name="name">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-4">
                                <label class="mb-4 fs-6 fw-semibold text-body-emphasis" for="reviewEmail">Email</label>
                                <input id="reviewEmail" type="email" name="email" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div>
                        <p class="mt-4 mb-5 fs-6 fw-semibold text-body-emphasis">Your Rating*</p>
                        <div class="form-group mb-6 d-flex justify-content-start">
                            <div class="rate-input">
                                <input type="radio" id="star5" name="rate" value="5" style="">
                                <label for="star5" title="text" class="mb-0 mr-1 lh-1">
                                    <i class="far fa-star"></i>
                                </label>
                                <input type="radio" id="star4" name="rate" value="5" style="">
                                <label for="star4" title="text" class="mb-0 mr-1 lh-1">
                                    <i class="far fa-star"></i>
                                </label>
                                <input type="radio" id="star3" name="rate" value="5" style="">
                                <label for="star3" title="text" class="mb-0 mr-1 lh-1">
                                    <i class="far fa-star"></i>
                                </label>
                                <input type="radio" id="star2" name="rate" value="5" style="">
                                <label for="star2" title="text" class="mb-0 mr-1 lh-1">
                                    <i class="far fa-star"></i>
                                </label>
                                <input type="radio" id="star1" name="rate" value="5" style="">
                                <label for="star1" title="text" class="mb-0 mr-1 lh-1">
                                    <i class="far fa-star"></i>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-7">
                        <label class="mb-4 fs-6 fw-semibold text-body-emphasis" for="reviewTitle">Title of
                            Review:</label>
                        <input id="reviewTitle" type="text" name="title" class="form-control">
                    </div>
                    <div class="form-group mb-10">
                        <label class="mb-4 fs-6 fw-semibold text-body-emphasis" for="reviewMessage">How was your overall
                            experience?</label>
                        <textarea id="reviewMessage" class="form-control" name="message" rows="5"></textarea>
                    </div>
                    <div class="d-flex">
                        <div class="me-4">
                            <div class="input-group align-items-center">
                                <input type="file" name="img" class="form-control border" id="reviewrAddPhoto">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="product-filter-review">
                <h3 class="fs-5">Filter Review</h3>
                <ul class="list-inline mb-8 mx-n3 filter-review">
                    <li class="list-inline-item spacing">
                        <a href="#"
                            class="btn btn-outline btn-hove-border-body-emphasis-color btn-border-1 py-4 px-6 fw-500">
                            Foundation
                        </a>
                    </li>
                    <li class="list-inline-item spacing">
                        <a href="#"
                            class="btn btn-outline btn-hove-border-body-emphasis-color btn-border-1 py-4 px-6 fw-500">
                            Coverage
                        </a>
                    </li>
                    <li class="list-inline-item spacing">
                        <a href="#"
                            class="btn btn-outline btn-hove-border-body-emphasis-color btn-border-1 py-4 px-6 fw-500">
                            Skin
                        </a>
                    </li>
                    <li class="list-inline-item spacing">
                        <a href="#"
                            class="btn btn-outline btn-hove-border-body-emphasis-color btn-border-1 py-4 px-6 fw-500">
                            Color
                        </a>
                    </li>
                    <li class="list-inline-item spacing">
                        <a href="#"
                            class="btn btn-outline btn-hove-border-body-emphasis-color btn-border-1 py-4 px-6 fw-500">
                            Shade
                        </a>
                    </li>
                    <li class="list-inline-item spacing">
                        <a href="#"
                            class="btn btn-outline btn-hove-border-body-emphasis-color btn-border-1 py-4 px-6 fw-500">
                            Make up
                        </a>
                    </li>
                    <li class="list-inline-item spacing">
                        <a href="#"
                            class="btn btn-outline btn-hove-border-body-emphasis-color btn-border-1 py-4 px-6 fw-500">
                            Face
                        </a>
                    </li>
                    <li class="list-inline-item spacing">
                        <a href="#"
                            class="btn btn-outline btn-hove-border-body-emphasis-color btn-border-1 py-4 px-6 fw-500">
                            Ingredients
                        </a>
                    </li>
                    <li class="list-inline-item spacing">
                        <a href="#"
                            class="btn btn-outline btn-hove-border-body-emphasis-color btn-border-1 py-4 px-6 fw-500">
                            Moisturizer
                        </a>
                    </li>
                    <li class="list-inline-item spacing">
                        <a href="#"
                            class="btn btn-outline btn-hove-border-body-emphasis-color btn-border-1 py-4 px-6 fw-500">
                            Pure
                        </a>
                    </li>
                    <li class="list-inline-item spacing">
                        <a href="#"
                            class="btn btn-outline btn-hove-border-body-emphasis-color btn-border-1 py-4 px-6 fw-500">
                            Nature
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a class="btn btn-outline btn-hove-border-body-emphasis-color btn-border-1 py-4 px-6 fw-500"
                            data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
                            aria-controls="collapseExample">
                            ...
                        </a>
                    </li>
                    <li class="collapse m-3 list-inline-item collapse" id="collapseExample">
                        <ul class="list-inline list-inline-item">
                            <li class="list-inline-item">
                                <a href="#"
                                    class="btn btn-outline btn-hove-border-body-emphasis-color btn-border-1 py-4 px-6 fw-500">
                                    Good Value
                                </a>
                            </li>
                        </ul>
                        <ul class="list-inline list-inline-item">
                            <li class="list-inline-item">
                                <a href="#"
                                    class="btn btn-outline btn-hove-border-body-emphasis-color btn-border-1 py-4 px-6 fw-500">
                                    Lightweight
                                </a>
                            </li>
                        </ul>
                        <ul class="list-inline list-inline-item">
                            <li class="list-inline-item">
                                <a href="#"
                                    class="btn btn-outline btn-hove-border-body-emphasis-color btn-border-1 py-4 px-6 fw-500">
                                    Smells Great
                                </a>
                            </li>
                        </ul>
                        <ul class="list-inline list-inline-item">
                            <li class="list-inline-item">
                                <a href="#"
                                    class="btn btn-outline btn-hove-border-body-emphasis-color btn-border-1 py-4 px-6 fw-500">
                                    Easy To Use
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="row gy-15px align-items-center spacing-02">
                    <div class="col-auto search-review w-100 px-4">
                        <div class="form-group product-review-form">
                            <div class="input-group-prepend position-absolute z-index-10">
                                <button class="btn btn-link text-secondary fs-15px px-7" type="submit"><i
                                        class="far fa-search"></i>
                                </button>
                            </div>
                            <input type="text" id="search_reviews" name="search_reviews"
                                class="form-control fs-15px pe-7 ps-13  rounded" placeholder="Search reviews">
                            <label for="search_reviews" class="visually-hidden">Search reviews</label>
                        </div>
                    </div>
                    <div class="col-auto dropdown skin-goal px-4">
                        <label for="skin_goal" class="visually-hidden">Skin goal</label>
                        <select name="skin_goal" id="skin_goal" class="form-select">
                            <option>Skin goal</option>
                            <option>Looking Pores</option>
                            <option>Clear Skin</option>
                            <option>Chicagon</option>
                            <option>Dewy-Looking Skin</option>
                            <option>Radiant</option>
                        </select>
                    </div>
                    <div class="col-auto dropdown skin-goal px-4">
                        <label for="image_video" class="visually-hidden">Image &amp; Video</label>
                        <select name="image_video" id="image_video" class="form-select">
                            <option>Image &amp; Video</option>
                            <option>Newest</option>
                            <option>Oldest</option>
                        </select>
                    </div>
                    <div class="col-auto dropdown skin-goal px-4">
                        <label for="sort_by" class="visually-hidden">Sort by</label>
                        <select name="sort_by" id="sort_by" class="form-select">
                            <option>Sort by</option>
                            <option>Newest</option>
                            <option>Oldest</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class=" mt-12">
                <h3 class="fs-5">2947 Reviews</h3>
                <div class="border-bottom pb-7 pt-10">
                    <div class="d-flex align-items-center mb-6">
                        <div class="d-flex align-items-center fs-15px ls-0">
                            <div class="rating">
                                <div class="empty-stars">
                                    <span class="star">
                                        <svg class="icon star-o">
                                            <use xlink:href="#star-o"></use>
                                        </svg>
                                    </span>
                                    <span class="star">
                                        <svg class="icon star-o">
                                            <use xlink:href="#star-o"></use>
                                        </svg>
                                    </span>
                                    <span class="star">
                                        <svg class="icon star-o">
                                            <use xlink:href="#star-o"></use>
                                        </svg>
                                    </span>
                                    <span class="star">
                                        <svg class="icon star-o">
                                            <use xlink:href="#star-o"></use>
                                        </svg>
                                    </span>
                                    <span class="star">
                                        <svg class="icon star-o">
                                            <use xlink:href="#star-o"></use>
                                        </svg>
                                    </span>
                                </div>
                                <div class="filled-stars" style="width: 100%">
                                    <span class="star">
                                        <svg class="icon star text-primary">
                                            <use xlink:href="#star"></use>
                                        </svg>
                                    </span>
                                    <span class="star">
                                        <svg class="icon star text-primary">
                                            <use xlink:href="#star"></use>
                                        </svg>
                                    </span>
                                    <span class="star">
                                        <svg class="icon star text-primary">
                                            <use xlink:href="#star"></use>
                                        </svg>
                                    </span>
                                    <span class="star">
                                        <svg class="icon star text-primary">
                                            <use xlink:href="#star"></use>
                                        </svg>
                                    </span>
                                    <span class="star">
                                        <svg class="icon star text-primary">
                                            <use xlink:href="#star"></use>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <span class="fs-3px mx-5"><i class="fas fa-circle"></i></span>
                        <span class="fs-14">5 day ago</span>
                    </div>
                    <div class="d-flex justify-content-start align-items-center mb-5">
                        <img src="../assets/images/others/single-product-01.png"
                            data-src="../assets/images/others/single-product-01.png" class="me-6 rounded-circle loaded"
                            width="60" height="60" alt="Avatar" loading="lazy" data-ll-status="loaded">
                        <div class="">
                            <h5 class="mt-0 mb-4 fs-14px text-uppercase ls-1">JENNIFER C.</h5>
                            <p class="mb-0">/ Orlando, FL</p>
                        </div>
                    </div>
                    <p class="fw-semibold fs-6 text-body-emphasis mb-5">Favorite Foundation</p>
                    <p class="mb-10 fs-6">I order the samples so as not to make mistakes when choosing my color Is a
                        good product as a light shade but the sample doesn't contain enough product to cover the skin
                        and decide clearly, around my eyes I used the “peach bisque”. I used with primer all mu face and
                        finished texture is good. At the end for my latin tan skin a choose “golden peach” But is out of
                        stock the primer I think is a good match.</p>
                    <div class="d-flex justify-content-end align-items-center">
                        <a href="#" class="fs-14px mb-0 text-secondary">Was This Review Helpful?</a>
                        <p class="mb-0 ms-7 text-body-emphasis">
                            <svg class="icon icon-like align-baseline">
                                <use xlink:href="#icon-like"></use>
                            </svg>
                            10
                        </p>
                        <p class="mb-0 ms-6 text-body-emphasis">
                            <svg class="icon icon-unlike align-baseline">
                                <use xlink:href="#icon-unlike"></use>
                            </svg>
                            1
                        </p>
                    </div>
                </div>
                <div class="border-bottom pb-7 pt-10">
                    <div class="d-flex align-items-center mb-6">
                        <div class="d-flex align-items-center fs-15px ls-0">
                            <div class="rating">
                                <div class="empty-stars">
                                    <span class="star">
                                        <svg class="icon star-o">
                                            <use xlink:href="#star-o"></use>
                                        </svg>
                                    </span>
                                    <span class="star">
                                        <svg class="icon star-o">
                                            <use xlink:href="#star-o"></use>
                                        </svg>
                                    </span>
                                    <span class="star">
                                        <svg class="icon star-o">
                                            <use xlink:href="#star-o"></use>
                                        </svg>
                                    </span>
                                    <span class="star">
                                        <svg class="icon star-o">
                                            <use xlink:href="#star-o"></use>
                                        </svg>
                                    </span>
                                    <span class="star">
                                        <svg class="icon star-o">
                                            <use xlink:href="#star-o"></use>
                                        </svg>
                                    </span>
                                </div>
                                <div class="filled-stars" style="width: 80%">
                                    <span class="star">
                                        <svg class="icon star text-primary">
                                            <use xlink:href="#star"></use>
                                        </svg>
                                    </span>
                                    <span class="star">
                                        <svg class="icon star text-primary">
                                            <use xlink:href="#star"></use>
                                        </svg>
                                    </span>
                                    <span class="star">
                                        <svg class="icon star text-primary">
                                            <use xlink:href="#star"></use>
                                        </svg>
                                    </span>
                                    <span class="star">
                                        <svg class="icon star text-primary">
                                            <use xlink:href="#star"></use>
                                        </svg>
                                    </span>
                                    <span class="star">
                                        <svg class="icon star text-primary">
                                            <use xlink:href="#star"></use>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <span class="fs-3px mx-5"><i class="fas fa-circle"></i></span>
                        <span class="fs-14">3 day ago</span>
                    </div>
                    <div class="d-flex justify-content-start align-items-center mb-5">
                        <img src="../assets/images/others/product-review-avatar-01.jpg"
                            data-src="../assets/images/others/product-review-avatar-01.jpg"
                            class="me-6 rounded-circle loaded" width="60" height="60" alt="Avatar" loading="lazy"
                            data-ll-status="loaded">
                        <div class="">
                            <h5 class="mt-0 mb-4 fs-14px text-uppercase ls-1">JENNIFER C.</h5>
                            <p class="mb-0">/ Georgia</p>
                        </div>
                    </div>
                    <p class="fw-semibold fs-6 text-body-emphasis mb-5">Good as light coverage</p>
                    <p class="mb-10 fs-6">The foundation feels light on my face, and the color matches great. Also the
                        customer service is phenomenal. I would purchase again.</p>
                    <div class="mb-10"><img src="../assets/images/others/single-product-03.jpg"
                            data-src="../assets/images/others/single-product-03.jpg" class="mx-3 w-auto loaded" alt=""
                            loading="lazy" data-ll-status="loaded">
                        <img src="../assets/images/others/single-product-02.jpg"
                            data-src="../assets/images/others/single-product-02.jpg" class="mx-3 w-auto loaded" alt=""
                            loading="lazy" data-ll-status="loaded">
                    </div>
                    <div class="d-flex justify-content-end align-items-center">
                        <a href="#" class="fs-14px mb-0 text-secondary">Was This Review Helpful?</a>
                        <p class="mb-0 ms-7 text-body-emphasis">
                            <svg class="icon icon-like align-baseline">
                                <use xlink:href="#icon-like"></use>
                            </svg>
                            12
                        </p>
                        <p class="mb-0 ms-6 text-body-emphasis">
                            <svg class="icon icon-unlike align-baseline">
                                <use xlink:href="#icon-unlike"></use>
                            </svg>
                            4
                        </p>
                    </div>
                </div>
                <div class="border-bottom pb-7 pt-10">
                    <div class="d-flex align-items-center mb-6">
                        <div class="d-flex align-items-center fs-15px ls-0">
                            <div class="rating">
                                <div class="empty-stars">
                                    <span class="star">
                                        <svg class="icon star-o">
                                            <use xlink:href="#star-o"></use>
                                        </svg>
                                    </span>
                                    <span class="star">
                                        <svg class="icon star-o">
                                            <use xlink:href="#star-o"></use>
                                        </svg>
                                    </span>
                                    <span class="star">
                                        <svg class="icon star-o">
                                            <use xlink:href="#star-o"></use>
                                        </svg>
                                    </span>
                                    <span class="star">
                                        <svg class="icon star-o">
                                            <use xlink:href="#star-o"></use>
                                        </svg>
                                    </span>
                                    <span class="star">
                                        <svg class="icon star-o">
                                            <use xlink:href="#star-o"></use>
                                        </svg>
                                    </span>
                                </div>
                                <div class="filled-stars" style="width: 100%">
                                    <span class="star">
                                        <svg class="icon star text-primary">
                                            <use xlink:href="#star"></use>
                                        </svg>
                                    </span>
                                    <span class="star">
                                        <svg class="icon star text-primary">
                                            <use xlink:href="#star"></use>
                                        </svg>
                                    </span>
                                    <span class="star">
                                        <svg class="icon star text-primary">
                                            <use xlink:href="#star"></use>
                                        </svg>
                                    </span>
                                    <span class="star">
                                        <svg class="icon star text-primary">
                                            <use xlink:href="#star"></use>
                                        </svg>
                                    </span>
                                    <span class="star">
                                        <svg class="icon star text-primary">
                                            <use xlink:href="#star"></use>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <span class="fs-3px mx-5"><i class="fas fa-circle"></i></span>
                        <span class="fs-14">3 day ago</span>
                    </div>
                    <div class="d-flex justify-content-start align-items-center mb-5">
                        <img src="../assets/images/others/product-review-avatar-03.jpg"
                            data-src="../assets/images/others/product-review-avatar-03.jpg"
                            class="me-6 rounded-circle loaded" width="60" height="60" alt="Avatar" loading="lazy"
                            data-ll-status="loaded">
                        <div class="">
                            <h5 class="mt-0 mb-4 fs-14px text-uppercase ls-1">JENNIFER C.</h5>
                            <p class="mb-0">/ Orlando, FL</p>
                        </div>
                    </div>
                    <p class="fw-semibold fs-6 text-body-emphasis mb-5">Favorite Foundation</p>
                    <p class="mb-10 fs-6">The foundation feels light on my face, and the color matches great. Also the
                        customer service is phenomenal. I would purchase again.</p>
                    <div class="mb-10"><img src="../assets/images/others/single-product-03.jpg"
                            data-src="../assets/images/others/single-product-03.jpg" class="mx-3 w-auto loaded" alt=""
                            loading="lazy" data-ll-status="loaded">
                        <img src="../assets/images/others/single-product-02.jpg"
                            data-src="../assets/images/others/single-product-02.jpg" class="mx-3 w-auto loaded" alt=""
                            loading="lazy" data-ll-status="loaded">
                    </div>
                    <div class="d-flex justify-content-end align-items-center">
                        <a href="#" class="fs-14px mb-0 text-secondary">Was This Review Helpful?</a>
                        <p class="mb-0 ms-7 text-body-emphasis">
                            <svg class="icon icon-like align-baseline">
                                <use xlink:href="#icon-like"></use>
                            </svg>
                            10
                        </p>
                        <p class="mb-0 ms-6 text-body-emphasis">
                            <svg class="icon icon-unlike align-baseline">
                                <use xlink:href="#icon-unlike"></use>
                            </svg>
                            0
                        </p>
                    </div>
                </div>
                <div class="border-bottom pb-7 pt-10">
                    <div class="d-flex align-items-center mb-6">
                        <div class="d-flex align-items-center fs-15px ls-0">
                            <div class="rating">
                                <div class="empty-stars">
                                    <span class="star">
                                        <svg class="icon star-o">
                                            <use xlink:href="#star-o"></use>
                                        </svg>
                                    </span>
                                    <span class="star">
                                        <svg class="icon star-o">
                                            <use xlink:href="#star-o"></use>
                                        </svg>
                                    </span>
                                    <span class="star">
                                        <svg class="icon star-o">
                                            <use xlink:href="#star-o"></use>
                                        </svg>
                                    </span>
                                    <span class="star">
                                        <svg class="icon star-o">
                                            <use xlink:href="#star-o"></use>
                                        </svg>
                                    </span>
                                    <span class="star">
                                        <svg class="icon star-o">
                                            <use xlink:href="#star-o"></use>
                                        </svg>
                                    </span>
                                </div>
                                <div class="filled-stars" style="width: 100%">
                                    <span class="star">
                                        <svg class="icon star text-primary">
                                            <use xlink:href="#star"></use>
                                        </svg>
                                    </span>
                                    <span class="star">
                                        <svg class="icon star text-primary">
                                            <use xlink:href="#star"></use>
                                        </svg>
                                    </span>
                                    <span class="star">
                                        <svg class="icon star text-primary">
                                            <use xlink:href="#star"></use>
                                        </svg>
                                    </span>
                                    <span class="star">
                                        <svg class="icon star text-primary">
                                            <use xlink:href="#star"></use>
                                        </svg>
                                    </span>
                                    <span class="star">
                                        <svg class="icon star text-primary">
                                            <use xlink:href="#star"></use>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <span class="fs-3px mx-5"><i class="fas fa-circle"></i></span>
                        <span class="fs-14">3 day ago</span>
                    </div>
                    <div class="d-flex justify-content-start align-items-center mb-5">
                        <img src="../assets/images/others/product-review-avatar-02.jpg"
                            data-src="../assets/images/others/product-review-avatar-02.jpg"
                            class="me-6 rounded-circle loaded" width="60" height="60" alt="Avatar" loading="lazy"
                            data-ll-status="loaded">
                        <div class="">
                            <h5 class="mt-0 mb-4 fs-14px text-uppercase ls-1">JENNIFER C.</h5>
                            <p class="mb-0">/ Orlando, FL</p>
                        </div>
                    </div>
                    <p class="fw-semibold fs-6 text-body-emphasis mb-5">Favorite Foundation</p>
                    <p class="mb-10 fs-6">I order the samples so as not to make mistakes when choosing my color Is a
                        good product as a light shade but the sample doesn’t contain enough product to cover the skin
                        and decide clearly, around my eyes I used the “peach bisque”.I used with primer all mu face and
                        finished texture is good. At the end for my latin tan skin a choose “golden peach” But is out of
                        stock the primer I think is a good match.</p>
                    <div class="d-flex justify-content-end align-items-center">
                        <a href="#" class="fs-14px mb-0 text-secondary">Was This Review Helpful?</a>
                        <p class="mb-0 ms-7 text-body-emphasis">
                            <svg class="icon icon-like align-baseline">
                                <use xlink:href="#icon-like"></use>
                            </svg>
                            10
                        </p>
                        <p class="mb-0 ms-6 text-body-emphasis">
                            <svg class="icon icon-unlike align-baseline">
                                <use xlink:href="#icon-unlike"></use>
                            </svg>
                            0
                        </p>
                    </div>
                </div>
                <div class="border-bottom pb-7 pt-10">
                    <div class="d-flex align-items-center mb-6">
                        <div class="d-flex align-items-center fs-15px ls-0">
                            <div class="rating">
                                <div class="empty-stars">
                                    <span class="star">
                                        <svg class="icon star-o">
                                            <use xlink:href="#star-o"></use>
                                        </svg>
                                    </span>
                                    <span class="star">
                                        <svg class="icon star-o">
                                            <use xlink:href="#star-o"></use>
                                        </svg>
                                    </span>
                                    <span class="star">
                                        <svg class="icon star-o">
                                            <use xlink:href="#star-o"></use>
                                        </svg>
                                    </span>
                                    <span class="star">
                                        <svg class="icon star-o">
                                            <use xlink:href="#star-o"></use>
                                        </svg>
                                    </span>
                                    <span class="star">
                                        <svg class="icon star-o">
                                            <use xlink:href="#star-o"></use>
                                        </svg>
                                    </span>
                                </div>
                                <div class="filled-stars" style="width: 100%">
                                    <span class="star">
                                        <svg class="icon star text-primary">
                                            <use xlink:href="#star"></use>
                                        </svg>
                                    </span>
                                    <span class="star">
                                        <svg class="icon star text-primary">
                                            <use xlink:href="#star"></use>
                                        </svg>
                                    </span>
                                    <span class="star">
                                        <svg class="icon star text-primary">
                                            <use xlink:href="#star"></use>
                                        </svg>
                                    </span>
                                    <span class="star">
                                        <svg class="icon star text-primary">
                                            <use xlink:href="#star"></use>
                                        </svg>
                                    </span>
                                    <span class="star">
                                        <svg class="icon star text-primary">
                                            <use xlink:href="#star"></use>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <span class="fs-3px mx-5"><i class="fas fa-circle"></i></span>
                        <span class="fs-14">3 day ago</span>
                    </div>
                    <div class="d-flex justify-content-start align-items-center mb-5">
                        <img src="../assets/images/others/product-review-avatar-03.jpg"
                            data-src="../assets/images/others/product-review-avatar-03.jpg"
                            class="me-6 rounded-circle loaded" width="60" height="60" alt="Avatar" loading="lazy"
                            data-ll-status="loaded">
                        <div class="">
                            <h5 class="mt-0 mb-4 fs-14px text-uppercase ls-1">Lucille D</h5>
                            <p class="mb-0">/ Georgia</p>
                        </div>
                    </div>
                    <p class="fw-semibold fs-6 text-body-emphasis mb-5">Good as light coverage</p>
                    <p class="mb-10 fs-6">The foundation feels light on my face, and the color matches great. Also the
                        customer service is phenomenal. I would purchase again.</p>
                    <div class="mb-10"><img src="../assets/images/others/single-product-03.jpg"
                            data-src="../assets/images/others/single-product-03.jpg" class="mx-3 w-auto loaded" alt=""
                            loading="lazy" data-ll-status="loaded">
                        <img src="../assets/images/others/single-product-02.jpg"
                            data-src="../assets/images/others/single-product-02.jpg" class="mx-3 w-auto loaded" alt=""
                            loading="lazy" data-ll-status="loaded">
                    </div>
                    <div class="d-flex justify-content-end align-items-center">
                        <a href="#" class="fs-14px mb-0 text-secondary">Was This Review Helpful?</a>
                        <p class="mb-0 ms-7 text-body-emphasis">
                            <svg class="icon icon-like align-baseline">
                                <use xlink:href="#icon-like"></use>
                            </svg>
                            10
                        </p>
                        <p class="mb-0 ms-6 text-body-emphasis">
                            <svg class="icon icon-unlike align-baseline">
                                <use xlink:href="#icon-unlike"></use>
                            </svg>
                            0
                        </p>
                    </div>
                </div>
            </div>
            <nav class="d-flex mt-13 pt-3 justify-content-center" aria-label="pagination">
                <ul class="pagination m-0">
                    <li class="page-item">
                        <a class="page-link rounded-circle d-flex align-items-center justify-content-center" href="#"
                            aria-label="Previous">
                            <svg class="icon">
                                <use xlink:href="#icon-angle-double-left"></use>
                            </svg>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                    <li class="page-item"><a class="page-link" href="#">6</a></li>
                    <li class="page-item">
                        <a class="page-link rounded-circle d-flex align-items-center justify-content-center" href="#"
                            aria-label="Next">
                            <svg class="icon">
                                <use xlink:href="#icon-angle-double-right"></use>
                            </svg>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</section>