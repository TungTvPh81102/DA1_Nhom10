<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Quản lý mã giảm giá</h4>
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
                    <form action="" method="post">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="name">Tên mã giảm giá:</label>
                                    <input name="name" id="name" type="text" class="form-control mb-3"
                                        placeholder="Nhập tên mã giảm giá"
                                        value="<?= isset($_SESSION['data']) ? $_SESSION['data']['name'] : null  ?>">
                                    <span class="text-danger"><?= formErrors('name', $errorsMess) ?></span>
                                </div>
                                <div class="mb-3">
                                    <label for="code">Mã giảm giá:</label>
                                    <input name="code" id="code" type="text" class="form-control mb-3"
                                        placeholder="Nhập mã giảm giá"
                                        value="<?= isset($_SESSION['data']) ? $_SESSION['data']['name'] : null  ?>">
                                    <span class="text-danger"><?= formErrors('code', $errorsMess) ?></span>
                                </div>
                                <div class="mb-3">
                                    <label for="time">Số lượng mã:</label>
                                    <input name="time" id="time" type="text" class="form-control mb-3"
                                        placeholder="Nhập số lượng mã"
                                        value="<?= isset($_SESSION['data']) ? $_SESSION['data']['name'] : null  ?>">
                                    <span class="text-danger"><?= formErrors('time', $errorsMess) ?></span>
                                </div>
                                <div class="mb-3">
                                    <label for="form-select">Tính năng mã:</label>
                                    <select name="condition" class="form-select mb-3">
                                        <option value="">---Chọn tính năng---</option>
                                        <option
                                            <?= isset($_SESSION['data']) &&  $_SESSION['data']['status'] == 1 ? 'selected' : null ?>
                                            value="1">Giảm theo phần trăm</option>
                                        <option
                                            <?= isset($_SESSION['data']) &&  $_SESSION['data']['status'] == 2 ? 'selected' : null ?>
                                            value="2">Giảm theo tiền</option>
                                    </select>
                                    <span class="text-danger"><?= formErrors('condition', $errorsMess) ?></span>
                                </div>
                                <div class="mb-3">
                                    <label for="number">Nhập số % hoặc tiền giảm:</label>
                                    <input name="number" id="number" type="text" class="form-control mb-3"
                                        placeholder="Nhập số % hoặc tiền giảm"
                                        value="<?= isset($_SESSION['data']) ? $_SESSION['data']['name'] : null  ?>">
                                    <span class="text-danger"><?= formErrors('name', $errorsMess) ?></span>
                                </div>
                                <div class="row">
                                    <div class="mb-3" id="maximum_percent_div" style="display: none;">
                                        <label for="maximum_percent">Số tiền giảm tối đa theo %:</label>
                                        <input name="maximum_percent" id="maximum_percent_input" type="text"
                                            class="form-control" placeholder="Nhập số tiền giảm tối đa">
                                        <span
                                            class="text-danger"><?= formErrors('maximum_percent', $errorsMess) ?></span>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="created_at">Ngày bắt đầu:</label>
                                    <input name="created_at" id="created_at" type="date" class="form-control mb-3"
                                        value="<?= isset($_SESSION['data']) ? $_SESSION['data']['name'] : null  ?>">
                                    <span class="text-danger"><?= formErrors('created_at', $errorsMess) ?></span>
                                </div>
                                <div class="mb-3">
                                    <label for="expires_at">Ngày kết thúc:</label>
                                    <input name="expires_at" id="expires_at" type="date" class="form-control mb-3"
                                        value="<?= isset($_SESSION['data']) ? $_SESSION['data']['name'] : null  ?>">
                                    <span class="text-danger"><?= formErrors('expires_at', $errorsMess) ?></span>
                                </div>
                                <div class="mb-3">
                                    <label for="form-select">Trạng thái:</label>
                                    <select name="status" class="form-select mb-3">
                                        <option
                                            <?= isset($_SESSION['data']) &&  $_SESSION['data']['status'] == 0 ? 'selected' : null ?>
                                            value="0">Không kích hoạt</option>
                                        <option
                                            <?= isset($_SESSION['data']) &&  $_SESSION['data']['status'] == 1 ? 'selected' : null ?>
                                            value="1">Kích hoạt</option>
                                    </select>
                                    <span class="text-danger"><?= formErrors('condition', $errorsMess) ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-wrap gap-2">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                Tạo mới
                            </button>
                            <button type="reset" class="btn btn-secondary waves-effect waves-light">Nhập lại</button>
                            <a class="btn btn-info" href="?action=coupons-list">Quay lại trang danh sách</a>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var conditionSelect = document.querySelector('select[name="condition"]');
        var maximumPercentDiv = document.getElementById('maximum_percent_div');
        var maximumPercentInput = document.getElementById('maximum_percent_input');

        conditionSelect.addEventListener('change', function() {
            if (conditionSelect.value === '1') {
                maximumPercentDiv.style.display = 'block';
                maximumPercentInput.style.display = 'block';
            } else {
                maximumPercentDiv.style.display = 'none';
                maximumPercentInput.style.display = 'none';
            }
        });
    });
    </script>
    <!-- end row -->

</div> <!-- container-fluid -->
<?php
if (isset($_SESSION['data'])) {
    unset($_SESSION['data']);
}
?>