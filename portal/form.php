<!DOCTYPE html>
<?php
session_start();
include '../dbconnect.php';
$email = $_SESSION['email'];
$result = $conn->query("SELECT userdata FROM users WHERE email = '$email'");
$userdata = mysqli_fetch_assoc($result)['userdata'];
if ($userdata === "") {
    $userdata = '{"finished": "false"}';
}
$userdata = json_decode($userdata, true);
if ($userdata["finished"] === "true") {
    header("Location: ../");
} else {
if (isset($_POST['10'])) {
    $medicalQuestions = [];
    $lm = 10;
    for ($i = 0; $i < $lm; $i++) {
        if(isset($_POST[$i])) {
            $medicalQuestions[$i] = 1;
        }
        else $medicalQuestions[$i] = 0;
    }

    $symptomQuestions = [];
    $ls = 10;
    for ($i = 0; $i < $ls; $i++) {
        $symptomQuestions[$i] = $_POST[$i + $lm];
    }
    $userdata = [];
    $userdata["finished"] = "true";
    $userdata = json_encode(array_merge(array_merge($medicalQuestions, $symptomQuestions), $userdata));
    $result = $conn->query("UPDATE users SET userdata = '$userdata' WHERE email='$email'");
    if ($result === TRUE) { // if the DB insertion worked successfully
        header("Location: /portal/index.php");
    } else {
        echo "error whoops";
    }
}
include '../header.php';
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Main Page</title>

    <!-- Bootstrap CSS CDN -->
    <!--<link rel="stylesheet" href="style.css">-->
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../stylesheet.css">
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>

<body>

<form method="POST" id="questionnaire" onsubmit="load()">
    <!--
    <form method="POST" id="questionnaire" onsubmit="load()">
    <ul>
      <li>Do you have any history of the following medical conditions?<br>
        <input type="checkbox" name="0" value="1"> Immunilogical Condition<br>
        <input type="checkbox" name="1" value="1"> Menstrual Function<br>
        <input type="checkbox" name="2" value="1"> Bone Health problems<br>
        <input type="checkbox" name="3" value="1"> Endocrine problems<br>
        <input type="checkbox" name="4" value="1"> Metabolic<br>
        <input type="checkbox" name="5" value="1"> Hermatological problems<br>
        <input type="checkbox" name="6" value="1"> Abnormal growth<br>
        <input type="checkbox" name="7" value="1"> Psychological problems<br>
        <input type="checkbox" name="8" value="1"> Cardiovascular problems<br>
        <input type="checkbox" name="9" value="1"> Gastrointestinal problems<br><br>
      </li>
      <li>Have you ever experienced unexpected decreased endurance performace?
        <input type="radio" name="10" value="1"> Yes
        <input type="radio" name="10" value="0"> No<br>
      </li>
      <li>Do you receive injuries from seemingly harmless things?
        <input type="radio" name="11" value="1"> Yes
        <input type="radio" name="11" value="0"> No<br>
      </li>
      <li>Have you been receiving less benefeit from exercise?
        <input type="radio" name="12" value="1"> Yes
        <input type="radio" name="12" value="0"> No<br>
      </li>
      <li>Have you experienced unusual impaired judgement?
        <input type="radio" name="13" value="1"> Yes
        <input type="radio" name="13" value="0"> No<br>
      </li>
      <li>Have you encountered decreased coordination?
        <input type="radio" name="14" value="1"> Yes
        <input type="radio" name="14" value="0"> No<br>
      </li>
      <li>Have you encountered decreased concentration?
        <input type="radio" name="15" value="1"> Yes
        <input type="radio" name="15" value="0"> No<br>
      </li>
      <li>Have you been easily irratible lately?
        <input type="radio" name="16" value="1"> Yes
        <input type="radio" name="16" value="0"> No<br>
      </li>
      <li>Have you experienced signs of depression lately?
        <input type="radio" name="17" value="1"> Yes
        <input type="radio" name="17" value="0"> No<br>
      </li>
      <li>Have you become easily tired recently?
        <input type="radio" name="18" value="1"> Yes
        <input type="radio" name="18" value="0"> No<br>
      </li>
      <li>Have you become noticeably weak lately?
        <input type="radio" name="19" value="1"> Yes
        <input type="radio" name="19" value="0"> No<br>
      </li>
      <input name="finished" type="submit">
  </ul>
  </form>
  -->
    <div class="container">
        <h1>Welcome to asobey.</h1>
        <h3>Please fill out the form below.</h3>
        <ul class="list-group">
            <li class="list-group-item">Do you have any history of the following medical conditions? (Check all that apply)
                <br>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="input0" name="0" value="1">
                    <label class="custom-control-label" for="input0">Immunilogical Condition</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="input1" name="1" value="1">
                    <label class="custom-control-label" for="input1">Menstrual Function</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="input2" name="2" value="1">
                    <label class="custom-control-label" for="input2">Bone Health problems</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="input3" name="3" value="1">
                    <label class="custom-control-label" for="input3">Endocrine problems</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="input4" name="4" value="1">
                    <label class="custom-control-label" for="input4">Metabolic problems</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="input5" name="5" value="1">
                    <label class="custom-control-label" for="input5">Hermatological problems</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="input6" name="6" value="1">
                    <label class="custom-control-label" for="input6">Abnormal growth</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="input7" name="7" value="1">
                    <label class="custom-control-label" for="input7">Psychological problems</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="input8" name="8" value="1">
                    <label class="custom-control-label" for="input8">Cardiovascular problems</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="input9" name="9" value="1">
                    <label class="custom-control-label" for="input9">Gastrointestinal problems</label>
                </div>
            </li>
            <li class="list-group-item">Have you ever experienced unexpected decreased endurance performace?
                <br>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="input10yes" name="10" class="custom-control-input" value="1" required>
                    <label class="custom-control-label" for="input10yes">Yes</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="input10no" name="10" class="custom-control-input" value="0" required>
                    <label class="custom-control-label" for="input10no">No</label>
                </div>
            </li>
            <li class="list-group-item">Do you receive injuries from seemingly harmless things?
                <br>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="input11yes" name="11" class="custom-control-input" value="1" required>
                    <label class="custom-control-label" for="input11yes">Yes</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="input11no" name="11" class="custom-control-input" value="0" required>
                    <label class="custom-control-label" for="input11no">No</label>
                </div>
            </li>
            <li class="list-group-item">Have you been receiving less benefeit from exercise?
                <br>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="input12yes" name="12" class="custom-control-input" value="1" required>
                    <label class="custom-control-label" for="input12yes">Yes</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="input12no" name="12" class="custom-control-input" value="0" required>
                    <label class="custom-control-label" for="input12no">No</label>
                </div>
            </li>
            <li class="list-group-item">Have you experienced unusual impaired judgement?
                <br>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="input13yes" name="13" class="custom-control-input" value="1" required>
                    <label class="custom-control-label" for="input13yes">Yes</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="input13no" name="13" class="custom-control-input" value="0" required>
                    <label class="custom-control-label" for="input13no">No</label>
                </div>
            </li>
            <li class="list-group-item">Have you encountered decreased coordination?
                <br>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="input14yes" name="14" class="custom-control-input" value="1" required>
                    <label class="custom-control-label" for="input14yes">Yes</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="input14no" name="14" class="custom-control-input" value="0" required>
                    <label class="custom-control-label" for="input14no">No</label>
                </div>
            </li>
            <li class="list-group-item">Have you encountered decreased concentration?
                <br>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="input15yes" name="15" class="custom-control-input" value="1" required>
                    <label class="custom-control-label" for="input15yes">Yes</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="input15no" name="15" class="custom-control-input" value="0" required>
                    <label class="custom-control-label" for="input15no">No</label>
                </div>
            </li>
            <li class="list-group-item">Have you been easily irratible lately?
                <br>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="input16yes" name="16" class="custom-control-input" value="1" required>
                    <label class="custom-control-label" for="input16yes">Yes</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="input16no" name="16" class="custom-control-input" value="0" required>
                    <label class="custom-control-label" for="input16no">No</label>
                </div>
            </li>
            <li class="list-group-item">Have you experienced signs of depression lately?
                <br>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="input17yes" name="17" class="custom-control-input" value="1" required>
                    <label class="custom-control-label" for="input17yes">Yes</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="input17no" name="17" class="custom-control-input" value="0" required>
                    <label class="custom-control-label" for="input17no">No</label>
                </div>
            </li>
            <li class="list-group-item">Have you become easily tired recently?
                <br>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="input18yes" name="18" class="custom-control-input" value="1" required>
                    <label class="custom-control-label" for="input18yes">Yes</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="input18no" name="18" class="custom-control-input" value="0" required>
                    <label class="custom-control-label" for="input18no">No</label>
                </div>
            </li>
            <li class="list-group-item">Have you become noticeably weak lately?
                <br>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="input19yes" name="19" class="custom-control-input" value="1" required>
                    <label class="custom-control-label" for="input19yes">Yes</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="input19no" name="19" class="custom-control-input" value="0" required>
                    <label class="custom-control-label" for="input19no">No</label>
                </div>
            </li>
            <br>
            <button type="submit" form="questionnaire" value="Submit" class="btn btn-info" id="button">
                Submit
            </button>
            <br>
        </ul>
</form>
    </div>

<script>
    function load() {
        let button = $("#button");
        button.attr("disabled", "disabled");
        button.html("Loading... <span class=\"sr-only\">Loading...</span><span class=\"spinner-border spinner-border-sm\" role=\"status\" aria-hidden=\"true\"></span>");
        //$("#register").submit();
    }
</script>

</body>

</html>
<?php } ?>
