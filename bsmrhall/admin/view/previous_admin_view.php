<?php
    $data = $obj->display_pre_admin_list();
?>

<br>
<div class="card mb-4">
    <div class="card-header">
        <h4> <i class="fas fa-table mr-1"></i> Previous Admins:</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered vertical_align" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Joining Date</th>
                        <th>Ending Date</th>
                        <th>Status</th>
                        <th>Image</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Joining Date</th>
                        <th>Ending Date</th>
                        <th>Status</th>
                        <th>Image</th>

                    </tr>
                </tfoot>
                <tbody>
                    <?php
                        $cout              = 1;
                        $provost           = 1;
                        $assistant_provost = 1;
                        $admin_officer     = 1;
                    while ( $info = mysqli_fetch_assoc( $data ) ) {?>
                    <tr>
                        <td><?php echo $cout++; ?></td>
                        <td><?php echo $info['admin_name']; ?></td>
                        <td>
                            <a href="mailto:<?php echo $info['admin_email']; ?>">
                                <?php echo $info['admin_email']; ?>
                            </a>
                        </td>
                        <td><?php echo $info['admin_start']; ?></td>
                        <td><?php echo $info['admin_end']; ?></td>
                        <td><?php
                            if ( $info['admin_status'] == "Provost" ) {?>
                            <b style="color:green;">*</b>
                            <?php echo $info['admin_status'] . " - (" . $provost . ")";
                                    $provost++;
                                } elseif ( $info['admin_status'] == "Assistant Provost" ) {
                                    echo $info['admin_status'] . " - (" . $assistant_provost . ")";
                                    $assistant_provost++;
                                } elseif ( $info['admin_status'] == "Admin Officer" ) {
                                    echo $info['admin_status'] . " - (" . $admin_officer . ")";
                                    $admin_officer++;
                                }
                                ?>
                        </td>
                        <td><img src="./assets/img/<?php echo $info['admin_img']; ?>" height="80px" width="70px"
                                alt="Not Found"></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>