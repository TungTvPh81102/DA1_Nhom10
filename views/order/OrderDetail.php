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
                <form action="" method="post">
                    <div class="card-body">
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
                        </table>
                </form>
            </div>
        </div>
    </div>
</div>
</div>