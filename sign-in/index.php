<?php

if(isset($_POST['name']) && !empty($_POST['name']) AND isset($_POST['email']) && !empty($_POST['email'])){
    // Form Submited
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    $root = "..";
    $title = "priory.ml - Sign In";
    $desc = "Sign in to priory.ml";
    include $root.'/header.php';
    ?>
    <title>priory.ml</title> <!-- fallback title -->
</head>
<body>
<nav class="navbar navbar-expand-sm bg-light navbar-light">
    <!-- Brand/logo -->
    <a class="navbar-brand" href="#">
        <img src="<?php echo $root;?>/data/full name.png" alt="logo" style="height:40px;">
    </a>

    <!-- Links -->
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $root;?>">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $root;?>/sign-up">Sign Up</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Sign In</a>
            </li>
        </ul>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $root;?>/sign-in"><button type="button" class="btn btn-primary">Sign In</button></a>
            </li>
        </ul>
    </div>
</nav>
<div class="container body">
    <?php
    if(isset($message) and isset($type)) {
        ?>
        <div class="alert alert-<?php echo $type;?>">
            <?php echo $message;?>
        </div>
        <?php
    }
    ?>
    <h1>Sign in to priory.ml</h1>
    <br>
    <form role="form" action="index.php" method="POST">

        <div class="form-group">
            <input type="email" name="email" id="email" class="form-control input form-control-lg" placeholder="Email Address">
        </div>
        <div class="form-group">
            <input type="password" name="password" id="password" class="form-control input form-control-lg" placeholder="Password">
        </div>

        <input type="submit" value="Sign In" class="btn btn-info btn-block btn-lg">

    </form>
</div>
</body>
</html>
<?php include $root.'/footer.php'?>