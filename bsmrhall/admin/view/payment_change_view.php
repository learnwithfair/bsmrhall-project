<?php if ( $_SESSION['admin_status'] == "Provost" || $_SESSION['admin_status'] == "Assistant Provost" ) {?>
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

        if ( isset( $_POST['c_r_roll_query_show'] ) ) {
            $varify_status = $obj->c_search_r_query( $_POST );

        }
        if ( isset( $_POST['c_r_roll_reset'] ) ) {
            unset( $_SESSION['c_r_roll'] );
            unset( $_SESSION['c_receipt_num'] );
            unset( $_SESSION['c_book_num'] );
            unset( $_SESSION['c_ph_amount'] );

        }
        if ( isset( $_POST['c_receipt_verify'] ) ) {
            $varify = $obj->c_receipt_query( $_POST );

        }

        if ( isset( $_POST['paid_change_btn'] ) ) {
            $result_paid_status = $obj->r_payment_change( $_POST );

        }

    ?>

<br>
<div class="card mb-4" style="border:2px solid #dee2e6;">
    <div class="card-header"
        style="background-color: rgba(0, 0, 0, 0.03);border-bottom: 1px solid rgba(0, 0, 0, 0.125); ">


        <h4 style="padding-top:10px;padding-bottom:10px;">
            <i class="fas fa-table mr-1"></i> Payment Change:
        </h4>
        <?php if ( isset( $result_paid_status ) ) {
                    if ( $result_paid_status == "successful" ) {
                        $s_mgs = "SUCCESSFULLY CHANGED";
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
                                value="<?php if ( isset( $_SESSION['c_r_roll'] ) ) {echo $_SESSION['c_r_roll'];}?>"
                                required />
                            <label class="form-label" for="form4Example1">Roll Number</label>
                        </div>
                    </div>
                    <div class="col" style="margin-right:50px;">
                        <div class="form-outline">
                            <input type="submit" value="Search" name="c_r_roll_query_show" class="btn btn-dark">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <input type="submit" value="Reset" name="c_r_roll_reset" class="btn btn-danger">
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <div class="card-body" style="padding:10px">
        <?php
            if ( isset( $_SESSION['c_r_roll'] ) ) {
                    $r_data = $obj->residential_info_by_roll( $_SESSION['c_r_roll'] );
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
                                value="<?php if ( isset( $_SESSION['c_book_num'] ) ) {echo $_SESSION['c_book_num'];} elseif ( isset( $varify ) ) {echo $varify[0];}?>"
                                required />
                            <label class="form-label" for="form4Example1">Book Number</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <input type="number" id="form4Example1" class="form-control" name="receipt_num"
                                value="<?php if ( isset( $_SESSION['c_receipt_num'] ) ) {echo $_SESSION['c_receipt_num'];} elseif ( isset( $varify ) ) {echo $varify[1];}?>"
                                required />
                            <label class="form-label" for="form4Example1">Receipt Number</label>
                        </div>
                    </div>
                    <?php if ( isset( $varify ) ) {
                                    if ( isset( $_SESSION['c_receipt_num'] ) ) {

                                    } else {
                                        include './include/error_modal.php';
                                    }
                            }?>
<?php if ( isset( $_SESSION['c_receipt_num'] ) ) {?>
                    <div class="col-2" style="margin-right:-55px">
                        <div class="form-outline">
                            <input type="submit" value="Verified" name="c_receipt_verify" class="btn btn-success">
                        </div>
                    </div>
                    <?php } else {?>
                    <div class="col-2" style="margin-right:-65px">
                        <div class="form-outline">
                            <input type="submit" value="Verify" name="c_receipt_verify" class="btn btn-warning">
                        </div>
                    </div>
                    <?php }?>
                </div>
            </form>
        </div>
        <br>

        <!-- Receipt Info -->
        <?php if ( isset( $_SESSION['c_receipt_num'] ) ) {?>
<?php

                $r_year_data = $obj->r_unique_info( $_SESSION['c_r_roll'] );
                $r_year      = mysqli_fetch_assoc( $r_year_data );
                $r_year_num  = mysqli_num_rows( $r_year_data );
                $year        = $r_year['r_start'];
            ?>
        <div style="border:2px solid #dee2e6;padding:10px">
            <br>
            <h4 style="width:100%;text-align:center;">Payment Info</h4>
            <br>
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
                            <th>Action</th>
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
                        <th>Action</th>
                    </tfoot>
                    <tbody>
                        <?php
                            $r_unique_data = $obj->r_unique_info( $_SESSION['c_r_roll'] );
                                        $r_months      = array( " ", "r_jan", "r_feb", "r_mar", "r_apr", "r_may", "r_jun", "r_jul", "r_aug", "r_sep", "r_oct", "r_nov", "r_dec" );
                                        while ( $unique_info = mysqli_fetch_assoc( $r_unique_data ) ) {
                                            $check_paid = 0;
                                        ?>
                        <form action="" method="post">
                            <tr>
                                <th>
                                    <?php echo $unique_info['r_year']; ?>
                                    <input type="hidden" value="<?php echo $unique_info['r_id']; ?>" name="u_r_id">
                                </th>

                                <?php for ( $i = 1; $i <= 12; $i++ ) {
                                                        $m = $r_months[$i];
                                                        if ( $unique_info[$m] == "Unpaid" ) {
                                                        $check_paid++;?>
                                <td style="background-color:red;">
                                    <span style="font-size:20px;color:white;">X</span>
                                    <input type="hidden" value='P' name="<?php echo $r_months[$i]; ?>">
                                </td>
                                <?php } else {?>
                                <td style="background-color:green;">
                                    <input class="checkbox_size" type="checkbox" value='Unpaid'
                                        name="<?php echo $r_months[$i]; ?>">
                                </td>
                                <?php }?>

                                <?php }?>
<?php if ( $check_paid == 12 ) {?>
                                <td>
                                    <input type="submit" class="btn btn-warning" name="paid_change_btn" value="Change"
                                        disabled></input>
                                </td>

                                <?php } else {?>
                                <td>
                                    <input type="submit" class="btn btn-warning" name="paid_change_btn"
                                        value="Change"></input>
                                </td>
                                <?php
                                }?>
                            </tr>
                        </form>
                        <?php }?>
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
<?php }?>