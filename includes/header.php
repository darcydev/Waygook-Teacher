<?php
include("includes/included-files.php");

include("includes/classes/Account.php");
include("includes/classes/User.php");
include("includes/classes/Employment.php");
include("includes/classes/Payment.php");

if (isset($_SESSION['userLoggedIn'])) {
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
$userLoggedInRole = $userLoggedInRow['role'];

$employment = new Employment($userLoggedInID, $userLoggedInRole);
$payment = new Payment($userLoggedInID);

// 2) (if avalible) Fetch db details of userURL
if(isset($_GET['userID'])) {
	$userID = $_GET['userID'];
    $sql = "SELECT * FROM Users WHERE userID = ?";
    $stmt = $db->run($sql, [$userID]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}

// include the AJAX HANDLERS
include("includes/handlers/edit-profile-handler.php");
include("includes/handlers/auth-handler.php");
include("includes/handlers/send-message-handler.php");
include("includes/handlers/schedule-lesson-handler.php");
/// include("includes/handlers/deposit-employment-handler.php");

// PAYPAL files
include("includes/paypal-payment-form.php");

/* **
LEGACY CODE:
    ** legacy code to check whether the User is currently viewing the site from
    ** local production or live deployment
// an array of all potential pages of 'local production' (that is, localhost)
$localhost_pages = array(
    '127.0.0.1',
    '::1'
);
// check if the User is on the site on the localhost or the live site.
if (in_array($_SERVER['REMOTE_ADDR'], $localhost_pages)) {
    // if the User is on the localhost (localhost:8888/waygook-teacher.com)
    // echo 'Localhost';
} else {
    // if the User is on the live site (waygookteacher.com)
    // echo 'Live';
}
** */
?>

<!DOCTYPE html>
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
            <!-- will display one or the other, depending on whether the User is a Teacher/Student -->
    		<a id="index-teacher-link" href="index-teacher.php">WaygookTeacher</a>
            <a id="index-student-link" href="index-student.php">WaygookTeacher</a>
    	</div>
        <ul class="nav-bar-links">
            <li><a href="profile.php?userID=<?php echo $userLoggedInID; ?>"><?php echo $lang['profile']; ?></a></li>
            <li id="search-nav-bar-link"><a href="search.php?page_num=1"><?php echo $lang['search']; ?></a></li>
            <li><a href="lesson-list.php"><?php echo $lang['lessons']; ?></a></li>
            <li><a href="calendar.php"><?php echo $lang['calendar']; ?></a></li>
            <li><a href="conversation-list.php"><?php echo $lang['messages']; ?></a></li>
            <li><a href="settings.php?userID=<?php echo $userLoggedInID; ?>"><?php echo $lang['settings']; ?></a></li>
            <li><a href="logout.php"><?php echo $lang['logout']; ?></a></li>
            <?php include("includes/set-lang-form.php"); ?>
        </ul>
    </div>
    <?php include("schedule-lesson-form.php"); ?>
    <div class="background-container">
        <div class="main-container landing-page-row">
