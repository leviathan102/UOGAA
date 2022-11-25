<?php

include_once("connections/connection.php");
$con = connection();


if (isset($_POST['delete'])) {
    $id = $_POST['ID'];
    $sql = "DELETE FROM exit_interview WHERE id = '$id'";
    $con->query($sql) or die($con->error);
    echo header("Location: exit_interview.php");
}

if (isset($_POST['delete2'])) {
    $id = $_POST['ID'];
    $sql = "DELETE FROM exit_interview WHERE id = '$id'";
    $con->query($sql) or die($con->error);
    echo header("Location: records.php");
}