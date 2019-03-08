<?php
include("includes/header.php");

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
        <div id="nav-settings-password" class="side-nav-item b"><?php echo $lang['password']; ?></div>
        <div id="nav-settings-account" class="side-nav-item b"><?php echo $lang['account']; ?></div>
    </div>
    <div class="settings-profile-content">
        <div class="box">
            <div class="box-content">
                <form id="settings-password" class="form" method="post">
                    <p>
                        <?php echo $user->getError(Constants::$passwordIncorrect); ?>
                        <label for="old-password"><?php echo $lang['current password']; ?></label>
                        <input id="old-password" name="old-password" type="password" required>
                    </p>
                    <p>
                        <?php echo $user->getError(Constants::$passwordsDoNoMatch); ?>
                        <?php echo $user->getError(Constants::$passwordNotAlphanumeric); ?>
                        <?php echo $user->getError(Constants::$passwordCharacters); ?>
                        <label for="new-password"><?php echo $lang['new password']; ?></label>
                        <input id="new-password" name="new-password" type="password" required>
                    </p>
                    <p>
                        <label for="new-password2"><?php echo $lang['new password']; ?></label>
                        <input id="new-password2" name="new-password2" type="password" required>
                    </p>
                    <div class="buttons-row">
                        <button class="button" type="submit" name="change-password-button"><?php echo $lang['save password']; ?></button>
                    </div>
                </form>
                <form id="settings-account" class="form" method="post">
                    <p>
                        <label for="timezone"><?php echo $lang['current timezone']; ?></label>
                        <input id="old-timezone" name="old-timezone" type="text" value="INSERT CURRENT TIMEZONE" readonly="readonly" required>
                    </p>
                    <select class="select" name="new-timezone">
                        <option value="">INCLUDE TIMEZONES</option>
                        <?php // TODO: https://stackoverflow.com/questions/1727077/generating-a-drop-down-list-of-timezones-with-php ?>
                    </select>
                    </p>
                    <div class="buttons-row">
                        <button class="button" type="submit" name="change-timezone-button"><?php echo $lang['change timezone']; ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include("includes/footer.php");
?>
