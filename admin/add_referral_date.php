<!DOCTYPE html>
<html dir="ltr" lang="en">

<?php include 'includes/header.php';
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['UserLogin']) && $_SESSION['Access'] == "Administrator" || $_SESSION['Access'] == "Counselor") {
    // echo "<div class='message success'>Welcome " . $_SESSION['Access'] . '</div>';
} else {
    echo header("Location: ../login.php");
}

include_once("connections/connection.php");
$con = connection();
?>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

        <?php include 'includes/topbar.php' ?>
        <?php include 'includes/sidebar.php' ?>

        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-5">
                        <h4 class="page-title"><i class="mdi mdi-account-multiple"></i> Date for Referral</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="reservation_for_referral.php"> Home</a></li>
                                    <li class="breadcrumb-item"><a href="#"> Add New</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card" style="text-align: center; padding: 8px; color: teal;">
                            <div class="table-responsive">

                                <!-- for adding date -->
                                <?php if (isset($_POST['referraltime'])) {
                                    $time = $_POST['time'];
                                    $sql2 = "INSERT INTO `referral_time`
                                    ( `referral_time`) 
                                    VALUES ('$time')";
                                    $con->query($sql2) or die($con->error); ?>
                                    <p style="text-align: center;">
                                        <b style="color: green; ">
                                            Successfully Added! <?php echo $time ?>
                                        </b><br>
                                        <b>Add More Time for Reservation</b>
                                    <form action="" method="post">
                                        <label><b>Time</b></label>
                                        <input type="time" name="time" required>
                                        <input type="submit" name="referraltime" value="Add" style="background-color: green;border:none; color: white;">
                                    </form>
                                    <button style=" color:white; border:none;">
                                        <a href=" reservation_for_referral.php">
                                            Done
                                        </a>
                                    </button>
                                    </p>
                                <?php } ?>
                                <?php
                                if (isset($_POST['referraldate'])) {
                                    $fdate = $_POST['date'];
                                    $sql = "INSERT INTO `referral_date`(`referral_date`) 
                                    VALUES ('$fdate')";
                                    $con->query($sql) or die($con->error);

                                    $time = $_POST['time'];
                                    $sql2 = "INSERT INTO `referral_time`
                                    ( `referral_time`) 
                                    VALUES ('$time')";
                                    $con->query($sql2) or die($con->error);

                                ?>
                                    <p style="text-align: center;">
                                        <b style="color: green; ">
                                            Successfully Added! <?php echo $fdate, $time ?>
                                        </b>
                                        <button style=" color:white; border:none;">
                                            <a href=" reservation_for_referral.php">
                                                Done
                                            </a>
                                        </button><br>
                                        <b>Add More Time for Reservation</b>
                                    <form action="" method="post">
                                        <label><b>Time</b></label>
                                        <input type="time" name="time" required>
                                        <input type="submit" name="referraltime" value="Add" style="background-color: green;border:none; color: white;">
                                    </form>
                                    </p>
                                <?php  }
                                if (isset($_POST['addreferral'])) {
                                ?>
                                    <h3>Add Date & Time for Referral</h3>
                                    <form action="" method="post">
                                        <label><b>Date</b></label>
                                        <input type="date" name="date" required>
                                        <label><b>Time</b></label>
                                        <input type="time" name="time" required>
                                        <input type="submit" name="referraldate" value="Add" style="background-color: green;border:none; color: white;">
                                    </form>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->

    <?php include 'includes/footer.php' ?>

</body>

</html>