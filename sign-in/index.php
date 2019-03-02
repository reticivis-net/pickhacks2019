<?php
session_start();
if ( isset( $_SESSION['email'] ) ) {
    header("Location: /portal");
} else {


include "../dbconnect.php";
if(isset($_POST['password']) && !empty($_POST['password']) AND isset($_POST['email']) && !empty($_POST['email'])){
    function sql_escape($string) {
        global $conn;
        return $conn->real_escape_string($string);
    }
    $email = sql_escape($_POST['email']);
    $password = sql_escape($_POST['password']);
    $hashed_pw = password_hash($password, PASSWORD_BCRYPT);
    $result = $conn->query("SELECT password FROM users WHERE email = '$email'");
    if ($result->num_rows !== 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['email'] = $email;
            header("Location: /portal");
        } else {
            $message = "Password is incorrect.";
            $type = "warning";
        }
    } else {
        $message = "Email does not exist.";
        $type = "warning";
    }
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
        <!--<img src="/data/full name.png" alt="logo" style="height:40px;">-->
        <h2>nnthingy</h2>
    </a>

    <!-- Links -->
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Sign Up</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/sign-in">Sign In</a>
            </li>
        </ul>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="/sign-in"><button type="button" class="btn btn-primary">Sign In</button></a>
            </li>
        </ul>
    </div>
</nav>
<div class="container body">
    <br>
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
    <form role="form" action="index.php" method="POST" id="signin" onsubmit="load()">

        <div class="form-group">
            <input type="email" name="email" id="email" class="form-control input form-control-lg" placeholder="Email Address" required>
        </div>
        <div class="form-group">
            <input type="password" name="password" id="password" class="form-control input form-control-lg" placeholder="Password" required>
        </div>

        <button type="submit" form="signin" value="Sign In" class="btn btn-info btn-block btn-lg" id="button">
            Sign In
        </button>

    </form>
</div>
<script>
    function load() {
        let button = $("#button");
        button.attr("disabled", "disabled");
        button.html("Loading... <span class=\"sr-only\">Loading...</span><span class=\"spinner-border spinner-border-sm\" style=\"width: 25px; height: 25px;\" role=\"status\" aria-hidden=\"true\"></span>");
        //$("#register").submit();
    }
</script>
</body>
</html>
<?php } ?>