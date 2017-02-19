<?php
require '_includes/autoloader.class.php'; 
Autoloader::register(); 

//affiche les lignes de debug dans les logs
DEFINE('DEBUG', false); //default -> false 
DEFINE('BDD_IP','localhost'); //default -> localhost
DEFINE('BDD_USER','xxxx');
DEFINE('BDD_PASS','xxxx');
DEFINE('BDD_SCHEMA','xxxx'); //default -> okovision
DEFINE('LOGFILE',__DIR__.'/_logs/okovision.log');
date_default_timezone_set('Europe/Paris');


