<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Quản lý người dùng</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body py-3 d-flex justify-content-between align-items-center border-bottom">
                    <h6 class="m-0 font-weight-bold"><?= $title ?></h6>
                    <a class="btn btn-primary" href="?action=user-create">Tạo mới</a>
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
                                <th>Họ tên</th>
                                <th>Email</th>
                                <th>Trạng thái</th>
                                <th>Vai trò</th>
                                <th>Ngày tạo</th>
                                <th>Ngày cập nhật</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($users as $user) :
                                $fullname = $user['first_name'] . ' ' .  $user['last_name'];
                            ?>
                            <tr>
                                <td><?= $user['id'] ?></td>
                                <td><?= $fullname ?></td>
                                <td><?= $user['email'] ?></td>
                                <td>
                                    <?= $user['status'] ? ' <span class="btn btn-success btn-sm waves-effect waves-light">Đã kích hoạt</span>' : ' <span class="btn btn-warning btn-sm waves-effect waves-light">Chưa kích hoạt</span>' ?>
                                </td>
                                <td>
                                    <?= $user['role'] ? ' <span class="btn btn-success btn-sm waves-effect waves-light">Quản trị viên</span>' : ' <span class="btn btn-warning btn-sm waves-effect waves-light">Người dùng</span>' ?>
                                </td>
                                <td>
                                    <?= $user['created_at'] ?>
                                </td>
                                <td>
                                    <?= $user['updated_at'] ? $user['updated_at'] : 'Chưa có dữ liệu' ?>
                                </td>
                                <td>
                                    <a href="<?= BASE_URL_ADMIN ?>?action=user-detail&id=<?= $user['id'] ?>"
                                        class="btn btn-info">
                                        Chi tiết
                                    </a>
                                    <a href="<?= BASE_URL_ADMIN ?>?action=user-update&id=<?= $user['id'] ?>"
                                        class="btn btn-warning">
                                        Sửa
                                    </a>
                                    <a onclick="return confirm('Bạn có muốn xóa người dùng: <?= $fullname ?> không?')"
                                        href="<?= BASE_URL_ADMIN ?>?action=user-delete&id=<?= $user['id'] ?>"
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
<script>
$(document).ready(function() {
    $('#dataTable').DataTable({
        "order": false
    });
});
</script>