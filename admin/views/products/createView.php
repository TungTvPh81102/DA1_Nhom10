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
                        <div class="card">
                            <div class="card-body py-3 d-flex justify-content-between align-items-center border-bottom">
                                <h6 class="m-0 font-weight-bold">Thông tin sản phẩm</h6>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="code">Mã sản phẩm</label>
                                    <input id="code" name="code" type="text" class="form-control mb-3"
                                        placeholder="Tên sản phẩm"
                                        value="<?= isset($_SESSION['data']) ? $_SESSION['data']['code'] : null ?>">
                                    <span class="text-danger"><?= formErrors('code', $errorsMess) ?></span>
                                </div>
                                <div class="mb-3">
                                    <label for="name">Tên sản phẩm</label>
                                    <input id="name" name="name" type="text" class="form-control mb-3"
                                        placeholder="Tên sản phẩm"
                                        value="<?= isset($_SESSION['data']) ? $_SESSION['data']['name'] : null ?>">
                                    <span class="text-danger"><?= formErrors('name', $errorsMess) ?></span>

                                </div>
                                <div class="mb-3">
                                    <label class="control-label">Chọn danh mục</label>
                                    <select name="category_id" class="form-control select2 mb-3">
                                        <option value="">---Chọn danh mục sản phẩm---</option>
                                        <?php foreach ($categories as $category) : ?>
                                        <option
                                            <?= isset($_SESSION['data']) && $_SESSION['data']['category_id'] == $category['id']  ? 'selected' : null ?>
                                            value="<?= $category['id'] ?>"><?= $category['name'] ?></option>

                                        <?php endforeach; ?>
                                    </select>
                                    <span class="text-danger"><?= formErrors('category_id', $errorsMess) ?></span>
                                </div>
                                <div class="mb-3">
                                    <label class="control-label">Chọn thương hiệu</label>
                                    <select name="brand_id" class="form-control select2">
                                        <option value="">---Chọn thương hiệu sản phẩm---</option>
                                        <?php foreach ($brands as $brand) : ?>
                                        <option
                                            <?= isset($_SESSION['data']) && $_SESSION['data']['brand_id'] == $brand['id']  ? 'selected' : null ?>
                                            value="<?= $brand['id'] ?>"><?= $brand['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <span class="text-danger"><?= formErrors('brand_id', $errorsMess) ?></span>

                                </div>
                                <div class="mb-3">
                                    <label for="img_thumbnail" class="form-label">Ảnh đại diện</label>
                                    <input name="img_thumbnail" class="form-control mb-3" type="file" id="formFile">
                                    <span class="text-danger"><?= formErrors('img_thumbnail', $errorsMess) ?></span>

                                </div>
                                <div class="mb-3">
                                    <label for="thumbnails" class="form-label">Ảnh sản phẩm</label>
                                    <input multiple name="thumbnails[]" class="form-control mb-3" type="file"
                                        id="thumbnails">
                                    <span class="text-danger"><?= formErrors('thumbnails', $errorsMess) ?></span>

                                </div>
                                <div class="mb-4">
                                    <label for="over_view">Mô tả ngắn</label>
                                    <textarea name="over_view" class="form-control" id="tinyeditor" rows="5"
                                        placeholder="Mô tả ngắn">
                                        <?= isset($_SESSION['data']) ? $_SESSION['data']['over_view'] : null ?>
                                    </textarea>
                                    <span class="text-danger mt-3"><?= formErrors('over_view', $errorsMess) ?></span>

                                </div>
                                <div class="mb-3">
                                    <label for="description">Nội dung</label>
                                    <textarea name="description" class="form-control" id="tinyeditor2" rows="5"
                                        placeholder="Nhập nội dung">
                                    <?= isset($_SESSION['data']) ? $_SESSION['data']['description'] : null ?>
                                    </textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="price_regular">Giá gốc</label>
                                    <input id="price_regular" name="price_regular" type="number"
                                        class="form-control mb-3" placeholder="Nhập giá gốc"
                                        value="<?= isset($_SESSION['data']) ? $_SESSION['data']['price_regular'] : null ?>">
                                    <span class="text-danger"><?= formErrors('price_regular', $errorsMess) ?></span>
                                </div>
                                <div class="mb-3">
                                    <label for="discount">Giảm giá</label>
                                    <input min="0" id="discount" name="discount" type="number" class="form-control mb-3"
                                        placeholder="Nhập giảm giá"
                                        value="<?= isset($_SESSION['data']) ? $_SESSION['data']['discount'] : 0 ?>">
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body py-3 d-flex justify-content-between align-items-center border-bottom">
                                <h6 class="m-0 font-weight-bold">Màu sắc & Kích cỡ</h6>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <table id="product_attributes"
                                        class="table table-bordered dt-responsive  nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>Kích cỡ</th>
                                                <th>Màu sắc</th>
                                                <th>Số lượng</th>
                                                <th>Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <select class="form-control" name="size_id[]" id="size_id">
                                                        <?php foreach ($sizes as $size) : ?>

                                                        <option value="<?= $size['id'] ?>"><?= $size['name'] ?></option>

                                                        <?php endforeach; ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control" name="color_id[]" id="color_id">
                                                        <?php foreach ($colors as $color) : ?>

                                                        <option value="<?= $color['id'] ?>"><?= $color['name'] ?>
                                                        </option>

                                                        <?php endforeach; ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input min="1" type="number" name="quantity[]"
                                                        placeholder="Nhập số lượng" class="form-control">
                                                </td>
                                                <td>
                                                    <div onclick="addRow()" class="btn btn-info"
                                                        id="payment-button-amount">Add More</div>
                                                </td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="control-label">Trạng thái</label>
                                    <select name="status" class="form-control select2">
                                        <option
                                            <?= isset($_SESSION['data']) && $_SESSION['data']['status'] == 1 ? 'selected' : null ?>
                                            value="1">Public</option>
                                        <option
                                            <?= isset($_SESSION['data']) && $_SESSION['data']['status'] == 0  ? 'selected' : null ?>
                                            value="0">Private</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-wrap gap-2 mt-3">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                        Tạo mới</button>
                                    <button type="reset" class="btn btn-secondary waves-effect waves-light">Nhập
                                        lại</button>
                                    <a class="btn btn-info" href="?action=products-list">Quay lại trang danh sách</a>
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