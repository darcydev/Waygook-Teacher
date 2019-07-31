<?php
// set DOCUMENT_ROOT variable
set_include_path(get_include_path() . PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT'] . "\Waygook-Teacher");

require_once("config/config.php");
require_once("src/models/Account.php");
require_once("src/models/User.php");
require_once("src/models/Employment.php");
require_once("src/models/MyPDO.php");
require_once("src/models/Constants.php");

$account = new Account();

require_once("src/controllers/login.php");
require_once("src/controllers/register.php");
require_once("src/views/modals/loginRegister.php");

// set bool for whether User is logged in or not
$isLoggedIn = isset($_SESSION['userEmail']) ? true : false;

if ($isLoggedIn) {
  
  // $userEmail = $_SESSION['userEmail']; // TODO: delete this line (REMOVED on 30/7/19)
  $user = new User($_SESSION['userEmail']);
  $employment = new Employment($user->getID());

  /* PDO VARIABLE */
  $db = MyPDO::instance();

  /* FETCH USER FROM DB */
  $userLoggedInRow = $user->getOtherUser($user->getID());

  /*   // TODO: delete these lines (REMOVED on 30/7/19)
  $stmt = $db->run($sql, [$userEmail]);
  $userLoggedInRow = $stmt->fetch(PDO::FETCH_ASSOC); */

  // set bool for whether User is student or not
  $isStudent = $userLoggedInRow['role'] == 'student' ? true : false;

  /* INCLUDE FILES */
  require_once("src/controllers/sendMessage.php");
  require_once("src/controllers/scheduleLesson.php");
  require_once("src/views/modals/scheduleLesson.php");
  require_once("src/views/modals/sendMessage.php");
  require_once("src/views/modals/confirmAction.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>WaygookTeacher</title>
  <link href="https://fonts.googleapis.com/css?family=Oxygen:400,700|Arimo:400,700" rel="stylesheet">
  <link rel="stylesheet" href="/Waygook-Teacher/resources/sass/main.css">

  <!-- TODO: there's only one function in here, move it somehwere else -->
  <script src="/Waygook-Teacher/public/js/main.js"></script>
  <!-- the reason this JS file is loaded in the <head> is because it doesn't work unless it's loaded before the header -->
  <script src="/Waygook-Teacher/src/js/navBar.js"></script>

  <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.5/css/mdb.min.css" rel="stylesheet">
  <!-- JQuery -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js">
  </script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.5/js/mdb.min.js">
  </script>
</head>