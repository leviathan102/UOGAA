<!DOCTYPE html>
<html dir="ltr" lang="en">

<?php include 'includes/header.php';

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['UserLogin']) && $_SESSION['Access'] == "Administrator" || $_SESSION['Access'] == "Counselor") {
    // echo "<div class='message success'>Welcome " . $_SESSION['Access'] . '</div>';
} else {
    echo header("Location: ../index.php");
}

include_once("connections/connection.php");
$con = connection();

//counseling
$sql5 = "SELECT * FROM apointment_date ORDER BY id DESC";
$datecounseling = $con->query($sql5) or die($con->error);
$row5 = $datecounseling->fetch_assoc();
$sql6 = "SELECT * FROM apointment_time ORDER BY id DESC";
$datecounseling2 = $con->query($sql6) or die($con->error);
$row6 = $datecounseling2->fetch_assoc();

//referral
$sql7 = "SELECT * FROM referral_date ORDER BY id DESC";
$datereferral = $con->query($sql7) or die($con->error);
$row7 = $datereferral->fetch_assoc();
$sql8 = "SELECT * FROM referral_time ORDER BY id DESC";
$datereferral2 = $con->query($sql8) or die($con->error);
$row8 = $datereferral2->fetch_assoc();

//testing
$sql9 = "SELECT * FROM testing_date ORDER BY id DESC";
$datetesting = $con->query($sql9) or die($con->error);
$row9 = $datetesting->fetch_assoc();
$sql10 = "SELECT * FROM testing_time ORDER BY id DESC";
$timetesting = $con->query($sql10) or die($con->error);
$row10 = $timetesting->fetch_assoc();

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
                        <h4 class="page-title"><i class="mdi mdi-book-open-page-variant"></i> Reservation Date/Time</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
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

                <!-- Filter -->
                <div class="row">
                    <div class="col-12">
                        <div class="card" style="align-items: center;">
                            <div class="table-responsive">
                            </div>

                            <!-- for delete function -->
                            <div>
                                <!-- for referral reservation -->
                                <?php
                                // delete referral date by id
                                if (isset($_POST['deletereferraldate'])) {
                                    $id = $_POST['ID'];
                                    $date = $_POST['date'];
                                    $sql = "DELETE FROM referral_date WHERE id = '$id'";
                                    $con->query($sql) or die($con->error);
                                ?>
                                    <meta http-equiv="refresh" content="1">
                                    <h3>
                                        Successfully Deleted! Referral Date:
                                        <p style="color: red; align-items:center">
                                            <?php echo $date ?>
                                        </p>
                                    </h3>
                                <?php } ?>
                                <?php
                                // delete referral time by id
                                if (isset($_POST['deletereferraltime'])) {
                                    $id = $_POST['ID'];
                                    $time = $_POST['time'];
                                    $sql = "DELETE FROM referral_time WHERE id = '$id'";
                                    $con->query($sql) or die($con->error);
                                ?>
                                    <meta http-equiv="refresh" content="1">
                                    <h3>
                                        Successfully Deleted! Referral Time:
                                        <p style="color: red; align-items:center">
                                            <?php echo $time; ?>
                                        </p>
                                    </h3>
                                <?php } ?>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- referral table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card" style="padding:8px;">
                            <div class="table-responsive">
                                <table id="example" class="table table-hover">
                                    <h3>Referral Reservation</h3>
                                    <div class="form-floating mb-3" style="padding: 8px; background-color: skyblue;">
                                        <form action="add_referral_date.php" method="post">
                                            <!-- <button class="btn btn-primary btn-block">
                                                    <a href="add_counseling_date.php" data-toggle="modal" data-target="#add" style="color:white">
                                                        <i class="fa fa-user-plus"></i>
                                                        Add Date & Time
                                                    </a>
                                                </button> -->
                                            <button role="button" name="addreferral" class="btn btn-primary btn-block">
                                                Add Date & Time
                                            </button>
                                            <button role="button" class="btn btn-primary btn-block">
                                                <a href="details_reservation.php" style="color:white"> Back</a>
                                            </button>
                                        </form>
                                    </div>
                                    <thead style=" white-space: nowrap; background-color: skyblue; ">
                                        <tr>
                                            <th>
                                            </th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>

                                    <tbody style=" white-space: nowrap;">
                                        <?php do { ?>
                                            <tr>
                                                <?php if ($row7 != null) { ?>
                                                    <td>
                                                        <form action="" method="post">
                                                            <button class="fa fa-trash" style="color: red; border-color: white;" type="submit" name="deletereferraldate">
                                                                Delete
                                                            </button>
                                                            <input type="hidden" name="ID" value="<?php echo $row7['id']; ?>">
                                                            <input type="hidden" name="date" value="<?php echo $row7['referral_date']; ?>">
                                                        </form>
                                                    </td>
                                                    <td><?php echo $row7['referral_date']; ?></td>
                                                <?php } else { ?>
                                                    <td>
                                                        <p>
                                                            <b style="color: red;"> Date (No data!)</b>
                                                        </p>
                                                    </td>
                                                <?php } ?>
                                            </tr>
                                        <?php } while ($row7 = $datereferral->fetch_assoc()) ?>
                                    </tbody>

                                    <thead style=" white-space: nowrap; background-color: skyblue; ">
                                        <tr>
                                            <th>
                                                <form action="add_referral_time.php" method="post">
                                                    <button role="button" name="addreferral" class="btn btn-primary btn-block">
                                                        Add Time
                                                    </button>
                                                </form>
                                            </th>
                                            <th>Time</th>
                                        </tr>
                                    </thead>

                                    <tbody style=" white-space: nowrap;">
                                        <?php do { ?>
                                            <tr>
                                                <?php if ($row8 != null) { ?>
                                                    <td>
                                                        <form action="" method="post">
                                                            <button class="fa fa-trash" style="color: red; border-color: white;" type="submit" name="deletereferraltime">
                                                                Delete
                                                            </button>
                                                            <input type="hidden" name="ID" value="<?php echo $row8['id']; ?>">
                                                            <input type="hidden" name="time" value="<?php echo $row8['referral_time']; ?>">
                                                        </form>
                                                    </td>
                                                    <td><?php echo $row8['referral_time']; ?></td>
                                                <?php } else { ?>
                                                    <td>
                                                        <p>
                                                            <b style="color: red;"> Time (No data!)</b>
                                                        </p>
                                                    </td>
                                                <?php } ?>
                                            </tr>
                                        <?php } while ($row8 = $datereferral2->fetch_assoc()) ?>
                                    </tbody>

                                </table>
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