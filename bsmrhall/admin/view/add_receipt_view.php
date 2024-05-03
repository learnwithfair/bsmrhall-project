<?php if ( $_SESSION['admin_status'] == "Provost" ) {?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css" rel="stylesheet" />
<?php
    if ( isset( $_POST['add_receipt_num'] ) ) {
        $add_subadmin_return_mgs = $obj->add_receipt_num( $_POST );
    }
    ?>
<br>
<br>
<div id="layoutAuthentication" style="min-height: 70vh">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row  justify-content-center">
                    <div class="col-lg-7" style="">
                        <div class="card shadow-lg border-0 rounded-lg mt-5"
                            style="border:2px solid #dee2e6;box-shadow: 0 .5rem 1rem rgb(0 0 0 / 18%) !important;">
                            <div class="card-header"
                                style="background-color: rgba(0, 0, 0, 0.03);border-bottom: 1px solid rgba(0, 0, 0, 0.125); ">
                                <h3 class="text-center my-2">Add Receipt Number</h3>
                                <?php if ( isset( $add_subadmin_return_mgs ) ) {
                                            if ( $add_subadmin_return_mgs == "successful" ) {
                                                $s_mgs = "SUCCESSFULLY ADDED";
                                                include './include/success_modal.php';

                                            } else {
                                                include './include/error_modal.php';
                                            }
                                    }?>
                            </div>
                            <div class="card-body">
                                <form action="" method="POST">
                                    <div style="color:red;font-size:12px;margin-bottom:5px;">Required Field *</div>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class=" form-outline">
                                                <input type="number" name='book_num' $id="book_num"
                                                    class='form-control py4' style="text-align:center;"
                                                    placeholder='Enter Book Number' required>
                                                <label for="validationCustom02" class="form-label"><b
                                                        style="color:red;">*</b> Book Number</label>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Please provide a valid Book Number</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-sm-12">
                                            <div class="form-outline">
                                                <input type="number" name='from_r_num' $id="from_r_num"
                                                    class='form-control py4' style="text-align:center;"
                                                    placeholder='Enter From Receipt Number' required>
                                                <label for="validationCustom02" class="form-label"><b
                                                        style="color:red;">*</b> From Receipt</label>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Please provide a valid From Receipt Number
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12">
                                            <div class="form-outline">
                                                <input type="number" name='to_r_num' $id="to_r_num"
                                                    class='form-control py4' style="text-align:center;"
                                                    placeholder='Enter To Receipt Number' required>
                                                <label for="validationCustom02" class="form-label"><b
                                                        style="color:red;">*</b> To Receipt</label>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Please provide a valid To Receipt Number
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group  d-flex align-items-center justify-content-center mt-4 mb-0">
                                        <input type='submit' name="add_receipt_num" value="Add" class="btn btn-info"
                                            style="padding:8px 40px;" />
                                    </div>
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



<?php } else {
        echo "<h4 style = 'color:red; text-align:center; margin:25%;'>Not Accessible</h4>";
    }
?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"></script>
<script src="js/script.js"></script>