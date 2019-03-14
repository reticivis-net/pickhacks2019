<?php
session_start();
//$_SESSION['probability'] = "absolute";
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
                        background:#eee;
                    }
                    .results-info {
                        margin:20px;
                        padding:20px;
                        border-radius:5px;
                        background:#fff;
                        bottom:-100px;
                        position: relative;
                        transition: bottom 2s ease 0s;
                    }
                    .fade-in {
                        bottom:-100px;
                        position: relative;
                        transition: bottom 2s ease 0s;
                    }
                </style>

            </head>
            <body>
            <canvas id=c></canvas>
            <div class="container">
                <div class="results">
                </div>
            </div>

            </body>
            <script>
                $(function () {
                    $('[data-toggle="tooltip"]').tooltip()
                })
                let response = "";
                $(document).ready(function() {
                    $('.results-info').hide();
                });
                setTimeout(function(){
                    let xhr = new XMLHttpRequest();
                    xhr.open("GET", "/results/index.php", true);
                    xhr.onload = function (e) {
                        if (xhr.readyState === 4) {
                            if (xhr.status === 200) {
                                console.log(xhr.responseText);
                                animation = true;
                                animation_height = window.innerHeight;
                                animation_height2 = window.innerHeight;
                                response = xhr.responseText;
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
                function animateEach() {
                    $("canvas").hide();
                    $(".results").html(response);
                    $('.fade-in').hide();
                    $(".fade-in").each(function(i) {
                        console.log(i);
                        let self = $(this);
                        setTimeout(function(){ self.fadeIn().css("bottom", "0"); }, 500 * i);
                    });
                }
            </script>
            <script src="NNanimation.js"></script>
            </html>

            <?php
        }
    }
}