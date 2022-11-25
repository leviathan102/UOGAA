<!DOCTYPE html>
<html dir="ltr" lang="en">

<?php
if (!isset($_SESSION)) {
    session_start();
}
if (
    isset($_SESSION['UserLogin'])
    && $_SESSION['Access'] == "Administrator"
    || $_SESSION['Access'] == "Dean"
    || $_SESSION['Access'] == "Counselor"
    || $_SESSION['Access'] == "Faculty"
) {

    // connection to the database
    include_once("connections/connection.php");
    $con = connection();

    $sql = "SELECT * FROM counseling_appointment ORDER BY id DESC";
    $appointment = $con->query($sql) or die($con->error);
    $row = $appointment->fetch_assoc();

    $sql2 = "SELECT * FROM referral_counseling ORDER BY id DESC";
    $referral = $con->query($sql2) or die($con->error);
    $row2 = $referral->fetch_assoc();

    $sql3 = "SELECT * FROM testing_service ORDER BY id DESC";
    $testing = $con->query($sql3) or die($con->error);
    $row3 = $testing->fetch_assoc();

    $sql4 = "SELECT * FROM exit_interview ORDER BY id DESC";
    $interview = $con->query($sql4) or die($con->error);
    $row4 = $interview->fetch_assoc();

    //counseling
    $sql5 = "SELECT * FROM apointment_time ORDER BY id DESC";
    $query_run0 = mysqli_query($con, $sql5);
    $row5 = mysqli_num_rows($query_run0);

    //referral
    $sql7 = "SELECT * FROM referral_time ORDER BY id DESC";
    $query_run2 = mysqli_query($con, $sql7);
    $row6 = mysqli_num_rows($query_run2);

?>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="shortcut icon" type="image/x-icon" href="../img/logo.png">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BukSU Guidance Office | Home</title>
        <!-- Custom CSS -->
        <!-- Custom CSS -->
        <link href="../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
        <link href="../dist/css/style.min.css" rel="stylesheet">
        <style>
            body {
                background-image: linear-gradient(90deg, rgb(193, 193, 193), rgb(107, 107, 107)), linear-gradient(157.5deg, rgb(0, 165, 230) 0%, rgb(0, 165, 230) 39%, rgb(17, 149, 218) 39%, rgb(17, 149, 218) 56%, rgb(35, 132, 206) 56%, rgb(35, 132, 206) 60%, rgb(52, 116, 195) 60%, rgb(52, 116, 195) 68%, rgb(70, 99, 183) 68%, rgb(70, 99, 183) 86%, rgb(87, 83, 171) 86%, rgb(87, 83, 171) 100%), linear-gradient(135deg, rgb(0, 165, 230) 0%, rgb(0, 165, 230) 39%, rgb(17, 149, 218) 39%, rgb(17, 149, 218) 56%, rgb(35, 132, 206) 56%, rgb(35, 132, 206) 60%, rgb(52, 116, 195) 60%, rgb(52, 116, 195) 68%, rgb(70, 99, 183) 68%, rgb(70, 99, 183) 86%, rgb(87, 83, 171) 86%, rgb(87, 83, 171) 100%);
                background-blend-mode: overlay, overlay, normal;

            }

            table {
                border-collapse: collapse;
                margin: 25px;
                font-size: 0.9em;
                font-family: sans-serif;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
                width: 95%;
                /* padding: 8px;
                border: none; */
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

            tr:nth-child(add) {
                background-color: #3567f1;
            }

            .pagination li:hover {
                background-color: lightblue;
                font-weight: bold;
            }

            .pagination a:hover {
                background-color: lightblue;
                font-weight: bold;
            }

            .pagination {
                background-color: cornsilk;
                width: fit-content;
                float: right;
                margin: 25px;
            }

            .active {
                background-color: lightblue;
                font-weight: bold;
            }

            h2 {
                text-align: center;
                padding: 8px;
                font-family: Georgia, 'Times New Roman', Times, serif;
            }

            form button:hover {
                background-color: greenyellow;
            }

            .select {
                border-radius: 16px;
                display: grid;
                grid-template-areas: "select";
                align-items: center;
                position: relative;

                min-width: 15ch;
                max-width: 30ch;

                border: 1px solid var(#777);
                border-radius: 0.25em;
                padding: 0.25em 0.5em;

                font-size: 1.25rem;
                cursor: pointer;
                line-height: 1.1;
            }

            /* Hide arrow icon in IE browsers */
            .select::-ms-expand {
                display: none;
            }

            .select:hover::after {
                border-color: #888;
            }

            /* Focus on selected item */
            .select:focus {
                border-color: #800080;
                box-shadow: 0 0 1px 3px rgba(59, 153, 252, .7);
                color: #222;
                outline: none;
            }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#limit-records").change(function() {
                    $('form').submit();
                })
            })
        </script>
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
                            <h4 class="page-title"><i class="mdi mdi-view-dashboard"></i> Guidance Application</h4>
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
                    <!-- Sales chart -->
                    <!-- ============================================================== -->

                    <?php if (isset($_SESSION['UserLogin']) && $_SESSION['Access'] == "Faculty") {

                        // college dean list of testing request filter
                        $deancollege = $_SESSION['College'];

                    ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <meta http-equiv="refresh" content="120">
                                    <h3 style="text-align: center ; color: black">
                                        Welcome Faculty
                                        <b style="color: lightblue;">
                                            <?php echo $deancollege ?>
                                        </b>
                                    </h3>
                                    <div class="table-responsive" style="padding-bottom: 8px; ">
                                        <!-- faculty-table -->
                                        <table style="padding: 8px; ">
                                            <thead style=" white-space: nowrap; background-color:#3567f1;">
                                                <tr>
                                                    <th style="text-align: center ;">
                                                        <form action="referral_college_filter.php" method="post">
                                                            <button role="button" name="referral" class="btn btn-primary btn-block" style="text-align: center;">
                                                                Refer
                                                            </button>
                                                        </form><br>
                                                    </th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }
                    ?>

                    <?php if (isset($_SESSION['UserLogin']) && $_SESSION['Access'] == "Dean") {
                        // if (isset($_SESSION['College']) != null) {
                        // for college list
                        $sql10 = "SELECT * FROM college_list ORDER BY name ASC";
                        $appointment10 = $con->query($sql10) or die($con->error);
                        $row10 = $appointment10->fetch_assoc();

                    ?>
                        <?php
                        // college dean list of testing request filter
                        $deancollege = $_SESSION['College'];

                        if (!isset($_GET['page'])) {

                            $page_number = 1;
                        } else {

                            $page_number = $_GET['page'];
                        }

                        $limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 10;
                        $page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
                        $start = ($page - 1) * $limit;

                        $sql03 = "SELECT * FROM testing_service WHERE college_of='$deancollege'
                        AND status='noaction' ORDER BY id DESC LIMIT $start, $limit";
                        $testing = $con->query($sql03) or die($con->error);
                        $row03 = $testing->fetch_assoc();

                        //testing
                        $query06 = "SELECT * FROM testing_service WHERE college_of='$deancollege' 
                        AND status='noaction' ORDER BY purpose ASC";
                        $query_run06 = mysqli_query($con, $query06);
                        $row06 = mysqli_num_rows($query_run06);

                        $sql001 = "SELECT count(id) AS id FROM testing_service WHERE college_of='$deancollege'";
                        $appointment1 = $con->query($sql001) or die($con->error);
                        $counselingCount = $appointment1->fetch_all(MYSQLI_ASSOC);
                        $total = $counselingCount[0]['id'];
                        $pages = ceil($total / $limit);

                        $previous = $page - 1;
                        $next = $page + 1;
                        ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <meta http-equiv="refresh" content="120">
                                    <h3 style="text-align: center ;">
                                        <b style="color: blue;">
                                            <?php echo $deancollege ?>
                                        </b>
                                    </h3>
                                    <div class="table-responsive" style="padding-bottom: 8px; ">
                                        <!-- testing-table -->
                                        <div class="container" style="padding-bottom: 8px; background-color:aquamarine">
                                            <form action="testing_limit.php" method="post" id="form" name="form">
                                                <ul class="pagination pagination">
                                                    <a href="index.php?page=<?php echo $previous; ?>" style="padding:8px;">
                                                        &laquo; Previous
                                                    </a>
                                                    <?php for ($i = 1; $i <= $pages; $i++) { ?>
                                                        <li style="padding:8px; ">
                                                            <a href="index.php?page=<?php echo $i; ?>">
                                                                <?php echo $i; ?>
                                                            </a>
                                                        </li>
                                                    <?php } ?>
                                                    <a href="index.php?page=<?php echo $next; ?>" style="padding:8px;">
                                                        Next &raquo;
                                                    </a>
                                                </ul>
                                            </form>
                                        </div>
                                        <table style="padding: 8px; ">
                                            <thead style=" white-space: nowrap; background-color:#3567f1 ">
                                                <tr>
                                                    <th>Total:
                                                        <b style="color: blue;">
                                                            <?php echo $row06; ?>
                                                        </b>
                                                    </th>
                                                    <th>Name(Taker)</th>
                                                    <th>Email</th>
                                                    <th>Purpose</th>
                                                </tr>
                                            </thead>
                                            <?php do { ?>
                                                <?php if ($row03 != null) { ?>
                                                    <tbody>
                                                        <tr>
                                                            <td style=" white-space: nowrap; "></td>
                                                            <td style=" white-space: nowrap; ">
                                                                <?php
                                                                echo $row03['name'];
                                                                ?>
                                                            </td>
                                                            <td style="color: blue;">
                                                                <i>
                                                                    <?php
                                                                    echo $row03['email'];
                                                                    ?>
                                                                </i>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                echo $row03['purpose'];
                                                                ?>
                                                            </td>
                                                        </tr>
                                                    <?php } else {
                                                    echo '<h4 style="color: red;" >' . '<b>' . 'Testing' . '<b>' . ' (No Entry!)' . '</h4>';
                                                }
                                                    ?>
                                                <?php } while ($row03 = $testing->fetch_assoc()) ?>

                                                    </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="table-responsive" style="padding-bottom: 8px; ">
                                        <!-- testing-table -->
                                        <div class="container" style="padding-bottom: 8px;">
                                            <form action="" method="post">
                                                <div class="form-floating mb-3">
                                                    <input type="date" name="reqdate" required>
                                                    <input type="time" name="reqtime" required>
                                                    <input type="hidden" required name="reqstat" value="deanrequest">
                                                    <input type="hidden" required name="reqcollege" value="<?php echo $deancollege ?>">
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <button role="button" name="sendtestingrequest" class="btn btn-primary btn-block">
                                                        Send Testing Request
                                                    </button>
                                                </div>
                                            </form>
                                            <?php
                                            if (isset($_POST['sendtestingrequest'])) {
                                                $date = $_POST['reqdate'];
                                                $time = $_POST['reqtime'];
                                                $status = $_POST['reqstat'];
                                                $college = $_POST['reqcollege'];
                                                $sql10 = "UPDATE `testing_service` SET `date_prefer`='$date',
                                                `time_prefer`='$time',`status`='$status' WHERE college_of= '$college'";
                                                $con->query($sql10) or die($con->error);
                                            ?>
                                                <meta http-equiv="refresh" content="2">
                                                <h4 style="color: green;"> Successfully Requested!</h4>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }
                    // } 
                    ?>

                    <?php if (isset($_SESSION['UserLogin']) && $_SESSION['Access'] == "Administrator") { 
                    $deancollege = $_SESSION['College']; ?>
                        <meta http-equiv="refresh" content="100">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card" style=" background-image: linear-gradient(90deg, rgb(193, 193, 193),rgb(107, 107, 107)),linear-gradient(157.5deg, rgb(0, 165, 230) 0%, rgb(0, 165, 230) 39%,rgb(17, 149, 218) 39%, rgb(17, 149, 218) 56%,rgb(35, 132, 206) 56%, rgb(35, 132, 206) 60%,rgb(52, 116, 195) 60%, rgb(52, 116, 195) 68%,rgb(70, 99, 183) 68%, rgb(70, 99, 183) 86%,rgb(87, 83, 171) 86%, rgb(87, 83, 171) 100%),linear-gradient(135deg, rgb(0, 165, 230) 0%, rgb(0, 165, 230) 39%,rgb(17, 149, 218) 39%, rgb(17, 149, 218) 56%,rgb(35, 132, 206) 56%, rgb(35, 132, 206) 60%,rgb(52, 116, 195) 60%, rgb(52, 116, 195) 68%,rgb(70, 99, 183) 68%, rgb(70, 99, 183) 86%,rgb(87, 83, 171) 86%, rgb(87, 83, 171) 100%); background-blend-mode:overlay,overlay,normal;">
                                    <div class="card-body">
                                        <h1 class="card-title">
                                            <b>Feeds</b>
                                        </h1>
                                        <div class="feed-widget">
                                            <ul class="list-style-none feed-body m-0 p-b-20">

                                                <li class="feed-item" style="padding: 8px ; font-size:large; color:black; ">
                                                    <div class="feed-icon bg-info">
                                                        <i class="mdi mdi-calendar-multiple-check"></i>
                                                    </div>Number of Appointment/s
                                                    <span class="ms-auto font-12 text-muted" style="background-color: black; padding: 8px; font-size: 16px ;">
                                                        <b>
                                                            <?php
                                                            $query0 = "SELECT id FROM counseling_appointment ORDER BY id";
                                                            $query_run0 = mysqli_query($con, $query0);
                                                            $row0 = mysqli_num_rows($query_run0);

                                                            echo  $row0;
                                                            ?>
                                                        </b>
                                                    </span>
                                                </li>
                                                <li class="feed-item" style="padding: 8px ; font-size:large; color:black; ">
                                                    <div class="feed-icon bg-success">
                                                        <i class="mdi mdi-alarm-check"></i>
                                                    </div> Number of Referral/s
                                                    <span class="ms-auto font-12 text-muted" style="background-color: black; padding: 8px; font-size: 16px ;">
                                                        <b>
                                                            <?php
                                                            $query01 = "SELECT id FROM referral_counseling ORDER BY id";
                                                            $query_run01 = mysqli_query($con, $query01);
                                                            $row01 = mysqli_num_rows($query_run01);

                                                            echo  $row01;
                                                            ?>
                                                        </b>
                                                    </span>
                                                </li>
                                                <li class="feed-item" style="padding: 8px ; font-size:large; color:black;">
                                                    <div class="feed-icon bg-warning">
                                                        <i class="mdi mdi-book-open-page-variant"></i>
                                                    </div> Number of Testing Appointment/s
                                                    <span class="ms-auto font-12 text-muted" style="background-color: black; padding: 8px; font-size: 16px ;">
                                                        <b>
                                                            <?php
                                                            $query02 = "SELECT id FROM testing_service ORDER BY id";
                                                            $query_run02 = mysqli_query($con, $query02);
                                                            $row02 = mysqli_num_rows($query_run02);

                                                            echo  $row02;
                                                            ?>
                                                        </b>
                                                    </span>
                                                </li>
                                                <li class="feed-item" style="padding: 8px ; font-size:large; color:black;">
                                                    <div class="feed-icon bg-danger">
                                                        <i class="mdi mdi-account-multiple"></i>
                                                    </div> Number of Exit Interview
                                                    <span class="ms-auto font-12 text-muted" style="background-color: black; padding: 8px; font-size: 16px ;">
                                                        <b>
                                                            <?php
                                                            $query03 = "SELECT id FROM exit_interview ORDER BY id";
                                                            $query_run03 = mysqli_query($con, $query03);
                                                            $row03 = mysqli_num_rows($query_run03);

                                                            echo  $row03;
                                                            ?>
                                                        </b>
                                                    </span>
                                                </li>
                                                <li class="feed-item" style="padding: 8px ; font-size:large; background-color:white; margin-top:8px; color:black;">
                                                    <div class="feed-icon bg-primary">
                                                        <i class="mdi mdi-account-multiple-plus"></i>
                                                    </div> <b>Overall Appointment/s</b>
                                                    <span class="ms-auto font-12 text-muted" style=" background-color:blue; font-size: 20px ; font-weight: bold ; padding: 8px; ">
                                                        <b>
                                                            <?php
                                                            $sum = $row0 + $row01 + $row02 + $row03;
                                                            echo $sum;
                                                            ?>
                                                        </b>
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if (isset($_SESSION['UserLogin']) && $_SESSION['Access'] == "Counselor") {
                      $deancollege = $_SESSION['College']; ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="card"> 
                                
                                <?php
                                $query0 = "SELECT * FROM counseling_appointment WHERE status='noaction' ORDER BY added_at DESC";
                                $query_run0 = mysqli_query($con, $query0);
                                $row0 = mysqli_num_rows($query_run0);
                                ?>
                                <!-- referral -->
                                <?php
                                $query1 = "SELECT * FROM referral_counseling WHERE status='noaction' ORDER BY added_at DESC";
                                $query_run1 = mysqli_query($con, $query1);
                                $row1 = mysqli_num_rows($query_run1);
                                ?>
                                <!-- testing -->
                                <?php
                                $query2 = "SELECT * FROM testing_service WHERE status='noaction' ORDER BY added_at DESC";
                                $query_run2 = mysqli_query($con, $query2);
                                $row2 = mysqli_num_rows($query_run2);
                                ?>
                                    <meta http-equiv="refresh" content="120">
                                    <div class="table-responsive">
                                        <form action="counselling.php" method="post">
                                            <div class="form-floating mb-3" style="padding:8px;">
                                                <h1 style="text-align: center;">
                                                    <b style=" padding: 8px; border-radius: 24px; color:black">
                                                        <?php echo $deancollege ?>
                                                    </b>
                                                </h1>
                                            </div>
                            
                                            <?php
                                            $accomodatecounselor = $_SESSION['Username'];
                                            $accomodatepass = $_SESSION['Password'];
                                            $query0120 = "SELECT id FROM counseling_appointment WHERE college_of='$deancollege' AND catered_by='$accomodatecounselor' ORDER BY id";
                                            $query_run013 = mysqli_query($con, $query0120);
                                            $row014 = mysqli_num_rows($query_run013);
                                            //echo $row014;
                                            
                                            $query0130 = "SELECT id FROM referral_counseling WHERE college_of='$deancollege' AND catered_by='$accomodatecounselor' ORDER BY id";
                                            $query_run0133 = mysqli_query($con, $query0130);
                                            $row0143 = mysqli_num_rows($query_run0133);
                                            //echo ','.$row0143;
                                            
                                            $query0140 = "SELECT id FROM testing_service WHERE college_of='$deancollege' AND catered_by='$accomodatecounselor' ORDER BY id";
                                            $query_run01334 = mysqli_query($con, $query0140);
                                            $row01434 = mysqli_num_rows($query_run01334);
                                            //echo ','.$row01434;
                                            
                                            $totalaccomodation = $row01434 + $row0143 + $row014;
                                            ?>
                                            <table style="">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align:center">Accomodated</th>
                                                        <td style="color:yellow;"><?php echo $totalaccomodation ?></td>
                                                        <th style="text-align:center">Counseling Reservation Slot</th>
                                                        <td style="color:yellow;"><?php echo $row5 ?></td>
                                                        <th style="text-align:center">Referral Reservation Slot</th>
                                                        <td style="color:yellow;"><?php echo $row6 ?></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                    <div class="row">
                        <!-- column -->
                        <div class="col-12">
                            <div class="card">
                                <?php if (isset($_SESSION['UserLogin']) && $_SESSION['Access'] == "Counselor") { 
                                $deancollege = $_SESSION['College']; ?>
                                    <div class="row">
                                        <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                                            <div class="card" style="background-color:lightblue; align-items: center;">
                                                <div class="card-body">
                                                    <table class="table table-bordered mytable" style="color: black;">
                                                        <thead>
                                                            <tr>
                                                                <th style="color:yellow;">FEEDS</th>
                                                                <th style="color:yellow;">Number of Appointment/s</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Counseling</td>
                                                                <td>
                                                                    <?php
                                                                    $query0 = "SELECT id FROM counseling_appointment WHERE college_of='$deancollege' ORDER BY id";
                                                                    $query_run0 = mysqli_query($con, $query0);
                                                                    $row0201 = mysqli_num_rows($query_run0);
                                                                    echo  $row0201;
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Referral</td>
                                                                <td>
                                                                    <?php
                                                                    $query01 = "SELECT id FROM referral_counseling WHERE college_of='$deancollege' ORDER BY id";
                                                                    $query_run01 = mysqli_query($con, $query01);
                                                                    $row01 = mysqli_num_rows($query_run01);
                                                                    echo  $row01;
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Testing</td>
                                                                <td>
                                                                    <?php
                                                                    $query02 = "SELECT id FROM testing_service WHERE college_of='$deancollege'AND status!='noaction' ORDER BY id";
                                                                    $query_run02 = mysqli_query($con, $query02);
                                                                    $row02 = mysqli_num_rows($query_run02);
                                                                    echo  $row02;
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Exit Interview</td>
                                                                <td>
                                                                    <?php
                                                                    $query03 = "SELECT id FROM exit_interview WHERE college='$deancollege' ORDER BY id";
                                                                    $query_run03 = mysqli_query($con, $query03);
                                                                    $row03 = mysqli_num_rows($query_run03);
                                                                    echo  $row03;
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Users</td>
                                                                <td>
                                                                    <?php
                                                                    $query05 = "SELECT id FROM counselor_user WHERE college='$deancollege' ORDER BY id";
                                                                    $query_run05 = mysqli_query($con, $query05);
                                                                    $row05 = mysqli_num_rows($query_run05);
                                                                    echo  $row05;
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <strong>Total Appointment/s (Users not counted)</strong>
                                                                </td>
                                                                <td>
                                                                    <strong>
                                                                        <?php
                                                                        $sum = $row0 + $row01 + $row02 + $row03;
                                                                        echo $sum;
                                                                        ?>
                                                                    </strong>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-8 col-lg-8 col-xl-8">
                                            <div class="card">
                                                <div class="card-body">
                                                    <canvas id="overall_graph" height="250"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    
                                                    <?php
                                                    $query0 = "SELECT * FROM counseling_appointment WHERE status='noaction' ORDER BY added_at DESC";
                                                    $query_run0 = mysqli_query($con, $query0);
                                                    $row0 = mysqli_num_rows($query_run0);
                                                    ?>
                                                    <!-- referral -->
                                                    <?php
                                                    $query1 = "SELECT * FROM referral_counseling WHERE status='noaction' ORDER BY added_at DESC";
                                                    $query_run1 = mysqli_query($con, $query1);
                                                    $row1 = mysqli_num_rows($query_run1);
                                                    ?>
                                                    <!-- testing -->
                                                    <?php
                                                    $query2 = "SELECT * FROM testing_service WHERE status='noaction' ORDER BY added_at DESC";
                                                    $query_run2 = mysqli_query($con, $query2);
                                                    $row2 = mysqli_num_rows($query_run2);
                                                    ?>
                                                        <meta http-equiv="refresh" content="120">
                                                       <!-- <div class="table-responsive">
                                                            <form action="counselling.php" method="post">
                                                                <h3 style="padding-left: 32px;">Available Reservations Slot</h3>
                                                                <table>
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Counseling</th>
                                                                            <td>
                                                                                <?php if ($row5 != null) { ?>
                                                                                    <span>
                                                                                        <b>
                                                                                        <?php
                                                                                        echo  $row5;
                                                                                    } ?>
                                                                                        </b>
                                                                                    </span>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Referral</th>
                                                                            <td>
                                                                                <?php if ($row6 != null) { ?>
                                                                                    <span>
                                                                                        <b>
                                                                                        <?php
                                                                                        echo  $row6;
                                                                                    } ?>
                                                                                        </b>
                                                                                    </span>
                                                                            </td>
                                                                        </tr>
                                                                    </thead>
                                                                </table>
                                                        </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Table -->
            <!-- ============================================================== -->


            <?php include 'includes/footer.php' ?>
            <script src="../dist/js/chart.js"></script>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    // Bar Chart
                    var barChartData = {
                        labels: ["Counseling", "Referral", "Testing", "Exit Interview", "Users"],
                        datasets: [{
                            label: 'Count',
                            backgroundColor: 'rgb(79,129,189)',
                            borderColor: 'rgba(0, 158, 251, 1)',
                            borderWidth: 1,
                            data: [
                                "<?php echo $row0201; ?>", "<?php echo $row01; ?>", "<?php echo $row02; ?>",
                                "<?php echo $row03; ?>", "<?php echo $row05; ?>"
                            ]
                        }]
                    };

                    var ctx = document.getElementById('overall_graph').getContext('2d');
                    window.myBar = new Chart(ctx, {
                        type: 'bar',
                        data: barChartData,
                        options: {
                            responsive: true,
                            legend: {
                                display: false,
                            }
                        }
                    });

                });
            </script>
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
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


    </body>

</html>

<?php } else {
    echo header("Location: ../login.php");
} ?>