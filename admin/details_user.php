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

include_once("connections/connection.php");
$con = connection();

$id = $_GET['ID'];

$sql3 = "SELECT * FROM counselor_user WHERE id = '$id'";
$testing = $con->query($sql3) or die($con->error);
$row3 = $testing->fetch_assoc();

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
                        <h4 class="page-title"><i class="mdi mdi-account-multiple"></i>Accounts</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="user_accounts.php">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Details</a></li>
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
                            <?php if ($row3 != null) { ?>
                                <div class="table-responsive">
                                    <form action="user_accounts.php" method="post">
                                        <div class="form-floating mb-3" style="padding: 8px; background-color: skyblue;">
                                            <button class="btn btn-primary btn-block" type="submit">
                                                Back
                                            </button>
                                        </div>
                                    </form>
                                    <table id="example" class="table table-hover">
                                        <thead style=" white-space: nowrap; ">
                                            <tr>
                                                <th>UserName</th>
                                                <td><?php echo $row3['username']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td style="color: blue;"><?php echo $row3['email']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Privilege</th>
                                                <td><?php echo $row3['access']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>College/Program</th>
                                                <td><?php echo $row3['college']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Status</th>
                                                <td><?php echo $row3['status']; ?></td>
                                            </tr>
                                        </thead>

                                        <?php if (isset($_SESSION['UserLogin']) && $_SESSION['Access'] == "Administrator") { ?>
                                        <tbody style=" white-space: nowrap; ">
                                            <tr>
                                                <td>
                                                    <form action="delete.php" method="post">
                                                        <a href="edit_user.php?ID=<?php echo $row3['id']; ?>">
                                                            <i class="fa fa-edit">Edit &nbsp;</i>
                                                        </a>
                                                        <button style="background-color: white; border-color: white; color:red;" type="submit" class="fa fa-trash" name="deleteuser">
                                                            Delete
                                                        </button>
                                                        <input type="hidden" name="ID" value="<?php echo $row3['id']; ?>">
                                                    </form>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <?php } ?>
                                    </table>
                                </div>
                            <?php } else {
                            ?>
                                <center style="padding:8px">
                                    <p>
                                        <b style="color: red; text-align: center;">
                                            No Entry Found!
                                        </b>
                                    </p>
                                    <a href="user_accounts.php">
                                        <b style="background-color:green; padding: 4px; border-radius: 4px; color:white ">OK</b>
                                    </a>
                                </center><br>
                            <?php } ?>
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