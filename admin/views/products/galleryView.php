<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Quản lý sản phẩm</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body py-3 d-flex justify-content-between align-items-center border-bottom">
                    <h6 class="m-0 font-weight-bold"><?= $title ?></h6>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>ID sản phẩm</th>
                                <th>Ảnh đại diện</th>
                                <th>Ảnh sản phẩm</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($productImg as $product) :
                            ?>
                                <tr>
                                    <td><?= $product[0]['id'] ?></td>
                                    <td>
                                        <img style="width: 70px; object-fit: cover;" src="<?= BASE_URL . $product[0]['img_thumbnail'] ?>" alt="">
                                    </td>
                                    <td>
                                        <div class="row">
                                            <?php foreach ($product as $item) : ?>
                                                <div class="col-2 mb-2">
                                                    <img style="width: 70px; object-fit: cover;" src="<?= BASE_URL . $item['thumbnail'] ?>" alt="">
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>