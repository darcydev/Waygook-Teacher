<?php include("includes/header.php") ?>

<?php

// ISSUE: how to get userID on page?
if(isset($_GET['userID'])) {
	$userID = $_GET['userID'];
}
else {
  // IDEA: include 'User couldn't be found' page
	header("Location: index.php");
}

$user = new User($con, $userID);
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
    </div>

<?php include("includes/footer.php") ?>
