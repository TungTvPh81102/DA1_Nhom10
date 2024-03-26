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
                </div>
                <div class="card-body">
                    <?php if (isset($_SESSION['success'])) : ?>
                        <div class="alert alert-success"><?= $_SESSION['success'] ?></div>
                        <?php unset($_SESSION['success']); ?>
                    <?php endif; ?>
                    <?php
                    if (isset($_SESSION['errors'])) {
                        $errorsMess = $_SESSION['errors'];
                        unset($_SESSION['errors']);
                    } else {
                        $errorsMess = [];
                    }
                    ?>
                    <form action="" method="post">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="productname">Tên thương hiệu:</label>
                                    <input name="name" id="productname" type="text" class="form-control mb-3" placeholder="Nhập tên thương hiệu" value="<?= $brand['name']  ?>">
                                    <span class="text-danger"><?= formErrors('name', $errorsMess) ?></span>
                                </div>
                                <div class="mb-3">
                                    <label for="form-select">Trạng thái:</label>
                                    <select name="status" class="form-select mb-3">
                                        <option <?= $brand['status'] ? 'selected' : null ?> value="1">Active</option>
                                        <option <?= !$brand['status'] ? 'selected' : null  ?> value="0">Inactive
                                        </option>
                                    </select>
                                    <span class="text-danger"><?= formErrors('status', $errorsMess) ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-wrap gap-2">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                Cập nhật
                            </button>
                            <button type="reset" class="btn btn-secondary waves-effect waves-light">Nhập lại</button>
                            <a class="btn btn-info" href="?action=brands-list">Quay lại trang danh sách</a>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
    <!-- end row -->

</div> <!-- container-fluid -->