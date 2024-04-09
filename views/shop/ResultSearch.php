<section class="page-title z-index-2 position-relative" data-animated-id="1">
    <div class="bg-body-secondary">
        <div class="container">
            <nav class="py-4 lh-30px" aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center py-1">
                    <li class="breadcrumb-item"><a href="../index.html" previewlistener="true">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="text-center py-13">
        <div class="container">
            <?php if (isset($_GET['keyword'])) {
                $keyword = $_GET['keyword'];
            ?>
            <h2 class="mb-0"><?= $title  ?>: <?= $keyword ?></h2>
            <?php } else { ?>
            <h2 class="mb-0">Search Results</h2>
            <?php } ?>
        </div>
    </div>
</section>
<section class="container container-xxl" data-animated-id="2">
    <div class="tool-bar mb-11 align-items-center justify-content-between d-lg-flex">
        <span></span>
        <div class="tool-bar-right align-items-center d-lg-flex">
            <ul class="list-unstyled d-flex align-items-center list-inline me-lg-7 me-0 mb-6 mb-lg-0">
                <li class="list-inline-item me-7">
                    <a class="fs-32px text-body-emphasis-hovertext-body-emphasis" href="#">
                        <svg class="icon icon-squares-four">
                            <use xlink:href="#icon-squares-four"></use>
                        </svg>
                    </a>
                </li>
                <li class="list-inline-item me-0">
                    <a class="fs-32px text-body-emphasis-hover  text-muted" href="../shop/shop-layout-v5.html"
                        previewlistener="true">
                        <svg class="icon icon-list">
                            <use xlink:href="#icon-list"></use>
                        </svg>
                    </a>
                </li>
                <li class="list-inline-item d-lg-none ms-auto">
                    <a data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                        class="btn btn-hover-border-primary btn-hover-bg-primary btn-hover-text-light btn-dark"><svg
                            class="icon icon-SlidersHorizontal fs-4 me-4">
                            <use xlink:href="#icon-SlidersHorizontal"></use>
                        </svg> Filter</a>
                </li>
            </ul>
            <ul class="list-unstyled d-flex align-items-center list-inline mb-0 ms-auto">
                <li class="list-inline-item me-0">
                    <select class="form-select" name="orderby" onchange="location = this.value;">
                        <option value="">Filter</option>
                        <option value="<?= BASE_URL ?>?action=search-product&orderby=price-desc">Sort by price: high to
                            low
                        </option>
                        <option value="<?= BASE_URL ?>?action=search-product&orderby=price-asc">Sort by price: low to
                            high
                        </option>
                    </select>
                </li>
            </ul>
        </div>
    </div>
</section>
<div class="container container-xxl pb-16 pb-lg-18 mb-lg-3" data-animated-id="4">
    <div class="row gy-50px">
        <?php
        foreach ($searchProduct as $item) :
            $percent = floor((($item['price_regular'] - $item['discount']) / $item['price_regular']) * 100);
        ?>
        <div class="col-sm-6 col-lg-4 col-xl-3">
            <div class="card card-product grid-1 bg-transparent border-0 animate__fadeInUp animate__animated"
                data-animate="fadeInUp">
                <figure class="card-img-top position-relative mb-7 overflow-hidden ">
                    <a href="<?= BASE_URL ?>?action=product-detail&id=<?= $item['id'] ?>" class="hover-zoom-in d-block"
                        title="Shield Conditioner" previewlistener="true">
                        <img style="height: 345px; object-fit: cover;" src="<?= BASE_URL . $item['img_thumbnail'] ?>"
                            data-src="<?= BASE_URL . $item['img_thumbnail'] ?>" class="img-fluid w-100 loaded"
                            alt="Shield Conditioner" width="450" height="600" loading="lazy" data-ll-status="loaded">
                    </a>
                    <?php if ($item['discount'] > 0) { ?>
                    <div class="position-absolute product-flash z-index-2 ">
                        <span class="badge badge-product-flash on-sale bg-primary"><?= '-' . $percent . '%' ?></span>
                    </div>
                    <?php } ?>
                    <div class="position-absolute d-flex z-index-2 product-actions  horizontal"><a
                            class="text-body-emphasis bg-body bg-dark-hover text-light-hover rounded-circle square product-action shadow-sm add_to_cart"
                            href="#" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart">
                            <svg class="icon icon-shopping-bag-open-light">
                                <use xlink:href="#icon-shopping-bag-open-light"></use>
                            </svg>
                        </a><a
                            class="text-body-emphasis bg-body bg-dark-hover text-light-hover rounded-circle square product-action shadow-sm quick-view"
                            href="#" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Quick View">
                            <span data-bs-toggle="modal" data-bs-target="#quickViewModal"
                                class="d-flex align-items-center justify-content-center">
                                <svg class="icon icon-eye-light">
                                    <use xlink:href="#icon-eye-light"></use>
                                </svg>
                            </span>
                        </a>
                        <a class="text-body-emphasis bg-body bg-dark-hover text-light-hover rounded-circle square product-action shadow-sm wishlist"
                            href="#" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Wishlist">
                            <svg class="icon icon-star-light">
                                <use xlink:href="#icon-star-light"></use>
                            </svg>
                        </a>
                        <a class="text-body-emphasis bg-body bg-dark-hover text-light-hover rounded-circle square product-action shadow-sm compare"
                            href="../shop/compare.html" data-bs-toggle="tooltip" data-bs-placement="top"
                            data-bs-title="Compare" previewlistener="true">
                            <svg class="icon icon-arrows-left-right-light">
                                <use xlink:href="#icon-arrows-left-right-light"></use>
                            </svg>
                        </a>
                    </div>
                </figure>
                <div class="card-body text-center p-0">

                    <span
                        class="d-flex align-items-center price text-body-emphasis fw-bold justify-content-center mb-3 fs-6">
                        <?php if ($item['discount'] > 0) { ?>
                        <del
                            class="text-body fw-500 me-4 fs-13px"><?= number_format($item['price_regular'], 0) . ' đ' ?></del>
                        <ins class="text-decoration-none"><?= number_format($item['discount'], 0) . ' đ' ?></ins></span>
                    <?php } else { ?>
                    <ins
                        class="text-decoration-none"><?= number_format($item['price_regular'], 0) . ' đ' ?></ins></span>
                    <?php } ?>
                    <h4 class="product-title card-title text-primary-hover text-body-emphasis fs-15px fw-500 mb-3"><a
                            class="text-decoration-none text-reset"
                            href="<?= BASE_URL ?>?action=product-detail&id=<?= $item['id'] ?>"
                            previewlistener="true"><?= $item['name'] ?></a></h4>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>