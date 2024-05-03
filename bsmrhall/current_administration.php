<?php
    include "class/function.php";
    $obj1 = new students_info();
?>
<?php session_start();?>
<?php include_once "includes/head.php"?>

<?php
    $current_provost_datas = file_get_contents( 'contents/current_provost.json' );
    $current_provost_data  = json_decode( $current_provost_datas );
    $current_staff_datas   = file_get_contents( 'contents/current_staff.json' );
    $current_staff_data    = json_decode( $current_staff_datas );
?>
<?php
    if ( isset( $_POST['mgs_submit_btn'] ) ) {
        $send_mgs = $obj1->put_comments( $_POST );
    }

?>
<!-- ///////// -->
<link rel="stylesheet" href="css/testi_style.css" />
<link rel="stylesheet" href="css/owl.carousel.css" />

<!-- Additional CSS Files -->
<!-- <link rel="stylesheet" href="assets/css/fontawesome.css"> -->
<!-- For Slide -->

<!-- <link rel="stylesheet" href="assets/css/owl.css"> -->
<!-- ///////// -->

<body>

    <?php include_once "includes/header.php"?>


    <div>
        <!-- Banner Starts Here -->
        <div class="heading-page header-text">
            <section class="page-heading"
                style="background-image: url(assets/img/images/BSMRH3.jpg), linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));height:330px; ">

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-content">
                                <h2>ADMINISTRATION</h2>
                                <!--<h2>ADMINISTRATION</h2>-->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- Banner Ends Here -->


        <div class="container">

            <div class="row">
                <div class="col-xl-8 mx-auto text-center">
                    <div class="section-title">
                        <h2>About Us</h2>
                        <p>Bangabandhu Sheikh Mujibur Rahman Hall (BSMRH)</p>
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top:0px;">
                <div class="col-md-6">

                    <div class="card-margin">
                        <img src="assets/img/images/prapr.jpg" width="100%" height="428px" alt="" class="rounded" />
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="card mx-auto card-margin">
                        <div class="card-body p-5">
                            <h3 class="card-title text-center pb-5">AT A GLANCE</h3>
                            <div>
                                <p style="text-align:justify;">
                                    Bangabandhu Sheikh Mujibur Rahman Hall (BSMRH) (Bengali: বঙ্গবন্ধু শেখ
                                    মুজিবুর রহমান হল) is the first residential hall for boys in Pabna University of Science and Technology. The hall started its journey from 2015 and around 500 studens are living in the hall at present. The hall is divided in 2 blocks.
                                    Those are Block-A & Block-B. The hall includes 2 mosques and 1 temple for the religious activities of the students. In addition, there are paper room, game room, reading room and television room to accelerate the lifestyle of the students.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <!-- ######################################################## -->
 <!--For Provost-->
    <!-- ######################################################## -->
    <section class="p-5" style="background-color:#EFEFEF; ">
        <div class="container" style="margin-top:-100px;">

            <div class="row">
                <div class="col-xl-8 mx-auto text-center">
                    <div class="section-title" id="Office-of-the-Provost">
                        <h2>PROVOST</h2>
                        <p style="color:#8e8080">Bangabandhu Sheikh Mujibur Rahman Hall (BSMRH)</p>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="testimonials">

                        <div class="card">
                            <div class="image-content">

                                <span class="overlay"></span>
                                <div class="card-image">
                                    <img src="admin/assets/img/omar faruk.jpg" alt="" class="card-img">
                                </div>
                            </div>
                            <div class="card-content">
                                <h5 style="color:#fb9857">Dr. Md. Omar Faruk</h5>
                                <h6 style="color:black;">Provost</h6>
                                <b class="description">Bangabandhu Sheikh Mujibur Rahman Hall</br>
                                    <b>Pabna University of Science and Technology (PUST)</b>
                                </b>
                                <a href="https://pust.ac.bd/academic/departments/dept_teachers/dept_teachers_profile/100073" class="button" target="_blank"
                                    rel="noopener noreferrer">View Profile</a>

                            </div>

                        </div>



                    </div>

                </div>

            </div>

        </div>
    </section>
      <!-- ######################################################## -->
 <!--For Assistant Provost-->
    <!-- ######################################################## -->
    <section class="p-5" style="background-color:#EFEFEF; ">
        <div class="container" style="margin-top:-130px;">

            <div class="row">
                <div class="col-xl-8 mx-auto text-center">
                    <div class="section-title" id="Office-of-the-Provost">
                        <h2>Assistant PROVOST</h2>
                        <p style="color:#8e8080">Bangabandhu Sheikh Mujibur Rahman Hall (BSMRH)</p>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="testimonials  owl-carousel">
                        <?php foreach ( $current_provost_data as $data ) {?>
                        <div class="card swiper-slide ">
                            <div class="image-content">

                                <span class="overlay"></span>
                                <div class="card-image">
                                    <img src="<?php echo $data->img; ?>" alt="" class="card-img">
                                </div>
                            </div>
                            <div class="card-content">
                                <h5 style="color:#fb9857"><?php echo $data->name; ?></h5>
                                <h6 style="color:black;"><?php echo $data->status; ?></h6>
                                <b class="description">Bangabandhu Sheikh Mujibur Rahman Hall</br>
                                    <b>Pabna University of Science and Technology (PUST)</b>
                                </b>
                                <a href="<?php echo $data->link; ?>" class="button" target="_blank"
                                    rel="noopener noreferrer">View Profile</a>

                            </div>

                        </div>
                        <?php }?>


                    </div>

                </div>

            </div>

        </div>
    </section>
    <!-- ############################  -->
     <!--For Office Staff-->
     <!-- ######################################################## -->
    <section class="p-5" style="background-color:#EFEFEF; ">
        <div class="container" style="margin-top:-130px;">

            <div class="row">
                <div class="col-xl-8 mx-auto text-center">
                    <div class="section-title" id="Office-of-the-Provost">
                        <h2>Officer and Staff</h2>
                        <p style="color:#8e8080">Bangabandhu Sheikh Mujibur Rahman Hall (BSMRH)</p>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="testimonials  owl-carousel">
                        <?php foreach ( $current_staff_data as $data ) {?>
                        <div class="card swiper-slide ">
                            <div class="image-content">

                                <span class="overlay"></span>
                                <div class="card-image">
                                    <img src="<?php echo $data->img; ?>" alt="" class="card-img">
                                </div>
                            </div>
                            <div class="card-content">
                                <h5 style="color:#fb9857"><?php echo $data->name; ?></h5>
                                <h6 style="color:black;"><?php echo $data->status; ?></h6>
                                <b class="description">Bangabandhu Sheikh Mujibur Rahman Hall</br>
                                    <b>Pabna University of Science and Technology (PUST)</b>
                                </b>
                                <a href="<?php echo $data->link; ?>" class="button" target="_blank"
                                    rel="noopener noreferrer">View Profile</a>

                            </div>

                        </div>
                        <?php }?>


                    </div>

                </div>

            </div>

        </div>
    </section>
    <!-- ############################  -->


    <!-- footer -->
    <?php include_once "includes/footer.php"?>
    <!-- Footer -->


    <?php include_once 'includes/script.php';?>
    <script src="js/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/owl.carousel.min.js"></script>


</body>

</html>