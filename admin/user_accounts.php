<!DOCTYPE html>
<html dir="ltr" lang="en">

<?php include 'includes/header.php';
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['UserLogin']) && $_SESSION['Access'] == "Administrator" || $_SESSION['Access'] == "Counselor") {
    
} else {
    echo header("Location: ../login.php");
}
//database connection
include_once("connections/connection.php");
$con = connection();

$sql = "SELECT * FROM counselor_user ORDER BY id DESC";
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
                        <h4 class="page-title"><i class="mdi mdi-account-multiple"></i> Accounts</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="user_accounts.php">Home</a></li>

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
                            <?php
                            // delete user accounts by id
                            if (isset($_POST['deleteuser'])) {
                                $id = $_POST['ID'];
                                $sql = "DELETE FROM counselor_user WHERE id = '$id'";
                                $con->query($sql) or die($con->error);
                                // echo header("Location: details_user.php?ID=" . $id);

                            ?>
                                <p>Deleted Successfully!</p>
                            <?php } ?>
                            <div class="table-responsive">

                                <form action="add_user.php" method="post">
                                    <div class="form-floating mb-3" style="padding: 8px; background-color: skyblue;">
                                        <button class="btn btn-primary btn-block" type="submit">
                                            Create Account
                                        </button>
                                    </div>
                                </form>

                                <table id="example" class="table table-hover">
                                    <thead style=" white-space: nowrap; ">
                                        <?php if (isset($_SESSION['UserLogin']) && $_SESSION['Access'] == "Administrator" || $_SESSION['Access'] == "Counselor") { ?>
                                        <tr>
                                            <th></th>
                                            <th>Username</th>
                                            <th>College/Program/Association/Guidance</th>
                                            <th>Privilege</th>
                                        </tr>
                                        <?php } ?>
                                    </thead>
                                    <?php do { ?>
                                        <?php if ($row != null) { ?>
                                            <tbody style=" white-space: nowrap; ">
                                                <tr>
                                                    <td><a href="details_user.php?ID=<?php echo $row['id']; ?>">Details</a></td>
                                                    <td><?php echo $row['username']; ?></td>
                                                    <td style="color: blue;"><i><?php echo $row['college']; ?></i></td>
                                                    <td><?php echo $row['access']; ?></td>
                                                </tr>

                                            </tbody>
                                        <?php } else {
                                            echo '<h4 style="color: red;" >' . '<b>' . 'User Accounts' . '<b>' . ' (No Data!)' . '</h4>';
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