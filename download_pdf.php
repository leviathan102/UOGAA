<?php
include_once("connections/connection.php");
$con = connection();
if (isset($_POST['submit'])) {
    $fname = $_POST['name'];
    $college = $_POST['college'];
    $course = $_POST['course'];
    $sql = "INSERT INTO `exit_interview_download_form`( `name`, `college_of`, `course`) VALUES ('$fname', '$college', '$course' )";
    $con->query($sql) or die($con->error);

    echo '<h1 style="text-align:center;"> Hello, ' . $fname . ' Your Information has been saved!<h1>';

    echo "<iframe  src='Exit Interview.pdf' width='80%' height='80%'></iframe>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buksu Guidance Office</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/icons8-user-64.png">
</head>

<body>

</body>

</html>