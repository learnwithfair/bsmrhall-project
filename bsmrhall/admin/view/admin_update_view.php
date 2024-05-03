<?php if ( $_SESSION['admin_status'] == "Provost" ) {?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css" rel="stylesheet" />
<?php
    if ( isset( $_POST['update_admin'] ) ) {
        $update_result = $obj->update_admin( $_POST );
    }

        if ( isset( $_GET['status'] ) ) {
            if ( $_GET['status'] == "admin_update" ) {
                $admin_update_id = $_GET['id'];
                $admin_info      = $obj->display_admin_info_by_id( $admin_update_id );

            }
        }

    ?>

<br>

<div class="row  justify-content-center">
    <div class="card  col-lg-9" style="border:2px solid #dee2e6;">
        <div class="card-header"
            style="background-color: rgba(0, 0, 0, 0.03);border-bottom: 1px solid rgba(0, 0, 0, 0.125);margin:0px -12px; ">
            <br>
            <h4> <i class="fas fa-user-plus"></i> Update Admin:</h4>
            <h6>
                <?php if ( isset( $update_result ) ) {
                            if ( $update_result == "successful" ) {
                                $s_mgs = "SUCCESSFULLY UPDATED";
                                include './include/success_modal.php';

                            } else {
                                include './include/error_modal.php';
                            }

                    }?>
            </h6>
            <div></div>
        </div>
        <form action="" method='POST' class='form' enctype="multipart/form-data" style="padding:10px 60px;">
            <br>
            <div style="color:red;font-size:12px;margin-bottom:5px;">Required Field *</div>

            <div class="row">
                <input type="hidden" value="<?php echo $admin_info['admin_id']; ?>" name="u_id">
                <div class="form-group col-md-6 col-sm-12">
                    <div class="form-outline">

                        <input type="text" name='u_admin_name' $id="u_admin_name" class='form-control py4'
                            placeholder='Enter Name' value="<?php echo $admin_info['admin_name']; ?>" required>
                        <label for="validationCustom02" class="form-label"><b style="color:red;">*</b> Name</label>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please provide a valid Name</div>
                    </div>
                </div>
                <div class="form-group col-md-6 col-sm-12">
                    <div class="form-outline">
                        <input type="email" name='u_admin_email' $id="u_admin_email" class='form-control py4'
                            placeholder='Enter E-mail' value="<?php echo $admin_info['admin_email']; ?>" required>
                        <label for="validationCustom02" class="form-label"><b style="color:red;">*</b> Email</label>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please provide a valid Email</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 col-sm-12">
                    <div class="form-outline">
                        <input type="password" name='u_admin_password' $id="u_admin_password" class='form-control py4'
                            placeholder='Enter Password' pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"
                            title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters"
                            value="<?php echo $admin_info['admin_password']; ?>" required>
                        <label for="validationCustom02" class="form-label"><b style="color:red;">*</b>
                            Password</label>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please provide a valid Password</div>
                    </div>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <select name="u_admin_status" id="u_admin_status" class='form-select py4' required>
                        <option selected disabled value=""><b style="color:red;">*</b> Select Status</option>
                        <option value="Provost" <?php if ( $admin_info['admin_status'] == 'Provost' ) {?>
                            selected<?php }?>>
                            Provost</option>

                        <option value="Assistant Provost"
                            <?php if ( $admin_info['admin_status'] == 'Assistant Provost' ) {?> selected<?php }?>>
                            Assistant Provost</option>
                        <option value="Admin Officer" <?php if ( $admin_info['admin_status'] == 'Admin Officer' ) {?>
                            selected<?php }?>>Admin
                            Officer</option>
                    </select>
                </div>
            </div>

            <div class="row">

                <div class="form-group col-md-12 col-sm-12">
                    <input type="file" class='form-control py4' id="validationCustom02" value="" name="u_admin_img"
                        required accept="image/jpg, image/png" />
                    <label for="validationCustom02" class="form-label"></label>
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback">Please provide a valid address</div>
                </div>
            </div>


            <br>
            <div class="row">
                <div class="col-md-2" style="margin:0 auto;">
                    <input type="submit" name='update_admin' value="Update Admin" class='btn btn-warning'>

                </div>
            </div>
            </br>
        </form>
    </div>
</div>



<?php } else {
        echo "<h4 style = 'color:red; text-align:center; margin:25%;'>Not Accessible</h4>";
    }
?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"></script>
<script src="js/script.js"></script>