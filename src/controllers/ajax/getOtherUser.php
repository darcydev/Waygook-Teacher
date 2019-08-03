<?php
if ($_SERVER['HTTP_HOST'] == "localhost") {
  set_include_path(get_include_path() . PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT'] . '/Waygook-Teacher');
} else {
  set_include_path(get_include_path() . PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT']);
}

require_once("config/config.php");
require_once("src/models/MyPDO.php");
require_once("src/models/User.php");

// SET UP DB
$db = MyPDO::instance();
$user = new User($_SESSION['userEmail']);

// AJAX REQUEST
$otherID = $_POST['otherID'];

// SQL QUERY
$otherRow = $user->getOtherUser($otherID);

echo json_encode($otherRow);