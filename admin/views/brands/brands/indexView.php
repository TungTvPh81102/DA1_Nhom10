<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Quản lý thương hiệu</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body py-3 d-flex justify-content-between align-items-center border-bottom">
                    <h6 class="m-0 font-weight-bold"><?= $title ?></h6>
                    <a class="btn btn-primary" href="?action=brand-create">Tạo mới</a>
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
                                <th>Tên thương hiệu</th>
                                <th>Trạng thái</th>
                                <th>Ngày tạo</th>
                                <th>Ngày cập nhật</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($brands as $brand) : ?>
                            <tr>
                                <td><?= $brand['id'] ?></td>
                                <td><?= $brand['name'] ?></td>
                                <td><?= $brand['status'] ? ' <span class="btn btn-success btn-sm waves-effect waves-light">Hoạt động</span>' : ' <span class="btn btn-warning btn-sm waves-effect waves-light">Không hoạt động</span>' ?>
                                </td>
                                <td><?= $brand['created_at'] ? $brand['created_at'] : 'Chưa có dữ liệu' ?></td>
                                <td><?= $brand['updated_at'] ? $brand['updated_at'] : 'Chưa có dữ liệu' ?>
                                </td>
                                <td>
                                    <a href="<?= BASE_URL_ADMIN ?>?action=brand-detail&id=<?= $brand['id'] ?>"
                                        class="btn btn-info">
                                        Chi tiết
                                    </a>
                                    <a href="<?= BASE_URL_ADMIN ?>?action=brand-update&id=<?= $brand['id'] ?>"
                                        class="btn btn-warning">
                                        Sửa
                                    </a>
                                    <a onclick="return confirm('Bạn có chắc muốn xóa thương hiệu: <?= $brand['name'] ?> không?')"
                                        href="<?= BASE_URL_ADMIN ?>?action=brand-delete&id=<?= $brand['id'] ?>"
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
        </div> <!-- end col -->
    </div> <!-- end row -->
</div> <!-- container-fluid -->