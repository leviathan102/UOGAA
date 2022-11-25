<!DOCTYPE html>
<html dir="ltr" lang="en">

<?php include 'includes/header.php';

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['UserLogin']) && $_SESSION['Access'] == "Administrator" || $_SESSION['Access'] == "Counselor") {

    include_once("connections/connection.php");
    $con = connection();
    $id = $_GET['ID'];

    $sql4 = "SELECT * FROM exit_interview WHERE id = '$id'";
    $interview = $con->query($sql4) or die($con->error);
    $row4 = $interview->fetch_assoc();

?>

    <head>
        <style>
            table {
                border-collapse: collapse;
                font-family: sans-serif;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
                width: 50%;
                padding: 8px;
                background-color: lightcyan;
            }

            thead td:hover {
                background-color: aqua;
            }

            tr,
            th {
                text-align: left;
            }

            th,
            tr:hover {
                background-color: white;
            }

            #container {
                background: #fff;
                color: #555;
                padding: 8px;
                /* background-color: aquamarine; */
            }

            ul {
                list-style: none;
                padding: 0;
            }

            ul>li {
                padding: 0.12em 1em
            }

            label {
                display: block;
                float: left;
                width: 130px;
            }

            input,
            textarea {
                font-family: Georgia, Serif;
                margin-top: 10px;
            }
        </style>
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#status").change(function() {
                $('form').submit();
            })
        })
    </script> -->
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
                            <h4 class="page-title"><i class="mdi mdi-account-switch"></i> Exit Interview Form</h4>
                            <div class="d-flex align-items-center">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="exit_interview_form.php"> Home</a></li>

                                        <li class="breadcrumb-item active" aria-current="page"> Details Exit Interview</li>
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
                                <div class="table-responsive">
                                    <table id="example" class="table table-hover">
                                        <?php if ($row4 != null) { ?>
                                            <thead style=" white-space: nowrap; ">
                                                <tr>
                                                    <?php if ($row4['name'] != null) { ?>
                                                        <th>Name</th>
                                                        <td><?php echo $row4['name']; ?></td>
                                                    <?php } ?>
                                                </tr>
                                                <tr>
                                                    <?php if ($row4['email'] != null) { ?>
                                                        <th>Email</th>
                                                        <td style="color:blue;"><?php echo $row4['email']; ?></td>
                                                    <?php } ?>
                                                </tr>
                                                <tr>
                                                    <?php if ($row4['age'] != null) { ?>
                                                        <th>Age</th>
                                                        <td><?php echo $row4['age']; ?></td>
                                                    <?php } ?>
                                                </tr>
                                                <tr>
                                                    <?php if ($row4['gender'] != null) { ?>
                                                        <th>Gender</th>
                                                        <td><?php echo $row4['gender']; ?></td>
                                                    <?php } ?>
                                                </tr>
                                                <tr>
                                                    <?php if ($row4['college'] != null) { ?>
                                                        <th>College</th>
                                                        <td><?php echo $row4['college']; ?></td>
                                                    <?php } ?>
                                                </tr>
                                                <tr>
                                                    <?php if ($row4['course'] != null) { ?>
                                                        <th>Course</th>
                                                        <td><?php echo $row4['course']; ?></td>
                                                    <?php } ?>
                                                </tr>
                                                <tr>
                                                    <?php if ($row4['best_part'] != null) { ?>
                                                        <th>Best Experience</th>
                                                        <td><?php echo $row4['best_part']; ?></td>
                                                    <?php } ?>
                                                </tr>
                                                <tr>
                                                    <?php if ($row4['worst_part'] != null) { ?>
                                                        <th>Worst Experience</th>
                                                        <td><?php echo $row4['worst_part']; ?></td>
                                                    <?php } ?>
                                                </tr>
                                                <tr>
                                                    <?php if ($row4['like_best'] != null) { ?>
                                                        <th>Like Best in my College</th>
                                                        <td><?php echo $row4['like_best']; ?></td>
                                                    <?php } ?>
                                                </tr>
                                                <tr>
                                                    <?php if ($row4['like_least'] != null) { ?>
                                                        <th>Like Least in my College</th>
                                                        <td><?php echo $row4['like_least']; ?></td>
                                                    <?php } ?>
                                                </tr>
                                                <tr>
                                                    <?php if ($row4['immediate_plans'] != null) { ?>
                                                        <th>Immediate Plans</th>
                                                        <td><?php echo $row4['immediate_plans']; ?></td>
                                                    <?php } ?>
                                                </tr>
                                                <tr>
                                                    <?php if ($row4['long_term_goal'] != null) { ?>
                                                        <th>Long Term Goal</th>
                                                        <td><?php echo $row4['long_term_goal']; ?></td>
                                                    <?php } ?>
                                                </tr>
                                                <tr>
                                                    <?php if ($row4['home_address'] != null) { ?>
                                                        <th>Home Address</th>
                                                        <td><?php echo $row4['home_address']; ?></td>
                                                    <?php } ?>
                                                </tr>
                                                <tr>
                                                    <?php if ($row4['phone_number'] != null) { ?>
                                                        <th>Phone Number</th>
                                                        <td><?php echo $row4['phone_number']; ?></td>
                                                    <?php } ?>
                                                </tr>
                                                <tr>
                                                    <?php if ($row4['added_at'] != null) { ?>
                                                        <th>Date</th>
                                                        <td><?php echo $row4['added_at']; ?></td>
                                                    <?php } ?>
                                                </tr>
                                                <tr>
                                                    <?php
                                                    // delete exit interview data by id
                                                    if (isset($_POST['deleteexitrecord'])) {
                                                        $id = $_POST['ID'];
                                                        $sql = "DELETE FROM exit_interview WHERE id = '$id'";
                                                        $con->query($sql) or die($con->error);
                                                    ?>
                                                        <meta http-equiv="refresh" content="1">
                                                        <p>
                                                            <b style="color:green;">
                                                                Deleted! ( <?php echo $id; ?> )
                                                            </b>
                                                        </p>
                                                    <?php } ?>
                                                    <th>
                                                        <!-- <form action="" method="post">
                                                            <button class="btn btn-primary btn-block" style="color: white; border-color: white;" type="submit" name="deleteexitrecord">
                                                                <i class="fa fa-trash" style="color: rgb(173, 47, 25);"></i>
                                                                Delete Record
                                                            </button>
                                                            <input type="hidden" name="ID" value="<?php echo $row4['id']; ?>">
                                                        </form> -->
                                                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="exit_interview_form.php" aria-expanded="false">
                                                            <i class="fa fa-home" style="color: blue;"></i>
                                                            <span class="hide-menu"><b> Back</b></span>
                                                        </a>
                                                    </th>
                                                </tr>

                                            </thead>

                                            <tbody style=" white-space: nowrap; ">
                                            </tbody>
                                        <?php } else {
                                        ?>
                                            <center> <br>
                                                <p>
                                                    <label style="font-size: 25px ; font-weight:bolder; color: red">
                                                        No Available Entry!
                                                    </label>
                                                </p>
                                            </center> <br>
                                        <?php } ?>
                                    </table>
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="exit_interview_form.php" aria-expanded="false">
                                        <i class="fa fa-home" style="color: blue;"></i>
                                        <span class="hide-menu"><b>Back to Home</b></span>
                                    </a>
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
    echo header("Location: ../index.php");
}
?>

</html>