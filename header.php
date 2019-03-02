<?php
if(!isset($title)) {
    $title = "nnthingy";
}
if(!isset($desc)) {
    $desc = "nnthingy";
}
if (!isset($root)) {
    $root = $_SERVER['DOCUMENT_ROOT'];
}
?>

    <meta charset="UTF-8">
    <link rel="shortcut icon" href="/favicon.ico"/>
    <title><?php echo $title;?></title>
    <!-- meta -->
    <meta name="nnthingy" content="<?php echo $desc; ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- style/beanstrap -->
    <link rel="stylesheet" href="/static/bootstrap.min.css">
    <script src="/static/jquery-3.3.1.slim.min.js"></script>
    <script src="/static/popper.min.js"></script>
    <script src="/static/bootstrap.min.js"></script>