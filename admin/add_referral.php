<?php
include_once("connections/connection.php");
$con = connection();

//for phpmailer
require("PHPMailer/src/PHPMailer.php");
require("PHPMailer/src/SMTP.php");

//for course list
$sql2 = "SELECT * FROM courses_list ORDER BY college ASC";
$appointment2 = $con->query($sql2) or die($con->error);
$row2 = $appointment2->fetch_assoc();

//referral reason
$sql3 = "SELECT * FROM referral_reason_list ORDER BY name ASC";
$appointment3 = $con->query($sql3) or die($con->error);
$row3 = $appointment3->fetch_assoc();

//referral
$sql7 = "SELECT * FROM referral_date ORDER BY id DESC";
$datereferral = $con->query($sql7) or die($con->error);
$row7 = $datereferral->fetch_assoc();
$sql8 = "SELECT * FROM referral_time ORDER BY id DESC";
$datereferral2 = $con->query($sql8) or die($con->error);
$row8 = $datereferral2->fetch_assoc();


?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>BukSU Guidance Office | Referral Counseling Appointment</title>
   <link rel="shortcut icon" type="image/x-icon" href="assets/img/icons8-user-64.png">
   <link rel="stylesheet" href="assets/css/bootstrap.min.css">
   <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
   <link rel="stylesheet" type="text/css" href="assets/plugins/fontawesome/css/all.min.css">
   <link rel="stylesheet" href="assets/css/feathericon.min.css">
   <link rel="stylesheet" href="assets/plugins/morris/morris.css">
   <link rel="stylesheet" href="assets/css/style.css">
   <link rel="stylesheet" href="css/style.css">


   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script type="text/javascript">
      function changeDropdown() {
         var state = document.getElementById("mySelect").value;
         if (state == "Call and Text") {
            document.getElementById("name").style.visibility = 'hidden';
            document.getElementById("number").style.visibility = 'visible';
            document.getElementById("time").style.visibility = 'visible';
         } else if (state == "Video Call") {
            document.getElementById("time").style.visibility = 'visible';
            document.getElementById("name").style.visibility = 'visible';
            document.getElementById("number").style.visibility = 'hidden';
         } else if (state == "Face to Face") {
            document.getElementById("time").style.visibility = 'visible';
            document.getElementById("name").style.visibility = 'hidden';
            document.getElementById("number").style.visibility = 'hidden';
         } else {
            document.getElementById("time").style.visibility = 'visible';
            document.getElementById("name").style.visibility = 'visible';
            document.getElementById("number").style.visibility = 'visible';
         }
      }

      function changeDropdownOtherReason() {
         var state = document.getElementById("mySelectOtherReason").value;
         if (state == "Other Reason") {
            document.getElementById("otherreason").style.visibility = 'visible';
         } else {
            document.getElementById("otherreason").style.visibility = 'hidden';
         }
      }

      function show() {
         console.log("show");
         document.getElementById("dialog").showModal();
      }

      function performClose() {
         console.log("Closing");
         document.getElementById("dialog").close();
      }

      //for hiding button
      $(document).ready(function() {

         $('#nxtBtn').hide();
         $(' input[type="checkbox"]').on('change', function() {
            var count = 0;
            $(' input[type="checkbox"]').each(function() {
               if ($(this).prop('checked')) {
                  count++;
                  return;
               }

            })
            if (count > 0) {
               $('#nxtBtn').show();
            } else {
               $('#nxtBtn').hide();
            }
         });
      });
   </script>
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
         min-height: 720px;
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

</head>

<body id="formcounseling">

   <div class="container">
      <header>
         Referral Counseling Appointment Form
      </header>
      <?php
      //referral notification
      if (isset($_POST['emailreferral'])) {
         $fname = $_POST['name'];
         $femail = $_POST['email'];
         $fcollege = $_POST['college_of'];
         $fyearlevel = $_POST['year_level'];
         $fcourse = $_POST['course'];
         $fgender = $_POST['gender'];
         $fpreferredmode = $_POST['preferred_mode'];
         $fphone = $_POST['phone_number'];
         $ffacebook = $_POST['facebook_name'];
         $fpreferredtime = $_POST['preferred_time'];
         $freferer = $_POST['referrer'];
         $freason = $_POST['reason'];
         $fotherreason = $_POST['otherreason'];
         $fdateprefer = $_POST['preferred_date'];
         $fstatus = $_POST['status'];
         $refage = 'notset';
         $refroom = 'notset';
         $refcater = 'notset';
         $refoutcome = 'notset';
         $sql = "INSERT INTO `referral_counseling`(`name`, `email`, `college_of`, `year_level`, `course`, `age`, `gender`,`preferred_mode`, `phone_number`, `facebook_name`, `preferred_time`, `referrer`, `reason_for_referral`, `other_reason`, `date_prefer`, `room`, `catered_by`, `status`, `outcome`) VALUES ('$fname','$femail', '$fcollege', '$fyearlevel','$fcourse','$refage','$fgender', '$fpreferredmode', '$fphone','$ffacebook', '$fpreferredtime', '$freferer','$freason', '$fotherreason', '$fdateprefer','$refroom','$refcater', '$fstatus','$refoutcome')";
         $con->query($sql) or die($con->error);

         $servicereq = 'Referral Counseling Appointment';
         $refbest = 'notset';
         $refworst = 'notset';
         $reflikebest = 'notset';
         $reflikeleast = 'notset';
         $refplan = 'notset';
         $reftermgoal = 'notset';
         $refaddress = 'notset';
         $refpurpose = 'notset';
         $refnewlyhired = 'notset';
         $sql16 = "INSERT INTO `students_table`(`name`, `email`, `college`, `yearlevel`, `course`, `age`, `gender`, `preferredmode`, `phonenumber`, `facebook`, `preferredtime`, `servicerequested`, `referreddate`, `referrer`, `reason`, `otherreason`, `bestpart`, `worstpart`, `likebest`, `likeleast`, `immediateplan`, `longtermgoal`, `homeaddress`, `purpose`, `newlyhired`) VALUES ('$fname','$femail', '$fcollege', '$fyearlevel','$fcourse','$refage','$fgender', '$fpreferredmode', '$fphone','$ffacebook', '$fpreferredtime','$servicereq','$fdateprefer','$freferer','$freason', '$fotherreason','$refbest','$refworst','$reflikebest','$reflikeleast','$refplan','$reftermgoal','$refaddress','$refpurpose','$refnewlyhired')";
         $con->query($sql16) or die($con->error);

         // delete the selected time
         $sql2 = "DELETE FROM referral_time WHERE referral_time = '$fpreferredtime'";
         $con->query($sql2) or die($con->error);

         $sql17 = "SELECT * FROM referral_time ORDER BY id DESC";
         $query_run12 = mysqli_query($con, $sql17);
         $row12 = mysqli_num_rows($query_run12);

         // delete date if no reservation time available
         if ($row12 == '0') {
            $sql22 = "DELETE FROM referral_date";
            $con->query($sql22) or die($con->error);
         }

         // send email notification
         $mailTo = $_POST['email'];
         // $mailTo = "1801101459@student.buksu.edu.ph";
         $subject = "BuksuGuidance";
         $body = "A Blessed Day, $fname! <br><br>
                           You have been refer by <a>$freferer</a>
                           with this reason: $freason $fotherreason<br><br>
                           Please wait for Confirmation Email. 
                           <br> Thank you and God Bless. <br><br> 
                           <br> Best Regard, <br>
                           University Guidance Office";

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
         $mail->Subject = "Referral Counseling";
         $mail->Body = $body;
         $mail->AltBody = "text version";

         if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
         }
      ?>
         <div class="successmessage">
            <p style="text-align: center;"><br>
               <i class="fa fa-check"></i><br>
               <b> Successfully Requested!</b><br>
               Please wait for further instructions send via email.<br>
               Thank you and God Bless.<br><br>
               <a href="index.php">
                  <b style="text-align: center;"> OK</b>
               </a><br><br>
            </p>
         </div>
      <?php } ?>
      <?php
      // college filtering
      if (isset($_POST["add_referral"])) {
         $filter = $_POST["college_of"];
         $sql4 = "SELECT * FROM courses_list 
            WHERE college='$filter' ORDER by name ASC";
         $college = $con->query($sql4) or die($con->error);
         $row4 = $college->fetch_assoc();
         if (isset($_POST['college_of'])) {
            if ($row7 != null && $row8 != null) {
      ?>
               <form action="" method="post">
                  <div class="form first">
                     <div class="details personal">
                        <span class="title">Personal Details</span>

                        <div class="fields">
                           <div class="input-field">
                              <label for="">Refer Name</label>
                              <input type="text" name="name" class="form-control" placeholder="Refer Name" required>
                           </div>

                           <div class="input-field">
                              <label for="">Refer Email</label>
                              <input type="email" name="email" id="email" class="form-control" placeholder="Refer Email" required>
                           </div>

                           <div class="input-field">
                              <label for="">Refer College/Program</label>
                              <select name="college_of" id="college_of" class="form-control" type="text" required>
                                 <?php
                                 if ($_POST["college_of"] != null) {
                                 ?>
                                    <option><?php echo $_POST["college_of"] ?></option>
                                 <?php } ?>
                              </select>
                           </div>

                           <div class="input-field">
                              <label for="">Refer Course/Program name</label>
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

                           <?php if ($_POST['college_of'] != 'Doctoral Programs' && $_POST['college_of'] != 'Masters Degree Programs') { ?>
                              <div class="input-field">
                                 <label>Refer Year Level</label>
                                 <select name="year_level" class="form-control" type="text" required>
                                    <option></option>
                                    <option value="1st Year">1st Year</option>
                                    <option value="2nd Year">2nd Year</option>
                                    <option value="3rd Year">3rd Year</option>
                                    <option value="4th Year">4th Year</option>
                                 </select>
                              </div>
                           <?php } ?>

                           <div class="input-field">
                              <label>Refer Gender</label>
                              <select type="text" name="gender" class="form-control" required>
                                 <option></option>
                                 <option value="Male">Male</option>
                                 <option value="Female">Female</option>
                                 <option value="Prefer Not to Say">Prefer not to say</option>
                              </select>
                           </div>

                           <div class="input-field">
                              <label for="">Preferred Mode</label>
                              <select required name="preferred_mode" class="form-control" id="mySelect" onchange="changeDropdown(this.value);" aria-label="Floating label select example">
                                 <option selected value="0"></option>
                                 <option value="Call and Text">Call and Text</option>
                                 <option value="Video Call">Video Conferencing</option>
                                 <option value="Face to Face">Face to Face</option>
                              </select>
                           </div>

                           <div id="number" class="input-field">
                              <label for="">Phone Number</label>
                              <input name="phone_number" id="phone_number" type="tel" class="form-control" placeholder="Provide Number">
                           </div>

                           <div id="name" class="input-field">
                              <label for="">Facebook Profile Name/Link</label>
                              <input name="facebook_name" id="facebook_name" type="text" class="form-control" placeholder="Provide Facebook Profile Name/Link">
                           </div>

                           <div id="time" class="input-field">
                              <label for="">Preferred Time</label>
                              <select name="preferred_time" class="form-control" type="text" required>
                                 <option value=""></option>
                                 <?php
                                 do {
                                    if ($row8 != null) {
                                 ?>
                                       <option><?php echo $row8['referral_time'] ?></option>
                                    <?php } else { ?>
                                       <option>No Available Time!</option>
                                 <?php }
                                 } while ($row8 = $datereferral2->fetch_assoc()) ?>
                              </select>
                           </div>

                           <div class="input-field">
                              <label for="">Referrer</label>
                              <input type="text" name="referrer" class="form-control" placeholder="Instructor" required>
                           </div>

                           <div class="input-field">
                              <label>Reason For Referral</label>
                              <select required name="reason" class="form-control" style="width: 100%;" id="mySelectOtherReason" onchange="changeDropdownOtherReason(this.value);" aria-label="Floating label select example">
                                 <option value=""></option>
                                 <?php
                                 do {
                                    if ($row3 != null) {
                                 ?>
                                       <option style="font-size: 12px;"><?php echo $row3['name'] ?></option>
                                 <?php }
                                 } while ($row3 = $appointment3->fetch_assoc()) ?>
                                 <option style="font-size: 14px;"><b>Other Reason</b></option>
                              </select>
                           </div>

                           <div class="input-field" id="otherreason">
                              <label>Other Reason</label>
                              <input name="otherreason" type="text" class="form-control" placeholder="Other Reason">
                           </div>

                           <div class="input-field">
                              <label for="">Preferred Date</label>
                              <select name="preferred_date" class="form-control" type="text" required>
                                 <option value=""></option>
                                 <?php
                                 do {
                                    if ($row7 != null) {
                                 ?>
                                       <option><?php echo $row7['referral_date'] ?></option>
                                 <?php }
                                 } while ($row7 = $datereferral->fetch_assoc()) ?>
                              </select>
                           </div>

                           <div class="input-field">
                              <input type="hidden" required name="status" class="form-control" placeholder="Status" value="noaction">
                           </div>
                        </div>
                     </div>
                     <p style="text-align:justify;">
                        By clicking submit,
                        I hereby authorize the
                        Bukidnon State University
                        Guidance Office in the collection,
                        processing, use and storage of
                        the information I have provided.
                        I solely agree that the above
                        information can be access and
                        used by the
                        University Guidance Office Faculty
                        and staff which are included in
                        the process flow of their services
                        in lieu with the transaction I have requested.
                     </p>
                     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
                     <input type="checkbox" name="radio" id="radio" style="cursor:pointer;" required>
                     <label>
                        <b>
                           Agree to Terms and Privacy Conditions
                        </b>
                     </label>
                     <button id="nxtBtn" role="button" name="emailreferral" value="Submit Form" class="btn btn-success btn-block">
                        <span class="btnText">Submit</span>
                        <i class="uil uil-navigator"></i>
                     </button>
                  </div>
               </form>
            <?php } else { ?>
               <h1>
                  No Available Referral Counseling Appointment Please Try Again Later!
                  <button style=" color:white; border:none; align-items:center">
                     <a href="index.php"> OK</a>
                  </button>
               </h1>
      <?php }
         }
      }  ?><br>
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