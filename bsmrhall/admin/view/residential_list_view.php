<?php

    if ( isset( $_POST['deletedata'] ) ) {
        $dlt_id  = $_POST['delete_id'];
        $dlt_mgs = $obj->r_delete( $dlt_id );
    }

    $non_r_info = $obj->display_residential_info();
?>
<!-- DELETE POP UP FORM (Bootstrap MODAL) -->
<?php include "./include/delete_modal.php";?>
<br>
<div class="card mb-4">
    <div class="card-header">
        <h4>
            <i class="fas fa-table mr-1"></i> Rasidential Student's List:
        </h4>
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
                        <th scope="col">Action</th>
                        <?php }?>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $count = 1;while ( $info = mysqli_fetch_assoc( $non_r_info ) ) {?>
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
                            <b>Room No: </b><?php echo $info['non_r_rm']; ?>
                            <br>
                            <b>Hall ID: </b><?php echo $info['non_r_hall_id']; ?>
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
                                alt="Not Found"></td>

                        <?php if ( $_SESSION['admin_status'] == "Provost" || $_SESSION['admin_status'] == "Assistant Provost" ) {?>
                        <td method='post'>
                            <a href="residential_update.php?status=r_update&&id=<?php echo $info['non_r_id']; ?>"
                                class="btn btn-warning" name="r_update_btn"
                                style="text-transform: none;padding-right:20px;padding-left:20px;">Edit</a>
                            <div></div><br>
                            <button type="button" class="btn btn-danger deletebtn"> Delete </button>
                        </td>
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
            [1, 'asc']
        ]
    });
});
</script>