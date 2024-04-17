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
                        <a href="<?= $GLOBALS['settings']['url-facebook'] ?? null ?>" title="Facebook">
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
                    <?= $GLOBALS['settings']['topbar-title'] ?? null ?>
                </p>
            </div>
            <div class="w-50 d-none d-lg-block">
                <div class="d-flex align-items-center justify-content-end">
                    <div class="dropdown me-10">
                        <span class="d-inline-block me-3"><img src="images/header/flag.html" alt=""></span>
                        <button class="btn btn-link dropdown-toggle fw-semibold text-uppercase ls-1 p-0 dropdown-menu-end fs-13px" type="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                        <button class="btn btn-link dropdown-toggle fw-semibold text-uppercase ls-1 p-0 dropdown-menu-end fs-13px" type="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                            <button class="navbar-toggler align-self-center border-0 shadow-none px-0 canvas-toggle p-4" type="button" data-bs-toggle="offcanvas" data-bs-target="#offCanvasNavBar" aria-controls="offCanvasNavBar" aria-expanded="false" aria-label="Toggle Navigation">
                                <span class="fs-24 toggle-icon"></span>
                            </button>
                        </div>
                        <div class="d-flex mx-auto">
                            <a href="<?= BASE_URL ?>" class="navbar-brand px-8 py-4 mx-auto" previewlistener="true">
                                <img class="light-mode-img" src="<?= $GLOBALS['settings']['logo'] ?>" width="179" height="26" alt="Glowing - Bootstrap 5 HTML Templates">
                                <img class="dark-mode-img" src="<?= $GLOBALS['settings']['logo'] ?>" width="179" height="26" alt="Glowing - Bootstrap 5 HTML Templates">
                            </a>
                        </div>
                        <div class="icons-actions d-flex justify-content-end w-xl-50 fs-28px text-body-emphasis">
                            <div class="px-xl-5 d-inline-block">
                                <a class="lh-1 color-inherit text-decoration-none" href="#" data-bs-toggle="offcanvas" data-bs-target="#searchModal" aria-controls="searchModal" aria-expanded="false">
                                    <svg class="icon icon-magnifying-glass-light">
                                        <use xlink:href="#icon-magnifying-glass-light"></use>
                                    </svg>
                                </a>
                            </div>
                            <div class="color-modes position-relative ps-5">
                                <a class="bd-theme btn btn-link nav-link dropdown-toggle d-inline-flex align-items-center justify-content-center text-primary p-0 position-relative rounded-circle" href="#" aria-expanded="true" data-bs-toggle="dropdown" data-bs-display="static" aria-label="Toggle theme (light)">
                                    <svg class="bi my-1 theme-icon-active">
                                        <use href="#sun-fill"></use>
                                    </svg>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end fs-14px" data-bs-popper="static">
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="light" aria-pressed="true">
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
                                        <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
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
                                        <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="auto" aria-pressed="false">
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
                            <div class="icons-actions d-none d-xl-flex justify-content-start me-auto fs-28px text-body-emphasis">
                                <div class="pe-6">
                                    <a class="lh-1 color-inherit text-decoration-none" href="#" data-bs-toggle="offcanvas" data-bs-target="#searchModal" aria-controls="searchModal" aria-expanded="false">
                                        <svg class="icon icon-magnifying-glass-light fs-5">
                                            <use xlink:href="#icon-magnifying-glass-light"></use>
                                        </svg>
                                        <span class="fs-15px">Search</span>
                                    </a>
                                </div>
                            </div>
                            <ul class="navbar-nav w-100 w-xl-auto">
                                <li class="nav-item transition-all-xl-1 py-xl-11 py-0 px-xxl-8 px-xl-6 dropdown dropdown-hover dropdown-fullwidth">
                                    <a class="nav-link d-flex justify-content-between position-relative py-xl-0 px-xl-0 text-uppercase fw-semibold ls-1 fs-15px fs-xl-14px" href="<?= BASE_URL ?>">Home</a>
                                </li>
                                <li class="nav-item transition-all-xl-1 py-xl-11 py-0 px-xxl-8 px-xl-6 dropdown dropdown-hover dropdown-fullwidth position-static">
                                    <a class="nav-link d-flex justify-content-between position-relative py-xl-0 px-xl-0 text-uppercase fw-semibold ls-1 fs-15px fs-xl-14px " href="<?= BASE_URL ?>?action=products">Shop</a>
                                </li>

                            </ul>
                        </div>
                        <div class="px-10 d-none d-xl-flex align-items-center">
                            <a href="<?= BASE_URL ?>" class="navbar-brand px-8 py-4 mx-auto" previewlistener="true">
                                <img class="light-mode-img" src="<?= BASE_URL ?>assets/client/logo.png" width="179" height="26" alt="Glowing - Bootstrap 5 HTML Templates">
                                <img class="dark-mode-img" src="<?= BASE_URL ?>assets/client/images/others/logo-white.png" width="179" height="26" alt="Glowing - Bootstrap 5 HTML Templates"></a>
                        </div>
                        <div class="w-auto w-xl-50 d-flex align-items-center">
                            <div class="w-auto w-xl-50 d-flex align-items-center">

                                <ul class="navbar-nav w-100 w-xl-auto">
                                    <li class="nav-item transition-all-xl-1 py-xl-11 py-0 px-xxl-8 px-xl-6 dropdown dropdown-hover dropdown-fullwidth">
                                        <a class="nav-link d-flex justify-content-between position-relative py-xl-0 px-xl-0 text-uppercase fw-semibold ls-1 fs-15px fs-xl-14px" href="<?= BASE_URL ?>?action=contact">Contact</a>
                                    </li>
                                    <li class="nav-item transition-all-xl-1 py-xl-11 py-0 px-xxl-8 px-xl-6 dropdown dropdown-hover dropdown-fullwidth">
                                        <a class="nav-link d-flex justify-content-between position-relative py-xl-0 px-xl-0 text-uppercase fw-semibold ls-1 fs-15px fs-xl-14px" href="<?= BASE_URL ?>?action=about">About</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="icons-actions d-none d-xl-flex justify-content-end ms-auto fs-28px text-body-emphasis">

                                <div class="px-5 d-none d-xl-inline-block">
                                    <a class="position-relative lh-1 color-inherit text-decoration-none" href="#" previewlistener="true">
                                        <svg class="icon icon-star-light">
                                            <use xlink:href="#icon-star-light"></use>
                                        </svg>
                                        <span class="badge bg-dark text-white position-absolute top-0 start-100 translate-middle mt-4 rounded-circle fs-13px p-0 square" style="--square-size: 18px">3</span>
                                    </a>
                                </div>
                                <div class="px-5 d-none d-xl-inline-block">
                                    <a class="position-relative lh-1 color-inherit text-decoration-none" href="#" data-bs-toggle="offcanvas" data-bs-target="#shoppingCart" aria-controls="shoppingCart" aria-expanded="false">
                                        <svg class="icon icon-star-light">
                                            <use xlink:href="#icon-shopping-bag-open-light"></use>
                                        </svg>
                                        <span class="badge bg-dark text-white position-absolute top-0 start-100 translate-middle mt-4 rounded-circle fs-13px p-0 square" style="--square-size: 18px">3</span>
                                    </a>
                                </div>
                                <div style="margin-right: 10px;" class="color-modes position-relative ps-5">
                                    <a class="bd-theme btn btn-link nav-link dropdown-toggle d-inline-flex align-items-center justify-content-center text-primary p-0 position-relative rounded-circle" href="#" aria-expanded="true" data-bs-toggle="dropdown" data-bs-display="static" aria-label="Toggle theme (light)">
                                        <svg class="bi my-1 theme-icon-active">
                                            <use href="#sun-fill"></use>
                                        </svg>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end fs-14px" data-bs-popper="static">
                                        <li>
                                            <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="light" aria-pressed="true">
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
                                            <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
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
                                            <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="auto" aria-pressed="false">
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
                                        <a class="lh-1 color-inherit text-decoration-none" href="<?= BASE_URL ?>?action=login-client" data-bs-toggle="dropdown" aria-expanded="false">
                                            <svg class="icon icon-user-light">
                                                <use xlink:href="#icon-user-light"></use>
                                            </svg>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end py-5" style="min-width: unset">
                                            <a class="dropdown-item py-1" href="<?= BASE_URL ?>?action=my-account">
                                                <i style="margin-right: 2px;" class="fa-solid fa-circle-user"></i>
                                                My Account
                                            </a>
                                            <?php if ($_SESSION['user']['role'] == 1) { ?>
                                                <a class="dropdown-item py-1" href="<?= BASE_URL_ADMIN ?>">
                                                    <i style="margin-right: 2px;" class="fa-solid fa-user-tie"></i>
                                                    Admin Dashboard
                                                </a>
                                            <?php } ?>
                                            <a class="dropdown-item py-1" href="<?= BASE_URL ?>?action=change-password">
                                                <i style="margin-right: 2px;" class="fa-solid fa-lock"></i> Change Password
                                            </a>
                                            <a class="dropdown-item py-1" href="<?= BASE_URL ?>?action=my-orders">
                                                <i style="margin-right: 2px;" class="fa-solid fa-bag-shopping"></i> Orders
                                            </a>
                                            <a class="dropdown-item py-1" href="<?= BASE_URL ?>?action=logout-client"> <i style="margin-right: 4px;" class="fa-solid fa-right-from-bracket"></i>Logout</a>
                                        </div>
                                    </div>
                                <?php } else {  ?>
                                    <div class="px-5 d-none d-xl-inline-block">
                                        <a class="lh-1 color-inherit text-decoration-none" href="<?= BASE_URL ?>?action=login-client">
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