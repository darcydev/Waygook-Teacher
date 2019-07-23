<?php
// set DOCUMENT_ROOT variable
set_include_path(get_include_path() . PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT'] . "\Waygook-Teacher");

require("config/config.php");
include("src/models/Account.php");
include("src/models/User.php");
include("src/models/MyPDO.php");
include("src/models/Constants.php");

$account = new Account();

include("src/controllers/login.php");
include("src/controllers/register.php");

if (isset($_SESSION['userEmail'])) {
    $loggedIn = true;
    $userEmail = $_SESSION['userEmail'];

    // fetch the User's detail from the DB
    $user = new User($userEmail);
    $db = MyPDO::instance();
    $sql = "SELECT * FROM Users WHERE email = ?";
    $stmt = $db->run($sql, [$userEmail]);
    $userLoggedInRow = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    $loggedIn = false;
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

    <!-- MY JAVASCRIPT -->
    <!-- BUG: navBarLinks is not defined when the JS is loaded at the bottom of the page -->
    <script src="/Waygook-Teacher/public/js/main.js"></script>

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
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.5/js/mdb.min.js">
    </script>
</head>