<?php if ( $_SESSION['admin_status'] == "Provost" || $_SESSION['admin_status'] == "Assistant Provost" ) {?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css" rel="stylesheet" />
<?php
    if ( isset( $_POST['r_update_btn'] ) ) {
        $update_result = $obj->r_update( $_POST );
    }

        if ( isset( $_GET['status'] ) ) {
            if ( $_GET['status'] == "r_update" ) {
                $r_update_id = $_GET['id'];
                $r_info      = $obj->display_residential_info_by_id( $r_update_id );

            }
        }

    ?>

<br>


<div class="card mb-4" style="border:2px solid #dee2e6;">
    <div class="card-header"
        style="background-color: rgba(0, 0, 0, 0.03);border-bottom: 1px solid rgba(0, 0, 0, 0.125); ">


        <h4 style="padding-top:10px;padding-bottom:10px;"> <i class="fa fa-edit"></i> Edit Rasidential Student Info:
        </h4>
        <?php if ( isset( $update_result ) ) {
                    if ( $update_result == "successful" ) {
                        $s_mgs = "SUCCESSFULLY UPDATED";
                        include './include/success_modal.php';

                    } else {
                        include './include/error_modal.php';
                    }
            }?>
        <div></div>

    </div>

    <form class="needs-validation" action="" method="POST" novalidate enctype="multipart/form-data"
        style="padding:20px 30px;">
        <div style="color:red;font-size:12px;margin-bottom:5px;">Required Field *</div>
        <!-- name -->
        <input type="hidden" value="<?php if ( isset( $r_update_id ) ) {echo $r_update_id;}?>" name="u_r_id">
        <div class="form-outline mb-4">
            <input type="text" class="form-control" id="validationCustom01" name="u_r_name"
                placeholder="Enter Full Name" value="<?php echo $r_info['non_r_name']; ?>" required />
            <label for="validationCustom01" class="form-label"><b style="color:red;">*</b> Name</label>
            <div class="valid-feedback">Looks good!</div>
            <div class="invalid-feedback">Please provide a valid name.</div>
        </div>
        <!-- roll and registration -->
        <div class="row">
            <div class="form-group col-md-6 col-sm-12">
                <div class="form-outline">
                    <input type="number" id="form6Example1" class="form-control" id="validationCustom01"
                        value="<?php echo $r_info['non_r_roll']; ?>" name="u_r_roll" placeholder="Enter Roll"
                        required />
                    <label class="form-label" for="form6Example1"><b style="color:red;">*</b> Roll number</label>
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback">Please provide...</div>
                </div>
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <div class="form-outline">
                    <input type="number" id="form6Example2" class="form-control" id="validationCustom01"
                        value="<?php echo $r_info['non_r_reg']; ?>" name="u_r_reg"
                        placeholder="Enter Registration Number" required />
                    <label class="form-label" for="form6Example2"><b style="color:red;">*</b> Registration
                        number</label>
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback">Please provide...</div>
                </div>
            </div>
        </div>
        <!-- options -->

        <div class="row">
            <div class="form-group col-md-6 col-sm-12">
                <select name="u_r_session" id="u_r_session" class='form-select py4' required>

                    <option selected disabled value=""><b style="color:red;">*</b> Select Session</option>
                    <?php for ( $i = 2010; $i < 2041; $i++ ) {?>
                    <option value="<?php echo $i; ?>" <?php if ( $i == $r_info['non_r_session'] ) {?> selected<?php }?>>
                        <?php echo $i . " - " . $i + 1; ?></option>
                    <?php }?>
                </select>

            </div>
            <div class="form-group col-md-6 col-sm-12">
                <div class="form-outline">
                    <input type="number" id="form6Example2" class="form-control" id="validationCustom01"
                        value="<?php echo $r_info['non_r_hall_id']; ?>" name="u_r_hall_id" placeholder="Enter Hall ID"
                        required />
                    <label class="form-label" for="form6Example2"><b style="color:red;">*</b> Hall ID</label>
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback">Please provide...</div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6 col-sm-12">
                <div class="form-outline">
                    <input type="number" id="form6Example1" class="form-control" id="validationCustom01"
                        value="<?php echo $r_info['non_r_rm']; ?>" name="u_r_rm" placeholder="Enter Room No" />
                    <label class="form-label" for="form6Example1">Room No</label>
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback">Please provide...</div>
                </div>
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <div class="form-outline">
                    <input type="date" id="form6Example2" class="form-control" id="validationCustom01" name="u_r_birth"
                        value="<?php echo $r_info['non_r_birth']; ?>" required />
                    <label class="form-label" for="form6Example2"><b style="color:red;">*</b> Date of Birth</label>
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback">Please provide...</div>
                </div>
            </div>
        </div>
        <?php
            $departments = array( "CSE", "EEE", "EECE", "ICE", "CE", "Architecture", "URP", "MATH", "Physics", "Pharmacy", "Chemistry", "STAT", "BA", "THM", "ECO", "Bangla", "SW", "English", "Public Ad", "HBS", "GE" );
            ?>
        <div class="form-group">
            <select name="u_r_dept" id="u_r_dept" class='form-select py4' required>
                <option selected disabled value=""><b style="color:red;">*</b> Select Department</option>

                <?php
                    for ( $i = 0; $i < count( $departments ); $i++ ) {
                        ?>
                <option value="<?php echo $departments[$i]; ?>"
                    <?php if ( $departments[$i] == $r_info['non_r_dept'] ) {?> selected<?php }?>>
                    <?php echo $departments[$i]; ?></option>
                <?php
                    }

                    ?>


            </select>
        </div>




        <div class="row">
            <div class="form-group col-md-6 col-sm-12">
                <div class="form-outline">
                    <input type="text" id="form6Example1" class="form-control" id="validationCustom01"
                        value="<?php echo $r_info['non_r_fname']; ?>" name="u_r_fname" placeholder="Enter Father's Name"
                        required />
                    <label class="form-label" for="form6Example1"><b style="color:red;">*</b> Father's name</label>
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback">Please provide...</div>
                </div>
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <div class="form-outline">
                    <input type="text" id="form6Example2" class="form-control" id="validationCustom01" name="u_r_mname"
                        placeholder="Enter Mother's Name" value="<?php echo $r_info['non_r_mname']; ?>" required />
                    <label class="form-label" for="form6Example2"><b style="color:red;">*</b> Mother's name</label>
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback">Please provide...</div>
                </div>
            </div>
        </div>
        <div class="form-outline mb-4">
            <input type="tel" pattern="[01]{2}[0-9]{9}" class="form-control" id="validationCustom01" name="u_r_mob"
                placeholder="Enter Mobile Number" value="<?php echo $r_info['non_r_mob']; ?>" required />
            <label for="validationCustom01" class="form-label"><b style="color:red;">*</b> Mobile No</label>
            <div class="valid-feedback">Looks good!</div>
            <div class="invalid-feedback">Please provide a valid mobile number.</div>
        </div>





        <div class="row">
            <div class="form-group col-md-6 col-sm-12">
                <div class="form-outline">
                    <input type="text" class="form-control" id="validationCustom02" name="u_r_pre_address"
                        placeholder="Enter Present Address" value="<?php echo $r_info['non_r_pre_address']; ?>" />
                    <label for="validationCustom02" class="form-label">Present address</label>
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback">Please provide a valid address</div>
                </div>
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <div class="form-outline">
                    <input type="text" class="form-control" id="validationCustom02" name="u_r_per_address"
                        placeholder="Enter Permanent Address" value="<?php echo $r_info['non_r_per_address']; ?>"
                        required />
                    <label for="validationCustom02" class="form-label"><b style="color:red;">*</b> Permanent
                        address</label>
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback">Please provide a valid address</div>
                </div>
            </div>
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control" id="validationCustom01" name="u_r_email" placeholder="Enter Email"
                value="<?php echo $r_info['non_r_email']; ?>" required />
            <label for="validationCustom01" class="form-label"><b style="color:red;">*</b> E-mail</label>
            <div class="valid-feedback">Looks good!</div>
            <div class="invalid-feedback">Please provide a valid email.</div>
        </div>

        <div class="row">
            <div class="form-group col-md-2" style="margin:0 auto">
                <input type="submit" name='r_update_btn' value="Update" class='form-control btn btn-success'>

            </div>
        </div>

        <br>

    </form>
</div>
<?php } else {
        echo "<h4 style = 'color:red; text-align:center; margin:25%;'>Not Accessible</h4>";
    }
?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"></script>
<script src="js/script.js"></script>