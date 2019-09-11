<?php
if (!isset($_SESSION)) {
  session_start();
}

set_include_path(get_include_path() . PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT'] . '/Waygook-Teacher');

// TODO: allow User to update their timezone, and reflect that change across the whole site
date_default_timezone_set('Asia/Seoul');