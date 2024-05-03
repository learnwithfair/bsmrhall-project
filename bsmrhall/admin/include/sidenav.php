<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="dashboard">
                    <div class="sb-nav-link-icon"><i class="fa fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                <?php if ( $_SESSION['admin_status'] == "Provost" ) {?>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseadmin"
                    aria-expanded="false" aria-controls="collapseadmin">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-circle"></i></div>
                    Admin
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseadmin" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">

                        <a class="nav-link" href="add_sub_admin"><i class="fa fa-angle-double-right"></i> &nbsp;Add
                            Admin</a>
                        <a class="nav-link" href="manage_sub_admin"><i class="fa fa-angle-double-right"></i>
                            &nbsp;Manage Admin</a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsereceipt"
                    aria-expanded="false" aria-controls="collapsereceipt">
                    <div class="sb-nav-link-icon"><i class='fas fa-receipt'></i></div>
                    Receipt
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsereceipt" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">

                        <a class="nav-link" href="add_receipt"><i class="fa fa-angle-double-right"></i> &nbsp;Add
                            Receipt</a>
                        <a class="nav-link" href="manage_receipt"><i class="fa fa-angle-double-right"></i>
                            &nbsp;Manage Receipt</a>
                    </nav>
                </div>

                <!-- Illigal Student  -->
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsetmpstudent"
                    aria-expanded="false" aria-controls="collapsetmpstudent">
                    <div class="sb-nav-link-icon"><i class="fas fa-fire-alt"></i></div>
                    Hall ID
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsetmpstudent" aria-labelledby="headingOne"
                    data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">

                        <a class="nav-link" href="add_hall_id"><i class="fa fa-angle-double-right"></i> &nbsp;Add
                            Hall ID</a>
                        <a class="nav-link" href="manage_hall_id"><i class="fa fa-angle-double-right"></i>
                            &nbsp;Manage Hall ID</a>
                    </nav>
                </div>

                <?php } else {?>
                <a class="nav-link" href="sub_admin_list">
                    <div class="sb-nav-link-icon"><i class="fas fa-user fa-fw"></i></div>
                    Admin List
                </a>
                <?php }?>
                <a class="nav-link" href="non_residential_info">
                    <div class="sb-nav-link-icon"><i class="fa fa-bell"></i></div>
                    New Applicants
                </a>
                <!-- <a class="nav-link" href="residential_list">
                    <div class="sb-nav-link-icon"><i class="far fa-check-circle"></i></div>
                    Residential List
                </a>
                <a class="nav-link" href="residential_info">
                    <div class="sb-nav-link-icon"><i class="fa fa-info-circle"></i></div>
                    Residential Info
                </a> -->
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseresidential"
                    aria-expanded="false" aria-controls="collapseresidential">
                    <div class="sb-nav-link-icon"><i class="fa fa-info-circle"></i></div>
                    Residential
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseresidential" aria-labelledby="headingOne"
                    data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="residential_list"><i class="fa fa-angle-double-right"></i>
                            &nbsp;Student's List</a>
                        <a class="nav-link" href="temp_residential_list"><i class="fa fa-angle-double-right"></i>
                            &nbsp;Temporary List</a>
                        <a class="nav-link" href="residential_info"><i class="fa fa-angle-double-right"></i>
                            &nbsp;Payment Status</a>
                        <a class="nav-link" href="residential_payment_check"><i class="fa fa-angle-double-right"></i>
                            &nbsp;Payment Check</a>

                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsepayment"
                    aria-expanded="false" aria-controls="collapsepayment">
                    <div class="sb-nav-link-icon"><i class="far fa-check-circle"></i></div>
                    Payment
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsepayment" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="payment_query"><i class="fa fa-angle-double-right"></i>
                            &nbsp;Payment Query</a>
                        <?php if ( $_SESSION['admin_status'] == "Provost" || $_SESSION['admin_status'] == "Assistant Provost" ) {?>
                        <a class="nav-link" href="payment_change"><i class="fa fa-angle-double-right"></i>
                            &nbsp;Payment Change</a>
                        <?php }?>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsepreivious"
                    aria-expanded="false" aria-controls="collapsepreivious">
                    <div class="sb-nav-link-icon"><i class="fa fa-info-circle"></i></div>
                    Previous Info
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsepreivious" aria-labelledby="headingOne"
                    data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="previous_admin"><i class="fa fa-angle-double-right"></i>
                            &nbsp;Admin's Info</a>
                        <a class="nav-link" href="previous_std"><i class="fa fa-angle-double-right"></i>
                            &nbsp;Student's Info</a>
                        <a class="nav-link" href="previous_std_payment"><i class="fa fa-angle-double-right"></i>
                            &nbsp;Payment Check</a>


                    </nav>
                </div>
                <a class="nav-link" href="token">
                    <div class="sb-nav-link-icon"><i class='fas fa-coins'></i></div>
                    Token
                </a>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsenotice"
                    aria-expanded="false" aria-controls="collapsenotice">
                    <div class="sb-nav-link-icon"><i class="fa fa-bell"></i></div>
                    Notice
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsenotice" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="add_notice"><i class="fa fa-angle-double-right"></i>
                            &nbsp;Upload Notice</a>
                        <a class="nav-link" href="manage_notice"><i class="fa fa-angle-double-right"></i>
                            &nbsp;Manage Notice</a>


                    </nav>
                </div>
                <?php if ( $_SESSION['admin_status'] == "Provost" || $_SESSION['admin_status'] == "Assistant Provost" ) {?>
                    <a class="nav-link" href="dining_manager">
                    <div class="sb-nav-link-icon"><i class='fas fa-user-circle'></i></div>
                    Dining Manager
                </a>

                    <?php }?>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsehistory"
                    aria-expanded="false" aria-controls="collapsehistory">
                    <div class="sb-nav-link-icon"><i class="fa fa-history"></i></div>
                    History
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsehistory" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="payment_history"><i class="fa fa-angle-double-right"></i>
                            &nbsp;Payment History</a>
                        <a class="nav-link" href="manage_history"><i class="fa fa-angle-double-right"></i>
                            &nbsp;Manage History</a>


                    </nav>
                </div>
                <a class="nav-link" href="manage_message">
                    <div class="sb-nav-link-icon"><i class="fa fa-envelope"></i></div>
                    Complain
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            <?php echo $_SESSION['admin_name']; ?>
        </div>
    </nav>
</div>