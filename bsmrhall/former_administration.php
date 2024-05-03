<?php
    include "class/function.php";
    $obj1 = new students_info();
?>
<?php session_start();?>
<?php include_once "includes/head.php"?>

<?php
    $former_provost_assistant_datas = file_get_contents( 'contents/former_provost_assistant.json' );
    $former_provost_assistant_data  = json_decode( $former_provost_assistant_datas );

    $former_provost_datas = file_get_contents( 'contents/former_provost.json' );
    $former_provost_data  = json_decode( $former_provost_datas );
?>
<?php
    if ( isset( $_POST['mgs_submit_btn'] ) ) {
        $send_mgs = $obj1->put_comments( $_POST );
    }

?>
<!-- ///////// -->
<link rel="stylesheet" href="css/testi_style.css" />
<link rel="stylesheet" href="css/owl.carousel.css" />
<link rel="stylesheet" href="css/responsive_testi_style.css" />


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
                style="background-image: url(assets/img/images/BSMRH6.jpg), linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));height:330px; ">

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-content">
                                <!--<h4>ADMINISTRATION</h4>-->
                                <h2>FORMER ADMINISTRATORS</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- Banner Ends Here -->

        <!--
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
                        <img src="assets/img/images/BSMRH.jpg" width="100%" height="428px" alt="" class="rounded" />
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="card mx-auto card-margin">
                        <div class="card-body p-5">
                            <h3 class="card-title text-center pb-5">About The BSMRH (PUST)</h3>
                            <div>
                                <p style="text-align:justify;">
                                    Bangabandhu Sheikh Mujibur Rahman Hall (BSMRH) (Bengali: বঙ্গবন্ধু শেখ
                                    মুজিবুর রহমান
                                    হল) is a government financed public university in
                                    Bangladesh.[1] PUST was established in 2008. It is the first science and
                                    Technology
                                    University and third public University in Rajshahi Division. It started its
                                    four-year undergraduate programme in 2009.This university plays an
                                    innovative role
                                    in providing need-based higher education, training, and research. It is the
                                    7th
                                    science and technology University and 29th public University in Bangladesh
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br> -->
        <!-- ######################################################## -->
        <section class="p-5" style="background-color:#EFEFEF; ">
            <div class="container" style="margin-top:-50px;">

                <div class="row">
                    <div class="col-xl-8 mx-auto text-center">
                        <div class="section-title" id="former-of-the-Provost">
                            <h2>FORMER PROVOST</h2>
                            <p style="color:#333">Bangabandhu Sheikh Mujibur Rahman Hall (BSMRH)</p>
                        </div>
                    </div>
                </div>
            </div>
            <br><br><br>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="testimonials owl-carousel">
                            <?php foreach ( $former_provost_data as $data ) {?>

                            <div class="single-testimonial">
                                <div class="testi-img">
                                    <img src="<?php echo $data->img; ?>" alt="Not Found" />
                                </div>
                             <br/>
                                
                                <h4><?php echo $data->name; ?><span></span></h4>
                                <ul class="list-unstyled  list_style">
                                    <li>
                                        <i class='fa fa-phone f-hover-color'></i><a class="f-hover-color"
                                            href="tel:+01712415335"><?php echo $data->phone; ?></a>
                                    </li>
                                    <li>
                                        <i class='fa fa-envelope f-hover-color'></i><a class="f-hover-color"
                                            href="mailto:fom_06@pust.ac.bd"><?php echo $data->email1; ?></a>
                                    </li>
                                    <li>
                                        <i class='fa fa-envelope f-hover-color'></i><a class="f-hover-color"
                                            href="mailto:fom_06@yahoo.com"><?php echo $data->email2; ?></a>
                                    </li>
                                </ul>
                                

                                <a href="<?php echo $data->link; ?>" target=_blank>
                                    <button class="btn btn-info view-btn">View Profile</button>
                                </a>
                            </div>

                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ############################  -->

        <!-- ######################################################## -->
        <section class="p-5" style="background-color:#EFEFEF; ">
            <div class="container" style="margin-top:-50px;">

                <div class="row">
                    <div class="col-xl-8 mx-auto text-center">
                        <div class="section-title" id="Office-of-the-Provost">
                            <h2>FORMER ASSISTANT PROVOST</h2>
                            <p style="color:#333">Bangabandhu Sheikh Mujibur Rahman Hall (BSMRH)</p>
                        </div>
                    </div>
                </div>
            </div>
            <br><br><br>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="testimonials owl-carousel">
                            <?php foreach ( $former_provost_assistant_data as $data ) {?>

                            <div class="single-testimonial">
                                <div class="testi-img">
                                    <img src="<?php echo $data->img; ?>" alt="Not Found" />
                                </div>
                                <br/>
                                <h4><?php echo $data->name; ?></h4>
                                <ul class="list-unstyled  list_style">
                                    <li>
                                        <i class='fa fa-phone f-hover-color'></i><a class="f-hover-color"
                                            href="tel:+01712415335"><?php echo $data->phone; ?></a>
                                    </li>
                                    <li>
                                        <i class='fa fa-envelope f-hover-color'></i><a class="f-hover-color"
                                            href="mailto:fom_06@pust.ac.bd"><?php echo $data->email1; ?></a>
                                    </li>
                                    <li>
                                        <i class='fa fa-envelope f-hover-color'></i><a class="f-hover-color"
                                            href="mailto:fom_06@yahoo.com"><?php echo $data->email2; ?></a>
                                    </li>
                                </ul>
                                

                                <a href="<?php echo $data->link; ?>" target=_blank>
                                    <button class="btn btn-info view-btn">View Profile</button>
                                </a>
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