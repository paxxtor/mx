<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>LMS</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url()?>"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">LMS</li>
                        <li class="breadcrumb-item active">Gráficas</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row all-chart">
            <div class="col-sm-6 col-xl-6 box-col-6">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Peso para su edad NIÑAS 0 a 5 Años (Puntuación Z) </h5>
                    </div>
                    <div class="card-body chart-block">
                        <div class="flot-chart-container">
                            <div class="flot-chart-placeholder float-start" id="toggling-series-flot1"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-6 box-col-6">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Peso para su edad NIÑOS 0 a 5 Años (Puntuación Z) </h5>
                    </div>
                    <div class="card-body chart-block">
                        <div class="flot-chart-container">
                            <div class="flot-chart-placeholder float-start" id="toggling-series-flot2"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-6 box-col-6">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Talla para su edad NIÑAS 0 a 5 Años (Puntuación Z) </h5>
                    </div>
                    <div class="card-body chart-block">
                        <div class="flot-chart-container">
                            <div class="flot-chart-placeholder float-start" id="toggling-series-flot3"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-6 box-col-6">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Talla para su edad NIÑOS 0 a 5 Años (Puntuación Z) </h5>
                    </div>
                    <div class="card-body chart-block">
                        <div class="flot-chart-container">
                            <div class="flot-chart-placeholder float-start" id="toggling-series-flot4"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row all-chart">

        </div>
    </div>
    <!-- Container-fluid Ends-->
    <!-- Container-fluid Ends-->
</div>

<!-- Plugins JS start-->


<script src="<?php echo base_url();?>public/assets/js/chart/flot-chart/excanvas.js"></script>
<script src="<?php echo base_url();?>public/assets/js/chart/flot-chart/jquery.flot.js"></script>
<script src="<?php echo base_url();?>public/assets/js/chart/flot-chart/jquery.flot.time.js"></script>
<script src="<?php echo base_url();?>public/assets/js/chart/flot-chart/jquery.flot.categories.js"></script>
<script src="<?php echo base_url();?>public/assets/js/chart/flot-chart/jquery.flot.stack.js"></script>
<script src="<?php echo base_url();?>public/assets/js/chart/flot-chart/jquery.flot.pie.js"></script>
<script src="<?php echo base_url();?>public/assets/js/chart/flot-chart/jquery.flot.symbol.js"></script>

<!-- Plugins JS Ends-->
<script>
$(function() {
    var datasets = {
        "data1": {
            label: "-3 SD",
            data: [
                [0, 2.0],
                [1, 2.1],
                [2, 2.3],
                [3, 2.5],
                [4, 2.7],
                [5, 2.9],
                [6, 3.0],
                [7, 3.2],
                [8, 3.3],
                [9, 3.5],
                [10, 3.6],
                [11, 3.8],
                [12, 3.9],
                [13, 4.0]
            ]
        },
        "data2": {
            label: "-2 SD",
            data: [
                [0, 2.4],
                [1, 2.5],
                [2, 2.7],
                [3, 2.9],
                [4, 3.1],
                [5, 3.3],
                [6, 3.5],
                [7, 3.7],
                [8, 3.8],
                [9, 4.0],
                [10, 4.1],
                [11, 4.3],
                [12, 4.4],
                [13, 4.5]
            ]
        },
        "data3": {
            label: "-1 SD",
            data: [
                [0, 2.8],
                [1, 2.9],
                [2, 3.1],
                [3, 3.3],
                [4, 3.6],
                [5, 3.8],
                [6, 4.0],
                [7, 4.2],
                [8, 4.4],
                [9, 4.6],
                [10, 4.7],
                [11, 4.9],
                [12, 5.0],
                [13, 5.1]
            ]
        },
        "data4": {
            label: "Median",
            data: [
                [0, 3.2],
                [1, 3.3],
                [2, 3.6],
                [3, 3.8],
                [4, 4.1],
                [5, 4.3],
                [6, 4.6],
                [7, 4.8],
                [8, 5.0],
                [9, 5.2],
                [10, 5.4],
                [11, 5.5],
                [12, 5.7],
                [13, 5.8]
            ]
        },
        "data5": {
            label: "1 SD",
            data: [
                [0, 3.7],
                [1, 3.9],
                [2, 4.1],
                [3, 4.4],
                [4, 4.7],
                [5, 5.0],
                [6, 5.2],
                [7, 5.5],
                [8, 5.7],
                [9, 5.9],
                [10, 6.1],
                [11, 6.3],
                [12, 6.5],
                [13, 6.6]
            ]
        },
        "data6": {
            label: "2 SD",
            data: [
                [0, 4.2],
                [1, 4.4],
                [2, 4.7],
                [3, 5.0],
                [4, 5.4],
                [5, 5.7],
                [6, 6.0],
                [7, 6.2],
                [8, 6.5],
                [9, 6.7],
                [10, 6.9],
                [11, 7.1],
                [12, 7.3],
                [13, 7.5]
            ]
        },
        "data7": {
            label: "3 SD",
            data: [
                [0, 4.8],
                [1, 5.1],
                [2, 5.4],
                [3, 5.7],
                [4, 6.1],
                [5, 6.5],
                [6, 6.8],
                [7, 7.1],
                [8, 7.3],
                [9, 7.6],
                [10, 7.8],
                [11, 8.1],
                [12, 8.3],
                [13, 8.5]
            ]
        }
    };

    var datachild = {
        "child": {
            label: "line1",
            data: [
                [3, 3],
                [4, 4],
                [5, 5],
            ]
        }
    }

    var graphics = [{
        label: datasets.data1.label,
        data: datasets.data1.data,
        yaxis: 3,
        color: "#FF0000",
    }, {
        label: datasets.data2.label,
        data: datasets.data2.data,
        yaxis: 3,
        color: "#f8d62b",
    }, {
        label: datasets.data3.label,
        data: datasets.data3.data,
        yaxis: 3,
        color: "#a927f9",
    }, {
        label: datasets.data4.label,
        data: datasets.data4.data,
        yaxis: 3,
        color: "#51bb25",
    }, {
        label: datasets.data5.label,
        data: datasets.data5.data,
        yaxis: 3,
        color: "#a927f9",
    }, {
        label: datasets.data6.label,
        data: datasets.data6.data,
        yaxis: 3,
        color: "#f8d62b",
    }, {
        label: datasets.data7.label,
        data: datasets.data7.data,
        yaxis: 3,
        color: "#FF0000",
    }, {
        label: "Info",
        data: datachild.child.data,
        yaxis: 3,
        color: "#0A15F7",
        points: {
            radius: 3,
            show: true
        },
        lines: {
            show: true
        }
    }];


    var i = 0;
    $.each(datasets, function(key, val) {
        val.color = i;
        ++i;
    });
    var choiceContainer = $("#choices");


    function plotAccordingToChoices() {


        $.plot("#toggling-series-flot", graphics, {
            yaxes: [
                //yaxis:3
                {
                    position: "right",
                    color: "black",
                    axisLabel: "Temperature (°C)",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: 'Verdana, Arial',
                    axisLabelPadding: 3
                }
            ],
            legend: {
                noColumns: 1,
                labelBoxBorderColor: "#000000",
                position: "nw"
            },
            grid: {
                hoverable: true,
            }

        });

    }
    plotAccordingToChoices();


    var previousPoint = null,
        previousLabel = null;

    $.fn.UseTooltip = function() {
        $(this).bind("plothover", function(event, pos, item) {
            if (item) {
                if ((previousLabel != item.series.label) || (previousPoint != item.dataIndex)) {
                    previousPoint = item.dataIndex;
                    previousLabel = item.series.label;
                    $("#tooltip").remove();

                    var x = item.datapoint[0];
                    var y = item.datapoint[1];

                    var color = item.series.color;
                    showTooltip(item.pageX, item.pageY, color,
                        "<strong>" + item.series.label + "</strong><br> Peso: <strong>" + y + "</strong>");
                }
            } else {
                $("#tooltip").remove();
                previousPoint = null;
            }
        });
    };


    function showTooltip(x, y, color, contents) {
        $('<div id="tooltip">' + contents + '</div>').css({
            position: 'absolute',
            display: 'none',
            top: y - 40,
            left: x - 120,
            border: '2px solid ' + color,
            padding: '3px',
            'font-size': '9px',
            'border-radius': '5px',
            'background-color': '#fff',
            'font-family': 'Verdana, Arial, Helvetica, Tahoma, sans-serif',
            opacity: 0.9
        }).appendTo("body").fadeIn(200);
    }
    $("#toggling-series-flot").UseTooltip();

});
</script>

<script>
$(function() {
    var datasets = {
        "data1": {
            label: "-3 SD",
            data: [
                [0, 2],
                [1, 2.7],
                [2, 3.4],
                [3, 4],
                [4, 4.4],
                [5, 4.8],
                [6, 5.1],
                [7, 5.3],
                [8, 5.6],
                [9, 5.8],
                [10, 5.9],
                [11, 6.1],
                [12, 6.3],
                [13, 6.4],
                [14, 6.6],
                [15, 6.7],
                [16, 6.9],
                [17, 7],
                [18, 7.2],
                [19, 7.3],
                [20, 7.5],
                [21, 7.6],
                [22, 7.8],
                [23, 7.9],
                [24, 8.1],
                [25, 8.2],
                [26, 8.4],
                [27, 8.5],
                [28, 8.6],
                [29, 8.8],
                [30, 8.9],
                [31, 9],
                [32, 9.1],
                [33, 9.3],
                [34, 9.4],
                [35, 9.5],
                [36, 9.6],
                [37, 9.7],
                [38, 9.8],
                [39, 9.9],
                [40, 10.1],
                [41, 10.2],
                [42, 10.3],
                [43, 10.4],
                [44, 10.5],
                [45, 10.6],
                [46, 10.7],
                [47, 10.8],
                [48, 10.9],
                [49, 11],
                [50, 11.1],
                [51, 11.2],
                [52, 11.3],
                [53, 11.4],
                [54, 11.5],
                [55, 11.6],
                [56, 11.7],
                [57, 11.8],
                [58, 11.9],
                [59, 12],
                [60, 12.1],
            ]
        },
        "data2": {
            label: "-2 SD",
            data: [
                [0, 2.4],
                [1, 3.2],
                [2, 3.9],
                [3, 4.5],
                [4, 5],
                [5, 5.4],
                [6, 5.7],
                [7, 6],
                [8, 6.3],
                [9, 6.5],
                [10, 6.7],
                [11, 6.9],
                [12, 7],
                [13, 7.2],
                [14, 7.4],
                [15, 7.6],
                [16, 7.7],
                [17, 7.9],
                [18, 8.1],
                [19, 8.2],
                [20, 8.4],
                [21, 8.6],
                [22, 8.7],
                [23, 8.9],
                [24, 9],
                [25, 9.2],
                [26, 9.4],
                [27, 9.5],
                [28, 9.7],
                [29, 9.8],
                [30, 10],
                [31, 10.1],
                [32, 10.3],
                [33, 10.4],
                [34, 10.5],
                [35, 10.7],
                [36, 10.8],
                [37, 10.9],
                [38, 11.1],
                [39, 11.2],
                [40, 11.3],
                [41, 11.5],
                [42, 11.6],
                [43, 11.7],
                [44, 11.8],
                [45, 12],
                [46, 12.1],
                [47, 12.2],
                [48, 12.3],
                [49, 12.4],
                [50, 12.6],
                [51, 12.7],
                [52, 12.8],
                [53, 12.9],
                [54, 13],
                [55, 13.2],
                [56, 13.3],
                [57, 13.4],
                [58, 13.5],
                [59, 13.6],
                [60, 13.7],
            ]
        },
        "data3": {
            label: "-1 SD",
            data: [
                [0, 2.8],
                [1, 3.6],
                [2, 4.5],
                [3, 5.2],
                [4, 5.7],
                [5, 6.1],
                [6, 6.5],
                [7, 6.8],
                [8, 7],
                [9, 7.3],
                [10, 7.5],
                [11, 7.7],
                [12, 7.9],
                [13, 8.1],
                [14, 8.3],
                [15, 8.5],
                [16, 8.7],
                [17, 8.9],
                [18, 9.1],
                [19, 9.2],
                [20, 9.4],
                [21, 9.6],
                [22, 9.8],
                [23, 10],
                [24, 10.2],
                [25, 10.3],
                [26, 10.5],
                [27, 10.7],
                [28, 10.9],
                [29, 11.1],
                [30, 11.2],
                [31, 11.4],
                [32, 11.6],
                [33, 11.7],
                [34, 11.9],
                [35, 12],
                [36, 12.2],
                [37, 12.4],
                [38, 12.5],
                [39, 12.7],
                [40, 12.8],
                [41, 13],
                [42, 13.1],
                [43, 13.3],
                [44, 13.4],
                [45, 13.6],
                [46, 13.7],
                [47, 13.9],
                [48, 14],
                [49, 14.2],
                [50, 14.3],
                [51, 14.5],
                [52, 14.6],
                [53, 14.8],
                [54, 14.9],
                [55, 15.1],
                [56, 15.2],
                [57, 15.3],
                [58, 15.5],
                [59, 15.6],
                [60, 15.8],
            ]
        },
        "data4": {
            label: "Median",
            data: [
                [0, 3.2],
                [1, 4.2],
                [2, 5.1],
                [3, 5.8],
                [4, 6.4],
                [5, 6.9],
                [6, 7.3],
                [7, 7.6],
                [8, 7.9],
                [9, 8.2],
                [10, 8.5],
                [11, 8.7],
                [12, 8.9],
                [13, 9.2],
                [14, 9.4],
                [15, 9.6],
                [16, 9.8],
                [17, 10],
                [18, 10.2],
                [19, 10.4],
                [20, 10.6],
                [21, 10.9],
                [22, 11.1],
                [23, 11.3],
                [24, 11.5],
                [25, 11.7],
                [26, 11.9],
                [27, 12.1],
                [28, 12.3],
                [29, 12.5],
                [30, 12.7],
                [31, 12.9],
                [32, 13.1],
                [33, 13.3],
                [34, 13.5],
                [35, 13.7],
                [36, 13.9],
                [37, 14],
                [38, 14.2],
                [39, 14.4],
                [40, 14.6],
                [41, 14.8],
                [42, 15],
                [43, 15.2],
                [44, 15.3],
                [45, 15.5],
                [46, 15.7],
                [47, 15.9],
                [48, 16.1],
                [49, 16.3],
                [50, 16.4],
                [51, 16.6],
                [52, 16.8],
                [53, 17],
                [54, 17.2],
                [55, 17.3],
                [56, 17.5],
                [57, 17.7],
                [58, 17.9],
                [59, 18],
                [60, 18.2],
            ]
        },
        "data5": {
            label: "1 SD",
            data: [
                [0, 3.7],
                [1, 4.8],
                [2, 5.8],
                [3, 6.6],
                [4, 7.3],
                [5, 7.8],
                [6, 8.2],
                [7, 8.6],
                [8, 9],
                [9, 9.3],
                [10, 9.6],
                [11, 9.9],
                [12, 10.1],
                [13, 10.4],
                [14, 10.6],
                [15, 10.9],
                [16, 11.1],
                [17, 11.4],
                [18, 11.6],
                [19, 11.8],
                [20, 12.1],
                [21, 12.3],
                [22, 12.5],
                [23, 12.8],
                [24, 13],
                [25, 13.3],
                [26, 13.5],
                [27, 13.7],
                [28, 14],
                [29, 14.2],
                [30, 14.4],
                [31, 14.7],
                [32, 14.9],
                [33, 15.1],
                [34, 15.4],
                [35, 15.6],
                [36, 15.8],
                [37, 16],
                [38, 16.3],
                [39, 16.5],
                [40, 16.7],
                [41, 16.9],
                [42, 17.2],
                [43, 17.4],
                [44, 17.6],
                [45, 17.8],
                [46, 18.1],
                [47, 18.3],
                [48, 18.5],
                [49, 18.8],
                [50, 19],
                [51, 19.2],
                [52, 19.4],
                [53, 19.7],
                [54, 19.9],
                [55, 20.1],
                [56, 20.3],
                [57, 20.6],
                [58, 20.8],
                [59, 21],
                [60, 21.2],
            ]
        },
        "data6": {
            label: "2 SD",
            data: [
                [0, 4.2],
                [1, 5.5],
                [2, 6.6],
                [3, 7.5],
                [4, 8.2],
                [5, 8.8],
                [6, 9.3],
                [7, 9.8],
                [8, 10.2],
                [9, 10.5],
                [10, 10.9],
                [11, 11.2],
                [12, 11.5],
                [13, 11.8],
                [14, 12.1],
                [15, 12.4],
                [16, 12.6],
                [17, 12.9],
                [18, 13.2],
                [19, 13.5],
                [20, 13.7],
                [21, 14],
                [22, 14.3],
                [23, 14.6],
                [24, 14.8],
                [25, 15.1],
                [26, 15.4],
                [27, 15.7],
                [28, 16],
                [29, 16.2],
                [30, 16.5],
                [31, 16.8],
                [32, 17.1],
                [33, 17.3],
                [34, 17.6],
                [35, 17.9],
                [36, 18.1],
                [37, 18.4],
                [38, 18.7],
                [39, 19],
                [40, 19.2],
                [41, 19.5],
                [42, 19.8],
                [43, 20.1],
                [44, 20.4],
                [45, 20.7],
                [46, 20.9],
                [47, 21.2],
                [48, 21.5],
                [49, 21.8],
                [50, 22.1],
                [51, 22.4],
                [52, 22.6],
                [53, 22.9],
                [54, 23.2],
                [55, 23.5],
                [56, 23.8],
                [57, 24.1],
                [58, 24.4],
                [59, 24.6],
                [60, 24.9],
            ]
        },
        "data7": {
            label: "3 SD",
            data: [
                [0, 4.8],
                [1, 6.2],
                [2, 7.5],
                [3, 8.5],
                [4, 9.3],
                [5, 10],
                [6, 10.6],
                [7, 11.1],
                [8, 11.6],
                [9, 12],
                [10, 12.4],
                [11, 12.8],
                [12, 13.1],
                [13, 13.5],
                [14, 13.8],
                [15, 14.1],
                [16, 14.5],
                [17, 14.8],
                [18, 15.1],
                [19, 15.4],
                [20, 15.7],
                [21, 16],
                [22, 16.4],
                [23, 16.7],
                [24, 17],
                [25, 17.3],
                [26, 17.7],
                [27, 18],
                [28, 18.3],
                [29, 18.7],
                [30, 19],
                [31, 19.3],
                [32, 19.6],
                [33, 20],
                [34, 20.3],
                [35, 20.6],
                [36, 20.9],
                [37, 21.3],
                [38, 21.6],
                [39, 22],
                [40, 22.3],
                [41, 22.7],
                [42, 23],
                [43, 23.4],
                [44, 23.7],
                [45, 24.1],
                [46, 24.5],
                [47, 24.8],
                [48, 25.2],
                [49, 25.5],
                [50, 25.9],
                [51, 26.3],
                [52, 26.6],
                [53, 27],
                [54, 27.4],
                [55, 27.7],
                [56, 28.1],
                [57, 28.5],
                [58, 28.8],
                [59, 29.2],
                [60, 29.5],
            ]
        },

    };

    var datachild = {
        "child": {
            label: "line1",
            data: [
                [2, 7.5],
                [3, 9],
                [4, 8],
                [6, 7.5],
                [7, 9],
                [8, 8],
            ]
        }
    }


    var graphics = [{
        label: datasets.data1.label,
        data: datasets.data1.data,
        yaxis: 3,
        color: "#FF0000",
    }, {
        label: datasets.data2.label,
        data: datasets.data2.data,
        yaxis: 3,
        color: "#f8d62b",
    }, {
        label: datasets.data3.label,
        data: datasets.data3.data,
        yaxis: 3,
        color: "#a927f9",
    }, {
        label: datasets.data4.label,
        data: datasets.data4.data,
        yaxis: 3,
        color: "#51bb25",
    }, {
        label: datasets.data5.label,
        data: datasets.data5.data,
        yaxis: 3,
        color: "#a927f9",
    }, {
        label: datasets.data6.label,
        data: datasets.data6.data,
        yaxis: 3,
        color: "#f8d62b",
    }, {
        label: datasets.data7.label,
        data: datasets.data7.data,
        yaxis: 3,
        color: "#FF0000",
    }, {
        label: "Info",
        data: datachild.child.data,
        yaxis: 3,
        color: "#0A15F7",
        points: {
            radius: 3,
            show: true
        },
        lines: {
            show: true
        }
    }];


    var i = 0;
    $.each(datasets, function(key, val) {
        val.color = i;
        ++i;
    });
    var choiceContainer = $("#choices");


    function plotAccordingToChoices() {


        $.plot("#toggling-series-flot1", graphics, {

            legend: {
                noColumns: 1,
                labelBoxBorderColor: "#858585",
                position: "nw"
            },
            grid: {
                hoverable: true,
            },


        });

    }
    plotAccordingToChoices();


    var previousPoint = null,
        previousLabel = null;

    $.fn.UseTooltip = function() {
        $(this).bind("plothover", function(event, pos, item) {
            if (item) {
                if ((previousLabel != item.series.label) || (previousPoint != item.dataIndex)) {
                    previousPoint = item.dataIndex;
                    previousLabel = item.series.label;
                    $("#tooltip").remove();

                    var x = item.datapoint[0];
                    var y = item.datapoint[1];

                    var color = item.series.color;
                    showTooltip(item.pageX, item.pageY, color,
                        "<strong>" + item.series.label + "</strong><br> Peso: <strong>" + y + "</strong>");
                }
            } else {
                $("#tooltip").remove();
                previousPoint = null;
            }
        });
    };


    function showTooltip(x, y, color, contents) {
        $('<div id="tooltip">' + contents + '</div>').css({
            position: 'absolute',
            display: 'none',
            top: y - 40,
            left: x - 120,
            border: '2px solid ' + color,
            padding: '3px',
            'font-size': '9px',
            'border-radius': '5px',
            'background-color': '#fff',
            'font-family': 'Verdana, Arial, Helvetica, Tahoma, sans-serif',
            opacity: 0.9
        }).appendTo("body").fadeIn(200);
    }
    $("#toggling-series-flot1").UseTooltip();

});
</script>

<script>
$(function() {
    var datasets = {
        "data1": {
            label: "-3 SD",
            data: [
                [0, 43.6],
                [1, 47.8],
                [2, 51],
                [3, 53.5],
                [4, 55.6],
                [5, 57.4],
                [6, 58.9],
                [7, 60.3],
                [8, 61.7],
                [9, 62.9],
                [10, 64.1],
                [11, 65.2],
                [12, 66.3],
                [13, 67.3],
                [14, 68.3],
                [15, 69.3],
                [16, 70.2],
                [17, 71.1],
                [18, 72],
                [19, 72.8],
                [20, 73.7],
                [21, 74.5],
                [22, 75.2],
                [23, 76],
                [24, 76],
                [25, 76.8],
                [26, 77.5],
                [27, 78.1],
                [28, 78.8],
                [29, 79.5],
                [30, 80.1],
                [31, 80.7],
                [32, 81.3],
                [33, 81.9],
                [34, 82.5],
                [35, 83.1],
                [36, 83.6],
                [37, 84.2],
                [38, 84.7],
                [39, 85.3],
                [40, 85.8],
                [41, 86.3],
                [42, 86.8],
                [43, 87.4],
                [44, 87.9],
                [45, 88.4],
                [46, 88.9],
                [47, 89.3],
                [48, 89.8],
                [49, 90.3],
                [50, 90.7],
                [51, 91.2],
                [52, 91.7],
                [53, 92.1],
                [54, 92.6],
                [55, 93],
                [56, 93.4],
                [57, 93.9],
                [58, 94.3],
                [59, 94.7],
                [60, 95.2],
            ]
        },
        "data2": {
            label: "-2 SD",
            data: [
                [0, 45.4],
                [1, 49.8],
                [2, 53],
                [3, 55.6],
                [4, 57.8],
                [5, 59.6],
                [6, 61.2],
                [7, 62.7],
                [8, 64],
                [9, 65.3],
                [10, 66.5],
                [11, 67.7],
                [12, 68.9],
                [13, 70],
                [14, 71],
                [15, 72],
                [16, 73],
                [17, 74],
                [18, 74.9],
                [19, 75.8],
                [20, 76.7],
                [21, 77.5],
                [22, 78.4],
                [23, 79.2],
                [24, 79.3],
                [25, 80],
                [26, 80.8],
                [27, 81.5],
                [28, 82.2],
                [29, 82.9],
                [30, 83.6],
                [31, 84.3],
                [32, 84.9],
                [33, 85.6],
                [34, 86.2],
                [35, 86.8],
                [36, 87.4],
                [37, 88],
                [38, 88.6],
                [39, 89.2],
                [40, 89.8],
                [41, 90.4],
                [42, 90.9],
                [43, 91.5],
                [44, 92],
                [45, 92.5],
                [46, 93.1],
                [47, 93.6],
                [48, 94.1],
                [49, 94.6],
                [50, 95.1],
                [51, 95.6],
                [52, 96.1],
                [53, 96.6],
                [54, 97.1],
                [55, 97.6],
                [56, 98.1],
                [57, 98.5],
                [58, 99],
                [59, 99.5],
                [60, 99.9],
            ]
        },
        "data3": {
            label: "-1 SD",
            data: [
                [0, 47.3],
                [1, 51.7],
                [2, 55],
                [3, 57.7],
                [4, 59.9],
                [5, 61.8],
                [6, 63.5],
                [7, 65],
                [8, 66.4],
                [9, 67.7],
                [10, 69],
                [11, 70.3],
                [12, 71.4],
                [13, 72.6],
                [14, 73.7],
                [15, 74.8],
                [16, 75.8],
                [17, 76.8],
                [18, 77.8],
                [19, 78.8],
                [20, 79.7],
                [21, 80.6],
                [22, 81.5],
                [23, 82.3],
                [24, 82.5],
                [25, 83.3],
                [26, 84.1],
                [27, 84.9],
                [28, 85.7],
                [29, 86.4],
                [30, 87.1],
                [31, 87.9],
                [32, 88.6],
                [33, 89.3],
                [34, 89.9],
                [35, 90.6],
                [36, 91.2],
                [37, 91.9],
                [38, 92.5],
                [39, 93.1],
                [40, 93.8],
                [41, 94.4],
                [42, 95],
                [43, 95.6],
                [44, 96.2],
                [45, 96.7],
                [46, 97.3],
                [47, 97.9],
                [48, 98.4],
                [49, 99],
                [50, 99.5],
                [51, 100.1],
                [52, 100.6],
                [53, 101.1],
                [54, 101.6],
                [55, 102.2],
                [56, 102.7],
                [57, 103.2],
                [58, 103.7],
                [59, 104.2],
                [60, 104.7],
            ]
        },
        "data4": {
            label: "Median",
            data: [
                [0, 49.1],
                [1, 53.7],
                [2, 57.1],
                [3, 59.8],
                [4, 62.1],
                [5, 64],
                [6, 65.7],
                [7, 67.3],
                [8, 68.7],
                [9, 70.1],
                [10, 71.5],
                [11, 72.8],
                [12, 74],
                [13, 75.2],
                [14, 76.4],
                [15, 77.5],
                [16, 78.6],
                [17, 79.7],
                [18, 80.7],
                [19, 81.7],
                [20, 82.7],
                [21, 83.7],
                [22, 84.6],
                [23, 85.5],
                [24, 85.7],
                [25, 86.6],
                [26, 87.4],
                [27, 88.3],
                [28, 89.1],
                [29, 89.9],
                [30, 90.7],
                [31, 91.4],
                [32, 92.2],
                [33, 92.9],
                [34, 93.6],
                [35, 94.4],
                [36, 95.1],
                [37, 95.7],
                [38, 96.4],
                [39, 97.1],
                [40, 97.7],
                [41, 98.4],
                [42, 99],
                [43, 99.7],
                [44, 100.3],
                [45, 100.9],
                [46, 101.5],
                [47, 102.1],
                [48, 102.7],
                [49, 103.3],
                [50, 103.9],
                [51, 104.5],
                [52, 105],
                [53, 105.6],
                [54, 106.2],
                [55, 106.7],
                [56, 107.3],
                [57, 107.8],
                [58, 108.4],
                [59, 108.9],
                [60, 109.4],
            ]
        },
        "data5": {
            label: "1 SD",
            data: [
                [0, 51],
                [1, 55.6],
                [2, 59.1],
                [3, 61.9],
                [4, 64.3],
                [5, 66.2],
                [6, 68],
                [7, 69.6],
                [8, 71.1],
                [9, 72.6],
                [10, 73.9],
                [11, 75.3],
                [12, 76.6],
                [13, 77.8],
                [14, 79.1],
                [15, 80.2],
                [16, 81.4],
                [17, 82.5],
                [18, 83.6],
                [19, 84.7],
                [20, 85.7],
                [21, 86.7],
                [22, 87.7],
                [23, 88.7],
                [24, 88.9],
                [25, 89.9],
                [26, 90.8],
                [27, 91.7],
                [28, 92.5],
                [29, 93.4],
                [30, 94.2],
                [31, 95],
                [32, 95.8],
                [33, 96.6],
                [34, 97.4],
                [35, 98.1],
                [36, 98.9],
                [37, 99.6],
                [38, 100.3],
                [39, 101],
                [40, 101.7],
                [41, 102.4],
                [42, 103.1],
                [43, 103.8],
                [44, 104.5],
                [45, 105.1],
                [46, 105.8],
                [47, 106.4],
                [48, 107],
                [49, 107.7],
                [50, 108.3],
                [51, 108.9],
                [52, 109.5],
                [53, 110.1],
                [54, 110.7],
                [55, 111.3],
                [56, 111.9],
                [57, 112.5],
                [58, 113],
                [59, 113.6],
                [60, 114.2],
            ]
        },
        "data6": {
            label: "2 SD",
            data: [
                [0, 52.9],
                [1, 57.6],
                [2, 61.1],
                [3, 64],
                [4, 66.4],
                [5, 68.5],
                [6, 70.3],
                [7, 71.9],
                [8, 73.5],
                [9, 75],
                [10, 76.4],
                [11, 77.8],
                [12, 79.2],
                [13, 80.5],
                [14, 81.7],
                [15, 83],
                [16, 84.2],
                [17, 85.4],
                [18, 86.5],
                [19, 87.6],
                [20, 88.7],
                [21, 89.8],
                [22, 90.8],
                [23, 91.9],
                [24, 92.2],
                [25, 93.1],
                [26, 94.1],
                [27, 95],
                [28, 96],
                [29, 96.9],
                [30, 97.7],
                [31, 98.6],
                [32, 99.4],
                [33, 100.3],
                [34, 101.1],
                [35, 101.9],
                [36, 102.7],
                [37, 103.4],
                [38, 104.2],
                [39, 105],
                [40, 105.7],
                [41, 106.4],
                [42, 107.2],
                [43, 107.9],
                [44, 108.6],
                [45, 109.3],
                [46, 110],
                [47, 110.7],
                [48, 111.3],
                [49, 112],
                [50, 112.7],
                [51, 113.3],
                [52, 114],
                [53, 114.6],
                [54, 115.2],
                [55, 115.9],
                [56, 116.5],
                [57, 117.1],
                [58, 117.7],
                [59, 118.3],
                [60, 118.9],
            ]
        },
        "data7": {
            label: "3 SD",
            data: [
                [0, 54.7],
                [1, 59.5],
                [2, 63.2],
                [3, 66.1],
                [4, 68.6],
                [5, 70.7],
                [6, 72.5],
                [7, 74.2],
                [8, 75.8],
                [9, 77.4],
                [10, 78.9],
                [11, 80.3],
                [12, 81.7],
                [13, 83.1],
                [14, 84.4],
                [15, 85.7],
                [16, 87],
                [17, 88.2],
                [18, 89.4],
                [19, 90.6],
                [20, 91.7],
                [21, 92.9],
                [22, 94],
                [23, 95],
                [24, 95.4],
                [25, 96.4],
                [26, 97.4],
                [27, 98.4],
                [28, 99.4],
                [29, 100.3],
                [30, 101.3],
                [31, 102.2],
                [32, 103.1],
                [33, 103.9],
                [34, 104.8],
                [35, 105.6],
                [36, 106.5],
                [37, 107.3],
                [38, 108.1],
                [39, 108.9],
                [40, 109.7],
                [41, 110.5],
                [42, 111.2],
                [43, 112],
                [44, 112.7],
                [45, 113.5],
                [46, 114.2],
                [47, 114.9],
                [48, 115.7],
                [49, 116.4],
                [50, 117.1],
                [51, 117.7],
                [52, 118.4],
                [53, 119.1],
                [54, 119.8],
                [55, 120.4],
                [56, 121.1],
                [57, 121.8],
                [58, 122.4],
                [59, 123.1],
                [60, 123.7],
            ]
        },

    };
    var datachild = {
        "child": {
            label: "line1",
            data: [
                [2, 7.5],
                [3, 9],
                [4, 8],
                [6, 7.5],
                [7, 9],
                [8, 8],
            ]
        }
    }


    var graphics = [{
        label: datasets.data1.label,
        data: datasets.data1.data,
        yaxis: 3,
        color: "#FF0000",
    }, {
        label: datasets.data2.label,
        data: datasets.data2.data,
        yaxis: 3,
        color: "#f8d62b",
    }, {
        label: datasets.data3.label,
        data: datasets.data3.data,
        yaxis: 3,
        color: "#a927f9",
    }, {
        label: datasets.data4.label,
        data: datasets.data4.data,
        yaxis: 3,
        color: "#51bb25",
    }, {
        label: datasets.data5.label,
        data: datasets.data5.data,
        yaxis: 3,
        color: "#a927f9",
    }, {
        label: datasets.data6.label,
        data: datasets.data6.data,
        yaxis: 3,
        color: "#f8d62b",
    }, {
        label: datasets.data7.label,
        data: datasets.data7.data,
        yaxis: 3,
        color: "#FF0000",
    }, {
        label: "Info",
        data: datachild.child.data,
        yaxis: 3,
        color: "#0A15F7",
        points: {
            radius: 3,
            show: true
        },
        lines: {
            show: true
        }
    }];


    var i = 0;
    $.each(datasets, function(key, val) {
        val.color = i;
        ++i;
    });
    var choiceContainer = $("#choices");


    function plotAccordingToChoices() {

        var ticks = [];
        for (var i = 0; i < datasets.length; i++) {
            ticks.push(i);
        }
        $.plot("#toggling-series-flot3", graphics, {

            legend: {
                noColumns: 1,
                labelBoxBorderColor: "#858585",
                position: "nw"
            },
            grid: {
                hoverable: true,
            },

            xaxis: {
                tickColor: 'transparent',
                autoScaleMargin: false,
                autoScaleMargin: 5,
                windowSize: 5,
                minTickSize: 2,

                showTickLabels: "major",
                labelWidth: 10,
                labelHeight: 10,
                reserveSpace: true,
                gridLines: true
            },
            yaxis: {
                tickColor: 'transparent',
                autoScaleMargin: false,

            },
            pan: {

                interactive: true
            },
            zoom: {

                interactive: false
            },


        });

    }
    plotAccordingToChoices();


    var previousPoint = null,
        previousLabel = null;

    $.fn.UseTooltip = function() {
        $(this).bind("plothover", function(event, pos, item) {
            if (item) {
                if ((previousLabel != item.series.label) || (previousPoint != item.dataIndex)) {
                    previousPoint = item.dataIndex;
                    previousLabel = item.series.label;
                    $("#tooltip").remove();

                    var x = item.datapoint[0];
                    var y = item.datapoint[1];

                    var color = item.series.color;
                    showTooltip(item.pageX, item.pageY, color,
                        "<strong>" + item.series.label + "</strong><br> Peso: <strong>" + y + "</strong>");
                }
            } else {
                $("#tooltip").remove();
                previousPoint = null;
            }
        });
    };


    function showTooltip(x, y, color, contents) {
        $('<div id="tooltip">' + contents + '</div>').css({
            position: 'absolute',
            display: 'none',
            top: y - 40,
            left: x - 120,
            border: '2px solid ' + color,
            padding: '3px',
            'font-size': '9px',
            'border-radius': '5px',
            'background-color': '#fff',
            'font-family': 'Verdana, Arial, Helvetica, Tahoma, sans-serif',
            opacity: 0.9
        }).appendTo("body").fadeIn(200);
    }
    $("#toggling-series-flot3").UseTooltip();

});
</script>

<script>
$(function() {


    var datachild = {
        "child": {
            label: "line1",
            data: [
                [2, 7.5],
                [3, 9],
                [4, 8],
                [6, 7.5],
                [7, 9],
                [8, 8],
            ]
        }
    }


    var graphics = [{
        label: datasets.data1.label,
        data: datasets.data1.data,
        yaxis: 3,
        color: "#FF0000",
    }, {
        label: datasets.data2.label,
        data: datasets.data2.data,
        yaxis: 3,
        color: "#f8d62b",
    }, {
        label: datasets.data3.label,
        data: datasets.data3.data,
        yaxis: 3,
        color: "#a927f9",
    }, {
        label: datasets.data4.label,
        data: datasets.data4.data,
        yaxis: 3,
        color: "#51bb25",
    }, {
        label: datasets.data5.label,
        data: datasets.data5.data,
        yaxis: 3,
        color: "#a927f9",
    }, {
        label: datasets.data6.label,
        data: datasets.data6.data,
        yaxis: 3,
        color: "#f8d62b",
    }, {
        label: datasets.data7.label,
        data: datasets.data7.data,
        yaxis: 3,
        color: "#FF0000",
    }, {
        label: "Info",
        data: datachild.child.data,
        yaxis: 3,
        color: "#0A15F7",
        points: {
            radius: 3,
            show: true
        },
        lines: {
            show: true
        }
    }];


    var i = 0;
    $.each(datasets, function(key, val) {
        val.color = i;
        ++i;
    });
    var choiceContainer = $("#choices");


    function plotAccordingToChoices() {


        $.plot("#toggling-series-flot4", graphics, {

            legend: {
                noColumns: 1,
                labelBoxBorderColor: "#858585",
                position: "nw"
            },
            grid: {
                hoverable: true,
            },


        });

    }
    plotAccordingToChoices();


    var previousPoint = null,
        previousLabel = null;

    $.fn.UseTooltip = function() {
        $(this).bind("plothover", function(event, pos, item) {
            if (item) {
                if ((previousLabel != item.series.label) || (previousPoint != item.dataIndex)) {
                    previousPoint = item.dataIndex;
                    previousLabel = item.series.label;
                    $("#tooltip").remove();

                    var x = item.datapoint[0];
                    var y = item.datapoint[1];

                    var color = item.series.color;
                    showTooltip(item.pageX, item.pageY, color,
                        "<strong>" + item.series.label + "</strong><br> Peso: <strong>" + y + "</strong>");
                }
            } else {
                $("#tooltip").remove();
                previousPoint = null;
            }
        });
    };


    function showTooltip(x, y, color, contents) {
        $('<div id="tooltip">' + contents + '</div>').css({
            position: 'absolute',
            display: 'none',
            top: y - 40,
            left: x - 120,
            border: '2px solid ' + color,
            padding: '3px',
            'font-size': '9px',
            'border-radius': '5px',
            'background-color': '#fff',
            'font-family': 'Verdana, Arial, Helvetica, Tahoma, sans-serif',
            opacity: 0.9
        }).appendTo("body").fadeIn(200);
    }
    $("#toggling-series-flot4").UseTooltip();

});
</script>