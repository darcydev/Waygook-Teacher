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
// $account = new Account();
$user = new User($userLoggedIn);
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
}

include("includes/handlers/edit-profile-handler.php");
include("includes/handlers/register-handler.php");
include("includes/handlers/login-handler.php");
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
            <li><a href="profile.php?userID=<?php echo $userLoggedInID; ?>">Profile</a></li>
            <li><a href="search.php">Search</a></li>
            <li><a href="conversation-list.php">Messages</a></li>
            <li><a href="settings.php">Settings</a></li>
            <li><a href="logout.php">Logout</a></li>
            <select id="select-language" name="select-language" type="text" onchange="changeLanguage(this);" required>
                <option value="english">English</option>
                <option value="korean">한국</option>
            </select>
        </ul>
    </div>
    <div id="main-content">
