<?php
    include "class/function.php";
    $obj1 = new students_info();
?>
<?php session_start();?>
<?php include_once "includes/head.php"?>

<?php
    if ( isset( $_POST['mgs_submit_btn'] ) ) {
        $send_mgs = $obj1->put_comments( $_POST );
    }

?>
<!-- ///////// -->
<link rel="stylesheet" href="css/testi_style.css" />
<link rel="stylesheet" href="css/owl.carousel.css" />
<link rel="stylesheet" href="css/3d-demo.css">
<link rel="stylesheet" href="css/3d-demo_responsive.css">
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
                style="background-image: url(assets/img/images/BSMRH3.jpg), linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));height:330px">
                <!-- height:330px -->
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-content">

                                <!--<h4>Contact Us</h4>-->
                                <h2>Contact us</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- Banner Ends Here -->
        <!-- ---------------------- -->
        <div class="container">
            <div class="row">
                <div class="col-xl-8 mx-auto text-center">
                    <div class="section-title">
                        <h2>Contact Us</h2>
                        <p>Bangabandhu Sheikh Mujibur Rahman Hall (BSMRH)</p>
                    </div>
                </div>
            </div>
            <?php if ( isset( $_SESSION['user_roll'] ) ) {?>
            <div class="row" style="padding-bottom:3rem;">
                <div class="col-md-6 row1">
                    <!-- <div class="card-margin p-2 pe-4 "> -->
                    <div class="card mx-auto card-margin">
                        <div class="card-body p-3">
                            <div id="map">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1822.2650476367444!2d89.2774444723422!3d24.012365200000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fe84f090dfdee5%3A0x44a1c14abe8ebf89!2sBangabandhu%20Sheikh%20Mujibur%20Rahman%20Hall!5e0!3m2!1sen!2sbd!4v1660297056491!5m2!1sen!2sbd"
                                    width="100%" height="397" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>

                            </div>
                            <br>
                            <!-- Section: Links -->
                            <?php include "includes/social_link.php";?>
                        </div>
                    </div>

                </div>
                <div class="col-md-6 row1">
                    <div class="card mx-auto card-margin">
                        <div class="card-body p-5">
                            <!-- ########################## -->

                            <h3 class="card-title text-center pb-3">Send Messages</h3>

                            <?php if ( isset( $send_mgs ) ) {
                                    if ( $send_mgs == "successful" ) {
                                        $s_mgs = "SUCCESSFULLY SENT";
                                        include 'admin/include/success_modal.php';

                                    } else {
                                        include 'admin/include/error_modal.php';
                                    }

                            }?>
                            <form action="" method="post">
                                <div style="color:red;font-size:12px;margin-bottom:10px;">Required Field *</div>
                                <!-- Roll & Reg input -->
                                <!-- <div class="row mb-4">
                                    <div class="col">
                                        <div class="form-outline">
                                            <input type="number" id="form4Example1" class="form-control" name="mgs_roll"
                                                required />
                                            <label class="form-label" for="form4Example1"><b style="color:red;">*</b>
                                                Roll No</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-outline">
                                            <input type="number" id="form4Example1" class="form-control" name="mgs_reg"
                                                required />
                                            <label class="form-label" for="form4Example1"><b style="color:red;">*</b>
                                                Reg No</label>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- Name input -->
                                <!-- <div class="form-outline mb-4">
                                    <input type="text" id="form4Example1" class="form-control" name="mgs_name"
                                        required />
                                    <label class="form-label" for="form4Example1"><b style="color:red;">*</b>
                                        Name</label>
                                </div> -->


                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <input type="email" id="form4Example2" class="form-control" name="mgs_email"
                                        required />
                                    <label class="form-label" for="form4Example2"><b style="color:red;">*</b> Email
                                        address</label>
                                </div>

                                <!-- Subject input -->
                                <div class="form-outline mb-4">
                                    <input type="text" id="form4Example1" class="form-control" name="mgs_subject"
                                        required />
                                    <label class="form-label" for="form4Example1"><b style="color:red;">*</b>
                                        Subject</label>
                                </div>

                                <!-- Message input -->
                                <div class="form-outline mb-4">
                                    <textarea class="form-control" id="form4Example3" rows="4" required
                                        placeholder="Write your message here.." name="mgs_content"></textarea>
                                    <label class="form-label" for="form4Example3"><b style="color:red;">*</b>
                                        Message</label>
                                </div>
                                <br>


                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary btn-block mb-4" name="mgs_submit_btn">
                                    Send
                                </button>
                            </form>
                        </div>
                    </div>
                    <br>
                </div>

            </div>

            <!-- ###############################  -->
            <?php } else {?>

            <div class="row">
                <div class="col-lg-5 d-none d-lg-block">
                    <!-- <div class="card-margin p-2 pe-4 "> -->
                    <div class="card mx-auto card-margin">
                        <div class="card-body p-3">
                            <div id="map">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1822.2650476367444!2d89.2774444723422!3d24.012365200000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fe84f090dfdee5%3A0x44a1c14abe8ebf89!2sBangabandhu%20Sheikh%20Mujibur%20Rahman%20Hall!5e0!3m2!1sen!2sbd!4v1660297056491!5m2!1sen!2sbd"
                                    width="100%" height="310" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>

                            </div>
                            <br>
                            <!-- Section: Links -->
                            <?php include "includes/social_link.php";?>
                        </div>
                    </div>

                </div>
                <div class="col-lg-7 col-md-12 col-sm-12">
                    <div class="card mx-auto card-margin">
                        <div class="card-body" style="padding:0px;">
                            <div class="row">
                                <div class="col-sm-2 d-none d-sm-block d-md-none"></div>
                                <div class="col-lg-6 col-md-6 col-sm-8 3d_col_md1">
                                    <!-- Section-1 Start -->
                                    <div class="details">
                                        <div class="book">
                                            <div class="back"></div>
                                            <div class="page6">
                                                <ul class="social">
                                                    <p
                                                        style="margin-bottom: 15px !important; margin-top: 13px; color: #f53b57; font-size: 18px; font-weight: bold;">
                                                        <b>Contact Details</b>
                                                    </p>
                                                    <p style="margin: 0px !important;"><i class="fa fa-phone"
                                                            aria-hidden="true"></i> +8801712415335 (Personal</p>
                                                    <p style="margin: 0px !important;"><i class="fa fa-phone"
                                                            aria-hidden="true"></i> 2268 (PABX)
                                                    </p>
                                                    <p style="margin: 0px !important;"><i class="fa fa-envelope"
                                                            aria-hidden="true"></i> fom_06@pust.ac.bd (Office)
                                                    </p>
                                                    <p style="margin: 0px !important;"><i class="fa fa-envelope"
                                                            aria-hidden="true"></i> fom_06@yahoo.com (Personal)
                                                    </p>
                                                </ul>
                                            </div>
                                            <div class="page5">
                                                <p
                                                    style="margin-bottom: 20px !important; margin-top: 20px; color: #f53b57; font-size: 18px; font-weight: bold;">
                                                    Personal Information </p>
                                                <img style="border-radius: 50%;" width="100px" height="80px"
                                                    src="admin/assets/img/omar faruk.jpg">
                                                <br><br>
                                                <p><b>Qualification:</b></p>
                                                <p style="margin-left: 10px;">Ph.D (RU)...</p>
                                                <p><b>Research Area:</b></p>
                                                <p style="margin-left: 10px;font-size:11px;">Signal Processing, Image
                                                    Processing</p>
                                                <!-- <p style="margin-top:2px;">
                                                    <b>Total Publications:</b>
                                                    <span style="margin-left: 10px;margin-top:2px;">
                                                        <b>
                                                            <span style="color:red;font-size:16px;">0</span>
                                                        </b>
                                                    </span>
                                                </p> -->
                                            </div>
                                            <div class="page4"></div>
                                            <div class="page3"></div>
                                            <div class="page2"></div>
                                            <div class="page1"></div>
                                            <div class="front">
                                                <img src="admin/assets/img/omar faruk.jpg">
                                            </div>
                                        </div>
                                        <h5 style="color: #000;" class="title-description">
                                            <a href="#">Dr. Md. Omar Faruk <br><span>Provost</a></span>
                                        </h5>

                                        <a href="https://pust.ac.bd/academic/departments/dept_teachers/dept_teachers_profile/100073"
                                            target="blank" class="btn-info">View Profile</a>
                                    </div>
                                    <!-- Section-1 End -->
                                </div>
                                <div class="col-sm-2 d-none d-sm-block d-md-none"></div>

                                <div class="col-md-6 provost-contact-info 3d_col_md1">


                                    <h4 style="margin:17px 0px -12px 0px;">Contact Information</h4>
                                    <br>
                                    <p style="margin: 0px !important;color:black;"><i class="fa fa-envelope"
                                            aria-hidden="true"></i>
                                        Email:<a href="mailto:bsmr.hall@pust.ac.bd"> bsmr.hall@pust.ac.bd</a>

                                    </p>
                                    <p style="margin: 0px !important;"><i class="fa fa-phone" aria-hidden="true"></i>
                                        Phone:<a href="tel:+880258884570"> +8802588845707</a>


                                    </p>



                                </div>
                            </div>

                        </div>
                    </div>
                    <br>

                </div>
                <!-- For Responsive Map -->
                <div class="col-md-12 col-sm-12 d-lg-none mb-4" style='margin-top:-80px;'>
                    <!-- <div class="card-margin p-2 pe-4 "> -->
                    <div class="card mx-auto card-margin">
                        <div class="card-body p-3">
                            <div id="map">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1822.2650476367444!2d89.2774444723422!3d24.012365200000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fe84f090dfdee5%3A0x44a1c14abe8ebf89!2sBangabandhu%20Sheikh%20Mujibur%20Rahman%20Hall!5e0!3m2!1sen!2sbd!4v1660297056491!5m2!1sen!2sbd"
                                    width="100%" height="310" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>

                            </div>
                            <br>
                            <!-- Section: Links -->
                            <?php include "includes/social_link.php";?>
                        </div>
                    </div>

                </div>

            </div>
            <?php }?>
        </div>
    </div>


    <!-- footer -->
    <?php include_once "includes/footer.php"?>
    <!-- Footer -->


    <?php include_once 'includes/script.php';?>
</body>

</html>