<?php require_once PATH_VIEW . 'layout/partials/banner.php';
?>

<!-- OUR Feature products -->

<section id="ad" data-animated-id="6">
    <div class="container container-xxl pt-lg-19 pt-14 mb-2">
        <div class="mb-11 mt-2 pt-1 pb-3 text-center animate__fadeInUp animate__animated" data-animate="fadeInUp">
            <h2 class="mb-5">Customer Favorite Beauty Essentials</h2>
            <p class="fs-18px mb-0 mw-xl-30 mw-lg-50 mw-md-75 ms-auto me-auto">Made using clean, non-toxic ingredients,
                our products are designed for everyone.</p>
        </div>
        <div class="row">
            <div class="col-lg-5 mb-10 mb-lg-0 animate__fadeInUp animate__animated" data-animate="fadeInUp">
                <div class="card border-0 rounded-0 hover-zoom-in hover-shine">
                    <img style="height: 1200px; object-fit: cover;" class="lazy-image w-100 img-fluid card-img object-fit-cover banner-02" src="#" data-src="<?= BASE_URL . $dataImgCover[6] ?>" alt="Pamper Your Skin" />
                    <div class="card-img-overlay p-12 m-2 d-inline-flex flex-column justify-content-end">
                        <h5 class="card-subtitle fw-normal font-primary text-white fs-1 mb-5">
                            Get the Glow
                        </h5>
                        <h3 class="card-title mb-0 fs-2 text-white">
                            Shop your style
                        </h3>
                        <div class="mt-10 pt-2">
                            <a href="#" class="btn btn-white">Explore More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="row gy-11">
                    <?php foreach ($productHot as $product) :
                        $percent = floor((($product['price_regular'] - $product['discount']) / $product['price_regular']) * 100);
                    ?>
                        <div class="col-md-4 col-sm-6 col-12">
                            <div class="card card-product grid-2 bg-transparent border-0 animate__fadeInUp animate__animated" data-animate="fadeInUp">
                                <figure class="card-img-top position-relative mb-7 overflow-hidden">
                                    <a href="<?= BASE_URL ?>?action=product-detail&id=<?= $product['id'] ?>" class="hover-zoom-in d-block" title="Enriched Duo" previewlistener="true">
                                        <img style="height: 345px; object-fit: cover;" src="<?= BASE_URL . $product['img_thumbnail'] ?>" data-src="<?= BASE_URL . $product['img_thumbnail'] ?>" class="img-fluid w-100 loaded" alt="Enriched Duo" width="330" height="440" loading="lazy" data-ll-status="loaded">
                                    </a>
                                    <?php if ($product['discount'] > 0) : ?>
                                        <div class="position-absolute product-flash z-index-2">

                                            <span class="badge badge-product-flash on-sale bg-primary"><?= '-' . $percent . '%' ?></span>
                                        </div>
                                    <?php endif; ?>
                                    <div class="position-absolute d-flex z-index-2 product-actions  vertical"><a class="text-body-emphasis bg-body bg-dark-hover text-light-hover rounded-circle square product-action shadow-sm quick-view sm" href="#" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Quick View">
                                            <span data-bs-toggle="modal" data-bs-target="#quickViewModal" class="d-flex align-items-center justify-content-center">
                                                <svg class="icon icon-eye-light">
                                                    <use xlink:href="#icon-eye-light"></use>
                                                </svg>
                                            </span>
                                        </a>
                                        <a class="text-body-emphasis bg-body bg-dark-hover text-light-hover rounded-circle square product-action shadow-sm wishlist sm" href="#" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Add To Wishlist">
                                            <svg class="icon icon-star-light">
                                                <use xlink:href="#icon-star-light"></use>
                                            </svg>
                                        </a>
                                        <a class="text-body-emphasis bg-body bg-dark-hover text-light-hover rounded-circle square product-action shadow-sm compare sm" href="./shop/compare.html" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Compare" previewlistener="true">
                                            <svg class="icon icon-arrows-left-right-light">
                                                <use xlink:href="#icon-arrows-left-right-light"></use>
                                            </svg>
                                        </a>

                                </figure>
                                <div class="card-body text-center p-0">
                                    <span class="d-flex align-items-center price text-body-emphasis fw-bold justify-content-center mb-3 fs-6">
                                        <?php if ($product['discount'] > 0) { ?>
                                            <del class="text-body fw-500 me-4 fs-13px"><?= number_format($product['price_regular'], 0) . ' đ' ?></del>
                                            <ins class="text-decoration-none"><?= number_format($product['discount'], 0) . ' đ' ?></ins></span>
                                <?php } else { ?>
                                    <ins class="text-decoration-none"><?= number_format($product['price_regular'], 0) . ' đ' ?></ins></span>
                                <?php } ?>
                                <h4 class="product-title card-title text-primary-hover text-body-emphasis fs-15px fw-500 mb-3">
                                    <a class="text-decoration-none text-reset" href="<?= BASE_URL ?>?action=product-detail&id=<?= $product['id'] ?>" previewlistener="true"><?= $product['name'] ?></a>
                                </h4>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- END Feature products -->

<!-- Customer Favorite Beauty Essentials -->
<section class="container container-xxl pt-lg-18 pt-10">
    <div class="mb-12 pb-3 text-center" data-animate="fadeInUp">
        <h2 class="mb-5">New Arrivals Products</h2>
        <p class="fs-18px mb-0 mw-xl-30 mw-lg-50 mw-md-75 ms-auto me-auto">
            Made using clean, non-toxic ingredients, our products are designed
            for everyone.
        </p>
    </div>
    <div class="row">
        <div class="col-lg-5 mb-12 mb-xl-0 order-lg-1" data-animate="fadeInUp">
            <div class="card border-0 rounded-0 hover-zoom-in hover-shine">
                <img style="height: 1200px; object-fit: cover;" class="lazy-image w-100 img-fluid card-img object-fit-cover banner-02" src="#" data-src="<?= BASE_URL . $dataImgCover[7] ?>" alt="Pamper Your Skin" />
                <div class="card-img-overlay p-12 m-2 d-inline-flex flex-column justify-content-end">
                    <h5 class="card-subtitle fw-normal font-primary text-white fs-1 mb-5">
                        Get the Glow
                    </h5>
                    <h3 class="card-title mb-0 fs-2 text-white">
                        Shop by personality
                    </h3>
                    <div class="mt-10 pt-2">
                        <a href="#" class="btn btn-white">Explore More</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="row gy-11">
                <?php foreach ($productNewArrival as $product) :
                    $percent = floor((($product['price_regular'] - $product['discount']) / $product['price_regular']) * 100);
                ?>
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="card card-product grid-1 bg-transparent border-0" data-animate="fadeInUp">
                            <figure class="card-img-top position-relative mb-7 overflow-hidden">
                                <a href="<?= BASE_URL ?>?action=product-detail&id=<?= $product['id'] ?>" class="hover-zoom-in d-block" title="Vital Eye Cream">
                                    <img style="height: 345px; object-fit: cover;" src="#" data-src="<?= BASE_URL . $product['img_thumbnail'] ?>" class="img-fluid lazy-image w-100" alt="Vital Eye Cream" width="330" height="440" />
                                </a>
                                <?php if ($product['discount'] > 0) : ?>
                                    <div class="position-absolute product-flash z-index-2">

                                        <span class="badge badge-product-flash on-sale bg-primary"><?= '-' . $percent . '%' ?></span>
                                    </div>
                                <?php endif; ?>
                                <div class="position-absolute d-flex z-index-2 product-actions  vertical"><a class="text-body-emphasis bg-body bg-dark-hover text-light-hover rounded-circle square product-action shadow-sm quick-view sm" href="#" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Quick View">
                                        <span data-bs-toggle="modal" data-bs-target="#quickViewModal" class="d-flex align-items-center justify-content-center">
                                            <svg class="icon icon-eye-light">
                                                <use xlink:href="#icon-eye-light"></use>
                                            </svg>
                                        </span>
                                    </a>
                                    <a class="text-body-emphasis bg-body bg-dark-hover text-light-hover rounded-circle square product-action shadow-sm wishlist sm" href="#" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Add To Wishlist">
                                        <svg class="icon icon-star-light">
                                            <use xlink:href="#icon-star-light"></use>
                                        </svg>
                                    </a>
                                    <a class="text-body-emphasis bg-body bg-dark-hover text-light-hover rounded-circle square product-action shadow-sm compare sm" href="./shop/compare.html" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Compare" previewlistener="true">
                                        <svg class="icon icon-arrows-left-right-light">
                                            <use xlink:href="#icon-arrows-left-right-light"></use>
                                        </svg>
                                    </a>
                                </div>
                            </figure>
                            <div class="card-body text-center p-0">
                                <span class="d-flex align-items-center price text-body-emphasis fw-bold justify-content-center mb-3 fs-6">
                                    <?php if ($product['discount'] > 0) { ?>
                                        <del class="text-body fw-500 me-4 fs-13px"><?= number_format($product['price_regular'], 0) . ' đ' ?></del>
                                        <ins class="text-decoration-none"><?= number_format($product['discount'], 0) . ' đ' ?></ins></span>
                            <?php } else { ?>
                                <ins class="text-decoration-none"><?= number_format($product['price_regular'], 0) . ' đ' ?></ins></span>
                            <?php } ?>
                            <h4 class="product-title card-title text-primary-hover text-body-emphasis fs-15px fw-500 mb-3">
                                <a class="text-decoration-none text-reset" href="<?= BASE_URL ?>?action=product-detail&id=<?= $product['id'] ?>"><?= $product['name'] ?></a>
                            </h4>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
</section>


<section data-animated-id="6">
    <div class="container container-xxl pt-lg-19 pt-14 mb-2">
        <div class="mb-11 mt-2 pt-1 pb-3 text-center animate__fadeInUp animate__animated" data-animate="fadeInUp">
            <h2 class="mb-5">Products with shock discounts</h2>
            <p class="fs-18px mb-0 mw-xl-30 mw-lg-50 mw-md-75 ms-auto me-auto">Made using clean, non-toxic ingredients,
                our products are designed for everyone.</p>
        </div>
        <div class="row">
            <div class="col-lg-5 mb-10 mb-lg-0 animate__fadeInUp animate__animated" data-animate="fadeInUp">
                <div class="card border-0 rounded-0 hover-zoom-in hover-shine">
                    <img style="height: 1200px; object-fit: cover;" class="lazy-image w-100 img-fluid card-img object-fit-cover banner-02" src="#" data-src="<?= BASE_URL . $dataImgCover[9] ?>" alt="Pamper Your Skin" />
                    <div class="card-img-overlay p-12 m-2 d-inline-flex flex-column justify-content-end">
                        <h5 class="card-subtitle fw-normal font-primary text-white fs-1 mb-5">
                            Get the Glow
                        </h5>
                        <h3 class="card-title mb-0 fs-2 text-white">
                            Discount shopping
                        </h3>
                        <div class="mt-10 pt-2">
                            <a href="#" class="btn btn-white">Explore More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="row gy-11">
                    <?php foreach ($productSales as $product) :
                        $percent = floor((($product['price_regular'] - $product['discount']) / $product['price_regular']) * 100);

                    ?>
                        <div class="col-md-4 col-sm-6 col-12">
                            <div class="card card-product grid-2 bg-transparent border-0 animate__fadeInUp animate__animated" data-animate="fadeInUp">
                                <figure class="card-img-top position-relative mb-7 overflow-hidden">
                                    <a href="<?= BASE_URL ?>?action=product-detail&id=<?= $product['id'] ?>" class="hover-zoom-in d-block" title="Enriched Duo" previewlistener="true">
                                        <img style="height: 345px; object-fit: cover;" src="<?= BASE_URL . $product['img_thumbnail'] ?>" data-src="<?= BASE_URL . $product['img_thumbnail'] ?>" class="img-fluid w-100 loaded" alt="Enriched Duo" width="330" height="440" loading="lazy" data-ll-status="loaded">
                                    </a>
                                    <?php if ($product['discount'] > 0) : ?>
                                        <div class="position-absolute product-flash z-index-2">

                                            <span class="badge badge-product-flash on-sale bg-primary"><?= '-' . $percent . '%' ?></span>
                                        </div>
                                    <?php endif; ?>
                                    <div class="position-absolute d-flex z-index-2 product-actions  vertical"><a class="text-body-emphasis bg-body bg-dark-hover text-light-hover rounded-circle square product-action shadow-sm quick-view sm" href="#" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Quick View">
                                            <span data-bs-toggle="modal" data-bs-target="#quickViewModal" class="d-flex align-items-center justify-content-center">
                                                <svg class="icon icon-eye-light">
                                                    <use xlink:href="#icon-eye-light"></use>
                                                </svg>
                                            </span>
                                        </a>
                                        <a class="text-body-emphasis bg-body bg-dark-hover text-light-hover rounded-circle square product-action shadow-sm wishlist sm" href="#" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Add To Wishlist">
                                            <svg class="icon icon-star-light">
                                                <use xlink:href="#icon-star-light"></use>
                                            </svg>
                                        </a>
                                        <a class="text-body-emphasis bg-body bg-dark-hover text-light-hover rounded-circle square product-action shadow-sm compare sm" href="./shop/compare.html" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Compare" previewlistener="true">
                                            <svg class="icon icon-arrows-left-right-light">
                                                <use xlink:href="#icon-arrows-left-right-light"></use>
                                            </svg>
                                        </a>

                                </figure>
                                <div class="card-body text-center p-0">
                                    <span class="d-flex align-items-center price text-body-emphasis fw-bold justify-content-center mb-3 fs-6">
                                        <?php if ($product['discount'] > 0) { ?>
                                            <del class="text-body fw-500 me-4 fs-13px"><?= number_format($product['price_regular'], 0) . ' đ' ?></del>
                                            <ins class="text-decoration-none"><?= number_format($product['discount'], 0) . ' đ' ?></ins></span>
                                <?php } else { ?>
                                    <ins class="text-decoration-none"><?= number_format($product['price_regular'], 0) . ' đ' ?></ins></span>
                                <?php } ?>
                                <h4 class="product-title card-title text-primary-hover text-body-emphasis fs-15px fw-500 mb-3">
                                    <a class="text-decoration-none text-reset" href="<?= BASE_URL ?>?action=product-detail&id=<?= $product['id'] ?>" previewlistener="true"><?= $product['name'] ?></a>
                                </h4>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END Customer Favorite Beauty Essentials -->
<!-- More to Discover -->
<section style="background-color: #edf1f0;" class="py-lg-20 mt-10">
    <div class="container container-xxl">
        <div class="row gx-30px gy-30px">
            <div class="col-lg-4" data-animate="fadeInUp">
                <div class="d-flex">
                    <div class="me-9">
                        <img data-src="<?= BASE_URL ?>assets/client/image-box-18.png" alt="Guaranteed PURE" width="90" height="90" class="lazy-image" src="#" />
                    </div>
                    <div>
                        <h3 class="fs-4 mb-6">Guaranteed PURE</h3>
                        <p class="mb-0 pe-lg-12">
                            All Grace formulations adhere to strict purity standards and
                            will never contain harsh or toxic ingredients
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4" data-animate="fadeInUp">
                <div class="d-flex">
                    <div class="me-9">
                        <img data-src="<?= BASE_URL ?>assets/client/image-box-19.png" alt="Completely Cruelty-Free" width="90" height="90" class="lazy-image" src="#" />
                    </div>
                    <div>
                        <h3 class="fs-4 mb-6">Completely Cruelty-Free</h3>
                        <p class="mb-0 pe-lg-12">
                            All Grace formulations adhere to strict purity standards and
                            will never contain harsh or toxic ingredients
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4" data-animate="fadeInUp">
                <div class="d-flex">
                    <div class="me-9">
                        <img data-src="<?= BASE_URL ?>assets/client/image-box-20.png" alt="Ingredient Sourcing" width="90" height="90" class="lazy-image" src="#" />
                    </div>
                    <div>
                        <h3 class="fs-4 mb-6">Ingredient Sourcing</h3>
                        <p class="mb-0 pe-lg-12">
                            All Grace formulations adhere to strict purity standards and
                            will never contain harsh or toxic ingredients
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END More to Discover -->