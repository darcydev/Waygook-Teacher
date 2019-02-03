<?php
include("includes/config.php");
include("includes/classes/User.php");

// session_destroy(); LOGOUT

if(isset($_SESSION['userLoggedIn'])) {
    $userLoggedIn = $_SESSION['userLoggedIn'];
}
else {
	header("Location: register.php");
}

$user = new User($con, $userID);

$userQuery = mysqli_query($con, "SELECT * FROM Users WHERE username='$userLoggedIn'");
$row = mysqli_fetch_array($userQuery);
$userID = $row['userID'];

?>


<html>
<head>
	<title>Waygook Teacher</title>

	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
    <div class="nav-bar">
    	<div class="nav-bar-header">
    		<a href="index.php">WaygookTeacher</a>
    	</div>
        <ul>
            <li><a href="profile.php?userID=<?php echo $userID; ?>">Profile</a></li>
            <li><a href="search.php">Search</a></li>
            <li><a href="message.php">Message</a></li>
            <li><a href="register.php">Login/Register</a></li>
            <li><a href="#">Logout</a></li>
        </ul>
    </div>
    <div id="main-content-container">
        <h1>Welcome to Waygook Teacher!</h1>
        <h2>platform for you to connect Korean students with English teachers</h2>
    </div>
    <div class="footer-container">
        <ul class="footer-list">
        	<li>WaygookTeacher - made by Darcy Price</li>
        </ul>
    </div>
</body>
</html>
