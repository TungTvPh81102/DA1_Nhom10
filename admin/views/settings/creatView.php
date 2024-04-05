<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Quản lý đường dẫn ảnh</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body py-3 d-flex justify-content-between align-items-center border-bottom">
                    <h6 class="m-0 font-weight-bold">Quản lý đường dẫn ảnh</h6>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="productname">Tên Đường Dẫn:</label>
                                    <input name="key" id="productname" type="text" class="form-control mb-3"
                                        placeholder="Nhập tên đường dẫn" value="<?= $settings['key'] ?? null ?>">
                                </div>
                                <label for="productname">Đường Dẫn:</label>
                                <input name="value" id="productname" type="text" class="form-control mb-3"
                                    placeholder="Nhập đường dẫn" value="<?= $settings['value'] ?? null ?>">
                            </div>
                        </div>
                </div>

                <div class="d-flex flex-wrap gap-2">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                        Tạo mới
                    </button>
                    <a class="btn btn-info" href="?action=setting-form">Quay lại trang danh sách</a>
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