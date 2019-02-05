<?php include("includes/header.php") ?>

<div id="edit-profile-container">
    <div id="edit-profile-content">
        <form action="edit-profile.php" method="post" enctype="multipart/form-data">
            <p>
                <label for="upload-profile-pic">Profile Picture</label>
                <input id="upload-profile-pic" type="file" name="upload-profile-pic">
                <input id="submit-profile-pic" type="submit" name="submit-profile-pic">
            </p>
            <button type="submit" name="confirm-profile-pic-button">Confirm Photo Changes</button>
        </form>
        <form action="edit-profile.php" method="post">
            <p>
                <label for="edit-description">Profile Description</label>
                <input id="edit-description" type="text" name="edit-description">
            </p>
            <button type="submit" name="edit-profile-button">Confirm Description Changes</button>
        </form>
    </div>
</div>

<?php include("includes/footer.php") ?>
