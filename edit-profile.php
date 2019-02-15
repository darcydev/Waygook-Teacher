<?php
include("includes/header.php")
?>

<div id="edit-profile-container">
    <div id="edit-profile-content">
        <form id="edit-profile-form" class="form" method="post" enctype="multipart/form-data">
            <p>
                <?php echo $user->getError(Constants::$invalidFileExtension); ?>
                <?php echo $user->getError(Constants::$invalidFileSize); ?>
                <?php echo $user->getError(Constants::$invalidFileName); ?>
                <label for="upload-profile-pic">Upload Profile Picture</label>
                <input id="upload-profile-pic" type="file" name="upload-profile-pic">
            </p>
            <p>
                <?php echo $user->getError(Constants::$descriptionCharacters); ?>
                <label for="edit-description">Profile Description</label>
                <textarea id="edit-description" type="text" name="edit-description"></textarea>
            </p>
            <button type="submit" name="edit-profile-button">CONFRIM</button>
        </form>
    </div>
</div>

<?php
include("includes/footer.php");
?>
