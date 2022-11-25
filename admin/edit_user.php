<!DOCTYPE html>
<html dir="ltr" lang="en">

<?php include 'includes/header.php';
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['UserLogin']) && $_SESSION['Access'] == "Administrator" || $_SESSION['Access'] == "Counselor" || $_SESSION['Access'] == "Dean" || $_SESSION['Access'] == "Faculty") {

    include_once("connections/connection.php");
    $con = connection();

    $id = $_GET['ID'];
    $sql3 = "SELECT * FROM counselor_user WHERE id = '$id'";
    $testing = $con->query($sql3) or die($con->error);
    $row3 = $testing->fetch_assoc();

?>

    <head>
        <style>
            .successmessage {
                border: none;
                border-radius: 24px;
                background-color: whitesmoke;
            }

            .fa-check {
                color: green;
                border-radius: 24px;
            }

            .btnok {
                background-color: greenyellow;
                border: none;
            }

            /* ===== Google Font Import - Poppins ===== */
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Poppins', sans-serif;
            }

            body {
                height: auto;
                padding: 8px;
                display: flex;
                align-items: center;
                justify-content: center;
                background: #4070f4;
            }

            .container {
                position: relative;
                max-width: 900px;
                width: 100%;
                height: fit-content;
                border-radius: 6px;
                padding: 30px;
                margin: 0 15px;
                background-color: #fff;
                box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            }

            .container header {
                position: relative;
                font-size: 20px;
                font-weight: 600;
                color: #333;
            }

            .container header::before {
                content: "";
                position: absolute;
                left: 0;
                bottom: -2px;
                height: 3px;
                width: 27px;
                border-radius: 8px;
                background-color: #4070f4;
            }

            .container form {
                position: relative;
                margin-top: 16px;
                min-height: 330px;
                background-color: #fff;
                overflow: hidden;
            }

            .container form .form {
                position: absolute;
                background-color: #fff;
                transition: 0.3s ease;
            }

            .container form .form.second {
                opacity: 0;
                pointer-events: none;
                transform: translateX(100%);
            }

            form.secActive .form.second {
                opacity: 1;
                pointer-events: auto;
                transform: translateX(0);
            }

            form.secActive .form.first {
                opacity: 0;
                pointer-events: none;
                transform: translateX(-100%);
            }

            .container form .title {
                display: block;
                margin-bottom: 8px;
                font-size: 16px;
                font-weight: 500;
                margin: 6px 0;
                color: #333;
            }

            .container form .fields {
                display: flex;
                align-items: center;
                justify-content: space-between;
                flex-wrap: wrap;
            }

            form .fields .input-field {
                display: flex;
                width: calc(100% / 3 - 15px);
                flex-direction: column;
                margin: 4px 0;
            }

            .input-field label {
                font-size: 12px;
                font-weight: 500;
                color: #2e2e2e;
            }

            .input-field input,
            select {
                outline: none;
                font-size: 14px;
                font-weight: 400;
                color: #333;
                border-radius: 5px;
                border: 1px solid #aaa;
                padding: 0 15px;
                height: 42px;
                margin: 8px 0;
            }

            .input-field input :focus,
            .input-field select:focus {
                box-shadow: 0 3px 6px rgba(0, 0, 0, 0.13);
            }

            .input-field select,
            .input-field input[type="date"] {
                color: #707070;
            }

            .input-field input[type="date"]:valid {
                color: #333;
            }

            .container form button,
            .backBtn {
                display: flex;
                align-items: center;
                justify-content: center;
                height: 45px;
                max-width: 200px;
                width: 100%;
                border: none;
                outline: none;
                color: #fff;
                border-radius: 5px;
                margin: 25px 0;
                background-color: #4070f4;
                transition: all 0.3s linear;
                cursor: pointer;
            }

            .container form .btnText {
                font-size: 14px;
                font-weight: 400;
            }

            form button:hover {
                background-color: #265df2;
            }

            form button i,
            form .backBtn i {
                margin: 0 6px;
            }

            form .backBtn i {
                transform: rotate(180deg);
            }

            form .buttons {
                display: flex;
                align-items: center;
            }

            form .buttons button,
            .backBtn {
                margin-right: 14px;
            }

            @media (max-width: 750px) {
                .container form {
                    overflow-y: scroll;
                }

                .container form::-webkit-scrollbar {
                    display: none;
                }

                form .fields .input-field {
                    width: calc(100% / 2 - 15px);
                }
            }

            @media (max-width: 550px) {
                form .fields .input-field {
                    width: 100%;
                }
            }
        </style>
        <script>
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
                            <h4 class="page-title"><i class="mdi mdi-account-multiple"></i>Accounts</h4>
                            <div class="d-flex align-items-center">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="user_accounts.php">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">Edit User</a></li>
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
                            <div class="card" style="align-items: center; background-color:cyan; padding: 8px">
                                <?php if (isset($_POST['submit'])) {
                                    $funame = $_POST['username'];
                                    $femail = $_POST['email'];
                                    $fpass = $_POST['password'];
                                    $faccess = $_POST['access'];
                                    $college = $_POST['college'];
                                    $fstatus = $_POST['status'];
                                    $sql = "UPDATE `counselor_user` 
                                    SET `username`='$funame',`email`='$femail',
                                    `password`='$fpass',`access`='$faccess',
                                    `college`='$college',
                                    `status`='$fstatus' WHERE id = '$id'";
                                    $con->query($sql) or die($con->error); ?>
                                    <p>
                                        <b style="color: green;">
                                            Updated Successfully! (
                                            <strong style="color:yellowgreen">
                                                <?php echo $funame ?>
                                            </strong>
                                            )
                                            Press OK to see the Changes
                                        </b>
                                    </p>
                                    <a href="details_user.php?ID=<?php echo $row3['id']; ?>" style="background-color: blue; color:white; border-radius:4px; padding:4px">
                                        OK
                                    </a> <br>
                                <?php } ?>
                                <div class="container">
                                    <header>
                                        User Account Form (Updates)
                                    </header>
                                    <form action="#" method="post">
                                        <div class="form first">
                                            <div class="details personal">
                                                <span class="title">Personal Details</span>

                                                <div class="fields">
                                                    <div class="input-field">
                                                        <label>UserName</label>
                                                        <input type="text" name="username" value="<?php echo $row3['username']; ?>" required>
                                                    </div>

                                                    <div class="input-field">
                                                        <label>Email</label>
                                                        <input type="email" name="email" value="<?php echo $row3['email']; ?>" required>
                                                    </div>

                                                    <div class="input-field">
                                                        <label>Role</label>
                                                        <select name="access" id="access" required>
                                                            <?php if (isset($_SESSION['UserLogin']) && $_SESSION['Access'] == "Administrator") { ?>
                                                            <option <?php echo ($row3['access'] == "Administrator") ? 'selected' : ''; ?>>Administrator</option>
                                                            <?php } ?>
                                                            <?php if (isset($_SESSION['UserLogin']) && $_SESSION['Access'] == "Counselor") { ?>
                                                            <option <?php echo ($row3['access'] == "Counselor") ? 'selected' : ''; ?>>Counselor</option>
                                                            <?php } ?>
                                                            <?php if (isset($_SESSION['UserLogin']) && $_SESSION['Access'] == "Dean") { ?>
                                                            <option <?php echo ($row3['access'] == "Dean") ? 'selected' : ''; ?>>Dean</option>
                                                            <?php } ?>
                                                            <?php if (isset($_SESSION['UserLogin']) && $_SESSION['Access'] == "Faculty") { ?>
                                                            <option <?php echo ($row3['access'] == "Faculty") ? 'selected' : ''; ?>>Faculty</option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>

                                                    <div class="input-field">
                                                        <label>College/Program</label>
                                                        <?php
                                                        // for college list
                                                        $sql = "SELECT * FROM college_list ORDER BY name ASC";
                                                        $appointment = $con->query($sql) or die($con->error);
                                                        $row = $appointment->fetch_assoc();
                                                        ?>
                                                        <select name="college" required>
                                                            <option selected><?php echo $_SESSION['College'] ?></option>
                                                            <!-- <option <?php echo ($row3['college'] == "College of Administration") ? 'selected' : ''; ?>>College of Administration</option>
                                                            <option <?php echo ($row3['college'] == "College of Arts and Sciences") ? 'selected' : ''; ?>>College of Arts and Sciences</option>
                                                            <option <?php echo ($row3['college'] == "College of Business") ? 'selected' : ''; ?>>College of Business</option>
                                                            <option <?php echo ($row3['college'] == "College of Education") ? 'selected' : ''; ?>>College of Education</option>
                                                            <option <?php echo ($row3['college'] == "College of Law") ? 'selected' : ''; ?>>College of Law</option>
                                                            <option <?php echo ($row3['college'] == "College of Nursing") ? 'selected' : ''; ?>>College of Nursing</option>
                                                            <option <?php echo ($row3['college'] == "College of Technologies") ? 'selected' : ''; ?>>College of Technologies</option>
                                                            <option <?php echo ($row3['college'] == "Doctoral Programs") ? 'selected' : ''; ?>>Doctoral Programs</option>
                                                            <option <?php echo ($row3['college'] == "Masters Degree Programs") ? 'selected' : ''; ?>>Masters Degree Programs</option>
                                                            <option <?php echo ($row3['college'] == "NSTP Unit") ? 'selected' : ''; ?>>NSTP Unit</option>
                                                            <option <?php echo ($row3['college'] == "Guidance Office") ? 'selected' : ''; ?>>Guidance Office</option> -->
                                                        </select>
                                                    </div>

                                                    <div class="input-field">
                                                        <label>Password</label>
                                                        <input type="password" id="myInput" name="password" value="<?php echo $row3['password'] ?>" required>
                                                    </div>

                                                    
                                                    <div class="input-field">
                                                        <?php if (isset($_SESSION['UserLogin']) && $_SESSION['Access'] == "Administrator") { ?>
                                                        <label>Status</label>
                                                        <select name="status" id="status" value="<?php echo $row3['status']; ?>" required>
                                                            <option></option>
                                                            <option value="Active" <?php echo ($row3['status'] == "Active") ? 'selected' : ''; ?>>Active</option>
                                                            <option value="InActive" <?php echo ($row3['status'] == "InActive") ? 'selected' : ''; ?>>InActive</option>
                                                        </select>
                                                        <?php } else { ?>
                                                            <input type="hidden" name="status" value="Active" required>
                                                        <?php } ?>
                                                    </div>

                                                </div>
                                            </div>
                                            
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
                                                </script>

                                            <div class="details ID">
                                                <button id="nxtBtn" role="button" type="submit" name="submit" value="Submit Form" class="btn btn-success btn-block">
                                                    <span class="btnText"> Update</span>
                                                    <i class="uil uil-navigator"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form><br>
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="details_user.php?ID=<?php echo $row3['id']; ?>" aria-expanded="false">
                                        <i class="fa fa-home" style="color: blue;"></i>
                                        <span class="hide-menu"><b>Back to Home</b></span>
                                    </a>
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="account_credentials.php?ID=<?php echo $row3['id']; ?>" aria-expanded="false">
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
    echo header("Location: ../login.php");
}
?>

</html>