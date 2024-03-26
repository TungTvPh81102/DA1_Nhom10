<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Quản lý màu sắc</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body py-3 d-flex justify-content-between align-items-center border-bottom">
                    <h6 class="m-0 font-weight-bold"><?= $title ?></h6>
                    <a class="btn btn-primary" href="?action=color-create">Tạo mới</a>
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
                                <th>Tên màu</th>
                                <th>Màu</th>
                                <th>Trạng thái</th>
                                <th>Ngày tạo</th>
                                <th>Ngày cập nhật</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($colors as $color) : ?>
                                <tr>
                                    <td><?= $color['id'] ?></td>
                                    <td><?= $color['name'] ?></td>
                                    <td>
                                        <div style="background-color: <?= $color['color'] ?>; border: 1px solid black;" class="btn btn-lg">
                                        </div>
                                    </td>
                                    <td><?= $color['status'] ? ' <span class="btn btn-success btn-sm waves-effect waves-light">Hoạt động</span>' : ' <span class="btn btn-warning btn-sm waves-effect waves-light">Không hoạt động</span>' ?>
                                    </td>
                                    <td><?= $color['created_at'] ? $color['created_at'] : 'Chưa có dữ liệu' ?></td>
                                    <td><?= $color['updated_at'] ? $color['updated_at'] : 'Chưa có dữ liệu' ?>
                                    </td>
                                    <td>
                                        <a href="<?= BASE_URL_ADMIN ?>?action=color-update&id=<?= $color['id'] ?>" class="btn btn-warning">
                                            Sửa
                                        </a>
                                        <a onclick="return confirm('Bạn có chắc muốn xóa màu: <?= $color['name'] ?> không?')" href="<?= BASE_URL_ADMIN ?>?action=color-delete&id=<?= $color['id'] ?>" class="btn btn-danger">
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