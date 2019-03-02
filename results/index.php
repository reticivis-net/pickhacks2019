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
        var_dump($_SESSION['probability']);
            if ($_SESSION['probability'] == 'none') {
                echo '<h1 style="color:green"><strong>Congradulations, you are in no danger of red-s or nutritional difficency disorder</strong></h1>';
                echo 'If you would like to learn more about this and want to help the cause to fight red-s and nutritional difficency disorders please have a look at some of the websites below';
            }
            if ($_SESSION['probability'] == 'low') {
                echo '<h1 style="color:yellow"><strong>You are at rist for RED-S and or nutritional diffency disorders. You have shown some of the signs of this and should look into this further. THere are several links below to get you started. But remember, there is no substitute for a proper examination</strong></h1>';
            }
            if ($_SESSION['probability'] == 'medium') {
                echo '<h1 style="color:orange"><strong>You are at rist for RED-S and or nutritional diffency disorders. You have shown several of the signs of this and should look into RED-S and nutritional diffency disorders immidietly. You should also consider consulting with a doctor</strong></h1>';
            }
            if ($_SESSION['probability'] == 'high') {
                echo '<h1 style="color:red"><strong>You have shown almost all of the signs of RED-S and nutritional difficency disorder. Please consult a doctor immidietly. There are also several links listed below for more information</strong></h1>';
            }
            if ($_SESSION['probability'] == 'absolute') {
                echo '<h1 style="color:red"><strong>Our Neural Network is absolutely certain that you have either RED-S and nutritional difficency disorder. There can be mistakes but this only happens very very rarely. Please have a look at some of the links below</strong></h1>';
            }
            

        ?>
        <ul>
            <li><a href="https://bjsm.bmj.com/content/48/7/491">BMJ's article abour RED-S</a></li>
            <li><a href="http://www.aspetar.com/journal/viewarticle.aspx?id=260#.XHpg_YhKhPY">Aspetar's article of RED-S and Nutritional deficency disorder</a></li>
            <li><a href="https://blogs.bmj.com/bjsm/2014/08/03/the-7-most-common-injuries-and-illnesses-seen-at-major-multisport-games/">BMJ's article about common illnesses in high level athletics</a></li>
            <li><a href="https://www.olympic.org/medical-and-scientific-commission">The olympic site to help educate people about athletic health issues</a></li>
            <li><a href="https://www.eatingdisorderhope.com/">An organization devoted to helping people with eating disorders</a></li>
        </ul>
    </body>
</html>