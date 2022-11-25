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

    $limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 10;
    $page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
    $start = ($page - 1) * $limit;

    $sql3 = "SELECT * FROM testing_service  
    ORDER BY id DESC LIMIT $start, $limit";
    $testing = $con->query($sql3) or die($con->error);
    $row3 = $testing->fetch_assoc();

    $sql01 = "SELECT count(id) AS id FROM testing_service";
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
                                    <!-- <div class="container" style="padding-bottom: 8px; background-color:aquamarine">
                                        <form action="testing_limit.php" method="post" id="form" name="form">
                                            <ul class="pagination pagination">
                                                <a href="testing.php?page=<?php echo $previous; ?>" style="padding:8px;">
                                                    &laquo; Previous
                                                </a>
                                                <?php for ($i = 1; $i <= $pages; $i++) { ?>
                                                    <li style="padding:8px; ">
                                                        <a href="testing.php?page=<?php echo $i; ?>">
                                                            <?php echo $i; ?>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                                <a href="testing.php?page=<?php echo $next; ?>" style="padding:8px;">
                                                    Next &raquo;
                                                </a>
                                            </ul>
                                            <label style="font-weight: bolder; margin: 25px;">
                                                Limit the Number of Row to Display
                                            </label><br>
                                            <select name="limit-records" id="limit-records" required style="margin-left: 25px;">
                                                <option disable selected>
                                                    ----Select----
                                                </option>
                                                <?php foreach ([10, 20, 30, 40, 50, 100, 200, 500, 1000, 5000] as $limit) : ?>
                                                    <option <?php
                                                            if (
                                                                isset($_POST["limit-records"]) &&
                                                                $_POST["limit-records"] ==
                                                                $limit
                                                            ) echo "selected" ?> value="<?php echo $limit; ?>">
                                                        <?php echo $limit; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </form>
                                    </div> -->
                                    <!-- <table style="padding: 8px; ">
                                        <thead style=" white-space: nowrap; background-color:#3567f1 ">
                                            <tr>
                                                <th>Total:</th>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
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
                                                        <td style="color: red; white-space: nowrap;">
                                                            <?php
                                                            echo $row3['id'];
                                                            ?>
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
                                                    </tr>
                                                <?php } else {
                                                echo '<h4 style="color: red;" >' . '<b>' . 'Testing' . '<b>' . ' (No Data!)' . '</h4>';
                                            }
                                                ?>
                                            <?php } while ($row3 = $testing->fetch_assoc()) ?>

                                                </tbody>
                                    </table> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- college of administration table -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="table-responsive" style="padding-bottom: 8px; ">
                                    <!-- testing-table -->
                                    <div class="container" style="padding-bottom: 8px; background-color:teal">
                                        <?php
                                        $sql5 = "SELECT * FROM testing_service WHERE college_of='College of Administration'  
                                    ORDER BY id DESC";
                                        $testing5 = $con->query($sql5) or die($con->error);
                                        $row5 = $testing5->fetch_assoc();
                                        ?>

                                        <table style="padding: 8px; ">
                                            <thead style=" white-space: nowrap; background-color:#3567f1 ">
                                                <tr>
                                                    <h3 style="color:white;padding:8px;">College of Administration</h3>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        Total:
                                                        <?php
                                                        //count the # of rows
                                                        $query05 = "SELECT * FROM testing_service WHERE college_of='College of Administration' 
                                                            ORDER BY added_at DESC";
                                                        $query_run05 = mysqli_query($con, $query05);
                                                        $row05 = mysqli_num_rows($query_run05);
                                                        echo $row05;
                                                        ?>
                                                    </th>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                </tr>
                                            </thead>
                                            <?php do { ?>
                                                <?php if ($row5 != null) { ?>
                                                    <tbody>
                                                        <tr>
                                                            <td style=" white-space: nowrap; ">
                                                                <a href="details_testing_all.php?ID=<?php echo $row5['id']; ?>">
                                                                    Details
                                                                </a>
                                                            </td>
                                                            <td style="color: red; white-space: nowrap;">
                                                                <?php
                                                                echo $row5['id'];
                                                                ?>
                                                            </td>
                                                            <td style=" white-space: nowrap; ">
                                                                <?php
                                                                echo $row5['name'];
                                                                ?>
                                                            </td>
                                                            <td style="color: blue;">
                                                                <i>
                                                                    <?php
                                                                    echo $row5['email'];
                                                                    ?>
                                                                </i>
                                                            </td>
                                                        </tr>
                                                    <?php } else {
                                                    echo '<h4 style="color: red; background-color:white" >' . '<b>' . 'College of Administration' . '<b>' . ' (No Data!)' . '</h4>';
                                                }
                                                    ?>
                                                <?php } while ($row5 = $testing5->fetch_assoc()) ?>

                                                    </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- college of arts and sciences table -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="table-responsive" style="padding-bottom: 8px; ">
                                    <!-- testing-table -->
                                    <div class="container" style="padding-bottom: 8px; background-color:teal">
                                        <?php
                                        $sql6 = "SELECT * FROM testing_service WHERE college_of='College of Arts and Sciences'  
                                    ORDER BY id DESC";
                                        $testing6 = $con->query($sql6) or die($con->error);
                                        $row6 = $testing6->fetch_assoc();
                                        ?>

                                        <table style="padding: 8px; ">
                                            <thead style=" white-space: nowrap; background-color:#3567f1 ">
                                                <tr>
                                                    <h3 style="color:white;padding:8px;">College of Arts and Sciences</h3>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        Total:
                                                        <?php
                                                        //count the # of rows
                                                        $query06 = "SELECT * FROM testing_service WHERE college_of='College of Arts and Sciences' 
                                                            ORDER BY added_at DESC";
                                                        $query_run06 = mysqli_query($con, $query06);
                                                        $row06 = mysqli_num_rows($query_run06);
                                                        echo $row06;
                                                        ?>
                                                    </th>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                </tr>
                                            </thead>
                                            <?php do { ?>
                                                <?php if ($row6 != null) { ?>
                                                    <tbody>
                                                        <tr>
                                                            <td style=" white-space: nowrap; ">
                                                                <a href="details_testing_all.php?ID=<?php echo $row6['id']; ?>">
                                                                    Details
                                                                </a>
                                                            </td>
                                                            <td style="color: red; white-space: nowrap;">
                                                                <?php
                                                                echo $row6['id'];
                                                                ?>
                                                            </td>
                                                            <td style=" white-space: nowrap; ">
                                                                <?php
                                                                echo $row6['name'];
                                                                ?>
                                                            </td>
                                                            <td style="color: blue;">
                                                                <i>
                                                                    <?php
                                                                    echo $row6['email'];
                                                                    ?>
                                                                </i>
                                                            </td>
                                                        </tr>
                                                    <?php } else {
                                                    echo '<h4 style="color: red; background-color:white" >' . '<b>' . 'College of Arts and Sciences' . '<b>' . ' (No Data!)' . '</h4>';
                                                }
                                                    ?>
                                                <?php } while ($row6 = $testing6->fetch_assoc()) ?>

                                                    </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- college of business table -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="table-responsive" style="padding-bottom: 8px; ">
                                    <!-- testing-table -->
                                    <div class="container" style="padding-bottom: 8px; background-color:teal">
                                        <?php
                                        $sql7 = "SELECT * FROM testing_service WHERE college_of='College of Business'  
                                    ORDER BY id DESC";
                                        $testing7 = $con->query($sql7) or die($con->error);
                                        $row7 = $testing7->fetch_assoc();
                                        ?>

                                        <table style="padding: 8px; ">
                                            <thead style=" white-space: nowrap; background-color:#3567f1 ">
                                                <tr>
                                                    <h3 style="color:white;padding:8px;">College of Business</h3>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        Total:
                                                        <?php
                                                        //count the # of rows
                                                        $query07 = "SELECT * FROM testing_service 
                                                        WHERE college_of='College of Business' 
                                                            ORDER BY added_at DESC";
                                                        $query_run07 = mysqli_query($con, $query07);
                                                        $row07 = mysqli_num_rows($query_run07);
                                                        echo $row07;
                                                        ?>
                                                    </th>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                </tr>
                                            </thead>
                                            <?php do { ?>
                                                <?php if ($row7 != null) { ?>
                                                    <tbody>
                                                        <tr>
                                                            <td style=" white-space: nowrap; ">
                                                                <a href="details_testing_all.php?ID=<?php echo $row7['id']; ?>">
                                                                    Details
                                                                </a>
                                                            </td>
                                                            <td style="color: red; white-space: nowrap;">
                                                                <?php
                                                                echo $row7['id'];
                                                                ?>
                                                            </td>
                                                            <td style=" white-space: nowrap; ">
                                                                <?php
                                                                echo $row7['name'];
                                                                ?>
                                                            </td>
                                                            <td style="color: blue;">
                                                                <i>
                                                                    <?php
                                                                    echo $row7['email'];
                                                                    ?>
                                                                </i>
                                                            </td>
                                                        </tr>
                                                    <?php } else {
                                                    echo '<h4 style="color: red; background-color:white" >' . '<b>' . 'College of Business' . '<b>' . ' (No Data!)' . '</h4>';
                                                }
                                                    ?>
                                                <?php } while ($row7 = $testing7->fetch_assoc()) ?>

                                                    </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- college of education table -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="table-responsive" style="padding-bottom: 8px; ">
                                    <!-- testing-table -->
                                    <div class="container" style="padding-bottom: 8px; background-color:teal">
                                        <?php
                                        $sql8 = "SELECT * FROM testing_service WHERE college_of='College of Education'  
                                    ORDER BY id DESC";
                                        $testing8 = $con->query($sql8) or die($con->error);
                                        $row8 = $testing8->fetch_assoc();
                                        ?>

                                        <table style="padding: 8px; ">
                                            <thead style=" white-space: nowrap; background-color:#3567f1 ">
                                                <tr>
                                                    <h3 style="color:white;padding:8px;">College of Education</h3>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        Total:
                                                        <?php
                                                        //count the # of rows
                                                        $query08 = "SELECT * FROM testing_service 
                                                        WHERE college_of='College of Education' 
                                                            ORDER BY added_at DESC";
                                                        $query_run08 = mysqli_query($con, $query08);
                                                        $row08 = mysqli_num_rows($query_run08);
                                                        echo $row08;
                                                        ?>
                                                    </th>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                </tr>
                                            </thead>
                                            <?php do { ?>
                                                <?php if ($row8 != null) { ?>
                                                    <tbody>
                                                        <tr>
                                                            <td style=" white-space: nowrap; ">
                                                                <a href="details_testing_all.php?ID=<?php echo $row8['id']; ?>">
                                                                    Details
                                                                </a>
                                                            </td>
                                                            <td style="color: red; white-space: nowrap;">
                                                                <?php
                                                                echo $row8['id'];
                                                                ?>
                                                            </td>
                                                            <td style=" white-space: nowrap; ">
                                                                <?php
                                                                echo $row8['name'];
                                                                ?>
                                                            </td>
                                                            <td style="color: blue;">
                                                                <i>
                                                                    <?php
                                                                    echo $row8['email'];
                                                                    ?>
                                                                </i>
                                                            </td>
                                                        </tr>
                                                    <?php } else {
                                                    echo '<h4 style="color: red; background-color:white" >' . '<b>' . 'College of Education' . '<b>' . ' (No Data!)' . '</h4>';
                                                }
                                                    ?>
                                                <?php } while ($row8 = $testing8->fetch_assoc()) ?>

                                                    </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- college of law table -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="table-responsive" style="padding-bottom: 8px; ">
                                    <!-- testing-table -->
                                    <div class="container" style="padding-bottom: 8px; background-color:teal">
                                        <?php
                                        $sql9 = "SELECT * FROM testing_service WHERE college_of='College of Law'  
                                    ORDER BY id DESC";
                                        $testing9 = $con->query($sql9) or die($con->error);
                                        $row9 = $testing9->fetch_assoc();
                                        ?>

                                        <table style="padding: 8px; ">
                                            <thead style=" white-space: nowrap; background-color:#3567f1 ">
                                                <tr>
                                                    <h3 style="color:white;padding:8px;">College of Law</h3>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        Total:
                                                        <?php
                                                        //count the # of rows
                                                        $query09 = "SELECT * FROM testing_service 
                                                        WHERE college_of='College of Law' 
                                                            ORDER BY added_at DESC";
                                                        $query_run09 = mysqli_query($con, $query09);
                                                        $row09 = mysqli_num_rows($query_run09);
                                                        echo $row09;
                                                        ?>
                                                    </th>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                </tr>
                                            </thead>
                                            <?php do { ?>
                                                <?php if ($row9 != null) { ?>
                                                    <tbody>
                                                        <tr>
                                                            <td style=" white-space: nowrap; ">
                                                                <a href="details_testing_all.php?ID=<?php echo $row9['id']; ?>">
                                                                    Details
                                                                </a>
                                                            </td>
                                                            <td style="color: red; white-space: nowrap;">
                                                                <?php
                                                                echo $row9['id'];
                                                                ?>
                                                            </td>
                                                            <td style=" white-space: nowrap; ">
                                                                <?php
                                                                echo $row9['name'];
                                                                ?>
                                                            </td>
                                                            <td style="color: blue;">
                                                                <i>
                                                                    <?php
                                                                    echo $row9['email'];
                                                                    ?>
                                                                </i>
                                                            </td>
                                                        </tr>
                                                    <?php } else {
                                                    echo '<h4 style="color: red; background-color:white" >' . '<b>' . 'College of Law' . '<b>' . ' (No Data!)' . '</h4>';
                                                }
                                                    ?>
                                                <?php } while ($row9 = $testing9->fetch_assoc()) ?>

                                                    </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- college of nstp table -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="table-responsive" style="padding-bottom: 8px; ">
                                    <!-- testing-table -->
                                    <div class="container" style="padding-bottom: 8px; background-color:teal">
                                        <?php
                                        $sql10 = "SELECT * FROM testing_service WHERE college_of='College of NSTP'  
                                    ORDER BY id DESC";
                                        $testing10 = $con->query($sql10) or die($con->error);
                                        $row10 = $testing10->fetch_assoc();
                                        ?>

                                        <table style="padding: 8px; ">
                                            <thead style=" white-space: nowrap; background-color:#3567f1 ">
                                                <tr>
                                                    <h3 style="color:white;padding:8px;">College of NSTP</h3>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        Total:
                                                        <?php
                                                        //count the # of rows
                                                        $query010 = "SELECT * FROM testing_service 
                                                        WHERE college_of='College of NSTP' 
                                                            ORDER BY added_at DESC";
                                                        $query_run010 = mysqli_query($con, $query010);
                                                        $row010 = mysqli_num_rows($query_run010);
                                                        echo $row010;
                                                        ?>
                                                    </th>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                </tr>
                                            </thead>
                                            <?php do { ?>
                                                <?php if ($row10 != null) { ?>
                                                    <tbody>
                                                        <tr>
                                                            <td style=" white-space: nowrap; ">
                                                                <a href="details_testing_all.php?ID=<?php echo $row10['id']; ?>">
                                                                    Details
                                                                </a>
                                                            </td>
                                                            <td style="color: red; white-space: nowrap;">
                                                                <?php
                                                                echo $row10['id'];
                                                                ?>
                                                            </td>
                                                            <td style=" white-space: nowrap; ">
                                                                <?php
                                                                echo $row10['name'];
                                                                ?>
                                                            </td>
                                                            <td style="color: blue;">
                                                                <i>
                                                                    <?php
                                                                    echo $row10['email'];
                                                                    ?>
                                                                </i>
                                                            </td>
                                                        </tr>
                                                    <?php } else {
                                                    echo '<h4 style="color: red; background-color:white" >' . '<b>' . 'College of NSTP' . '<b>' . ' (No Data!)' . '</h4>';
                                                }
                                                    ?>
                                                <?php } while ($row10 = $testing10->fetch_assoc()) ?>

                                                    </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- college of nursing table -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="table-responsive" style="padding-bottom: 8px; ">
                                    <!-- testing-table -->
                                    <div class="container" style="padding-bottom: 8px; background-color:teal">
                                        <?php
                                        $sql11 = "SELECT * FROM testing_service WHERE college_of='College of Nursing'  
                                    ORDER BY id DESC";
                                        $testing11 = $con->query($sql11) or die($con->error);
                                        $row11 = $testing11->fetch_assoc();
                                        ?>

                                        <table style="padding: 8px; ">
                                            <thead style=" white-space: nowrap; background-color:#3567f1 ">
                                                <tr>
                                                    <h3 style="color:white;padding:8px;">College of Nursing</h3>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        Total:
                                                        <?php
                                                        //count the # of rows
                                                        $query011 = "SELECT * FROM testing_service 
                                                        WHERE college_of='College of Nursing' 
                                                            ORDER BY added_at DESC";
                                                        $query_run011 = mysqli_query($con, $query011);
                                                        $row011 = mysqli_num_rows($query_run011);
                                                        echo $row011;
                                                        ?>
                                                    </th>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                </tr>
                                            </thead>
                                            <?php do { ?>
                                                <?php if ($row11 != null) { ?>
                                                    <tbody>
                                                        <tr>
                                                            <td style=" white-space: nowrap; ">
                                                                <a href="details_testing_all.php?ID=<?php echo $row11['id']; ?>">
                                                                    Details
                                                                </a>
                                                            </td>
                                                            <td style="color: red; white-space: nowrap;">
                                                                <?php
                                                                echo $row11['id'];
                                                                ?>
                                                            </td>
                                                            <td style=" white-space: nowrap; ">
                                                                <?php
                                                                echo $row11['name'];
                                                                ?>
                                                            </td>
                                                            <td style="color: blue;">
                                                                <i>
                                                                    <?php
                                                                    echo $row11['email'];
                                                                    ?>
                                                                </i>
                                                            </td>
                                                        </tr>
                                                    <?php } else {
                                                    echo '<h4 style="color: red; background-color:white" >' . '<b>' . 'College of Nursing' . '<b>' . ' (No Data!)' . '</h4>';
                                                }
                                                    ?>
                                                <?php } while ($row11 = $testing11->fetch_assoc()) ?>

                                                    </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- college of technology table -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="table-responsive" style="padding-bottom: 8px; ">
                                    <!-- testing-table -->
                                    <div class="container" style="padding-bottom: 8px; background-color:teal">
                                        <?php
                                        $sql4 = "SELECT * FROM testing_service WHERE college_of='College of Technology'  
                                    ORDER BY id DESC";
                                        $testing4 = $con->query($sql4) or die($con->error);
                                        $row4 = $testing4->fetch_assoc();
                                        ?>

                                        <table style="padding: 8px; ">
                                            <thead style=" white-space: nowrap; background-color:#3567f1 ">
                                                <tr>
                                                    <h3 style="color:white;padding:8px;">College of Technology</h3>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        Total:
                                                        <?php
                                                        //count the # of rows
                                                        $query04 = "SELECT * FROM testing_service WHERE college_of='College of Technology' 
                                                            ORDER BY added_at DESC";
                                                        $query_run04 = mysqli_query($con, $query04);
                                                        $row04 = mysqli_num_rows($query_run04);
                                                        echo $row04;
                                                        ?>
                                                    </th>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                </tr>
                                            </thead>
                                            <?php do { ?>
                                                <?php if ($row4 != null) { ?>
                                                    <tbody>
                                                        <tr>
                                                            <td style=" white-space: nowrap; ">
                                                                <a href="details_testing_all.php?ID=<?php echo $row4['id']; ?>">
                                                                    Details
                                                                </a>
                                                            </td>
                                                            <td style="color: red; white-space: nowrap;">
                                                                <?php
                                                                echo $row4['id'];
                                                                ?>
                                                            </td>
                                                            <td style=" white-space: nowrap; ">
                                                                <?php
                                                                echo $row4['name'];
                                                                ?>
                                                            </td>
                                                            <td style="color: blue;">
                                                                <i>
                                                                    <?php
                                                                    echo $row4['email'];
                                                                    ?>
                                                                </i>
                                                            </td>
                                                        </tr>
                                                    <?php } else {
                                                    echo '<h4 style="color: red; background-color:white" >' . '<b>' . 'College of Technology' . '<b>' . ' (No Data!)' . '</h4>';
                                                }
                                                    ?>
                                                <?php } while ($row4 = $testing4->fetch_assoc()) ?>

                                                    </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- doctoral programs table -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="table-responsive" style="padding-bottom: 8px; ">
                                    <!-- testing-table -->
                                    <div class="container" style="padding-bottom: 8px; background-color:teal">
                                        <?php
                                        $sql12 = "SELECT * FROM testing_service WHERE college_of='Doctoral Programs'  
                                    ORDER BY id DESC";
                                        $testing12 = $con->query($sql12) or die($con->error);
                                        $row12 = $testing12->fetch_assoc();
                                        ?>

                                        <table style="padding: 8px; ">
                                            <thead style=" white-space: nowrap; background-color:#3567f1 ">
                                                <tr>
                                                    <h3 style="color:white;padding:8px;">Doctoral Programs</h3>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        Total:
                                                        <?php
                                                        //count the # of rows
                                                        $query012 = "SELECT * FROM testing_service 
                                                        WHERE college_of='Doctoral Programs' 
                                                            ORDER BY added_at DESC";
                                                        $query_run012 = mysqli_query($con, $query012);
                                                        $row012 = mysqli_num_rows($query_run012);
                                                        echo $row012;
                                                        ?>
                                                    </th>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                </tr>
                                            </thead>
                                            <?php do { ?>
                                                <?php if ($row12 != null) { ?>
                                                    <tbody>
                                                        <tr>
                                                            <td style=" white-space: nowrap; ">
                                                                <a href="details_testing_all.php?ID=<?php echo $row12['id']; ?>">
                                                                    Details
                                                                </a>
                                                            </td>
                                                            <td style="color: red; white-space: nowrap;">
                                                                <?php
                                                                echo $row12['id'];
                                                                ?>
                                                            </td>
                                                            <td style=" white-space: nowrap; ">
                                                                <?php
                                                                echo $row12['name'];
                                                                ?>
                                                            </td>
                                                            <td style="color: blue;">
                                                                <i>
                                                                    <?php
                                                                    echo $row12['email'];
                                                                    ?>
                                                                </i>
                                                            </td>
                                                        </tr>
                                                    <?php } else {
                                                    echo '<h4 style="color: red; background-color:white" >' . '<b>' . 'Doctoral Programs' . '<b>' . ' (No Data!)' . '</h4>';
                                                }
                                                    ?>
                                                <?php } while ($row12 = $testing12->fetch_assoc()) ?>

                                                    </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- masters degree programs table -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="table-responsive" style="padding-bottom: 8px; ">
                                    <!-- testing-table -->
                                    <div class="container" style="padding-bottom: 8px; background-color:teal">
                                        <?php
                                        $sql13 = "SELECT * FROM testing_service WHERE college_of='Masters Degree Programs'  
                                    ORDER BY id DESC";
                                        $testing13 = $con->query($sql13) or die($con->error);
                                        $row13 = $testing13->fetch_assoc();
                                        ?>

                                        <table style="padding: 8px; ">
                                            <thead style=" white-space: nowrap; background-color:#3567f1 ">
                                                <tr>
                                                    <h3 style="color:white;padding:8px;">Masters Degree Programs</h3>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        Total:
                                                        <?php
                                                        //count the # of rows
                                                        $query013 = "SELECT * FROM testing_service 
                                                        WHERE college_of='Masters Degree Programs' 
                                                            ORDER BY added_at DESC";
                                                        $query_run013 = mysqli_query($con, $query013);
                                                        $row013 = mysqli_num_rows($query_run013);
                                                        echo $row013;
                                                        ?>
                                                    </th>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                </tr>
                                            </thead>
                                            <?php do { ?>
                                                <?php if ($row13 != null) { ?>
                                                    <tbody>
                                                        <tr>
                                                            <td style=" white-space: nowrap; ">
                                                                <a href="details_testing_all.php?ID=<?php echo $row13['id']; ?>">
                                                                    Details
                                                                </a>
                                                            </td>
                                                            <td style="color: red; white-space: nowrap;">
                                                                <?php
                                                                echo $row13['id'];
                                                                ?>
                                                            </td>
                                                            <td style=" white-space: nowrap; ">
                                                                <?php
                                                                echo $row13['name'];
                                                                ?>
                                                            </td>
                                                            <td style="color: blue;">
                                                                <i>
                                                                    <?php
                                                                    echo $row13['email'];
                                                                    ?>
                                                                </i>
                                                            </td>
                                                        </tr>
                                                    <?php } else {
                                                    echo '<h4 style="color: red; background-color:white" >' . '<b>' . 'Masters Degree Programs' . '<b>' . ' (No Data!)' . '</h4>';
                                                }
                                                    ?>
                                                <?php } while ($row13 = $testing13->fetch_assoc()) ?>

                                                    </tbody>
                                        </table>
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