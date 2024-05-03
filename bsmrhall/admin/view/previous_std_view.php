<?php

    $non_r_info = $obj->display_pre_residential_info();
?>
<br>
<div class="card mb-4">
    <div class="card-header">
        <h4>
            <i class="fas fa-table mr-1"></i> Previous Student's List:
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
                        <th>Roll & Reg No</th>
                        <th>Description</th>
                        <th>Address</th>
                        <th>Durability</th>
                        <th>Image</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Roll & Reg No</th>
                        <th>Description</th>
                        <th>Address</th>
                        <th>Durability</th>
                        <th>Image</th>

                    </tr>
                </tfoot>
                <tbody>
                    <?php $count = 1;while ( $info = mysqli_fetch_assoc( $non_r_info ) ) {?>
                    <tr>
                        <td><?php echo $count++; ?></td>
                        <td style="text-align:left"><?php echo $info['non_r_name']; ?></td>
                        <td style="text-align:left">
                            <b>Roll No: </b><?php echo $info['non_r_roll']; ?>
                            <br>
                            <b>Reg No: </b><?php echo $info['non_r_reg']; ?>
                            <br>
                            <b>Hall ID: </b><?php echo $info['non_r_hall_id']; ?>
                            <br>
                            <b>Session:
                            </b><?php echo $info['non_r_session'] . " - " . ( $info['non_r_session'] + 1 ); ?>


                        </td>
                        <td style="text-align:left;white-space: normal;">
                            <b>Room No: </b><?php echo $info['non_r_rm']; ?>
                            <br>
                            <b>Dept: </b><?php echo $info['non_r_dept']; ?>
                            <br>
                            <b>Father: </b><?php echo $info['non_r_fname']; ?>
                            <br>
                            <b>Mother: </b><?php echo $info['non_r_mname']; ?>

                        </td>
                        <td style="text-align:left;">
                            <?php
                            if ( $_SESSION['admin_status'] == "Provost" || $_SESSION['admin_status'] == "Assistant Provost" ) {?>
                            <b>Mobile: </b><i><a
                                    href="tel:<?php echo $info['non_r_mob']; ?>"><?php echo $info['non_r_mob']; ?></a></i>
                            <br>
                            <b>Email: </b><i><a
                                    href="mailto:<?php echo $info['non_r_email']; ?>"><?php echo $info['non_r_email']; ?></a></i>
                            <br>
                            <?php }?>
                            <b>Present: </b><i
                                style="white-space: normal;"><?php echo $info['non_r_pre_address']; ?></i>
                            <br>
                            <b>Permanent: </b><i
                                style="white-space: normal;"><?php echo $info['non_r_per_address']; ?></i>
                        </td>
                        <td style="text-align:left">
                            <b>Admission Date: </b><?php echo $info['non_r_start']; ?>
                            <br>
                            <b>Ending Date: </b><?php echo $info['non_r_end']; ?>
                        </td>


                        <td><img src="../pdf/uploads/<?php echo $info['non_r_img']; ?>" height="80px" width="70px"
                                alt="Not Found"></td>

                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>