<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css" rel="stylesheet" />
<?php
    if ( isset( $_POST['upload_notice'] ) ) {
        $upload_notice_return_mgs = $obj->upload_notice( $_POST );
    }
?>
<br>
<br>
<div id="layoutAuthentication" style="min-height: 70vh">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7" style="">
                        <div class="card shadow-lg border-0 rounded-lg mt-5"
                            style="border:2px solid #dee2e6;box-shadow: 0 .5rem 1rem rgb(0 0 0 / 18%) !important;">
                            <div class="card-header"
                                style="background-color: rgba(0, 0, 0, 0.03);border-bottom: 1px solid rgba(0, 0, 0, 0.125); ">
                                <h3 class="text-center my-2">Upload Notice</h3>
                                <?php if ( isset( $upload_notice_return_mgs ) ) {
                                        if ( $upload_notice_return_mgs == "successful" ) {
                                            $s_mgs = "SUCCESSFULLY UPLODED";
                                            include './include/success_modal.php';

                                        } else {
                                            include './include/error_modal.php';
                                        }
                                }?>
                            </div>
                            <div class="card-body">
                                <form action="" method="POST" class='' enctype="multipart/form-data">
                                    <div style="color:red;font-size:12px;margin-bottom:5px;">Required Field *</div>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class=" form-outline">
                                                <input type="text" name='n_title' $id="n_title" class='form-control py4'
                                                    placeholder='Enter Notice Title' required>
                                                <label for="validationCustom02" class="form-label"><b
                                                        style="color:red;">*</b> Notice Title</label>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Please provide a valid Notice Title</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <div class=" form-outline">
                                                <input type="file" name='n_file' $id="n_file" class='form-control py4'
                                                    accept="application/pdf, application/vnd.ms-excel" required>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group  d-flex align-items-center justify-content-center mt-4 mb-0">
                                        <input type='submit' name="upload_notice" value="Upload" class="btn btn-info"
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

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"></script>
<script src="js/script.js"></script>