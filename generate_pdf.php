<?php

namespace Dompdf;

use Dompdf\Dompdf as PDF;
use Dompdf\Options as Options;

require_once 'dompdf/autoload.inc.php';

include_once("connections/connection.php");
$con = connection();

//for phpmailer
require("PHPMailer/src/PHPMailer.php");
require("PHPMailer/src/SMTP.php");

if (isset($_POST['downloadpdf'])) {
   $fname = $_POST['name'];
   $email = $_POST['email'];
   $fage = $_POST['age'];
   $fgender = $_POST['gender'];
   $college = $_POST['college'];
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

   $dompdf = new Dompdf(array('enable_remote' => true));
   $dompdf->setbasepath(realpath('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/'));
   $image = '<img src="/img/logo.png" />';
   $dompdf->loadHtml('
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>BukSU Guidance Office</title>
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
      <link rel="stylesheet" type="text/css" href="assets/plugins/fontawesome/css/all.min.css">
      <link rel="stylesheet" href="assets/css/feathericon.min.css">
      <link rel="stylesheet" href="assets/plugins/morris/morris.css">
      <link rel="stylesheet" href="assets/css/style.css"> 
   <style type="text/css">
      .body{
         padding: 0;
         
      }
      h2{
         margin:0;
      }
      a{
         color: blue;
      }
      
   </style>
</head>
<body>
<img style="float: left; width: 75px; height: 65px;" src="img/logo.png" />
<div>
   <p align="center; margin:0;"><b>BUKIDNON STATE UNIVERSITY<b></p>
   <p align="center; margin:0;">Malaybalay City, Bukidnon 8700</p>
   <p align="center; margin:0;">Tel (088) 813-5661 to 5663; TelFax (088) 813-2717, <a>www.buksu.edu.ph</a></p>
   <p align="center; font-size: 20px; margin:0;">
      <b>Exit Interview for Graduation Student</b>
   </p>
</div>

<table align="left">
   <tbody>
   <tr>
      <td>Name: ' . $_POST['name'] . '
      <b style="float: right;">Date: ' . $_POST['date'] . '</b> </td>   
   </tr>
   <tr>
      <td>Age: ' . $_POST['age'] . '</td>
   </tr>
   <tr>
      <td>Gender: ' . $_POST['gender'] . '</td>
   </tr>
   <tr>
      <td>Course: ' . $_POST['course'] . '</td>
   </tr>
   </tbody>
   <br>
   <thead >
   <label><b>I. Personal Learning Experience</b></label>
   </thead>
   <tbody>
      <tr>
         <td style="justify-content:center;">
            1. <i>What was the best part of your learning experience in BuKSU? Why?</i>
         </td>        
      </tr>
      <tr>
         <td style="justify-content:center;">' . $_POST['best_part'] . '</td>
      </tr>
      <tr>
         <td style="justify-content:center;">
            2. <i>What was the worst part of your learning experience in BuKSU? Why?</i>
         </td>
      </tr>
      <tr>
         <td style="justify-content:center;">' . $_POST['worst_part'] . '</td>
      </tr>
      <tr>
         <td style="justify-content:center;">
            3. <i>What did you like best about your college/department?</i>
         </td>
      </tr>
      <tr>
         <td style="justify-content:center;">' . $_POST['like_best'] . '</td>
      </tr>
      <tr>
         <td style="justify-content:center;">
            4. <i>What did you like least about your college/department?</i>
         </td>
      </tr>
      <tr>
         <td style="justify-content:center;">' . $_POST['like_least'] . '</td>
      </tr>
   </tbody>
   <br>
   <thead>
   <label><b>II. Future Plan</b></label>
   </thead>
   <tbody>
      <tr>
         <td style="justify-content:center;">
            1. <i>What are your immediate plans? Employment or continue education? 
            If education, what is your goal?</i>
         </td>
      </tr>
      <tr>
         <td style="justify-content:center;">' . $_POST['immediateplan'] . '</td>
      </tr>
      <tr>
         <td style="justify-content:center;">
            2. <i>What is your long-term employment goal?</i>
         </td>
      </tr>
      <tr>
         <td style="justify-content:center;">' . $_POST['long_term_goal'] . '</td>
      </tr>
   </tbody>
   <br>
   <thead>
   <label><b>Contact Information</b></label>
   </thead>
   <tbody>
      <tr>
         <td>Home Address: ' . $_POST['home_address'] . ' </td>
      <tr>
         <td>Phone Number: ' . $_POST['phone_number'] . ' </td>
      </tr>
      <br><br>
      <tr>
         <td>
            <p style="margin: 0;">________________________</p><
         /td>
      </tr>
      <tr>
         <td>
            <p style="margin: 0;">Signature Over Printed Name</p>
         </td>
      </tr>
   </tbody>
</table>

<br><br>
<div>
   <strong>
      <label>Document Code:______   </label>
      <label>Revision No:______  </label>
      <label>Issue No:_______ </label>
      <label>Issue Date:______   </label>
      <label>Page ___/___</label>
   </strong>
</div>
</body>');
   $dompdf->setPaper('A4', 'portrait');
   $dompdf->render();
   $dompdf->stream("Exit Interview", array("Attachment" => false));
   // exit(0);
   $options = new Options();
   $options->set('isHtml5ParserEnabled', true);
   $options->set('isRemoteEnabled', TRUE);
   $dompdf = new Dompdf($options);
   $contxt = stream_context_create([
      'ssl' => [
         'verify_peer' => FALSE,
         'verify_peer_name' => FALSE,
         'allow_self_signed' => TRUE
      ]
   ]);
   $dompdf->setHttpContext($contxt);
?>
<?php } ?>