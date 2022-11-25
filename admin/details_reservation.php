<!DOCTYPE html>
<html dir="ltr" lang="en">

<?php include 'includes/header.php';

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['UserLogin']) && $_SESSION['Access'] == "Administrator" || $_SESSION['Access'] == "Counselor") {

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

<head>
    <style>
        table {
            border-collapse: collapse;
            margin: 25px;
            font-size: 0.9em;
            font-family: sans-serif;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            width: 50%;
            background-color: lightcyan;
        }

        table thead tr {
            background-color: #009879;
            color: black;
            text-align: left;
        }

        table thead,
        tr:hover {
            background-color: aqua;
        }

        th,
        td {
            padding: 8px;
            font-family: Arial, Helvetica, sans-serif;
        }

        th,
        td:hover {
            background-color: white;
        }
         #rightColumn, #leftColumn {
        width: 50%;
        float: left;
       }
       #rightColumn {
        float: right;
       }
       @media screen and (max-width: 600px) {
        #rightColumn, #leftColumn { float: none; }
       }
    </style>
</head>

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

                <!-- Reservation Feeds -->
                <?php 
                if (isset($_POST['reservation'])) { 
                ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="card" style="background-color:aquamarine">

                                <!-- for delete function -->
                                <div>
                                    <!-- for counseling reservation -->
                                    <?php
                                    // delete reservation date by id
                                    if (isset($_POST['deletedate'])) {
                                        $id = $_POST['ID'];
                                        $sql = "DELETE FROM apointment_date WHERE id = '$id'";
                                        $con->query($sql) or die($con->error);
                                    ?>
                                        <h3>
                                            Successfully Deleted! Counseling Date
                                            <p style="color: red; align-items:center"> ID:
                                                <?php echo $id ?>
                                            </p>
                                        </h3>
                                    <?php } ?>
                                    <?php
                                    if (isset($_POST['deletetime'])) {
                                        $id = $_POST['ID'];
                                        $sql = "DELETE FROM apointment_time WHERE id = '$id'";
                                        $con->query($sql) or die($con->error);
                                    ?>
                                        <h3>
                                            Successfully Deleted! Counseling Time
                                            <p style="color: red; align-items:center"> ID:
                                                <?php echo $id ?>
                                            </p>
                                        </h3>
                                        </h3>
                                    <?php } ?>

                                    <!-- for referral reservation -->
                                    <?php
                                    // delete referral date by id
                                    if (isset($_POST['deletereferraldate'])) {
                                        $id = $_POST['ID'];
                                        $sql = "DELETE FROM referral_date WHERE id = '$id'";
                                        $con->query($sql) or die($con->error);
                                    ?>
                                        <h3>
                                            Successfully Deleted! Referral Date
                                            <p style="color: red; align-items:center"> ID:
                                                <?php echo $id ?>
                                            </p>
                                        </h3>
                                    <?php } ?>
                                    <?php
                                    // delete referral time by id
                                    if (isset($_POST['deletereferraltime'])) {
                                        $id = $_POST['ID'];
                                        $sql = "DELETE FROM referral_time WHERE id = '$id'";
                                        $con->query($sql) or die($con->error);
                                    ?>
                                        <h3>
                                            Successfully Deleted! Referral Time
                                            <p style="color: red; align-items:center"> ID:
                                                <?php echo $id; ?>
                                            </p>
                                        </h3>
                                    <?php } ?>

                                    <!-- for testing reservation -->
                                    <?php
                                    if (isset($_POST['deletetestingdate'])) {
                                        $id = $_POST['ID'];
                                        $sql = "DELETE FROM testing_date WHERE id = '$id'";
                                        $con->query($sql) or die($con->error);
                                    ?>
                                        <h3>
                                            Successfully Deleted! Testing Date
                                            <p style="color: red; align-items:center">
                                                <?php echo $id ?>
                                            </p>
                                        </h3>
                                    <?php } ?>
                                    <?php
                                    // delete testing time by id
                                    if (isset($_POST['deletetestingtime'])) {
                                        $id = $_POST['ID'];
                                        $sql = "DELETE FROM testing_time WHERE id = '$id'";
                                        $con->query($sql) or die($con->error);
                                    ?>
                                        <h3>
                                            Successfully Deleted! Testing Time
                                            <p style="color: red; align-items:center"> ID:
                                                <?php echo $id ?>
                                            </p>
                                        </h3>
                                    <?php } ?>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card" style="align-items: center;">
                                <div class="table-responsive">
                                    <center>
                                        <form action="details_reservation.php" method="post" style="border: 2px solid white; border-radius:4px; padding:8px; background-color:aquamarine">
                                            <header>
                                                <h3 style="padding: 10px; color:black">Add Reservation</h3>
                                            </header>
                                            <div class="form-floating mb-3" style="padding:8px;">
                                                <select required name="reservationselect">
                                                    <option></option>
                                                    <option>5</option>
                                                    <option>7</option>
                                                    <option>9</option>
                                                    <option>11</option>
                                                    <option>13</option>
                                                    <option>15</option>
                                                </select>
                                                <button role="button" name="reservationlimit" class="btn btn-primary btn-block">
                                                    Next
                                                </button>
                                            </div>
                                        </form>
                                        <?php 
                                            if (isset($_POST['deletereservation'])){
                                                
                                                $sql2 = "DELETE FROM referral_time";
                                                $con->query($sql2) or die($con->error);
                                                
                                                $sql13 = "DELETE FROM apointment_time";
                                                $con->query($sql13) or die($con->error);
                                                
                                                $sql14 = "DELETE FROM apointment_date";
                                                $con->query($sql14) or die($con->error);
                                                
                                                $sql22 = "DELETE FROM referral_date";
                                                $con->query($sql22) or die($con->error);
                                        ?>
                                         <h3 style="color:green;"> <br>
                                            Successfully Deleted Reservations!
                                        </h3>
                                        <meta http-equiv="refresh" content="3">
                                        <?php
                                            }
                                        ?>
                                        <form action="" method="post">
                                            <div class="form-floating mb-3" style="padding:8px;">
                                                <button role="button" name="deletereservation" class="btn btn-primary btn-block">
                                                    Remove Remaining item/s
                                                </button>
                                            </div>
                                        </form>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php 
                }
                // for reservation (Counseling & Referral)
                if (isset($_POST['reservationlimit'])) {
                ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="card" style="align-items: center; background-color:antiquewhite">
                                <div class="table-responsive">

                                    <!-- for 5 reservation (Counseling & Referral) -->
                                    <?php
                                    if ($_POST['reservationselect'] != null) {
                                        if ($_POST['reservationselect'] == '5') { ?>
                                            <form action="" method="post" style="padding: 8px;"><br>
                                                <input type="date" required name="date5"><br><br>
                                                <input type="text" value="8:00-8:20 Am" name="res1">
                                                <input type="text" value="8:30-8:50 Am" name="res2">
                                                <input type="text" value="9:00-9:20 Am" name="res3">
                                                <input type="text" value="9:30-9:50 Am" name="res4">
                                                <input type="text" value="10:00-10:20 Am" name="res5"><br><br>
                                                <div class="form-floating mb-3" style="padding:8px;">
                                                    <button role="button" name="savereservation5" class="btn btn-primary btn-block">
                                                        Save Reservations
                                                    </button>
                                                </div>
                                            </form>

                                            <!-- for 7 reservation (Counseling & Referral) -->
                                        <?php }
                                        if ($_POST['reservationselect'] == '7') { ?>
                                            <form action="" method="post" style="padding: 8px;"><br>
                                                <input type="date" required name="date7"><br><br>
                                                <input type="text" value="8:00-8:20 Am" name="res1">
                                                <input type="text" value="8:30-8:50 Am" name="res2">
                                                <input type="text" value="9:00-9:20 Am" name="res3">
                                                <input type="text" value="9:30-9:50 Am" name="res4">
                                                <input type="text" value="10:00-10:20 Am" name="res5">
                                                <input type="text" value="10:30-10:50 Am" name="res6">
                                                <input type="text" value="11:00-11:20 Am" name="res7"><br><br>
                                                <div class="form-floating mb-3" style="padding:8px;">
                                                    <button role="button" name="savereservation7" class="btn btn-primary btn-block">
                                                        Save Reservations
                                                    </button>
                                                </div>
                                            </form>

                                            <!-- for 9 reservation (Counseling & Referral) -->
                                        <?php }
                                        if ($_POST['reservationselect'] == '9') { ?>
                                            <form action="" method="post" style="padding: 8px;"><br>
                                                <input type="date" required name="date9"><br><br>
                                                <input type="text" value="8:00-8:20 Am" name="res1">
                                                <input type="text" value="8:30-8:50 Am" name="res2">
                                                <input type="text" value="9:00-9:20 Am" name="res3">
                                                <input type="text" value="9:30-9:50 Am" name="res4">
                                                <input type="text" value="10:00-10:20 Am" name="res5">
                                                <input type="text" value="10:30-10:50 Am" name="res6">
                                                <input type="text" value="11:00-11:20 Am" name="res7">
                                                <input type="text" value="1:00-1:20 Pm" name="res8">
                                                <input type="text" value="1:30-1:50 Pm" name="res9"><br><br>
                                                <div class="form-floating mb-3" style="padding:8px;">
                                                    <button role="button" name="savereservation9" class="btn btn-primary btn-block">
                                                        Save Reservations
                                                    </button>
                                                </div>
                                            </form>

                                            <!-- for 11 reservation (Counseling & Referral) -->
                                        <?php }
                                        if ($_POST['reservationselect'] == '11') { ?>
                                            <form action="" method="post" style="padding: 8px;"><br>
                                                <input type="date" required name="date11"><br><br>
                                                <input type="text" value="8:00-8:20 Am" name="res1">
                                                <input type="text" value="8:30-8:50 Am" name="res2">
                                                <input type="text" value="9:00-9:20 Am" name="res3">
                                                <input type="text" value="9:30-9:50 Am" name="res4">
                                                <input type="text" value="10:00-10:20 Am" name="res5">
                                                <input type="text" value="10:30-10:50 Am" name="res6">
                                                <input type="text" value="11:00-11:20 Am" name="res7">
                                                <input type="text" value="1:00-1:20 Pm" name="res8">
                                                <input type="text" value="1:30-1:50 Pm" name="res9">
                                                <input type="text" value="2:00-2:20 Pm" name="res10">
                                                <input type="text" value="2:30-2:50 Pm" name="res11"><br><br>
                                                <div class="form-floating mb-3" style="padding:8px;">
                                                    <button role="button" name="savereservation11" class="btn btn-primary btn-block">
                                                        Save Reservations
                                                    </button>
                                                </div>
                                            </form>

                                            <!-- for 13 reservation (Counseling & Referral) -->
                                        <?php }
                                        if ($_POST['reservationselect'] == '13') { ?>
                                            <form action="" method="post" style="padding: 8px;"><br>
                                                <input type="date" required name="date13"><br><br>
                                                <input type="text" value="8:30-8:50 Am" name="res1">
                                                <input type="text" value="9:00-9:20 Am" name="res2">
                                                <input type="text" value="9:30-9:50 Am" name="res3">
                                                <input type="text" value="10:00-10:20 Am" name="res4">
                                                <input type="text" value="10:30-10:50 Am" name="res5">
                                                <input type="text" value="11:00-11:20 Am" name="res6">
                                                <input type="text" value="1:00-1:20 Pm" name="res7">
                                                <input type="text" value="1:30-1:50 Pm" name="res8">
                                                <input type="text" value="2:00-2:20 Pm" name="res9">
                                                <input type="text" value="2:30-2:50 Pm" name="res10">
                                                <input type="text" value="3:00-3:20 Pm" name="res11">
                                                <input type="text" value="3:30-3:50 Pm" name="res12">
                                                <input type="text" value="4:00-4:20 Pm" name="res13"><br><br>
                                                <div class="form-floating mb-3" style="padding:8px;">
                                                    <button role="button" name="savereservation13" class="btn btn-primary btn-block">
                                                        Save Reservations
                                                    </button>
                                                </div>
                                            </form>

                                            <!-- for 15 reservation (Counseling & Referral) -->
                                        <?php }
                                        if ($_POST['reservationselect'] == '15') { ?>
                                            <form action="" method="post" style="padding: 8px;"><br>
                                                <input type="date" required name="date15"><br><br>
                                                <input type="text" value="8:00-8:20 Am" name="res1">
                                                <input type="text" value="8:30-8:50 Am" name="res2">
                                                <input type="text" value="9:00-9:20 Am" name="res3">
                                                <input type="text" value="9:30-9:50 Am" name="res4">
                                                <input type="text" value="10:00-10:20 Am" name="res5">
                                                <input type="text" value="10:30-10:50 Am" name="res6">
                                                <input type="text" value="11:00-11:20 Am" name="res7">
                                                <input type="text" value="1:00-1:20 Pm" name="res8">
                                                <input type="text" value="1:30-1:50 Pm" name="res9">
                                                <input type="text" value="2:00-2:20 Pm" name="res10">
                                                <input type="text" value="2:30-2:50 Pm" name="res11">
                                                <input type="text" value="3:00-3:20 Pm" name="res12">
                                                <input type="text" value="3:30-3:50 Pm" name="res13">
                                                <input type="text" value="4:00-4:20 Pm" name="res14">
                                                <input type="text" value="4:30-4:50 Pm" name="res15"><br><br>
                                                <div class="form-floating mb-3" style="padding:8px;">
                                                    <button role="button" name="savereservation15" class="btn btn-primary btn-block">
                                                        Save Reservations
                                                    </button>
                                                </div>
                                            </form>
                                    <?php }
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }
                // <!-- for 5 reservation (Counseling & Referral) -->
                if (isset($_POST['savereservation5'])) {
                    $date = $_POST['date5'];
                    $sql = "INSERT INTO `apointment_date`(`apointment_date`)VALUES ('$date')";
                    $con->query($sql) or die($con->error);

                    $sql2 = "INSERT INTO `referral_date`(`referral_date`)VALUES ('$date')";
                    $con->query($sql2) or die($con->error);

                    $time1 = $_POST['res1'];
                    $time2 = $_POST['res2'];
                    $time3 = $_POST['res3'];
                    $time4 = $_POST['res4'];
                    $time5 = $_POST['res5'];
                    $sql3 = "INSERT INTO `apointment_time`( `apointment_time`)
                    VALUES ('$time1'),('$time2'),('$time3'),('$time4'),('$time5')";
                    $con->query($sql3) or die($con->error);

                    $sql4 = "INSERT INTO `referral_time`( `referral_time`)
                    VALUES ('$time1'),('$time2'),('$time3'),('$time4'),('$time5')";
                    $con->query($sql4) or die($con->error);
                ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="card" style="align-items: center; background-color:antiquewhite">
                                <div class="table-responsive">
                                    <form action="details_reservation.php" method="post" style="padding: 8px;">
                                        <h3>Successfully Saved Reservations</h3>
                                        <button name="reservation" style="background-color:white; border: none;">
                                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="details_reservation.php" aria-expanded="false">
                                                <i class="fa fa-home" style="color: yellowgreen;"></i>
                                                <span class="hide-menu">Back to Reservation Home</span>
                                            </a>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                // <!-- for 7 reservation (Counseling & Referral) -->
                if (isset($_POST['savereservation7'])) {
                    $date = $_POST['date7'];
                    $sql = "INSERT INTO `apointment_date`(`apointment_date`)VALUES ('$date')";
                    $con->query($sql) or die($con->error);

                    $sql2 = "INSERT INTO `referral_date`(`referral_date`)VALUES ('$date')";
                    $con->query($sql2) or die($con->error);

                    $time1 = $_POST['res1'];
                    $time2 = $_POST['res2'];
                    $time3 = $_POST['res3'];
                    $time4 = $_POST['res4'];
                    $time5 = $_POST['res5'];
                    $time6 = $_POST['res6'];
                    $time7 = $_POST['res7'];
                    $sql3 = "INSERT INTO `apointment_time`( `apointment_time`)
                    VALUES ('$time1'),('$time2'),('$time3'),('$time4'),('$time5'),('$time6'),('$time7')";
                    $con->query($sql3) or die($con->error);

                    $sql4 = "INSERT INTO `referral_time`( `referral_time`)
                    VALUES ('$time1'),('$time2'),('$time3'),('$time4'),('$time5'),('$time6'),('$time7')";
                    $con->query($sql4) or die($con->error);
                ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="card" style="align-items: center; background-color:antiquewhite">
                                <div class="table-responsive">
                                    <form action="details_reservation.php" method="post" style="padding: 8px;">
                                        <h3>Successfully Saved Reservations</h3>
                                        <button name="reservation" style="background-color:white; border: none;">
                                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="details_reservation.php" aria-expanded="false">
                                                <i class="fa fa-home" style="color: yellowgreen;"></i>
                                                <span class="hide-menu">Back to Reservation Home</span>
                                            </a>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                // <!-- for 9 reservation (Counseling & Referral) -->
                if (isset($_POST['savereservation9'])) {
                    $date = $_POST['date9'];
                    $sql = "INSERT INTO `apointment_date`(`apointment_date`)VALUES ('$date')";
                    $con->query($sql) or die($con->error);

                    $sql2 = "INSERT INTO `referral_date`(`referral_date`)VALUES ('$date')";
                    $con->query($sql2) or die($con->error);

                    $time1 = $_POST['res1'];
                    $time2 = $_POST['res2'];
                    $time3 = $_POST['res3'];
                    $time4 = $_POST['res4'];
                    $time5 = $_POST['res5'];
                    $time6 = $_POST['res6'];
                    $time7 = $_POST['res7'];
                    $time8 = $_POST['res8'];
                    $time9 = $_POST['res9'];
                    $sql3 = "INSERT INTO `apointment_time`( `apointment_time`)
                    VALUES ('$time1'),('$time2'),('$time3'),('$time4'),('$time5'),('$time6'),('$time7'),('$time8'),('$time9')";
                    $con->query($sql3) or die($con->error);

                    $sql4 = "INSERT INTO `referral_time`( `referral_time`)
                    VALUES ('$time1'),('$time2'),('$time3'),('$time4'),('$time5'),('$time6'),('$time7'),('$time8'),('$time9')";
                    $con->query($sql4) or die($con->error);
                ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="card" style="align-items: center; background-color:antiquewhite">
                                <div class="table-responsive">
                                    <form action="details_reservation.php" method="post" style="padding: 8px;">
                                        <h3>Successfully Saved Reservations</h3>
                                        <button name="reservation" style="background-color:white; border: none;">
                                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="details_reservation.php" aria-expanded="false">
                                                <i class="fa fa-home" style="color: yellowgreen;"></i>
                                                <span class="hide-menu">Back to Reservation Home</span>
                                            </a>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                // <!-- for 11 reservation (Counseling & Referral) -->
                if (isset($_POST['savereservation11'])) {
                    $date = $_POST['date11'];
                    $sql = "INSERT INTO `apointment_date`(`apointment_date`)VALUES ('$date')";
                    $con->query($sql) or die($con->error);

                    $sql2 = "INSERT INTO `referral_date`(`referral_date`)VALUES ('$date')";
                    $con->query($sql2) or die($con->error);

                    $time1 = $_POST['res1'];
                    $time2 = $_POST['res2'];
                    $time3 = $_POST['res3'];
                    $time4 = $_POST['res4'];
                    $time5 = $_POST['res5'];
                    $time6 = $_POST['res6'];
                    $time7 = $_POST['res7'];
                    $time8 = $_POST['res8'];
                    $time9 = $_POST['res9'];
                    $time10 = $_POST['res10'];
                    $time11 = $_POST['res11'];
                    $sql3 = "INSERT INTO `apointment_time`( `apointment_time`)
                    VALUES ('$time1'),('$time2'),('$time3'),('$time4'),('$time5'),('$time6'),('$time7'),('$time8'),('$time9'),('$time10'),('$time11')";
                    $con->query($sql3) or die($con->error);

                    $sql4 = "INSERT INTO `referral_time`( `referral_time`)
                    VALUES ('$time1'),('$time2'),('$time3'),('$time4'),('$time5'),('$time6'),('$time7'),('$time8'),('$time9'),('$time10'),('$time11')";
                    $con->query($sql4) or die($con->error);
                ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="card" style="align-items: center; background-color:antiquewhite">
                                <div class="table-responsive">
                                    <form action="details_reservation.php" method="post" style="padding: 8px;">
                                        <h3>Successfully Saved Reservations</h3>
                                        <button name="reservation" style="background-color:white; border: none;">
                                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="details_reservation.php" aria-expanded="false">
                                                <i class="fa fa-home" style="color: yellowgreen;"></i>
                                                <span class="hide-menu">Back to Reservation Home</span>
                                            </a>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                // <!-- for 11 reservation (Counseling & Referral) -->
                if (isset($_POST['savereservation13'])) {
                    $date = $_POST['date13'];
                    $sql = "INSERT INTO `apointment_date`(`apointment_date`)VALUES ('$date')";
                    $con->query($sql) or die($con->error);

                    $sql2 = "INSERT INTO `referral_date`(`referral_date`)VALUES ('$date')";
                    $con->query($sql2) or die($con->error);

                    $time1 = $_POST['res1'];
                    $time2 = $_POST['res2'];
                    $time3 = $_POST['res3'];
                    $time4 = $_POST['res4'];
                    $time5 = $_POST['res5'];
                    $time6 = $_POST['res6'];
                    $time7 = $_POST['res7'];
                    $time8 = $_POST['res8'];
                    $time9 = $_POST['res9'];
                    $time10 = $_POST['res10'];
                    $time11 = $_POST['res11'];
                    $time12 = $_POST['res12'];
                    $time13 = $_POST['res13'];
                    $sql3 = "INSERT INTO `apointment_time`( `apointment_time`)
                    VALUES ('$time1'),('$time2'),('$time3'),('$time4'),('$time5'),('$time6'),('$time7'),('$time8'),('$time9'),('$time10'),('$time11'),('$time12'),('$time13')";
                    $con->query($sql3) or die($con->error);

                    $sql4 = "INSERT INTO `referral_time`( `referral_time`)
                    VALUES ('$time1'),('$time2'),('$time3'),('$time4'),('$time5'),('$time6'),('$time7'),('$time8'),('$time9'),('$time10'),('$time11'),('$time12'),('$time13')";
                    $con->query($sql4) or die($con->error);
                ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="card" style="align-items: center; background-color:antiquewhite">
                                <div class="table-responsive">
                                    <form action="details_reservation.php" method="post" style="padding: 8px;">
                                        <h3>Successfully Saved Reservations</h3>
                                        <button name="reservation" style="background-color:white; border: none;">
                                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="details_reservation.php" aria-expanded="false">
                                                <i class="fa fa-home" style="color: yellowgreen;"></i>
                                                <span class="hide-menu">Back to Reservation Home</span>
                                            </a>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                // <!-- for 11 reservation (Counseling & Referral) -->
                if (isset($_POST['savereservation15'])) {
                    $date = $_POST['date15'];
                    $sql = "INSERT INTO `apointment_date`(`apointment_date`)VALUES ('$date')";
                    $con->query($sql) or die($con->error);

                    $sql2 = "INSERT INTO `referral_date`(`referral_date`)VALUES ('$date')";
                    $con->query($sql2) or die($con->error);

                    $time1 = $_POST['res1'];
                    $time2 = $_POST['res2'];
                    $time3 = $_POST['res3'];
                    $time4 = $_POST['res4'];
                    $time5 = $_POST['res5'];
                    $time6 = $_POST['res6'];
                    $time7 = $_POST['res7'];
                    $time8 = $_POST['res8'];
                    $time9 = $_POST['res9'];
                    $time10 = $_POST['res10'];
                    $time11 = $_POST['res11'];
                    $time12 = $_POST['res12'];
                    $time13 = $_POST['res13'];
                    $time14 = $_POST['res14'];
                    $time15 = $_POST['res15'];
                    $sql3 = "INSERT INTO `apointment_time`( `apointment_time`)
                    VALUES ('$time1'),('$time2'),('$time3'),('$time4'),('$time5'),('$time6'),('$time7'),('$time8'),('$time9'),('$time10'),('$time11'),('$time12'),('$time13'),('$time14'),('$time15')";
                    $con->query($sql3) or die($con->error);

                    $sql4 = "INSERT INTO `referral_time`( `referral_time`)
                    VALUES ('$time1'),('$time2'),('$time3'),('$time4'),('$time5'),('$time6'),('$time7'),('$time8'),('$time9'),('$time10'),('$time11'),('$time12'),('$time13'),('$time14'),('$time15')";
                    $con->query($sql4) or die($con->error);
                ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="card" style="align-items: center; background-color:antiquewhite">
                                <div class="table-responsive">
                                    <form action="details_reservation.php" method="post" style="padding: 8px;">
                                        <h3>Successfully Saved Reservations</h3>
                                        <button name="reservation" style="background-color:white; border: none;">
                                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="details_reservation.php" aria-expanded="false">
                                                <i class="fa fa-home" style="color: yellowgreen;"></i>
                                                <span class="hide-menu">Back to Reservation Home</span>
                                            </a>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>

                <div class="card" style="background-color:aquamarine;align-items:center">
                    <div class="table-responsive">
                        <table>
                            <thead style=" white-space: nowrap; background-color: skyblue; ">
                                <tr>
                                    <th>
                                        <h3 style="text-align: center;">
                                            Counseling Reservation
                                            <span style="padding:4px;color:black;background-color: yellow; border-radius:8px;">
                                                <?php
                                                $sql5 = "SELECT * FROM apointment_time ORDER BY id DESC";
                                                $query_run0 = mysqli_query($con, $sql5);
                                                $row0 = mysqli_num_rows($query_run0);
                                                echo $row0;
                                                ?>
                                            </span>
                                        </h3>
                                        <h3 style="text-align: center;">
                                                Referral Reservation
                                            <span style="padding:4px;color:black;background-color: yellow; border-radius:8px;">
                                                    <?php
                                                    $sql7 = "SELECT * FROM referral_time ORDER BY id DESC";
                                                    $query_run2 = mysqli_query($con, $sql7);
                                                    $row2 = mysqli_num_rows($query_run2);
                                                    echo $row2;
                                                    ?>
                                            </span>
                                        </h3>
                                    </th>
                                </tr>
                                <tr>
                                    <th style="text-align: center;">Date/s</th>
                                </tr>
                            </thead>

                            <tbody style=" white-space: nowrap;">
                                <?php do { ?>
                                    <tr>
                                        <?php if ($row5 != null) { ?>
                                            <td><?php echo $row5['apointment_date']; ?></td>
                                        <?php } else { ?>
                                            <td>
                                                <p>
                                                    <b style="color: red;">Date (No data!)</b>
                                                </p>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                <?php } while ($row5 = $datecounseling->fetch_assoc()) ?>
                            </tbody>

                            <thead style=" white-space: nowrap; background-color: skyblue; ">
                                <tr>
                                    <th style="text-align: center;">Time</th>
                                </tr>
                            </thead>

                            <tbody style=" white-space: nowrap;">
                                <?php do { ?>
                                    <tr>
                                        <?php if ($row6 != null) { ?>
                                            <td><?php echo $row6['apointment_time']; ?></td>
                                        <?php } else { ?>
                                            <td>
                                                <p>
                                                    <b style="color: red;">Time (No data!)</b>
                                                </p>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                <?php } while ($row6 = $datecounseling2->fetch_assoc()) ?>

                                <thead style=" white-space: nowrap; background-color: skyblue; ">
                                    <tr>
                                        <th>
                                            <h3>
                                                Referral Reservation
                                                <span style="padding:4px;color:black;background-color: yellow; border-radius:8px; float:right">
                                                    <?php
                                                    $sql7 = "SELECT * FROM referral_time ORDER BY id DESC";
                                                    $query_run2 = mysqli_query($con, $sql7);
                                                    $row2 = mysqli_num_rows($query_run2);
                                                    echo $row2;
                                                    ?>
                                                </span>
                                            </h3>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">Date</th>
                                    </tr>
                                </thead>

                            <tbody style=" white-space: nowrap;">
                                <?php do { ?>
                                    <tr>
                                        <?php if ($row7 != null) { ?>
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
                                    <th style="text-align: center;">Time</th>
                                </tr>
                            </thead>

                            <tbody style=" white-space: nowrap;">
                                <?php do { ?>
                                    <tr>
                                        <?php if ($row8 != null) { ?>
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