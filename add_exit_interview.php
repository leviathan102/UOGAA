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


   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script type="text/javascript">
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
         width: 100%;
         height: fit-content;
         border-radius: 6px;
         padding: 30px;
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
         height: 1200px;
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
         width: calc(100% / 3 - 10px);
         flex-direction: column;
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
            overflow-x: scroll;
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
      $date = $_POST['date'];
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
                                 '$fgender', '$college', '$fcourse','$date',
                                  '$fbestpart', '$fworstpart', '$flikebest', '$flikeleast', 
                                 '$fimmediateplan', '$flongtermgoal', '$fhomeaddress', '$fphone')";
      $con->query($sql) or die($con->error);

      $servicereq = 'Exit Interview';
      $sql16 = "INSERT INTO `students_table`(`name`, `email`, `college`,
      `course`, `age`, `gender`, `phonenumber`, 
      `servicerequested`, `bestpart`, `worstpart`, `likebest`, 
      `likeleast`, `immediateplan`, `longtermgoal`, `homeaddress`)
            VALUES ('$fname', '$email', '$college', '$fcourse', '$fage', '$fgender', '$fphone',
                     '$servicereq','$fbestpart', '$fworstpart', '$flikebest', '$flikeleast', 
                     '$fimmediateplan', '$flongtermgoal', '$fhomeaddress')";
      $con->query($sql16) or die($con->error);

      // send email notification
      $mailTo = $_POST['email'];
      // $mailTo = "1801101459@student.buksu.edu.ph";
      $subject = "BuksuGuidance";
      $body = " A Blessed Day, $fname! <br><br> 
                     Thank you for your Entry in Exit Interview. <br><br> 
                     God Bless on your life journey. 
                     <br> Thank you and God Bless. <br><br>                                     
                     <br> University Guidance Office";

      $mail = new PHPMailer\PHPMailer\PHPMailer();

      // $mail->SMTPDebug = 3;
      $mail->isSMTP();

      // $mail->Host = "mail.smtp2go.com";

      $mail->Host = "smtp.gmail.com";

      $mail->SMTPAuth = true;
      $mail->Username = "1801101459@student.buksu.edu.ph";
      $mail->Password = "nluawtnhhfdmgzvt";
      $mail->SMTPSecure = "tls";
      $mail->Port = "587";

      // $mail->Port = "2525";
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
            <input type="hidden" name="date" value="<?php echo $date; ?>">
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

   <?php } ?>

   <?php
   if (isset($_POST["add_exit_interview"])) { ?>
      <div class="container">
         <header>
            Exit Interview Form (Graduating Students)
         </header>

         <?php
         $filter = $_POST["college_of"];
         $sql4 = "SELECT * FROM courses_list 
            WHERE college='$filter' ORDER by name ASC";
         $college = $con->query($sql4) or die($con->error);
         $row4 = $college->fetch_assoc();
         if (isset($_POST['college_of'])) {
         ?>
            <form action="add_exit_success.php" method="post">
               <div class="form first">
                  <div class="details personal">
                     <span class="title">Please fill up</span>

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
                           <label for="">College</label>
                           <select name="college_of" id="college_of" class="form-control" type="text" required>
                              <?php
                              if ($_POST["college_of"] != null) {
                              ?>
                                 <option><?php echo $_POST["college_of"] ?></option>
                              <?php } ?>
                           </select>
                        </div>

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
                              } while ($row4 = $college->fetch_assoc()) ?>
                           </select>
                        </div>

                        <div class="input-field">
                           <label for="">Date Today</label>
                           <input required name="date" id="" type="date" class="form-control">
                        </div>

                        <div class="fields">
                           <div class="input-field">
                              <label for="">I. Personal Learning Experience</label>
                              <label>1. What was the best part of your learning experience in BuKSU? Why?
                              </label>
                              <textarea name="best_part" id="" cols="40" rows="10" required>
                                 </textarea>
                           </div>

                           <div class="input-field">
                              <label for=""></label><br>
                              <label>2. What was the worst part of your learning experience in BuKSU? Why?</label>
                              <textarea name="worst_part" id="" cols="40" rows="10" required></textarea>
                           </div>

                           <div class="input-field">
                              <label for=""></label><br><br>
                              <label>3. What did you like best about your college/department?</label>
                              <textarea name="like_best" id="" cols="40" rows="10" required></textarea>
                           </div>

                           <div class="input-field">
                              <label for=""></label><br>
                              <label>4. What did you like least about your college/department?</label>
                              <textarea name="like_least" id="" cols="40" rows="10" required></textarea>
                           </div>

                           <div class="input-field">
                              <label>II. Future Plan</label>
                              <label>1. What are your immediate plans? Employment or continue education? If education, what is your goal?</label>
                              <textarea name="immediateplan" id="" cols="40" rows="10" required></textarea>
                           </div>

                           <div class="input-field">
                              <label for=""></label><br>
                              <label>2. What is your long-term employment goal?</label>
                              <textarea name="long_term_goal" id="" cols="40" rows="10" required></textarea>
                           </div>
                        </div>

                        <div class="input-field">
                           <label style="font-size: larger;">III. Contact Information =================></label>
                        </div>

                        <div class="input-field">
                           <input type="text" name="home_address" class="form-control" placeholder="Home Address" required>
                        </div>

                        <div class="input-field">
                           <input type="number" name="phone_number" class="form-control" placeholder="Phone Number" required>
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
                     <button id="nxtBtn" role="button" name="emailexitinterview" value="Submit Form" class="btn btn-success btn-block">
                        <span class="btnText"> Submit</span>
                        <i class="uil uil-navigator"></i>
                     </button>
                  </div>
               </div>
            </form>
         <?php
         }
         ?><br>
         <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.php" aria-expanded="false">
            <i class="fa fa-home" style="color: blue;"></i>
            <span class="hide-menu"><b>Back to Home</b></span>
         </a>
      </div>
   <?php } ?>

   <script src="assets/js/jquery-3.5.1.min.js"></script>
   <script src="assets/js/popper.min.js"></script>
   <script src="assets/js/bootstrap.min.js"></script>
   <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
   <script src="assets/js/script.js"></script>

</body>

</html>