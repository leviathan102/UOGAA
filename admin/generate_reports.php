<!DOCTYPE html>
<html dir="ltr" lang="en">

<?php include 'includes/header.php';
if (!isset($_SESSION)) {
   session_start();
}

if (isset($_SESSION['UserLogin']) && $_SESSION['Access'] == "Administrator" || $_SESSION['Access'] == "Counselor") {

   include_once("connections/connection.php");
   $con = connection();
   if (isset($_POST['generate_reports'])) {
      $rep1 = $_POST['from'];
      $rep2 = $_POST['to'];
      $collegereport = $_SESSION['College'];
   } else {
      //setting the value to zero if no input detected
      $rep1 = '0';
      $rep2 = '0';
   }

?>

   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>BukSU Guidance Office</title>
      <style type="text/css">
         .body {
            padding: 0;

         }

         .reportsiso {
            padding: 36px;
         }

         table {
            border-collapse: collapse;
            font-size: 12px;
            font-family: sans-serif;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            width: 95%;
         }

         table thead tr {
            background-color: lightcyan;
            color: black;
            text-align: left;
         }

         table thead,
         tr:hover {
            background-color: aqua;
         }

         th,
         td {
            padding: 8px;
            font-family: Arial, Helvetica, sans-serif;
         }

         th,
         td:hover {
            background-color: white;
         }

         tr:nth-child(add) {
            background-color: #3567f1;
         }

         p {
            margin: 0;
         }

         h2 {
            margin: 0;
         }

         h1 {
            text-align: center;
         }

         a {
            color: blue;
            text-decoration-line: underline;
         }

         .reports-form {
            padding-left: 16px;
         }

         #card table,
         th {
            font-size: larger;
            font-weight: bold;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
         }
      </style>
   </head>

   <body>

      <!-- Preloader - style you can find in spinners.css -->
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

         <!-- Page wrapper  -->
         <div class="page-wrapper">

            <!-- Bread crumb and right sidebar toggle -->
            <div class="page-breadcrumb">
               <div class="row align-items-center">
                  <div class="col-5">
                     <h4 class="page-title"><i class="mdi mdi-chart-bar"></i> Reports</h4>
                     <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                           <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#">Home</a></li>
                           </ol>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>

            <!-- Container fluid  -->
            <div class="container-fluid">

               <!-- quarterly report format -->
               <div class="row">
                  <div class="col-12">
                     <div class="card">
                        <div class="reportsiso">
                           <img style="float: left; width: 75px; height: 65px;" src="img/logo.png" />
                           <p style="text-align: center"><b>BUKIDNON STATE UNIVERSITY<b></p>
                           <p style="text-align: center">Malaybalay City, Bukidnon 8700</p>
                           <p style="text-align: center">Tel (088) 813-5661 to 5663; TelFax (088) 813-2717, <a>www.buksu.edu.ph</a></p><br>
                           <h2 style="text-align: center">QUARTERLY ACCOMPLISHMENT REPORT</h2>
                           <p style="text-align: center">Month of &nbsp;<?php echo $rep1 ?>&nbsp;to&nbsp;<?php echo $rep2 ?></p><br>

                           <div class="reports-form">
                              <p>1. Individual Counseling</p>
                              <p>&nbsp;&nbsp; No. of students served</p>
                              <?php
                              $sql26 = "SELECT * 
                              FROM counseling_appointment WHERE added_at 
                              BETWEEN '$rep1' AND '$rep2' AND 
                              status='Approved' AND college_of='$collegereport' 
                              ORDER BY status DESC";
                              $query_run2 = mysqli_query($con, $sql26);
                              $repports24 = mysqli_num_rows($query_run2);

                              $sql25 = "SELECT * 
                                 FROM referral_counseling WHERE added_at 
                                 BETWEEN '$rep1' AND '$rep2' AND 
                                 status='Approved' AND college_of='$collegereport' 
                                 ORDER BY status DESC";
                              $query_run1 = mysqli_query($con, $sql25);
                              $repports23 = mysqli_num_rows($query_run1);

                              $sql27 = "SELECT * 
                              FROM testing_service WHERE added_at 
                              BETWEEN '$rep1' AND '$rep2' AND 
                              status='Approved' AND college_of='$collegereport' 
                              ORDER BY status DESC";
                              $query_run3 = mysqli_query($con, $sql27);
                              $repports25 = mysqli_num_rows($query_run3);

                              $initialcontact = $repports23 + $repports24 + $repports25;
                              ?>
                              <p>&nbsp;&nbsp;&nbsp; a. Initial Contact <b style="color:#3567f1">
                                    <?php echo  $initialcontact; ?></b></p>

                              <?php
                              $sql28 = "SELECT * 
                              FROM counseling_appointment WHERE added_at 
                              BETWEEN '$rep1' AND '$rep2' AND 
                              status='FollowUp' AND college_of='$collegereport' 
                              ORDER BY status DESC";
                              $query_run4 = mysqli_query($con, $sql28);
                              $repports26 = mysqli_num_rows($query_run4);

                              $sql29 = "SELECT * 
                                 FROM referral_counseling WHERE added_at 
                                 BETWEEN '$rep1' AND '$rep2' AND 
                                 status='FollowUp' AND college_of='$collegereport'
                                 ORDER BY status DESC";
                              $query_run5 = mysqli_query($con, $sql29);
                              $repports27 = mysqli_num_rows($query_run5);

                              $sql30 = "SELECT * 
                              FROM testing_service WHERE added_at 
                              BETWEEN '$rep1' AND '$rep2' AND 
                              status='FollowUp' AND college_of='$collegereport'
                              ORDER BY status DESC";
                              $query_run6 = mysqli_query($con, $sql30);
                              $repports28 = mysqli_num_rows($query_run6);

                              $followup = $repports26 + $repports27 + $repports28;
                              ?>
                              <p>&nbsp;&nbsp;&nbsp; b. Follow up <b style="color:#3567f1">
                                    <?php echo  $followup; ?></b></p>
                              <p>&nbsp;&nbsp;&nbsp; c. Faculty Referrals &nbsp;_____</p><br>
                              <p>Common Problems/Reasons for Counseling:</p>
                              <p>_________________________________________________________________________</p><br>
                              <p>2. Group Guidance/ Counseling Issues/ Problems Take up</p>
                              <table>
                                 <thead>
                                    <tr>
                                       <th>[Course & Year]</th>
                                       <th>Date</th>
                                       <th>Clientele</th>
                                       <th># of Attendees
                                       <th>
                                    <tr>
                                 </thead>
                                 <tbody>
                                    <tr>
                                       <td>________________</td>
                                       <td>________________</td>
                                       <td>________________</td>
                                       <td>________________</td>
                                    </tr>
                                 </tbody>
                              </table><br>
                              <p>3. Individual Inventory Service</p>
                              <?php
                              // completed
                              $sql31 = "SELECT * 
                              FROM counseling_appointment WHERE added_at 
                              BETWEEN '$rep1' AND '$rep2' AND 
                              status='Done' AND college_of='$collegereport'
                              ORDER BY status DESC";
                              $query_run7 = mysqli_query($con, $sql31);
                              $repports29 = mysqli_num_rows($query_run7);
                              $sql32 = "SELECT * 
                              FROM referral_counseling WHERE added_at 
                              BETWEEN '$rep1' AND '$rep2' AND 
                              status='Done' AND college_of='$collegereport'
                              ORDER BY status DESC";
                              $query_run8 = mysqli_query($con, $sql32);
                              $repports30 = mysqli_num_rows($query_run8);
                              $sql33 = "SELECT * 
                              FROM testing_service WHERE added_at 
                              BETWEEN '$rep1' AND '$rep2' AND 
                              status='Done' AND college_of='$collegereport'
                              ORDER BY status DESC";
                              $query_run8 = mysqli_query($con, $sql33);
                              $repports31 = mysqli_num_rows($query_run8);
                              $completed = $repports29 + $repports30 + $repports31;
                              ?>
                              <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; No. of Completed <b style="color:#3567f1">
                                    <?php echo  $completed; ?></b></p>
                              <p>Remarks:______________________________________________</p>
                              <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Entry of Psychological Test Result No.____________</p><br>
                              <p>4. Testing/ Survey</p>
                              <table>
                                 <thead>
                                    <tr>
                                       <th>Tests/ Survey Administered</th>
                                       <th>Date</th>
                                       <th>No. of Students</th>
                                    <tr>
                                 </thead>
                                 <tbody>
                                    <tr>
                                       <td>________________</td>
                                       <td>________________</td>
                                       <td>________________</td>
                                    </tr>
                                 </tbody>
                              </table><br>
                              <p>5. Faculty Linkages
                              <p>
                              <table>
                                 <thead>
                                    <tr>
                                       <th>Activity Date</th>
                                       <th>School</th>
                                       <th>Attendance</th>
                                    <tr>
                                 </thead>
                                 <tbody>
                                    <tr>
                                       <td>________________</td>
                                       <td>________________</td>
                                       <td>________________</td>
                                    </tr>
                                    <tr>
                                       <td>________________</td>
                                       <td>________________</td>
                                       <td>________________</td>
                                    </tr>
                                 </tbody>
                              </table><br>
                              <p>6. Case Studies</p>
                              <p>____________________________________________________________</p><br><br>
                              <label>_____________________</label><br>
                              <label style="font-size: 12px ;">Name and Signature</label><br>
                              <label>Guidance Counselor</label><br><br>
                              <table>
                                 <thead>
                                    <tr>
                                       <th>Document Code:</th>
                                       <th>Revision No: </th>
                                       <th>Issue No:</th>
                                       <th>Issue Date:</th>
                                       <th>Page:</th>
                                    <tr>
                                 </thead>
                                 <tbody></tbody>
                              </table>
                           </div><br>
                        </div>
                     </div>
                  </div>
               </div>

               <!-- list the names undergo -->
               <!-- <div class="row">
                  <div class="col-12">
                     <div class="card" style="align-items: center; ">
                        <?php
                        $sql20 = "SELECT id, name FROM counseling_appointment WHERE added_at BETWEEN '$rep1' AND 
                         '$rep2' ORDER BY added_at";
                        $reportscounseling = $con->query($sql20) or die($con->error);
                        $row20 = $reportscounseling->fetch_assoc();

                        $sql21 = "SELECT id, name FROM referral_counseling WHERE added_at BETWEEN '$rep1' AND 
                         '$rep2' ORDER BY added_at";
                        $reportsreferral = $con->query($sql21) or die($con->error);
                        $row21 = $reportsreferral->fetch_assoc();

                        $sql22 = "SELECT id, name FROM testing_service WHERE added_at BETWEEN '$rep1' AND 
                         '$rep2' ORDER BY added_at";
                        $reportstesting = $con->query($sql22) or die($con->error);
                        $row22 = $reportstesting->fetch_assoc();

                        $sql23 = "SELECT id, name FROM testing_service WHERE added_at BETWEEN '$rep1' AND 
                         '$rep2' ORDER BY added_at";
                        $reportsexit = $con->query($sql23) or die($con->error);
                        $row23 = $reportsexit->fetch_assoc();

                        $sql24 = "SELECT id, name FROM testing_service WHERE added_at BETWEEN '$rep1' AND 
                         '$rep2' ORDER BY added_at";
                        $reportsexitdownload = $con->query($sql24) or die($con->error);
                        $row24 = $reportsexitdownload->fetch_assoc();
                        ?>
                        <h1 style="text-align: center ; margin-top: 16px; padding: 4px; background-color:aqua">
                           List of Names
                        </h1>
                        <table style="width:50% ;">
                           <thead style=" white-space: nowrap; ">
                              <tr>
                                 <th style="text-align: center;">Counseling</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php do {
                                 if ($row20 != null) { ?>
                                    <tr>
                                       <td><?php echo $row20['name'] ?></td>
                                    </tr>
                                 <?php } else {
                                 ?>
                                    <tr>
                                       <td style="color:red">No Entry</td>
                                    </tr>
                              <?php
                                 }
                              } while ($row20 = $reportscounseling->fetch_assoc()) ?>
                           </tbody>
                        </table>

                        <table style="width:50% ;">
                           <thead style=" white-space: nowrap; ">
                              <tr>
                                 <th style="text-align: center;">Referral</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php do {
                                 if ($row21 != null) { ?>
                                    <tr>
                                       <td><?php echo $row21['name'] ?></td>
                                    </tr>
                                 <?php } else {
                                 ?>
                                    <tr>
                                       <td style="color:red">No Entry</td>
                                    </tr>
                              <?php
                                 }
                              } while ($row21 = $reportsreferral->fetch_assoc()) ?>
                           </tbody>
                        </table>

                        <table style="width:50% ;">
                           <thead style=" white-space: nowrap; ">
                              <tr>
                                 <th style="text-align: center;">Testing</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php do {
                                 if ($row22 != null) { ?>
                                    <tr>
                                       <td><?php echo $row22['name'] ?></td>
                                    </tr>
                                 <?php } else {
                                 ?>
                                    <tr>
                                       <td style="color:red">No Entry</td>
                                    </tr>
                              <?php
                                 }
                              } while ($row22 = $reportstesting->fetch_assoc()) ?>
                           </tbody>
                        </table>

                        <table style="width:50% ;">
                           <thead style=" white-space: nowrap; ">
                              <tr>
                                 <th style="text-align: center;">Exit Interview</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php do {
                                 if ($row23 != null) { ?>
                                    <tr>
                                       <td><?php echo $row23['name'] ?></td>
                                    </tr>
                                 <?php } else {
                                 ?>
                                    <tr>
                                       <td style="color:red">No Entry</td>
                                    </tr>
                              <?php
                                 }
                              } while ($row23 = $reportsexit->fetch_assoc()) ?>
                           </tbody>
                        </table>

                        <table style="width:50% ;">
                           <thead style=" white-space: nowrap; ">
                              <tr>
                                 <th style="text-align: center;">Exit Interview Download the Form</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php do {
                                 if ($row24 != null) { ?>
                                    <tr>
                                       <td><?php echo $row24['name'] ?></td>
                                    </tr>
                                 <?php } else {
                                 ?>
                                    <tr>
                                       <td style="color:red">No Entry</td>
                                    </tr>
                              <?php
                                 }
                              } while ($row24 = $reportsexitdownload->fetch_assoc()) ?>
                           </tbody>
                        </table>

                     </div>
                  </div>
               </div> -->

               <!-- counting the number of rows -->
               <div class="row">
                  <div class="col-12">
                     <div class="card">
                        <form action="generate_pdf_reports.php" method="post">
                           <!-- <h1>&nbsp; Counseling Reports</h1> -->
                           <!-- <div class="row">
                              <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                                 <div class="card">
                                    <div class="card-body">
                                       <table class="table table-bordered mytable">
                                          <thead>
                                             <tr>
                                                <th>Month</th>
                                                <th>Number of Appointments</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <tr>
                                                <td>(<?php echo $rep1 ?> to <?php echo $rep2 ?>)</td>
                                                <td><?php
                                                      $sql = "SELECT id FROM counseling_appointment WHERE added_at BETWEEN '$rep1' AND 
                                          '$rep2' ORDER BY added_at";
                                                      $query_run1 = mysqli_query($con, $sql);
                                                      $repcoun1 = mysqli_num_rows($query_run1);
                                                      echo $repcoun1;
                                                      ?>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td><strong>Total</strong></td>
                                                <td>
                                                   <strong>
                                                      <?php
                                                      $repcounsum = $repcoun1;
                                                      echo $repcounsum;
                                                      ?>
                                                   </strong>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-12 col-md-8 col-lg-8 col-xl-8">
                                 <div class="card">
                                    <div class="card-body">
                                       <canvas id="counseling_graph" height="250"></canvas>
                                    </div>
                                 </div>
                              </div>
                              <h1>Referral Reports</h1>
                              <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                                 <div class="card">
                                    <div class="card-body">
                                       <table class="table table-bordered mytable">
                                          <thead>
                                             <tr>
                                                <th>Reason for Referral</th>
                                                <th>Number of Reports (ALL)</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <tr>
                                                <td>Absenteeism</td>
                                                <td>
                                                   <?php
                                                   $sql = "SELECT reason_for_referral, id 
                                             FROM referral_counseling WHERE added_at 
                                             BETWEEN '$rep1' AND '$rep2' AND 
                                             reason_for_referral='Absenteeism'
                                             ORDER BY reason_for_referral";
                                                   $query_run1 = mysqli_query($con, $sql);
                                                   $repports1 = mysqli_num_rows($query_run1);
                                                   echo $repports1;
                                                   ?>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td>Anxious/Nervous</td>
                                                <td>
                                                   <?php
                                                   $sql = "SELECT reason_for_referral, id 
                                             FROM referral_counseling WHERE added_at 
                                             BETWEEN '$rep1' AND '$rep2' AND 
                                             reason_for_referral='Anxious/Nervous'
                                             ORDER BY reason_for_referral";
                                                   $query_run1 = mysqli_query($con, $sql);
                                                   $repports2 = mysqli_num_rows($query_run1);
                                                   echo $repports2;
                                                   ?>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td>Bullying</td>
                                                <td>
                                                   <?php
                                                   $sql = "SELECT reason_for_referral, id 
                                             FROM referral_counseling WHERE added_at 
                                             BETWEEN '$rep1' AND '$rep2' AND
                                             reason_for_referral='Bullying' 
                                             ORDER BY reason_for_referral";
                                                   $query_run1 = mysqli_query($con, $sql);
                                                   $repports3 = mysqli_num_rows($query_run1);
                                                   echo $repports3;
                                                   ?>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td>Chronic Sadness</td>
                                                <td>
                                                   <?php
                                                   $sql = "SELECT reason_for_referral, id
                                             FROM referral_counseling WHERE added_at 
                                             BETWEEN '$rep1' AND '$rep2' AND 
                                             reason_for_referral='Chronic Sadness' 
                                             ORDER BY reason_for_referral";
                                                   $query_run1 = mysqli_query($con, $sql);
                                                   $repports4 = mysqli_num_rows($query_run1);
                                                   echo $repports4;
                                                   ?>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td>Cheating</td>
                                                <td>
                                                   <?php
                                                   $sql = "SELECT reason_for_referral, id 
                                             FROM referral_counseling WHERE added_at 
                                             BETWEEN '$rep1' AND '$rep2' AND 
                                             reason_for_referral='Cheating' 
                                             ORDER BY reason_for_referral";
                                                   $query_run1 = mysqli_query($con, $sql);
                                                   $repports5 = mysqli_num_rows($query_run1);
                                                   echo $repports5;
                                                   ?>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td>Disrespectful</td>
                                                <td>
                                                   <?php
                                                   $sql = "SELECT reason_for_referral, id 
                                             FROM referral_counseling WHERE added_at 
                                             BETWEEN '$rep1' AND '$rep2' AND 
                                             reason_for_referral='Disrespectful' 
                                             ORDER BY reason_for_referral";
                                                   $query_run1 = mysqli_query($con, $sql);
                                                   $repports6 = mysqli_num_rows($query_run1);
                                                   echo $repports6;
                                                   ?>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td>Excessive Worrying</td>
                                                <td>
                                                   <?php
                                                   $sql = "SELECT reason_for_referral, id 
                                             FROM referral_counseling WHERE added_at 
                                             BETWEEN '$rep1' AND '$rep2' AND 
                                             reason_for_referral='Excessive Worrying' 
                                             ORDER BY reason_for_referral";
                                                   $query_run1 = mysqli_query($con, $sql);
                                                   $repports7 = mysqli_num_rows($query_run1);
                                                   echo $repports7;
                                                   ?>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td>Failing Grade/s</td>
                                                <td>
                                                   <?php
                                                   $sql = "SELECT reason_for_referral, id 
                                             FROM referral_counseling WHERE added_at 
                                             BETWEEN '$rep1' AND '$rep2' AND 
                                             reason_for_referral='Failing Grade/s' 
                                             ORDER BY reason_for_referral";
                                                   $query_run1 = mysqli_query($con, $sql);
                                                   $repports8 = mysqli_num_rows($query_run1);
                                                   echo $repports8;
                                                   ?>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td>Family Concerns</td>
                                                <td>
                                                   <?php
                                                   $sql = "SELECT reason_for_referral, id
                                             FROM referral_counseling WHERE added_at 
                                             BETWEEN '$rep1' AND '$rep2' AND 
                                             reason_for_referral='Family Concerns' 
                                             ORDER BY reason_for_referral";
                                                   $query_run1 = mysqli_query($con, $sql);
                                                   $repports9 = mysqli_num_rows($query_run1);
                                                   echo $repports9;
                                                   ?>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td>Fears</td>
                                                <td>
                                                   <?php
                                                   $sql = "SELECT reason_for_referral, id 
                                             FROM referral_counseling WHERE added_at 
                                             BETWEEN '$rep1' AND '$rep2' AND 
                                             reason_for_referral='Fears' 
                                             ORDER BY reason_for_referral";
                                                   $query_run1 = mysqli_query($con, $sql);
                                                   $repports10 = mysqli_num_rows($query_run1);
                                                   echo $repports10;
                                                   ?>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td>Grief/Loss</td>
                                                <td>
                                                   <?php
                                                   $sql = "SELECT reason_for_referral, id
                                             FROM referral_counseling WHERE added_at 
                                             BETWEEN '$rep1' AND '$rep2' AND 
                                             reason_for_referral='Grief/Loss' 
                                             ORDER BY reason_for_referral";
                                                   $query_run1 = mysqli_query($con, $sql);
                                                   $repports11 = mysqli_num_rows($query_run1);
                                                   echo $repports11;
                                                   ?>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td>Hostility</td>
                                                <td>
                                                   <?php
                                                   $sql = "SELECT reason_for_referral, id 
                                             FROM referral_counseling WHERE added_at 
                                             BETWEEN '$rep1' AND '$rep2' AND 
                                             reason_for_referral='Hostility' 
                                             ORDER BY reason_for_referral";
                                                   $query_run1 = mysqli_query($con, $sql);
                                                   $repports12 = mysqli_num_rows($query_run1);
                                                   echo $repports12;
                                                   ?>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td>Inattentive</td>
                                                <td>
                                                   <?php
                                                   $sql = "SELECT reason_for_referral, id 
                                             FROM referral_counseling WHERE added_at 
                                             BETWEEN '$rep1' AND '$rep2' AND 
                                             reason_for_referral='Inattentive' 
                                             ORDER BY reason_for_referral";
                                                   $query_run1 = mysqli_query($con, $sql);
                                                   $repports13 = mysqli_num_rows($query_run1);
                                                   echo $repports13;
                                                   ?>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td>Influence of Alcohol/Drugs</td>
                                                <td>
                                                   <?php
                                                   $sql = "SELECT reason_for_referral, id 
                                             FROM referral_counseling WHERE added_at 
                                             BETWEEN '$rep1' AND '$rep2' AND 
                                             reason_for_referral='Influence of Alcohol/Drugs' 
                                             ORDER BY reason_for_referral";
                                                   $query_run1 = mysqli_query($con, $sql);
                                                   $repports14 = mysqli_num_rows($query_run1);
                                                   echo $repports14;
                                                   ?>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td>Mauling/Maltreating</td>
                                                <td>
                                                   <?php
                                                   $sql = "SELECT reason_for_referral, id 
                                             FROM referral_counseling WHERE added_at 
                                             BETWEEN '$rep1' AND '$rep2' AND 
                                             reason_for_referral='Mauling/Maltreating' 
                                             ORDER BY reason_for_referral";
                                                   $query_run1 = mysqli_query($con, $sql);
                                                   $repports15 = mysqli_num_rows($query_run1);
                                                   echo $repports15;
                                                   ?>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td>Need of Motivation</td>
                                                <td>
                                                   <?php
                                                   $sql = "SELECT reason_for_referral, id 
                                             FROM referral_counseling WHERE added_at 
                                             BETWEEN '$rep1' AND '$rep2' AND 
                                             reason_for_referral='Need of Motivation' 
                                             ORDER BY reason_for_referral";
                                                   $query_run1 = mysqli_query($con, $sql);
                                                   $repports16 = mysqli_num_rows($query_run1);
                                                   echo $repports16;
                                                   ?>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td>References of Suicide</td>
                                                <td>
                                                   <?php
                                                   $sql = "SELECT reason_for_referral, id 
                                             FROM referral_counseling WHERE added_at 
                                             BETWEEN '$rep1' AND '$rep2' AND 
                                             reason_for_referral='References of Suicide' 
                                             ORDER BY reason_for_referral";
                                                   $query_run1 = mysqli_query($con, $sql);
                                                   $repports17 = mysqli_num_rows($query_run1);
                                                   echo $repports17;
                                                   ?>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td>Social/Relationship Concerns</td>
                                                <td>
                                                   <?php
                                                   $sql = "SELECT reason_for_referral, id 
                                             FROM referral_counseling WHERE added_at 
                                             BETWEEN '$rep1' AND '$rep2' AND 
                                             reason_for_referral='Social/Relationship Concerns' 
                                             ORDER BY reason_for_referral";
                                                   $query_run1 = mysqli_query($con, $sql);
                                                   $repports18 = mysqli_num_rows($query_run1);
                                                   echo $repports18;
                                                   ?>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td>Stealing</td>
                                                <td>
                                                   <?php
                                                   $sql = "SELECT reason_for_referral, id
                                             FROM referral_counseling WHERE added_at 
                                             BETWEEN '$rep1' AND '$rep2' AND 
                                             reason_for_referral='Stealing' 
                                             ORDER BY reason_for_referral";
                                                   $query_run1 = mysqli_query($con, $sql);
                                                   $repports19 = mysqli_num_rows($query_run1);
                                                   echo $repports19;
                                                   ?>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td>Stress</td>
                                                <td>
                                                   <?php
                                                   $sql = "SELECT reason_for_referral, id 
                                             FROM referral_counseling WHERE added_at 
                                             BETWEEN '$rep1' AND '$rep2' AND 
                                             reason_for_referral='Stress' 
                                             ORDER BY reason_for_referral";
                                                   $query_run1 = mysqli_query($con, $sql);
                                                   $repports20 = mysqli_num_rows($query_run1);
                                                   echo $repports20;
                                                   ?>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td>Vandalism</td>
                                                <td>
                                                   <?php
                                                   $sql = "SELECT reason_for_referral, id 
                                             FROM referral_counseling WHERE added_at 
                                             BETWEEN '$rep1' AND '$rep2' AND 
                                             reason_for_referral='Vandalism' 
                                             ORDER BY reason_for_referral";
                                                   $query_run1 = mysqli_query($con, $sql);
                                                   $repports21 = mysqli_num_rows($query_run1);
                                                   echo $repports21;
                                                   ?>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td>Withdrawn</td>
                                                <td>
                                                   <?php
                                                   $sql = "SELECT reason_for_referral, id 
                                             FROM referral_counseling WHERE added_at 
                                             BETWEEN '$rep1' AND '$rep2' AND 
                                             reason_for_referral='Withdrawn' 
                                             ORDER BY reason_for_referral";
                                                   $query_run1 = mysqli_query($con, $sql);
                                                   $repports22 = mysqli_num_rows($query_run1);
                                                   echo $repports22;
                                                   ?>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td>Litering</td>
                                                <td>
                                                   <?php
                                                   $sql = "SELECT reason_for_referral, id 
                                             FROM referral_counseling WHERE added_at 
                                             BETWEEN '$rep1' AND '$rep2' AND 
                                             reason_for_referral='Litering' 
                                             ORDER BY reason_for_referral";
                                                   $query_run1 = mysqli_query($con, $sql);
                                                   $repports23 = mysqli_num_rows($query_run1);
                                                   echo $repports23;
                                                   ?>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td>Other Reason</td>
                                                <td>
                                                   <?php
                                                   $sql = "SELECT reason_for_referral, id 
                                             FROM referral_counseling WHERE added_at 
                                             BETWEEN '$rep1' AND '$rep2' AND 
                                             reason_for_referral='Others' 
                                             ORDER BY reason_for_referral";
                                                   $query_run1 = mysqli_query($con, $sql);
                                                   $repports24 = mysqli_num_rows($query_run1);
                                                   echo $repports24;
                                                   ?>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td><strong>Total</strong></td>
                                                <td>
                                                   <strong>
                                                      <?php $referralsum = $repports1 + $repports2
                                                         + $repports3 + $repports4 + $repports5
                                                         + $repports6 + $repports7 + $repports8
                                                         + $repports9 + $repports10 + $repports11
                                                         + $repports12 + $repports13 + $repports14
                                                         + $repports15 + $repports16 + $repports17
                                                         + $repports18 + $repports19 + $repports20
                                                         + $repports21 + $repports22 + $repports23 + $repports24;
                                                      echo $referralsum;
                                                      ?>
                                                   </strong>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-12 col-md-8 col-lg-8 col-xl-8">
                                 <div class="card">
                                    <div class="card-body">
                                       <canvas id="referral_graph" height="250"></canvas>
                                    </div>
                                 </div>
                              </div>
                              <h1>Testing Reports</h1>
                              <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                                 <div class="card">
                                    <div class="card-body">
                                       <table class="table table-bordered mytable">
                                          <thead>
                                             <tr>
                                                <th>Month</th>
                                                <th>Number of Appointments</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <tr>
                                                <td>(<?php echo $rep1 ?> to <?php echo $rep2 ?>)</td>
                                                <td><?php $sql = "SELECT * FROM testing_service WHERE added_at BETWEEN '$rep1' AND 
                                          '$rep2' ORDER BY id ASC";
                                                      $query_run1 = mysqli_query($con, $sql);
                                                      $reptest1 = mysqli_num_rows($query_run1);
                                                      echo $reptest1; ?></td>
                                             </tr>
                                             <tr>
                                                <td><strong>Total</strong></td>
                                                <td>
                                                   <strong>
                                                      <?php $reptestsum = $reptest1;
                                                      echo $reptestsum; ?>
                                                   </strong>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-12 col-md-8 col-lg-8 col-xl-8">
                                 <div class="card">
                                    <div class="card-body">
                                       <canvas id="testing_graph" height="250"></canvas>
                                    </div>
                                 </div>
                              </div>
                              <h1>Exit Interview Reports</h1>
                              <div class="col-12 col-md-4 col-lg-4 col-xl-4">

                                 <div class="card">
                                    <div class="card-body">
                                       <table class="table table-bordered mytable">
                                          <thead>
                                             <tr>
                                                <th>Month</th>
                                                <th>Number of Appointments</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <tr>
                                                <td>(<?php echo $rep1 ?> to <?php echo $rep2 ?>)</td>
                                                <td><?php $sql = "SELECT id FROM exit_interview WHERE added_at BETWEEN '$rep1' AND 
                                          '$rep2' ORDER BY added_at DESC";
                                                      $query_run1 = mysqli_query($con, $sql);
                                                      $repexit1 = mysqli_num_rows($query_run1);
                                                      echo $repexit1; ?></td>
                                             </tr>
                                             <tr>
                                                <td><strong>Total</strong></td>
                                                <td>
                                                   <strong>
                                                      <?php $repexitsum = $repexit1;
                                                      echo $repexitsum; ?>
                                                   </strong>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-12 col-md-8 col-lg-8 col-xl-8">
                                 <div class="card">
                                    <div class="card-body">
                                       <canvas id="exit_interview_graph" height="250"></canvas>
                                    </div>
                                 </div>
                              </div>

                              <h1>Exit Interview Download the Form Reports</h1>
                              <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                                 <div class="card">
                                    <div class="card-body">
                                       <table class="table table-bordered mytable">
                                          <thead>
                                             <tr>
                                                <th>Month</th>
                                                <th>Number of Appointments</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <tr>
                                                <td>(<?php echo $rep1 ?> to <?php echo $rep2 ?>)</td>
                                                <td><?php $sql = "SELECT id FROM exit_interview_download_form WHERE added_at BETWEEN '$rep1' AND 
                                          '$rep2' ORDER BY added_at";
                                                      $query_run1 = mysqli_query($con, $sql);
                                                      $repexitdownload1 = mysqli_num_rows($query_run1);
                                                      echo $repexitdownload1; ?></td>
                                             </tr>
                                             <tr>
                                                <td><strong>Total</strong></td>
                                                <td>
                                                   <strong>
                                                      <?php $repexitdownloadsum = $repexitdownload1;
                                                      echo $repexitdownloadsum; ?>
                                                   </strong>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-12 col-md-8 col-lg-8 col-xl-8">
                                 <div class="card">
                                    <div class="card-body">
                                       <canvas id="exit_interview_download_form_graph" height="250"></canvas>
                                    </div>
                                 </div>
                              </div>
                           </div> -->
                           <input type="text" name="from" value="<?php echo $rep1; ?>">
                           to
                           <input type="text" name="to" value="<?php echo $rep2; ?>">
                           <button type="submit" name="generate_reports" class="btn btn-success btn-block">
                              <i class="fa fa-file-pdf" style="color: red; margin-right: 1px;"></i>
                              Print
                           </button>
                        </form><br>
                        <button class="btn btn-success btn-block">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.php" aria-expanded="false" style="text-decoration:none">
                                <i class="mdi mdi-view-dashboard" style="color: green;"></i>
                                <span class="hide-menu"><b> Back to Dashboard</b></span>
                            </a></button>
                     </div>
                  </div>
               </div>

               <?php include 'includes/footer.php' ?>
               <script src="../dist/js/chart.js"></script>

               <!-- graph -->
               <script>
                  document.addEventListener("DOMContentLoaded", function() {
                     // Bar Chart
                     var barChartData = {
                        labels: ["<?php echo $rep1 ?> to <?php echo $rep2 ?>", ],
                        datasets: [{
                           label: 'Count',
                           backgroundColor: 'rgb(79,129,189)',
                           borderColor: 'rgba(0, 158, 251, 1)',
                           borderWidth: 1,
                           data: [
                              "<?php echo $repcoun1; ?>",
                           ]
                        }]
                     };

                     var ctx = document.getElementById('counseling_graph').getContext('2d');
                     window.myBar = new Chart(ctx, {
                        type: 'bar',
                        data: barChartData,
                        options: {
                           responsive: true,
                           legend: {
                              display: false,
                           }
                        }
                     });

                  });

                  document.addEventListener("DOMContentLoaded", function() {
                     // Bar Chart
                     var barChartData = {
                        labels: [
                           "Absenteeism", "Anxious/Nervous", "Bullying", "Chronic Sadness", "Cheating",
                           "Disrespectful", "Excessive Worrying", "Failing Grade/s", "Family Concerns",
                           "Fears", "Grief/Loss", "Hostility", "Inattentive", "Influence of Alcohol/Drugs",
                           "Mauling/Maltreating", "Need of Motivation", "References of Suicide",
                           "Social/Relationship Concerns", "Stealing", "Stress", "Vandalism", "Withdrawn",
                           "Litering", "Others"
                        ],
                        datasets: [{
                           label: 'Count',
                           backgroundColor: 'rgb(79,129,189)',
                           borderColor: 'rgba(0, 158, 251, 1)',
                           borderWidth: 1,
                           data: [
                              "<?php echo $repports1; ?>", "<?php echo $repports2; ?>", "<?php echo $repports3; ?>",
                              "<?php echo $repports4; ?>", "<?php echo $repports5; ?>", "<?php echo $repports6; ?>",
                              "<?php echo $repports7; ?>", "<?php echo $repports8; ?>", "<?php echo $repports9; ?>",
                              "<?php echo $repports10; ?>", "<?php echo $repports11; ?>", "<?php echo $repports12; ?>",
                              "<?php echo $repports13; ?>", "<?php echo $repports14; ?>", "<?php echo $repports15; ?>",
                              "<?php echo $repports16; ?>", "<?php echo $repports17; ?>", "<?php echo $repports18; ?>",
                              "<?php echo $repports19; ?>", "<?php echo $repports20; ?>", "<?php echo $repports21; ?>",
                              "<?php echo $repports22; ?>", "<?php echo $repports23; ?>", "<?php echo $repports24; ?>",
                           ]
                        }]
                     };

                     var ctx = document.getElementById('referral_graph').getContext('2d');
                     window.myBar = new Chart(ctx, {
                        type: 'bar',
                        data: barChartData,
                        options: {
                           responsive: true,
                           legend: {
                              display: false,
                           }
                        }
                     });

                  });

                  document.addEventListener("DOMContentLoaded", function() {
                     // Bar Chart
                     var barChartData = {
                        labels: ["<?php echo $rep1 ?> to <?php echo $rep2 ?>", ],
                        datasets: [{
                           label: 'Count',
                           backgroundColor: 'rgb(79,129,189)',
                           borderColor: 'rgba(0, 158, 251, 1)',
                           borderWidth: 1,
                           data: [
                              "<?php echo $reptest1; ?>",
                           ]
                        }]
                     };

                     var ctx = document.getElementById('testing_graph').getContext('2d');
                     window.myBar = new Chart(ctx, {
                        type: 'bar',
                        data: barChartData,
                        options: {
                           responsive: true,
                           legend: {
                              display: false,
                           }
                        }
                     });

                  });

                  document.addEventListener("DOMContentLoaded", function() {
                     // Bar Chart
                     var barChartData = {
                        labels: ["<?php echo $rep1 ?> to <?php echo $rep2 ?>", ],
                        datasets: [{
                           label: 'Count',
                           backgroundColor: 'rgb(79,129,189)',
                           borderColor: 'rgba(0, 158, 251, 1)',
                           borderWidth: 1,
                           data: [
                              "<?php echo $repexit1; ?>",
                           ]
                        }]
                     };

                     var ctx = document.getElementById('exit_interview_graph').getContext('2d');
                     window.myBar = new Chart(ctx, {
                        type: 'bar',
                        data: barChartData,
                        options: {
                           responsive: true,
                           legend: {
                              display: false,
                           }
                        }
                     });

                  });

                  document.addEventListener("DOMContentLoaded", function() {
                     // Bar Chart
                     var barChartData = {
                        labels: ["<?php echo $rep1 ?> to <?php echo $rep2 ?>", ],
                        datasets: [{
                           label: 'Count',
                           backgroundColor: 'rgb(79,129,189)',
                           borderColor: 'rgba(0, 158, 251, 1)',
                           borderWidth: 1,
                           data: [
                              "<?php echo $repexitdownloadsum; ?>",
                           ]
                        }]
                     };

                     var ctx = document.getElementById('exit_interview_download_form_graph').getContext('2d');
                     window.myBar = new Chart(ctx, {
                        type: 'bar',
                        data: barChartData,
                        options: {
                           responsive: true,
                           legend: {
                              display: false,
                           }
                        }
                     });

                  });
               </script>

            </div>
         </div>
      </div>
   </body>
<?php } else {
   echo header("Location: ../login.php");
}
?>

</html>