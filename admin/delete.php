<!-- delete functions -->
<?php

// for database connection
include_once("connections/connection.php");
$con = connection();

// delete user accounts by id
if (isset($_POST['deleteuser'])) {
    $id = $_POST['ID'];
    $sql = "DELETE FROM counselor_user WHERE id = '$id'";
    $con->query($sql) or die($con->error);
    echo header("Location: details_user.php?ID=" . $id);
}

// delete testing by id
if (isset($_POST['deletetesting'])) {
    $id = $_POST['ID'];
    $sql = "DELETE FROM testing_service WHERE id = '$id'";
    $con->query($sql) or die($con->error);
    echo header("Location: testing.php?ID=" . $id);
}

// delete reservation time by id
if (isset($_POST['deletereservationtime'])) {
    $id = $_POST['ID'];
    $sql = "DELETE FROM apointment_time WHERE id = '$id'";
    $con->query($sql) or die($con->error);
    echo header("Location: details_reservation.php?ID=" . $id);
}

// delete reservation date by id
if (isset($_POST['deletedate'])) {
    $id = $_POST['ID'];
    $sql = "DELETE FROM apointment_date WHERE id = '$id'";
    $con->query($sql) or die($con->error);
    echo header("Location: details_reservation.php?ID=" . $id);
}

// delete college by id
if (isset($_POST['deletecollege'])) {
    $id = $_POST['ID'];
    $sql = "DELETE FROM college_list WHERE id = '$id'";
    $con->query($sql) or die($con->error);
    echo header("Location: details_college.php?ID=" . $id);
}

// delete college by id
if (isset($_POST['deletecourse'])) {
    $id = $_POST['ID'];
    $sql = "DELETE FROM courses_list WHERE id = '$id'";
    $con->query($sql) or die($con->error);
    echo header("Location: details_course.php?ID=" . $id);
}

// delete reason for referral by id
if (isset($_POST['deletereason'])) {
    $id = $_POST['ID'];
    $sql = "DELETE FROM referral_reason_list WHERE id = '$id'";
    $con->query($sql) or die($con->error);
    echo header("Location: details_reason_for_referral.php?ID=" . $id);
}

// delete purpose for testing by id
if (isset($_POST['deletepurpose'])) {
    $id = $_POST['ID'];
    $sql = "DELETE FROM testing_purpose_list WHERE id = '$id'";
    $con->query($sql) or die($con->error);
    echo header("Location: details_testing_purpose.php?ID=" . $id);
}

// delete referral date by id
if (isset($_POST['deletereferraldate'])) {
    $id = $_POST['ID'];
    $sql = "DELETE FROM referral_date WHERE id = '$id'";
    $con->query($sql) or die($con->error);
    echo header("Location: details_reservation.php?ID=" . $id);
}

// delete referral time by id
if (isset($_POST['deletereferraltime'])) {
    $id = $_POST['ID'];
    $sql = "DELETE FROM referral_time WHERE id = '$id'";
    $con->query($sql) or die($con->error);
    echo header("Location: details_reservation.php?ID=" . $id);
}

// delete testing date by id
if (isset($_POST['deletetestingdate'])) {
    $id = $_POST['ID'];
    $sql = "DELETE FROM testing_date WHERE id = '$id'";
    $con->query($sql) or die($con->error);
    echo header("Location: details_reservation.php?ID=" . $id);
}

// delete testing time by id
if (isset($_POST['deletetestingtime'])) {
    $id = $_POST['ID'];
    $sql = "DELETE FROM testing_time WHERE id = '$id'";
    $con->query($sql) or die($con->error);
    echo header("Location: details_reservation.php?ID=" . $id);
}

// delete counseling data by id
if (isset($_POST['deletecounselingrecord'])) {
    $id = $_POST['ID'];
    $sql = "DELETE FROM counseling_appointment WHERE id = '$id'";
    $con->query($sql) or die($con->error);
    echo header("Location: details_counseling.php?ID=" . $id);
}

// delete referral data by id
if (isset($_POST['deletereferralrecord'])) {
    $id = $_POST['ID'];
    $sql = "DELETE FROM referral_counseling WHERE id = '$id'";
    $con->query($sql) or die($con->error);
    echo header("Location: details_referral.php?ID=" . $id);
}

// delete testing data by id
if (isset($_POST['deleteexittestingrecord'])) {
    $id = $_POST['ID'];
    $sql = "DELETE FROM testing_service WHERE id = '$id'";
    $con->query($sql) or die($con->error);
    echo header("Location: details_testing.php?ID=" . $id);
}

// delete exit interview data by id
if (isset($_POST['deleteexitrecord'])) {
    $id = $_POST['ID'];
    $sql = "DELETE FROM exit_interview WHERE id = '$id'";
    $con->query($sql) or die($con->error);
    echo header("Location: details_exit_interview.php?ID=" . $id);
}

// delete exit interview data by id
if (isset($_POST['deleteexitdownloadrecord'])) {
    $id = $_POST['ID'];
    $sql = "DELETE FROM exit_interview_download_form WHERE id = '$id'";
    $con->query($sql) or die($con->error);
    echo header("Location: details_exit_interview_download.php?ID=" . $id);
}
?>