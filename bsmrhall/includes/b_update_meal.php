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

<div class="modal fade bd-example-modal-md" id="b-update-meal" tabindex="-1" role="dialog"
    aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content modal_icon">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-title" id="exampleModalLongTitle">

                    <h3>Do you want to Update Meal?</h3>
                    <br>
                    <div></div>


                    <div class="form-outline mb-4">
                        <input type="number" max="3" min="0" class="form-control" id="validationCustom02"
                            name="u-b-morning-meal" value="<?php echo $b_meal_info['morning_meal']; ?>"
                            placeholder="Enter Morning Meal" required />
                        <label for="validationCustom02" class="form-label">Morning Meal</label>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please provide at most 3 Meal</div>
                    </div>
                    <div class="form-outline mb-4">
                        <input type="number" max="3" min="0" class="form-control" id="validationCustom02"
                            name="u-b-lunch" value="<?php echo $b_meal_info['lunch']; ?>" placeholder="Enter Lunch"
                            required />
                        <label for="validationCustom02" class="form-label">Lunch</label>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please provide at most 3 Meal</div>
                    </div>
                    <div class="form-outline mb-4">
                        <input type="number" max="3" min="0" class="form-control" id="validationCustom02"
                            name="u-b-dinner" value="<?php echo $b_meal_info['dinner']; ?>" placeholder="Enter Dinner"
                            required />
                        <label for="validationCustom02" class="form-label">Dinner</label>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please provide at most 3 Meal</div>
                    </div>



                </div>
                <br>
                <div>
                    <button type="button" class="btn btn-dark cancel btn-sm" data-dismiss="modal"
                        style="margin:0px 10px">Cancel</button>
                    <button type="submit" class="btn btn-warning btn-sm" name="b-update-meal-btn"
                        style="margin:0px 10px">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function() {

    $('.b-update-meal').on('click', function() {

        $('#b-update-meal').modal('show');

    });
});
$(document).ready(function() {

    $('.cancel').on('click', function() {

        $('#b-update-meal').modal('hide');

    });
});
</script>