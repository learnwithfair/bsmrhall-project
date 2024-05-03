<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css" rel="stylesheet" />
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

#border-color td {
    border: 1px solid #dee2e6;
    ;
}

#border-color th {
    border: 2px solid #dee2e6;

}

.table>:not(caption)>*>* {
    padding: .5rem .9rem;

}
</style>

<?php
    if ( isset( $_POST['add_year'] ) ) {
        $result_year_status = $obj->r_add_year();
    }
    if ( isset( $_POST['r_roll_query_show'] ) ) {
        $varify_status = $obj->search_r_query( $_POST );

    }
    if ( isset( $_POST['r_roll_reset'] ) ) {
        unset( $_SESSION['r_roll'] );
        unset( $_SESSION['receipt_num'] );
        unset( $_SESSION['book_num'] );

    }
    if ( isset( $_POST['receipt_verify'] ) ) {
        $varify = $obj->receipt_query( $_POST );

    }

    if ( isset( $_POST['r_paid'] ) ) {
        $result_paid_status = $obj->r_paid_status( $_POST );

    }

?>

<br>
<div class="card mb-4" style="border:2px solid #dee2e6;">
    <div class="card-header"
        style="background-color: rgba(0, 0, 0, 0.03);border-bottom: 1px solid rgba(0, 0, 0, 0.125); ">


        <h4 style="padding-top:10px;padding-bottom:10px;">
            <i class="fas fa-table mr-1"></i> Payment Status:
        </h4>
        <?php if ( isset( $result_paid_status ) ) {
                if ( $result_paid_status == "successful" ) {
                    $s_mgs = "SUCCESSFULLY PAID";
                    include './include/success_modal.php';

                } else {
                    include './include/error_modal.php';
                }
        }?>
        <?php if ( isset( $result_year_status ) ) {
        if ( $result_year_status == "successful" ) {
            $s_mgs = "SUCCESSFULLY ADDED";
            include './include/success_modal.php';

        } else {
            include './include/error_modal.php';
        }
}?>

        <div></div>
        <div class="position_receipt_query">
            <form action="" method="post">
                <div class="row mb-4">
                    <div class="col-8">
                        <div class="form-outline">
                            <input type="number" class="form-control" name="search_r_roll" id="form4Example1"
                                style="text-align:center;"
                                value="<?php if ( isset( $_SESSION['r_roll'] ) ) {echo $_SESSION['r_roll'];}?>"
                                required />
                            <label class="form-label" for="form4Example1"><b style="color:red;">*</b> Roll
                                Number</label>
                        </div>
                    </div>
                    <div class="col" style="margin-right:50px;">
                        <div class="form-outline">
                            <input type="submit" value="Search" name="r_roll_query_show" class="btn btn-dark">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <input type="submit" value="Reset" name="r_roll_reset" class="btn btn-danger">
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <div class="card-body" style="padding:10px">
        <?php
            if ( isset( $_SESSION['r_roll'] ) ) {
                $r_data = $obj->residential_info_by_roll( $_SESSION['r_roll'] );
            ?>
        <!-- Roll Info -->
        <div style="border:2px solid #dee2e6;padding:10px">
            <div class="table-responsive">
                <table class="table table-bordered vertical_align" id="border-color" width="100%" cellspacing="0">
                    <thead>
                        <tr>

                            <th>Name</th>
                            <th>Roll No</th>
                            <th>Reg No</th>
                            <th>Session</th>
                            <th>Department</th>
                            <th>Room</th>
                            <th>Contacts</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Roll No</th>
                            <th>Reg No</th>
                            <th>Session</th>
                            <th>Department</th>
                            <th>Room</th>
                            <th>Contacts</th>
                            <th>Image</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php while ( $info = mysqli_fetch_assoc( $r_data ) ) {
                                ?>
                        <tr>
                            <form action="" method="post">
                                <td><?php echo $info['non_r_name']; ?></td>
                                <td><?php echo $info['non_r_roll']; ?></td>
                                <td><?php echo $info['non_r_reg']; ?></td>
                                <td><?php echo $info['non_r_session'] . " - " . ( $info['non_r_session'] + 1 ); ?></td>
                                <td><?php echo $info['non_r_dept']; ?></td>
                                <td><?php echo $info['non_r_rm']; ?></td>
                                <td style="text-align:left;">
                                    <b>Hall ID: </b><i><?php echo $info['non_r_hall_id']; ?></i>
                                    <br>
                                    <b>Mobile: </b><i><a
                                            href="tel:<?php echo $info['non_r_mob']; ?>"><?php echo $info['non_r_mob']; ?></a></i>
                                    <br>
                                    <b>Email: </b><i><a
                                            href="mailto:<?php echo $info['non_r_email']; ?>"><?php echo $info['non_r_email']; ?></a></i>
                                </td>
                                <td><img src="../pdf/uploads/<?php echo $info['non_r_img']; ?>" height="80px"
                                        width="70px" alt="Not Found">
                                    </br><input style="margin-top:10px;padding:5px 10px;text-transform:none"
                                        type="submit" value="Add One Year" name="add_year" class="btn btn-dark">
                                </td>
                            </form>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
            <br>
            <form action="" method="post">
                <div class="row mb-4">
                    <div class="col">
                        <div class="form-outline">
                            <input type="number" id="form4Example1" class="form-control" name="book_num"
                                value="<?php if ( isset( $_SESSION['book_num'] ) ) {echo $_SESSION['book_num'];} elseif ( isset( $varify ) ) {echo $varify[0];}?>"
                                required />
                            <label class="form-label" for="form4Example1"><b style="color:red;">*</b> Book
                                Number</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <input type="number" id="form4Example1" class="form-control" name="receipt_num"
                                value="<?php if ( isset( $_SESSION['receipt_num'] ) ) {echo $_SESSION['receipt_num'];} elseif ( isset( $varify ) ) {echo $varify[1];}?>"
                                required />
                            <label class="form-label" for="form4Example1"><b style="color:red;">*</b> Receipt
                                Number</label>
                        </div>
                    </div>
                    <?php if ( isset( $varify ) ) {
                                if ( isset( $_SESSION['receipt_num'] ) ) {

                                } else {
                                    include './include/error_modal.php';
                                }
                        }?>
                    <?php if ( isset( $_SESSION['receipt_num'] ) ) {?>
                    <div class="col-2" style="margin-right:-55px">
                        <div class="form-outline">
                            <input type="submit" value="Verified" name="receipt_verify" class="btn btn-success">
                        </div>
                    </div>
                    <?php } else {?>
                    <div class="col-2" style="margin-right:-65px">
                        <div class="form-outline">
                            <input type="submit" value="Verify" name="receipt_verify" class="btn btn-warning">
                        </div>
                    </div>
                    <?php }?>
                </div>
            </form>
        </div>
        <br>

        <!-- Receipt Info -->
        <?php if ( isset( $_SESSION['receipt_num'] ) ) {?>
        <?php

            $r_year_data        = $obj->r_unique_info( $_SESSION['r_roll'] );
            $r_year             = mysqli_fetch_assoc( $r_year_data );
            $r_year_num         = mysqli_num_rows( $r_year_data );
            $year               = $r_year['r_start'];
            $r_addminssion_year = $r_year['r_addminssion_year'];

        ?>
        <div style="border:2px solid #dee2e6;padding:10px">
            <br>
            <h4 style="width:100%;text-align:center;">Payment Info</h4>
            <br>
            <form action="" method="post">
                <div class="row mb-4">

                    <div class="col">
                        <select class="form-select py4" name="p_month" required>
                            <option selected disabled value=""><b style="color:red;">*</b> Select Month</option>
                            <?php for ( $i = 1; $i < 13; $i++ ) {?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="col">
                        <select class="form-select py4" name="p_year" required>
                            <option selected disabled value=""><b style="color:red;">*</b> Select Year</option>
                            <?php for ( $i = 1; $i <= $r_year_num; $i++ ) {
                                            $year++;
                                            // if ( $r_addminssion_year > $year ) {
                                            //     // continue;
                                            // } else {
                                        ?>
                            <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                            <?php //}?>

                            <?php }?>
                        </select>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <input type="number" id="form4Example1" class="form-control" name="p_amount" required />
                            <label class="form-label" for="form4Example1"><b style="color:red;">*</b> Amount</label>
                        </div>
                    </div>

                    <div class="col-1" style="margin-right:15px;">
                        <div class="form-outline">
                            <input type="submit" value="  Pay  " name="r_paid" class="btn btn-warning">
                        </div>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered vertical_align r_info_td_align" id="border-color" width="100%"
                    cellspacing="0">
                    <thead>
                        <tr>
                            <th>YEAR</th>
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
                            <th>DEC</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <th>YEAR</th>
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
                        <th>DEC</th>
                    </tfoot>
                    <tbody>
                        <?php
                            $r_unique_data = $obj->r_unique_info( $_SESSION['r_roll'] );
                                    $r_months      = array( " ", "r_jan", "r_feb", "r_mar", "r_apr", "r_may", "r_jun", "r_jul", "r_aug", "r_sep", "r_oct", "r_nov", "r_dec" );
                                    while ( $unique_info = mysqli_fetch_assoc( $r_unique_data ) ) {

                                    ?>
                        <tr>
                            <th><?php echo $unique_info['r_year']; ?></th>

                            <?php for ( $i = 1; $i < 13; $i++ ) {
                                                $m = $r_months[$i];
                                                if ( $unique_info[$m] == "Paid" ) {
                                                ?>
                            <td style="background-color:green;"><span
                                    style="font-size:20px;color:white;">&#10004;</span></td>
                            <?php } else {?>
                            <td style="background-color:red;"><span style="font-size:20px;color:white;">X</span>

                            </td>
                            <?php }?>
                            <?php }?>
                        </tr>

                        <?php
                            // $payment_count = array( $unique_info['r_id'], $check_paid );
                                        //             $obj->u_r_paid_status( $payment_count );
                                }?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php } elseif ( isset( $varify ) ) {

                    echo "<h4 style = 'color:red; text-align:center; margin:25%;'>Receipt Number is Invalid!!</h4>";

            }?>

        <?php } else {
                if ( isset( $varify_status ) ) {
                    echo "<h4 style = 'color:red; text-align:center; margin:25%;'>" . $varify_status . " is not a Residential!!</h4>";

                } else {

                    echo "<h4 style = 'color:red; text-align:center; margin:25%;'>No Data Available</h4>";

                }

        }?>

    </div>

</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js">
</script>
<script src="js/script.js"></script>