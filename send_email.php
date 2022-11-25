
<?php
include_once("connections/connection.php");
$con = connection();

// test for email notification
//for phpmailer
require("PHPMailer/src/PHPMailer.php");
require("PHPMailer/src/SMTP.php");

if (isset($_POST['emailcounseling'])) {

    $fname = $_POST['name'];
    $email = $_POST['email'];
    $fcollege = $_POST['college_of'];
    $fyearlevel = $_POST['year_level'];
    $fage = $_POST['age'];
    $fgender = $_POST['gender'];
    $fpreferredmode = $_POST['preferred_mode'];
    $fphone = $_POST['phone_number'];
    $ffacebook = $_POST['facebook_account'];
    $fpreferredtime = $_POST['preferred_time'];
    $fdateprefer = $_POST['preferred_date'];
    $sql = "INSERT INTO `counseling_appointment`( `name`, `email`, `college_of`, `year_level`, `age`, `gender`, `preferred_mode`, `phone_number`, `facebook_account`, `prefered_time`, `date_prefer` ) VALUES ('$fname','$email','$fcollege','$fyearlevel','$fage','$fgender','$fpreferredmode','$fphone','$ffacebook','$fpreferredtime', '$fdateprefer')";
    $con->query($sql) or die($con->error);

    // echo header("Location: index.php");

    $mailTo = $_POST['email'];
    // $mailTo = "1801101459@student.buksu.edu.ph";
    $subject = "BuksuGuidance";
    $body = "Thank you for requesting! <br> Please wait for email approval. <br> Thank you and God Bless <br><br> University Guidance Office";

    $mail = new PHPMailer\PHPMailer\PHPMailer();

    $mail->SMTPDebug = 3;
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
    $mail->addAddress($mailTo, "GuidanceOffice");
    $mail->isHTML(true);
    $mail->Subject = "Counseling Request";
    $mail->Body = $body;
    $mail->AltBody = "text version";

    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message Has Been Sent";
    }
}

//referral notification
if (isset($_POST['emailreferral'])) {

    $fname = $_POST['name'];
    $femail = $_POST['email'];
    $fcollege = $_POST['college_of'];
    $fyearlevel = $_POST['year_level'];
    $fcourse = $_POST['course'];
    $fage = $_POST['age'];
    $fgender = $_POST['gender'];
    $fpreferredmode = $_POST['preferred_mode'];
    $fphone = $_POST['phone_number'];
    $ffacebook = $_POST['facebook_name'];
    $fpreferredtime = $_POST['preferred_time'];
    $freferer = $_POST['referrer'];
    $freason = $_POST['reason'];
    $fdateprefer = $_POST['preferred_date'];

    $sql = "INSERT INTO `referral_counseling`(`name`, `email`, `college_of`, `year_level`, `course`, `age`, `gender`, `preferred_mode`, `phone_number`, `facebook_name`, `preferred_time`, `referrer`, `reason_for_referral`, `date_prefer`) VALUES ('$fname', '$femail', '$fcollege', '$fyearlevel','$fcourse', '$fage', '$fgender', '$fpreferredmode', '$fphone', '$ffacebook', '$fpreferredtime', '$freferer', '$freason', '$fdateprefer')";
    $con->query($sql) or die($con->error);

    echo header("Location: index.php");

    $mailTo = $_POST['email'];
    // $mailTo = "1801101459@student.buksu.edu.ph";
    $subject = "BuksuGuidance";
    $body = "Thank you for requesting! <br> Please wait for email approval. <br> Thank you and God Bless <br><br> University Guidance Office";

    $mail = new PHPMailer\PHPMailer\PHPMailer();

    $mail->SMTPDebug = 3;
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
    $mail->addAddress($mailTo, "GuidanceOffice");
    $mail->isHTML(true);
    $mail->Subject = "Referral Request";
    $mail->Body = $body;
    $mail->AltBody = "text version";

    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message Has Been Sent";
    }
}

//testing notification
if (isset($_POST['emailtesting'])) {

    $fname = $_POST['name'];
    $email = $_POST['email'];
    $fage = $_POST['age'];
    $fcourse = $_POST['course'];
    $fyearlevel = $_POST['year_level'];
    $fgender = $_POST['gender'];
    $fpurpose = $_POST['purpose'];
    $fnewlyhired = $_POST['newly_hired'];
    $fdateprefer = $_POST['preferred_date'];
    $sql = "INSERT INTO `testing_service`( `name`, `email`,`age`, `course`, `year_level`, `gender`, `purpose`, `option_for_newly_hired`,  `date_prefer` ) VALUES ('$fname','$email','$fage','$fcourse','$fyearlevel','$fgender','$fpurpose', '$fnewlyhired','$fdateprefer')";
    $con->query($sql) or die($con->error);

    echo header("Location: index.php");

    $mailTo = $_POST['email'];
    // $mailTo = "1801101459@student.buksu.edu.ph";
    $subject = "BuksuGuidance";
    $body = "Thank you for requesting! <br> Please wait for email approval. <br> Thank you and God Bless <br><br> University Guidance Office";

    $mail = new PHPMailer\PHPMailer\PHPMailer();

    $mail->SMTPDebug = 3;
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
    $mail->addAddress($mailTo, "GuidanceOffice");
    $mail->isHTML(true);
    $mail->Subject = "Testing Request";
    $mail->Body = $body;
    $mail->AltBody = "text version";

    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message Has Been Sent";
    }
}

//exit interview notification
if (isset($_POST['emailexit'])) {

    $fname = $_POST['name'];
    $email = $_POST['email'];
    $fage = $_POST['age'];
    $fcourse = $_POST['course'];
    $fyearlevel = $_POST['year_level'];
    $fgender = $_POST['gender'];
    $fpurpose = $_POST['purpose'];
    $fnewlyhired = $_POST['newly_hired'];
    $fdateprefer = $_POST['preferred_date'];
    $sql = "INSERT INTO `testing_service`( `name`, `email`,`age`, `course`, `year_level`, `gender`, `purpose`, `option_for_newly_hired`,  `date_prefer` ) VALUES ('$fname','$email','$fage','$fcourse','$fyearlevel','$fgender','$fpurpose', '$fnewlyhired','$fdateprefer')";
    $con->query($sql) or die($con->error);

    echo header("Location: index.php");

    $mailTo = $_POST['email'];
    // $mailTo = "1801101459@student.buksu.edu.ph";
    $subject = "BuksuGuidance";
    $body = "Please print the file and pass to the Guidance office. <br> Thank you and God Bless <br><br> University Guidance Office";

    $mail = new PHPMailer\PHPMailer\PHPMailer();

    $mail->SMTPDebug = 3;
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
    $mail->addAddress($mailTo, "GuidanceOffice");
    $mail->isHTML(true);
    $mail->Subject = "Exit Interview";
    $mail->Body = $body;
    $mail->AltBody = "text version";

    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message Has Been Sent";
    }
}
