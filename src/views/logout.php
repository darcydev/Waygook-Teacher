<?php
set_include_path(get_include_path() . PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT']);

require("config/config.php");

session_destroy();

/* BUG: not working */
$url = '/public/index.php';
header("Location:" . $url);