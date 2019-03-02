<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    define("IN_VIEW",true); // sets document as valid
    $root = $_SERVER['DOCUMENT_ROOT'];
    $root = ".";
    $title = "asobey";
    $desc = "Homepage.";
    include $root.'/header.php';
    ?>
    <title>Asobey</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <link href="/static/aos.css" rel="stylesheet">
    <script src="/static/aos.js"></script>
    <script src="/static/jarallax.min.js"></script>
    <link rel="stylesheet" href="/static/animate.min.css">
    <link rel="stylesheet" href="/static/fontawesome/css/all.min.css">
</head>
<body>
<div class="portfolio-header jarallax jumbotron text-center" style="background-image: url('data/oui.png');">
        <span class="vertical-align2 animated fadeIn">
            <br>
            <img alt="icon" src="/data/cropped.png" class="header-image" width="50%">
            <br>
            <span class="h2 quicksand">a synthetic organic brain educating you</span>
            <br>
            <a class="no-a-style" href="#start"><span class="h1 animated fadeInUp delay-1s slow"><i class="fas fa-angle-down"></i></span></a>
        </span>
</div>
<div class="container-fluid">
    <div class="container body" id="start">
        <div class="text-center">
            <span>
                <span class="h1" style="color:black;">Please Sign Up or Sign In.</span>
                <br>
                <!--<button type="button" class="btn btn-primary btn-xl" onclick="window.location.href='/sign-in/';">Sign In</button> <button type="button" class="btn btn-success btn-xl" onclick="window.location.href='/sign-up/';">Sign Up</button>-->
                <a href="/sign-up"><div id="sign-up" class="button"></div></a><a href="/sign-in"><div class='button' id="sign-in"></div></a>
            </span>
        </div>
        <h1>FAQ</h1>
        <br>
        <h2>What is Asobey?</h2>
        <p>Asobey is a neural network used to identify medical abnormalities in the athletes of today.</p>
        <h2>What does it do?</h2>
        <p>It is a Neural Network that has been trained on over 10,000 different symptoms and previous illnesses to help athletes find out if they are at risk for certain dangerous and preventable diseases.</p>
        <h2>How was it built?</h2>
        <p>We used python 3.7 in order to create a neural network, and then trained it on data found from several health organizations(including Aspetar and BMJ). </p>
        <h2>What is this website?</h2>
        <p>Copy and paste these h2 and p elements for every topic. examples: "what is this" "how do i sign up" "what does it do" "how does it work". this can be copied to devpost.</p>
        <h2>What is this website?</h2>
        <p>Copy and paste these h2 and p elements for every topic. examples: "what is this" "how do i sign up" "what does it do" "how does it work". this can be copied to devpost.</p>
        <h2>What is this website?</h2>
        <p>Copy and paste these h2 and p elements for every topic. examples: "what is this" "how do i sign up" "what does it do" "how does it work". this can be copied to devpost.</p>

    </div>
</div>
<script>
    $('.jarallax').jarallax({
        speed: 0.2
    });
</script>
<script type="text/javascript">
    <!--//--><![CDATA[//><!--
    let images = [];
    function preload() {
        for (i = 0; i < preload.arguments.length; i++) {
            images[i] = new Image();
            images[i].src = preload.arguments[i]
        }
    }
    preload(
        "data/sign-up-hover",
        "data/sign-in-hover"
    )
    //--><!]]>
</script>
</body>
</html>
