<?php
    if ( isset( $_POST['deletedata'] ) ) {
        $dlt_id  = $_POST['delete_id'];
        $dlt_mgs = $obj->mgs_dlt( $dlt_id );
    }
    $message_data = $obj->display_message();
?>
<!-- DELETE POP UP FORM (Bootstrap MODAL) -->
<?php include "./include/delete_modal.php";?>
<br>
<div class="card mb-4">
    <div class="card-header">
        <h4>

            <i class="fas fa-table mr-1"></i> Manage Complain:
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
                        <th scope="col">Roll</th>
                        <th scope="col">Reg No</th>
                        <th scope="col">Hall ID</th>
                        <?php if ( $_SESSION['admin_status'] == "Provost" || $_SESSION['admin_status'] == "Assistant Provost" ) {?>
                        <th scope="col">Email</th>
                        <?php }?>

                        <th scope="col">Subject</th>
                        <th scope="col">Message</th>
                        <th scope="col">Date</th>
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
                        <th scope="col">Roll</th>
                        <th scope="col">Reg No</th>
                        <th scope="col">Hall ID</th>
                        <?php if ( $_SESSION['admin_status'] == "Provost" || $_SESSION['admin_status'] == "Assistant Provost" ) {?>
                        <th scope="col">Email</th>
                        <?php }?>
                        <th scope="col">Subject</th>
                        <th scope="col">Message</th>
                        <th scope="col">Date</th>
                        <?php if ( $_SESSION['admin_status'] == "Provost" || $_SESSION['admin_status'] == "Assistant Provost" ) {?>
                        <th scope="col">Action</th>
                        <?php }?>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $count = 1;while ( $info = mysqli_fetch_assoc( $message_data ) ) {?>
                    <tr>
                        <td style="display:none;">
                            <?php echo $info['message_id']; ?>
                        </td>
                        <td><?php echo $count++; ?></td>
                        <td><?php echo $info['message_name']; ?></td>
                        <td><?php echo $info['message_roll']; ?></td>
                        <td><?php echo $info['message_reg']; ?></td>
                        <td><?php
                                if ( $info['message_hall_id'] == 0 ) {
                                    echo "None";
                                } else {
                                    echo $info['message_hall_id'];
                                }

                                ?>
                        </td>
                        <?php if ( $_SESSION['admin_status'] == "Provost" || $_SESSION['admin_status'] == "Assistant Provost" ) {?>
                        <td><a
                                href="mailto:<?php echo $info['message_email']; ?>"><?php echo $info['message_email']; ?></a>
                        </td>
                        <?php }?>
                        <td style="text-align:left;white-space: normal;"><?php echo $info['message_subject']; ?></td>
                        <td style="text-align:justify;white-space: normal;"><?php echo $info['message_content']; ?></td>
                        <td><?php echo $info['message_date']; ?></td>

                        <?php if ( $_SESSION['admin_status'] == "Provost" || $_SESSION['admin_status'] == "Assistant Provost" ) {?>

                        <td><button type="button" class="btn btn-danger deletebtn"> Delete </button></td>
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
            [8, 'asc']
        ]
    });
});
</script>