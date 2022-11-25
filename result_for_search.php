<?php


if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['UserLogin']) && $_SESSION['Access'] == "Administrator" || $_SESSION['Access'] == "Counselor") {
    echo "Welcome " . $_SESSION['Access'];
} else {
    echo header("Location: login.php");
}

include_once("connections/connection.php");

$con = connection();

$search1 = $_GET['search1'];
$search2 = $_GET['search2'];
$search3 = $_GET['search3'];
$search4 = $_GET['search4'];
$sql = "SELECT * FROM counseling_appointment WHERE name LIKE '%$search1%' || college_of LIKE '%$search1%' ORDER BY id DESC";
$appointment = $con->query($sql) or die($con->error);
$row = $appointment->fetch_assoc();

$sql2 = "SELECT * FROM referral_counseling WHERE name LIKE '%$search2%' || college_of LIKE '%$search2%' ORDER BY id DESC";
$referral = $con->query($sql2) or die($con->error);
$row2 = $referral->fetch_assoc();

$sql3 = "SELECT * FROM testing_service WHERE name LIKE '%$search3%' ORDER BY id DESC";
$testing = $con->query($sql3) or die($con->error);
$row3 = $testing->fetch_assoc();

$sql4 = "SELECT * FROM exit_interview WHERE name LIKE '%$search4%' ORDER BY id DESC";
$interview = $con->query($sql4) or die($con->error);
$row4 = $interview->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BukSU Guidance Office</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/icons8-user-64.png">
    <link rel="stylesheet" href="css/style.css">
    <a href="logout.php">Logout</a>
    <br />
    <br />
    <br />
    <br />
    <a href="user_accounts.php">Accounts</a>
    <br />
    <br />
    <a href="add_date_appointment.php">Add Date</a>
    <br />
    <br />
    <a href="add_time_appointment.php">Add Time</a>
</head>

<body>
    <h1>Counseling Appointment Data</h1>
    </br>
    <form action="result_for_search.php" method="get">
        <input type="text" name="search1" id="search1">
        <button type="submit" name="query">Search</button>
        </from>
        <table>
            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>College</th>
                    <th>Year Level</th>
                    <th>Prefered Mode</th>
                    <th>Date Selected</th>
                    <th>Phone Number</th>
                    <th>Facebook Name</th>
                    <th>Prefered Time</th>
                    <th>Status</th>
                </tr>
            </thead>
            <?php do { ?>
                <tbody>
                    <tr>
                        <td><a href="details_appointment.php?ID=<?php echo $row['id']; ?>">Details</a></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['college_of']; ?></td>
                        <td><?php echo $row['year_level']; ?></td>
                        <td><?php echo $row['preferred_mode']; ?></td>
                        <td><?php echo $row['date_prefer']; ?></td>
                        <td><?php echo $row['phone_number']; ?></td>
                        <td><?php echo $row['facebook_account']; ?></td>
                        <td><?php echo $row['prefered_time']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                    </tr>
                <?php } while ($row = $appointment->fetch_assoc()) ?>

                </tbody>
        </table>

        <br />
        <br />
        <h1>Referral Counseling Data</h1>
        </br>
        <form action="result_for_search.php" method="get">
            <input type="text" name="search2" id="search2">
            <button type="submit">Search</button>
            </from>
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>College</th>
                        <th>Year Level</th>
                        <th>Prefered Mode</th>
                        <th>Date Selected</th>
                        <th>Phone Number</th>
                        <th>Facebook Name</th>
                        <th>Prefered Time</th>
                        <th>Referrer</th>
                        <th>Reason for Referral</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <?php do { ?>
                    <tbody>
                        <tr>
                            <td><a href="details_referral.php?ID=<?php echo $row2['id']; ?>">Details</a></td>
                            <td><?php echo $row2['name']; ?></td>
                            <td><?php echo $row2['college_of']; ?></td>
                            <td><?php echo $row2['year_level']; ?></td>
                            <td><?php echo $row2['preferred_mode']; ?></td>
                            <td><?php echo $row2['date']; ?></td>
                            <td><?php echo $row2['phone_number']; ?></td>
                            <td><?php echo $row2['facebook_name']; ?></td>
                            <td><?php echo $row2['preferred_time']; ?></td>
                            <td><?php echo $row2['referrer']; ?></td>
                            <td><?php echo $row2['reason_for_referral']; ?></td>
                            <td><?php echo $row2['status']; ?></td>
                        </tr>
                    <?php } while ($row2 = $referral->fetch_assoc()) ?>

                    </tbody>
            </table>
            <br />
            <br />
            <h1>Testing Data</h1>
            <form action="result_for_search.php" method="get">
                <input type="text" name="search3" id="search3">
                <button type="submit">Search</button>
                </from>
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Course</th>
                            <th>Year Level</th>
                            <th>Date</th>
                            <th>Gender</th>
                            <th>Purpose</th>
                            <th>For Newly Hired</th>
                            <th>Prefer Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <?php do { ?>
                        <tbody>
                            <tr>
                                <td><a href="details_testing.php?ID=<?php echo $row3['id']; ?>">Details</a></td>
                                <td><?php echo $row3['name']; ?></td>
                                <td><?php echo $row3['age']; ?></td>
                                <td><?php echo $row3['course']; ?></td>
                                <td><?php echo $row3['year_level']; ?></td>
                                <td><?php echo $row3['date']; ?></td>
                                <td><?php echo $row3['gender']; ?></td>
                                <td><?php echo $row3['purpose']; ?></td>
                                <td><?php echo $row3['option_for_newly_hired']; ?></td>
                                <td><?php echo $row3['date_prefer']; ?></td>
                                <td><?php echo $row3['status']; ?></td>
                            </tr>
                        <?php } while ($row3 = $testing->fetch_assoc()) ?>

                        </tbody>
                </table>

                <br />
                <br />
                <h1>Exit Interview Data</h1>
                <form action="result_for_search.php" method="get">
                    <input type="text" name="search4" id="search4">
                    <button type="submit">Search</button>
                    </from>
                    <table>
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Course</th>
                                <th>Date</th>
                                <th>Best Experience</th>
                                <th>Worst Experience</th>
                                <th>Like best in your College</th>
                                <th>Like Least in your College</th>
                                <th>Immediate Plans</th>
                                <th>Long Term Goal</th>
                                <th>Home Address</th>
                                <th>Phone Number</th>

                            </tr>
                        </thead>
                        <?php do { ?>
                            <tbody>
                                <tr>
                                    <td><a href="details_exit_interview.php?ID=<?php echo $row4['id']; ?>">Details</a></td>
                                    <td><?php echo $row4['name']; ?></td>
                                    <td><?php echo $row4['age']; ?></td>
                                    <td><?php echo $row4['gender']; ?></td>
                                    <td><?php echo $row4['course']; ?></td>
                                    <td><?php echo $row4['select_date']; ?></td>
                                    <td><?php echo $row4['best_part']; ?></td>
                                    <td><?php echo $row4['worst_part']; ?></td>
                                    <td><?php echo $row4['like_best']; ?></td>
                                    <td><?php echo $row4['like_least']; ?></td>
                                    <td><?php echo $row4['immediate_plans']; ?></td>
                                    <td><?php echo $row4['long_term_goal']; ?></td>
                                    <td><?php echo $row4['home_address']; ?></td>
                                    <td><?php echo $row4['phone_number']; ?></td>

                                </tr>
                            <?php } while ($row4 = $interview->fetch_assoc()) ?>

                            </tbody>
                    </table>

</body>

</html>