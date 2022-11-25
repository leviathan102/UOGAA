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

    $search1 = $_GET['refsearch'];
    $collegefilter = $_SESSION['College'];

    $limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 30;
    $page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
    $start = ($page - 1) * $limit;
    $sql = "SELECT * FROM referral_counseling 
    WHERE name LIKE '%$search1%' AND college_of='$collegefilter' 
    ORDER BY id DESC ";
    $appointment = $con->query($sql) or die($con->error);
    $row = $appointment->fetch_assoc();
    
    $query0 = "SELECT count(id) AS id FROM referral_counseling 
    WHERE name LIKE '%$search1%' AND college_of='$collegefilter' 
    ORDER BY id DESC ";
    $query_run0 = mysqli_query($con, $query0);
    $row0 = mysqli_num_rows($query_run0);

    $sql01 = "SELECT count(id) AS id FROM referral_counseling WHERE college_of='$collegefilter'";
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
                            <h4 class="page-title"><i class="mdi mdi-account-switch"></i> Referral</h4>
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
                                <div class="table-responsive" style="padding: 8px; ">
                                    <form action="referral_search_result.php" method="get" style="padding:8px;">
                                        <input type="text" required placeholder="Input Name" name="refsearch" value="<?php if ($search1 != null) {
                                                                                                                            echo $search1;
                                                                                                                        } ?>">
                                        <button type="submit" class="btn btn-primary btn-block" name="referralsearch">Search</button>
                                    </form>
                                    <table style="padding: 8px; ">
                                        <?php if ($row != null) { ?>
                                            <thead style=" background-color:#3567f1 ">
                                                <tr>
                                                    <th></th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Status</th>
                                                    <th>Outcome</th>
                                                </tr>
                                            </thead>

                                            <?php do { ?>
                                                <?php if ($row != null) {
                                                ?>
                                                    <tbody>
                                                        <tr>
                                                            <td style=" white-space: nowrap; ">
                                                                <b>
                                                                    <a href="details_referral.php?ID=<?php echo $row['id']; ?>">Details</a>
                                                                </b>
                                                            </td>
                                                            <td style=" white-space: nowrap; ">
                                                                <?php
                                                                echo $row['name'];
                                                                ?>
                                                            </td>
                                                            <td style="color: blue; white-space: nowrap;">
                                                                <i>
                                                                    <?php
                                                                    echo $row['email'];
                                                                    ?>
                                                                </i>
                                                            </td>
                                                            <td style=" white-space: nowrap; ">
                                                                <?php if ($row['status'] == "Done") { ?>
                                                                    <b style="color: green">
                                                                        <?php
                                                                        echo $row['status'];
                                                                        ?>
                                                                    </b>
                                                                <?php }
                                                                if ($row['status'] == "Approved") { ?>
                                                                    <b style="color: orange">
                                                                        <?php
                                                                        echo $row['status'];
                                                                        ?>
                                                                    </b>
                                                                <?php }
                                                                if ($row['status'] == "Reject") { ?>
                                                                    <b style="color: red">
                                                                        <?php
                                                                        echo $row['status'];
                                                                        ?>
                                                                    </b>
                                                                <?php }
                                                                if ($row['status'] == "noaction") { ?>
                                                                    <b style="color:rgb(0, 165, 230)">
                                                                        <?php
                                                                        echo $row['status'];
                                                                        ?>
                                                                    </b>
                                                                <?php } ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                echo $row['outcome'];
                                                                ?>
                                                            </td>

                                                        </tr>
                                                    <?php } else {
                                                    echo '<h4 style="color: red;" >' . '<b>' . 'Referral' . '<b>' . ' (No result!)' . '</h4>';
                                                } ?>

                                                <?php } while ($row = $appointment->fetch_assoc()) ?>
                                                    </tbody>
                                                <?php } else { ?>
                                                    <thead style=" background-color:#3567f1 ">
                                                        <tr>
                                                            <th></th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Status</th>
                                                            <th>Outcome</th>
                                                        </tr>
                                                    </thead>

                                                    <?php do { ?>
                                                        <?php if ($row != null) {
                                                        ?>
                                                            <tbody>
                                                                <tr>
                                                                    <td style=" white-space: nowrap; ">
                                                                        <a href="details_referral.php?ID=<?php echo $row['id']; ?>">Details</a>
                                                                    </td>
                                                                    <td style=" white-space: nowrap; ">
                                                                        <?php
                                                                        echo $row['name'];
                                                                        ?>
                                                                    </td>
                                                                    <td style="color: blue; white-space: nowrap;">
                                                                        <i>
                                                                            <?php
                                                                            echo $row['email'];
                                                                            ?>
                                                                        </i>
                                                                    </td>
                                                                    <td style=" white-space: nowrap; ">
                                                                        <?php if ($row['status'] == "Done") { ?>
                                                                            <b style="color: green">
                                                                                <?php
                                                                                echo $row['status'];
                                                                                ?>
                                                                            </b>
                                                                        <?php }
                                                                        if ($row['status'] == "Approved") { ?>
                                                                            <b style="color: orange">
                                                                                <?php
                                                                                echo $row['status'];
                                                                                ?>
                                                                            </b>
                                                                        <?php }
                                                                        if ($row['status'] == "Reject") { ?>
                                                                            <b style="color: red">
                                                                                <?php
                                                                                echo $row['status'];
                                                                                ?>
                                                                            </b>
                                                                        <?php }
                                                                        if ($row['status'] == "noaction") { ?>
                                                                            <b style="color:rgb(0, 165, 230)">
                                                                                <?php
                                                                                echo $row['status'];
                                                                                ?>
                                                                            </b>
                                                                        <?php } ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                        echo $row['outcome'];
                                                                        ?>
                                                                    </td>

                                                                </tr>
                                                            <?php } else {
                                                            echo '<h4 style="color: red;" >' . '<b>' . 'Referral' . '<b>' . ' (No result!)' . '</h4>';
                                                        } ?>

                                                        <?php } while ($row = $appointment->fetch_assoc()) ?>
                                                            </tbody>
                                                        <?php } ?>
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

    <?php include 'includes/footer.php';
} else {
    echo header("Location: ../login.php");
}
    ?>

    </body>

</html>