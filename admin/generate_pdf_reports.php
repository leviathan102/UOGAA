<?php

namespace Dompdf;

use Dompdf\Dompdf as PDF;
use Dompdf\Options as Options;
use PDO;

require_once 'dompdf/autoload.inc.php';

include_once("connections/connection.php");
$con = connection();

if (isset($_POST['generate_reports'])) {

    $rep1 = $_POST['from'];
    $rep2 = $_POST['to'];;

    $sql = "SELECT added_at 
    FROM referral_counseling WHERE added_at 
    BETWEEN '$rep1' AND '$rep2' 
    GROUP BY added_at";
    $query_run1 = mysqli_query($con, $sql);
    $repports1 = mysqli_num_rows($query_run1);

    $sql20 = "SELECT id, name FROM counseling_appointment 
   WHERE added_at BETWEEN '$rep1' AND 
   '$rep2' ORDER BY added_at";
    $reportscounseling = $con->query($sql20) or die($con->error);
    $row20 = $reportscounseling->fetch_assoc();
    // $row20 = $reportscounseling->fetch_all(PDO::FETCH_ASSOC);

    $sql21 = "SELECT id, name FROM referral_counseling 
   WHERE added_at BETWEEN '$rep1' AND 
   '$rep2' ORDER BY added_at";
    $reportsreferral = $con->query($sql21) or die($con->error);
    $row21 = $reportsreferral->fetch_assoc();

    $sql22 = "SELECT id, name FROM testing_service 
   WHERE added_at BETWEEN '$rep1' AND 
   '$rep2' ORDER BY added_at";
    $reportstesting = $con->query($sql22) or die($con->error);
    $row22 = $reportstesting->fetch_assoc();

    $sql23 = "SELECT id, name FROM testing_service 
   WHERE added_at BETWEEN '$rep1' AND 
   '$rep2' ORDER BY added_at";
    $reportsexit = $con->query($sql23) or die($con->error);
    $row23 = $reportsexit->fetch_assoc();

    $sql24 = "SELECT id, name FROM testing_service 
   WHERE added_at BETWEEN '$rep1' AND 
   '$rep2' ORDER BY added_at";
    $reportsexitdownload = $con->query($sql24) or die($con->error);
    $row24 = $reportsexitdownload->fetch_assoc();

    // Approved - Initial Contact
    $sql26 = "SELECT * 
      FROM counseling_appointment WHERE added_at 
      BETWEEN '$rep1' AND '$rep2' AND 
      status='Approved' 
      ORDER BY status DESC";
    $query_run2 = mysqli_query($con, $sql26);
    $repports24 = mysqli_num_rows($query_run2);
    $sql25 = "SELECT * 
      FROM referral_counseling WHERE added_at 
      BETWEEN '$rep1' AND '$rep2' AND 
      status='Approved' 
      ORDER BY status DESC";
    $query_run1 = mysqli_query($con, $sql25);
    $repports23 = mysqli_num_rows($query_run1);
    $sql27 = "SELECT * 
      FROM testing_service WHERE added_at 
      BETWEEN '$rep1' AND '$rep2' AND 
      status='Approved' 
      ORDER BY status DESC";
    $query_run3 = mysqli_query($con, $sql27);
    $repports25 = mysqli_num_rows($query_run3);

    // follow-up
    $sql28 = "SELECT * 
      FROM counseling_appointment WHERE added_at 
      BETWEEN '$rep1' AND '$rep2' AND 
      status='FollowUp' 
      ORDER BY status DESC";
    $query_run4 = mysqli_query($con, $sql28);
    $repports26 = mysqli_num_rows($query_run4);
    $sql29 = "SELECT * 
      FROM referral_counseling WHERE added_at 
      BETWEEN '$rep1' AND '$rep2' AND 
      status='FollowUp' 
      ORDER BY status DESC";
    $query_run5 = mysqli_query($con, $sql29);
    $repports27 = mysqli_num_rows($query_run5);
    $sql30 = "SELECT * 
      FROM testing_service WHERE added_at 
      BETWEEN '$rep1' AND '$rep2' AND 
      status='FollowUp' 
      ORDER BY status DESC";
    $query_run6 = mysqli_query($con, $sql30);
    $repports28 = mysqli_num_rows($query_run6);

    // completed
    $sql31 = "SELECT * 
      FROM counseling_appointment WHERE added_at 
      BETWEEN '$rep1' AND '$rep2' AND 
      status='Done' 
      ORDER BY status DESC";
    $query_run7 = mysqli_query($con, $sql31);
    $repports29 = mysqli_num_rows($query_run7);
    $sql32 = "SELECT * 
      FROM referral_counseling WHERE added_at 
      BETWEEN '$rep1' AND '$rep2' AND 
      status='Done' 
      ORDER BY status DESC";
    $query_run8 = mysqli_query($con, $sql32);
    $repports30 = mysqli_num_rows($query_run8);
    $sql33 = "SELECT * 
      FROM testing_service WHERE added_at 
      BETWEEN '$rep1' AND '$rep2' AND 
      status='Done' 
      ORDER BY status DESC";
    $query_run8 = mysqli_query($con, $sql33);
    $repports31 = mysqli_num_rows($query_run8);

    $followup = $repports26 + $repports27 + $repports28;
    $initialcontact = $repports23 + $repports24 + $repports25;
    $completed = $repports29 + $repports30 + $repports31;

    //for counseling table
    $sql2 = "SELECT id FROM counseling_appointment 
   WHERE added_at BETWEEN '$rep1' AND 
   '$rep2' ORDER BY added_at";
    $query_coun1 = mysqli_query($con, $sql2);
    $repcoun1 = mysqli_num_rows($query_coun1);
    $repcounsum = $repcoun1;

    // testing table
    $sql3 = "SELECT id FROM testing_service 
      WHERE added_at BETWEEN '$rep1' AND 
      '$rep2' ORDER BY added_at";
    $query_test = mysqli_query($con, $sql3);
    $reptest1 = mysqli_num_rows($query_test);
    $reptestsum = $reptest1;

    // exit interview table
    $sql4 = "SELECT id FROM exit_interview 
        WHERE added_at BETWEEN '$rep1' AND 
        $rep2' ORDER BY added_at DESC";
    $exit = mysqli_query($con, $sql);
    $repexit1 = mysqli_num_rows($exit);
    $repexitsum = $repexit1;

    $sql5 = "SELECT id FROM exit_interview_download_form 
        WHERE added_at BETWEEN '$rep1' AND 
        '$rep2' ORDER BY added_at";
    $exitdownload = mysqli_query($con, $sql5);
    $repexitdownload1 = mysqli_num_rows($exitdownload);
    $repexitdownloadsum = $repexitdownload1;
    // end of exit interview

    //referral table
    $sqlref1 = "SELECT reason_for_referral, id 
        FROM referral_counseling WHERE added_at 
        BETWEEN '$rep1' AND '$rep2' AND 
        reason_for_referral='Absenteeism'
        ORDER BY reason_for_referral";
    $query_ref1 = mysqli_query($con, $sqlref1);
    $repports01 = mysqli_num_rows($query_ref1);

    $sqlref2 = "SELECT reason_for_referral, id 
        FROM referral_counseling WHERE added_at 
        BETWEEN '$rep1' AND '$rep2' AND 
        reason_for_referral='Anxious/Nervous'
        ORDER BY reason_for_referral";
    $query_ref2 = mysqli_query($con, $sqlref2);
    $repports02 = mysqli_num_rows($query_ref2);

    $sqlref3 = "SELECT reason_for_referral, id 
        FROM referral_counseling WHERE added_at 
        BETWEEN '$rep1' AND '$rep2' AND
        reason_for_referral='Bullying' 
        ORDER BY reason_for_referral";
    $query_ref3 = mysqli_query($con, $sqlref3);
    $repports03 = mysqli_num_rows($query_ref3);

    $sqlref4 = "SELECT reason_for_referral, id
        FROM referral_counseling WHERE added_at 
        BETWEEN '$rep1' AND '$rep2' AND 
        reason_for_referral='Chronic Sadness' 
        ORDER BY reason_for_referral";
    $query_ref4 = mysqli_query($con, $sqlref4);
    $repports04 = mysqli_num_rows($query_ref4);

    $sqlref5 = "SELECT reason_for_referral, id 
        FROM referral_counseling WHERE added_at 
        BETWEEN '$rep1' AND '$rep2' AND 
        reason_for_referral='Cheating' 
        ORDER BY reason_for_referral";
    $query_ref5 = mysqli_query($con, $sqlref5);
    $repports5 = mysqli_num_rows($query_ref5);

    $sqlref6 = "SELECT reason_for_referral, id 
        FROM referral_counseling WHERE added_at 
        BETWEEN '$rep1' AND '$rep2' AND 
        reason_for_referral='Disrespectful' 
        ORDER BY reason_for_referral";
    $query_ref6 = mysqli_query($con, $sqlref6);
    $repports6 = mysqli_num_rows($query_ref6);

    $sqlref7 = "SELECT reason_for_referral, id 
        FROM referral_counseling WHERE added_at 
        BETWEEN '$rep1' AND '$rep2' AND 
        reason_for_referral='Excessive Worrying' 
        ORDER BY reason_for_referral";
    $query_ref7 = mysqli_query($con, $sqlref7);
    $repports7 = mysqli_num_rows($query_ref7);

    $sqlref8 = "SELECT reason_for_referral, id 
        FROM referral_counseling WHERE added_at 
        BETWEEN '$rep1' AND '$rep2' AND 
        reason_for_referral='Failing Grade/s' 
        ORDER BY reason_for_referral";
    $query_ref8 = mysqli_query($con, $sqlref8);
    $repports8 = mysqli_num_rows($query_ref8);

    $sqlref9 = "SELECT reason_for_referral, id
        FROM referral_counseling WHERE added_at 
        BETWEEN '$rep1' AND '$rep2' AND 
        reason_for_referral='Family Concerns' 
        ORDER BY reason_for_referral";
    $query_ref9 = mysqli_query($con, $sqlref9);
    $repports9 = mysqli_num_rows($query_ref9);

    $sqlref10 = "SELECT reason_for_referral, id 
        FROM referral_counseling WHERE added_at 
        BETWEEN '$rep1' AND '$rep2' AND 
        reason_for_referral='Fears' 
        ORDER BY reason_for_referral";
    $query_ref10 = mysqli_query($con, $sqlref10);
    $repports10 = mysqli_num_rows($query_ref10);

    $sqlref11 = "SELECT reason_for_referral, id
        FROM referral_counseling WHERE added_at 
        BETWEEN '$rep1' AND '$rep2' AND 
        reason_for_referral='Grief/Loss' 
        ORDER BY reason_for_referral";
    $query_ref11 = mysqli_query($con, $sqlref11);
    $repports11 = mysqli_num_rows($query_ref11);

    $sqlref12 = "SELECT reason_for_referral, id 
        FROM referral_counseling WHERE added_at 
        BETWEEN '$rep1' AND '$rep2' AND 
        reason_for_referral='Hostility' 
        ORDER BY reason_for_referral";
    $query_ref12 = mysqli_query($con, $sqlref12);
    $repports12 = mysqli_num_rows($query_ref12);

    $sqlref13 = "SELECT reason_for_referral, id 
        FROM referral_counseling WHERE added_at 
        BETWEEN '$rep1' AND '$rep2' AND 
        reason_for_referral='Inattentive' 
        ORDER BY reason_for_referral";
    $query_ref13 = mysqli_query($con, $sqlref13);
    $repports13 = mysqli_num_rows($query_ref13);

    $sqlref14 = "SELECT reason_for_referral, id 
        FROM referral_counseling WHERE added_at 
        BETWEEN '$rep1' AND '$rep2' AND 
        reason_for_referral='Influence of Alcohol/Drugs' 
        ORDER BY reason_for_referral";
    $query_ref14 = mysqli_query($con, $sqlref14);
    $repports14 = mysqli_num_rows($query_ref14);

    $sqlref15 = "SELECT reason_for_referral, id 
        FROM referral_counseling WHERE added_at 
        BETWEEN '$rep1' AND '$rep2' AND 
        reason_for_referral='Mauling/Maltreating' 
        ORDER BY reason_for_referral";
    $query_ref15 = mysqli_query($con, $sqlref15);
    $repports15 = mysqli_num_rows($query_ref15);

    $sqlref16 = "SELECT reason_for_referral, id 
        FROM referral_counseling WHERE added_at 
        BETWEEN '$rep1' AND '$rep2' AND 
        reason_for_referral='Need of Motivation' 
        ORDER BY reason_for_referral";
    $query_ref16 = mysqli_query($con, $sqlref16);
    $repports16 = mysqli_num_rows($query_ref16);

    $sqlref17 = "SELECT reason_for_referral, id 
        FROM referral_counseling WHERE added_at 
        BETWEEN '$rep1' AND '$rep2' AND 
        reason_for_referral='References of Suicide' 
        ORDER BY reason_for_referral";
    $query_ref17 = mysqli_query($con, $sqlref17);
    $repports17 = mysqli_num_rows($query_ref17);

    $sqlref18 = "SELECT reason_for_referral, id 
        FROM referral_counseling WHERE added_at 
        BETWEEN '$rep1' AND '$rep2' AND 
        reason_for_referral='Social/Relationship Concerns' 
        ORDER BY reason_for_referral";
    $query_ref18 = mysqli_query($con, $sqlref18);
    $repports18 = mysqli_num_rows($query_ref18);

    $sqlref19 = "SELECT reason_for_referral, id
        FROM referral_counseling WHERE added_at 
        BETWEEN '$rep1' AND '$rep2' AND 
        reason_for_referral='Stealing' 
        ORDER BY reason_for_referral";
    $query_ref19 = mysqli_query($con, $sqlref19);
    $repports19 = mysqli_num_rows($query_ref19);

    $sqlref20 = "SELECT reason_for_referral, id 
        FROM referral_counseling WHERE added_at 
        BETWEEN '$rep1' AND '$rep2' AND 
        reason_for_referral='Stress' 
        ORDER BY reason_for_referral";
    $query_ref20 = mysqli_query($con, $sqlref20);
    $repports20 = mysqli_num_rows($query_ref20);

    $sqlref21 = "SELECT reason_for_referral, id 
        FROM referral_counseling WHERE added_at 
        BETWEEN '$rep1' AND '$rep2' AND 
        reason_for_referral='Vandalism' 
        ORDER BY reason_for_referral";
    $query_ref21 = mysqli_query($con, $sqlref21);
    $repports21 = mysqli_num_rows($query_ref21);

    $sqlref22 = "SELECT reason_for_referral, id 
        FROM referral_counseling WHERE added_at 
        BETWEEN '$rep1' AND '$rep2' AND 
        reason_for_referral='Withdrawn' 
        ORDER BY reason_for_referral";
    $query_ref22 = mysqli_query($con, $sqlref22);
    $repports22 = mysqli_num_rows($query_ref22);

    $sqlref23 = "SELECT reason_for_referral, id 
        FROM referral_counseling WHERE added_at 
        BETWEEN '$rep1' AND '$rep2' AND 
        reason_for_referral='Litering' 
        ORDER BY reason_for_referral";
    $query_ref23 = mysqli_query($con, $sqlref23);
    $repports23 = mysqli_num_rows($query_ref23);

    $sqlref024 = "SELECT reason_for_referral, id 
        FROM referral_counseling WHERE added_at 
        BETWEEN '$rep1' AND '$rep2' AND 
        reason_for_referral='Others' 
        ORDER BY reason_for_referral";
    $query_ref024 = mysqli_query($con, $sqlref024);
    $repports024 = mysqli_num_rows($query_ref024);

    $referralsum = $repports01 + $repports02 + $repports03
        + $repports5 + $repports6 + $repports7 + $repports8
        + $repports9 + $repports10 + $repports11
        + $repports12 + $repports13 + $repports14
        + $repports15 + $repports16 + $repports17
        + $repports18 + $repports19 + $repports20
        + $repports21 + $repports22 + $repports23 + $repports024;
    // end of referral

    $dompdf = new Dompdf(array('enable_remote' => true));
    $dompdf->setbasepath(realpath('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/'));
    $image = '<img src="/img/logo.png" />';
    // Load content from html file 
    // $html = file_get_contents("generate_reports.php");
    // $dompdf->loadHtml($html);
    $dompdf->loadHtml('
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>BukSU Guidance Office</title>
        <style type="text/css">
            .body {
                padding: 0;

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
            td{
               text-align:center;
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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <img style="float: left; width: 75px; height: 65px;" src="img/logo.png" />
                    <div>
                        <p style="text-align: center"><b>BUKIDNON STATE UNIVERSITY<b></p>
                        <p style="text-align: center">Malaybalay City, Bukidnon 8700</p>
                        <p style="text-align: center">Tel (088) 813-5661 to 5663; TelFax (088) 813-2717, <a>www.buksu.edu.ph</a></p><br>
                        <h2 style="text-align: center">QUARTERLY ACCOMPLISHMENT REPORT</h2>
                        <p style="text-align: center">Month of &nbsp;' . $rep1 . '&nbsp;to&nbsp;' . $rep2 . '</p><br>

                        <div class="reports-form">
                            <p>1. Individual Counseling</p>
                            <p>&nbsp;&nbsp; No. of students served</p>
                            <p>&nbsp;&nbsp;&nbsp; a. Initial Contact &nbsp;' . $initialcontact . '</p>
                            <p>&nbsp;&nbsp;&nbsp; b. Follow up &nbsp;' . $followup . '</p>
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
                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; No. of Completed  &nbsp;' . $completed . '</p>
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
        </div><br><br>
      </body>
    ');
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream("Reports", array("Attachment" => false));
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