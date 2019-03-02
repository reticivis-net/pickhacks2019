<!DOCTYPE html>
<?php
if (isset($_POST['finished'])) {
//echo 'sdf';
    $symptomQuestions = [];
    $ls = 10;
    for ($i = 0; $i < $ls; $i++) {
        $symptomQuestions[$i] = $_POST[$i + 10];
    }
        $num1 = $symptomQuestions[0];
        $num2 = $symptomQuestions[1];
        $num3 = $symptomQuestions[2];
        $num4 = $symptomQuestions[3];
        $num5 = $symptomQuestions[4];
        $num6 = $symptomQuestions[5];
        $num7 = $symptomQuestions[6];
        $num8 = $symptomQuestions[7];
        $num9 = $symptomQuestions[8];
        $num10 = $symptomQuestions[9];
 
        $last_line = system('python C:/xampp/htdocs/pickhacks2019/NeuralNetwork.py "r" "10" "'.$num1.'" "'.$num2.'" "'.$num3.'" "'.$num4.'" "'.$num5.'" "'.$num6.'" "'.$num7.'" "'.$num8.'" "'.$num9.'" "'.$num10.'"', $retval);
        //var_dump($last_line);
        if (!isset($_SESSION)) {
            session_start();
        }
        $var1 = $last_line[0];
        $var2 = $last_line[1];
        $var3 = $last_line[2];
        $var4 = $last_line[3];
        $var5 = $last_line[4];
        if ($var5 == 1) {
            $_SESSION['probability'] = 'absolute';
        }
        elseif ($var4 == 1) {
            $_SESSION['probability'] = 'high';
        }
        elseif ($var3 == 1){
            $_SESSION['probability'] = 'medium';
        }
        elseif ($var2 == 1) {
            $_SESSION['probability'] = 'low';
        }
        elseif ($var1 == 1) {
            $_SESSION['probability'] = 'none';
        }
        else {
            $_SESSION['probability'] = 'none';
        }
        echo '<meta http-equiv="Refresh" CONTENT="0; URL=/results">';
        
    }
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
    <?php include '../header.php';?>
</head>

<body>
<nav class="navbar navbar-expand-sm bg-light navbar-light">
        <!-- Brand/logo -->
        <a class="navbar-brand" href="/">
            <img src="/data/cropped.png" alt="logo" style="height:40px;">
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
                <li class="nav-item">
                    <a class="nav-link" href="/portal">Analyasis</a>
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
    <br>
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
            <button name ='finished' type="submit" form="questionnaire" value="Submit" class="btn btn-info" id="button">
                Submit
            </button><br>
        </ul>
</form>
    </div>


</body>

</html>
<?php  ?>
