<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18"><?= $title ?></h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="card">
        <div class="card-body py-3 d-flex justify-content-between align-items-center border-bottom">
            <h6 class="m-0 font-weight-bold"><?= $title ?> <span id="text"></span></h6>
            <form action="" class="d-flex" id="fillter">
                <div class="form-group">
                    <label for="">Từ ngày</label>
                    <input class="form-control" type="text" name="fromDay" id="fromDay">
                </div>
                <div style="margin-left: 8px;" class="form-group">
                    <label for="">Đến ngày</label>
                    <input class="form-control" type="text" name="toDay" id="toDay">
                </div>
            </form>
        </div>
        <div class="card-body">
            <div id="myfirstchart" style="height: 250px;"></div>
            <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                <thead>
                    <tr>
                        <th>Ngày</th>
                        <th>Số lượng bán ra</th>
                        <th>Tổng doanh thu</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($totalRevenue as $item) : ?>
                    <tr>
                        <td><?= $item['order_date'] ?></td>
                        <td><?= $item['total_quantity'] ?></td>
                        <td><?= number_format($item['total'], 0) . ' VNĐ' ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <h4 class="mb-sm-0 font-size-18">Biểu đồ thống kê</h4>
                    <canvas id="myChart" style="width:100%;height: 500px;"></canvas>
                </div>
                <div class="col-4">
                    <h4 class="m-0 font-weight-bold mb-5">Sản phẩm xem nhiều nhất</h4>
                    <table class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượt xem</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count = 1;
                            foreach ($productView as $item) : ?>
                        </tbody>
                        <tr>
                            <td><?= $count ?></td>
                            <td><?= $item['name'] ?></td>
                            <td><?= $item['view'] ?></td>
                        </tr>
                        <?php
                                $count++;
                            endforeach; ?>
                    </table>
                </div>

                <div class="col-4">
                    <h4 class="m-0 font-weight-bold mb-5">Sản phẩm bán chạy</h4>
                    <table class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng đã bán</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count = 1;
                            foreach ($productByOrder as $item) : ?>
                        </tbody>
                        <tr>
                            <td><?= $count ?></td>
                            <td><?= $item['p_name'] ?></td>
                            <td><?= $item['o_quantity'] ?></td>
                        </tr>
                        <?php
                                $count++;
                            endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên danh mục</th>
                        <th>Thương hiệu</th>
                        <th>Số lượng sản phẩm</th>
                        <th>Giá cao nhất</th>
                        <th>Giá thấp nhất</th>
                        <th>Giá trung bình</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $count = 1;
                    foreach ($productByCategory as $item) :
                    ?>
                    <tr>
                        <td><?= $count ?></td>
                        <td><?= $item['c_name'] ?></td>
                        <td><?= $item['b_name'] ?></td>
                        <td><?= $item['quantity'] ?></td>
                        <td><?= number_format($item['p_max_price'], 0) . ' VNĐ' ?></td>
                        <td><?= number_format($item['p_min_price'], 0) . ' VNĐ' ?></td>
                        <td><?= number_format($item['p_avg_price'], 0) . ' VNĐ' ?></td>
                    </tr>
                    <?php
                        $count++;
                    endforeach;
                    ?>
                </tbody>
            </table>

        </div>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script>
link = '<?= BASE_URL_ADMIN . '?action=ajax-statistical' ?>';
$(document).ready(function() {
    $('#fromDay, #toDay').datepicker({
        format: 'yyyy-mm-dd', // Định dạng ngày
        language: 'vi', // Ngôn ngữ
        autoclose: true // Tự động đóng khi chọn ngày
    });


    let chart = Morris.Area({
        element: 'myfirstchart',
        xkey: 'order_date',
        parseTime: false,
        lineColors: ['#819C79', '#FC8710', '#FF6531'],
        ykeys: ['total', 'total_quantity'],
        labels: ['Tổng doanh thu', 'Số lượng']
    });

    $('#myfirstchart').hide(); // Ẩn biểu đồ ban đầu

    $('#fillter').change(function() {
        var fromDay = $('#fromDay').val();
        var toDay = $('#toDay').val();
        $.ajax({
            url: link,
            method: 'POST',
            dataType: 'json',
            data: {
                fromDay: fromDay,
                toDay: toDay
            },
            success: function(data) {
                console.log(data);
                chart.setData(data);
                $('#text').text(': ' + fromDay + ' đến ' + toDay);
                if (data.length > 0) {
                    $('#myfirstchart').show();
                    chart.setData(data);
                } else {
                    $('#myfirstchart').hide();
                }
            }
        })
    });
});
</script>
<script>
const xValues = ["Sản phẩm", "Danh mục", "Thương hiệu", "Người dùng"];
const yValues = [
    <?= $totalProducts['count'] ?>,
    <?= $totalCategories['count'] ?>,
    <?= $totalBrands['count'] ?>,
    <?= $totalUsers['count'] ?>,
];

const barColors = [
    'rgba(255, 99, 132, 1)',
    'rgba(54, 162, 235, 1)',
    'rgba(255, 206, 86, 1)',
    'rgba(153, 102, 255, 1)',
    'rgba(255, 159, 64, 1)',

];

new Chart("myChart", {
    type: "pie",
    data: {
        labels: xValues,
        datasets: [{
            backgroundColor: barColors,
            data: yValues
        }]
    },
    options: {
        title: {
            display: true,
        }
    }
});
</script>