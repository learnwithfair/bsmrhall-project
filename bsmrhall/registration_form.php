<?php
    include "class/function.php";
    $obj1 = new students_info();
?>
<?php session_start();?>
<?php include_once "includes/head.php";?>

<?php
    if ( isset( $_POST['reg_submit_btn'] ) ) {
        $add_reg_return_mgs = $obj1->add_registration_data( $_POST );
}?>


<body>
    <?php include_once "includes/header.php";?>
    <!-- Temporary Data -->
    <!-- <br> -->
    <!-- Temporary Data -->
    <div class="card form_style2 mx-auto border">
        <div class="card-body p-4">
            <h3 class="card-title text-center pb-5">Registration Form of BSMRH (PUST)</h3>
            <?php if ( isset( $add_reg_return_mgs ) ) {
                    if ( $add_reg_return_mgs == "successful" ) {
                        $s_mgs = "SUCCESSFULLY REGISTERED";
                        include 'admin/include/success_modal.php';
                    } else {
                        include 'admin/include/error_modal.php';
                    }
            }?>
            <form class="needs-validation" action="" method="POST" novalidate enctype="multipart/form-data">
                <div style="color:red;font-size:12px;margin-bottom:5px;">Required Field *</div>
                <!-- name -->
                <div class="form-outline mb-4">
                    <input type="text" class="form-control" id="validationCustom01" name="non_r_name" value=""
                        placeholder="Enter Full Name" required />
                    <label for="validationCustom01" class="form-label"><b style="color:red;">*</b> Name</label>
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback">Please provide a valid name.</div>
                </div>
                <!-- roll and registration -->
                <div class="row">
                    <div class="form-group col-md-6 col-sm-12">
                        <div class="form-outline mb-4">
                            <input type="number" id="form6Example1" class="form-control" id="validationCustom01"
                                value="" placeholder="Enter Roll Number" name="non_r_roll" required />
                            <label class="form-label" for="form6Example1"><b style="color:red;">*</b> Roll
                                number</label>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please provide...</div>
                        </div>
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <div class="form-outline mb-4">
                            <input type="number" id="form6Example2" class="form-control" id="validationCustom01"
                                value="" placeholder="Enter Registration Number" name="non_r_reg" required />
                            <label class="form-label" for="form6Example2"><b style="color:red;">*</b> Registration
                                number</label>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please provide...</div>
                        </div>
                    </div>
                </div>
                <!-- options -->




                <div class="row">
                    <div class="col-12">
                        <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                        <select class="select my-option-style" name="non_r_session" required>
                            <option selected disabled value=""><b style="color:red;">*</b> Select Session</option>
                            <?php for ( $i = 2010; $i < 2041; $i++ ) {?>
                            <option value="<?php echo $i; ?>"><?php echo ( $i . " - " . ( $i + 1 ) ); ?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 col-sm-12">
                        <div class="form-outline mb-4">
                            <input type="number" id="form6Example1" class="form-control" id="validationCustom01"
                                value="" placeholder="Enter Room Number" name="non_r_rm" />
                            <label class="form-label" for="form6Example1">Preferred Room No</label>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please provide...</div>
                        </div>
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <div class="form-outline mb-4">
                            <input type="number" id="form6Example2" class="form-control" id="validationCustom01"
                                name="non_r_hall_id" value="" placeholder="Enter Hall ID (Optional)" />
                            <label class="form-label" for="form6Example2">Hall ID</label>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please provide...</div>
                        </div>
                    </div>

                </div>

                <?php
                $departments = array( "CSE", "EEE", "EECE", "ICE", "CE", "Architecture", "URP", "MATH", "Physics", "Pharmacy", "Chemistry", "STAT", "BA", "THM", "ECO", "Bangla", "SW", "English", "Public Ad", "HBS", "GE" );?>
                <div class="col-12">
                    <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                    <select class="select my-option-style" name="non_r_dept" required>
                        <option selected disabled value=""><b style="color:red;">*</b> Select Department</option>
                        <?php
                        for ( $i = 0; $i < count( $departments ); $i++ ) {?>
                        <option value="<?php echo $departments[$i]; ?>"><?php echo $departments[$i]; ?></option>
                        <?php
                        }?>

                    </select>
                </div>





                <div class="row">
                    <div class="form-group col-md-6 col-sm-12">
                        <div class="form-outline mb-4">
                            <input type="text" id="form6Example1" class="form-control" id="validationCustom01" value=""
                                placeholder="Enter Father's Name" name="non_r_fname" required />
                            <label class="form-label" for="form6Example1"><b style="color:red;">*</b> Father's
                                name</label>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please provide...</div>
                        </div>
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <div class="form-outline mb-4">
                            <input type="text" id="form6Example2" class="form-control" id="validationCustom01"
                                name="non_r_mname" value="" placeholder="Enter Mother's Name" required />
                            <label class="form-label" for="form6Example2"><b style="color:red;">*</b> Mother's
                                name</label>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please provide...</div>
                        </div>
                    </div>
                </div>


                <!-- Date of Birth -->
                <div class="form-outline mb-4">
                    <input type="date" id="form6Example2" class="form-control" id="validationCustom01"
                        name="non_r_birth" value="" placeholder="Enter Date of Birth " required />
                    <label class="form-label" for="form6Example2"><b style="color:red;">*</b> Date of
                        Birth</label>
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback">Please provide...</div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6 col-sm-12">
                        <div class="form-outline mb-4">
                            <input type="tel" pattern="[01]{2}[0-9]{9}" class="form-control" id="validationCustom01"
                                name="non_r_mob" value="" placeholder="Enter Mobile Number" required />
                            <label for="validationCustom01" class="form-label"><b style="color:red;">*</b> Mobile
                                No</label>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please provide a valid mobile number.</div>
                        </div>
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <div class="form-outline mb-4">
                            <input type="email" class="form-control" id="validationCustom01" name="non_r_email" value=""
                                placeholder="Enter Email" required />
                            <label for="validationCustom01" class="form-label"><b style="color:red;">*</b> Email</label>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please provide a valid email.</div>
                        </div>
                    </div>
                </div>
                <div class="form-outline mb-4 mb-4">
                    <input type="password" class="form-control" id="validationCustom01" name="non_r_pass" value=""
                        placeholder="Enter Passward" required />
                    <label for="validationCustom01" class="form-label"><b style="color:red;">*</b> Password</label>
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback">Please provide a valid Password.</div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 col-sm-12">
                        <div class="form-outline mb-4">
                            <input type="text" class="form-control" id="validationCustom02" name="non_r_pre" value=""
                                placeholder="Enter Present Address" />
                            <label for="validationCustom02" class="form-label">Present address</label>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please provide a valid address</div>
                        </div>
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <div class="form-outline mb-4">
                            <input type="text" class="form-control" id="validationCustom02" name="non_r_per" value=""
                                placeholder="Enter Permanent Address" required />
                            <label for="validationCustom02" class="form-label"><b style="color:red;">*</b> Permanent
                                address</label>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please provide a valid address</div>
                        </div>
                    </div>
                </div>


                <b for="for_upload_photo"><span style="color:red;">*</span> Upload Photo :
                </b><span style="color:#c41515">(Should be used .png format)</span>

                <div class="form-outline mb-4" style="margin-top:5px;">

                    <input type="file" class="form-control" id="validationCustom02" value="" name="non_r_img" required
                        accept="image/jpg, image/png" />
                    <label for="validationCustom02" class="form-label"></label>
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback">Please provide a valid address</div>
                </div>
                <div class="form-check  mb-4">

                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required />
                    <label class="form-check-label" for="invalidCheck"><b style="color:red;">*</b> Agree to terms and
                        conditions</label>
                    <div class="invalid-feedback">You must agree before submitting.</div>
                </div>
                <div class="col text-end">
                    <input class="btn btn-primary btn-block col-2" name="reg_submit_btn" type="submit"
                        value="SUBMIT"></input>

                </div>

            </form>
        </div>

        <div class="text-center">
            <p>
                If you are a member please login? <a href="log_in">Login</a>
            </p>
        </div>
    </div>

    <!-- footer -->
    <?php include_once "includes/footer.php";?>

    <!-- Footer -->

    <?php include_once 'includes/script.php';?>
</body>

</html>