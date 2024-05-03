<?php

    if ( isset( $_POST['non_r_approve_btn'] ) ) {
        $approve_mgs = $obj->non_r_approve( $_POST );
    }
    if ( isset( $_POST['non_r_temp_approve_btn'] ) ) {
        $approve_mgs = $obj->non_r_temp_approve( $_POST );
    }
    if ( isset( $_POST['deletedata'] ) ) {
        $dlt_id  = $_POST['delete_id'];
        $dlt_mgs = $obj->non_r_delete( $dlt_id );
    }

    $non_r_info = $obj->non_residential_info();
?>
<!-- DELETE POP UP FORM (Bootstrap MODAL) -->
<?php include "./include/delete_modal.php";?>
<br>
<div class="card mb-4">
    <div class="card-header">
        <h4>
            <i class="fas fa-table mr-1"></i> New Applicants:
        </h4>
        <?php if ( isset( $approve_mgs ) ) {
                if ( $approve_mgs == "successful" ) {
                    $s_mgs = "SUCCESSFULLY APPROVED";
                    include './include/success_modal.php';

                } else {
                    include './include/error_modal.php';
                }
        }?>
        <?php if ( isset( $dlt_mgs ) ) {
        if ( $dlt_mgs == "successful" ) {
            $s_mgs = "SUCCESSFULLY DELETED";
            include './include/success_modal.php';

        } else {
            include './include/error_modal.php';
        }
}?>

        <div></div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered vertical_align" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col" style="display:none;"></th>
                        <th scope="col">S/N</th>
                        <th scope="col">Name</th>
                        <th scope="col">Roll & Reg No</th>
                        <th scope="col">Description</th>
                        <th scope="col">Address</th>
                        <th scope="col">Image</th>
                        <?php if ( $_SESSION['admin_status'] == "Provost" || $_SESSION['admin_status'] == "Assistant Provost" ) {?>
                        <th scope="col">Payment</th>
                        <th scope="col">Action</th>
                        <?php }?>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th scope="col" style="display:none;"></th>
                        <th scope="col">S/N</th>
                        <th scope="col">Name</th>
                        <th scope="col">Roll & Reg No</th>
                        <th scope="col">Description</th>
                        <th scope="col">Address</th>
                        <th scope="col">Image</th>
                        <?php if ( $_SESSION['admin_status'] == "Provost" || $_SESSION['admin_status'] == "Assistant Provost" ) {?>
                        <th scope="col">Payment</th>
                        <th scope="col">Action</th>
                        <?php }?>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $count = 1;while ( $info = mysqli_fetch_assoc( $non_r_info ) ) {

                            $check_roll    = $info['non_r_roll'];
                            $check_hall_id = $info['non_r_hall_id'];

                            $check_r_info = $obj->check_r_info( $check_roll, $check_hall_id );

                        ?>
                    <tr>
                        <td style="display:none;">
                            <?php echo $info['non_r_id']; ?>
                        </td>
                        <td><?php echo $count++; ?></td>
                        <td style="text-align:left"><?php echo $info['non_r_name']; ?></td>
                        <td style="text-align:left">
                            <b>Roll No: </b><?php echo $info['non_r_roll']; ?>
                            <br>
                            <b>Reg No: </b><?php echo $info['non_r_reg']; ?>
                            <br>
                            <b>Session:
                            </b><?php echo $info['non_r_session'] . " - " . ( $info['non_r_session'] + 1 ); ?>
                            <br>
                            <b>Pass: </b><?php echo $info['non_r_pass']; ?>

                        </td>





                        <td style="text-align:left;white-space: normal;">
                            <b>Room No: </b><?php
                                                if ( $info['non_r_rm'] != 0 ) {
                                                        echo $info['non_r_rm'];
                                                    } else {
                                                        echo "None";
                                                    }
                                                ?>
                            <br>
                            <b>Hall ID: </b><?php
                                                if ( $check_r_info == 1 ) {
                                                        echo $info['non_r_hall_id'];
                                                    } else {
                                                        echo "None";
                                                    }

                                                ?>
                            <br>
                            <b>Dept: </b><?php echo $info['non_r_dept']; ?>
                            <br>
                            <b>Father: </b><?php echo $info['non_r_fname']; ?>
                            <br>
                            <b>Mother: </b><?php echo $info['non_r_mname']; ?>

                        </td>

                        <td style="text-align:left;">
                            <?php
                            if ( $_SESSION['admin_status'] == "Provost" || $_SESSION['admin_status'] == "Assistant Provost" ) {?>
                            <b>Mobile: </b><i><a
                                    href="tel:<?php echo $info['non_r_mob']; ?>"><?php echo $info['non_r_mob']; ?></a></i>
                            <br>
                            <b>Email: </b><i><a
                                    href="mailto:<?php echo $info['non_r_email']; ?>"><?php echo $info['non_r_email']; ?></a></i>
                            <br>
                            <?php }?>
                            <b>Present: </b><i
                                style="white-space: normal;"><?php echo $info['non_r_pre_address']; ?></i>
                            <br>
                            <b>Permanent: </b><i
                                style="white-space: normal;"><?php echo $info['non_r_per_address']; ?></i>
                        </td>
                        <td><img src="../pdf/uploads/<?php echo $info['non_r_img']; ?>" height="80px" width="70px"
                                alt="Not Found">
                            <br><br>
                            <b>Date: </b><i><?php echo $info['non_r_start']; ?></i>


                        </td>

                        <?php if ( $_SESSION['admin_status'] == "Provost" || $_SESSION['admin_status'] == "Assistant Provost" ) {?>

                        <?php
                        if ( $check_r_info == 1 ) {?>
                        <form action="" method="post">
                            <td style="width:35px;">
                                <input type="tel" placeholder="* Book-Receipt Number" name="non_r_receipt"
                                    style="padding:7px 0px;text-align:center;font-size:12px;"
                                    pattern="[0-9]{1,}-[0-9]{1,}" title="Example 1001-1243284" required>
                                <br>
                                <br>
                                <input type="number" placeholder="* Enter Amount in Taka" name="non_r_fee"
                                    style="padding:7px 0px;text-align:center;font-size:12px;" required>

                            </td>
                            <td>
                                <input type="hidden" value="<?php echo $info['non_r_id']; ?>" name="non_r_id">
                                <input value="Approve" class="btn  btn-warning" name="non_r_approve_btn"
                                    style="text-transform: none;" type="submit"></input>
                                <div></div><br>
                                <button type="button" class="btn btn-danger deletebtn"
                                    style="padding-left:18px;padding-right:17px;"> Delete </button>
                            </td>
                        </form>
                        <?php } else {?>

                        <form action="" method="post">
                            <td style="width:35px;">
                                <b style="color:red;"> Temporary</b>
                            </td>
                            <td>
                                <input type="hidden" value="<?php echo $info['non_r_id']; ?>" name="non_r_id">
                                <input value="Approve" class="btn  btn-warning" name="non_r_temp_approve_btn"
                                    style="text-transform: none;" type="submit"></input>
                                <div></div><br>
                                <button type="button" class="btn btn-danger deletebtn"
                                    style="padding-left:18px;padding-right:17px;"> Delete </button>
                            </td>
                        </form>

                        <?php }
                                ?>

                        <?php }?>

                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
$(document).ready(function() {
    $('#dataTable').DataTable({
        order: [
            [3, 'asc']
        ]
    });
});
</script>