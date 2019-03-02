<!DOCTYPE html>
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

  <form action="./complete.php" method="POST">
    <ul>
      <li>Do you have any history of the following medical conditions?<br>
        <input type="checkbox" name="1_yellow1" value="1_yellow1"> Immunilogical Condition<br>
        <input type="checkbox" name="1_green1" value="1_green1"> Menstrual Function<br>
        <input type="checkbox" name="1_purple1" value="1_purple1"> Bone Health problems<br>
        <input type="checkbox" name="1_blue1" value="1_blue1"> Endocrine problems<br>
        <input type="checkbox" name="1_orange1" value="1_orange1"> Metabolic<br>
        <input type="checkbox" name="1_yellow2" value="1_yellow2"> Hermatological problems<br>
        <input type="checkbox" name="1_green2" value="1_green2"> Abnormal growth<br>
        <input type="checkbox" name="1_purple2" value="1_purple2"> Psychological problems<br>
        <input type="checkbox" name="1_blue2" value="1_blue2"> Cardiovascular problems<br>
        <input type="checkbox" name="1_orange2" value="1_orange2"> Gastrointestinal problems<br><br>
      </li>
      <li>Have you ever experienced unexpected decreased endurance performace?
        <input type="radio" name="2_yellow1" value="2_yellow1"> Yes
        <input type="radio" name="2_yellow1" value="2_yellow1"> No<br>
      </li>
      <li>Do you receive injuries from seemingly harmless things?
        <input type="radio" name="2_green1" value="2_green1"> Yes
        <input type="radio" name="2_green1" value="2_green1"> No<br>
      </li>
      <li>Have you been receiving less benefeit from exercise?
        <input type="radio" name="2_purple1" value="2_purple1"> Yes
        <input type="radio" name="2_purple1" value="2_purple1"> No<br>
      </li>
      <li>Have you experienced unusual impaired judgement?
        <input type="radio" name="2_blue1" value="2_blue1"> Yes
        <input type="radio" name="2_blue1" value="2_blue1"> No<br>
      </li>
      <li>Have you encountered decreased coordination?
        <input type="radio" name="2_orange1" value="2_orange1"> Yes
        <input type="radio" name="2_orange1" value="2_orange1"> No<br>
      </li>
      <li>Have you encountered decreased concentration?
        <input type="radio" name="2_yellow2" value="2_yellow2"> Yes
        <input type="radio" name="2_yellow2" value="2_yellow2"> No<br>
      </li>
      <li>Have you been easily irratible lately?
        <input type="radio" name="2_green2" value="2_green2"> Yes
        <input type="radio" name="2_green2" value="2_green2"> No<br>
      </li>
      <li>Have you experienced signs of depression lately?
        <input type="radio" name="2_purple2" value="2_purple2"> Yes
        <input type="radio" name="2_purple2" value="2_purple2"> No<br>
      </li>
      <li>Have you become easily tired recently?
        <input type="radio" name="2_blue2" value="2_blue2"> Yes
        <input type="radio" name="2_blue2" value="2_blue2"> No<br>
      </li>
      <li>Have you become noticeably weak lately?
        <input type="radio" name="2_orange2" value="2_orange2"> Yes
        <input type="radio" name="2_orange2" value="2_orange2"> No<br>
      </li>
      <input name="finished" type="submit">
  </ul>
  </form>


</body>

</html>
