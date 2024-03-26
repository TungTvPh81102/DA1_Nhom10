<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Quản lý banner</h4>
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
                    if (isset($_SESSION['errors'])) {
                        $errorsMess = $_SESSION['errors'];
                        unset($_SESSION['errors']);
                    } else {
                        $errorsMess = [];
                    }
                    ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="heading">Nhập tiêu đề:</label>
                                    <input name="heading" id="heading" type="text" class="form-control mb-3" placeholder="Nhập tiêu đề" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['heading'] : null  ?>">
                                    <span class="text-danger"><?= formErrors('heading', $errorsMess) ?></span>
                                </div>
                                <div class="mb-3">
                                    <label for="description">Nội dung:</label>
                                    <input name="description" id="heading" type="text" class="form-control mb-3" placeholder="Nhập nội dung" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['description'] : null  ?>">
                                    <span class="text-danger"><?= formErrors('description', $errorsMess) ?></span>
                                </div>
                                <div class="mb-3">
                                    <label for="image">Hình ảnh:</label>
                                    <input name="image" id="image" type="file" class="form-control mb-3">
                                    <span class="text-danger"><?= formErrors('image', $errorsMess) ?></span>
                                </div>
                                <div class="mb-3">
                                    <label for="form-select">Phân loại:</label>
                                    <select name="classify" class="form-select mb-3">
                                        <option <?= isset($_SESSION['data']) &&  $_SESSION['data']['classify'] == 1 ? 'selected' : null ?> value="0">Img Thumbnail</option>
                                        <option <?= isset($_SESSION['data']) &&  $_SESSION['data']['classify'] == 0 ? 'selected' : null ?> value="1">Img Cover</option>
                                    </select>
                                    <span class="text-danger"><?= formErrors('classify', $errorsMess) ?></span>
                                </div>
                                <div class="mb-3">
                                    <label for="form-select">Trạng thái:</label>
                                    <select name="status" class="form-select mb-3">
                                        <option <?= isset($_SESSION['data']) &&  $_SESSION['data']['status'] == 1 ? 'selected' : null ?> value="1">Active</option>
                                        <option <?= isset($_SESSION['data']) &&  $_SESSION['data']['status'] == 0 ? 'selected' : null ?> value="0">Inactive</option>
                                    </select>
                                    <span class="text-danger"><?= formErrors('status', $errorsMess) ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-wrap gap-2">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                Tạo mới
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
<?php
if (isset($_SESSION['data'])) {
    unset($_SESSION['data']);
}
?>