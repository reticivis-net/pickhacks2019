<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: /");
} else {
    include '../dbconnect.php';
    $email = $_SESSION['email'];
    $result = $conn->query("SELECT userdata FROM users WHERE email = '$email'");
    if ($result->num_rows !== 0) {
        $userdata = mysqli_fetch_assoc($result)['userdata'];
        if ($userdata === "") {
            $userdata = '{"finished": "false"}';
        }
        $userdata = json_decode($userdata, true);
        if ($userdata["finished"] === "false") {
            header("Location: form.php");
        } else {
            ?>


<?php
        }
    }
}