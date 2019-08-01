<?php
// set DOCUMENT_ROOT variable
set_include_path(get_include_path() . PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT']);

require_once("config/config.php");
require_once("src/models/MyPDO.php");
require_once("src/models/User.php");
require_once("src/models/Employment.php");

// SET UP DB
$db = MyPDO::instance();
$user = new User($_SESSION['userEmail']);
$employment = new Employment($user->getID());

$lessonID = $_POST['lessonID'];

echo $employment->confirmLesson($lessonID);