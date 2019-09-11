<?php
require_once("server/config/requireFiles.php");

// Models
require_once("server/models/Account.php");
require_once("server/models/User.php");
require_once("server/models/Employment.php");
require_once("server/models/MyPDO.php");
require_once("server/models/Constants.php");

/* 
TODO: consider whether I should import these here, or whether to simply make Ajax requests when required
// Controllers
require_once("server/controllers/login.php");
require_once("server/controllers/register.php");

// Views
require_once("server/views/modals/loginRegister.php"); */

$account = new Account();

// set bool for whether User is logged in or not
$isLoggedIn = isset($_SESSION['userEmail']) ? true : false;

if ($isLoggedIn) {

  $user = new User($_SESSION['userEmail']);
  $employment = new Employment($user->getID());

  /* PDO VARIABLE */
  $db = MyPDO::instance();

  /* FETCH USER FROM DB */
  $userLoggedInRow = $user->getOtherUser($user->getID());

  // set bool for whether User is student or not
  $isStudent = $userLoggedInRow['role'] == 'student' ? true : false;

  /* INCLUDE FILES */
  require_once("src/controllers/sendMessage.php");
  require_once("src/controllers/scheduleLesson.php");
  require_once("src/views/modals/scheduleLesson.php");
  require_once("src/views/modals/sendMessage.php");
  require_once("src/views/modals/confirmAction.php");
} else {
  // if the User isn't logged in, redirect them to index.php
  // TOFIX: not working (infinite redirects)
  // header("Location: http://waygookteacher.com");
}