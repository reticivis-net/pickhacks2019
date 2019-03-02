<?php
session_start();
if ( isset( $_SESSION['email'] ) ) {
    header("Location: /portal");
} else {


if(isset($_POST['first_name']) && !empty($_POST['first_name']) AND isset($_POST['last_name']) && !empty($_POST['last_name']) AND isset($_POST['last_name']) && !empty($_POST['last_name']) AND isset($_POST['email']) && !empty($_POST['email']) AND isset($_POST['password']) && !empty($_POST['password']) AND isset($_POST['password_confirmation']) && !empty($_POST['password_confirmation']) AND isset($_POST['username']) && !empty($_POST['username'])){
    function random10() {
        $number = "";
        for($i=0; $i<10; $i++) {
            $min = ($i == 0) ? 1:0;
            $number .= mt_rand($min,9);
        }
        return $number;
    }
    include $_SERVER['DOCUMENT_ROOT']."/dbconnect.php";
    function sql_escape($string) {
        global $conn;
        return $conn->real_escape_string($string);
    }
    $username = sql_escape($_POST['username']);
    $first_name = sql_escape($_POST['first_name']);
    $last_name = sql_escape($_POST['last_name']);
    $email = sql_escape($_POST['email']);
    $password = sql_escape($_POST['password']);
    $password_confirmation = sql_escape($_POST['password_confirmation']);
    if($password == $password_confirmation) { // if passwords match
        $result = $conn->query("SELECT id FROM users WHERE email = '$email'");
        if($result->num_rows === 0) { // if email doesn't exist
            $result = $conn->query("SELECT id FROM users WHERE username = '$username'");
            if($result->num_rows === 0) { // if username doesn't exist
                // all inputs valid, account creation can start
                // generate/get password, globalids, verify hash, etc.
                $globalid = random10();
                $hashed_pw = password_hash($password, PASSWORD_BCRYPT);
                $result = $conn->query("SELECT id FROM users WHERE globalid = $globalid");
                $num_rows = $result->num_rows;
                // get unique id
                while ($num_rows > 0) {
                    $globalid = random10();
                    $result = $conn->query("SELECT id FROM users WHERE globalid = $globalid");
                    $num_rows = $result->num_rows;
                }
                // insert into DB
                $result = $conn->query("INSERT INTO users (globalid, username, email, firstname, lastname, password) VALUES ('$globalid', '$username', '$email', '$first_name', '$last_name', '$hashed_pw')");
                if ($result === TRUE) { // if the DB insertion worked successfully
                    $message = "Your account is almost ready! Go to the sign in page to sign into your account and complete the final step!";
                    $type = "success";

                } else {
                    $message = "<b>Severe Error.</b> Please email priorydotml@gmail.com with the error below.<br>Database Error: '".$conn->error."'";
                    $type = "danger";
                }
            } else {
                $message = "Username taken.";
                $type = "warning";
            }
        } else {
            $message = "Email already exists.";
            $type = "warning";
        }
        // fields are valid
    } else {
        $message = "Passwords do not match.";
        $type = "warning";
    }
}

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <?php
        $root = "..";
        $title = "nnthingy - Sign Up";
        $desc = "Sign Up for nnthingy";
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
        <h1>Fill out the form below to sign up for nnthingy</h1>
        <br>
        <form role="form" action="./" method="POST" id="register" onsubmit="load()">
            <div class="form-group">
                <input type="text" name="username" id="username" class="form-control input form-control-lg" placeholder="Username" required>
            </div>
            <div class="row">

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="text" name="first_name" id="first_name" class="form-control input form-control-lg" placeholder="First Name" required>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="text" name="last_name" id="last_name" class="form-control input form-control-lg" placeholder="Last Name" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <input type="email" name="email" id="email" class="form-control input form-control-lg" placeholder="Email Address" required>
            </div>

            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control input form-control-lg" placeholder="Password" required>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input form-control-lg" placeholder="Confirm Password" required>
                    </div>
                </div>
            </div>
            <button type="submit" form="register" value="Register" class="btn btn-info btn-block btn-lg" id="button">
                Register
            </button>
        </form>

        <script>
            function load() {
                let button = $("#button");
                button.attr("disabled", "disabled");
                button.html("Loading... <span class=\"sr-only\">Loading...</span><span class=\"spinner-border spinner-border-sm\" style=\"width: 25px; height: 25px;\" role=\"status\" aria-hidden=\"true\"></span>");
                //$("#register").submit();
            }
        </script>
    </div>
    </body>
    </html>
<?php } ?>