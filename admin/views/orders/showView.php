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
        <form action="" method="post">
            <div class="col-12">
                <div class="card">
                    <div class="card-body py-3 d-flex justify-content-between align-items-center border-bottom">
                        <h6 class="m-0 font-weight-bold"><?= $title ?></h6>
                    </div>
                </div>
                <?php
                if (isset($_SESSION['success'])) {
                    echo '<div class="alert alert-success mb-3">' . $_SESSION['success'] . '</div>';
                    unset($_SESSION['success']);
                }
                if (isset($_SESSION['errors'])) {
                    echo '<div class="alert alert-danger mb-3">' . $_SESSION['errors'] . '</div>';
                    unset($_SESSION['errors']);
                }
                ?>
                <div class="card">
                    <div class="card-body py-3 d-flex justify-content-between align-items-center border-bottom">
                        <h6 class="m-0 font-weight-bold">Thông tin khách hàng</h6>
                    </div>
                    <div class="card-body">
                        <div class="row" id="edit-form">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="">Tên khách hàng</label>
                                    <input name="full_name" class="form-control" type="text" value="<?= $orderByCustomer['full_name'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="">Số điện thoại</label>
                                    <input name="phone" class="form-control" type="text" value="<?= $orderByCustomer['phone'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="">Country</label>
                                    <input name="province" class="form-control" type="text" value="<?= $orderByCustomer['province'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="">Address</label>
                                    <input name="district" class="form-control" type="text" value="<?= $orderByCustomer['district'] ?>">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="">City</label>
                                    <input name="ward" class="form-control" type="text" value="<?= $orderByCustomer['ward'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="">Email</label>
                                    <input name="email" class="form-control" type="text" value="<?= $orderByCustomer['email'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="">Note</label>
                                    <textarea name="note" class="form-control" id="example-textarea" rows="1" placeholder="Write some note..">
                                    <?= $orderByCustomer['note'] ?>
                                    </textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="">Trạng thái</label>
                                    <select class="form-select" name="status_delivery" id="">
                                        <?php if ($orderByCustomer['status_delivery'] !== 0) { ?>
                                            <option <?= $orderByCustomer['status_delivery'] == 1 ? 'selected' : null ?> value="1">
                                                Chờ xác nhận</option>
                                            <option <?= $orderByCustomer['status_delivery'] == 2 ? 'selected' : null ?> value="2">
                                                Đang chuẩn bị hàng</option>
                                            <option <?= $orderByCustomer['status_delivery'] == 3 ? 'selected' : null ?> value="3">
                                                Đang vận chuyển</option>
                                            <option <?= $orderByCustomer['status_delivery'] == 4 ? 'selected' : null ?> value="4">Đã
                                                giao thành công</option>
                                            <option <?= $orderByCustomer['status_delivery'] == 0 ? 'selected' : null ?> value="0">
                                                Hủy đơn hàng</option>
                                        <?php } else { ?>
                                            <option <?= $orderByCustomer['status_delivery'] == 0 ? 'selected' : null ?> value="0">
                                                Hủy đơn hàng</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body py-3 d-flex justify-content-between align-items-center border-bottom">
                        <h6 class="m-0 font-weight-bold">Danh sách đơn hàng</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Hình ảnh</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </thead>


                            <tbody>
                                <?php
                                $count = 1;
                                $total = 0;
                                foreach ($orderDetail as $order) :
                                    $subTotal = $order['od_price'] * $order['ods_quantity'];
                                ?>
                                    <tr>
                                        <td><?= $count ?></td>
                                        <td><?= $order['p_code'] ?></td>
                                        <td><?= $order['p_name'] ?></td>
                                        <td>
                                            <img class="rounded" style="width: 70px; height: 100%;" src="<?= BASE_URL . $order['p_img_thumbnail'] ?>" alt="">
                                        </td>
                                        <td>
                                            <input style="width: 100px;" class="form-control text-center" type="number" name="quantity[<?= $order['od_id'] ?>]" id="" value="<?= $order['ods_quantity'] ?>">
                                        </td>
                                        <td><?= number_format($order['od_price'], 0) . " VNĐ" ?></td>
                                        <td><?= number_format($subTotal, 0) . " VNĐ" ?></td>
                                    </tr>
                                <?php $count++;
                                endforeach; ?>
                                <?php if ($orderByCustomer['reduced'] > 0) { ?>
                                    <td colspan="5" class="fw-bold">Giảm giá</td>
                                    <td colspan="3" class="text-center">
                                        -<?= number_format($orderByCustomer['reduced'], 0) . ' đ' ?>
                                    </td>
                                <?php } ?>
                            </tbody>
                            <td colspan="5" class="fw-bold">Tổng thanh toán</td>
                            <td class="text-center" colspan="3">
                                <?= number_format($orderByCustomer['total_money'], 0) . " VNĐ" ?>
                            </td>
                        </table>
                        <a class="btn btn-info" href="<?= BASE_URL_ADMIN . "?action=orders-list" ?>">Quay lại trang danh
                            sách</a>
                        <button type="submit" class="btn btn-success">Cập nhật</button>
                    </div>
                </div>
            </div> <!-- end col -->
        </form>
    </div> <!-- end row -->
</div>