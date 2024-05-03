<?php

    if ( isset( $_GET['status'] ) ) {
        if ( $_GET['status'] == "mgs_dlt" ) {
            $dlt_id  = $_GET['id'];
            $dlt_mgs = $obj->mgs_dlt( $dlt_id );
        }
    }
    $history_data_count = $obj->display_history();
    $number             = mysqli_num_rows( $history_data_count );
    // How many Display Items
    $display_items = 3000;
    if ( $number > $display_items ) {
        $obj->delete_history( $display_items );
    }

    $history_data = $obj->display_history();
?>

<br>
<div class="card mb-4">
    <div class="card-header">
        <h4>

            <i class="fas fa-table mr-1"></i> Payment History:
        </h4>
        <div></div>
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
                <tfoot>
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
                </tfoot>
                <tbody>
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
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>