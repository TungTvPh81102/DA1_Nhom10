<div class="bg-body-secondary py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-site py-0 d-flex justify-content-center">
            <li class="breadcrumb-item"><a class="text-decoration-none text-body" href="#">Home</a>
            </li>
            <li class="breadcrumb-item active pl-0 d-flex align-items-center" aria-current="page">
                <?= $title ?>
            </li>
        </ol>
    </nav>
</div>
<div class="my-account-wrapper section-padding pb-lg-8 pb-16">
    <div class="container py-10">
        <div class="section-bg-color">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post">
                        <div class="d-flex justify-content-between">
                            <h5>
                                Đơn hàng: #<?= $orderByCustomer['order_code'] ?> -
                                <?= setUpStatus($orderByCustomer['status_delivery']) ?>
                            </h5>
                            <?php if ($orderByCustomer['status_delivery'] == 1) { ?>
                                <button type="submit" class="btn btn-sm btn-primary">Cập nhật</button>
                            <?php } ?>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="fw-bold" for="">Tên khách hàng</label>
                                    <input <?= $orderByCustomer['status_delivery'] == 1 ?: 'disabled' ?> type="text" name="full_name" id="" class="form-control mt-5 mb-5" value="<?= $orderByCustomer['full_name'] ?? null ?>">
                                </div>
                                <div class="form-group">
                                    <label class="fw-bold" for="">Số điện thoại</label>
                                    <input <?= $orderByCustomer['status_delivery'] == 1 ?: 'disabled' ?> type="text" name="phone" id="" class="form-control mt-5 mb-5" value="<?= $orderByCustomer['phone'] ?? null ?>">
                                </div>
                                <div class="form-group">
                                    <label class="fw-bold" for="">Phường / Xã</label>
                                    <input <?= $orderByCustomer['status_delivery'] == 1 ?: 'disabled' ?> type="text" name="ward" id="" class="form-control mt-5" value="<?= $orderByCustomer['ward'] ?? null ?>">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="fw-bold" for="">Quận / Huyện</label>
                                    <input <?= $orderByCustomer['status_delivery'] == 1 ?: 'disabled' ?> type="text" name="district" id="" class="form-control mt-5 mb-5" value="<?= $orderByCustomer['district'] ?? null ?>">
                                </div>
                                <div class="form-group">
                                    <label class="fw-bold" for="">Tỉnh / Thành phố</label>
                                    <input <?= $orderByCustomer['status_delivery'] == 1 ?: 'disabled' ?> type="text" name="province" id="" class="form-control mt-5 mb-8" value="<?= $orderByCustomer['province'] ?? null ?>">
                                </div>
                                <div class="form-group">
                                    <label class="fw-bold" for="">Ghi chú</label>
                                    <textarea <?= $orderByCustomer['status_delivery'] == 1 ?: 'disabled' ?> style="resize: none;" name="note" id="" cols="" rows="1" class="form-control"><?= $orderByCustomer['note'] ?? null ?></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <h5>Chi tiết đơn hàng</h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Product Code</th>
                                <th>Product Name</th>
                                <th>Image</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>SubTotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;
                            foreach ($orderDetail as $item) :
                                $subTotal = $item['od_price'] * $item['ods_quantity'];
                                $sizeID = $item['od_size_id'];
                                $colorID = $item['od_color_id'];
                                $sizeName = getSizeName([$sizeID]);
                                $colorName = getColorName([$colorID]);
                            ?>
                                <tr>
                                    <td>#<?= $item['p_code'] ?></td>
                                    <td>
                                        <?= $item['p_name'] ?>
                                        <div class="d-flex">
                                            <?php foreach ($sizeName as $size) : ?>
                                                <p style="margin-right: 20px;">Size: <?= $size ?></p>
                                            <?php endforeach; ?>
                                            <?php foreach ($colorName as $color) : ?>
                                                <p>Size: <?= $color ?></p>
                                            <?php endforeach; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <img style="width: 70px; object-fit: cover;" src="<?= BASE_URL . $item['p_img_thumbnail'] ?>" alt="">
                                    </td>
                                    <td><?= $item['ods_quantity'] ?> </td>
                                    <td><?= number_format($item['od_price'], 0) . ' đ' ?> </td>
                                    <td><?= number_format($subTotal, 0) . ' đ'  ?></td>
                                </tr>
                            <?php endforeach ?>
                            <?php if ($orderByCustomer['reduced'] > 0) { ?>
                                <tr>
                                    <td colspan="4" class="fw-bold">Discount</td>
                                    <td class="text-center" colspan="2">
                                        -<?= number_format($orderByCustomer['reduced'], 0) . ' đ' ?>
                                    </td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="4" class="fw-bold">Total</td>
                                <td class="text-center" colspan="2">
                                    <?= number_format($orderByCustomer['total_money'], 0) . ' đ' ?>
                                </td>
                            </tr>
                        </tbody>
                        <tr>
                            <td colspan="4" class="fw-bold">Payment</td>
                            <td class="text-center" colspan="2">
                                <?= $orderByCustomer['paymethod'] == 1 ? 'Thanh toán Online' : 'Thanh toán tiền mặt' ?>
                            </td>
                        </tr>
                    </table>
                    <a class="btn btn-primary" href="<?= BASE_URL ?>?action=my-orders">Quay lại danh sách</a>
                </div>
            </div>
        </div>
    </div>
</div>