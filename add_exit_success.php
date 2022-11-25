<?php
include_once("connections/connection.php");
$con = connection();

//for phpmailer
require("PHPMailer/src/PHPMailer.php");
require("PHPMailer/src/SMTP.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BukSU Guidance Office | Exit Interview</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/icons8-user-64.png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/feathericon.min.css">
    <link rel="stylesheet" href="assets/plugins/morris/morris.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="css/style.css">

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
            height: 1300px;
            background-color: #fff;
            overflow: hidden;
        }

        .containeremail form {
            position: relative;
            height: 1300px;
            overflow: hidden;
        }

        .containeremail p {
            align-items: center;
            text-align: center;
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

</head>

<body id="formcounseling">
    <?php
    if (isset($_POST['emailexitinterview'])) {
        $fname = $_POST['name'];
        $email = $_POST['email'];
        $fage = $_POST['age'];
        $fgender = $_POST['gender'];
        $college = $_POST['college_of'];
        $fcourse = $_POST['course'];
        $datepref = $_POST['date'];
        $fbestpart = $_POST['best_part'];
        $fworstpart = $_POST['worst_part'];
        $flikebest = $_POST['like_best'];
        $flikeleast = $_POST['like_least'];
        $fimmediateplan = $_POST['immediateplan'];
        $flongtermgoal = $_POST['long_term_goal'];
        $fhomeaddress = $_POST['home_address'];
        $fphone = $_POST['phone_number'];
        $sql = "INSERT INTO `exit_interview`( `name`, 
                                 `email`, `age`, `gender`, 
                                 `college`, `course`,`select_date`, `best_part`, `worst_part`, 
                                 `like_best`, `like_least`, `immediate_plans`, 
                                 `long_term_goal`, `home_address`, `phone_number`) 
                                 VALUES ('$fname', '$email', '$fage', 
                                 '$fgender', '$college', '$fcourse','$datepref',
                                  '$fbestpart', '$fworstpart', '$flikebest', '$flikeleast', 
                                 '$fimmediateplan', '$flongtermgoal', '$fhomeaddress', '$fphone')";
        $con->query($sql) or die($con->error);

        $servicereq = 'Exit Interview';
        $yearlev = 'notset';
        $prefmode ='notset';
        $facebook = 'notset';
        $time = 'notset';
        $date = 'notset';
        $referrer = 'notset';
        $reason = 'notset';
        $otherreason = 'notset';
        $purpose = 'notset';
        $newhired = 'notset';
        $sql16 = "INSERT INTO `students_table`(`name`, `email`, `college`,`yearlevel`,
      `course`, `age`, `gender`,`preferredmode`, `phonenumber`,`facebook`, `preferredtime`,`referreddate`, `referrer`, `reason`, `otherreason`,`purpose`, `newlyhired`, 
      `servicerequested`, `bestpart`, `worstpart`, `likebest`, 
      `likeleast`, `immediateplan`, `longtermgoal`, `homeaddress`)
            VALUES ('$fname', '$email', '$college','$yearlev', '$fcourse', '$fage', '$fgender', '$prefmode','$fphone','$facebook','$time','$date','$referrer','$reason','$otherreason',
                     '$servicereq','$fbestpart', '$fworstpart', '$flikebest', '$flikeleast', 
                     '$purpose','$newhired','$fimmediateplan', '$flongtermgoal', '$fhomeaddress')";
        $con->query($sql16) or die($con->error);

        $mailTo = $_POST['email'];
        $subject = "BuksuGuidance";
        $body = " A Blessed Day, $fname! <br><br> 
                     Thank you for your Entry in Exit Interview. <br><br> 
                     God Bless on your life journey. 
                     <br> Thank you and God Bless. <br><br>                                     
                     <br> University Guidance Office";

        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";

        $mail->SMTPAuth = true;
        $mail->Username = "1801101459@student.buksu.edu.ph";
        $mail->Password = "nluawtnhhfdmgzvt";
        $mail->SMTPSecure = "tls";
        $mail->Port = "587";
        $mail->From = "1801101459@student.buksu.edu.ph";
        $mail->FromName = "BUKSUGuidanceOffice";
        $mail->addAddress($mailTo, "");
        $mail->isHTML(true);
        $mail->Subject = "Exit Interview";
        $mail->Body = $body;
        $mail->AltBody = "text version";

        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }

    ?>
        <div class="containeremail">

            <p style="background-color: white; padding:8px;margin-top: 50%; align-items:center"><br>
                <img class="img-fluid" src="assets/img/R.png" alt="Logo" style="height: 20vh;"><br><br>
                <b style="background-color: white;  padding: 10px">
                    Exit Interview Form (Graduating Students)
                </b><br><br>
                <i class="fa fa-check" style="color: green; text-align:center;"></i>
                <b style="color: green; text-align:center; "> Your Information has been Saved!</b>
            <form action="generate_pdf.php" method="post">
                <button class="btn btn-primary btn-block" style="color: white; border-color: white;" type="submit" name="downloadpdf">
                    <i class="fa fa-download" style="color: green; align-items:center;"></i>
                    Download PDF
                </button><br>
                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.php" aria-expanded="false">
                    <i class="fa fa-home" style="color: blue;"></i>
                    <span class="hide-menu"><b style="color: white;"> Back to Home</b></span>
                </a>
                </p>
                <input type="hidden" name="name" value="<?php echo $fname; ?>">
                <input type="hidden" name="email" value="<?php echo $email; ?>">
                <input type="hidden" name="age" value="<?php echo $fage; ?>">
                <input type="hidden" name="gender" value="<?php echo $fgender; ?>">
                <input type="hidden" name="college" value="<?php echo $college; ?>">
                <input type="hidden" name="course" value="<?php echo $fcourse; ?>">
                <input type="hidden" name="date" value="<?php echo $datepref; ?>">
                <input type="hidden" name="best_part" value="<?php echo $fbestpart; ?>">
                <input type="hidden" name="worst_part" value="<?php echo $fworstpart; ?>">
                <input type="hidden" name="like_best" value="<?php echo $flikebest; ?>">
                <input type="hidden" name="like_least" value="<?php echo $flikeleast; ?>">
                <input type="hidden" name="immediateplan" value="<?php echo $fimmediateplan; ?>">
                <input type="hidden" name="long_term_goal" value="<?php echo $flongtermgoal; ?>">
                <input type="hidden" name="home_address" value="<?php echo $fhomeaddress; ?>">
                <input type="hidden" name="phone_number" value="<?php echo $fphone; ?>">
            </form>

        </div>

    <?php
    }
    ?>

    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.php" aria-expanded="false">
        <i class="fa fa-home" style="color: blue;"></i>
        <span class="hide-menu"><b>Back to Home</b></span>
    </a>
    </div>

    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/js/script.js"></script>

</body>

</html>