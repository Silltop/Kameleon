<!doctype html>
<html lang="pl">
<head>
    <?php require_once($_SERVER['DOCUMENT_ROOT'].'/header.php'); ?>
    <title>Kameleon | Wielonarzędzie</title>

</head>
<body id="content">


<?php
ini_set('display_errors', 1);
require_once('navbar.php');
?>

<?php
require_once('plugin_parser.php');
$obj = new plugin_parser();
$obj -> get_plugins();
?>

</body>
</html>

<?php



?>
