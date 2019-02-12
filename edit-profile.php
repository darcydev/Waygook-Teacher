<?php
include("includes/header.php")
?>

<div id="edit-profile-container">
    <div id="edit-profile-content">
        <form id="edit-pic-form" class="edit-profile-form" method="post" enctype="multipart/form-data">
            <?php echo $user->getError(Constants::$invalidFileExtension); ?>
            <?php echo $user->getError(Constants::$invalidFileSize); ?>
            <?php echo $user->getError(Constants::$invalidFileName); ?>
            <label for="upload-profile-pic">Profile Picture</label>
            <input id="upload-profile-pic" type="file" name="upload-profile-pic">
            <button type="submit" name="confirm-profile-pic-button">Confirm Photo Changes</button>
        </form>
        <form id="edit-description-form" class="edit-profile-form" method="post">
            <?php echo $user->getError(Constants::$descriptionCharacters); ?>
            <label for="edit-description">Profile Description</label>
            <input id="edit-description" type="text" name="edit-description">
            <button type="submit" name="edit-profile-button">Confirm Description Changes</button>
        </form>
    </div>
</div>

<?php include("includes/footer.php") ?>
