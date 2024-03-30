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
                    <a class="btn btn-primary" href="?action=coupon-create">Tạo mới</a>
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
                                <th>Tên mã giảm giá</th>
                                <th>Mã giảm giá</th>
                                <th>Số lượng giảm giá</th>
                                <th>Điều kiện giảm</th>
                                <th>Số tiền giảm</th>
                                <th>Ngày bắt đầu</th>
                                <th>Ngày kết thúc</th>
                                <th>Trạng thái</th>
                                <th>Hết hạn</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($coupons as $coupon) :
                            ?>
                                <tr>
                                    <td><?= $coupon['id'] ?></td>
                                    <td><?= $coupon['name'] ?></td>
                                    <td><?= $coupon['code'] ?> </td>
                                    <td><?= $coupon['time'] ?></td>
                                    <td><?= $coupon['condition'] == 1 ? 'Giảm theo %' : 'Giảm theo số tiền' ?></td>
                                    <td><?= $coupon['condition'] == 1 ? 'Giảm ' . $coupon['number'] . ' %' : 'Giảm ' . number_format($coupon['number'], 0) . ' đ' ?>
                                    </td>
                                    <td><?= $coupon['created_at'] ? $coupon['created_at'] : 'Chưa có dữ liệu' ?></td>
                                    <td><?= $coupon['expires_at'] ? $coupon['expires_at'] : 'Chưa có dữ liệu' ?></td>
                                    <td><?= $coupon['status'] ? 'Đã kích hoạt' : 'Chưa kích hoạt' ?></td>
                                    <td>
                                        <?php
                                        if ($today >= $coupon['created_at'] && $today <= $coupon['expires_at']) {
                                            echo 'Còn hạn';
                                        } else {
                                            echo 'Đã hết hạn';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="<?= BASE_URL_ADMIN ?>?action=brand-detail&id=<?= $coupon['id'] ?>" class="btn btn-info">
                                            Chi tiết
                                        </a>
                                        <a onclick="return confirm('Bạn có chắc muốn xóa thương hiệu: <?= $coupon['name'] ?> không?')" href="<?= BASE_URL_ADMIN ?>?action=coupon-delelte&id=<?= $coupon['id'] ?>" class="btn btn-danger">
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