<?php
ob_start();
session_start();

date_default_timezone_set('Asia/Seoul');

/* SET LANGUAGE */
// languages supported
$available_langs = array('en', 'ko');
// if lang cookie isn't set, default as eng
if (! isset($_SESSION['lang'])) {
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
include("languages/" . $_SESSION['lang'] . ".php");
?>
