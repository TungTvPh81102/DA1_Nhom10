<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>

                <li>
                    <a href="<?= BASE_URL_ADMIN ?>">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Dashboards</span>
                    </a>

                </li>
                <li class="menu-title" key="t-apps">APP</li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span key="t-ecommerce">Quản lý danh mục</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?= BASE_URL_ADMIN ?>?action=categories-list" key="t-products">Danh sách danh
                                mục</a></li>
                        <li><a href="<?= BASE_URL_ADMIN ?>?action=category-create" key="t-product-detail">Tạo mới</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span key="t-ecommerce">Quản lý thương hiệu</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?= BASE_URL_ADMIN ?>?action=brands-list" key="t-products">Danh sách thương
                                hiệu</a></li>
                        <li><a href="<?= BASE_URL_ADMIN ?>?action=brand-create" key="t-product-detail">Tạo mới</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span key="t-ecommerce">Quản lý sản phẩm</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?= BASE_URL_ADMIN ?>?action=products-list" key="t-products">Danh sách sản phẩm</a>
                        </li>
                        <li><a href="<?= BASE_URL_ADMIN ?>?action=colors-list" key="t-product-detail">Màu sắc</a>
                        </li>
                        <li><a href="<?= BASE_URL_ADMIN ?>?action=sizes-list" key="t-product-detail">Kích cỡ</a>
                        </li>
                        <li><a href="ecommerce-product-detail.html" key="t-product-detail">Hình ảnh</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?= BASE_URL_ADMIN ?>?action=users-list">
                        <i class="bx bx-store"></i>
                        <span key="t-ecommerce">Quản lý người dùng</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="bx bx-store"></i>
                        <span key="t-ecommerce">Quản lý đơn hàng</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="bx bx-store"></i>
                        <span key="t-ecommerce">Quản lý thống kê</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>