<?php
    if ( $_SESSION['admin_status'] == "Provost" ) {
    ?>
<?php

        if ( isset( $_POST['deletedata'] ) ) {
            $dlt_id  = $_POST['delete_id'];
            $dlt_mgs = $obj->delete_hall_id( $dlt_id );
        }
        if ( isset( $_POST['updatedata'] ) ) {
            $u_mgs = $obj->hall_id_update( $_POST );
        }
        $r_hall_id_info = $obj->display_hall_id();
    ?>

<!-- EDIT POP UP FORM (Bootstrap MODAL) -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title modal_icon" id="exampleModalLabel"> Update Residential Hall ID </h5>

            </div>

            <form action="" method="POST">

                <div class="modal-body">
                    <div style="color:red;font-size:12px;margin-bottom:5px;">Required Field *</div>

                    <input type="hidden" name="update_id" id="update_id">



                    <div class="form-group">
                        <label><b style="color:red;">* </b>Roll No</label>
                        <input type="number" name="u_check_r_roll" id="u_check_r_roll" class="form-control"
                            placeholder="Enter Roll Number">
                    </div>

                    <div class="form-group">
                        <label><b style="color:red;">* </b>Hall ID</label>
                        <input type="number" name="u_check_r_hall_id" id="u_check_r_hall_id" class="form-control"
                            placeholder="Enter Hall ID">
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

            <i class="fas fa-table mr-1"></i> Manage Student's Hall ID :
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
                        <th scope="col">Roll</th>
                        <th scope="col">Hall ID</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th scope="col" style="display:none;"></th>
                        <th scope="col">S/N</th>
                        <th scope="col">Roll</th>
                        <th scope="col">Hall ID</th>
                        <th scope="col">Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $count = 1;while ( $info = mysqli_fetch_assoc( $r_hall_id_info ) ) {?>
                    <tr>
                        <td style="display:none;">
                            <?php echo $info['check_r_id']; ?>
                        </td>
                        <td><?php echo $count++; ?></td>
                        <td><?php echo $info['check_r_roll']; ?></td>
                        <td><?php echo $info['check_r_hall_id']; ?></td>
                        <td>
                            <button type="button" class="btn btn-warning editbtn"
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
            [3, 'asc']
        ]
    });
});
</script>
<script>
$(document).ready(function() {

    $('.editbtn').on('click', function() {

        $('#editmodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();



        $('#update_id').val(data[0]);
        $('#u_check_r_roll').val(data[2]);
        $('#u_check_r_hall_id').val(data[3]);


    });
});
</script>

<?php
    } else {
        echo "<h4 style = 'color:red; text-align:center; margin:25%;'>Not Accessible</h4>";
}
?>