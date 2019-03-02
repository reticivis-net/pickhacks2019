<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['probability'])) {
    header('Location: ' '/portal');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>asobey results</title>
    </head>
    <body>
        <?php
            if $_SESSION['probability'] == 'none' {
                echo '<h1 style="color:green"><strong>Congradulations, you are in no danger of red-s or nutritional difficency disorder</strong></h1>';
                echo 'If you would like to learn more about this and want to help the cause to fight red-s and nutritional difficency disorders please have a look at some of the websites below';
            }
        ?>
        <ul>
            <li><a href="https://bjsm.bmj.com/content/48/7/491">BMJ's article abour RED-S</a></li>
            <li><a href="http://www.aspetar.com/journal/viewarticle.aspx?id=260#.XHpg_YhKhPY">Aspetar's article of RED-S and Nutritional deficency disorder</a></li>
            <li><a href="https://blogs.bmj.com/bjsm/2014/08/03/the-7-most-common-injuries-and-illnesses-seen-at-major-multisport-games/">BMJ's article about common illnesses in high level athletics</a></li>
            
        </ul>
    </body>
</html>