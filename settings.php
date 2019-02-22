<?php
include("includes/header.php");
?>

<div id="settings-profile-container">
    <div class="side-nav">
        <a class="side-nav-item b" href="settings.php">Password</a>
        <a class="side-nav-item b" href="settings-vertification.php">Vertification</a>
        <a class="side-nav-item b" href="settings-notifications.php">Notifications</a>
    </div>
    <div class="settings-profile-content">
        <div class="box">
            <div class="box-head">
                <div class="box-head-title">Change Password</div>
            </div>
            <div class="box-content">
                <form class="form" method="post">
                    <p>
                        <label for="old-password">Current password</label>
                        <input id="old-password" name="old-password" type="password" required>
                    </p>
                    <p>
                        <label for="new-password">New password</label>
                        <input id="new-password" name="new-password" type="password" required>
                    </p>
                    <p>
                        <label for="new-password2">New password</label>
                        <input id="new-password2" name="new-password2" type="password" required>
                    </p>
                    <button class="button" type="submit" name="login-button">SAVE PASSWORD</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include("includes/footer.php");
?>
