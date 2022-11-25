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

    $sql4 = "SELECT * FROM exit_interview ORDER BY id DESC LIMIT $start, $limit";
    $interview = $con->query($sql4) or die($con->error);
    $row4 = $interview->fetch_assoc();

    $sql01 = "SELECT count(id) AS id FROM exit_interview";
    $appointment1 = $con->query($sql01) or die($con->error);
    $counselingCount = $appointment1->fetch_all(MYSQLI_ASSOC);
    $total = $counselingCount[0]['id'];
    $pages = ceil($total / $limit);

    $previous = $page - 1;
    $next = $page + 1;


    //for downloaded exit interview
    $limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 10;
    $page2 = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
    $start2 = ($page2 - 1) * $limit;
    $sql5 = "SELECT * FROM exit_interview_download_form ORDER BY id DESC LIMIT $start, $limit";
    $interview2 = $con->query($sql5) or die($con->error);
    $row5 = $interview2->fetch_assoc();

    $sql02 = "SELECT count(id) AS id FROM exit_interview_download_form";
    $appointment2 = $con->query($sql02) or die($con->error);
    $counselingCount2 = $appointment2->fetch_all(MYSQLI_ASSOC);
    $total2 = $counselingCount2[0]['id'];
    $pages2 = ceil($total2 / $limit);

    $previous2 = $page2 - 1;
    $next2 = $page2 + 1;

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
                            <h4 class="page-title"><i class="mdi mdi-calendar-multiple-check"></i> Exit Interview</h4>
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

                    <!-- fill-up form -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="table-responsive">
                                    <h2>
                                        Exit Interview (
                                        <?php
                                        $query03 = "SELECT id FROM exit_interview ORDER BY id";
                                        $query_run03 = mysqli_query($con, $query03);
                                        $row03 = mysqli_num_rows($query_run03);
                                        echo  $row03;
                                        ?>
                                        )

                                    </h2>
                                    <!-- exit interview table -->
                                    <div class="table-responsive">
                                        <div class="container" style="padding-bottom: 8px; text-align:center; background-color:aquamarine">
                                            <form action="exit_interview_limit.php" method="post" id="form" name="form">

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
                                        <table>
                                            <thead style=" white-space: nowrap; ">
                                                <tr>
                                                    <th></th>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <!-- <th>Age</th>
                                            <th>Gender</th>
                                            <th>College</th>
                                            <th>Course</th>
                                            <th>Date Prefered</th>
                                            <th>Best Part</th>
                                            <th>Worst Part</th>
                                            <th>Like Best (Department/College)</th>
                                            <th>Like Least (Department/College)</th>
                                            <th>Immediate Plan After Graduation</th>
                                            <th>Long Term Goal</th>
                                            <th>Home Address</th>
                                            <th>Phone Number</th> -->
                                                    <th>Date Submitted</th>
                                                </tr>
                                            </thead>
                                            <?php do { ?>
                                                <?php if ($row4 != null) { ?>
                                                    <tbody style=" white-space: nowrap; ">
                                                        <tr>
                                                            <td><a href="details_exit_interview.php?ID=<?php echo $row4['id']; ?>">Details</a></td>
                                                            <td style="color: red;"><?php echo $row4['id']; ?></td>
                                                            <td><?php echo $row4['name']; ?></td>
                                                            <td><?php echo $row4['email']; ?></td>
                                                            <!-- <td><?php echo $row4['age']; ?></td>
                                                    <td><?php echo $row4['gender']; ?></td>
                                                    <td><?php echo $row4['college']; ?></td>
                                                    <td><?php echo $row4['course']; ?></td>
                                                    <td><?php echo $row4['select_date']; ?></td>
                                                    <td><?php echo $row4['best_part']; ?></td>
                                                    <td><?php echo $row4['worst_part']; ?></td>
                                                    <td><?php echo $row4['like_best']; ?></td>
                                                    <td><?php echo $row4['like_least']; ?></td>
                                                    <td><?php echo $row4['immediate_plans']; ?></td>
                                                    <td><?php echo $row4['long_term_goal']; ?></td>
                                                    <td><?php echo $row4['home_address']; ?></td>
                                                    <td><?php echo $row4['phone_number']; ?></td> -->
                                                            <td><?php echo $row4['added_at']; ?></td>
                                                        </tr>
                                                    <?php } else {
                                                    echo '<h4 style="color: red;" >' . '<b>' . 'Exit Interview' . '<b>' . ' (No Data!)' . '</h4>';
                                                }
                                                    ?>
                                                <?php } while ($row4 = $interview->fetch_assoc()) ?>

                                                    </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- downloaded from -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="table-responsive">
                                        <h2>
                                            Downloaded the Form (
                                            <?php
                                            $query04 = "SELECT id FROM exit_interview_download_form ORDER BY id";
                                            $query_run04 = mysqli_query($con, $query04);
                                            $row04 = mysqli_num_rows($query_run04);
                                            echo  $row04;
                                            ?>
                                            )

                                        </h2>
                                        <!-- download form -->
                                        <table>
                                            <thead style=" white-space: nowrap; ">
                                                <tr>
                                                    <th></th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>College</th>
                                                    <th>Course</th>
                                                    <th>Date Submitted</th>
                                                </tr>
                                            </thead>
                                            <?php do { ?>
                                                <?php if ($row5 != null) { ?>
                                                    <tbody>
                                                        <tr>
                                                            <td><a href="details_exit_interview_download_form.php?ID=<?php echo $row5['id']; ?>">Details</a></td>
                                                            <td><?php echo $row5['name']; ?></td>
                                                            <td><?php echo $row5['email']; ?></td>
                                                            <td><?php echo $row5['college_of']; ?></td>
                                                            <td><?php echo $row5['course']; ?></td>
                                                            <td><?php echo $row5['added_at']; ?></td>
                                                        </tr>
                                                    <?php } else {
                                                    echo '<h4 style="color: red;" >' . '<b>' . 'Exit Interview-Downloaded the Form' . '<b>' . ' (No Data!)' . '</h4>';
                                                }
                                                    ?>
                                                <?php } while ($row5 = $interview2->fetch_assoc()) ?>

                                                    </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>


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
    echo header("Location: ../index.php");
} ?>

</html>