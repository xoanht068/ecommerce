<?php
session_start();
define('HOST', "https://" . $_SERVER['HTTP_HOST']);
require_once "./mvc/bridge.php";
$myApp = new App();
?>