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
        <p>This is a Saint Louis Priory School online community in the style of popular websites like Reddit or Instagram. In order to protect privacy, the website will not be unlocked unless you have created and verified an account with a Priory email. Use the buttons above to access the website.</p>
        <h2>How do I sign up?</h2>
        <p>Use the giant button. It's right there.</p>
        <p>Once you click this button, you will be asked to create an account. You will be asked for a username, your real name, a password, and your Priory email. You will be sent an email and will be asked to confirm. This makes sure only Priory students and Alumni can have access to the website. Moderators will verify each and every account to make sure they're real people.</p>
        <h2>What if I am a teacher/staff?</h2>
        <p>Teachers are allowed here too. Sign up with your email like everybody else, and there will be an option to "elevate account". This option can be used by teachers, moderators, and staff. This will send a request that, if accepted, will give your account special status. Teachers will not be allowed to directly delete posts, however, a report on a post made by a teacher will be given special priority.</p>
        <h2>Who made this website?</h2>
        <p>In order to protect my privacy, I only show this information to users who are logged in.</p>
    </div>
</div>
<script>
    $('.jarallax').jarallax({
        speed: 0.2
    });
</script>
</body>
</html>