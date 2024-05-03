<style>
.position_payment_query {

    position: absolute;
    margin-top: -40px;
    justify-content: center;
    display: flex;
    width: 100%;
    align-items: center;

}
</style>
<?php

    if ( isset( $_POST['deletedata'] ) ) {

        $h_dlt_result = $obj->delete_history();
    }

    if ( isset( $_POST['history_query_show'] ) ) {

        // $from_months = str_split( $_POST['from_date'], 1 );
        // $from_month  = (int) ( $from_months[5] . $from_months[6] );
        // $from_year   = (int) ( str_split( $_POST['from_date'], 4 )[0] );

        // $to_months = str_split( $_POST['to_date'], 1 );
        // $to_month  = (int) ( $to_months[5] . $to_months[6] );
        // $to_year   = (int) ( str_split( $_POST['to_date'], 4 )[0] );

        // if ( $from_month > $to_month ) {
        //     echo "<script>alert('Please Select Valid Month !!')</script>";
        // } else {
        $_SESSION['from_date'] = $_POST['from_date'];
        $_SESSION['to_date']   = $_POST['to_date'];
        // }

    }
    if ( isset( $_POST['history_reset'] ) ) {
        unset( $_SESSION['from_date'] );
        unset( $_SESSION['to_date'] );
    }
?>
<script src="./js/table2excel.js"></script>
<br>
<div class="card mb-4">
    <div class="card-header">
        <h4 style="height:40px;padding-top:10px;">
            <i class="fas fa-table mr-1"></i> History Query:

        </h4>
        <?php if ( isset( $h_dlt_result ) ) {
                if ( $h_dlt_result == "successful" ) {
                    $s_mgs = "SUCCESSFULLY DELETED";
                    include './include/success_modal.php';

                } else {
                    include './include/error_modal.php';
                }
        }?>
        <div></div>
        <div class="position_payment_query">

            <form action="" method="post">
                <label for="from_date">
                    <h6 style="margin-right:10px">From</h6>
                </label>
                <input type="date" name="from_date" id="from_date"
                    value="<?php if ( isset( $_SESSION['from_date'] ) ) {echo $_SESSION['from_date'];}?>" required>
                <label for="from_date">
                    <h6 style="margin-left:80px;margin-right:10px">To</h6>
                </label>
                <input type="date" name="to_date" id="to_date"
                    value="<?php if ( isset( $_SESSION['to_date'] ) ) {echo $_SESSION['to_date'];}?>" required>
                <input style="margin-left:30px" type="submit" value="Show" name="history_query_show"
                    class="btn btn-secondary">
                <input style="margin-left:10px" type="submit" value="Reset" name="history_reset" class="btn btn-danger">
            </form>

        </div>


    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered vertical_align" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Roll</th>
                        <th>Reg No</th>
                        <th>Receipt No</th>
                        <th>Amount</th>
                        <th>Month</th>
                        <th>Date</th>
                        <th>Submitted by</th>

                    </tr>
                </thead>
                <tbody>

                    <?php
                        if ( isset( $_SESSION['from_date'] ) && isset( $_SESSION['to_date'] ) ) {
                            $history_data = $obj->display_history_query();
                        ?>
<?php $count = 1;while ( $info = mysqli_fetch_assoc( $history_data ) ) {?>
                    <tr>
                        <td><?php echo $count++; ?></td>
                        <td><?php echo $info['ph_name']; ?></td>
                        <td><?php echo $info['ph_roll']; ?></td>
                        <td><?php echo $info['ph_reg']; ?></td>
                        <td><?php echo ( $info['book_num'] . $info['ph_receipt_num'] ); ?></td>
                        <td><?php echo $info['ph_amount']; ?></td>
                        <td style="white-space: normal;"><?php echo $info['ph_month']; ?></td>
                        <td><?php echo $info['ph_date']; ?></td>
                        <td><?php echo $info['ph_submitted']; ?></td>


                    </tr>
                    <?php }
                        }
                    ?>
                </tbody>
            </table>
            <?php if ( $_SESSION['admin_status'] == "Provost" || $_SESSION['admin_status'] == "Assistant Provost" ) {?>
<?php
    if ( isset( $_SESSION['from_date'] ) && isset( $_SESSION['to_date'] ) ) {
        $history_data_info = $obj->display_history_query();
        $check_history     = mysqli_num_rows( $history_data_info );
    if ( $check_history != 0 ) {?>
            <!-- DELETE POP UP FORM (Bootstrap MODAL) -->
            <?php include "./include/delete_modal.php";?>
            <br>
            <div>

                <button type="button" class="btn btn-danger deletebtn" name="history_dlt_btn"
                    style="margin:0px 8px;padding-left:22px;padding-right:22px">Delete</button>
                <input type="hidden" name="file_content" id="file_content" />
                <button class="btn btn-success" name="downloadexcel" id="downloadexcel"
                    style="margin:0px 8px;">Download</button>

            </div>

            <?php

                    }
                }
                }
            ?>
        </div>
    </div>
</div>

<script>
document.getElementById('downloadexcel').addEventListener('click', function() {
    var table2excel = new Table2Excel();
    table2excel.export(document.querySelectorAll("#dataTable"));
});
</script>