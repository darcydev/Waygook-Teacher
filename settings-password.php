<?php
include("includes/header.php");
?>

<?php

// REFACTOR: include these as part of Account, and call them using
// Account::sanitizeFormString, etc.
// in accordance with "DRY" principle
/*
function sanitizeFormPassword($inputText) {
	$inputText = strip_tags($inputText);
	return $inputText;
}
*/

// HANDLER
if (isset($_POST['change-password-button'])) {
    $old_pw = md5($_POST['old-password']);
	$new_pw = md5($_POST['new-password']);
	$new_pw2 = md5($_POST['new-password2']);

    $rowsAffected = $user->updatePassword($old_pw, $new_pw, $new_pw2);

    if ($rowsAffected == 1) {
        header("Location: index.php");
    } else {
        echo "Error updating new password";
    }
}
?>

<div class="settings-profile-container">
    <div class="side-nav">
        <a class="side-nav-item b" href="settings-password.php">Password</a>
        <a class="side-nav-item b" href="settings-vertification.php">Vertification</a>
        <a class="side-nav-item b" href="settings-notifications.php">Notifications</a>
    </div>
    <div class="settings-profile-content">
        <div class="box">
            <div class="box-content">
                <form class="form" method="post">
                    <p>
                        <?php echo $user->getError(Constants::$passwordIncorrect); ?>
                        <label for="old-password">Current password</label>
                        <input id="old-password" name="old-password" type="password" required>
                    </p>
                    <p>
                        <?php echo $user->getError(Constants::$passwordsDoNoMatch); ?>
                        <?php echo $user->getError(Constants::$passwordNotAlphanumeric); ?>
                        <?php echo $user->getError(Constants::$passwordCharacters); ?>
                        <label for="new-password">New password</label>
                        <input id="new-password" name="new-password" type="password" required>
                    </p>
                    <p>
                        <label for="new-password2">New password</label>
                        <input id="new-password2" name="new-password2" type="password" required>
                    </p>
                    <div class="buttons-row">
                        <button class="button" type="submit" name="change-password-button">SAVE PASSWORD</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include("includes/footer.php");
?>
