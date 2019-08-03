<?php
if ($_SERVER['HTTP_HOST'] == "localhost") {
  set_include_path(get_include_path() . PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT'] . '/Waygook-Teacher');
} else {
  set_include_path(get_include_path() . PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT']);
}

require("config/config.php");

session_destroy();

/* BUG: not working (???) */
$homepage = $_SESSION['projectPath'];
header("Location: /" . $homepage . "public/index.php");
