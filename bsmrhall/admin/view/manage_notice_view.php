<?php

    if ( isset( $_POST['deletedata'] ) ) {
        $dlt_id  = $_POST['delete_id'];
        $dlt_mgs = $obj->notice_dlt( $dlt_id );
    }
    if ( isset( $_POST['updatedata'] ) ) {
        $u_mgs = $obj->notice_update( $_POST );
    }
    $notice_data = $obj->display_notice();
?>

<!-- EDIT POP UP FORM (Bootstrap MODAL) -->
<div class="modal fade" id="neditmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title modal_icon" id="exampleModalLabel"> Update Notice title </h5>

            </div>

            <form action="" method="POST">

                <div class="modal-body">
                    <input type="hidden" name="update_id" id="update_id">

                    <div class="form-group">
                        <label> Notice Title</label>
                        <input type="text" name="n_title" id="n_title" class="form-control"
                            placeholder="Enter Notice Title">

                    </div>
                </div>
                <div class="modal_icon">
                    <button style="margin:0px 10px; padding:6px 15px;" type="button" class="btn btn-secondary"
                        data-dismiss="modal">Cancel</button>
                    <button style="margin:0px 10px" type="submit" name="updatedata"
                        class="btn btn-success">Update</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- DELETE POP UP FORM (Bootstrap MODAL) -->
<?php include "./include/delete_modal.php";?>
<!-- ############################################################################## -->
<br>
<div class="card mb-4">
    <div class="card-header">
        <h4>

            <i class="fas fa-table mr-1"></i> Manage Notice:
        </h4>
        <?php if ( isset( $dlt_mgs ) ) {
                if ( $dlt_mgs == "successful" ) {
                    $s_mgs = "SUCCESSFULLY DELETED";
                    include './include/success_modal.php';

                } else {
                    include './include/error_modal.php';
                }
        }?>
        <?php if ( isset( $u_mgs ) ) {
        if ( $u_mgs == "successful" ) {
            $s_mgs = "SUCCESSFULLY UPDATED";
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
                        <th scope="col">Notice Title</th>
                        <th scope="col">Notice File Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th scope="col" style="display:none;"></th>
                        <th scope="col">S/N</th>
                        <th scope="col">Notice Title</th>
                        <th scope="col">Notice File Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $count = 1;while ( $info = mysqli_fetch_assoc( $notice_data ) ) {?>
                    <tr>
                        <td style="display:none;">
                            <?php echo $info['n_id']; ?>
                        </td>
                        <td><?php echo $count++; ?></td>
                        <td style="white-space: normal;text-align:justify;"><?php echo $info['n_title']; ?></td>
                        <td><a href="../notice/<?php echo $info['n_file']; ?>" target="_blank"
                                rel="noopener noreferrer"><?php echo $info['n_file']; ?></a></td>
                        <td><?php echo $info['n_date']; ?></td>
                        <td>
                            <button type="button" class="btn btn-warning neditbtn"
                                style="text-transform: none;padding-right:20px;padding-left:20px;margin:0px 10px;"> Edit
                            </button>
                            <button type="button" class="btn btn-danger deletebtn"> Delete </button>
                        </td>

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
$(document).ready(function() {

    $('.neditbtn').on('click', function() {

        $('#neditmodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();



        $('#update_id').val(data[0]);
        $('#n_title').val(data[2]);


    });
});
</script>