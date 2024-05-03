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
    $r_months       = array( " ", "r_jan", "r_feb", "r_mar", "r_apr", "r_may", "r_jun", "r_jul", "r_aug", "r_sep", "r_oct", "r_nov", "r_dec" );
    $display_months = array( " ", "JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC" );

    if ( isset( $_POST['payment_query_show'] ) ) {

        $query_mgs   = $obj->display_payment_query( $_POST );
        $from_months = str_split( $_POST['from_date'], 1 );
        $from_month  = (int) ( $from_months[5] . $from_months[6] );
        $from_year   = (int) ( str_split( $_POST['from_date'], 4 )[0] );

        $to_months         = str_split( $_POST['to_date'], 1 );
        $to_month          = (int) ( $to_months[5] . $to_months[6] );
        $to_year           = (int) ( str_split( $_POST['to_date'], 4 )[0] );
        $default_from_date = $_POST['from_date'];
        $default_to_date   = $_POST['to_date'];

    }

?>
<br>
<div class="card mb-4">
    <div class="card-header">
        <h4 style="height:40px;padding-top:10px;">
            <i class="fas fa-table mr-1"></i> Payment Query:

        </h4>
        <?php if ( isset( $_SESSION['payment_query'] ) ) {

                if ( $_SESSION['payment_query'] == "unsuccessful" ) {
                    include './include/error_modal.php';
                    unset( $_SESSION['payment_query'] );

                }
        }?>
        <div></div>
        <div class="position_payment_query">

            <form action="" method="post">
                <label for="from_date">
                    <h6 style="margin-right:10px">From</h6>
                </label>
                <input type="date" name="from_date" id="from_date"
                    value="<?php if ( isset( $default_from_date ) ) {echo $default_from_date;}?>" required>
                <label for="from_date">
                    <h6 style="margin-left:80px;margin-right:10px">To</h6>
                </label>
                <input type="date" name="to_date" id="to_date"
                    value="<?php if ( isset( $default_to_date ) ) {echo $default_to_date;}?>" required>
                <input style="margin-left:30px" type="submit" value="Show" name="payment_query_show"
                    class="btn btn-secondary">
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
                        <th>Session</th>
                        <?php if ( $_SESSION['admin_status'] == "Provost" || $_SESSION['admin_status'] == "Assistant Provost" ) {?>
                        <th>Contacts</th>
                        <?php }?>
                        <th>Room & ID</th>
                        <th>Months</th>
                        <th>Due</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Roll</th>
                        <th>Reg No</th>
                        <th>Session</th>
                        <?php if ( $_SESSION['admin_status'] == "Provost" || $_SESSION['admin_status'] == "Assistant Provost" ) {?>
                        <th>Contacts</th>
                        <?php }?>
                        <th>Room & ID</th>
                        <th>Months</th>
                        <th>Due</th>
                    </tr>
                </tfoot>
                <tbody>

                    <?php
                    if ( isset( $query_mgs ) ) {?>


                    <?php $count = 1;while ( $info1 = mysqli_fetch_assoc( $query_mgs ) ) {
                            $due                   = 0;
                            $display_unique_months = array();
                            for ( $i = $from_month; $i <= $to_month; $i++ ) {
                                $m = $r_months[$i];
                                if ( $info1[$m] == "Unpaid" ) {
                                    $due++;
                                    array_push( $display_unique_months, $display_months[$i] );
                                }
                            }
                            $info = $obj->non_r_info_by_roll( $info1['r_roll'] );

                        ?>
                    <tr>
                        <td><?php echo $count++; ?></td>
                        <td style="text-align:left"><?php echo $info['non_r_name']; ?></td>
                        <td><?php echo $info['non_r_roll']; ?></td>
                        <td><?php echo $info['non_r_reg']; ?></td>

                        <td><?php echo $info['non_r_session'] . " - " . ( $info['non_r_session'] + 1 ); ?></td>
                        <?php if ( $_SESSION['admin_status'] == "Provost" || $_SESSION['admin_status'] == "Assistant Provost" ) {?>
                        <td style="text-align:left">

                            <a href="tel:<?php echo $info['non_r_mob']; ?>"><?php echo $info['non_r_mob']; ?></a>
                            <br>
                            <a href="mailto:<?php echo $info['non_r_email']; ?>"><?php echo $info['non_r_email']; ?></a>
                        </td>
                        <?php }?>
                        <td style="text-align:left">
                            <b>Room No: </b><i><?php echo $info['non_r_rm']; ?></i>
                            <br>
                            <b>Hall ID: </b><i><?php echo $info['non_r_hall_id']; ?></i>
                            <br>
                        </td>
                        <td style="white-space: normal;">
                            <?php
                                foreach ( $display_unique_months as $variable ) {
                                        echo $variable . " ";
                                    }
                                    if ( empty( $display_unique_months ) ) {
                                        echo "0";
                                    } else {
                                        echo "-" . $info1['r_year'];
                                    }
                                ?>
                        </td>

                        <td
                            style="                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               <?php if ( $due > 3 ) {echo 'color:red;';}?>">
                            <?php echo $due; ?></td>

                    </tr>
                    <?php }?>

                    <?php } else {?>
                    <tr>
                        <td colspan=8 style="color:red;">No Search's Result Found !!</td>
                    </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>