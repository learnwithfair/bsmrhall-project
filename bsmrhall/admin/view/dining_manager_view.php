<?php if ( $_SESSION['admin_status'] == "Provost" || $_SESSION['admin_status'] == "Assistant Provost" ) {?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css" rel="stylesheet" />
<?php
    if ( isset( $_POST['updatedata'] ) ) {
        $u_mgs = $obj->update_dining_manager( $_POST );
    }
        $hall_dining_manager_info = $obj->display_dining_manager();
    ?>

<!-- EDIT POP UP FORM (Bootstrap MODAL) -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="height: 450px;">
            <div class="modal-header">
                <h5 class="modal-title modal_icon" id="exampleModalLabel" align="middle" style="width:100%;"> Update
                    Dining Manager </h5>
            </div>

            <form action="" method="POST">

                <div class="modal-body">
                    <div style="color:red;font-size:12px;margin-bottom:5px;">Required Field *</div>

                    <input type="hidden" name="update_id" id="update_id">
                    <div class="form-group">
                        <label><b style="color:red;">* </b>Block</label>
                        <select name="manager_block" id="manager_block" class='form-select' required>
                            <option selected disabled value=""><b style="color:red;">*</b> Select Block</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label><b style="color:red;">* </b>Email</label>
                        <input type="email" name="manager_email" id="manager_email" class="form-control"
                            placeholder="Enter Email" required>
                    </div>
                    <div class="form-group">
                        <label><b style="color:red;">* </b>Password</label>
                        <input type="password" name="manager_pass" id="manager_pass" class="form-control"
                            placeholder="Enter Password" required>
                    </div>


                </div>
                <div class="modal_icon" align="middle" style="width:100%;">
                    <button style="margin:0px 10px; padding:10px 15px;width:90px;" type="button" class="btn btn-primary"
                        data-dismiss="modal">Cancel</button>
                    <button style="margin:0px 10px;width:90px;" type="submit" name="updatedata"
                        class="btn btn-warning">Update</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- ############################################################################## -->
<br>
<div class="card mb-4">
    <div class="card-header">
        <h4>

            <i class="fas fa-table mr-1"></i> Manage Dining Manager :
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
                        <th scope="col">Block</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <!-- <tfoot>
                    <tr>
                        <th scope="col" style="display:none;"></th>
                        <th scope="col">S/N</th>
                        <th scope="col">Block</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                        <th scope="col">Action</th>
                    </tr>
                </tfoot> -->
                <tbody>
                    <?php $count = 1;while ( $info = mysqli_fetch_assoc( $hall_dining_manager_info ) ) {?>
                    <tr>
                        <td style="display:none;">
                            <?php echo $info['manager_id']; ?>
                        </td>
                        <td><?php echo $count++; ?></td>
                        <td><?php echo $info['manager_block']; ?></td>
                        <td><?php echo $info['manager_email']; ?></td>
                        <td><?php echo $info['manager_pass']; ?></td>
                        <td>
                            <button type="button" class="btn btn-warning editbtn"
                                style="text-transform: none;padding-right:20px;padding-left:20px;margin:0px 10px;"> Edit
                            </button>
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
        $('#manager_block').val(data[2]);
        $('#manager_email').val(data[3]);
        $('#manager_pass').val(data[4]);


    });
});
</script>

<?php
    } else {
        echo "<h4 style = 'color:red; text-align:center; margin:25%;'>Not Accessible</h4>";
    }
?>
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"></script>
<script src="js/script.js"></script> -->