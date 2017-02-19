<?php
include_once 'config.php';
$a = new actions();

$a->getJsonNbClient(isset($_GET['callback']));
//$a->getJsonNbClient();
?>