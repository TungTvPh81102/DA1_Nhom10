<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Quản lý sản phẩm</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body py-3 d-flex justify-content-between align-items-center border-bottom">
                    <h6 class="m-0 font-weight-bold"><?= $title ?></h6>
                    <a class="btn btn-primary" href="?action=product-create">Tạo mới</a>
                </div>
                <div class="card-body">
                    <!-- Hiển thị thông báo thành công -->
                    <?php if (isset($_SESSION['success'])) : ?>
                    <div class="alert alert-success"><?= $_SESSION['success'] ?></div>
                    <?php unset($_SESSION['success']); ?>
                    <?php endif; ?>
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Mã sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Ảnh đại diện</th>
                                <th>Danh mục</th>
                                <th>Thương hiệu</th>
                                <th>Trạng thái</th>
                                <th>Ngày tạo</th>
                                <th>Ngày cập nhật</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($products as $product) : ?>
                            <tr>
                                <td><?= $product['p_id'] ?></td>
                                <td><?= $product['p_code'] ?></td>
                                <td>
                                    <?= $product['p_name'] ?>
                                </td>
                                <td>
                                    <img style="width: 70px; object-fit: cover;"
                                        src="<?= BASE_URL . $product['p_img_thumbnail'] ?>" alt="">
                                </td>
                                <td>
                                    <?= $product['c_name'] ?>
                                </td>
                                <td>
                                    <?= $product['b_name'] ?>
                                </td>
                                <td><?= $product['p_status'] ? ' <span class="btn btn-success btn-sm waves-effect waves-light">Hoạt động</span>' : ' <span class="btn btn-warning btn-sm waves-effect waves-light">Không hoạt động</span>' ?>
                                <td><?= $product['p_created_at'] ?></td>
                                <td><?= $product['p_updated_at'] ?? 'Chưa có dữ liệu' ?></td>
                                <td>
                                    <a href="<?= BASE_URL_ADMIN ?>?action=product-detail&id=<?= $product['p_id'] ?>"
                                        class="btn btn-info">
                                        Chi tiết
                                    </a>
                                    <a href="<?= BASE_URL_ADMIN ?>?action=product-update&id=<?= $product['p_id'] ?>"
                                        class="btn btn-warning">
                                        Sửa
                                    </a>
                                    <a onclick="return confirm('Bạn có chắc muốn xóa danh mục: <?= $product['p_name'] ?> không?')"
                                        href="<?= BASE_URL_ADMIN ?>?action=product-delete&id=<?= $product['p_id'] ?>"
                                        class="btn btn-danger">
                                        Xóa
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>