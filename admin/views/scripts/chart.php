<script>
    let jsonData = <?= $jsonData ?>;
    console.log(jsonData);
    let quantity = [];
    let total = [];
    let orderDate = [];

    jsonData.forEach(function(item) {
        quantity.push(item.total_quantity);
        total.push(item.total);
        orderDate.push(item.order_date);
    });

    function getChartColorsArray(e) {
        if (null !== document.getElementById(e)) {
            var t = document.getElementById(e).getAttribute("data-colors");
            if (t)
                return (t = JSON.parse(t)).map(function(e) {
                    var t = e.replace(" ", "");
                    if (-1 === t.indexOf(",")) {
                        var r = getComputedStyle(document.documentElement).getPropertyValue(
                            t
                        );
                        return r || t;
                    }
                    var a = e.split(",");
                    return 2 != a.length ?
                        t :
                        "rgba(" +
                        getComputedStyle(document.documentElement).getPropertyValue(
                            a[0]
                        ) +
                        "," +
                        a[1] +
                        ")";
                });
        }
    }

    var linechartBasicColors = getChartColorsArray("stacked-column-chart");
    linechartBasicColors &&
        ((options = {
                chart: {
                    height: 360,
                    type: "area",
                    stacked: true,
                    toolbar: {
                        show: !1
                    },
                    zoom: {
                        enabled: !0
                    },
                },
                plotOptions: {
                    bar: {
                        horizontal: !1,
                        columnWidth: "15%",
                        endingShape: "rounded",
                        borderRadius: 5,
                    },
                },
                dataLabels: {
                    enabled: !1
                },
                series: [{
                        name: "Số lượng bán",
                        data: quantity,
                    },
                    {
                        name: "Doanh thu",
                        data: total,
                    },

                ],
                xaxis: {
                    categories: orderDate,
                },
                colors: linechartBasicColors,
                legend: {
                    position: "bottom"
                },
                fill: {
                    opacity: 1
                },
            }),
            (chart = new ApexCharts(
                document.querySelector("#stacked-column-chart"),
                options
            )).render());
    ((options = {
            chart: {
                height: 200,
                type: "radialBar",
                offsetY: -10
            },
            plotOptions: {
                radialBar: {
                    startAngle: -135,
                    endAngle: 135,
                    dataLabels: {
                        name: {
                            fontSize: "13px",
                            color: void 0,
                            offsetY: 60
                        },
                        value: {
                            offsetY: 22,
                            fontSize: "16px",
                            color: void 0,
                            formatter: function(e) {
                                return e + "%";
                            },
                        },
                    },
                },
            },
            colors: radialbarColors,
            fill: {
                type: "gradient",
                gradient: {
                    shade: "dark",
                    shadeIntensity: 0.15,
                    inverseColors: !1,
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 50, 65, 91],
                },
            },
            stroke: {
                dashArray: 4
            },
            series: [67],
            labels: ["Số lượng đã bán"],
        }),
        (chart = new ApexCharts(
            document.querySelector("#radialBar-chart"),
            options
        )).render());
</script>