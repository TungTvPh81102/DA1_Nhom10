<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Quản lý bìa quảng cáo</h4>
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
                    <?php
                    if (isset($_SESSION['success'])) {
                        echo '<div  class="alert alert-success">' . $_SESSION['success'] . '</div>';
                        unset($_SESSION['success']);
                    }
                    ?>
                    <?php
                    if (isset($_SESSION['errors'])) {
                        $errorsMess = $_SESSION['errors'];
                        unset($_SESSION['errors']);
                    } else {
                        $errorsMess = [];
                    }
                    ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" <?= $banner['id'] ?>>
                        <div class="card">
                            <div class="card-body py-3 d-flex justify-content-between align-items-center border-bottom">
                                <h6 class="m-0 font-weight-bold">Thông tin bìa quảng cáo</h6>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">


                                    <label for="heading">Tên Bìa</label>
                                    <input id="heading" name="heading" type="text" class="form-control mb-3"
                                        placeholder="Tên sản phẩm" value="<?= $banner['heading'] ?>">
                                    <span class="text-danger"><?= formErrors('heading', $errorsMess) ?></span>
                                    <div class="mb-3">
                                        <label for="description">Nội dung</label>
                                        <textarea name="description" class="form-control" id="tinyeditor2" rows="5"
                                            placeholder="Nhập nội dung">
                                            <?= $banner['description'] ?>
                                        </textarea>
                                    </div>


                                    <div class="mb-3">
                                        <label for="image" class="form-label">Ảnh đại diện</label>
                                        <div class="image mb-3">
                                            <img style="width: 70px; height:100%;"
                                                src="<?= BASE_URL . $banner['image'] ?>" alt="">
                                        </div>
                                        <input name="image" class="form-control mb-3" type="file" id="formFile">
                                        <span class="text-danger"><?= formErrors('image', $errorsMess) ?></span>
                                    </div>

                                    <div class="mb-3">
                                        <label for="form-select">Trạng thái:</label>

                                        <select name="status" class="form-select mb-3">
                                            <option <?= $banner['status'] ? 'selected' : null ?> value="1">Active
                                            </option>
                                            <option <?= !$banner['status'] ? 'selected' : null ?> value="0">Inactive
                                            </option>
                                        </select>

                                        <span class="text-danger"><?= formErrors('status', $errorsMess) ?></span>

                                    </div>

                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-wrap gap-2 mt-3">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                                            Cập nhật</button>
                                        <button type="reset" class="btn  btn-secondary waves-effect waves-light">Nhập
                                            lại</button>
                                        <a class="btn btn-info" href="?action=banners-list">Quay lại trang danh sách</a>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->

</div>
<?php
if (isset($_SESSION['data'])) {
    unset($_SESSION['data']);
}
?>