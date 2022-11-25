        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <?php
        if (isset($_POST['indexcounseling'])) {
            echo header("Location: counselling.php");
        }
        if (isset($_POST['indexreferral'])) {
            echo header("Location: referral.php");
        }
        if (isset($_POST['indextesting'])) {
            echo header("Location: testing.php");
        }
        ?>
        <header class="topbar" data-navbarbg="skin5" style="background-image: linear-gradient(90deg, rgb(193, 193, 193),rgb(107, 107, 107)),linear-gradient(157.5deg, rgb(0, 165, 230) 0%, rgb(0, 165, 230) 39%,rgb(17, 149, 218) 39%, rgb(17, 149, 218) 56%,rgb(35, 132, 206) 56%, rgb(35, 132, 206) 60%,rgb(52, 116, 195) 60%, rgb(52, 116, 195) 68%,rgb(70, 99, 183) 68%, rgb(70, 99, 183) 86%,rgb(87, 83, 171) 86%, rgb(87, 83, 171) 100%),linear-gradient(135deg, rgb(0, 165, 230) 0%, rgb(0, 165, 230) 39%,rgb(17, 149, 218) 39%, rgb(17, 149, 218) 56%,rgb(35, 132, 206) 56%, rgb(35, 132, 206) 60%,rgb(52, 116, 195) 60%, rgb(52, 116, 195) 68%,rgb(70, 99, 183) 68%, rgb(70, 99, 183) 86%,rgb(87, 83, 171) 86%, rgb(87, 83, 171) 100%); background-blend-mode:overlay,overlay,normal;">

            <nav class="navbar top-navbar navbar-expand-md " style="background-image: linear-gradient(90deg, rgb(193, 193, 193),rgb(107, 107, 107)),linear-gradient(157.5deg, rgb(0, 165, 230) 0%, rgb(0, 165, 230) 39%,rgb(17, 149, 218) 39%, rgb(17, 149, 218) 56%,rgb(35, 132, 206) 56%, rgb(35, 132, 206) 60%,rgb(52, 116, 195) 60%, rgb(52, 116, 195) 68%,rgb(70, 99, 183) 68%, rgb(70, 99, 183) 86%,rgb(87, 83, 171) 86%, rgb(87, 83, 171) 100%),linear-gradient(135deg, rgb(0, 165, 230) 0%, rgb(0, 165, 230) 39%,rgb(17, 149, 218) 39%, rgb(17, 149, 218) 56%,rgb(35, 132, 206) 56%, rgb(35, 132, 206) 60%,rgb(52, 116, 195) 60%, rgb(52, 116, 195) 68%,rgb(70, 99, 183) 68%, rgb(70, 99, 183) 86%,rgb(87, 83, 171) 86%, rgb(87, 83, 171) 100%); background-blend-mode:overlay,overlay,normal;">

                <div class="navbar-header" data-logobg="skin5" style="background-image: linear-gradient(90deg, rgb(193, 193, 193),rgb(107, 107, 107)),linear-gradient(157.5deg, rgb(0, 165, 230) 0%, rgb(0, 165, 230) 39%,rgb(17, 149, 218) 39%, rgb(17, 149, 218) 56%,rgb(35, 132, 206) 56%, rgb(35, 132, 206) 60%,rgb(52, 116, 195) 60%, rgb(52, 116, 195) 68%,rgb(70, 99, 183) 68%, rgb(70, 99, 183) 86%,rgb(87, 83, 171) 86%, rgb(87, 83, 171) 100%),linear-gradient(135deg, rgb(0, 165, 230) 0%, rgb(0, 165, 230) 39%,rgb(17, 149, 218) 39%, rgb(17, 149, 218) 56%,rgb(35, 132, 206) 56%, rgb(35, 132, 206) 60%,rgb(52, 116, 195) 60%, rgb(52, 116, 195) 68%,rgb(70, 99, 183) 68%, rgb(70, 99, 183) 86%,rgb(87, 83, 171) 86%, rgb(87, 83, 171) 100%); background-blend-mode:overlay,overlay,normal;">

                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="index.php">
                        <b class="" style="text-align: center; color:white;">
                            <img src="https://buksuguidanceapp.000webhostapp.com/admin/assets/images/logo-2.PNG" alt="Homepage" style="margin-top:-50px;margin-bottom:-50px" />
                        </b>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->

            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->