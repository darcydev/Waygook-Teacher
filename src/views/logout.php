<?php
include("config/config.php");

session_destroy();

/* BUG: not working */
$url = $_SERVER['SERVER_NAME'] . '/Waygook-Teacher/public/index.php';
header("Location:" . $url);

echo $url;

exit;
