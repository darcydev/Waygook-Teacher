<?php
include("includes/header.php");
?>

<div class="settings-profile-container">
    <div class="side-nav">
        <div id="contact-info-nav" class="side-nav-item b">Contact Info</div>
        <div id="about-me-nav" class="side-nav-item b">About Me</div>
        <div id="account-details-nav" class="side-nav-item b">Account Details</div>
    </div>
    <div class="settings-profile-content edit-profile">
        <div class="box">
            <div class="box-content">
                <form id="about-me-form" class="form" method="post" enctype="multipart/form-data">
                    <p>
                        <?php echo $user->getError(Constants::$invalidFileExtension); ?>
                        <?php echo $user->getError(Constants::$invalidFileSize); ?>
                        <?php echo $user->getError(Constants::$invalidFileName); ?>
                        <label for="upload-profile-pic">Upload Profile Picture</label>
                        <input class="upload-file" type="file" name="upload-profile-pic">
                    </p>
                    <p>
                        <?php echo $user->getError(Constants::$descriptionCharacters); ?>
                        <label for="edit-description">Profile Description</label>
                        <textarea id="edit-description" type="text" name="edit-description"><?php echo $userLoggedInRow['description']; ?></textarea>
                    </p>
                    <div class="buttons-row">
                        <button type="submit" name="edit-about-me-button" class="button">CONFRIM</button>
                    </div>
                </form>
                <form id="contact-info-form" class="form" method="post">
                    <p>
                        <label for="change-email">Email</label>
                        <input type="text" name="change-email" value="<?php echo $userLoggedInRow['email']; ?>">
                    </p>
                    <p>
                        <label for="change-skype">Skype ID</label>
                        <input type="text" name="change-skype" value="<?php echo $userLoggedInRow['skype_name']; ?>">
                    </p>
                    <div class="buttons-row">
                        <button type="submit" name="edit-contact-info-button" class="button">CONFRIM</button>
                    </div>
                </form>
                <form id="account-details-form" class="form" method="post">
                    <p>
                        <label for="change-rate">Rate per hour ($USD)</label>
                        <input type="number" name="change-rate" step="0.5" min="0" max="100" value="<?php echo $userLoggedInRow['rate']; ?>">
                    </p>
                    <div class="buttons-row">
                        <button type="submit" name="edit-account-details-button" class="button">CONFRIM</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include("includes/footer.php");
?>
