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
                            <?php foreach ($gallerys as $gallery) : ?>
                            <tr>

                                <td><?= $gallery['product_id'] ?></td>
                                <td></td>
                                <td>
                                    <img style="width: 70px;" src="<?= BASE_URL . $gallery['thumbnail'] ?>" alt="">
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