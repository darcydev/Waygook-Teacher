<?php
set_include_path(get_include_path() . PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT'] . "\Waygook-Teacher");

require("config/config.php");

session_destroy();

/* BUG: not working */
$url = '/Waygook-Teacher/public/index.php';
header("Location:" . $url);