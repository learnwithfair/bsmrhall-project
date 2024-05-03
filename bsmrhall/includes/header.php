<!-- Header -->


<!-- ######################## -->
<!-- Temporary Data -->
<!-- <header style="margin-bottom:78px;"> -->
<!-- Temporary Data -->
<header>
    <!-- Navbar -->
    <?php
        //session_start();

    ?>
    <div class="main_header_areas" id="header">
        <!------------- or class=" main_header_areas"----------------->

        <div id="main_header_area" style="overflow-x:hidden;clear:both;">
            <div class="inner_main_header container">
                <div class="logo_area ">
                    <a href="./"><img class="img" src="./assets/img/pust.png" alt="logo "></a>
                </div>
                <div class="hall_name">
                    <p>Bangabandhu Sheikh Mujibur Rahman Hall</p>
                </div>
            </div>
        </div>

        <!------------- Header ----------------->
        <header class="header">
            <div class="nav container">
                <div href="index" class="nav_logo">
                    <img class="img" src="./assets/img/pust.png" alt="">
                </div>

                <nav class="nav_menu" id="nav-menu">
                    <ul class="nav_list">
                        <li class="nav_item">
                            <a href="index"
                                class="<?php echo ( basename( $_SERVER['PHP_SELF'] ) == "index.php" || basename( $_SERVER['PHP_SELF'] ) == "/" ) ? "active" : ""; ?> nav_link">Home</a>
                        </li>

                        <li class="nav_item">
                            <a href="current_administration"
                                class="<?php echo ( basename( $_SERVER['PHP_SELF'] ) == "current_administration.php" || basename( $_SERVER['PHP_SELF'] ) == "former_administration.php" ) ? "active" : ""; ?> nav_link">ADMINISTRATION
                                <i class="ri-arrow-down-s-line" ></i></a>

                            <ul>
                                <li><a class="<?php echo ( basename( $_SERVER['PHP_SELF'] ) == "current_administration.php" ) ? "active" : ""; ?>"
                                        href="current_administration" style ="text-align: left;">Hall administration</a></li>

                                <li><a class="<?php echo ( basename( $_SERVER['PHP_SELF'] ) == "former_administration.php" ) ? "active" : ""; ?>"
                                        href="former_administration" style ="text-align: left;">administrator (former)</a></li>
                            </ul>
                        </li>

                        <li class="nav_item">
                            <a href="contact_us"
                                class="<?php echo ( basename( $_SERVER['PHP_SELF'] ) == "contact_us.php" ) ? "active" : ""; ?> nav_link">CONTACT
                                US</a>
                        </li>

                        <li class="nav_item">
                            <a href="all_notice"
                                class="<?php echo ( basename( $_SERVER['PHP_SELF'] ) == "all_notice.php" ) ? "active" : ""; ?> nav_link">NOTICE</a>
                        </li>

                        <?php if ( isset( $_SESSION['user_roll'] ) ) {?>
                        <li class="nav_item">
                            <a href="profile"
                                class="<?php echo ( basename( $_SERVER['PHP_SELF'] ) == "profile.php" ) ? "active" : ""; ?> nav_link">PROFILE</a>
                        </li>

                        <?php } elseif ( isset( $_SESSION['hall_manager'] ) ) {?>

                        <li class="nav_item">
                            <a href="meal_info"
                                class="<?php echo ( basename( $_SERVER['PHP_SELF'] ) == "meal_info.php" ) ? "active" : ""; ?> nav_link">MEAL
                                INFO</a>
                        </li>

                        <?php } else {?>

                        <li class="nav_item">
                            <a href="log_in"
                                class="<?php echo ( basename( $_SERVER['PHP_SELF'] ) == "log_in.php" ) ? "active" : ""; ?> nav_link">LOG
                                IN</a>
                        </li>
                        <?php }?>


                    </ul>
                    <div class="nav_close" id="nav-close">
                        <i class="ri-close-line"></i>
                    </div>
                </nav>

                <div class="nav_btns">
                    <!-- Theme change button -->
                    <div class="nav_toggle" id="nav-toggle">
                        <i class="ri-menu-line"></i>
                    </div>
                </div>
            </div>
        </header>
    </div>
</header>