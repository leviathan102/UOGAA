<!DOCTYPE html>
<html dir="ltr" lang="en">

<?php include 'includes/header.php';
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['UserLogin']) && $_SESSION['Access'] == "Administrator" || $_SESSION['Access'] == "Counselor") {
    // echo "<div class='message success'>Welcome " . $_SESSION['Access'] . '</div>';
} else {
    echo header("Location: ../login.php");
}
//database connection
include_once("connections/connection.php");
$con = connection();

$sql = "SELECT * FROM college_list ORDER BY name ASC";
$appointment = $con->query($sql) or die($con->error);
$row = $appointment->fetch_assoc();
?>

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
                        <h4 class="page-title"><i class="fas fa-building"></i> College</h4>
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
                            <div class="table-responsive">
                                <form action="add_college.php" method="post">
                                    <div class="form-floating mb-3" style="padding: 8px; background-color: skyblue;">
                                        <button class="btn btn-primary btn-block" type="submit">
                                            Add College / Program
                                        </button>
                                    </div>
                                </form>

                                <table id="example" class="table table-hover">
                                    <thead style=" white-space: nowrap; ">
                                        <tr>
                                            <th></th>
                                            <th>College</th>
                                        </tr>
                                    </thead>
                                    <?php do { ?>
                                        <?php if ($row != null) { ?>
                                            <tbody style=" white-space: nowrap; ">
                                                <tr>
                                                    <td><a href="details_college.php?ID=<?php echo $row['id']; ?>">Details</a></td>
                                                    <td><?php echo $row['name']; ?></td>
                                                </tr>

                                            </tbody>
                                        <?php } else {
                                            echo '<h4 style="color: red;" >' . '<b>' . 'College' . '<b>' . ' (No Data!)' . '</h4>';
                                        } ?>
                                    <?php } while ($row = $appointment->fetch_assoc()) ?>
                                </table>
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

</html>