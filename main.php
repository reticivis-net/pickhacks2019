<!DOCTYPE html>
<?php
if (isset($_POST['finished'])) {
  $medicalQuestions = []
  $l = 10;
  for $i = 0; $i < $l; $i++ {
    if(isset($_POST[$i])) $medicalQuestions($i) = 1;
    else $medicalQuestions($i) = 0;
  }
  $symptomQuestions = []
  $l = 10;
  for $i = 0; $i < $l; $i++ {
    $symptomQuestions[$i] = $_POST[$i + 10]
  }
}
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Main Page</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>

<body>

  <form method="POST">
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


</body>

</html>
