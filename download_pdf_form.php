<?php

include_once("connections/connection.php");
$con = connection();

if (!isset($_SESSION)) {
    session_start();
}

//for phpmailer
require("PHPMailer/src/PHPMailer.php");
require("PHPMailer/src/SMTP.php");

//college filtering
// if (isset($_POST["add_exit_interview_download"])) {
//     $filter = $_POST["college_of"];
//     $sql4 = "SELECT * FROM courses_list 
//  WHERE college='$filter' ORDER by name ASC";
//     $college = $con->query($sql4) or die($con->error);
//     $row4 = $college->fetch_assoc();
// }

//for course list
$sql2 = "SELECT * FROM courses_list ORDER BY college ASC";
$appointment2 = $con->query($sql2) or die($con->error);
$row2 = $appointment2->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BukSU Guidance Office</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/icons8-user-64.png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/feathericon.min.css">
    <link rel="stylesheet" href="assets/plugins/morris/morris.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <script>
        function show() {
            console.log("show");
            document.getElementById("dialog").showModal();
        }

        function performClose() {
            console.log("Closing");
            document.getElementById("dialog").close();
        }
    </script>

</head>

<body id="formlogin">
    <form action="" method="post">
        <div class="main-wrapper login-body">
            <div class="login-wrapper">
                <div class="container">
                    <div class="loginbox">
                        <div class="login-left"> <img class="img-fluid" src="assets/img/R.png" alt="Logo">
                        </div>
                        <div class="login-right">
                            <div class="login-right-wrap">
                                <?php
                                if (isset($_POST['submit'])) {
                                    $fname = $_POST['name'];
                                    $femail = $_POST['email'];
                                    $college = $_POST['college_of'];
                                    $course = $_POST['course'];
                                    $sql = "INSERT INTO `exit_interview_download_form`
                                    ( `name`,`email`, `college_of`, `course`) VALUES 
                                    ('$fname','$femail', '$college', '$course' )";
                                    $con->query($sql) or die($con->error);

                                    // email notification
                                    $mailTo = $_POST['email'];
                                    // $mailTo = "1801101459@student.buksu.edu.ph";
                                    $subject = "BuksuGuidance";
                                    $body = " A Blessed Day, $fname! <br><br> 
                                    Thank you for Downloading the Exit Interview Form. <br>
                                    Good luck on your Future Career. <br><br>                                     
                                    <br> University Guidance Office";

                                    $mail = new PHPMailer\PHPMailer\PHPMailer();

                                    // $mail->SMTPDebug = 3;
                                    $mail->isSMTP();

                                    // $mail->Host = "mail.smtp2go.com";

                                    $mail->Host = "smtp.gmail.com";

                                    $mail->SMTPAuth = true;
                                    //smtp2go configuration
                                    // $mail->Username = "buksuguidance";
                                    // $mail->Password = "buksu123";

                                    //gmail app configuration
                                    $mail->Username = "1801101459@student.buksu.edu.ph";
                                    $mail->Password = "nluawtnhhfdmgzvt";
                                    $mail->SMTPSecure = "tls";
                                    $mail->Port = "587";

                                    // $mail->Port = "2525";
                                    $mail->From = "1801101459@student.buksu.edu.ph";
                                    $mail->FromName = "BUKSUGuidanceOffice";
                                    $mail->addAddress($mailTo, "");
                                    $mail->isHTML(true);
                                    $mail->Subject = "Exit Interview Form";
                                    $mail->Body = $body;
                                    $mail->AltBody = "text version";

                                    if (!$mail->send()) {
                                        echo "Mailer Error: " . $mail->ErrorInfo;
                                    }
                                ?>
                                    <p style="text-align: center;">
                                        <i class="fa fa-check" style="color: green"></i>
                                        <b style="color: green; ">
                                            Information has been saved!
                                        </b>
                                    </p>
                                    <button class="btn btn-primary btn-block">
                                        <i class="fa fa-file-pdf" style="color:rgb(167, 54, 34)"></i>
                                        <a href="Exit Interview.pdf" download style="color: white; padding: 8px">
                                            Download Now
                                        </a>
                                    </button>
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.php" aria-expanded="false">
                                        <i class="fa fa-home" style="color: blue;"></i>
                                        <span class="hide-menu"><b>Back to Home</b></span>
                                    </a>
                                <?php } ?>


                                <?php
                                //college filtering
                                if (isset($_POST["add_exit_interview_download"])) {
                                    $filter = $_POST["college_of"];
                                    $sql4 = "SELECT * FROM courses_list 
                                        WHERE college='$filter' ORDER by name ASC";
                                    $college = $con->query($sql4) or die($con->error);
                                    $row4 = $college->fetch_assoc();
                                    if (isset($_POST['college_of'])) {
                                ?>
                                        <div style="text-align: center" class="form-group">
                                            <img class="img-fluid" src="img/splash.jpg" alt="Logo" height="100px" width="100px">
                                        </div>
                                        <?php if (isset($_GET['error'])) { ?>
                                            <p class="error"><?php echo $_GET['error']; ?></p>
                                        <?php } ?>

                                        <div class="form-group">
                                            <h1>Please fill up for record management</h1>
                                            <label for="">Name</label>
                                            <input class="form-control" type="text" name="name" placeholder="Full Name" required><br>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input class="form-control" type="email" name="email" placeholder="Email" required><br>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <label for="">College</label>
                                            <select name="college_of" id="college_of" class="form-control" type="text" required>
                                                <?php
                                                if ($_POST["college_of"] != null) {
                                                ?>
                                                    <option><?php echo $_POST["college_of"] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <label for="">Course</label>
                                            <select name="course" required style="width: 100%;">
                                                <option value=""></option>
                                                <?php
                                                do {
                                                    if ($row4 != null) {
                                                ?>
                                                        <option style="font-size: 12px;"><?php echo $row4['name'] ?></option>
                                                <?php }
                                                } while ($row4 = $college->fetch_assoc()) ?>
                                            </select>
                                        </div>

                                        <dialog id="dialog" style="width: 80%; margin-left:10%; border: none; background-color:azure; height:50%; overflow:auto;">
                                            <p></p>
                                            <p style="text-align: justify; height:70%; overflow:auto; background-image:url('') ">
                                                <i>
                                                    Data Privacy and Consent Statement
                                                    of <b>University Online Guidance
                                                        Appoinment Application (UOGAA)</b> on handling
                                                    your personal information in connection with
                                                    your responses to this form, in accordance with
                                                    <b>Republic Act No. 10173 or the Data Privacy Act of 2012,</b>
                                                    its Implementing Rules and Regulations,
                                                    and other applicable laws, rules, and regulations.<br><br>

                                                    1. <b>Personal Data Collection</b><br>
                                                    This Data Privacy Statement and Consent
                                                    Form applies to the personal data or
                                                    information you share with your consent,
                                                    such as your full name and academic information.<br>

                                                    2.<b> Handling of Personal Data</b><br>
                                                    Your personal information or data
                                                    will be used solely for this application.
                                                    Under no circumstances will personal data
                                                    or information be handled in a way that is
                                                    incompatible with the original purposes
                                                    for which it was gathered.<br>

                                                    3. <b>Personal Data Protection</b><br>
                                                    To preserve the confidentiality and
                                                    security of your acquired, processed,
                                                    and stored data, the University Guidance
                                                    takes all necessary technical, organizational,
                                                    and physical precautions.<br>

                                                    4. <b>Personal Data Disclosure</b><br>
                                                    Sharing your personal information or data
                                                    inside the UOGAA or, if applicable,
                                                    for the aforementioned objectives,
                                                    with your consent or when we are otherwise
                                                    legally permitted to do so.
                                                    Your personal information collected in
                                                    this application will be kept private.
                                                </i>
                                            </p>
                                            <input type="checkbox" name="terms" style="cursor:pointer;" required>
                                            <label style="color: blue;">
                                                <b>
                                                    Agree to Terms and Privacy Conditions
                                                </b>
                                            </label><br>
                                            <label id="close" onclick="performClose()" name="agree" style="background-color: green; color: white; border-radius: 6px; padding: 4px; cursor:pointer;">
                                                <b>Proceed</b>
                                            </label>
                                        </dialog>
                                        <div class="form-control" style="color:green;">
                                            <label id="onclick" onclick="show()"><b>Terms and Privacy Conditions</b></label>
                                        </div><br>

                                        <button class="btn btn-primary btn-block" type="submit" name="submit">
                                            Submit
                                        </button>
                                        <br><a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.php" aria-expanded="false">
                                            <i class="fa fa-home" style="color: blue;"></i>
                                            <span class="hide-menu"><b>Back to Home</b></span>
                                    <?php }
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>