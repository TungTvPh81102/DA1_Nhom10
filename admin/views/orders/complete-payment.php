<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18"><?= $title ?></h4>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="invoice-title">
                        <h4 class="float-end font-size-16">Order # <?= $orderByCustomer['order_code'] ?></h4>
                        <div class="auth-logo mb-4">
                            <img src="<?= BASE_URL ?>assets/admin/images/logo-dark.png" alt="logo"
                                class="auth-logo-dark" height="20">
                            <img src="<?= BASE_URL ?>assets/admin/images/logo-light.png" alt="logo"
                                class="auth-logo-light" height="20">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <address>
                                <strong>Billed To:</strong><br>
                                <?= $orderByCustomer['full_name'] ?><br>
                                <?= $orderByCustomer['country'] ?>,<br>
                                <?= $orderByCustomer['address'] ?>,<br>
                                <?= $orderByCustomer['city'] ?>
                            </address>
                        </div>
                        <div class="col-sm-6 text-sm-end">
                            <address class="mt-2 mt-sm-0">
                                <strong>Shipped To:</strong><br>
                                Kenny Rigdon<br>
                                1234 Main<br>
                                Apt. 4B<br>
                                Springfield, ST 54321
                            </address>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 mt-3">
                            <address>
                                <strong>Payment Method:</strong><br>
                                <?= $orderByCustomer['paymethod'] ? 'Thanh toán Online' : 'Thanh toán khi nhận hàng' ?><br>
                                <?= $orderByCustomer['email'] ?>
                            </address>
                        </div>
                        <div class="col-sm-6 mt-3 text-sm-end">
                            <address>
                                <strong>Order Date:</strong><br>
                                <?= $orderByCustomer['order_date'] ?><br><br>
                            </address>
                        </div>
                    </div>
                    <div class="py-2 mt-3">
                        <h3 class="font-size-15 fw-bold">Order summary</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-nowrap">
                            <thead>
                                <tr>
                                    <th style="width: 70px;">No.</th>
                                    <th>Sản phẩm</th>
                                    <th class="text-end">Giá</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count = 1;
                                foreach ($orderDetail as $order) : ?>
                                <tr>
                                    <td><?= $count ?></td>
                                    <td><?= $order['p_name'] ?></td>
                                    <td class="text-end"><?= number_format($order['od_price'], 0) . " VNĐ" ?></td>
                                </tr>
                                <?php $count++;
                                endforeach; ?>
                                <tr>
                                    <td colspan="2" class="border-0 text-end">
                                        <strong>Shipping</strong>
                                    </td>
                                    <td class="border-0 text-end text-info">FREE</td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="border-0 text-end">
                                        <strong>Total</strong>
                                    </td>
                                    <td class="border-0 text-end">
                                        <h4 class="m-0">
                                            <?= number_format($orderByCustomer['total_money'], 0) . " VNĐ" ?></h4>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="d-print-none">
                        <div class="float-end">
                            <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light me-1"><i
                                    class="fa fa-print"></i></a>
                            <a href="javascript: void(0);"
                                class="btn btn-primary w-md waves-effect waves-light">Send</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

</div>