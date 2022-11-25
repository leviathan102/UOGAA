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

    $sql = "SELECT * FROM counseling_appointment WHERE id = '$id'";
    $appointment = $con->query($sql) or die($con->error);
    $row = $appointment->fetch_assoc();
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
                            <h4 class="page-title"><i class="mdi mdi-account-switch"></i> Counseling</h4>
                            <div class="d-flex align-items-center">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="counselling.php"> Home</a></li>
                                        <li class="breadcrumb-item"><a href="#"> Counseling Details</a></li>
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
                                    <div class="container" style="padding:8px;">
                                        <table id="example" class="table table-hover">
                                            <?php if ($row != null) { ?>
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            <?php if ($row != null) { ?>
                                                                <form action="" method="post">
                                                                    <?php
                                                                    ?>
                                                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="counselling.php" aria-expanded="false">
                                                                        <i class="fa fa-home" style="color: blue;"></i>
                                                                        <span class="hide-menu"><b> Back</b></span>
                                                                    </a>
                                                                    <input type="hidden" name="ID" value="<?php echo $row['id']; ?>">
                                                                </form>
                                                            <?php } ?>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <?php if ($row['name'] != null) { ?>
                                                            <th>Name</th>
                                                            <td><?php echo $row['name']; ?></td>
                                                        <?php } ?>
                                                    </tr>
                                                    <tr>
                                                        <?php if ($row['email'] != null) { ?>
                                                            <th>Email</th>
                                                            <td style="color:blue"><?php echo $row['email']; ?></td>
                                                        <?php } ?>
                                                    </tr>
                                                    <tr>
                                                        <?php if ($row['college_of'] != null) { ?>
                                                            <th>College</th>
                                                            <td><?php echo $row['college_of']; ?></td>
                                                        <?php } ?>
                                                    </tr>
                                                    <tr>
                                                        <?php if ($row['course'] != null) { ?>
                                                            <th>Course</th>
                                                            <td><?php echo $row['course']; ?></td>
                                                        <?php } ?>
                                                    </tr>
                                                    <tr>
                                                        <?php if ($row['preferred_mode'] != null) { ?>
                                                            <th>Preferred Mode</th>
                                                            <td><?php echo $row['preferred_mode']; ?></td>
                                                        <?php } ?>
                                                    </tr>
                                                    <tr>
                                                        <?php if ($row['date_prefer'] != null) { ?>
                                                            <th>Date Selected</th>
                                                            <td><?php echo $row['date_prefer']; ?></td>
                                                        <?php } ?>
                                                    </tr>
                                                    <tr>
                                                        <?php if ($row['phone_number'] != null) { ?>
                                                            <th>Phone Number</th>
                                                            <td><?php echo $row['phone_number']; ?></td>
                                                        <?php } ?>
                                                    </tr>
                                                    <tr>
                                                        <?php if ($row['facebook_account'] != null) { ?>
                                                            <th>Facebook Name</th>
                                                            <td><?php echo $row['facebook_account']; ?></td>
                                                        <?php } ?>
                                                    </tr>
                                                    <tr>
                                                        <?php if ($row['prefered_time'] != null) { ?>
                                                            <th>Preferred Time</th>
                                                            <td><?php echo $row['prefered_time']; ?></td>
                                                        <?php } ?>
                                                    </tr>
                                                    <tr>
                                                        <?php if ($row['room'] != null) { ?>
                                                            <th>Location/Reason</th>
                                                            <td><?php echo $row['room']; ?></td>
                                                        <?php } ?>
                                                    </tr>

                                                    <tr>
                                                        <th>Assisted</th>
                                                        <?php
                                                        if (isset($_POST['cateredby'])) {

                                                            $catered = $_POST['name'];
                                                            $sql2 = "UPDATE `counseling_appointment` SET `catered_by`='$catered' WHERE id = '$id'";
                                                            $con->query($sql2) or die($con->error);

                                                        ?>
                                                            <meta http-equiv="refresh" content="1">
                                                            <p>
                                                                <b style="color:green;">
                                                                    Saved! ( <?php echo $catered; ?> )
                                                                </b>
                                                            </p>
                                                        <?php
                                                        } ?>
                                                        <td>
                                                            <?php
                                                            $sql3 = "SELECT * FROM `counselor_user` WHERE access='Counselor' ORDER by username ASC";
                                                            $counselor = $con->query($sql3) or die($con->error);
                                                            $row3 = $counselor->fetch_assoc();
                                                            if ($row['catered_by'] == 'notset' || $row['catered_by'] == null) { ?>
                                                                <form action="" method="post">
                                                                    <select name="name">
                                                                            <option><?php echo $_SESSION['Username'] ?></option>
                                                                    </select>
                                                                    <button class="btn btn-primary btn-block" style="color: white; border-color: white;" type="submit" name="cateredby">
                                                                        Accomodate
                                                                    </button>
                                                                    <input type="hidden" name="ID" value="<?php echo $row['id']; ?>">
                                                                </form>
                                                            <?php } else {
                                                                echo $row['catered_by'];
                                                            } ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Action & Status</th>
                                                        <?php
                                                        // test for email notification
                                                        //for phpmailer
                                                        require("PHPMailer/src/PHPMailer.php");
                                                        require("PHPMailer/src/SMTP.php");

                                                        if (isset($_POST['sendEmail'])) {
                                                            $status = $_POST['status'];
                                                            $sql = "UPDATE `counseling_appointment` 
                                                            SET `status`='$status' WHERE id = '$id'";
                                                            $con->query($sql) or die($con->error);

                                                            if ($_POST['status'] == "Approved") {
                                                                $name = $_POST['name'];
                                                                $date = $_POST['date'];
                                                                $time = $_POST['time'];
                                                                $location = $_POST['status'].'--'.$_POST['message'];
                                                                $cater = $_POST['catered'];
                                                                $sql2 = "UPDATE `counseling_appointment` 
                                                            SET `status`='$status', `room`='$location' WHERE id = '$id'";
                                                                $con->query($sql2) or die($con->error);
                                                                //send email of Approval
                                                                $mailTo = $_POST['email'];
                                                                // $mailTo = "1801101459@student.buksu.edu.ph";
                                                                $subject = "BuksuGuidance";
                                                                $body = " A Blessed Day, $name! <br><br> 
                                                                    Your Request has been Approved! <br>
                                                                    Here is the date and time you have provided:<br>
                                                                    Date: $date <br>
                                                                    Time: $time <br><br>
                                                                    Also the Location and your counselor is listed below:<br>
                                                                    Location: $location <br>
                                                                    Your Counselor: $cater <br><br>
                                                                    Please Be on Time <br> 
                                                                    Thank You and God Bless!<br><br><br>
                                                                    Best Regard,<br>
                                                                    University Guidance Office";
                                                                $mail = new PHPMailer\PHPMailer\PHPMailer();
                                                                $mail->isSMTP();
                                                                $mail->Host = "smtp.gmail.com";

                                                                $mail->SMTPAuth = true;
                                                                $mail->Username = "1801101459@student.buksu.edu.ph";
                                                                $mail->Password = "nluawtnhhfdmgzvt";
                                                                $mail->SMTPSecure = "tls";
                                                                $mail->Port = "587";

                                                                // $mail->Port = "2525";
                                                                $mail->From = "1801101459@student.buksu.edu.ph";
                                                                $mail->FromName = "BUKSUGuidanceOffice";
                                                                $mail->addAddress($mailTo, "GuidanceOffice");
                                                                $mail->isHTML(true);
                                                                $mail->Subject = "Counseling Approved";
                                                                $mail->Body = $body;
                                                                $mail->AltBody = "text version";

                                                                if (!$mail->send()) {
                                                                    echo "Mailer Error: " . $mail->ErrorInfo;
                                                                }
                                                        ?>
                                                                <meta http-equiv="refresh" content="1">
                                                                <p>
                                                                    <b style="color:green;">
                                                                        Saved! ( <?php echo $status; ?> )
                                                                    </b>
                                                                    message has been send to <b style="color:blue;">( <?php echo $mailTo; ?> )</b>
                                                                </p>
                                                            <?php }
                                                            if ($_POST['status'] == "Reject") {
                                                                $name = $_POST['name'];
                                                                $date = $_POST['date'];
                                                                $time = $_POST['time'];
                                                                $location = $_POST['status'].'--'.$_POST['message'];
                                                                $cater = $_POST['catered'];
                                                                $sql2 = "UPDATE `counseling_appointment` 
                                                            SET `status`='$status', `room`='$location' WHERE id = '$id'";
                                                                $con->query($sql2) or die($con->error);
                                                                $mailTo = $_POST['email'];
                                                                $subject = "BuksuGuidance";
                                                                $body = " A Blessed Day, $name! <br><br> 
                                                                    Your Request has been Unattended! <br>
                                                                    Reason: $location <br>
                                                                    Please be guided!<br> 
                                                                    Thank You and God Bless!<br><br><br>
                                                                    Best Regard,<br>
                                                                    University Guidance Office";
                                                                $mail = new PHPMailer\PHPMailer\PHPMailer();
                                                                $mail->isSMTP();
                                                                $mail->Host = "smtp.gmail.com";

                                                                $mail->SMTPAuth = true;
                                                                $mail->Username = "1801101459@student.buksu.edu.ph";
                                                                $mail->Password = "nluawtnhhfdmgzvt";
                                                                $mail->SMTPSecure = "tls";
                                                                $mail->Port = "587";

                                                                // $mail->Port = "2525";
                                                                $mail->From = "1801101459@student.buksu.edu.ph";
                                                                $mail->FromName = "BUKSUGuidanceOffice";
                                                                $mail->addAddress($mailTo, "GuidanceOffice");
                                                                $mail->isHTML(true);
                                                                $mail->Subject = "Counseling Request Unattended";
                                                                $mail->Body = $body;
                                                                $mail->AltBody = "text version";

                                                                if (!$mail->send()) {
                                                                    echo "Mailer Error: " . $mail->ErrorInfo;
                                                                }
                                                            ?>
                                                                <meta http-equiv="refresh" content="1">
                                                                <p>
                                                                    <b style="color:green;">
                                                                        Saved! ( <?php echo $status; ?> )
                                                                    </b>
                                                                    message has been send to <b style="color:blue;">( <?php echo $mailTo; ?> )</b>
                                                                </p>
                                                            <?php } ?>
                                                            <p>
                                                                <meta http-equiv="refresh" content="1">
                                                                <b style="color:green;">
                                                                    Saved! ( <?php echo $status; ?> )
                                                                </b>
                                                            </p>
                                                        <?php } ?>
                                                        <td>
                                                            <form action="" method="post">
                                                                <?php
                                                                if ($row['status'] != "Done" && $row['catered_by'] != null && $row['catered_by'] != 'notset') { ?>
                                                                    <ul>
                                                                        <li>
                                                                            <select name="status" id="status" value="<?php echo $row['status']; ?>" required>
                                                                                <option disabled selected>---Select---</option>
                                                                                <option value="Approved" <?php echo ($row['status'] == "Approved") ? 'selected' : ''; ?>>Approved</option>
                                                                                <option value="Reject" <?php echo ($row['status'] == "Reject") ? 'selected' : ''; ?>>Unattended</option>
                                                                                <option value="Done" <?php echo ($row['status'] == "Done") ? 'selected' : ''; ?>>Done</option>
                                                                            </select>
                                                                            <?php if ($row['status'] == "Approved") { ?>
                                                                                <input type="hidden" name="message" value="<?php echo $row['room']; ?>">
                                                                            <?php } else if ($row['status']==null || $row['status']=='noaction') { ?>
                                                                                <textarea id="" cols="20" rows="4" name="message" placeholder="Type Location/Unattended Reason"></textarea>
                                                                            <?php } ?>
                                                                            <input type="submit" name="sendEmail" id="" value="Save" />
                                                                        </li>
                                                                        <li>
                                                                            <input type="hidden" name="name" required id="" value="<?php echo $row['name']; ?>" />
                                                                            <input type="hidden" required name="email" id="" value="<?php echo $row['email']; ?>" />
                                                                            <input type="hidden" required name="date" id="" value="<?php echo $row['date_prefer']; ?>" />
                                                                            <input type="hidden" required name="time" id="" value="<?php echo $row['prefered_time']; ?>" />
                                                                            <input type="hidden" required name="catered" id="" value="<?php echo $row['catered_by']; ?>" />
                                                                        </li>
                                                                    </ul>
                                                                <?php } else if ($row['status'] == "Approved") { ?>
                                                                    <b style="color:green;"><?php echo $row['status']; ?></b>
                                                                    <i class="fa fa-check" style="color: green;">
                                                                    <?php } else if ($row['status'] == "Reject") { ?>
                                                                        <b style="color: red;"><?php echo $row['status']; ?></b>
                                                                    <?php } else if ($row['status'] == "noaction") {
                                                                    echo $row['status']; ?>
                                                                    <?php } else if ($row['status'] == "Done") { ?>
                                                                        <b style="color:green;"><?php echo $row['status']; ?></b>
                                                                        <i class="fa fa-check" style="color: white; background-color: green; border-radius: 8px;">
                                                                        <?php } ?>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Outcome</th>
                                                        <?php
                                                        if (isset($_POST['saveoutcome'])) {

                                                            $outcome = $_POST['outcome'];
                                                            $sql = "UPDATE `counseling_appointment` SET `outcome`='$outcome' WHERE id = '$id'";
                                                            $con->query($sql) or die($con->error);
                                                        ?>
                                                            <meta http-equiv="refresh" content="1">
                                                            <p>
                                                                <b style="color:green;">
                                                                    Saved! ( <?php echo $outcome; ?> )
                                                                </b>
                                                            </p>
                                                        <?php
                                                        } ?>
                                                        <td>
                                                            <form action="" method="post">
                                                                <?php
                                                                if ($row['outcome'] != 'notset' || $row['outcome'] != 'notset' || $row['status'] == "Approved" || $row['status'] == "Reject") {
                                                                ?>
                                                                    <select name="outcome" id="">
                                                                        <option disabled selected>Select Outcome</option>
                                                                        <option>Successfully Address</option>
                                                                        <option>Need to Request Again</option>
                                                                    </select>
                                                                    <input type="text" disabled name="ID" value="<?php echo $row['outcome']; ?>">
                                                                    <button class="fa fa-save" style="color: green; border-color: white;" type="submit" name="saveoutcome">
                                                                        <i></i>
                                                                        Save
                                                                    </button>
                                                                    <input type="hidden" name="ID" value="<?php echo $row['id']; ?>">
                                                            </form>
                                                        <?php } else if ($row['status'] == "Done") {
                                                                    echo $row['outcome'];
                                                                } ?>
                                                        <?php ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <?php
                                                        // delete counseling data by id
                                                        if (isset($_POST['deletecounselingrecord'])) {
                                                            $id = $_POST['ID'];
                                                            $sql = "DELETE FROM counseling_appointment WHERE id = '$id'";
                                                            $con->query($sql) or die($con->error);
                                                        ?>
                                                            <meta http-equiv="refresh" content="1">
                                                            <p>
                                                                <b style="color:green;">
                                                                    Deleted! ( <?php echo $id; ?> )
                                                                </b>
                                                            </p>
                                                        <?php } ?>
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
                                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="counselling.php" aria-expanded="false">
                                            <i class="fa fa-home" style="color: blue;"></i>
                                            <span class="hide-menu"><b>Back to Home</b></span>
                                        </a>
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
<?php
} else {
    echo header("Location: ../login.php");
}
?>

</html>