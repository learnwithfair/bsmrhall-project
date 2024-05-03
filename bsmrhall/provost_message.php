<?php
    include "class/function.php";
    $obj1 = new students_info();
?>
<?php session_start();?>
<?php include_once "includes/head.php"?>


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
                                <!--<h4>MESSAGE</h4>-->
                                <h2>MESSAGE FROM THE PROVOST</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- Banner Ends Here -->


        <!-- Start Course Details
    ============================================= -->
        <div class="course-details-area default-padding">
            <div class="container">
                <div class="row" style="padding-bottom:3rem;">
                    <div class="top-authors"
                        style="border-top: 3px solid #1C4370;box-shadow:0 0 10px rgba(50, 50, 50, .17); ">

                        <div class="col-lg-4 col-md-4 provost_mssg provost_msg_1">
                            <img src="admin/assets/img/omar faruk.jpg" alt=""
                                style="height:260px;width:240px;margin-top:15px;" class="img-thumbnail image-showing">
                            <div class="provost_msg_headings">
                                <h3 class="shadowLevel2">Dr. Md. Omar Faruk</h3>
                                <h4 class="shadowLevel3"><strong>Provost</strong></h4>
                                <h6 class="shadowLevel2"><strong>Bangabandhu Sheikh Mujibur Rahman Hall </strong></h6>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 text-justify margin-top-30px provost_mssg provost_msg_2">
                            <p>Bangabandhu Sheikh Mujibur Rahman Hall is the first recedential hall of Pabna University of Science
                                and Technology, Pabna. This hall is established on 1st February 2015 in memory of father of the nation
                                Bangabandhu Sheikh Mujibur Rahman.
                                <br><br>
                                The hall accommodates 522 students in its two residence buildings. Besides accommodation, students get
                                the facilities of dining rooms, canteen, TV room, reading room, paper room, game room, and prayer
                                rooms. Students can take part in various extra-curricular activities including indoor and outdoor games.
                                Students also have the facilities to nurture their hidden talents by engaging themselves with several
                                volunteer organizations such as Debate club, Language club, Blood donation club, and so on. There are
                                03 Assistant Provosts who are always in touch with the students for guiding, consulting and advising
                                either academic, administrative or personal matters. There are 12 supporting staffs are engaged in
                                services to the students.
                                <br><br>
                                A mural of father of the nation Bangabandhu Sheikh Mujibur Rahman has existed inside this hall.
                                As a provost, I congratulate all proud graduates and current students to be a part of this historic hall. I also
                                welcome suggestions from well wishers and philanthropists for the improvement and future development
                                of the hall. Best wishes to you.
                            </p>
                        </div>
                    </div>

                    <!-- Start Course Sidebar -->

                    <!-- End Course Sidebar -->

                </div>
            </div>
        </div>
        <!-- End content ============================================= -->
    </div>

    <!-- footer -->
    <?php include_once "includes/footer.php"?>
    <!-- Footer -->


    <?php include_once 'includes/script.php';?>
</body>

</html>