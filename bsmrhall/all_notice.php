<?php session_start();?>
<?php
    include "class/function.php";
    $obj1 = new students_info();
?>

<?php include_once "includes/head.php"?>

<?php $notice_data = $obj1->display_notice();?>

<body>

    <?php include_once "includes/header.php"?>


    <div>

        <!-- Banner Starts Here -->
        <div class="heading-page header-text">
            <section class="page-heading"
                style="background-image: url(assets/img/images/BSMRH6.jpg), linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));height:330px">

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-content">

                                <h2>Notice</h2>
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
                        <h2>Hall Notice Board</h2>
                        <p>Bangabandhu Sheikh Mujibur Rahman Hall (BSMRH)</p>
                    </div>
                </div>
            </div>
            <!-- // -->
            <div class="row" style="margin-top:100px;padding-bottom:3rem;">
                <!-- Start Course Info -->
                <div class="col-md-12">
                    <div class="top-author top-authors">
                        <h4>All Notice</h4>

                        <div class="col-md-12 " id="content_details_all">
                            <div class="panel panel-default ">
                                <div class="panel-heading"></div>
                                <div class="panel-body ">
                                    <div class="row">
                                        <div style="overflow-x:auto;">
                                            <table class="table table-hover table-striped table-responsive"
                                                style="border:3px #ddd solid;">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center;">SL</th>
                                                        <th style="text-align: center;">Published Date</th>
                                                        <th style="text-align: center;">Title</th>
                                                        <th style="text-align: center;">Notice Download</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $count = 0;while ( $notice = mysqli_fetch_assoc( $notice_data ) ) {$count++;?>
                                                    <tr>
                                                        <td><?php echo $count; ?></td>
                                                        <td style="text-align: center;"><i style="color:red"
                                                                class="fa fa-calendar"></i>
                                                            <?php echo $notice['n_date']; ?></td>
                                                        <td><?php echo $notice['n_title']; ?></td>
                                                        <td style="text-align: center;"><a target="_blank"
                                                                style="color: red;"
                                                                href="notice/<?php echo $notice['n_file']; ?>"><i
                                                                    class="fa fa-download" aria-hidden="true"></i>
                                                                Download</a></td>
                                                    </tr>
                                                    <?php }?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- footer -->
    <?php include_once "includes/footer.php"?>
    <!-- Footer -->


    <?php include_once 'includes/script.php';?>
</body>

</html>