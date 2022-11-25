<?php

include_once("connections/connection.php");

$con = connection();

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['login'])) {
    $username = $_POST['email'];
    $password = $_POST['password'];
    // $college = $_POST['college_of'];

    $sql = "SELECT * FROM counselor_user WHERE email = '$username' AND password = '$password'";
    $user = $con->query($sql) or die($con->error);
    $row = $user->fetch_assoc();
    $total = $user->num_rows;

    if ($total > 0) {
        $_SESSION['AccountID'] = $row['id'];
        $_SESSION['UserLogin'] = $row['email'];
        $_SESSION['Username'] = $row['username'];
        $_SESSION['Access'] = $row['access'];
        $_SESSION['College'] = $row['college'];
        $_SESSION['Password'] = $row['password'];
        echo $_SESSION['AccountID'];
        echo $_SESSION['Username'];
        echo $_SESSION['Access'];
        echo $_SESSION['College'];
        echo $_SESSION['Password'];
        echo header("Location: admin/index.php");
    } else {
        echo "<div class ='message warning'>No Match Account!</div>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BukSU Guidance Office | Login</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/icons8-user-64.png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/feathericon.min.css">
    <link rel="stylesheet" href="assets/plugins/morris/morris.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        function changeDropdown() {
            var state = document.getElementById("mySelect").value;
            if (state == "Dean") {
                document.getElementById("collegename").style.visibility = 'visible';
            } else {
                document.getElementById("collegename").style.visibility = 'hidden';
            }
        }
        
        let myCheckBox = document.getElementById('showHidePasswordCheckBox');

        myCheckBox.addEventListener('click', () => {

            if (!myCheckBox.checked) {
                document.getElementById('inputPassword').type = 'password';
                document.getElementById('showHidePasswordCheckBoxLabel').innerText = 'Show Password'
            } else {
                document.getElementById('inputPassword').type = 'text';
                document.getElementById('showHidePasswordCheckBoxLabel').innerText = 'Hide Password'
            }

        })
        
        let showPassword = false;
        let myButton = document.getElementById('showHidePasswordButton');
        
        myButton.addEventListener('click', () => {
            if (showPassword) {
                document.getElementById('inputPassword').type = 'password';
                myButton.innerText = 'Show Password'
            } else {
                document.getElementById('inputPassword').type = 'text';
                myButton.innerText = 'Hide Password'
            }
            showPassword = !showPassword;
        })


    </script>
</head>

<body id="formlogin">

    <form action="" method="post">
        <div class="main-wrapper login-body">
            <div class="login-wrapper">
                <div class="container">
                    <div class="loginbox">
                        <div class="login-left"> <img class="img-fluid" src="assets/img/R.png" alt="Logo"> </div>
                        <div class="login-right">
                            <div class="login-right-wrap">
                                <div style="text-align: center" class="form-group">
                                    <img class="img-fluid" src="img/splash.jpg" alt="Logo" height="100px" width="100px">
                                </div>
                                <?php if (isset($_GET['error'])) { ?>
                                    <p class="error"><?php echo $_GET['error']; ?></p>
                                <?php } ?>

                                <div class="form-group">
                                    <label><b>Email</b></label>
                                    <input class="form-control" type="email" name="email" placeholder="Email" required><br>

                                    <label for="inputPassword" class="form-label"><b>Password</b></label>
                                    <input type="password" class="form-control" name="password" id="myInput" required><br>
                                    <input type="checkbox" onclick="myFunction()">&nbsp;Show Password
                                    
                                    <script>
                                    function myFunction() {
                                      var x = document.getElementById("myInput");
                                      if (x.type === "password") {
                                        x.type = "text";
                                      } else {
                                        x.type = "password";
                                      }
                                    }
                                    </script>
                                </div>
                                <div class="form-floating mb-3">
                                    <button class="btn btn-primary btn-block" type="submit" name="login" title="Not for Students" style="background-color: blue ;">
                                        <b>Login</b>
                                    </button><br>
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.php" aria-expanded="false">
                                        <i class="fa fa-home" style="color: blue;"></i>
                                        <span class="hide-menu"><b>Back to Home</b></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    
    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>