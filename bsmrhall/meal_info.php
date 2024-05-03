<?php
    include "class/function.php";
    $obj1 = new students_info();
    session_start();
?>
<?php

    if ( !isset( $_SESSION['hall_manager'] ) ) {
        header( "location: hall_dining_manager_login" );
    } else {
        if ( isset( $_POST['manager_logout'] ) ) {

            $obj1->manager_log_out();
        }
    ?>

<?php

        $date1 = date( 'Y-m-d', strtotime( "yesterday" ) );
        $date2 = date( 'Y-m-d', strtotime( "-2 days" ) );
        $date3 = date( 'Y-m-d', strtotime( "-3 days" ) );
        $date4 = date( 'Y-m-d', strtotime( "-4 days" ) );
        $date5 = date( 'Y-m-d', strtotime( "-5 days" ) );
        $date6 = date( 'Y-m-d', strtotime( "-6 days" ) );

        if ( isset( $_POST['dining_meal_show'] ) ) {
            $_SESSION['dining_meal_date'] = $_POST['dining_meal_date'];
        }

        // header( "location:meal_info" );

        if ( isset( $_SESSION['dining_meal_date'] ) ) {
            $dining_data = $obj1->display_all_dining_meal_info( $_SESSION['dining_meal_date'] );
        } else {
            $dining_data = $obj1->display_all_dining_meal_info( $date1 );
        }
    ?>

<?php include_once "includes/head.php"?>
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
    crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>

<style>
.position_receipt_query {

    position: absolute;
    margin-top: -45px;
    justify-content: center;
    display: flex;
    width: 100%;
    align-items: center;
    justify-content: center;

}

.table-align td {
    border: 1px solid #dee2e6;
    ;
}

.table-align th {
    border: 2px solid #dee2e6;


}

.table>:not(caption)>*>* {
    padding: .5rem .9rem;

}
</style>
<style>
.table>:not(caption)>*>* {
    padding: .7rem .5rem;

}

.table-align th {
    text-align: center;
    vertical-align: center;

}
</style>


<body>
    <?php include_once "includes/header.php"?>


    <div class="container" style="margin-top:80px">


        <div class="">



            <br>
            <div class="card mb-4" style="border:2px solid #dee2e6;">
                <div class="card-header"
                    style="background-color: rgba(0, 0, 0, 0.03);border-bottom: 1px solid rgba(0, 0, 0, 0.125); ">


                    <h4 style="padding-top:10px;padding-bottom:10px;">
                        <i class="fas fa-table mr-1"></i> Dining Meal System:
                    </h4>


                </div>
                <div class="card-body" style="padding:10px">
                    <form action="" method="post">
                        <center class="row" style="margin-top:20px;justify-content:center;">

                            <div class="form-group col-md-4 col-sm-12  p-2">
                                <select name="dining_meal_date" id="dining_meal_date" class='form-select' required>
                                    <option selected disabled value=""><b style="color:red;">*</b> Select Date
                                    </option>
                                    <?php if ( isset( $_SESSION['dining_meal_date'] ) ) {?>
                                    <option value="<?php echo $date1; ?>"
                                        <?php if ( $_SESSION['dining_meal_date'] == $date1 ) {?>selected<?php }?>>
                                        <?php echo $date1; ?></option>
                                    <option value="<?php echo $date2; ?>"
                                        <?php if ( $_SESSION['dining_meal_date'] == $date2 ) {?>selected<?php }?>>
                                        <?php echo $date2; ?></option>
                                    <option value="<?php echo $date3; ?>"
                                        <?php if ( $_SESSION['dining_meal_date'] == $date3 ) {?>selected<?php }?>>
                                        <?php echo $date3; ?></option>
                                    <option value="<?php echo $date4; ?>"
                                        <?php if ( $_SESSION['dining_meal_date'] == $date4 ) {?>selected<?php }?>>
                                        <?php echo $date4; ?></option>
                                    <option value="<?php echo $date5; ?>"
                                        <?php if ( $_SESSION['dining_meal_date'] == $date5 ) {?>selected<?php }?>>
                                        <?php echo $date5; ?></option>
                                    <option value="<?php echo $date6; ?>"
                                        <?php if ( $_SESSION['dining_meal_date'] == $date6 ) {?>selected<?php }?>>
                                        <?php echo $date6; ?></option>
                                    <?php } else {?>
                                    <option value="<?php echo $date1; ?>" selected><?php echo $date1; ?></option>
                                    <option value="<?php echo $date2; ?>"><?php echo $date2; ?></option>
                                    <option value="<?php echo $date3; ?>"><?php echo $date3; ?></option>
                                    <option value="<?php echo $date4; ?>"><?php echo $date4; ?></option>
                                    <option value="<?php echo $date5; ?>"><?php echo $date5; ?></option>
                                    <option value="<?php echo $date6; ?>"><?php echo $date6; ?></option>
                                    <?php }?>
                                </select>

                            </div>
                            <div class="form-group col-md-2 col-sm-12 p-2">
                                <input type="submit" class="btn btn-primary form-control" value="Show"
                                    name="dining_meal_show">
                            </div>

                        </center>
                    </form>
                    <!-- Roll Info -->
                    <div style="border:2px solid #dee2e6;padding:10px;margin-top:30px;">
                        <div class="table-responsive">
                            <table class="table table-bordered table-align" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Name</th>
                                        <th>Roll No</th>
                                        <th>Room</th>
                                        <th>Morning Meal</th>
                                        <th>Lunch</th>
                                        <th>Dinner</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Name</th>
                                        <th>Roll No</th>
                                        <th>Room</th>
                                        <th>Morning Meal</th>
                                        <th>Lunch</th>
                                        <th>Dinner</th>
                                        <th>Total</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php $count = 1;while ( $info = mysqli_fetch_assoc( $dining_data ) ) {?>
                                    <tr>
                                        <td><?php echo $count++; ?></td>
                                        <td><?php echo $info['meal_name']; ?></td>
                                        <td><?php echo $info['meal_roll']; ?></td>
                                        <td><?php echo $info['meal_room']; ?></td>

                                        <td><?php echo $info['morning_meal']; ?></td>
                                        <td><?php echo $info['lunch']; ?></td>
                                        <td><?php echo $info['dinner']; ?></td>
                                        <td><?php echo $info['meal_total']; ?></td>


                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>


                    </div>
                    <br>

                    <div class="d-flex justify-content-end text-center" style="margin-bottom:-40px;">

                        <div style="margin:20px;">
                            <form action="" method="post">
                                <div class="d-flex justify-content-end text-center">
                                    <input type="submit" name="manager_logout" value="Logout" class="btn btn-warning"
                                        style="text-transform:none;font-size:14px;padding:9px 35px;"></input>
                                </div>
                            </form>
                        </div>


                        <!-- ############ PDF START ##############  -->


                        <div style="margin:20px;">
                            <form action="pdf/dyning_r_pdf.php" method="post">
                                <div class="d-flex justify-content-end text-center">
                                    <input type="hidden"
                                        value="<?php if ( isset( $_SESSION['dining_meal_date'] ) ) {echo $_SESSION['dining_meal_date'];} else {echo $date1;}?>"
                                        name="pdf_dining_meal_date">
                                    <input type="submit" name="rpdf" value="Download" class="btn btn-info"
                                        style="text-transform:none;font-size:14px;"></input>
                                </div>
                            </form>
                        </div>
                        <!-- ############ PDF END ##############  -->
                    </div>
                    <br>






                </div>

            </div>

        </div>
    </div>

    <!-- footer -->
    <?php include_once "includes/footer.php"?>
    <!-- Footer -->


    <?php include_once 'includes/script.php';?>
</body>

</html>

<script src=" https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script>
// Call the dataTables jQuery plugin
$(document).ready(function() {
    $('#dataTable').DataTable();
});
</script>
<?php
    }

?>