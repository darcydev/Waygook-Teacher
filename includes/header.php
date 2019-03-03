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
include("includes/handlers/auth-handler.php");
include("includes/handlers/send-message-handler.php");
?>


<html>
<head>
	<title>Waygook Teacher</title>

    <?php
    include("includes/scripts_and_links.php");
    ?>
</head>
<body>
    <div class="nav-bar">
    	<div class="nav-bar-header">
            <?php // TODO: include logo ?>
    		<a id="index-teacher-link" href="index-teacher.php">WaygookTeacher</a>
            <a id="index-student-link" href="index-student.php">WaygookTeacher</a>
    	</div>
        <ul class="nav-bar-links">
            <li><a href="profile.php?userID=<?php echo $userLoggedInID; ?>">Profile</a></li>
            <li id="search-nav-bar-link"><a href="search.php?page_num=1">Search</a></li>
            <li><a href="lesson-list.php">Lessons</a></li>
            <li><a href="conversation-list.php">Messages</a></li>
            <li><a href="settings-password.php?userID=<?php echo $userLoggedInID; ?>">Settings</a></li>
            <li><a href="logout.php">Logout</a></li>
            <select id="select-language" class="select-language" name="select-language" type="text" onchange="changeLanguage(this);" required>
                <option value="english">English</option>
                <option value="korean">한국어</option>
            </select>
        </ul>
    </div>
    <?php include("schedule-lesson-form.php"); ?>
    <div class="background-container">
        <div class="main-container">
