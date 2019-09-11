<?php
ob_start();

/* if (!isset($_SESSION)) {
    session_start();
}

if ($_SESSION['isLocalHost']) {
    $_SESSION['projectPath'] = 'Waygook-Teacher/';
    set_include_path(get_include_path() . PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT'] . '/Waygook-Teacher');
} else {
    $_SESSION['projectPath'] = '';
    set_include_path(get_include_path() . PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT']);
} */


if (!isset($_SESSION)) {
    session_start();
}

set_include_path(get_include_path() . PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT'] . '/Waygook-Teacher');

date_default_timezone_set('Asia/Seoul');

/* SET LANGUAGE */
/*
TODO: language function isn't implemented.
// languages supported
$available_langs = array('en', 'ko');
// if lang cookie isn't set, default as eng
if (!isset($_SESSION['lang'])) {
    // set default lang
    $_SESSION['lang'] = 'en';
}
// if set-lang form has been submitted
if (isset($_POST['input-set-lang'])) {
    if ($_POST['select-set-lang'] == 'en') {
        $_SESSION['lang'] = 'en';
    } elseif ($_POST['select-set-lang'] == 'ko') {
        $_SESSION['lang'] = 'ko';
    }
}
// include active language
include("resources/translations/" . $_SESSION['lang'] . ".php");
*/
