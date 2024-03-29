<header id="header" class="header header-sticky header-sticky-smart z-index-5">
    <div class="bg-primary bg-opacity-15">
        <div class="container-xxl container d-flex py-4">
            <div class="w-50 d-none d-lg-block">
                <ul class="social-icons list-inline mb-0 fs-14">
                    <li class="list-inline-item">
                        <a href="#" title="Twitter">
                            <svg class="icon">
                                <use xlink:href="#twitter"></use>
                            </svg>
                        </a>
                    </li>
                    <li class="list-inline-item ms-6">
                        <a href="#" title="Facebook">
                            <svg class="icon">
                                <use xlink:href="#facebook"></use>
                            </svg>
                        </a>
                    </li>
                    <li class="list-inline-item ms-6">
                        <a href="#" title="Instagram">
                            <svg class="icon">
                                <use xlink:href="#instagram"></use>
                            </svg>
                        </a>
                    </li>
                    <li class="list-inline-item ms-6">
                        <a href="#" title="Youtube">
                            <svg class="icon">
                                <use xlink:href="#youtube"></use>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="w-100 text-center">
                <p class="mb-0 fs-14px fw-bold text-primary text-uppercase">
                    Free shipping on all U.S. orders $50+
                </p>
            </div>
            <div class="w-50 d-none d-lg-block">
                <div class="d-flex align-items-center justify-content-end">
                    <div class="dropdown me-10">
                        <span class="d-inline-block me-3"><img src="images/header/flag.html" alt=""></span>
                        <button
                            class="btn btn-link dropdown-toggle fw-semibold text-uppercase ls-1 p-0 dropdown-menu-end fs-13px"
                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            English
                        </button>
                        <div class="dropdown-menu dropdown-menu-end py-5" style="min-width: unset">
                            <a class="dropdown-item py-1" href="#">French</a>
                            <a class="dropdown-item py-1" href="#">Spanish</a>
                            <a class="dropdown-item py-1" href="#">Korean</a>
                            <a class="dropdown-item py-1" href="#">Chinese</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <button
                            class="btn btn-link dropdown-toggle fw-semibold text-uppercase ls-1 p-0 dropdown-menu-end fs-13px"
                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            USD
                        </button>
                        <div class="dropdown-menu dropdown-menu-end py-5" style="min-width: unset">
                            <a class="dropdown-item py-1" href="#">EUR</a>
                            <a class="dropdown-item py-1" href="#">GBP</a>
                            <a class="dropdown-item py-1" href="#">JPY</a>
                            <a class="dropdown-item py-1" href="#">AUD</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sticky-area-wrap" style="height: 102.4px;">
        <div class="sticky-area">
            <div class="main-header nav navbar bg-body navbar-light navbar-expand-xl py-6 py-xl-0">
                <div class="container-xxl container">
                    <div class="d-flex d-xl-none w-100">
                        <div class="w-72px d-flex d-xl-none">
                            <button class="navbar-toggler align-self-center border-0 shadow-none px-0 canvas-toggle p-4"
                                type="button" data-bs-toggle="offcanvas" data-bs-target="#offCanvasNavBar"
                                aria-controls="offCanvasNavBar" aria-expanded="false" aria-label="Toggle Navigation">
                                <span class="fs-24 toggle-icon"></span>
                            </button>
                        </div>
                        <div class="d-flex mx-auto">
                            <a href="<?= BASE_URL ?>" class="navbar-brand px-8 py-4 mx-auto" previewlistener="true">
                                <img class="light-mode-img" src="<?= BASE_URL ?>assets/client/logo.png" width="179"
                                    height="26" alt="Glowing - Bootstrap 5 HTML Templates">
                                <img class="dark-mode-img" src="<?= BASE_URL ?>assets/client/logo-white.png" width="179"
                                    height="26" alt="Glowing - Bootstrap 5 HTML Templates">
                            </a>
                        </div>
                        <div class="icons-actions d-flex justify-content-end w-xl-50 fs-28px text-body-emphasis">
                            <div class="px-xl-5 d-inline-block">
                                <a class="lh-1 color-inherit text-decoration-none" href="#" data-bs-toggle="offcanvas"
                                    data-bs-target="#searchModal" aria-controls="searchModal" aria-expanded="false">
                                    <svg class="icon icon-magnifying-glass-light">
                                        <use xlink:href="#icon-magnifying-glass-light"></use>
                                    </svg>
                                </a>
                            </div>
                            <div class="color-modes position-relative ps-5">
                                <a class="bd-theme btn btn-link nav-link dropdown-toggle d-inline-flex align-items-center justify-content-center text-primary p-0 position-relative rounded-circle"
                                    href="#" aria-expanded="true" data-bs-toggle="dropdown" data-bs-display="static"
                                    aria-label="Toggle theme (light)">
                                    <svg class="bi my-1 theme-icon-active">
                                        <use href="#sun-fill"></use>
                                    </svg>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end fs-14px" data-bs-popper="static">
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center active"
                                            data-bs-theme-value="light" aria-pressed="true">
                                            <svg class="bi me-4 opacity-50 theme-icon">
                                                <use href="#sun-fill"></use>
                                            </svg>
                                            Light
                                            <svg class="bi ms-auto d-none">
                                                <use href="#check2"></use>
                                            </svg>
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center"
                                            data-bs-theme-value="dark" aria-pressed="false">
                                            <svg class="bi me-4 opacity-50 theme-icon">
                                                <use href="#moon-stars-fill"></use>
                                            </svg>
                                            Dark
                                            <svg class="bi ms-auto d-none">
                                                <use href="#check2"></use>
                                            </svg>
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center"
                                            data-bs-theme-value="auto" aria-pressed="false">
                                            <svg class="bi me-4 opacity-50 theme-icon">
                                                <use href="#circle-half"></use>
                                            </svg>
                                            Auto
                                            <svg class="bi ms-auto d-none">
                                                <use href="#check2"></use>
                                            </svg>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="d-none d-xl-flex flex-column flex-xl-row w-100">
                        <div class="w-auto w-xl-50 d-flex align-items-center">
                            <div
                                class="icons-actions d-none d-xl-flex justify-content-start me-auto fs-28px text-body-emphasis">
                                <div class="pe-6">
                                    <a class="lh-1 color-inherit text-decoration-none" href="#"
                                        data-bs-toggle="offcanvas" data-bs-target="#searchModal"
                                        aria-controls="searchModal" aria-expanded="false">
                                        <svg class="icon icon-magnifying-glass-light fs-5">
                                            <use xlink:href="#icon-magnifying-glass-light"></use>
                                        </svg>
                                        <span class="fs-15px">Search</span>
                                    </a>
                                </div>
                            </div>
                            <ul class="navbar-nav w-100 w-xl-auto">
                                <li
                                    class="nav-item transition-all-xl-1 py-xl-11 py-0 px-xxl-8 px-xl-6 dropdown dropdown-hover dropdown-fullwidth">
                                    <a class="nav-link d-flex justify-content-between position-relative py-xl-0 px-xl-0 text-uppercase fw-semibold ls-1 fs-15px fs-xl-14px"
                                        href="<?= BASE_URL ?>">Home</a>
                                </li>
                                <li
                                    class="nav-item transition-all-xl-1 py-xl-11 py-0 px-xxl-8 px-xl-6 dropdown dropdown-hover dropdown-fullwidth position-static">
                                    <a class="nav-link d-flex justify-content-between position-relative py-xl-0 px-xl-0 text-uppercase fw-semibold ls-1 fs-15px fs-xl-14px "
                                        href="<?= BASE_URL ?>?action=products">Shop</a>
                                </li>
                                <li
                                    class="nav-item transition-all-xl-1 py-xl-11 py-0 px-xxl-8 px-xl-6 dropdown dropdown-hover">
                                    <a class="nav-link d-flex justify-content-between position-relative py-xl-0 px-xl-0 text-uppercase fw-semibold ls-1 fs-15px fs-xl-14px dropdown-toggle"
                                        href="#" data-bs-toggle="dropdown" id="menu-item-pages" aria-haspopup="true"
                                        aria-expanded="false">Pages</a>
                                    <ul class="dropdown-menu py-6" aria-labelledby="menu-item-pages">
                                        <li class="dropend dropdown-hover" aria-haspopup="true" aria-expanded="false">
                                            <a class="dropdown-item pe-6 dropdown-toggle d-flex justify-content-between border-hover"
                                                href="#" data-bs-toggle="dropdown" id="menu-item-blog">
                                                <span class="border-hover-target"> Blog </span>
                                            </a>
                                            <ul class="dropdown-menu py-6" aria-labelledby="menu-item-blog"
                                                data-bs-popper="none">
                                                <li>
                                                    <a class="dropdown-item border-hover" href="blog/grid.html"
                                                        previewlistener="true">
                                                        <span class="border-hover-target">Blog Grid</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item border-hover" href="blog/grid-sidebar.html"
                                                        previewlistener="true">
                                                        <span class="border-hover-target">Blog Grid Sidebar</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item border-hover" href="blog/masonry.html"
                                                        previewlistener="true">
                                                        <span class="border-hover-target">Blog Masonsy</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item border-hover" href="blog/list.html"
                                                        previewlistener="true">
                                                        <span class="border-hover-target">Blog List</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item border-hover" href="blog/classic.html"
                                                        previewlistener="true">
                                                        <span class="border-hover-target">Blog Classic</span>
                                                    </a>
                                                </li>
                                                <li class="dropdown-divider"></li>
                                                <li>
                                                    <a class="dropdown-item border-hover" href="blog/details-01.html"
                                                        previewlistener="true">
                                                        <span class="border-hover-target">Blog Details 01</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item border-hover" href="blog/details-02.html"
                                                        previewlistener="true">
                                                        <span class="border-hover-target">Blog Details 02</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-divider"></li>
                                        <li class="dropend dropdown-hover" aria-haspopup="true" aria-expanded="false">
                                            <a class="dropdown-item pe-6 dropdown-toggle d-flex justify-content-between border-hover"
                                                href="#" data-bs-toggle="dropdown" id="menu-item-about-us">
                                                <span class="border-hover-target"> About Us </span>
                                            </a>
                                            <ul class="dropdown-menu py-6" aria-labelledby="menu-item-about-us"
                                                data-bs-popper="none">
                                                <li>
                                                    <a class="dropdown-item border-hover" href="about-us-01.html"
                                                        previewlistener="true">
                                                        <span class="border-hover-target">About Us 01</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item border-hover" href="about-us-02.html"
                                                        previewlistener="true">
                                                        <span class="border-hover-target">About Us 02</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropend dropdown-hover" aria-haspopup="true" aria-expanded="false">
                                            <a class="dropdown-item pe-6 dropdown-toggle d-flex justify-content-between border-hover"
                                                href="#" data-bs-toggle="dropdown" id="menu-item-contact-us">
                                                <span class="border-hover-target"> Contact us </span>
                                            </a>
                                            <ul class="dropdown-menu py-6" aria-labelledby="menu-item-contact-us"
                                                data-bs-popper="none">
                                                <li>
                                                    <a class="dropdown-item border-hover" href="contact-us-01.html"
                                                        previewlistener="true">
                                                        <span class="border-hover-target">Contact Us 01</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item border-hover" href="contact-us-02.html"
                                                        previewlistener="true">
                                                        <span class="border-hover-target">Contact Us 02</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropend dropdown-hover" aria-haspopup="true" aria-expanded="false">
                                            <a class="dropdown-item pe-6 dropdown-toggle d-flex justify-content-between border-hover"
                                                href="dashboard/dashboard.html" data-bs-toggle="dropdown"
                                                id="menu-item-dashboard" previewlistener="true">
                                                <span class="border-hover-target"> Dashboard </span>
                                            </a>
                                            <ul class="dropdown-menu py-6" aria-labelledby="menu-item-dashboard"
                                                data-bs-popper="none">
                                                <li>
                                                    <a class="dropdown-item border-hover"
                                                        href="dashboard/dashboard.html" previewlistener="true">
                                                        <span class="border-hover-target">Dashboard</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item border-hover"
                                                        href="dashboard/product-grid.html" previewlistener="true">
                                                        <span class="border-hover-target">Products</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item border-hover"
                                                        href="dashboard/order-list.html" previewlistener="true">
                                                        <span class="border-hover-target">Orders</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item border-hover"
                                                        href="dashboard/sellers-cards.html" previewlistener="true">
                                                        <span class="border-hover-target">Sellers</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item border-hover"
                                                        href="dashboard/add-product-1.html" previewlistener="true">
                                                        <span class="border-hover-target">Add Product</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item border-hover"
                                                        href="dashboard/transactions-1.html" previewlistener="true">
                                                        <span class="border-hover-target">Transaction</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item border-hover" href="dashboard/reviews.html"
                                                        previewlistener="true">
                                                        <span class="border-hover-target">Reviews</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item border-hover" href="dashboard/brands.html"
                                                        previewlistener="true">
                                                        <span class="border-hover-target">Brands</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item border-hover"
                                                        href="dashboard/profile-settings.html" previewlistener="true">
                                                        <span class="border-hover-target">Settings</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a class="dropdown-item pe-6 border-hover" href="faqs.html"
                                                previewlistener="true">
                                                <span class="border-hover-target"> FAQs </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item pe-6 border-hover" href="find-a-store.html"
                                                previewlistener="true">
                                                <span class="border-hover-target"> Store </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item pe-6 border-hover" href="404.html"
                                                previewlistener="true">
                                                <span class="border-hover-target"> 404 </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="px-10 d-none d-xl-flex align-items-center">
                            <a href="<?= BASE_URL ?>" class="navbar-brand px-8 py-4 mx-auto" previewlistener="true">
                                <img class="light-mode-img" src="<?= BASE_URL ?>assets/client/logo.png" width="179"
                                    height="26" alt="Glowing - Bootstrap 5 HTML Templates">
                                <img class="dark-mode-img" src="assets/images/others/logo-white.png" width="179"
                                    height="26" alt="Glowing - Bootstrap 5 HTML Templates"></a>
                        </div>
                        <div class="w-auto w-xl-50 d-flex align-items-center">
                            <ul class="navbar-nav w-100 w-xl-auto">
                                <li
                                    class="nav-item transition-all-xl-1 py-xl-11 py-0 px-xxl-8 px-xl-6 dropdown dropdown-hover dropdown-fullwidth">
                                    <a class="nav-link d-flex justify-content-between position-relative py-xl-0 px-xl-0 text-uppercase fw-semibold ls-1 fs-15px fs-xl-14px dropdown-toggle"
                                        href="#" data-bs-toggle="dropdown" id="menu-item-docs" aria-haspopup="true"
                                        aria-expanded="false">Docs</a>
                                    <div class="dropdown-menu mega-menu start-0 py-6" aria-labelledby="menu-item-docs">
                                        <div class="menumega-docs px-8" style="min-width: 250px">
                                            <a href="docs/usage/getting-started.html"
                                                class="d-flex text-decoration-none mb-4 mb-lg-0" title="Documentation"
                                                previewlistener="true">
                                                <div class="flex-shrink-0 fs-5 lh-1 text-muted pt-2">
                                                    <svg class="icon">
                                                        <use xlink:href="#book"></use>
                                                    </svg>
                                                </div>
                                                <div class="flex-grow-1 ps-6">
                                                    <h6 class="mb-2">Documentation</h6>
                                                    <small>Kick-start customization</small>
                                                </div>
                                            </a>
                                            <hr class="dropdown-divider mx-n8">
                                            <a href="docs/components/accordion.html"
                                                class="d-flex text-decoration-none mb-4 mb-lg-0" title="UI Kit"
                                                previewlistener="true">
                                                <div class="flex-shrink-0 fs-5 lh-1 text-muted pt-2">
                                                    <svg class="icon">
                                                        <use xlink:href="#layer-group"></use>
                                                    </svg>
                                                </div>
                                                <div class="flex-grow-1 ps-6">
                                                    <h6 class="mb-2">UI Kit</h6>
                                                    <small>Flexible components</small>
                                                </div>
                                            </a>
                                            <hr class="dropdown-divider mx-n8">
                                            <a href="docs/usage/changelog.html"
                                                class="d-flex text-decoration-none mb-4 mb-lg-0" title="Changelog"
                                                previewlistener="true">
                                                <div class="flex-shrink-0 fs-5 lh-1 text-muted pt-2">
                                                    <svg class="icon">
                                                        <use xlink:href="#pen-to-square"></use>
                                                    </svg>
                                                </div>
                                                <div class="flex-grow-1 ps-6">
                                                    <h6 class="mb-2">Changelog</h6>
                                                    <small>Regular updates</small>
                                                </div>
                                            </a>
                                            <hr class="dropdown-divider mx-n8">
                                            <a href="https://sp.g5plus.net/"
                                                class="d-flex text-decoration-none mb-4 mb-lg-0" title="Support"
                                                target="_blank" previewlistener="true">
                                                <div class="flex-shrink-0 fs-5 lh-1 text-muted pt-2">
                                                    <svg class="icon">
                                                        <use xlink:href="#headset"></use>
                                                    </svg>
                                                </div>
                                                <div class="flex-grow-1 ps-6">
                                                    <h6 class="mb-2">Support</h6>
                                                    <small>https://sp.g5plus.net/</small>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div
                                class="icons-actions d-none d-xl-flex justify-content-end ms-auto fs-28px text-body-emphasis">
                                <div class="px-5 d-none d-xl-inline-block">
                                    <a class="position-relative lh-1 color-inherit text-decoration-none"
                                        href="shop/wishlist.html" previewlistener="true">
                                        <svg class="icon icon-star-light">
                                            <use xlink:href="#icon-star-light"></use>
                                        </svg>
                                        <span
                                            class="badge bg-dark text-white position-absolute top-0 start-100 translate-middle mt-4 rounded-circle fs-13px p-0 square"
                                            style="--square-size: 18px">3</span>
                                    </a>
                                </div>
                                <div class="px-5 d-none d-xl-inline-block">
                                    <a class="position-relative lh-1 color-inherit text-decoration-none" href="#"
                                        data-bs-toggle="offcanvas" data-bs-target="#shoppingCart"
                                        aria-controls="shoppingCart" aria-expanded="false">
                                        <svg class="icon icon-star-light">
                                            <use xlink:href="#icon-shopping-bag-open-light"></use>
                                        </svg>
                                        <span
                                            class="badge bg-dark text-white position-absolute top-0 start-100 translate-middle mt-4 rounded-circle fs-13px p-0 square"
                                            style="--square-size: 18px">3</span>
                                    </a>
                                </div>
                                <div style="margin-right: 10px;" class="color-modes position-relative ps-5">
                                    <a class="bd-theme btn btn-link nav-link dropdown-toggle d-inline-flex align-items-center justify-content-center text-primary p-0 position-relative rounded-circle"
                                        href="#" aria-expanded="true" data-bs-toggle="dropdown" data-bs-display="static"
                                        aria-label="Toggle theme (light)">
                                        <svg class="bi my-1 theme-icon-active">
                                            <use href="#sun-fill"></use>
                                        </svg>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end fs-14px" data-bs-popper="static">
                                        <li>
                                            <button type="button" class="dropdown-item d-flex align-items-center active"
                                                data-bs-theme-value="light" aria-pressed="true">
                                                <svg class="bi me-4 opacity-50 theme-icon">
                                                    <use href="#sun-fill"></use>
                                                </svg>
                                                Light
                                                <svg class="bi ms-auto d-none">
                                                    <use href="#check2"></use>
                                                </svg>
                                            </button>
                                        </li>
                                        <li>
                                            <button type="button" class="dropdown-item d-flex align-items-center"
                                                data-bs-theme-value="dark" aria-pressed="false">
                                                <svg class="bi me-4 opacity-50 theme-icon">
                                                    <use href="#moon-stars-fill"></use>
                                                </svg>
                                                Dark
                                                <svg class="bi ms-auto d-none">
                                                    <use href="#check2"></use>
                                                </svg>
                                            </button>
                                        </li>
                                        <li>
                                            <button type="button" class="dropdown-item d-flex align-items-center"
                                                data-bs-theme-value="auto" aria-pressed="false">
                                                <svg class="bi me-4 opacity-50 theme-icon">
                                                    <use href="#circle-half"></use>
                                                </svg>
                                                Auto
                                                <svg class="bi ms-auto d-none">
                                                    <use href="#check2"></use>
                                                </svg>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                                <?php if (isset($_SESSION['user']) && (is_array($_SESSION['user']))) { ?>
                                <div class="dropdown me-10">
                                    <a class="lh-1 color-inherit text-decoration-none"
                                        href="<?= BASE_URL ?>?action=login-client" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <svg class="icon icon-user-light">
                                            <use xlink:href="#icon-user-light"></use>
                                        </svg>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end py-5" style="min-width: unset">
                                        <a class="dropdown-item py-1" href="#">French</a>
                                        <a class="dropdown-item py-1" href="#">Spanish</a>
                                        <a class="dropdown-item py-1" href="#">Korean</a>
                                        <a class="dropdown-item py-1" href="<?= BASE_URL ?>?action=logout-client"> <i
                                                style="margin-right: 4px;"
                                                class="fa-solid fa-right-from-bracket"></i>Logout</a>
                                    </div>
                                </div>
                                <?php } else {  ?>
                                <div class="px-5 d-none d-xl-inline-block">
                                    <a class="lh-1 color-inherit text-decoration-none"
                                        href="<?= BASE_URL ?>?action=login-client">
                                        <svg class="icon icon-user-light">
                                            <use xlink:href="#icon-user-light"></use>
                                        </svg>
                                    </a>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>