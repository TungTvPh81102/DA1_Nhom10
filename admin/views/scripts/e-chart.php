<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script> -->
3 <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
4 <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script>
    new Morris.Area({
        // ID of the element in which to draw the chart.
        element: 'myfirstchart',
        // Chart data records -- each entry in this array corresponds to a point on
        // the chart.
        data: [{
                year: '2024-03-31',
                order: 50,
                sales: 15000,
                quantity: 20
            },
            {
                year: '2024-04-01',
                order: 5,
                sales: 20000,
                quantity: 20
            },
            {
                year: '2024-04-02',
                order: 10,
                sales: 15000,
                quantity: 60
            },

        ],
        // The name of the data record attribute that contains x-values.
        xkey: 'year',
        // A list of names of data record attributes that contain y-values.
        ykeys: ['order', 'sales', 'quantity'],
        // Labels for the ykeys -- will be displayed when you hover over the
        // chart.
        labels: ['Đơn hàng', 'Doanh thu', 'Số lượng đã bán']
    });
</script>