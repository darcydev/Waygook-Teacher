<?php include("includes/header.php") ?>

<?php

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

    <div id="profile-container">
        <div id="profile-heading">
            <h2>Profile</h2>
        </div>
        <div id="profile-content-container">
            <div id="profile-photo" class="profile-content">
                <p>INCLDUE PHOTO</p>
            </div>
            <div id="profile-name" class="profile-content">
                <p>Name: <?php echo $user->getFirstName(); ?> <?php echo $user->getLastName(); ?></p>
            </div>
            <div id="profile-username" class="profile-content">
                <p>Username: <?php echo $user->getUsername(); ?></p>
            </div>
            <div id="profile-email" class="profile-content">
                <p>Email: <?php echo $user->getEmail(); ?></p>
            </div>
            <div id="profile-description" class="profile-content">
                <p>INCLUDE DESCRIPTION</p>
            </div>
        </div>
        <div id="edit-profile-link">
            <a href="edit-profile.php?userID=<?php echo $userID; ?>">EDIT PROFILE</a>
        </div>
    </div>

<?php include("includes/footer.php") ?>
