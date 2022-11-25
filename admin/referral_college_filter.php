<?php
include_once("connections/connection.php");
$con = connection();

// for college list
$sql = "SELECT * FROM college_list WHERE name!='Non-Teaching Employee Association' ORDER BY name ASC";
$appointment = $con->query($sql) or die($con->error);
$row = $appointment->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BukSU Guidance Office | Counseling Appointment</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/icons8-user-64.png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/feathericon.min.css">
    <link rel="stylesheet" href="assets/plugins/morris/morris.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="css/style.css">


    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script type="text/javascript">
        // $(document).ready(function() {
        //     $("#college_of").change(function() {
        //         $('form').submit();
        //     })
        // })
    </script>

</head>

<body id="formcounseling">
    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                    <div class="login-left">
                        <img class="img-fluid" src="assets/img/R.png" alt="Logo">
                    </div>
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <!-- counselling fetch data -->
                            <?php
                            if (isset($_POST['referral'])) {
                            ?>
                                <form action="add_referral.php" method="post">
                                    <div class="form-floating mb-3">
                                        <label for=""> Select the College/Program First</label>
                                        <select name="college_of" class="form-control" type="text" required>
                                            <option value=""></option>
                                            <?php
                                            do {
                                                if ($row != null) {
                                            ?>
                                                    <option><?php echo $row['name'] ?></option>
                                            <?php
                                                }
                                            } while ($row = $appointment->fetch_assoc()) ?>
                                        </select><br>
                                        <button type="submit" name="add_referral" class="btn btn-success btn-block"> Next</button><br>
                                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.php" aria-expanded="false">
                                        <i class="fa fa-home" style="color: blue;"></i>
                                        <span class="hide-menu"><b>Back</b></span>
                                    </a>
                                    </div>
                                </form>
                            <?php
                            }
                            ?>
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