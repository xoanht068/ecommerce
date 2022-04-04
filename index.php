<?php
session_start();
define('HOST',"http://".$_SERVER['HTTP_HOST'] . "/ecommerce");
require_once "./mvc/bridge.php";
$myApp = new App();
?>