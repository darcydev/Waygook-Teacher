<?php
if (isset($_POST['edit-profile-button'])) {

    $success = False;

    // If the User has uploaded a profile pic in the form
    if (!empty($_FILES['upload-profile-pic']['name'])) {
        echo "<script>console.log('eph0')</script>";
        $currentDir = getcwd();
        $targetDir = "assets/images/profile-pics/";
        // save the file as a random number ahead of fileName (fe "283572893572875johnlennon.png")
        // to (largely) avoid issue of duplicate file names in server
        // BUG: rand() is not secure (is predictable), consider using random_bytes()
        $randomNumber = rand();
        // add $randomNumber to beginning of fileName
        $fileName = $randomNumber . $_FILES["upload-profile-pic"]["name"];
        $fileSize = $_FILES["upload-profile-pic"]["size"];
        $fileTmpName = $_FILES["upload-profile-pic"]["tmp_name"];
        $fileExtension = strtolower(end(explode('.', $fileName)));
        $uploadPath = $currentDir . "/" . $targetDir . basename($fileName);
        // POTENTIAL BUG: may have to remove "/" in "/assets"
        $db_uploadPath = $targetDir . basename($fileName);

        $rowsAffected = $user->updateProfilePic($db_uploadPath, $fileExtension, $fileSize, $uploadPath);

        if($rowsAffected > 0) {
            $successUpload = move_uploaded_file($fileTmpName, $uploadPath);
            if ($successUpload) {
                $success = True;
            } else {
                echo "Sorry, there has been an error uploading the photo";
            }
        }
    }

    // If the User has completed the description in the form
    if (isset($_POST['edit-description'])) {
        // BUG: sanitize this input (???)
        $desc = $_POST['edit-description'];

        $rowsAffected = $user->updateDescription($desc);
        echo "<script>console.log('EPH0')</script>";
        if($rowsAffected > 0) {
            $success = True;
        } else {
            echo "Sorry, there has been an error updating your profile.";
        }
    }

    if ($success = True) {
        header("Location: profile.php?userID=" . $userLoggedInID);
    }
}
?>
