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
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Order</th>
                                <th>Date</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Paymethod</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orders as $item) : ?>
                                <tr>
                                    <td>#<?= $item['order_code'] ?></td>
                                    <td><?= $item['order_date'] ?></td>
                                    <td><?= $item['country'] . ', ' . $item['address'] . ', ' . $item['address'] ?></td>
                                    <td>
                                        <?= $status = setUpStatus($item['status_delivery']) ?>
                                    </td>
                                    <td><?= $item['paymethod'] ? 'Đã thanh toán' : 'Chưa thanh toán' ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="<?= BASE_URL ?>?action=show-order&id=<?= $item['id'] ?>">Chi tiết</a>
                                        <?php if ($item['status_delivery'] == 4 || $item['status_delivery'] == 0) { ?>
                                            <a class="btn btn-sm btn-danger" href="">Xóa đơn hàng</a>
                                        <?php } elseif ($item['status_delivery'] == 1) { ?>
                                            <a onclick="return confirm('Bạn có muốn hủy đơn hàng: <?= $item['order_code'] ?> không?')" href="<?= BASE_URL ?>?action=my-orders&id=<?= $item['id'] ?>" class="btn btn-sm btn-danger">Hủy đơn</a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>