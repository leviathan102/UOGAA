<!DOCTYPE html>
<html dir="ltr" lang="en">

<?php include 'includes/header.php';
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['UserLogin']) && $_SESSION['Access'] == "Administrator" || $_SESSION['Access'] == "Counselor" || $_SESSION['Access'] == "Dean" || $_SESSION['Access'] == "Faculty") {
    
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

                                <?php if (isset($_SESSION['UserLogin']) && $_SESSION['Access'] == "Administrator" || $_SESSION['Access'] == "Counselor") { ?>
                                <form action="add_user.php" method="post">
                                    <div class="form-floating mb-3" style="padding: 8px; background-color: skyblue;">
                                        <button class="btn btn-primary btn-block" type="submit">
                                            Create Account
                                        </button>
                                    </div>
                                </form>
                                <?php } else{ ?>
                                <form action="index.php" method="post">
                                    <div class="form-floating mb-3" style="padding: 8px; background-color: skyblue;">
                                        <button class="btn btn-primary btn-block" type="submit">
                                            Back to Dashboard
                                        </button>
                                    </div>
                                </form>
                                <?php } ?>

                                <table id="example" class="table table-hover">
                                    <thead style=" white-space: nowrap; ">
                                        <tr>
                                            <th>ID</th>
                                            <th><?php echo $_SESSION['AccountID'] ?></th>
                                        </tr>
                                        <tr>
                                            <th>Name</th>
                                            <th><?php echo $_SESSION['Username'] ?></th>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <th><?php echo $_SESSION['UserLogin'] ?></th>
                                        </tr>
                                        <tr>
                                            <th>Privilege</th>
                                            <th><?php echo $_SESSION['Access'] ?></th>
                                        </tr>
                                        <tr>
                                            <th>Password</th>
                                            <th>
                                                <input type="password" disabled value="<?php echo $_SESSION['Password'] ?>" id="myInput" >&nbsp;&nbsp;
                                                <input type="checkbox" onclick="myFunction()">&nbsp;Show Password
                                                <script>
                                                function myFunction() {
                                                  var x = document.getElementById("myInput");
                                                  if (x.type === "password") {
                                                    x.type = "text";
                                                  } else {
                                                    x.type = "password";
                                                  }
                                                }
                                                </script></th>
                                        </tr>
                                        <tr>
                                            <th>College/Program/Association</th>
                                            <th><?php echo $_SESSION['College'] ?></th>
                                        </tr><br>
                                    </thead>
                                    <tbody style=" white-space: nowrap; ">
                                            <tr>
                                                <td>
                                                    <form action="" method="post">
                                                        <a href="edit_user_credentials.php?ID=<?php echo $_SESSION['AccountID']; ?>">
                                                            <i class="fa fa-edit">Edit &nbsp;</i>
                                                        </a>
                                                        <input type="hidden" name="ID" value="<?php echo $_SESSION['AccountID']; ?>">
                                                    </form>
                                                </td>
                                            </tr>
                                        </tbody>
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