<!DOCTYPE html>
<html dir="ltr" lang="en">

<?php include 'includes/header.php';
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['UserLogin']) && $_SESSION['Access'] == "Administrator" || $_SESSION['Access'] == "Counselor") {

    include_once("connections/connection.php");
    $con = connection();

    if (!isset($_GET['page'])) {

        $page_number = 1;
    } else {

        $page_number = $_GET['page'];
    }

    $limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 10;
    $page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
    $start = ($page - 1) * $limit;

    $sql2 = "SELECT * FROM referral_counseling ORDER BY id DESC LIMIT $start, $limit";
    $referral = $con->query($sql2) or die($con->error);
    $row2 = $referral->fetch_assoc();

    $sql01 = "SELECT count(id) AS id FROM referral_counseling";
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
                            <h4 class="page-title"><i class="mdi mdi-account-multiple-plus"></i>Referral</h4>
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
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="table-responsive" style="padding-bottom: 8px; ">

                                    <!-- referral record -->
                                    <!-- <h2>
                                        Referral (
                                        <?php
                                        $query1 = "SELECT * FROM referral_counseling ORDER BY added_at DESC";
                                        $query_run1 = mysqli_query($con, $query1);
                                        $row1 = mysqli_num_rows($query_run1);
                                        echo $row1;
                                        ?>
                                        )
                                    </h2> -->
                                    <!-- referral table -->
                                    <div class="container" style="padding-bottom: 8px; text-align:center; background-color:aquamarine">
                                        <form action="referral_limit.php" method="post" id="form" name="form">
                                            <!-- <ul class="pagination pagination">
                                                <a href="referral.php?page=<?php echo $previous; ?>" style="padding:8px;">
                                                    &laquo; Previous
                                                </a>
                                                <?php for ($i = 1; $i <= $pages; $i++) { ?>
                                                    <li style="padding:8px; ">
                                                        <a href="referral.php?page=<?php echo $i; ?>">
                                                            <?php echo $i; ?>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                                <a href="referral.php?page=<?php echo $next; ?>" style="padding:8px;">
                                                    Next &raquo;
                                                </a>
                                            </ul> -->
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
                                            <a href="referral.php">
                                                <b style="background-color: white; padding: 4px; border-radius: 8px;">Back</b>
                                            </a>
                                            <!-- <button role="button" type="submit" name="limit-button" style="border: none ;">
                                                <b>Submit</b>
                                            </button> -->
                                        </form>
                                    </div>
                                    <table style="padding: 8px; ">
                                        <thead style=" white-space: nowrap; background-color:#3567f1 ">
                                            <tr>
                                                <th></th>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <!-- <th>Age</th>
                                            <th>Gender</th>
                                            <th>College</th>
                                            <th>Year Level</th>
                                            <th>Course</th>
                                            <th>Prefered Mode</th>
                                            <th>Date Selected</th>
                                            <th>Phone Number</th>
                                            <th>Facebook Name</th>
                                            <th>Prefered Time</th>
                                            <th>Referrer</th>
                                            <th>Reason for Referral</th> -->
                                                <th>Status</th>
                                                <th>Outcome</th>
                                            </tr>
                                        </thead>
                                        <?php do { ?>
                                            <?php if ($row2 != null) { ?>
                                                <tbody style=" white-space: nowrap; ">
                                                    <tr>
                                                        <td>
                                                            <a href="details_referral.php?ID=<?php echo $row2['id']; ?>">
                                                                Details
                                                            </a>
                                                        </td>
                                                        <td style="color:red">
                                                            <?php
                                                            echo $row2['id'];
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            echo $row2['name'];
                                                            ?>
                                                        </td>
                                                        <td style="color: blue;">
                                                            <i>
                                                                <?php
                                                                echo $row2['email'];
                                                                ?>
                                                            </i>
                                                        </td>
                                                        <!-- <td>
                                                        <?php
                                                        echo $row2['age'];
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        echo $row2['gender'];
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        echo $row2['college_of'];
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        echo $row2['year_level'];
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        echo $row2['course'];
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        echo $row2['preferred_mode'];
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        echo $row2['date'];
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        echo $row2['phone_number'];
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        echo $row2['facebook_name'];
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        echo $row2['preferred_time'];
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        echo $row2['referrer'];
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        echo $row2['reason_for_referral'];
                                                        ?>
                                                    </td> -->
                                                        <td>
                                                            <?php
                                                            echo $row2['status'];
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            echo $row2['outcome'];
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php } else {
                                                echo '<h4 style="color: red;" >' . '<b>' . 'Referral' . '<b>' . ' (No Data!)' . '</h4>';
                                            }
                                                ?>
                                            <?php } while ($row2 = $referral->fetch_assoc()) ?>

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