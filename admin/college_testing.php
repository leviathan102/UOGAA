<!DOCTYPE html>
<html dir="ltr" lang="en">

<?php include 'includes/header.php';
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['UserLogin']) && $_SESSION['Access'] == "Administrator" || $_SESSION['Access'] == "Counselor") {

    include_once("connections/connection.php");
    $con = connection();

    // test for email notification
    //for phpmailer
    require("PHPMailer/src/PHPMailer.php");
    require("PHPMailer/src/SMTP.php");

    if (!isset($_GET['page'])) {

        $page_number = 1;
    } else {

        $page_number = $_GET['page'];
    }

    $collegefilter = $_SESSION['College'];

    $limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 10;
    $page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
    $start = ($page - 1) * $limit;

    $sql3 = "SELECT * FROM testing_service WHERE status!='noaction' AND college_of='$collegefilter' 
    ORDER BY id DESC LIMIT $start, $limit";
    $testing = $con->query($sql3) or die($con->error);
    $row3 = $testing->fetch_assoc();

    $sql01 = "SELECT count(id) AS id FROM testing_service WHERE status!='noaction' AND college_of='$collegefilter'";
    $appointment1 = $con->query($sql01) or die($con->error);
    $counselingCount = $appointment1->fetch_all(MYSQLI_ASSOC);
    $total = $counselingCount[0]['id'];
    $pages = ceil($total / $limit);

    $previous = $page - 1;
    $next = $page + 1;
?>

    <head>
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

            /* 
            select {
                appearance: none;
                background-color: transparent;
                border: none;
                padding: 0 1em 0 0;
                margin: 0;
                width: 100%;
                font-family: inherit;
                font-size: inherit;
                cursor: inherit;
                line-height: inherit;
                z-index: 1;
                outline: none;
            } */

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
                            <h4 class="page-title"><i class="fa fa-address-book"></i>
                                Testing
                                (<?php if ($collegefilter != null) {
                                        echo $collegefilter;
                                    } ?>)
                            </h4>
                            <div class="d-flex align-items-center">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#"> Home</a></li>
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
                            <div class="card">
                                <div class="table-responsive" style="padding-bottom: 8px; ">
                                    <!-- testing-table -->
                                    <div class="container" style="padding-bottom: 8px; background-color:aquamarine">
                                        <form action="testing_limit.php" method="post" id="form" name="form">
                                            <ul class="pagination pagination">
                                                <a href="college_testing.php?page=<?php echo $previous; ?>" style="padding:8px;">
                                                    &laquo; Previous
                                                </a>
                                                <?php for ($i = 1; $i <= $pages; $i++) { ?>
                                                    <li style="padding:8px; ">
                                                        <a href="college_testing.php?page=<?php echo $i; ?>">
                                                            <?php echo $i; ?>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                                <a href="college_testing.php?page=<?php echo $next; ?>" style="padding:8px;">
                                                    Next &raquo;
                                                </a>
                                            </ul>
                                        </form>
                                    </div>
                                    <form action="testing_search_result.php" method="get" style="padding:8px;">
                                        <input type="text" required placeholder="Input Name" name="tessearch">
                                        <button type="submit" class="btn btn-primary btn-block" name="testingsearch">Search</button>
                                    </form>
                                    <table style="padding: 8px; ">
                                        <thead style=" white-space: nowrap; background-color:#3567f1 ">
                                            <tr>
                                                <th>
                                                </th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Purpose</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <?php do { ?>
                                            <?php if ($row3 != null) { ?>
                                                <tbody>
                                                    <tr>
                                                        <td style=" white-space: nowrap; ">
                                                            <a href="details_testing.php?ID=<?php echo $row3['id']; ?>">
                                                                Details
                                                            </a>
                                                        </td>
                                                        <td style=" white-space: nowrap; ">
                                                            <?php
                                                            echo $row3['name'];
                                                            ?>
                                                        </td>
                                                        <td style="color: blue;">
                                                            <i>
                                                                <?php
                                                                echo $row3['email'];
                                                                ?>
                                                            </i>
                                                        </td>
                                                        <td>
                                                            <i>
                                                                <?php
                                                                echo $row3['purpose'];
                                                                ?>
                                                            </i>
                                                        </td>
                                                        <td>
                                                            <i>
                                                                <?php if ($row3['status'] == "Done") { ?>
                                                                    <b style="color: green">
                                                                        <?php
                                                                        echo $row3['status'];
                                                                        ?>
                                                                    </b>
                                                                <?php }
                                                                if ($row3['status'] == "Approved") { ?>
                                                                    <b style="color: orange">
                                                                        <?php
                                                                        echo $row3['status'];
                                                                        ?>
                                                                    </b>
                                                                <?php }
                                                                if ($row3['status'] == "Reject") { ?>
                                                                    <b style="color: red">
                                                                        <?php
                                                                        echo $row['status'];
                                                                        ?>
                                                                    </b>
                                                                <?php }
                                                                if ($row3['status'] == "noaction") { ?>
                                                                    <b style="color:rgb(0, 165, 230)">
                                                                        <?php
                                                                        echo $row3['status'];
                                                                        ?>
                                                                    </b>
                                                                <?php }
                                                                if ($row3['status'] == "deanrequest") { ?>
                                                                    <b style="color:green">
                                                                        <?php
                                                                        echo $row3['status'];
                                                                        ?>
                                                                    </b>
                                                                <?php } ?>  
                                                            </i>
                                                        </td>
                                                    </tr>
                                                <?php } else {
                                                echo '<h4 style="color: red;" >' . '<b>' . 'Testing' . '<b>' . ' (No Request!)' . '</h4>';
                                            }
                                                ?>
                                            <?php } while ($row3 = $testing->fetch_assoc()) ?>

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
                                    <div class="container" style="padding-bottom: 8px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="table-responsive" style="padding-bottom: 8px; ">
                                    <!-- testing-table -->
                                    <div class="container" style="padding-bottom: 8">
                                        <?php
                                        if (isset($_POST['approvetestingrequest'])) {
                                            $date = $_POST['reqdate'];
                                            $time = $_POST['reqtime'];
                                            $status = $_POST['reqstat'];
                                            $college2 = $_POST['reqcollege'];
                                            $sql10 = "UPDATE `testing_service` SET `date_prefer`='$date',
                                                `time_prefer`='$time',`status`='$status' WHERE college_of= '$college2' AND status='deanrequest'";
                                            $con->query($sql10) or die($con->error);

                                            $mailTo = $row13['email'];
                                            $subject = "BuksuGuidance";
                                            $body = " A Blessed Day, ! <br><br> 
                                                    Your Request has been Approved! <br>
                                                    Here is the date and time you have provided:<br>
                                                    Date: $date <br>
                                                    Time: $time <br><br>
                                                    Please Be on Time <br> 
                                                    Thank You and God Bless!<br><br>
                                                    University Guidance Office";

                                            $mail = new PHPMailer\PHPMailer\PHPMailer();
                                            $mail->isSMTP();
                                            $mail->Host = "smtp.gmail.com";
                                            $mail->SMTPAuth = true;
                                            $mail->Username = "1801101459@student.buksu.edu.ph";
                                            $mail->Password = "nluawtnhhfdmgzvt";
                                            $mail->SMTPSecure = "tls";
                                            $mail->Port = "587";
                                            $mail->From = "1801101459@student.buksu.edu.ph";
                                            $mail->FromName = "BUKSUGuidanceOffice";
                                            $mail->addAddress($mailTo, "");
                                            $mail->isHTML(true);
                                            $mail->Subject = "Testing Request Approved!";
                                            $mail->Body = $body;
                                            $mail->AltBody = "text version";

                                            if (!$mail->send()) {
                                                echo "Mailer Error: " . $mail->ErrorInfo;
                                            }
                                        ?>
                                            <meta http-equiv="refresh" content="2">
                                            <h4 style="color: green;"> Approved Successfully!</h4>
                                        <?php } ?>
                                    </div>
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
<?php } else {
    echo header("Location: ../login.php");
} ?>

</html>