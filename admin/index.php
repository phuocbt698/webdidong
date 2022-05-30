<?php
    include_once "./layout/header.php";
    include_once "./layout/sidebar.php";
?>
<div class="main-content">
    <div class="header-main-dashboard">
        <div class="new-order box">
            <div class="infor">
                <h3>150</h3>
                <span>New Order</span>
            </div>
            <div class="icon">
                <i class="fas fa-shopping-bag fa-4x"></i>
            </div>
        </div>
        <div class="bounce-rate box">
            <div class="infor">
                <h3>150</h3>
                <span>Bounce-Rate</span>
            </div>
            <div class="icon">
                <i class="fas fa-chart-bar fa-4x"></i>
            </div>
        </div>
        <div class="user-registrations box">
            <div class="infor">
                <h3>150</h3>
                <span>User Registrations</span>
            </div>
            <div class="icon">
                <i class="fas fa-user-plus fa-4x"></i>
            </div>
        </div>
        <div class="unique-visitors box">
            <div class="infor">
                <h3>150</h3>
                <span>Unique Visitors</span>
            </div>
            <div class="icon">
                <i class="fas fa-chart-pie fa-4x"></i>
            </div>
        </div>
    </div>
    <div class="main-content-dashboard">
        <div class="hearder-content-dashboard">
            <h3>Thống kê doanh thu</h3>
            <div class="form-statistical">
                <form action="">
                    <label for="from-day">From</label>
                    <div class="from-day">
                        <input type="date" id="from-day">
                    </div>
                    <label for="to-day">To</label>
                    <div class="to-day">
                        <input type="date" id="to-day">
                    </div>
                    <div class="submit-form">
                        <button type="submit">Thống kê</button>
                    </div>
                </form>
            </div>
        </div>
        <figure class="highcharts-figure">
            <div id="chart"></div>
        </figure>
    </div>

</div>
<?php
    include_once "./layout/footer.php";
?>
<script>
    Highcharts.chart('chart', {

        title: {
            text: 'THỐNG KÊ DOANH THU'
        },

        yAxis: {
            title: {
                text: ''
            }
        },

        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },

        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
            }
        },

        series: [{
            name: 'Doanh thu',
            data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
        }],

        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }

    });
</script>
