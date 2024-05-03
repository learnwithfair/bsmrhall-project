<!-- Small modal -->
<style>
.modal_icon {

    text-align: center;
    padding: 25px;
    width: 100%;
}
</style>
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-sm">Small
    modal</button> -->

<div class="modal fade bd-example-modal-md" id="changeaddress" tabindex="-1" role="dialog"
    aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content modal_icon">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-title" id="exampleModalLongTitle">

                    <h3>Do you want to Change Address?</h3>
                    <br>
                    <div></div>


                    <div class="form-outline mb-4">
                        <input type="text" class="form-control" id="validationCustom02" name="u_pre_address"
                            value="<?php echo $info['non_r_pre_address']; ?>" placeholder="Enter Present Address" />
                        <label for="validationCustom02" class="form-label">Present address</label>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please provide a valid address</div>
                    </div>



                </div>
                <br>
                <div>
                    <button type="button" class="btn btn-dark cancel btn-sm" data-dismiss="modal"
                        style="margin:0px 10px">Cancel</button>
                    <button type="submit" class="btn btn-warning btn-sm" name="user_pre_address_btn"
                        style="margin:0px 10px">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function() {

    $('.change-address').on('click', function() {

        $('#changeaddress').modal('show');

    });
});
$(document).ready(function() {

    $('.cancel').on('click', function() {

        $('#changeaddress').modal('hide');

    });
});
</script>