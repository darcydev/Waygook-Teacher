<?php
include("includes/header.php")
?>

<?php

// if this one necessary? $userLoggedIn = username
if(isset($_SESSION['userLoggedIn'])) {
    $userLoggedIn = $_SESSION['userLoggedIn'];
}
else {
	header("Location: register.php");
}

if(isset($_GET['userID'])) {
	$userID = $_GET['userID'];
}
else {
	header("Location: register.php");
}

$user = new User($con, $userID);
$sql = "SELECT * FROM Users WHERE userID='$userID'";
$userQuery = mysqli_query($con, $sql);
$row = mysqli_fetch_array($userQuery);
?>

<div id="profile-container">
    <div id="profile-heading">
    </div>
    <div id="profile-content-container">
        <div id="profile-photo" class="profile-photo-content">
            <img src=<?php echo $row['profile_pic']; ?>>
        </div>
        <div id="profile-text-content">
            <div id="profile-name" class="profile-content">
                <p><?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?></p>
            </div>
            <div id="profile-username" class="profile-content">
                <p><?php echo $row['username']; ?></p>
            </div>
            <div id="profile-email" class="profile-content">
                <p><?php echo $row['email']; ?></p>
            </div>
            <div id="profile-description" class="profile-content">
                <p>DESCRIPTION: <p><?php echo $row['description']; ?></p></p>
            </div>
        </div>
    </div>
    <div id="edit-profile-link">
        <a href="edit-profile.php?userID=<?php echo $userID; ?>">EDIT PROFILE</a>
    </div>
</div>

<?php include("includes/footer.php") ?>
