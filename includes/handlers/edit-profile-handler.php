<?php
if(isset($_POST['confirm-profile-pic-button'])) {

    $currentDir = getcwd();
    // target upload directory
    $targetDir = "assets/images/profile-pics/";
    // store all errors
    $errors = [];
    // allowed file extensions
    $fileExtensions = ['jpeg', 'jpg', 'png'];
  	// SECURITY BUG
    $fileName = $_FILES["upload-profile-pic"]["name"];
    $fileSize = $_FILES["upload-profile-pic"]["size"];
    $fileTmpName = $_FILES["upload-profile-pic"]["tmp_name"];
    $fileType = $_FILES["upload-profile-pic"]["type"];
    $fileExtension = strtolower(end(explode('.', $fileName)));

    $uploadPath = $currentDir . "/" . $targetDir . basename($fileName);
    // POTENTIAL BUG: may have to remove "/" in "/assets"
    $db_uploadPath = $targetDir . basename($fileName);

    if(! in_array($fileExtension, $fileExtensions)) {
        $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
    }

    if($fileSize > 2000000) {
        $errors[] = "This file is more than 2MB. Sorry, it has to be less than or equal to 2MB";
    }

    if(file_exists($uploadPath)) {
        $errors[] = "File already exists. Please rename your file.";
    }

    if(empty($errors)) {
        $successUpload = move_uploaded_file($fileTmpName, $uploadPath);
        if($successUpload) {
            // echo "The file " . basename($fileName) . " has been uploaded";
            $rows_affected = $user->updateProfilePic($db_uploadPath);
            // FORM BUG: not directing User back to profile.php
            if($rows_affected < 1) {
                echo "DB UPLOAD ERROR";
            }
        } else {
            echo "move_uploaded_file ERROR";
        }
    } else {
        foreach($errors as $error) {
            echo $error . "These are the errors" . "\n";
        }
    }
}

if(isset($_POST['edit-profile-button'])) {
    // BUG: sanitize this input
    $desc_update = $_POST['edit-description'];

    if(isset($desc_update)) {
        $rows_affected = $user->updateDescription($desc_update);
    }
    // if db successfully updated, direct to user's profile page
    if($rows_affected > 0) {
        header("Location: profile.php?userID=" . $user->getID());
    }
    else {
        echo "Sorry, there has been an error updating your profile.";
    }
}
?>
