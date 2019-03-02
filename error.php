<?php
$codes = array(
    403 => array('403', 'Forbidden', 'The server has refused to fulfill your request. That\'s all we know.'),
    404 => array('404', 'Not Found', 'The document/file requested was not found on this server. That\'s all we know.'),
    405 => array('405', 'Method Not Allowed', 'The method specified in the Request-Line is not allowed for the specified resource. That\'s all we know.'),
    408 => array('408', 'Request Timeout', 'Your browser failed to send a request in the time allowed by the server. That\'s all we know.'),
    418 => array("418", "I'm a teapot.", "The requested entity body is short and stout. <br><span style='color:#777;'>Tip me over and pour me out.</span>"),
    500 => array('500', 'Internal Server Error', 'The request was unsuccessful due to an unexpected condition encountered by the server. That\'s all we know.'),
    502 => array('502', 'Bad Gateway', 'The server received an invalid response from the upstream server while trying to fulfill the request. That\'s all we know.'),
    504 => array('504', 'Gateway Timeout', 'The upstream server failed to send a request in the time allowed by the server. That\'s all we know.'),
);
if(isset($_SERVER['REDIRECT_STATUS'])) {
    $status = $_SERVER['REDIRECT_STATUS'];
    $title = $codes[$status][0];
    $subtitle = $codes[$status][1];
    $message = $codes[$status][2];
} elseif (isset($error)) {
    $title = $error[0];
    $subtitle = $error[1];
    $message = $error[2];
} else {
    $title = "Error";
    $subtitle = "An error has occured.";
    $message = "Something has went wrong. That's all we know.";
}
if($title == "418") {
    http_response_code(418);
}
include $_SERVER['DOCUMENT_ROOT'].'/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/static/bootstrap.min.css">
    <style>
        .img {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width:80%;
        }
        .row {
            margin:auto;
            text-align:center;
        }
        .row h2 {
            text-align:center;
            font-size:60px;
        }
        .row h1 {
            font-size: 200px;
            text-align: center;
            margin-bottom: -30px;
        }
        .row p {
            font-size: 25px;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <br><br>
    <div class="row">
        <div class="col-md-6"><a href="/"><img class="img" src="https://ih0.redbubble.net/image.118338462.1581/pp,550x550.u2.jpg"></a></div>
        <div class="col-md-6">
            <h1><?php echo $title;?></h1>
            <h2><?php echo $subtitle;?></h2>
            <p><?php echo $message;?></p>
        </div>
    </div>
</div>
</body>
</html>