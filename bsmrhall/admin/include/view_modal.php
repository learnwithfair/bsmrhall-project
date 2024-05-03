<!-- Small modal -->
<style>
.modal_icon {

    text-align: center;
    padding: 10px;
    width: 100%;
}
</style>
<!-- Modal -->
<div class="modal fade" id="t_view_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title  modal_icon" id="exampleModalScrollableTitle">TOKEN INFO OF BSMRH</h5>

            </div>
            <div class="modal-body table-responsive">
                <table class="table " width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Roll No</th>
                            <th>Reg No</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Roll No</th>
                            <th>Reg No</th>
                        </tr>
                    </tfoot>
                    <tbody class="table-bordered">
                        <?php
                            for ( $i = 1; $i <= $_SESSION['t_count']; $i++ ) {

                                $t_rolls = "t_roll" . (string) $i;
                                $t_regs  = "t_reg" . (string) $i;

                            ?>
                        <tr>
                            <td style="border-right: 1px solid #dee2e6;"><?php echo $_SESSION[$t_rolls]; ?></td>
                            <td><?php echo $_SESSION[$t_regs]; ?></td>


                        </tr>


                        <?php
                            }

                        ?>
                    </tbody>

                </table>
            </div>
            <hr>
            <div class="modal_icon">
                <button type="button" class="btn btn-success" data-dismiss="modal">Ok</button>

            </div>
        </div>
    </div>
</div>