<?php
include("includes/header.php");
?>

<div id="edit-profile-container">
    <div class="settings-profile-content edit-profile">
        <form id="edit-profile-form" class="form" method="post" enctype="multipart/form-data">
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
                <textarea id="edit-description" type="text" name="edit-description"></textarea>
            </p>
            <div class="buttons-row">
                <button type="submit" name="edit-profile-button" class="button">CONFRIM</button>
            </div>
        </form>
    </div>
</div>

<?php
include("includes/footer.php");
?>
