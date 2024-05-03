<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css" rel="stylesheet" />
<?php
    if ( isset( $_POST['t_submit'] ) ) {
        if ( !isset( $_SESSION['t_count'] ) ) {
            $_SESSION['t_count'] = 0;
        }
        $_SESSION['t_count'] = $_SESSION['t_count'] + 1;
        $t_names             = "t_name" . (string) $_SESSION['t_count'];
        $t_rolls             = "t_roll" . (string) $_SESSION['t_count'];
        $t_regs              = "t_reg" . (string) $_SESSION['t_count'];
        $_SESSION[$t_names]  = $_POST['t_name'];
        $_SESSION[$t_rolls]  = $_POST['t_roll'];
        $_SESSION[$t_regs]   = "N/A";
    }
    if ( isset( $_POST['t_reset'] ) ) {
        if ( !isset( $_SESSION['t_count'] ) ) {
        } else {
            for ( $i = 1; $i <= $_SESSION['t_count']; $i++ ) {
                $t_names = "t_name" . (string) $i;
                $t_rolls = "t_roll" . (string) $i;
                $t_regs  = "t_reg" . (string) $i;
                unset( $_SESSION[$t_names] );
                unset( $_SESSION[$t_rolls] );
                unset( $_SESSION[$t_regs] );
            }
            unset( $_SESSION['t_count'] );
        }
    }
?>
<br>
<br>
<div id="layoutAuthentication" style="min-height: 70vh">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center" style="margin-bottom:30px;">
                    <div class="col-lg-7" style="">
                        <div class="card shadow-lg border-0 rounded-lg mt-5"
                            style="border:2px solid #dee2e6;box-shadow: 0 .5rem 1rem rgb(0 0 0 / 18%) !important;">
                            <div class="card-header"
                                style="background-color: rgba(0, 0, 0, 0.03);border-bottom: 1px solid rgba(0, 0, 0, 0.125); ">
                                <h3 class="text-center my-2">ADD TOKEN OF BSMRH </h3>
                                <?php if ( isset( $_POST['t_submit'] ) ) {
                                        $s_mgs = "SUCCESSFULLY ADDED";
                                        include './include/success_modal.php';
                                }?>
                            </div>
                            <div class="card-body">
                                <form action="" method="POST">
                                    <div style="color:red;font-size:12px;margin-bottom:5px;">Required Field *</div>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class=" form-outline">
                                                <input type="text" name='t_name' $id="t_name" class='form-control py4'
                                                    placeholder='Enter Full Name' required>
                                                <label for="validationCustom02" class="form-label"><b
                                                        style="color:red;">*</b> Full Name</label>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Please provide a valid Name</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="form-outline">
                                                <input type="number" name='t_roll' $id="t_roll" class='form-control py4'
                                                    placeholder='Enter Roll Number' required>
                                                <label for="validationCustom02" class="form-label"><b
                                                        style="color:red;">*</b> Roll Number</label>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Please provide a valid From Roll Number
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php if ( isset( $_SESSION['t_count'] ) ) {
                                        if ( $_SESSION['t_count'] > 7 ) {?>
                                    <div style="color:red;font-size:12px;">
                                        <i> Please download and reset then try again!</i>
                                    </div>
                                    <?php }
                                    }?>
                                    <div class="form-group  d-flex align-items-center justify-content-center mt-4 mb-0">
                                        <!-- Button trigger modal -->
                                        <?php include_once "./include/view_modal.php";?>
                                        <input type='button' name="t_view" value="View" class="btn btn-success"
                                            style="width:100px;margin:8px;" data-toggle="modal"
                                            data-target="#t_view_modal"
                                            <?php if ( !isset( $_SESSION['t_count'] ) ) {?>disabled<?php }?> />
                                        <input type='submit' name="t_submit" value="submit" class="btn btn-warning"
                                            style="width:100px;margin:8px;" <?php if ( isset( $_SESSION['t_count'] ) ) {
                                                                                if ( $_SESSION['t_count'] > 7 ) {?>disabled<?php }
}?> />
                                    </div>

                                </form>
                            </div>

                        </div>


                    </div>
                    <div class=" col-md-2" style="">
                        <div class="card shadow-lg border-0 rounded-lg mt-5"
                            style="border:2px solid #dee2e6;box-shadow: 0 .5rem 1rem rgb(0 0 0 / 18%) !important;">
                            <div class="card-header"
                                style="background-color: rgba(0, 0, 0, 0.03);border-bottom: 1px solid rgba(0, 0, 0, 0.125); ">
                                <h3 class="text-center my-2">History</h3>
                            </div>
                            <div class="card-body">
                                <form action="" method="POST">
                                    <div class="form-group  d-flex align-items-center justify-content-center mt-4 mb-0">
                                        <input type='button' name="t_count" value="<?php if ( isset( $_SESSION['t_count'] ) ) {
                                                                                           echo 'Count - ' . $_SESSION['t_count'];
                                                                                       } else {
                                                                                       echo 'Count - 0';
                                                                                   }?>" class="btn btn-primary"
                                            style="width:130px;" />
                                    </div>
                                    <div class="form-group  d-flex align-items-center justify-content-center mt-4 mb-0">
                                        <input type='submit' name="t_reset" value="Reset" class="btn btn-danger"
                                            style="width:130px;" />
                                    </div>
                                </form>
                                <form action="../pdf/tpdf.php" method="POST" target="_blank">
                                    <div class="form-group  d-flex align-items-center justify-content-center mt-4 mb-0">
                                        <input type='submit' target="_blank" name="t_download" value="Download"
                                            class="btn btn-info" style="width:130px;"
                                            <?php if ( !isset( $_SESSION['t_count'] ) ) {?>disabled<?php }?> />
                                    </div>
                                    <div style="margin-bottom:25px;"></div>

                                </form>
                            </div>

                        </div>


                    </div>

                </div>
            </div>
        </main>
    </div>

</div>

<!-- <div class="card-header">
        <h4> <i class="fas fa-user-plus"></i> Add Receipt Number:</h4>

        <div></div>
    </div>

    <br> -->
<!-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4"><b>Add Receipt Number</b></h3>

                    </div>
                    <div class="card-body">
                        <form action="" method='POST' class='form' enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="small mb-1" for="admin_email">Email</label>
                                <input name="admin_email" class="form-control py-4" id="admin_email" type="email"
                                    placeholder="Enter email address" required />
                            </div>



                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
<!-- <div class="row" style="justify-content:center;">
            <div class="form-group col-md-4 col-sm-12">
                <input type="number" name='receipt_num' $id="receipt_num" class='form-control py4'
                    placeholder='Enter Receipt Number' required>


            </div>
            <div class="form-group col-md-2 col-sm-12">
                <input type="submit" name='add_receipt_num' value="Add Number" class='form-control btn-secondary'
                    style="">
            </div>
        </div> -->



<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"></script>
<script src="js/script.js"></script>