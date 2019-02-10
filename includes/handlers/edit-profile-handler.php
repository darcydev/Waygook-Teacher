<?php
if (isset($_POST['confirm-profile-pic-button']) && isset($_FILES["upload-profile-pic"])) {
    $currentDir = getcwd();
    $targetDir = "assets/images/profile-pics/";
    $fileName = $_FILES["upload-profile-pic"]["name"];
    $fileSize = $_FILES["upload-profile-pic"]["size"];
    $fileTmpName = $_FILES["upload-profile-pic"]["tmp_name"];
    // BUG: I THINK i can remove $fileType (unused)
    $fileType = $_FILES["upload-profile-pic"]["type"];
    $fileExtension = strtolower(end(explode('.', $fileName)));
    $uploadPath = $currentDir . "/" . $targetDir . basename($fileName);
    // POTENTIAL BUG: may have to remove "/" in "/assets"
    $db_uploadPath = $targetDir . basename($fileName);

    $rowsAffected = $user->updateProfilePic($db_uploadPath, $fileExtension, $fileSize, $uploadPath);

    if($rowsAffected > 0) {
        $successUpload = move_uploaded_file($fileTmpName, $uploadPath);
        if ($successUpload) {
            echo "Picture successfully updated";
        } else {
            echo "Sorry, there has been an error uploading the photo";
        }
    }
}

if(isset($_POST['edit-profile-button']) && isset($_POST['edit-description'])) {
    // BUG: sanitize this input (???)
    $desc = $_POST['edit-description'];

    $rowsAffected = $user->updateDescription($desc);

    if($rowsAffected > 0) {
        echo "Description successfully updated";
    } else {
        echo "Sorry, there has been an error updating your profile.";
    }
}
?>
