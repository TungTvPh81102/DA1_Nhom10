<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Quản lý đơn hàng</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <form action="" method="post">
            <div class="col-12">
                <div class="card">
                    <div class="card-body py-3 d-flex justify-content-between align-items-center border-bottom">
                        <h6 class="m-0 font-weight-bold"><?= $title ?></h6>
                    </div>
                </div>
                <?php
                if (isset($_SESSION['success'])) {
                    echo '<div class="alert alert-success mb-3">' . $_SESSION['success'] . '</div>';
                    unset($_SESSION['success']);
                }
                if (isset($_SESSION['errors'])) {
                    echo '<div class="alert alert-danger mb-3">' . $_SESSION['errors'] . '</div>';
                    unset($_SESSION['errors']);
                }
                ?>
                <div class="card">
                    <div class="card-body py-3 d-flex justify-content-between align-items-center border-bottom">
                        <h6 class="m-0 font-weight-bold">Thông tin khách hàng</h6>
                    </div>
                    <div class="card-body">
                        <div class="row" id="edit-form">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="">Tên khách hàng</label>
                                    <input <?= ($orderByCustomer['status_delivery'] == 1 || $orderByCustomer['status_delivery'] == 2) ?: 'disabled' ?> name="full_name" class="form-control" type="text" value="<?= $orderByCustomer['full_name'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="">Số điện thoại</label>
                                    <input <?= ($orderByCustomer['status_delivery'] == 1 || $orderByCustomer['status_delivery'] == 2) ?: 'disabled' ?> name="phone" class="form-control" type="text" value="<?= $orderByCustomer['phone'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="">Phường / Xã</label>
                                    <input <?= ($orderByCustomer['status_delivery'] == 1 || $orderByCustomer['status_delivery'] == 2) ?: 'disabled' ?> name="ward" class="form-control" type="text" value="<?= $orderByCustomer['ward'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="">Quận / Huyện</label>
                                    <input <?= ($orderByCustomer['status_delivery'] == 1 || $orderByCustomer['status_delivery'] == 2) ?: 'disabled' ?> name="district" class="form-control" type="text" value="<?= $orderByCustomer['district'] ?>">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="">Tỉnh / Thành phố </label>
                                    <input <?= ($orderByCustomer['status_delivery'] == 1 || $orderByCustomer['status_delivery'] == 2) ?: 'disabled' ?> name="province" class="form-control" type="text" value="<?= $orderByCustomer['province'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="">Email</label>
                                    <input <?= ($orderByCustomer['status_delivery'] == 1 || $orderByCustomer['status_delivery'] == 2) ?: 'disabled' ?> name="email" class="form-control" type="text" value="<?= $orderByCustomer['email'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="">Ghi chú</label>
                                    <textarea <?= ($orderByCustomer['status_delivery'] == 1 || $orderByCustomer['status_delivery'] == 2) ?: 'disabled' ?> style="resize: none;" name="note" class="form-control" id="example-textarea" rows="1" placeholder="Write some note..">
                                    <?= $orderByCustomer['note'] ?>
                                    </textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="fw-bold" for="">Trạng thái</label>
                                    <select class="form-select border-success" name="status_delivery" id="">
                                        <?php if ($orderByCustomer['status_delivery'] == 1) { ?>
                                            <option <?= $orderByCustomer['status_delivery'] == 1 ? 'selected' : null ?> value="1">
                                                Chờ xác nhận</option>
                                            <option <?= $orderByCustomer['status_delivery'] == 2 ? 'selected' : null ?> value="2">
                                                Đang chuẩn bị hàng</option>
                                            <option <?= $orderByCustomer['status_delivery'] == 3 ? 'selected' : null ?> value="3">
                                                Đang vận chuyển</option>
                                            <option <?= $orderByCustomer['status_delivery'] == 4 ? 'selected' : null ?> value="4">Đã
                                                giao thành công</option>
                                            <option <?= $orderByCustomer['status_delivery'] == 0 ? 'selected' : null ?> value="0">
                                                Hủy đơn hàng</option>
                                        <?php } elseif ($orderByCustomer['status_delivery'] == 2) { ?>
                                            <option <?= $orderByCustomer['status_delivery'] == 2 ? 'selected' : null ?> value="2">
                                                Đang chuẩn bị hàng</option>
                                            <option <?= $orderByCustomer['status_delivery'] == 3 ? 'selected' : null ?> value="3">
                                                Đang vận chuyển</option>
                                            <option <?= $orderByCustomer['status_delivery'] == 4 ? 'selected' : null ?> value="4">Đã
                                                giao thành công</option>
                                        <?php } else if ($orderByCustomer['status_delivery'] == 3) { ?>
                                            <option <?= $orderByCustomer['status_delivery'] == 3 ? 'selected' : null ?> value="3">
                                                Đang vận chuyển</option>
                                            <option <?= $orderByCustomer['status_delivery'] == 4 ? 'selected' : null ?> value="4">Đã
                                                giao thành công</option>
                                        <?php } else if ($orderByCustomer['status_delivery'] == 4) { ?>
                                            <option disabled <?= $orderByCustomer['status_delivery'] == 4 ? 'selected' : null ?> value="4">Đã
                                                giao thành công</option>
                                        <?php } else { ?>
                                            <option disabled <?= $orderByCustomer['status_delivery'] == 0 ? 'selected' : null ?> value="0">Đã
                                                hủy đơn</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card">
                    <div class="card-body py-3 d-flex justify-content-between align-items-center border-bottom">
                        <h6 class="m-0 font-weight-bold">Danh sách đơn hàng</h6>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="bx bx-add-to-queue"></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Thêm sản phẩm vào đơn hàng
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="order_id" id="order_id" value="<?= $orderByCustomer['id'] ?>">
                                            <div class="mb-3">
                                                <label class="control-label">Chọn sản phẩm</label>
                                                <select id="product_id" name="product_id" class="form-control select2 mb-3">
                                                    <option value="">---Chọn sản phẩm---</option>
                                                    <?php foreach ($products as $item) : ?>
                                                        <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="control-label">Chọn kích cỡ</label>
                                                <select id="size_id" name="size_id" class="form-control select2 mb-3">
                                                    <option value="">---Chọn kích cỡ---</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="control-label">Chọn màu</label>
                                                <select id="color_id" name="color_id" class="form-control select2 mb-3">
                                                    <option value="">---Chọn màu---</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="control-label">Nhập số lượng</label>
                                                <input class="form-control" type="number" name="quantity" id="quantity" value="1" min="1">
                                            </div>
                                            <div id="priceData" class="mb-3">
                                                <label class="control-label">Giá</label>
                                                <input class="form-control" type="text" name="price" id="price">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" id="submitForm" class="btn btn-primary">Thêm</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Hình ảnh</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </thead>


                            <tbody>
                                <?php
                                $count = 1;
                                $total = 0;
                                foreach ($orderDetail as $order) :
                                    $subTotal = $order['od_price'] * $order['od_quantity'];
                                    $sizeName = getSizeName([$order['od_size_id']]);
                                    $colorName = getColorName([$order['od_color_id']]);

                                    $productAttributes = getProductAttributeForProduct($order['p_id']);
                                    $sizeID = array_column($productAttributes, 'ps_id');
                                    $quantity = array_column($productAttributes, 'pa_quantity');
                                    $countQuantity = array_combine($sizeID, $quantity);
                                    if ($countQuantity[$order['od_size_id']] > 0) {
                                        $readonlyQuantityInput = '';
                                    } else {
                                        $readonlyQuantityInput = 'readonly';
                                    }
                                ?>
                                    <tr>
                                        <td><?= $count ?></td>
                                        <td><?= $order['p_code'] ?></td>
                                        <td>
                                            <?= $order['p_name'] ?>
                                            <div class="d-flex mt-2">
                                                <?php foreach ($sizeName as $size) : ?>
                                                    <p style="margin-right: 10px;">Size: <?= $size ?></p>
                                                <?php endforeach; ?>
                                                <?php foreach ($colorName as $color) : ?>
                                                    <p>Màu: <?= $color ?></p>
                                                <?php endforeach; ?>
                                            </div>
                                        </td>
                                        <td>
                                            <img class="rounded" style="width: 70px; height: 100%;" src="<?= BASE_URL . $order['p_img_thumbnail'] ?>" alt="">
                                        </td>
                                        <td>
                                            <?php if ($order['ods_status_delivery'] == 4 || $order['ods_status_delivery'] == 3 ||  $order['ods_status_delivery'] == 0) { ?>
                                                <input readonly min="1" style="width: 100px;" class="form-control text-center" type="number" name="quantity[<?= $order['od_id'] ?>]" id="" value="<?= $order['od_quantity'] ?>">
                                            <?php } else { ?>
                                                <input min="1" <?= $readonlyQuantityInput ?> style="width: 100px;" class="form-control text-center" type="number" name="quantity[<?= $order['od_id'] ?>]" id="" value="<?= $order['od_quantity'] ?>">
                                            <?php } ?>
                                        </td>
                                        <td><?= number_format($order['od_price'], 0) . " VNĐ" ?></td>
                                        <td><?= number_format($subTotal, 0) . " VNĐ" ?></td>
                                    </tr>
                                <?php $count++;
                                endforeach; ?>
                                <?php if ($orderByCustomer['reduced'] > 0) { ?>
                                    <td colspan="5" class="fw-bold">Giảm giá</td>
                                    <td colspan="3" class="text-center">
                                        -<?= number_format($orderByCustomer['reduced'], 0) . ' đ' ?>
                                    </td>
                                <?php } ?>
                            </tbody>
                            <td colspan="5" class="fw-bold">Tổng thanh toán</td>
                            <td class="text-center" colspan="3">
                                <?= number_format($orderByCustomer['total_money'], 0) . " VNĐ" ?>
                            </td>
                        </table>
                        <a class="btn btn-info" href="<?= BASE_URL_ADMIN . "?action=orders-list" ?>">Quay lại trang danh
                            sách</a>
                        <button type="submit" class="btn btn-success">Cập nhật</button>
                    </div>
                </div>
            </div> <!-- end col -->
        </form>
    </div> <!-- end row -->
</div>
<script src="https://code.jquery.com/jquery-3.6.4.js"></script>
<script>
    $(document).ready(function() {
        link = '<?= BASE_URL_ADMIN . '?action=ajax-product' ?>';
        console.log(link);
        $('#priceData').hide();
        $('#product_id').on('change', function() {
            let productID = $(this).val();
            if (productID) {
                $.ajax({
                    url: link,
                    method: 'GET',
                    dataType: 'json',
                    data: {
                        id: productID
                    },
                    success: function(data) {
                        console.log(data);
                        $('#size_id').empty();
                        $('#color_id').empty();
                        $.each(data.sizes, function(index, size) {
                            $('#size_id').append($('<option>', {
                                value: size.id,
                                text: size.name
                            }));
                        });
                        $.each(data.colors, function(index, color) {
                            $('#color_id').append($('<option>', {
                                value: color.id,
                                text: color.name
                            }));
                        });
                        $('#priceData').show();
                        $('#price').val(data.price);
                    }
                });
            } else {
                $('#size_id').empty();
                $('#color_id').empty();
            }
        });
        $('#submitForm').on('click', function() {
            // event.preventDefault();

            const orderID = $('#order_id').val();
            const productID = $('#product_id').val();
            const sizeID = $('#size_id').val();
            const colorID = $('#color_id').val();
            const quantity = $('#quantity').val();
            const price = $('#price').val();

            const data = {
                order_id: `${orderID}`,
                product_id: `${productID}`,
                size_id: `${sizeID}`,
                color_id: `${colorID}`,
                price: `${price}`,
                quantity: `${quantity}`,
            };

            if (data) {
                $.ajax({
                    url: link,
                    method: 'POST',
                    dataType: 'json',
                    data: data,
                    success: function(response) {
                        // Handle success response
                        console.log('POST request successful');
                        console.log(response);
                    },
                });
            }
        });
    });
</script>