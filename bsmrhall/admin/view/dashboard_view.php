<?php
    // Aplicant's count
    $total_applicants_info  = $obj->non_residential_info();
    $total_applicants_count = mysqli_num_rows( $total_applicants_info );

    // Message count
    $total_mgs_info  = $obj->display_message();
    $total_mgs_count = mysqli_num_rows( $total_mgs_info );

    // Residential count
    $total_r_info  = $obj->display_residential_info();
    $total_r_count = mysqli_num_rows( $total_r_info );

    // Rasidential Paid count
    $total_paid_amount = $obj->total_residential_info();

    // Residential Fee count
    $r_amount = 0;
    $r_fee    = $obj->display_residential_info();
    while ( $amount1 = mysqli_fetch_assoc( $r_fee ) ) {
        $r_amount = $r_amount + $amount1['non_r_fee'];
    }
    $total_r_amount = $r_amount - ( $total_r_count * 250 );

    // Pre Residential Fee count
    $total_pre_r_info  = $obj->display_pre_residential_info();
    $total_pre_r_count = mysqli_num_rows( $total_pre_r_info );
    $pre_r_amount      = 0;
    $pre_r_fee         = $obj->display_pre_residential_info();
    while ( $amount2 = mysqli_fetch_assoc( $pre_r_fee ) ) {
        $pre_r_amount = $pre_r_amount + $amount2['non_r_fee'];
    }
    $total_pre_r_amount = $pre_r_amount - ( $total_pre_r_count * 250 );

    $total_amount = ( $total_paid_amount * 250 ) + $total_r_amount + $total_pre_r_amount;

    ##################################################################
    $r_yearly_amount_info = $obj->yearly_admission_amount_info();
    $r_amount_info        = $obj->year_amount_info();
    $r_jan                = $r_amount_info[0] + $r_yearly_amount_info[0];
    $r_feb                = $r_amount_info[1] + $r_yearly_amount_info[1];
    $r_mar                = $r_amount_info[2] + $r_yearly_amount_info[2];
    $r_apr                = $r_amount_info[3] + $r_yearly_amount_info[3];
    $r_may                = $r_amount_info[4] + $r_yearly_amount_info[4];
    $r_jun                = $r_amount_info[5] + $r_yearly_amount_info[5];
    $r_jul                = $r_amount_info[6] + $r_yearly_amount_info[6];
    $r_aug                = $r_amount_info[7] + $r_yearly_amount_info[7];
    $r_sep                = $r_amount_info[8] + $r_yearly_amount_info[8];
    $r_oct                = $r_amount_info[9] + $r_yearly_amount_info[9];
    $r_nov                = $r_amount_info[10] + $r_yearly_amount_info[10];
    $r_dec                = $r_amount_info[11] + $r_yearly_amount_info[11];
?>

<style>
.dashboard-icon img {
    border-radius: 50%;
    height: 60px;
    width: 60px;
    border: solid 2px #9b0000;
}

.dashboard-icon {

    text-align: center;
    padding: 15px;
    /* width: 100%; */
    /* justify-content: center; */

}
</style>


<h1 class="mt-4">Dashboard</h1>

<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
</ol>
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-info text-white mb-4">
            <div class="dashboard-icon">
                <img class="" src="./assets/img/taka-icon.jpg" alt="">
                <br><br>
                <h5 class="">Total Amount</h5>
                <h6><span class="counter"><?php echo $total_amount; ?></span>&nbsp;&#2547;</h6>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-warning text-white mb-4">
            <div class="dashboard-icon">
                <img class="" src="./assets/img/new-icon.png" alt="">
                <br><br>
                <h5 class="">Total Applicants</h5>
                <h6><span class="counter"><?php echo $total_applicants_count; ?></span></h6>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="dashboard-icon">
                <img class="" src="./assets/img/student-icon.png" alt="">
                <br><br>
                <h5 class="">Total Students</h5>
                <h6><span class="counter"><?php echo $total_r_count; ?></span></h6>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-danger text-white mb-4">
            <div class="dashboard-icon">
                <img class="" src="./assets/img/message-icon.jfif" alt="">
                <br><br>
                <h5 class="">Total Messages</h5>
                <h6><span class="counter"><?php echo $total_mgs_count; ?></span></h6>
            </div>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-xl-12">
        <div class="card mb-8">
            <div class="card-header">

                <h5><i class="fas fa-chart-bar mr-1"></i> AMOUNT INFO-<?php echo date( "Y" ); ?></h5>
            </div>
            <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
        </div>
    </div>
</div>

<!-- ##################################################### -->

<!-- Bar Chart -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script type="text/javascript">
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily =
    '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';
// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var r = "<?=$r_jan?>";
var myLineChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"],
        datasets: [{
            label: "Total Taka",
            backgroundColor: "rgba(2,117,216,1)",
            borderColor: "rgba(2,117,216,1)",
            data: [<?php echo $r_jan; ?>, <?php echo $r_feb; ?>, <?php echo $r_mar; ?>,
                <?php echo $r_apr; ?>, <?php echo $r_may; ?>, <?php echo $r_jun; ?>,
                <?php echo $r_jul; ?>, <?php echo $r_aug; ?>, <?php echo $r_sep; ?>,
                <?php echo $r_oct; ?>, <?php echo $r_nov; ?>,
                <?php echo $r_dec; ?>
            ],
        }],
    },
    options: {
        scales: {
            xAxes: [{
                time: {
                    unit: 'month'
                },
                gridLines: {
                    display: false
                },
                ticks: {
                    maxTicksLimit: 12
                }
            }],
            yAxes: [{
                ticks: {
                    min: 0,
                    max: 150000,
                    maxTicksLimit: 10
                },
                gridLines: {
                    display: true
                }
            }],
        },
        legend: {
            display: false
        }
    }
});
</script>