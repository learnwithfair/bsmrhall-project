<?php
    include "class/function.php";
    $obj1 = new students_info();
    session_start();
?>
<?php
    if ( isset( $_POST['user_log_out_btn'] ) ) {
        $obj1->user_log_out();
    }
    if ( !isset( $_SESSION['user_roll'] ) ) {
        header( "location: log_in" );
    } else {
    ?>

<?php

        //  Dining Meal Auto Delete
        $dining_meal_auto_dlt = $obj1->dining_meal_dlt();

        if ( isset( $_POST['user_img_btn'] ) ) {
            $update_result = $obj1->user_edit_profile( $_POST );

        }
        if ( isset( $_POST['user_pre_address_btn'] ) ) {
            $update_result = $obj1->user_pre_address_update( $_POST );

        }
        if ( isset( $_POST['add-meal-btn'] ) ) {
            $add_result = $obj1->add_meal( $_POST );

        }
        if ( isset( $_POST['update-meal-btn'] ) ) {
            $update_result = $obj1->update_meal( $_POST );

        }
        if ( isset( $_POST['b-add-meal-btn'] ) ) {
            $add_result = $obj1->b_add_meal( $_POST );

        }

        if ( isset( $_POST['b-update-meal-btn'] ) ) {
            $update_result = $obj1->b_update_meal( $_POST );

        }

    ?>
<?php

        $meal_info   = $obj1->display_dining_meal_info( $_SESSION['user_roll'] );
        $b_meal_info = $obj1->b_display_dining_meal_info( $_SESSION['user_roll'] );
        $info        = $obj1->display_profile_info( $_SESSION['user_roll'] );
    ?>

<?php include_once "includes/head.php";?>
<style>
.table>:not(caption)>*>* {
    padding: .7rem .5rem;

}

.table-align th {
    text-align: center;
    vertical-align: center;

}

#deptOf1 {
    display: none;
}

#deptOf2 {
    display: contents;
}

@media screen and (min-width: 769px) {

    #deptOf1 {
        display: contents;
    }

    #deptOf2 {
        display: none;
    }
}
</style>



<body>

    <?php include_once "includes/header.php";?>

    <!-- Temporary Data -->
    <!-- <br> -->
    <!-- Temporary Data -->

    <div class="profile_style" style="margin-top:40px;">
        <section class="h-100 gradient-custom-2">
            <div class="container py-5 h-100" style="margin-top: 20px ;">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-lg-9 col-xl-12">
                        <?php if ( isset( $update_result ) || isset( $add_result ) ) {
                                    if ( isset( $update_result ) ) {
                                        if ( $update_result == "successful" ) {
                                            $s_mgs = "SUCCESSFULLY UPDATED";
                                            include 'admin/include/success_modal.php';

                                        } else {
                                            include 'admin/include/error_modal.php';
                                        }
                                    } else {
                                        if ( $add_result == "successful" ) {
                                            $s_mgs = "SUCCESSFULLY ADDED";
                                            include 'admin/include/success_modal.php';

                                        } else {
                                            include 'admin/include/error_modal.php';
                                        }
                                    }

                            }?>

                        <div class="card">

                            <!-- <div class="rounded-top text-white d-flex flex-row" style=" -->
                            <div class="rounded-top flex-row" style="

                            background-image: url('<?php echo 'assets/img/dept/' . $info['non_r_dept'] . '.jpg' ?>'), linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));
                                background-repeat: no-repeat;
                                background-size: 100% 100%;
                                height:250px;
                                background-position: center center;
                                background-blend-mode: overlay;
                                ">


                                <div class="d-flex flex-row">
                                    <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;height:250px;">

                                        <div class="change-img" style="z-index:1;margin-top:50px;cursor: pointer;">
                                            <img src="pdf/uploads/<?php echo $info['non_r_img']; ?>"
                                                alt="Image Does not support" class="img-fluid img-thumbnail mt-4 mb-2"
                                                style="width: 150px; height: 170px; z-index: 1">
                                            <div class="d-flex justify-content-end text-center">
                                                <img src="assets/img/camera.png" style="
                                            width: 38px;
                                            height: 38px;
                                            z-index: 2;
                                            background-color:#D8DADF;
                                            padding:8px;
                                            border-radius:50%;
                                            margin-top:-3rem;
                                            " />
                                            </div>
                                        </div>

                                        <!-- <button class="btn btn-dark">Change Image</button> -->


                                        <!-- <button type="button" class="btn btn-outline-dark "
                                            style="z-index:1;font-size:13px;padding:5px 8px;">Change
                                            Image</button> -->
                                        <!-- action="" method="post"
                                            style="margin-top:-30px;z-index: 2; opacity:0;cursor: pointer;"
                                            enctype="multipart/form-data">
                                            <input type="file" name="user_img" id="user_img" accept="image/*" -->

                                        <?php include 'includes/profile_img_edit.php';?>

                                    </div>
                                    <div class="ms-3" style="margin-top: 150px;color:#ffffff">
                                        <h6 style="text-transform:uppercase;text-align:left">
                                            <?php echo $info['non_r_name']; ?>
                                        </h6>
                                        <p style="margin-bottom: 3px;"><b>Roll:
                                            </b><?php echo $info['non_r_roll']; ?>
                                        </p>
                                        <p style=""><b>Reg No: </b><?php echo $info['non_r_reg']; ?></p>

                                    </div>
                                </div>
                            </div>
                            <div class="p-4 text-black" style="background-color: #f8f9fa;">
                                <div class="d-flex justify-content-end text-center py-1">
                                    <div id="deptOf1">
                                        <h5 class="text-muted mb-0"> <b>Name of the
                                                Department:</b>
                                            (<?php echo $info['non_r_dept']; ?>) </h5>
                                    </div>

                                </div>



                            </div>
                            <div class="card-body p-4 text-black">
                                <div class="mb-5">
                                    <br>
                                    <h4>About</h4>
                                    <div class="p-4" style="background-color: #f8f9fa;">
                                        <table class="table " id="about_info">
                                            <thead>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th colspan=1>
                                                        <p class="font-italic mb-1"><b>Session </b>
                                                    </th>
                                                    <td colspan=5><b>:
                                                            &nbsp;</b><?php echo $info['non_r_session'] . " - " . $info['non_r_session'] + 1; ?>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr id="deptOf2">
                                                    <th colspan=1>
                                                        <p class="font-italic mb-1"><b>Dept. Of </b>
                                                    </th>
                                                    <td colspan=5><b>: &nbsp;</b>
                                                        <?php echo $info['non_r_dept']; ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th colspan=1>
                                                        <p class="font-italic mb-1"><b>Date of Birth </b>
                                                    </th>
                                                    <td colspan=5><b>: &nbsp;</b><?php echo $info['non_r_birth']; ?></p>
                                                    </td>
                                                </tr>
                                                <?php
                                                    if ( $info['non_r_rm'] != 0 ) {
                                                        ?>
                                                <tr>
                                                    <th colspan=1>
                                                        <p class="font-italic mb-1"><b>Room No </b>
                                                    </th>
                                                    <td colspan=5><b>: &nbsp;</b>
                                                        <?php echo $info['non_r_rm']; ?></p>
                                                    </td>
                                                </tr>
                                                <?php
                                                    }
                                                    ?>

                                                <tr>
                                                    <th colspan=1>
                                                        <p class="font-italic mb-1"><b>Hall ID </b>
                                                    </th>
                                                    <?php if ( $info['non_r_status'] == 'Residential' ) {?>
                                                    <td colspan=5><b>: &nbsp;</b>
                                                        <?php echo $info['non_r_hall_id']; ?></p>
                                                    </td>
                                                    <?php
                                                    } else {?>
                                                    <td colspan=5><b>: &nbsp;</b>
                                                        <?php echo "None" ?></p>
                                                    </td>
                                                    <?php
                                                        }
                                                        ?>
                                                </tr>

                                                <tr>
                                                    <th colspan=1>
                                                        <p class="font-italic mb-1"><b>Email </b>
                                                    </th>
                                                    <td colspan=5><b>: &nbsp;</b>
                                                        <?php echo $info['non_r_email']; ?>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th colspan=1>
                                                        <p class="font-italic mb-1"><b>Mobile No </b>
                                                    </th>
                                                    <td colspan=5><b>: &nbsp;</b> <?php echo $info['non_r_mob']; ?>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th colspan=1>
                                                        <p class="font-italic mb-1"><b>Father's name </b>
                                                    </th>
                                                    <td colspan=5><b>: &nbsp;</b><?php echo $info['non_r_fname']; ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th colspan=1>
                                                        <p class="font-italic mb-1"><b>Mother's name </b>
                                                    </th>
                                                    <td colspan=5><b>: &nbsp;</b><?php echo $info['non_r_mname']; ?>
                                                        </p>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th colspan=1>
                                                        <p class="font-italic mb-0"><b>Present Address </b>
                                                    </th>
                                                    <td colspan=5><b>: &nbsp;</b>
                                                        <?php echo $info['non_r_pre_address']; ?>
                                                        <span class="change-address">
                                                            <i class="fas fa-edit icon ">
                                                            </i>
                                                        </span></p>
                                                        <?php include 'includes/cng_address.php';?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th colspan=1>
                                                        <p class="font-italic mb-0"><b>Permanent Address </b>
                                                    </th>
                                                    <td colspan=5><b>: &nbsp;</b>
                                                        <?php echo $info['non_r_per_address']; ?>

                                                        </p>
                                                    </td>
                                                </tr>
                                            </tbody>

                                        </table>
                                    </div>

                                    <!-- ############################### Dining System ###################################  -->
                                    <br>
                                    <br>
                                    <h4>Tomorrow's Dining Meal Info</h4>
                                    <div class="p-4" style="background-color: #f8f9fa;overflow-x: auto; padding: 10px;">
                                        <table class="table table-bordered table-align">
                                            <thead>
                                                <th>Block</th>
                                                <th>Breakfast</th>
                                                <th>Lunch</th>
                                                <th>Dinner</th>
                                                <th>Remaining Time</th>
                                                <th>Edit</th>
                                                <th>Action</th>
                                            </thead>
                                            <tbody>
                                                <!-- Block A  -->
                                                <tr>
                                                    <th>A</th>
                                                    <?php if ( isset( $meal_info ) ) {?>
                                                    <td><?php echo $meal_info['morning_meal']; ?></td>
                                                    <td><?php echo $meal_info['lunch']; ?></td>
                                                    <td><?php echo $meal_info['dinner']; ?></td>
                                                    <?php } else {?>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <?php }?>
                                                    <td rowspan="2" id="remaining-time"></td>
                                                    <td><span class="btn  btn-sm btn-warning update-meal"
                                                            style="padding:5px 12px;font-size:12px;">Edit</span></td>
                                                    <td><span class="btn btn-sm btn-primary add-meal"
                                                            style="padding:5px 14px;font-size:12px;">Add</span></td>
                                                    <?php include 'includes/add_meal.php';?>
                                                    <?php include 'includes/update_meal.php';?>
                                                </tr>
                                                <!-- Block B  -->
                                                <tr>
                                                    <th>B</th>
                                                    <?php if ( isset( $b_meal_info ) ) {?>
                                                    <td><?php echo $b_meal_info['morning_meal']; ?></td>
                                                    <td><?php echo $b_meal_info['lunch']; ?></td>
                                                    <td><?php echo $b_meal_info['dinner']; ?></td>
                                                    <?php } else {?>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <?php }?>


                                                    <td><span class="btn  btn-sm btn-warning b-update-meal"
                                                            style="padding:5px 12px;font-size:12px;">Edit</span></td>
                                                    <td><span class="btn btn-sm btn-primary b-add-meal"
                                                            style="padding:5px 14px;font-size:12px;">Add</span></td>
                                                    <?php include 'includes/b_add_meal.php';?>
                                                    <?php include 'includes/b_update_meal.php';?>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- ############################### Dining System ###################################  -->


                                    <?php
                                        if ( $info['non_r_status'] == "Residential" ) {
                                            ?>
                                    <br>
                                    <br>
                                    <h4>Payment Status</h4>
                                    <div class="p-4" style="background-color: #f8f9fa;overflow-x: auto; padding: 10px;">
                                        <table class="table table-align">
                                            <thead>
                                                <th
                                                    style="border-left: 1px solid #dee2e6;border-top: 1px solid #dee2e6;">
                                                    YEAR
                                                </th>
                                                <th style="border-top: 1px solid #dee2e6;"><b>JAN</b></th>
                                                <th style="border-top: 1px solid #dee2e6;">FEB</th>
                                                <th style="border-top: 1px solid #dee2e6;">MAR</th>
                                                <th style="border-top: 1px solid #dee2e6;">APR</th>
                                                <th style="border-top: 1px solid #dee2e6;">MAY</th>
                                                <th style="border-top: 1px solid #dee2e6;">JUN</th>
                                                <th style="border-top: 1px solid #dee2e6;">JUL</th>
                                                <th style="border-top: 1px solid #dee2e6;">AUG</th>
                                                <th style="border-top: 1px solid #dee2e6;">SEP</th>
                                                <th style="border-top: 1px solid #dee2e6;">OCT</th>
                                                <th style="border-top: 1px solid #dee2e6;">NOV</th>
                                                <th
                                                    style="border-right: 1px solid #dee2e6;border-top: 1px solid #dee2e6;">
                                                    DEC
                                                </th>
                                            </thead>
                                            <tfoot>
                                                <th style="border-left: 1px solid #dee2e6;">YEAR</th>
                                                <th>JAN</th>
                                                <th>FEB</th>
                                                <th>MAR</th>
                                                <th>APR</th>
                                                <th>MAY</th>
                                                <th>JUN</th>
                                                <th>JUL</th>
                                                <th>AUG</th>
                                                <th>SEP</th>
                                                <th>OCT</th>
                                                <th>NOV</th>
                                                <th style="border-right: 1px solid #dee2e6;">DEC</th>
                                            </tfoot>
                                            <tbody>
                                                <?php
                                                    $payment_infos = $obj1->r_unique_info( $_SESSION['user_roll'] );
                                                            $r_months      = array( " ", "r_jan", "r_feb", "r_mar", "r_apr", "r_may", "r_jun", "r_jul", "r_aug", "r_sep", "r_oct", "r_nov", "r_dec" );
                                                            while ( $payment = mysqli_fetch_assoc( $payment_infos ) ) {
                                                            ?>
                                                <tr>
                                                    <th style="border-left: 1px solid #dee2e6;">
                                                        <?php echo $payment['r_year']; ?></th>

                                                    <?php for ( $i = 1; $i <= 12; $i++ ) {
                                                                        $m = $r_months[$i];
                                                                    if ( $payment[$m] == "Paid" ) {?>
                                                    <td style="font-size:13px;"><span
                                                            style="font-size:14px;color:green;">&#10004;</span>Paid
                                                    </td>
                                                    <?php } else {?>
                                                    <td
                                                        style="font-size:13px;<?php if ( $i == 12 ) {echo 'border-right: 1px solid #dee2e6;';}?>">
                                                        <span style="font-size:9px;">&#x274C;</span>
                                                        Unpaid
                                                    </td>
                                                    <?php }?><?php }?>
                                                </tr>


                                                <?php

                                                            }
                                                        ?>
                                            </tbody>
                                        </table>
                                    </div>


                                    <?php

                                            }
                                        ?>
                                    <br><br>
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <div class="d-flex justify-content-end text-center"
                                            style="margin-bottom:-40px;">


                                            <input class="btn btn-warning user-logout"
                                                style="width:100px;font-size:14px; padding:8px 12px;text-transform:none;font-family:times new romans "
                                                name="user_log_out_btn" type="submit" value="Log Out"></input>
                                        </div>


                                    </form>
                                </div>


                                <!-- ############ PDF START ##############  -->
                                <div style="margin-top:-90px;margin-right:120px;">
                                    <form action="pdf/r_info_pdf.php" method="post">
                                        <div class="d-flex justify-content-end text-center">
                                            <input type="hidden" value="<?php echo $_SESSION['user_roll'] ?>"
                                                name="rpdfinfo">
                                            <input type="submit" name="rpdf" value="Download" class="btn btn-info"
                                                style="width:100px;font-size:14px; padding:8px 12px;text-transform:none;font-family:times new romans "></input>
                                        </div>
                                    </form>
                                </div>
                                <!-- ############ PDF END ##############  -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </div>
    </section>


    </div>







    <!-- footer -->
    <?php include_once "includes/footer.php";?>

    <!-- Footer -->

    <?php include_once 'includes/script.php';?>
</body>

</html>
<script>
// Set the date we're counting down to
var countDownDate = new Date("2030 24:00:00").getTime();



// Update the count down every 1 second
var x = setInterval(function() {

    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Output the result in an element with id="remaining-time"
    document.getElementById("remaining-time").innerHTML = hours + "h " +
        minutes + "m " + seconds + "s ";

    // If the count down is over, write some text

    if (distance < 0) {
        clearInterval(x);
        document.getElementById("remaining-time").innerHTML = "EXPIRED";
    }
}, 1000);
</script>
<?php
}
?>