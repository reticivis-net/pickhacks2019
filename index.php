<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    define("IN_VIEW",true); // sets document as valid
    $root = $_SERVER['DOCUMENT_ROOT'];
    $root = ".";
    $title = "nnthingy";
    $desc = "Homepage.";
    include $root.'/header.php';
    ?>
    <title>priory.ml</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <link href="/static/aos.css" rel="stylesheet">
    <script src="/static/aos.js"></script>
    <script src="/static/jarallax.min.js"></script>
    <link rel="stylesheet" href="/static/animate.min.css">
    <link rel="stylesheet" href="/static/fontawesome/css/all.min.css">
</head>
<body>
<div class="portfolio-header jarallax jumbotron text-center" style="background-image: url('https://www.wonderplugin.com/videos/demo-image0.jpg');">
        <span class="vertical-align2 animated fadeIn">
            <br><br>
            <span class="h1 quicksand-bold">nnthingy</span>
            <br>
            <span class="h2 quicksand">this is ok</span>
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
                <button type="button" class="btn btn-primary btn-xl" onclick="window.location.href='/sign-in/';">Sign In</button> <button type="button" class="btn btn-success btn-xl" onclick="window.location.href='/sign-up/';">Sign Up</button>
            </span>
        </div>
        <h1>FAQ</h1>
        <br>
        <h2>What is this website?</h2>
        <p>Copy and paste these h2 and p elements for every topic. examples: "what is this" "how do i sign up" "what does it do" "how does it work". this can be copied to devpost.</p>
    </div>
</div>
<script>
    $('.jarallax').jarallax({
        speed: 0.2
    });
</script>
</body>
</html>