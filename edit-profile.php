<?php include("includes/header.php") ?>

<div id="edit-profile-container">
    <div id="edit-profile-content">
        <form action="edit-profile.php" method="post" enctype="multipart/form-data">
            <p>
                <label for="edit-profile-pic">Profile Picture</label>
                <input id="edit-profile-pic" type="file" name="edit-profile-pic">
            </p>
            <p>
                <label for="edit-description">Profile Description</label>
                <input id="edit-description" type="text" name="edit-description">
            </p>
            <button type="submit" name="edit-profile-button">CONFIRM</button>
        </form>
    </div>
</div>

<?php include("includes/footer.php") ?>
