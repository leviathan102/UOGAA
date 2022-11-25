<!DOCTYPE html>
<html dir="ltr" lang="en">

<?php include 'includes/header.php';
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['UserLogin']) && $_SESSION['Access'] == "Administrator" || $_SESSION['Access'] == "Counselor") {
    echo "<div class='message success'>Welcome " . $_SESSION['Access'] . '</div>';
} else {
    echo header("Location: ../login.php");
}

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

?>

<head>
    <!-- <link rel="stylesheet" href="../css/style.css"> -->
    <script>
        function changeDropdown() {
            var state = document.getElementById("mySelect").value;
            if (state == "Counseling") {
                document.getElementById("name").style.visibility = 'hidden';
                document.getElementById("number").style.visibility = 'visible';
                document.getElementById("time").style.visibility = 'hidden';
                document.getElementById("date").style.visibility = 'hidden';
            } else if (state == "Referral") {
                document.getElementById("time").style.visibility = 'hidden';
                document.getElementById("name").style.visibility = 'visible';
                document.getElementById("number").style.visibility = 'hidden';
                document.getElementById("date").style.visibility = 'hidden';
            } else if (state == "Testing") {
                document.getElementById("name").style.visibility = 'hidden';
                document.getElementById("time").style.visibility = 'visible';
                document.getElementById("number").style.visibility = 'hidden';
                document.getElementById("date").style.visibility = 'hidden';
            } else if (state == "Exit Interview") {
                document.getElementById("name").style.visibility = 'hidden';
                document.getElementById("time").style.visibility = 'hidden';
                document.getElementById("number").style.visibility = 'hidden';
                document.getElementById("date").style.visibility = 'visible';
            } else {
                document.getElementById("time").style.visibility = 'visible';
                document.getElementById("name").style.visibility = 'visible';
                document.getElementById("number").style.visibility = 'visible';;
                document.getElementById("date").style.visibility = 'visible';

            }
        }
    </script>
    <style>
        body {
            background-image: linear-gradient(90deg, rgb(193, 193, 193), rgb(107, 107, 107)), linear-gradient(157.5deg, rgb(0, 165, 230) 0%, rgb(0, 165, 230) 39%, rgb(17, 149, 218) 39%, rgb(17, 149, 218) 56%, rgb(35, 132, 206) 56%, rgb(35, 132, 206) 60%, rgb(52, 116, 195) 60%, rgb(52, 116, 195) 68%, rgb(70, 99, 183) 68%, rgb(70, 99, 183) 86%, rgb(87, 83, 171) 86%, rgb(87, 83, 171) 100%), linear-gradient(135deg, rgb(0, 165, 230) 0%, rgb(0, 165, 230) 39%, rgb(17, 149, 218) 39%, rgb(17, 149, 218) 56%, rgb(35, 132, 206) 56%, rgb(35, 132, 206) 60%, rgb(52, 116, 195) 60%, rgb(52, 116, 195) 68%, rgb(70, 99, 183) 68%, rgb(70, 99, 183) 86%, rgb(87, 83, 171) 86%, rgb(87, 83, 171) 100%);
            background-blend-mode: overlay, overlay, normal;

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
                        <h4 class="page-title"><i class="mdi mdi-view-dashboard"></i> Search</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Result</a></li>

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
                <!-- ============================================================== -->
                <!-- Table -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <!-- title -->
                                <div class="d-md-flex">
                                    <div>
                                        <h4 class="card-title">Reservation List</h4>

                                    </div>

                                    <div class="ms-auto">
                                        <form class="btn btn-sm elevation-2" action="search_result_all.php" method="get">
                                            <input type="text" name="search1" id="search1">
                                            <button type="submit" class="btn btn-success btn-block">Search</button>
                                        </form>
                                        <div class="dl">
                                            <label for="">Filter by</label>
                                            <select class="form-select shadow-none" id="mySelect" onchange="changeDropdown(this.value);" aria-label="Floating label select example">
                                                <option value="0" selected>All</option>
                                                <option>Counseling</option>
                                                <option>Referral</option>
                                                <option>Testing</option>
                                                <option>Exit Interview</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- title -->
                            </div>
                            <div class="table-responsive">

                                <table id="example" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Full Name</th>
                                            <th scope="col">Reason</th>
                                            <th scope="col">Concern</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Time</th>
                                            <th scope="col">Preferred Mode</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <?php do { ?>
                                        <tbody id="number">
                                            <tr>

                                                <td><?php echo $row['name']; ?></td>
                                                <td>Counseling</td>
                                                <td></td>

                                                <td><?php echo $row['date_prefer']; ?></td>
                                                <td></td>
                                                <td><?php echo $row['preferred_mode']; ?></td>

                                                <td><?php echo $row['status']; ?></td>
                                            </tr>
                                        <?php } while ($row = $appointment->fetch_assoc()) ?>
                                        </tbody>
                                        <?php do { ?>
                                            <tbody>
                                                <tr id="name">

                                                    <td><?php echo $row2['name']; ?></td>

                                                    <td>Referral</td>
                                                    <td><?php echo $row2['reason_for_referral']; ?></td>
                                                    <td><?php echo $row2['date']; ?></td>
                                                    <td><?php echo $row2['preferred_time']; ?></td>
                                                    <td><?php echo $row2['preferred_mode']; ?></td>
                                                    <td><?php echo $row2['status']; ?></td>
                                                </tr>
                                            <?php } while ($row2 = $referral->fetch_assoc()) ?>

                                            </tbody>
                                            <?php do { ?>
                                                <tbody>
                                                    <tr id="time">

                                                        <td><?php echo $row3['name']; ?></td>
                                                        <td>Testing</td>
                                                        <td><?php echo $row3['purpose']; ?></td>


                                                        <td><?php echo $row3['date']; ?></td>


                                                        <td></td>
                                                        <td></td>
                                                        <td><?php echo $row3['status']; ?></td>
                                                    </tr>
                                                <?php } while ($row3 = $testing->fetch_assoc()) ?>

                                                </tbody>

                                                <?php do { ?>
                                                    <tbody>
                                                        <tr id="date">
                                                            <td><?php echo $row4['name']; ?></td>
                                                            <td>Exit Interview</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td style="color: green;">Done</td>
                                                        </tr>
                                                    <?php } while ($row4 = $interview->fetch_assoc()) ?>

                                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Table -->
                <!-- ============================================================== -->
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

    <?php include 'includes/footer.php' ?>
</body>

</html>