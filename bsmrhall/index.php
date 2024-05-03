<?php
    include "class/function.php";
    $obj1 = new students_info();
?>
<?php session_start();?>
<?php include_once "includes/head.php"?>



<body>

    <?php include_once "includes/header.php"?>

    <style>
    .carousel-indicators [data-mdb-target] {
        background-color: #fb9857;
        height: 5px;
    }

    .h-auto {
        max-height: 450px;
    }

    .marquee>a {
        color: #13294B !important;
    }

    .marquee>a :hover {
        /* color: red; */
        color: #ed6738 !important;
    }
    </style>
    <div style="padding-top: 70px" class="caros_margin">
        <!-- <h3 style="background-color:#FFF3CD;color:red;text-align:center;padding:15px 10px;margin:0px">
            আমাদের উন্নয়ন কার্যক্রম চলমান আছে, কারিগরি ত্রুটির জন্য দুঃখিত। যেকোন সমস্যার জন্য যোগাযোগ করুন!!
        </h3> -->
        <!-- <div style="padding-top: 110px"> -->
        <div id="carouselMaterialStyle" class="carousel slide carousel-fade" data-mdb-ride="carousel">
            <!-- Indicators -->
            <div class="carousel-indicators">
                <button type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>

            <!-- Inner -->
            <div class="carousel-inner rounded-5 shadow-4-strong">
                
                <!-- Single item -->
                <div class="carousel-item active">
                    <img src="assets/img/images/pust lake.jpg" class="d-block w-100 h-auto"
                        alt="Sunset Over the City" />
                    <div class="carousel-caption  d-md-block">
                        <h5> <span class="typing"></span></h5>
                        <p>

                        </p>
                    </div>
                </div>

                <!-- Single item -->
                <div class="carousel-item">
                    <img src="assets/img/images/BSMRH4.jpg" class="d-block w-100 h-auto" alt="Canyon at Nigh" />
                    <div class="carousel-caption  d-md-block">
                        <h5><span class="typing-2"></span></h5>
                        <p></p>
                    </div>
                </div>
                <!-- Single item -->
                <div class="carousel-item">
                    <img src="assets/img/images/muzib_photo.jpg" class="d-block w-100 h-auto"
                        alt="Cliff Above a Stormy Sea" />
                    <div class="carousel-caption d-md-block">
                        <!-- d-none -->
                        <h5> <span class="typing-3"></span></h5>
                        <p>

                        </p>
                    </div>
                </div>
               
            </div>
            <!-- Inner -->

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-mdb-target="#carouselMaterialStyle"
                data-mdb-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-mdb-target="#carouselMaterialStyle"
                data-mdb-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- notice slider -->
    <br>

    <?php $notice_data = $obj1->display_notice();?>


    <marquee class="marquee" style="overflow:hidden;clear:both;" onmouseover="this.stop()" onmouseout="this.start()"
        scrollamount="5">
        <?php $count = 0;
            while ( $notice = mysqli_fetch_assoc( $notice_data ) ) {
                $count++;
                if ( $count > 5 ) {
                    break;
                }
            ?>
        <a href=notice/<?php echo $notice['n_file']; ?> target="_blank"><i style="color: #000;" class="fa fa-star"
                aria-hidden="true"></i>
            <?php echo $notice['n_title']; ?></a>

        <?php }?>




    </marquee>

    <!-- Mujibur Photo section -->
    <div class="mujibur" style="margin-top: 10px;">
        <img src="assets/img/images/Mujib.png" alt="Mujib" class="mujib_photo">
    </div>

    <!-- features area -->
    <div class="features-area">
        <div class="container">
            <div class="row">
                <div class="features" style="overflow:hidden;">
                    <div class="col-md-5 col-sm-5 col_md_notice col_md_provost">
                        <div class="top-author top-authors " style="margin-top:8px">
                            <h4 style="background: #294863; color: white;margin-top:0px">Notice Board</h4>
                            <div class="author-items items">
                                <?php $notice_data1 = $obj1->display_notice();?>
                                <marquee behavior="scroll" onmouseover="this.stop()" onmouseout="this.start()"
                                    scrollamount="3" height="200px" direction="up">
                                    <!-- Single     Item -->
                                    <?php $ncount = 0;
                                        while ( $notice1 = mysqli_fetch_assoc( $notice_data1 ) ) {
                                            $ncount++;
                                            if ( $ncount > 7 ) {
                                                break;
                                            }
                                        ?>
                                    <div class="item">
                                        <div class="text-justify">
                                            <h5 class="notice_header"><a
                                                    href="notice/<?php echo $notice1['n_file']; ?>"><?php echo $notice1['n_title']; ?></a>
                                            </h5>
                                            <ul class="notice_date_text">
                                                <li class="notice_borders"><strong>Published on:
                                                    </strong><?php echo $notice1['n_date']; ?>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <?php }?>

                                </marquee>
                                <!-- End Single Item -->
                                <a class="btns btn-primary  btn-sm border" href="all_notice">View All <i
                                        class="fas fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="provost_areas">
                        <div data-aos="fade-left" data-aos-duration="1000"
                            class="features_img_text_3 equal-height col-md-2 col-sm-2 col_md_provost"
                            style="margin-top:8px">
                            <div class="items mariner features_msg" style="padding:15px;">
                                <a href="https://pust.ac.bd/academic/departments/dept_teachers/dept_teachers_profile/100073"
                                    target=blank>
                                    <div class="info">
                                        <p>
                                            <img class="features_img" src="admin/assets/img/omar faruk.jpg" height="98%"
                                                width="98%">
                                        </p>
                                        <h4></h4>
                                        <p class="features_img_text" style="font-weight: bold; font-size: 16px;">
                                        </p>
                                        <h5 style="text-transform: capitalize;"><strong>provost</strong></h5>
                                        <h5 style="text-transform: capitalize;"><strong>Dr. Md. Omar Faruk</strong></h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div data-aos="fade-up" data-aos-duration="1000"
                            class="equal-height col-md-5 col-sm-5 aos-init aos-animate provost_md_9 col_md_provost"
                            id="provost-message" style="margin-top:8px">
                            <div class="items brilliantrose">

                                <div style="font-weight: 300;" class="info">
                                    <h4>Message From Provost</h4>
                                    <p style="text-align:justify; font-size:15px;">
                                        Bangabandhu Sheikh Mujibur Rahman Hall is the first recedential hall of Pabna University of Science
                                and Technology, Pabna. This hall is established on 1st February 2015 in memory of father of the nation
                                Bangabandhu Sheikh Mujibur Rahman...&nbsp;
                                        <a href="provost_message" style="color:blue;font-size:14px;" class="">Read
                                            More</a><br>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about pabna -->
    <!-- <main class="resident_container container">

        <div class="row">
            <div class="col-md-6" data-aos="fade-up-right" data-aos-duration="1000">
                <div class="card-margin mx-auto p-2 pe-4v resident_img">
                    <img src="assets/img/images/varsitypic.jpg" width="100%" alt="" class="rounded" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mx-auto card-margin" data-aos="fade-down" data-aos-easing="linear"
                    data-aos-duration="1000">
                    <div class="card-body p-5 resident_card_title">
                        <h3 class="card-title text-center pb-4">About The University</h3>
                        <div>
                            <p>
                                Pabna University of Science and Technology (PUST) (Bengali:
                                পাবনা বিজ্ঞান ও প্রযুক্তি বিশ্ববিদ্যালয়) is a government
                                financed public university in Bangladesh.[1] PUST was
                                established in 2008. It is the first science and Technology
                                University and third public University in Rajshahi Division.
                                It started its four-year undergraduate programme in 2009.This
                                university plays an innovative role in providing need-based
                                higher education, training, and research. It is the 7th
                                science and technology University and 29th public University
                                in Bangladesh
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main> -->

    <!--=============================================
       Start Popular Courses
    ============================================= -->
    <!-- <div class="popular-courses-area carousel-shadow weekly-top-items default-padding bottom-less">
        <div class="container">
            <div class="row" style="margin-top:-100px;">
                <div class="col-xl-8 mx-auto text-center">
                    <div class="section-title" id="activities">
                        <h2>Activities</h2>
                        <p>Bangabandhu Sheikh Mujibur Rahman Hall (BSMRH)</p>
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top:100px;">
                <div class="col-md-12 ">
                    <div class="top-course-items carousel owl-carousel">

                       Single Item -->
    <!-- <div class="item " data-aos="zoom-in" data-aos-duration="1000">
                            <div class="thumb">
                                <img src="assets/img/images/banner.jpg" alt="Thumb" class="card-img-height">

                            </div>
                            <div class="info">
                                <h4>
                                    <a href="activities?status=activities&&id=0">বাঁধন</a>
                                </h4>
                                <p>
                                    বঙ্গবন্ধু শেখ মুজিবুর রহমান হল “বাঁধন” স্বেচ্ছায় রক্তদানের পাশাপাশি বিনামূল্যে
                                    রক্তের
                                    গ্রুপ&nbsp;নির্ণয় করে
                                    থাকে এবং হলের অন্যান্য শিক্ষার্থীদের স্বেচ্ছায় রক্তদানে উদ্বুদ্ধ ... </p>
                                <div class="footer-meta">
                                    <a class="btn btn-theme effect btn-block btn-lg btnhome"
                                        href="activities?status=activities&&id=0">Read More...<i
                                            class="fas fa-check-circle fa-2x fa-pull-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="item" data-aos="zoom-in" data-aos-duration="1000">
                            <div class="thumb">
                                <img src="assets/img/images/banner.jpg" alt="Thumb" class="card-img-height">

                            </div>
                            <div class="info">
                                <h4>
                                    <a href="activities?status=activities&&id=1">ডিবেটিং ক্লাব</a>
                                </h4>
                                <p style="text-align:justify;">
                                    বঙ্গবন্ধু শেখ মুজিবুর রহমান হল ডিবেটিং ক্লাব নামে একটি ক্লাব রয়েছে। জাতীয় টেলিভিশন
                                    বিতর্কসহ
                                    আন্ত:বিশ্ববিদ্যালয় এবং অন্যান্য বিতর্ক প্রতিযোগিতায় বঙ্গবন্ধু শেখ মুজিবুর ... </p>
                                <div class="footer-meta">
                                    <a class="btn btn-theme effect btn-block btn-lg btnhome"
                                        href="activities?status=activities&&id=1">Read More...<i
                                            class="fas fa-check-circle fa-2x fa-pull-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="item" data-aos="zoom-in" data-aos-duration="1000">
                            <div class="thumb">
                                <img src="assets/img/images/banner.jpg" alt="Thumb" class="card-img-height">

                            </div>
                            <div class="info">
                                <h4>
                                    <a href="activities?status=activities&&id=2">Language Club</a>
                                </h4>
                                <p style="text-align:justify;">
                                    ১১/০৭/২০১০ তারিখে “Language Club, Bangabandhu Sheikh Mujibur Rahman Hall, University
                                    of Pust প্রতিষ্ঠিত হয়।<br><br> </p>
                                <div class="footer-meta">
                                    <a class="btn btn-theme effect btn-block btn-lg btnhome"
                                        href="activities?status=activities&&id=2">Read More...<i
                                            class="fas fa-check-circle fa-2x fa-pull-right"></i></a>
                                </div>
                            </div>
                        </div> -->
    <!-- Single Item -->
    <!-- </div>

                </div>

            </div>
        </div>
        <br>
    </div> -->

    <!-- Start Fun Factor === -->
    <!-- <div class="container">
        <div class="hall_number_headings">
            <div class="col-md-12 text-center">
                <h2>University of PUST Hall in Numbers</h2>
            </div>
        </div>

    </div> -->
    <div class="fun_factor fun-factor-area default-padding text-center bg-fixed shadow dark-hard" style="background-image: url(assets/img/images/banner1.jpg),linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));
         background-blend-mode: overlay;
        ">
        <div class="container container_count">
            <div class="row">
                <div data-aos="fade-right" data-aos-duration="1000" class="col-md-3 col-sm-6 item">
                    <div class="fun-fact">
                        <div class="icon">
                            <i class="fas fa-university"></i>
                        </div>
                        <div class="info" style="text-align: center">

                            <span class="timer" data-to="130" data-speed="5000" style="display:inline;"></span>
                            <span style="display:inline;font-size: 36px"></span>
                            <div class="clearfix"></div>
                            <span class="medium">Rooms</span>
                        </div>
                    </div>
                </div>

                <div data-aos="fade-right" data-aos-duration="1000" class="col-md-3 col-sm-6 item">
                    <div class="fun-fact">
                        <div class="icon">
                            <!-- <i class="fas fa-user-shield"></i> -->
                            <i class="fa-solid fa-explosion"></i>
                        </div>
                        <div class="info" style="text-align: center">
                            <span class="timer" data-to="522" data-speed="5000" style="display:inline;"></span>
                            <span style="display:inline;font-size: 36px"></span>
                            <div class="clearfix"></div>
                            <span class="medium">Seats</span>
                        </div>
                    </div>
                </div>
                <div data-aos="fade-left" data-aos-duration="1000" class="col-md-3 col-sm-6 item">
                    <div class="fun-fact">
                        <div class="icon">
                            <i class="fas fa-user-shield"></i>
                        </div>
                        <div class="info" style="text-align: center">
                            <span class="timer" data-to="300" data-speed="5000" style="display:inline;"></span>
                            <span style="display:inline;font-size: 36px"></span>
                            <span class="medium">Residential Students</span>
                        </div>
                    </div>
                </div>
                <div data-aos="fade-left" data-aos-duration="1000" class="col-md-3 col-sm-6 item">
                    <div class="fun-fact">
                        <div class="icon">
                            <!-- <i class="fas fa-school"></i> -->
                            <i class="fas fa-user-shield"></i>
                        </div>
                        <div class="info" style="text-align: center">
                            <span class="timer" data-to="2000" data-speed="5000" style="display:inline;"></span>
                            <span style="display:inline;font-size: 36px">+</span>
                            <span class="medium">Non-Residential Students</span>
                        </div>
                    </div>
                </div>

            </div>
            <br>
        </div>
    </div>
    <!-- End Fun Factor -->

    <!-- footer -->
    <?php include_once "includes/footer.php"?>
    <!-- Footer -->


    <?php include_once 'includes/script.php';?>

</body>

</html>