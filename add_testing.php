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

//for testing purpose list
$sql3 = "SELECT * FROM testing_purpose_list ORDER BY name ASC";
$appointment3 = $con->query($sql3) or die($con->error);
$row3 = $appointment3->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>BukSU Guidance Office | Testing Appointment</title>
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
         if (state == "Student") {
            document.getElementById("name").style.visibility = 'visible';

         } else {
            document.getElementById("name").style.visibility = 'hidden';

         }
      }

      function changeDropdownPurpose() {
         var state = document.getElementById("mySelectPurpose").value;
         if (state == "Newly Hired") {
            document.getElementById("purposename").style.visibility = 'visible';

         } else {
            document.getElementById("purposename").style.visibility = 'hidden';

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
         min-height: 650px;
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
         Testing Appointment Form
      </header>
      <?php
      //testing notification
      if (isset($_POST['emailtesting'])) {

         $fname = $_POST['name'];
         $email = $_POST['email'];
         $fage = $_POST['age'];
         $fcollege = $_POST['college_of'];
         $fcourse = $_POST['course'];
         $fyearlevel = $_POST['year_level'];
         $fgender = $_POST['gender'];
         $fpurpose = $_POST['purpose'];
         $fnewlyhired = $_POST['newly_hired'];
         $fstatus = $_POST['status'];
         $sql = "INSERT INTO `testing_service`( `name`,
                            `email`,`age`, `college_of`, `course`, `year_level`, 
                            `gender`, `purpose`, `option_for_newly_hired`, `status` ) 
                            VALUES ('$fname','$email',
                            '$fage','$fcollege','$fcourse','$fyearlevel','$fgender',
                            '$fpurpose', '$fnewlyhired', '$fstatus')";
         $con->query($sql) or die($con->error);

         $servicereq = 'Testing Appointment';
         $sql16 = "INSERT INTO 
                `students_table`(`name`, `email`, 
                `college`, `yearlevel`, `course`, 
                `gender`,`servicerequested`,`purpose`, `newlyhired`) 
                VALUES ('$fname','$email','$fcollege','$fyearlevel','$fcourse','$fgender'
                            ,'$servicereq','$fpurpose', '$fnewlyhired')";
         $con->query($sql16) or die($con->error);

         //send email notification
         $mailTo = $_POST['email'];
         // $mailTo = "1801101459@student.buksu.edu.ph";
         $subject = "BuksuGuidance";
         $body = " A Blessed Day, $fname! <br><br> 
                           Thank you for your Testing Request ($fpurpose) <br><br> 
                           Please wait for Confirmation Email. 
                           <br> Thank you and God Bless <br><br> 
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
         $mail->Subject = "Testing Request";
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
      if (isset($_POST["add_testing"])) {
         $filter = $_POST["college_of"];
         $sql4 = "SELECT * FROM courses_list 
                                        WHERE college='$filter' ORDER by name ASC";
         $college = $con->query($sql4) or die($con->error);
         $row4 = $college->fetch_assoc();
         if (isset($_POST['college_of'])) {
      ?>
            <form action="add_testing_success.php" method="post">
               <div class="form first">
                  <div class="details personal">
                     <span class="title">Personal Details</span>

                     <div class="fields">
                        <div class="input-field">
                           <label for="">Full Name</label>
                           <input type="text" name="name" class="form-control" placeholder="Full Name" required>
                        </div>

                        <div class="input-field">
                           <label for="">Email</label>
                           <input type="text" name="email" class="form-control" placeholder="Email" required>
                        </div>

                        <div class="input-field">
                           <label for="">Age</label>
                           <input type="number" name="age" class="form-control" placeholder="Age" required>
                        </div>

                        <div class="input-field">
                           <label for="">Gender</label>
                           <select type="text" name="gender" class="form-control" required>
                              <option></option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                              <option value="Prefer Not to Say">Prefer Not to Say</option>
                           </select>
                        </div>

                        <div class="input-field">
                           <label for="">Role</label>
                           <select style="width: 100%;" name="if_student" id="mySelect" onchange="changeDropdown(this.value);" aria-label="Floating label select example" required>
                                 <option value="notset" disabled selected>---Select---</option>
                                 <option value="Student">Student</option>
                                 <option value="Instructor">Instructor</option>
                                 <option value="Counselor">Counselor</option>
                                 <option value="Employee">Employee</option>
                                 <option value="Staff">Staff</option>
                           </select>
                        </div>

                        <div class="input-field">
                              <label for="">College/Program/Association</label>
                              <select name="college_of" id="college_of" class="form-control" type="text" required>
                                 <?php
                                 if ($_POST["college_of"] != null) {
                                 ?>
                                    <option><?php echo $_POST["college_of"] ?></option>
                                 <?php } ?>
                              </select>
                        </div>
                        <?php 
                        if ($_POST["college_of"] != 'Non-Teaching Employee Association') { ?>
                        <div class="input-field">
                              <label for="">Course/Program name</label>
                              <select name="course" required style="width: 100%;">
                                 <option value=""></option>
                                 <?php

                                 do {
                                    if ($row4 != null) {
                                 ?>
                                       <option style="font-size: 12px;"><?php echo $row4['name'] ?></option>
                                 <?php }
                                 } while ($row4 = $college->fetch_assoc());
                                 ?>
                              </select>
                        </div>
                        <?php } else { ?>
                        <input type="hidden" name="course" class="form-control" value="N/A">
                        <?php } if ($_POST["college_of"] != 'Non-Teaching Employee Association') { ?>
                        <div class="input-field">
                              <label for="">Year Level</label>
                              <select name="year_level" class="form-control" type="text">
                                 <option selected value="year Level"></option>
                                 <option value="1st Year">1st Year</option>
                                 <option value="2nd Year">2nd Year</option>
                                 <option value="3rd Year">3rd Year</option>
                                 <option value="4th Year">4th Year</option>
                              </select>
                        </div>
                        <?php } else { ?>
                        <input type="hidden" name="year_level" class="form-control" value="N/A">
                        <?php } ?>
                        <div class="input-field">
                           <label for="">Purpose</label>
                           <select required style="width: 100%;" name="purpose" class="form-control" id="mySelectPurpose" onchange="changeDropdownPurpose(this.value);" aria-label="Floating label select example">
                              <option value=""></option>
                              <?php
                              do {
                                 if ($row3 != null) {
                              ?>
                                    <option style="font-size: 12px;"><?php echo $row3['name'] ?></option>
                              <?php }
                              } while ($row3 = $appointment3->fetch_assoc()) ?>
                           </select>
                        </div>

                        <div id="purposename" class="input-field">
                           <label for="">For Newly Hired</label>
                           <select name="newly_hired" id="newly_hired" style="width: 100%;">
                              <option></option>
                              <option>Teaching, Main Campus</option>
                              <option>Non-Teaching, Main Campus</option>
                              <option>Teaching, Satellite</option>
                              <option>Non-Teaching, Satellite</option>
                           </select>
                        </div>

                        <div class="input-field">
                           <input type="hidden" required name="status" placeholder="Status" value="noaction">
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
                     <button id="nxtBtn" role="button" name="emailtesting" value="Submit Form" class="btn btn-success btn-block">
                        <span class="btnText"> Submit</span>
                        <i class="uil uil-navigator"></i>
                     </button>
                  </div>
               </div>
            </form>
      <?php
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