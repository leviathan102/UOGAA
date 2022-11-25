<!DOCTYPE html>
<html dir="ltr" lang="en">

<?php include 'includes/header.php';
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['UserLogin']) && $_SESSION['Access'] == "Administrator" || $_SESSION['Access'] == "Counselor") {

    include_once("connections/connection.php");
    $con = connection();
?>

    <head>
        <meta http-equiv="refresh" content="5">
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
                            <h4 class="page-title">
                                <i class="fa fa-address-book"></i>
                                Testing
                            </h4>
                            <div class="d-flex align-items-center">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="#"> Home</a>
                                        </li>
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
                                    <?php
                                    //CAO
                                    $sql = "SELECT * FROM testing_service 
                                    WHERE status='deanrequest' AND college_of='College of Administration' 
                                    ORDER BY id DESC ";
                                    $query_run = mysqli_query($con, $sql);
                                    $row = mysqli_num_rows($query_run);

                                    //CAS
                                    $sql2 = "SELECT * FROM testing_service 
                                    WHERE status='deanrequest' AND college_of='College of Arts and Sciences' 
                                    ORDER BY id DESC ";
                                    $query_run2 = mysqli_query($con, $sql2);
                                    $row2 = mysqli_num_rows($query_run2);

                                    //COB
                                    $sql3 = "SELECT * FROM testing_service 
                                    WHERE status='deanrequest' AND college_of='College of Business' 
                                    ORDER BY id DESC ";
                                    $query_run3 = mysqli_query($con, $sql3);
                                    $row3 = mysqli_num_rows($query_run3);

                                    //COE
                                    $sql4 = "SELECT * FROM testing_service 
                                    WHERE status='deanrequest' AND college_of='College of Education' 
                                    ORDER BY id DESC ";
                                    $query_run4 = mysqli_query($con, $sql4);
                                    $row4 = mysqli_num_rows($query_run4);

                                    //COL
                                    $sql5 = "SELECT * FROM testing_service 
                                    WHERE status='deanrequest' AND college_of='College of Law' 
                                    ORDER BY id DESC ";
                                    $query_run5 = mysqli_query($con, $sql5);
                                    $row5 = mysqli_num_rows($query_run5);

                                    //College of NSTP
                                    $sql6 = "SELECT * FROM testing_service 
                                    WHERE status='deanrequest' AND college_of='College of NSTP' 
                                    ORDER BY id DESC ";
                                    $query_run6 = mysqli_query($con, $sql6);
                                    $row6 = mysqli_num_rows($query_run6);

                                    //College of Nursing
                                    $sql7 = "SELECT * FROM testing_service 
                                    WHERE status='deanrequest' AND college_of='College of Nursing' 
                                    ORDER BY id DESC ";
                                    $query_run7 = mysqli_query($con, $sql7);
                                    $row7 = mysqli_num_rows($query_run7);

                                    //College of Technology
                                    $sql8 = "SELECT * FROM testing_service 
                                    WHERE status='deanrequest' AND college_of='College of Technology' 
                                    ORDER BY id DESC ";
                                    $query_run8 = mysqli_query($con, $sql8);
                                    $row8 = mysqli_num_rows($query_run8);

                                    //Doctoral Programs
                                    $sql9 = "SELECT * FROM testing_service 
                                    WHERE status='deanrequest' AND college_of='Doctoral Programs' 
                                    ORDER BY id DESC ";
                                    $query_run9 = mysqli_query($con, $sql9);
                                    $row9 = mysqli_num_rows($query_run9);

                                    //Masters Degree Programs
                                    $sql10 = "SELECT * FROM testing_service 
                                    WHERE status='deanrequest' AND college_of='Masters Degree Programs' 
                                    ORDER BY id DESC ";
                                    $query_run10 = mysqli_query($con, $sql10);
                                    $row10 = mysqli_num_rows($query_run10);
                                    ?>
                                    <!-- testing-table -->
                                    <div class="container" style="padding-bottom: 8px; width:fit-content"><br>
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <form action="college_testing.php" id="limit-records" method="post" style="padding-right: 20%;">
                                                            <input type="hidden" name="testingname" value="College of Administration">
                                                            <button role="button" name="collegetesting" class="btn btn-primary btn-block">
                                                                College of Administration
                                                                <span>
                                                                    <b style="color:#222">
                                                                        (<?php echo $row; ?>)
                                                                    </b>
                                                                </span>
                                                            </button>
                                                        </form>
                                                    </th>
                                                    <th>
                                                        <form action="college_testing.php" method="post" style="padding-right: 20%;">
                                                            <input type="hidden" name="testingname" value="College of Arts and Sciences">
                                                            <button role="button" name="collegetesting" class="btn btn-primary btn-block">
                                                                College of Arts and Sciences
                                                                <span>
                                                                    <b style="color:#222">
                                                                        (<?php echo $row2; ?>)
                                                                    </b>
                                                                </span>
                                                            </button>
                                                        </form>
                                                    </th>
                                                    <th>
                                                        <form action="college_testing.php" method="post" style="padding-right: 20%;">
                                                            <input type="hidden" name="testingname" value="College of Business">
                                                            <button role="button" name="collegetesting" class="btn btn-primary btn-block">
                                                                College of Business
                                                                <span>
                                                                    <b style="color:#222">
                                                                        (<?php echo $row3; ?>)
                                                                    </b> &nbsp;&nbsp;
                                                                </span>
                                                            </button>
                                                        </form>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <form action="college_testing.php" method="post" style="padding-right: 20%;">
                                                            <input type="hidden" name="testingname" value="College of Education">
                                                            <button role="button" name="collegetesting" class="btn btn-primary btn-block">
                                                                College of Education
                                                                <span>
                                                                    <b style="color:#222">
                                                                        (<?php echo $row4; ?>)
                                                                    </b> &nbsp;&nbsp;
                                                                </span>
                                                            </button>
                                                        </form>
                                                    </th>
                                                    <th>
                                                        <form action="college_testing.php" method="post" style="padding-right: 20%;">
                                                            <input type="hidden" name="testingname" value="College of Law">
                                                            <button role="button" name="collegetesting" class="btn btn-primary btn-block">
                                                                College of Law
                                                                <span>
                                                                    <b style="color:#222">
                                                                        (<?php echo $row5; ?>)
                                                                    </b> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                                                                </span>
                                                            </button>
                                                        </form>
                                                    </th>
                                                    <th>
                                                        <form action="college_testing.php" method="post" style="padding-right: 20%;">
                                                            <input type="hidden" name="testingname" value="NSTP Unit">
                                                            <button role="button" name="collegetesting" class="btn btn-primary btn-block">
                                                                NSTP Unit
                                                                <span>
                                                                    <b style="color:#222">
                                                                        (<?php echo $row6; ?>)
                                                                    </b> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                                                                </span>
                                                            </button>
                                                        </form>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <form action="college_testing.php" method="post" style="padding-right: 20%;">
                                                            <input type="hidden" name="testingname" value="College of Nursing">
                                                            <button role="button" name="collegetesting" class="btn btn-primary btn-block">
                                                                College of Nursing
                                                                <span>
                                                                    <b style="color:#222">
                                                                        (<?php echo $row7; ?>)
                                                                    </b> &nbsp;&nbsp; &nbsp;&nbsp;
                                                                </span>
                                                            </button>
                                                        </form>
                                                    </th>
                                                    <th>
                                                        <form action="college_testing.php" method="post" style="padding-right: 20%;">
                                                            <input type="hidden" name="testingname" value="College of Technology">
                                                            <button role="button" name="collegetesting" class="btn btn-primary btn-block">
                                                                College of Technology &nbsp; &nbsp;
                                                                <span>
                                                                    <b style="color:#222">
                                                                        (<?php echo $row8; ?>)
                                                                    </b>
                                                                </span>
                                                            </button>
                                                        </form>
                                                    </th>
                                                    <th>
                                                        <form action="college_testing.php" method="post" style="padding-right: 20%;">
                                                            <input type="hidden" name="testingname" value="Doctoral Programs">
                                                            <button role="button" name="collegetesting" class="btn btn-primary btn-block">
                                                                Doctoral Programs
                                                                <span>
                                                                    <b style="color:#222">
                                                                        (<?php echo $row9; ?>)
                                                                    </b> &nbsp;&nbsp; &nbsp;&nbsp;
                                                                </span>
                                                            </button>
                                                        </form>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <form action="college_testing.php" method="post" style="padding-right: 20%;">
                                                            <input type="hidden" name="testingname" value="Masters Degree Programs">
                                                            <button role="button" name="collegetesting" class="btn btn-primary btn-block">
                                                                Masters Degree Programs
                                                                <span>
                                                                    <b style="color:#222">
                                                                        (<?php echo $row10; ?>)
                                                                    </b>
                                                                </span>
                                                            </button>
                                                        </form>
                                                    </th>
                                                </tr>
                                            </thead>
                                        </table>
                                        <!-- <form action="college_testing.php" id="limit-records" method="post" style="padding-right: 20%;">
                                            <input type="hidden" name="testingname" value="College of Administration">
                                            <button role="button" name="collegetesting" class="btn btn-primary btn-block">
                                                College of Administration
                                                <span>
                                                    <b style="color:#222">
                                                        (<?php echo $row; ?>)
                                                    </b>
                                                </span>
                                            </button><br><br>
                                            <a class="btn btn-primary btn-block" href="counselling.php" aria-expanded="false">
                                                <span class="hide-menu">
                                                    College of Arts and Sciences &nbsp;
                                                </span>
                                                </b>
                                            </a>
                                            <a class="btn btn-primary btn-block" href="counselling.php" aria-expanded="false">
                                                <span class="hide-menu">
                                                    College of Arts and Sciences &nbsp;
                                                </span>
                                                </b>
                                            </a>
                                            <a class="btn btn-primary btn-block" href="counselling.php" aria-expanded="false">
                                                <span class="hide-menu">
                                                    College of Arts and Sciences &nbsp;
                                                </span>
                                                </b>
                                            </a>
                                        </form>

                                        <form action="college_testing.php" method="post" style="padding-right: 20%;">
                                            <input type="hidden" name="testingname" value="College of Arts and Sciences">
                                            <button role="button" name="collegetesting" class="btn btn-primary btn-block">
                                                College of Arts and Sciences
                                                <span>
                                                    <b style="color:#222">
                                                        (<?php echo $row2; ?>)
                                                    </b>
                                                </span>
                                            </button><br><br>
                                        </form>

                                        <form action="college_testing.php" method="post" style="padding-right: 20%;">
                                            <input type="hidden" name="testingname" value="College of Business">
                                            <button role="button" name="collegetesting" class="btn btn-primary btn-block">
                                                College of Business
                                                <span>
                                                    <b style="color:#222">
                                                        (<?php echo $row3; ?>)
                                                    </b> &nbsp;&nbsp;
                                                </span>
                                            </button><br><br>
                                        </form>

                                        <form action="college_testing.php" method="post" style="padding-right: 20%;">
                                            <input type="hidden" name="testingname" value="College of Education">
                                            <button role="button" name="collegetesting" class="btn btn-primary btn-block">
                                                College of Education
                                                <span>
                                                    <b style="color:#222">
                                                        (<?php echo $row4; ?>)
                                                    </b> &nbsp;&nbsp;
                                                </span>
                                            </button><br><br>
                                        </form>

                                        <form action="college_testing.php" method="post" style="padding-right: 20%;">
                                            <input type="hidden" name="testingname" value="College of Law">
                                            <button role="button" name="collegetesting" class="btn btn-primary btn-block">
                                                College of Law
                                                <span>
                                                    <b style="color:#222">
                                                        (<?php echo $row5; ?>)
                                                    </b> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                                                </span>
                                            </button><br><br>
                                        </form>

                                        <form action="college_testing.php" method="post" style="padding-right: 20%;">
                                            <input type="hidden" name="testingname" value="College of NSTP">
                                            <button role="button" name="collegetesting" class="btn btn-primary btn-block">
                                                College of NSTP
                                                <span>
                                                    <b style="color:#222">
                                                        (<?php echo $row6; ?>)
                                                    </b> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                                                </span>
                                            </button><br><br>
                                        </form>

                                        <form action="college_testing.php" method="post" style="padding-right: 20%;">
                                            <input type="hidden" name="testingname" value="College of Nursing">
                                            <button role="button" name="collegetesting" class="btn btn-primary btn-block">
                                                College of Nursing
                                                <span>
                                                    <b style="color:#222">
                                                        (<?php echo $row7; ?>)
                                                    </b> &nbsp;&nbsp; &nbsp;&nbsp;
                                                </span>
                                            </button><br><br>
                                        </form>

                                        <form action="college_testing.php" method="post" style="padding-right: 20%;">
                                            <input type="hidden" name="testingname" value="College of Technology">
                                            <button role="button" name="collegetesting" class="btn btn-primary btn-block">
                                                College of Technology
                                                <span>
                                                    <b style="color:#222">
                                                        (<?php echo $row8; ?>)
                                                    </b>
                                                </span>
                                            </button><br><br>
                                        </form>

                                        <form action="college_testing.php" method="post" style="padding-right: 20%;">
                                            <input type="hidden" name="testingname" value="Doctoral Programs">
                                            <button role="button" name="collegetesting" class="btn btn-primary btn-block">
                                                Doctoral Programs
                                                <span>
                                                    <b style="color:#222">
                                                        (<?php echo $row9; ?>)
                                                    </b> &nbsp;&nbsp; &nbsp;&nbsp;
                                                </span>
                                            </button><br><br>
                                        </form>

                                        <form action="college_testing.php" method="post" style="padding-right: 20%;">
                                            <input type="hidden" name="testingname" value="Masters Degree Programs">
                                            <button role="button" name="collegetesting" class="btn btn-primary btn-block">
                                                Masters Degree Programs
                                                <span>
                                                    <b style="color:#222">
                                                        (<?php echo $row10; ?>)
                                                    </b>
                                                </span>
                                            </button><br><br>
                                        </form> -->
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