<?php
    include "class/function.php";
    $obj1 = new students_info();
?>
<?php session_start();?>
<?php

    if ( isset( $_SESSION['hall_manager'] ) ) {
        $manager_id = $_SESSION['hall_manager'];
        if ( $manager_id ) {
            header( "location:meal_info" );
        }

    }

?>
<?php
    if ( isset( $_POST['manager_login_btn'] ) ) {
        $login_mgs = $obj1->manager_login( $_POST );
    }

?>


<?php include_once "includes/head.php"?>

<body>
    <?php include_once "includes/header.php"?>



    <div class="card form_style mx-auto border">
        <div class="card-body p-5">
            <h3 class="card-title text-center pb-2">Login Here</h3>
            <?php if ( isset( $login_mgs ) ) {
                    if ( $login_mgs == "successful" ) {
                        // include 'admin/include/success_modal.php';

                    } else {
                        include 'admin/include/error_modal.php';
                    }

            }?>
            <form class="needs-validation" novalidate action="" method="POST">
                <div style="color:red;font-size:12px;margin-bottom:5px;">Required Field *</div>
                <div class="form-outline mb-4">
                    <input type="email" class="form-control" id="validationCustom01" value="" placeholder="Enter Email"
                        name="manager_email" required />
                    <label for="validationCustom01" class="form-label"><b style="color:red;">*</b> Email</label>
                    <div class="valid-feedback">Looks good!</div>
                </div>

                <div class="form-outline mb-4">
                    <input type="password" class="form-control" id="validationCustom02" name="manager_pass" value=""
                        placeholder="Enter Password" required />
                    <label for="validationCustom02" class="form-label"><b style="color:red;">*</b> Password</label>
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback">Please provide a valid Password</div>
                </div>

                <div class="col-12 text-end">
                    <button class="btn btn-primary" type="submit"
                        style="text-transform:none;padding:5px 12px;font-family:times new romans"
                        name="manager_login_btn">Log
                        In</button>
                </div>
            </form>
        </div>


    </div>






    <!-- footer -->
    <?php include_once "includes/footer.php"?>
    <!-- Footer -->


    <?php include_once 'includes/script.php';?>
</body>

</html>