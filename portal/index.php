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
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        $root = "..";
        $title = "asobey - Portal";
        $desc = "Sign in to asobey";
        include $root.'/header.php';
        ?>
        <title>asobey</title> <!-- fallback title -->
        <style>
            canvas {
                position: absolute;
                top: 0;
                left: 0;
                transition: width 2s;
            }
            html,body {
                background:#111111;
                color:#ddd;
                text-align: center;
            }
            .counter {
                display:none;
            }
        </style>

    </head>
    <body>
        <canvas id=c></canvas>
    </body>
    <div class="counter">1000</div>
    <script src="NNanimation.js"></script>
    <script>
    </script>
    <script>
        setTimeout(function(){
            let xhr = new XMLHttpRequest();
            xhr.open("GET", "neuralnetwork.php", true);
            xhr.onload = function (e) {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        console.log(xhr.responseText);
                        animation = true;
                        animation_height = window.innerHeight;
                        animation_height2 = window.innerHeight;
                    } else {
                        console.error(xhr.statusText);
                    }
                }
            };
            xhr.onerror = function (e) {
                console.error(xhr.statusText);
            };
            xhr.send(null);
        }, 3000);
    </script>
</html>

<?php
        }
    }
}