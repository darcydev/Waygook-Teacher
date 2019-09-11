<?php
set_include_path(get_include_path() . PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT'] . '/Waygook-Teacher');

require_once("config/config.php");

session_destroy();

// direct back to homepage
header("Location: /Waygook-Teacher/public/index.php");
