<?php
    include "class/function.php";
    $obj = new std_list_project();
    session_start();
    $id = $_SESSION['admin_id'];
    if ( $id == null ) {
        header( "location: index" );
    }
    if ( isset( $_GET['status'] ) ) {
        if ( $_GET['status'] == 'logout' ) {
            $obj->logout_info();
        }
    }

include_once "include/head.php";?>


<body class="sb-nav-fixed">
    <?php include_once "include/topnav.php";?>
    <div id="layoutSidenav">
        <?php include_once "include/sidenav.php";?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid" style="overflow:hidden;">
                    <?php
                        if ( !isset( $view ) ) {
                            include 'view/dashboard_view.php';
                        } else {
                            if ( $view == "dashboard" ) {
                                include 'view/dashboard_view.php';
                            } elseif ( $view == "sub_admin_list" ) {
                                include 'view/sub_admin_list_view.php';
                            } elseif ( $view == "add_sub_admin" ) {
                                include 'view/add_sub_admin_view.php';
                            } elseif ( $view == "manage_sub_admin" ) {
                                include 'view/manage_sub_admin_view.php';
                            } elseif ( $view == "admin_update" ) {
                                include 'view/admin_update_view.php';
                            } elseif ( $view == "residential_info" ) {
                                include 'view/residential_info_view.php';
                            } elseif ( $view == "residential_payment_check" ) {
                                include 'view/residential_payment_check_view.php';
                            } elseif ( $view == "non_residential_info" ) {
                                include 'view/non_residential_info_view.php';
                            } elseif ( $view == "manage_message" ) {
                                include 'view/manage_message_view.php';
                            } elseif ( $view == "payment_history" ) {
                                include 'view/payment_history_view.php';
                            } elseif ( $view == "manage_history" ) {
                                include 'view/manage_history_view.php';
                            } elseif ( $view == "residential_list" ) {
                                include 'view/residential_list_view.php';
                            } elseif ( $view == "residential_update" ) {
                                include 'view/residential_update_view.php';
                            } elseif ( $view == "payment_query" ) {
                                include 'view/payment_query_view.php';
                            } elseif ( $view == "payment_change" ) {
                                include 'view/payment_change_view.php';
                            } elseif ( $view == "add_receipt" ) {
                                include 'view/add_receipt_view.php';
                            } elseif ( $view == "manage_receipt" ) {
                                include 'view/manage_receipt_view.php';
                            } elseif ( $view == "previous_admin" ) {
                                include 'view/previous_admin_view.php';
                            } elseif ( $view == "previous_std" ) {
                                include 'view/previous_std_view.php';
                            } elseif ( $view == "previous_std_payment" ) {
                                include 'view/previous_std_payment_view.php';
                            } elseif ( $view == "token" ) {
                                include 'view/token_view.php';
                            } elseif ( $view == "add_notice" ) {
                                include 'view/add_notice_view.php';
                            } elseif ( $view == "manage_notice" ) {
                                include 'view/manage_notice_view.php';
                            } elseif ( $view == "add_hall_id" ) {
                                include 'view/add_hall_id_view.php';
                            } elseif ( $view == "manage_hall_id" ) {
                                include 'view/manage_hall_id_view.php';
                            } elseif ( $view == "temp_residential_list" ) {
                                include 'view/temp_residential_list_view.php';
                            } elseif ( $view == "dining_manager" ) {
                                include 'view/dining_manager_view.php';
                            }

                        }

                    ?>
                </div>
            </main>
            <?php include_once "include/footer.php";?>
        </div>
    </div>
    <?php include_once "include/script.php";?>
</body>

</html>