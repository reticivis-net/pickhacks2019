<?php
session_start();
include '../dbconnect.php';
if(isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $userdata = [];
    $userdata["finished"] = "false";
    $userdata = json_encode($userdata);
    $result = $conn->query("UPDATE users SET userdata = '$userdata' WHERE email='$email'");
    print_r($result);
    if ($result === TRUE) { // if the DB insertion worked successfully
        header("Location: /portal/form.php");
    } else {
        echo "error whoops";
    }
} else {
    header("Location: index.php");
}
