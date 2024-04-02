<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Quản lý đơn hàng</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <?php
                    if (isset($_SESSION['success'])) {
                        echo '<div class="alert alert-success">' . $_SESSION['success'] . '</div>';
                        unset($_SESSION['success']);
                    }
                    if (isset($_SESSION['errors'])) {
                        echo '<div class="alert alert-success">' . $_SESSION['success'] . '</div>';
                        unset($_SESSION['errors']);
                    }
                    ?>
                    <h4 class="card-title"><?= $title ?></h4>

                    <form action="" method="post">
                        <table id="dataTable" class="table table-bordered dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên KH</th>
                                    <th>Số ĐT</th>
                                    <th>Tổng TT</th>
                                    <th>Phương thức TT</th>
                                    <th>Trạng thái TT</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày đặt hàng</th>
                                    <th>Ngày cập nhật</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>


                            <tbody>
                                <?php
                                $count = 1;
                                foreach ($orders as $order) :
                                ?>
                                <tr>
                                    <input type="hidden" name="id" value="<?= $order['id'] ?>">
                                    <td><?= $count ?></td>
                                    <td><?= $order['full_name'] ?></td>
                                    <td><?= $order['phone'] ?></td>
                                    <td><?= number_format($order['total_money'], 0) . ' VNĐ' ?></td>

                                    <td>
                                        <?= $order['paymethod'] ?>
                                    </td>
                                    <td>
                                        <?= $order['payment_status'] ?
                                                '<span class="btn btn-success btn-sm waves-effect waves-light">Đã thanh toán</span>' :
                                                '<span class="btn btn-info btn-sm waves-effect waves-light">Chưa thanh toán</span>' ?>
                                    </td>
                                    <td>
                                        <?php
                                            $status = setUpStatus($order['status_delivery']);
                                            echo $status;
                                            ?>
                                    </td>
                                    <td><?= $order['order_date'] ?></td>
                                    <td><?= $order['updated_at'] ?></td>
                                    <td>

                                        <a href="<?= BASE_URL_ADMIN ?>?action=order-detail&order_id=<?= $order['id'] ?>"
                                            class="btn btn-success">Sửa đơn hàng</a>
                                        <a href="<?= BASE_URL_ADMIN ?>?action=complete-payment&order_id=<?= $order['id'] ?>"
                                            class="btn btn-info">Xem hóa đơn</a>

                                    </td>
                                </tr>
                                <?php
                                    $count++;
                                endforeach;
                                ?>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</div>