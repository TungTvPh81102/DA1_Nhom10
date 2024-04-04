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
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="heading">Nhập tiêu đề:</label>
                                    <input name="heading" id="heading" type="text" class="form-control mb-3" placeholder="Nhập tiêu đề" value="<?= $banner['heading']  ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="description">Nội dung:</label>
                                    <input name="description" id="heading" type="text" class="form-control mb-3" placeholder="Nhập nội dung" value="<?= $banner['description']  ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="image">Hình ảnh:</label>
                                    <div class="div">

                                        <img style="width: 120px;" src="<?= BASE_URL . $banner['image'] ?>" alt="">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="form-select">Phân loại:</label>
                                    <select name="classify" class="form-select mb-3" disabled>
                                        <option <?= !$banner['classify'] ? 'selected' : null ?> value="0">Img Thumbnail
                                        </option>
                                        <option <?= $banner['classify'] ? 'selected' : null ?> value="1">Img Cover
                                        </option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="form-select">Trạng thái:</label>
                                    <select name="status" class="form-select mb-3">
                                        <option <?= $banner['classify'] ? 'selected' : null ?> value="1">Active
                                        </option>
                                        <option <?= !$banner['classify'] ? 'selected' : null ?> value="0">Inactive
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-wrap gap-2">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                Tạo mới
                            </button>
                            <button type="reset" class="btn btn-secondary waves-effect waves-light">Nhập lại</button>
                            <a class="btn btn-info" href="?action=banners-list">Quay lại trang danh sách</a>
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