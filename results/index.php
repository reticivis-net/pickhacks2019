<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['probability'])) {
    header('Location: ' . '/portal');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>asobey results</title>
    </head>
    <body>
        <?php
            $header = "An error has occured.";
            $color = "black";
            $desc = "Check results/index.php";
            if ($_SESSION['probability'] == 'none') {
                $header = "Congratulations, you are in no danger of red-s or nutritional deficiency disorder.";
                $color = "green";
                $desc = "If you would like to learn more about this and want to help the cause to fight red-s and nutritional deficiency disorders please have a look at some of the websites below.";
            }
            if ($_SESSION['probability'] == 'low') {
                $header = "You are at risk for RED-S and or nutritional deficiency disorders.";
                $color = "yellow";
                $desc = "You have shown some of the signs of this and should look into this further. THere are several links below to get you started. But remember, there is no substitute for a proper examination";
            }
            if ($_SESSION['probability'] == 'medium') {
                $header = "You are at risk for RED-S and or nutritional deficiency disorders.";
                $color = "orange";
                $desc = "You have shown several of the signs of this and should look into RED-S and nutritional deficiency disorders immediately. You should also consider consulting with a doctor.";
            }
            if ($_SESSION['probability'] == 'high') {
                $header = "You have shown almost all of the signs of RED-S and nutritional deficiency disorder.";
                $color = "red";
                $desc = "Please consult a doctor immediately. There are also several links listed below for more information";
            }
            if ($_SESSION['probability'] == 'absolute') {
                $header = "<b>asobey</b> is absolutely certain that you have RED-S and nutritional deficiency disorder.";
                $color = "#bb0a1e";
                $desc = "There can be mistakes but this only happens very very rarely. Please have a look at some of the links below and consult a doctor immediately.";
            }
            echo '<h1 class="fade-in">'.$header.'</h1><div class="fade-in" style="height:10px;width:100%;background:'.$color.';border-radius:5px;margin:10px 0;"></div><p style="font-size:18px;" class="fade-in">'.$desc.'</p>'

        ?>
        <ul>
            <li class="fade-in"><a href="https://bjsm.bmj.com/content/48/7/491">BMJ's article abour RED-S</a></li>
            <li class="fade-in"><a href="http://www.aspetar.com/journal/viewarticle.aspx?id=260#.XHpg_YhKhPY">Aspetar's article of RED-S and Nutritional deficency disorder</a></li>
            <li class="fade-in"><a href="https://blogs.bmj.com/bjsm/2014/08/03/the-7-most-common-injuries-and-illnesses-seen-at-major-multisport-games/">BMJ's article about common illnesses in high level athletics</a></li>
            <li class="fade-in"><a href="https://www.olympic.org/medical-and-scientific-commission">The olympic site to help educate people about athletic health issues</a></li>
            <li class="fade-in"><a href="https://www.eatingdisorderhope.com/">An organization devoted to helping people with eating disorders</a></li>
        </ul>
        <br>
        <button type="button" class="btn btn-light fade-in" data-toggle="tooltip" data-placement="top" title="Are you sure? This will clear your current data.">Re-do form</button>
        <script>
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })
        </script>
    </body>
</html>