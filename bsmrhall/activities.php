<?php
    include "class/function.php";
    $obj1 = new students_info();
?>
<?php session_start();?>
<?php include_once "includes/head.php"?>


<body>
    <?php include_once "includes/header.php"?>


    <div>
        <?php
            $activities_data = file_get_contents( 'contents/activities.json' );
            $activities      = json_decode( $activities_data );
            if ( isset( $_GET['status'] ) ) {
                if ( $_GET['status'] == "activities" && isset( $_GET['id'] ) ) {
                    $id = $_GET['id'];
                ?>


        <!-- Start notice banner ==== -->
        <div class="notice_banner shadow dark  text-center text-light"
            style="background-image: url(<?php echo $activities[$id]->banner ?>),linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)); height: 100%; background-position: center;background-size: cover;background-repeat: no-repeat;height: 330px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 notice_banner_msg">
                        <h1><?php echo $activities[$id]->title ?></h1>
                        <ul class="notice_icon_text">
                            <li><a href="index"><i class="fas fa-home"></i> Home</a></li>
                            <li class="active">Details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Start Course Details
    ============================================= -->
        <div class="course-details-area default-padding">
            <div class="container">
                <div class="row">
                    <div class="top-author top-authors"
                        style="border-top: 3px solid #1C4370;box-shadow:0 0 10px rgba(50, 50, 50, .17); ">
                        <div class="clearfix"></div>
                        <div class="col-sm-12 text-justify margin-top-30px  language_author">
                            <h4><?php echo $activities[$id]->title ?></h4>
                            <p style="text-align:justify;"><?php echo $activities[$id]->description ?></p>
                        </div>
                    </div>

                    <!-- Start Course Sidebar -->

                    <!-- End Course Sidebar -->

                </div>
            </div>
        </div>
        <!-- End content ============================================= -->

    </div>

    <?php
        } else {
                echo "<h4 style = 'color:red; text-align:center; margin:25%;'>Not Accessible</h4>";
            }

        } else {
            echo "<h4 style = 'color:red; text-align:center; margin:25%;'>Not Accessible</h4>";
        }

    ?>

    <!-- footer -->
    <?php include_once "includes/footer.php"?>
    <!-- Footer -->


    <?php include_once 'includes/script.php';?>

</body>

</html>