<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin6">
    <div class="scroll-sidebar">

        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">

            <ul id="sidebarnav">
                <!-- User Profile-->
                <li>
                    <!-- User Profile-->
                    <div class="user-profile d-flex no-block dropdown m-t-20">
                        <div class="user-pic">
                            <img src="assets/img/profiles/profile.png" alt="users" class="rounded-circle" width="40" />
                        </div>
                        <div class="user-content hide-menu m-l-10">
                            <a href="#" class="" id="Userdd" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <h5 class="m-b-0 user-name font-medium">
                                    <b><?php echo $_SESSION['Access'] ?></b>
                                    <i class="fa fa-angle-down"></i>
                                </h5>
                                <span class="op-5 user-email" style="color: blue;">
                                    <b><i><?php echo $_SESSION['UserLogin'] ?></i></b>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="Userdd">
                                <a class="dropdown-item" href="logout.php" style="color: red; ">
                                    <i class="fa fa-power-off m-r-5 m-l-5"></i> Logout
                                </a>
                                <a class="dropdown-item" href="account_credentials.php" style="color: green; ">
                                    <i class="mdi mdi-account-multiple m-r-5 m-l-5"></i> Account Credentials
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End User Profile-->
                </li>
                <!-- User Profile-->
                <?php if (isset($_SESSION['UserLogin']) && $_SESSION['Access'] == "Counselor" || $_SESSION['Access'] == "Administrator") { ?>
                    <li class="sidebar-item">
                        <button name="reservation" style="background-color:white; border: none;">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.php" aria-expanded="false">
                                <i class="mdi mdi-view-dashboard" style="color: blue;"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </button>
                    </li>
                <?php } ?>

                <?php if (isset($_SESSION['UserLogin']) && $_SESSION['Access'] == "Counselor") { ?>
                    <li class="sidebar-item">
                        <form action="details_reservation.php" method="post">
                            <button name="reservation" style="background-color:white; border: none;">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="details_reservation.php" aria-expanded="false">
                                    <i class="mdi mdi-book-open-page-variant" style="color: yellowgreen;"></i>
                                    <span class="hide-menu">Reservation Date/Time</span>
                                </a>
                            </button>
                        </form>
                    </li>
                <?php } ?>

                <?php if (isset($_SESSION['UserLogin']) && $_SESSION['Access'] == "Counselor" || $_SESSION['Access'] == "Administrator") { ?>
                    <li class="sidebar-item">
                        <button name="reservation" style="background-color:white; border: none;">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="user_accounts.php" aria-expanded="false">
                                <i class="mdi mdi-account-multiple" style="color: green;"></i>
                                <span class="hide-menu">Users Accounts</span>
                            </a>
                        </button>
                    </li>
                <?php } ?>

                <?php if (isset($_SESSION['UserLogin']) && $_SESSION['Access'] == "Counselor") {

                    $collegefilter = $_SESSION['College'];
                    //counseling
                    $query0 = "SELECT * FROM counseling_appointment WHERE status='noaction' AND college_of='$collegefilter' ORDER BY added_at DESC";
                    $query_run0 = mysqli_query($con, $query0);
                    $row0 = mysqli_num_rows($query_run0);

                    //referral
                    $query1 = "SELECT * FROM referral_counseling WHERE status='noaction' AND college_of='$collegefilter' ORDER BY added_at DESC";
                    $query_run1 = mysqli_query($con, $query1);
                    $row1 = mysqli_num_rows($query_run1);

                    //testing
                    $query2 = "SELECT * FROM testing_service WHERE status='deanrequest' AND college_of='$collegefilter' ORDER BY added_at DESC";
                    $query_run2 = mysqli_query($con, $query2);
                    $row2 = mysqli_num_rows($query_run2);

                    $allreq = $row2 + $row1 + $row0;
                ?>
                    <li class="sidebar-item">
                        <button name="reservation" style="background-color:white; border: none;">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="reports.php" aria-expanded="false">
                                <i class="mdi mdi-chart-bar" style="color: rgb(73, 38, 170);"></i>
                                <span class="hide-menu">Reports</span>
                            </a>
                        </button>
                    </li>

                    <li>
                        <!-- User Profile-->
                        <div class="user-profile d-flex no-block dropdown m-t-20">
                            <div class="user-content hide-menu m-l-10">
                                <a href="#" class="" id="Userdd" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <h5 class="m-b-0 user-name font-medium">
                                        <i class="fa fa-stethoscope"></i>
                                        <b>Services</b>
                                        <i class="fa fa-angle-down"></i>
                                        <span style="background-color: rgb(62, 196, 50); color: black; padding: 5px; border-radius: 24px;">
                                            <?php echo $allreq ?>
                                        </span>
                                    </h5>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="Userdd">
                                    <div class="sidebar-item">
                                        <button name="reservation" style="background-color:white; border: none;">
                                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="counselling.php" aria-expanded="false">
                                                <i class="mdi mdi-account-switch" style="color: teal;"></i>
                                                <span class="hide-menu">
                                                    Counseling &nbsp;
                                                </span>
                                                <?php if ($row0 != null) { ?>
                                                    <b style="background-color: rgb(62, 196, 50); color: black; padding: 5px; border-radius: 24px;">
                                                    <?php
                                                    echo  $row0;
                                                } ?>
                                                    </b>
                                            </a>
                                        </button>
                                    </div>
                                    <div class="sidebar-item">
                                        <button name="reservation" style="background-color:white; border: none;">
                                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="referral.php" aria-expanded="false">
                                                <i class="mdi mdi-account-multiple-plus" style="color: violet;"></i>
                                                <span class="hide-menu">
                                                    Referral &nbsp;
                                                </span>
                                                <?php if ($row1 != null) { ?>
                                                    <b style="background-color: rgb(62, 196, 50); color: black; padding: 5px; border-radius: 24px;">
                                                    <?php
                                                    echo  $row1;
                                                } ?>
                                                    </b>
                                            </a>
                                        </button>
                                    </div>
                                    <div class="sidebar-item">
                                        <button name="reservation" style="background-color:white; border: none;">
                                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="college_testing.php" aria-expanded="false">
                                                <i class=" fa fa-magic" style="color: magenta;"></i>
                                                <span class="hide-menu">
                                                    Testing &nbsp;
                                                </span>
                                                <?php if ($row2 != null) { ?>
                                                    <b style="background-color: rgb(62, 196, 50); color: black; padding: 5px; border-radius: 24px;">
                                                    <?php
                                                    echo  $row2;
                                                } ?>
                                                    </b>
                                            </a>
                                        </button>
                                    </div>
                                    <div class="sidebar-item">
                                        <button name="reservation" style="background-color:white; border: none;">
                                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="exit_interview_form.php" aria-expanded="false">
                                                <i class="mdi mdi-calendar-multiple-check" style="color: rgb(76, 202, 196);"></i>
                                                <span class="hide-menu">Exit Interview</span>
                                            </a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- End User Profile-->
                    </li>
                    <!-- <li class="sidebar-item">
                        <button name="reservation" style="background-color:white; border: none;">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="counselling.php" aria-expanded="false">
                                <i class="mdi mdi-account-switch" style="color: teal;"></i>
                                <span class="hide-menu">
                                    Counseling &nbsp;
                                </span>
                                <?php if ($row0 != null) { ?>
                                    <b style="background-color: rgb(62, 196, 50); color: black; padding: 5px; border-radius: 24px;">
                                    <?php
                                    echo  $row0;
                                } ?>
                                    </b>
                            </a>
                        </button>
                    </li>

                    <li class="sidebar-item">
                        <button name="reservation" style="background-color:white; border: none;">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="referral.php" aria-expanded="false">
                                <i class="mdi mdi-account-multiple-plus" style="color: violet;"></i>
                                <span class="hide-menu">
                                    Referral &nbsp;
                                </span>
                                <?php if ($row1 != null) { ?>
                                    <b style="background-color: rgb(62, 196, 50); color: black; padding: 5px; border-radius: 24px;">
                                    <?php
                                    echo  $row1;
                                } ?>
                                    </b>
                            </a>
                        </button>
                    </li>

                    <li class="sidebar-item">
                        <button name="reservation" style="background-color:white; border: none;">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="testing.php" aria-expanded="false">
                                <i class=" fa fa-magic" style="color: magenta;"></i>
                                <span class="hide-menu">
                                    Testing &nbsp;
                                </span>
                                <?php if ($row2 != null) { ?>
                                    <b style="background-color: rgb(62, 196, 50); color: black; padding: 5px; border-radius: 24px;">
                                    <?php
                                    echo  $row2;
                                } ?>
                                    </b>
                            </a>
                        </button>
                    </li>

                    <li class="sidebar-item">
                        <button name="reservation" style="background-color:white; border: none;">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="exit_interview_form.php" aria-expanded="false">
                                <i class="mdi mdi-calendar-multiple-check" style="color: rgb(76, 202, 196);"></i>
                                <?php
                                //for fill-up online
                                // $query3 = "SELECT * FROM exit_interview WHERE status='noaction' ORDER BY added_at DESC";
                                // $query_run3 = mysqli_query($con, $query3);
                                // $row3 = mysqli_num_rows($query_run3);

                                //for downloaded file
                                // $query4 = "SELECT * FROM exit_interview_download_form WHERE status='noaction' ORDER BY added_at DESC";
                                // $query_run4 = mysqli_query($con, $query4);
                                // $row4 = mysqli_num_rows($query_run4);
                                ?>
                                <span class="hide-menu">Exit Interview</span>
                            </a>
                        </button>
                    </li> -->

                    <!-- <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="records.php" aria-expanded="false">
                            <i class="fas fa-book" style="color: rgb(47, 122, 172);"></i>
                            <span class="hide-menu">Records</span>
                        </a>
                    </li> -->

                    <li>
                        <!-- User Profile-->
                        <div class="user-profile d-flex no-block dropdown m-t-20">
                            <div class="user-content hide-menu m-l-10">
                                <a href="#" class="" id="Userdd" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <h5 class="m-b-0 user-name font-medium">
                                        <i class="fa fa-cogs"></i>
                                        <b>Options</b>
                                        <i class="fa fa-angle-down"></i>
                                    </h5>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="Userdd">
                                    <div class="sidebar-item">
                                        <button name="reservation" style="background-color:white; border: none;">
                                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="college.php" aria-expanded="false">
                                                <i class="fas fa-building" style="color: rgb(38, 54, 204);"></i>
                                                <span class="hide-menu">College & Program</span>
                                            </a>
                                        </button>
                                    </div>
                                    <div class="sidebar-item">
                                        <button name="reservation" style="background-color:white; border: none;">
                                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="courses.php" aria-expanded="false">
                                                <i class="fas fa-university" style="color: rgb(38, 54, 204);"></i>
                                                <span class="hide-menu">Courses & Program Name</span>
                                            </a>
                                        </button>
                                    </div>
                                    <div class="sidebar-item">
                                        <button name="reservation" style="background-color:white; border: none;">
                                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="referral_reason.php" aria-expanded="false">
                                                <i class="fas fa-users" style="color: rgb(38, 54, 204);"></i>
                                                <span class="hide-menu">Referral Reason</span>
                                            </a>
                                        </button>
                                    </div>
                                    <div class="sidebar-item">
                                        <button name="reservation" style="background-color:white; border: none;">
                                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="testing_purpose.php" aria-expanded="false">
                                                <i class="fas fa-puzzle-piece" style="color: rgb(38, 54, 204);"></i>
                                                <span class="hide-menu">Testing Purpose</span>
                                            </a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- <li class="sidebar-item">
                        <button name="reservation" style="background-color:white; border: none;">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="college.php" aria-expanded="false">
                                <i class="fas fa-building" style="color: rgb(38, 54, 204);"></i>
                                <span class="hide-menu">College & Program</span>
                            </a>
                        </button>
                    </li>

                    <li class="sidebar-item">
                        <button name="reservation" style="background-color:white; border: none;">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="courses.php" aria-expanded="false">
                                <i class="fas fa-university" style="color: rgb(38, 54, 204);"></i>
                                <span class="hide-menu">Courses & Program Name</span>
                            </a>
                        </button>
                    </li>

                    <li class="sidebar-item">
                        <button name="reservation" style="background-color:white; border: none;">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="referral_reason.php" aria-expanded="false">
                                <i class="fas fa-users" style="color: rgb(38, 54, 204);"></i>
                                <span class="hide-menu">Referral Reason</span>
                            </a>
                        </button>
                    </li>

                    <li class="sidebar-item">
                        <button name="reservation" style="background-color:white; border: none;">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="testing_purpose.php" aria-expanded="false">
                                <i class="fas fa-puzzle-piece" style="color: rgb(38, 54, 204);"></i>
                                <span class="hide-menu">Testing Purpose</span>
                            </a>
                        </button>
                    </li> -->
                <?php } ?>

            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->