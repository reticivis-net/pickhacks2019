<?php
if(!isset($title)) {
    $title = "asobey";
}
if(!isset($desc)) {
    $desc = "asobey";
}
if (!isset($root)) {
    $root = $_SERVER['DOCUMENT_ROOT'];
}
?>

    <meta charset="UTF-8">
    <link rel="shortcut icon" href="data/fcropped.png"/>
    <title><?php echo $title;?></title>
    <!-- meta -->
    <meta name="nnthingy" content="<?php echo $desc; ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- style/beanstrap -->
    <link rel="stylesheet" href="/static/bootstrap.min.css">
    <script src="/static/jquery-3.3.1.slim.min.js"></script>
    <script src="/static/popper.min.js"></script>
    <script src="/static/bootstrap.min.js"></script>