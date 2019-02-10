<?php
include("includes/config.php");
include("includes/classes/MyPDO.php");
include("includes/classes/Account.php");
include("includes/classes/Constants.php");
include("includes/classes/User.php");

if(isset($_SESSION['userLoggedIn'])) {
    $userLoggedIn = $_SESSION['userLoggedIn'];
}
else {
	header("Location: register.php");
}

/* AIM -- don't delete
    1) Fetch db details of userLoggedIn
        -- For the purposes of populating page with User info
        -- necessary to get details of user whose logged in
    2) Fetch db details of $_GET['userID'] (from the url)
        -- For the purposes of profile.php, etc.
        -- necessary to get details of user on whose page we're on
*/

$db = MyPDO::instance();

// 1) Fetch db details of userLoggedIn
$sql = "SELECT * FROM Users WHERE username = ?";
$stmt = $db->run($sql, [$userLoggedIn]);
$userLoggedInRow = $stmt->fetch(PDO::FETCH_ASSOC);
$userLoggedInID = $userLoggedInRow['userID'];

// 2) (if avalible) Fetch db details of userURL
if(isset($_GET['userID'])) {
	$userID = $_GET['userID'];
    $sql = "SELECT * FROM Users WHERE userID = ?";
    $stmt = $db->run($sql, [$userID]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    echo "$ GET['userID'] is not set";
}






/*
$pdo = MyPDO::instance();
$sql = "SELECT * FROM Users WHERE username = ?";
$stmt = $pdo->prepare($sql, [$userLoggedIn]);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$userID = $row['userID'];
*/



// $db = new MyPDO();

// $userID = db::getID();

// $userID = $_SESSION['id'];
// echo $userID;

// $db = MyPDO::instance();
// echo $db->userID;
// echo $_SESSION['user'];

// $sql = "SELECT * FROM Users WHERE username = ?";
// $query = $db->prepare($sql, [$userLoggedIn]);
//$query->execute();
//$row = $query->fetch(PDO::FETCH_ASSOC);
//$userID = $row['userID'];

// $userID = User::getID();
// echo $_SESSION['userId'];
// echo $user->userID;
// $row = User::getID();

include("includes/handlers/edit-profile-handler.php");
include("includes/handlers/register-handler.php");
include("includes/handlers/login-handler.php");

echo $username;
?>


<html>
<head>
	<title>Waygook Teacher</title>

	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="assets/js/register.js"></script>
</head>
<body>
    <div id="nav-bar">
    	<div id="nav-bar-header">
    		<a href="index.php">WaygookTeacher</a>
    	</div>
        <ul id="nav-bar-links">
            <!-- BUG: userID = echo $userID; isn't working -->
            <li><a href="profile.php?userID=<?php echo $userID; ?>"><?php echo $userLoggedIn; ?></a></li>
            <li><a href="search.php">Search</a></li>
            <li><a href="message.php">Message</a></li>
            <li><a href="register.php">Login/Register</a></li>
            <li><a href="#">Logout</a></li>
        </ul>
    </div>
    <div id="main-content">
