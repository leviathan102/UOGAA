<?php

include_once("connections/connection.php");

$con = connection();



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


</head>

<body id="formindex">
    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                    <div class="login-left">
                        <img class="img-fluid" src="assets/img/R.png" alt="Logo">
                    </div>
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <?php
                            if (isset($_POST['exitinterview'])) {
                            ?>
                                <div style="text-align: center" class="form-group">
                                    <img class="img-fluid" src="assets/img/ss.png" alt="Logo" height="500px" width="500px">
                                </div>
                                <div style="text-align: center" class="form-group">
                                    <img href="index.php" class="img-fluid" src="assets/img/R.png" alt="Logo" height="150px" width="150px">
                                </div>
                                <form action="exit_interview_download_college_filter.php" method="post">
                                    <button name="exitinterview" class="btn btn-success btn-block" role="button">
                                        Download PDF Form
                                    </button>
                                </form><br>
                                <form action="exit_interview_college_filter.php" method="post">
                                    <button name="exitinterview" class="btn btn-success btn-block" role="button">
                                        Fill Up Online
                                    </button>
                                    <br><a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.php" aria-expanded="false">
                                        <i class="fa fa-home" style="color: blue;"></i>
                                        <span class="hide-menu"><b>Back to Home</b></span>
                                </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>