<?php
/// include("includes/config.php");

if(isset($_POST['edit-profile-button'])) {
    // $profilePic = $_POST['edit-profile-pic'];
    $desc_update = $_POST['edit-description'];

    // if(isset($profilePic)) {}

    if(isset($desc_update)) {
        $result = $user->updateDescription($desc_update);
        echo '<script>console.log("B.3")</script>';
    }

    if($success > 0) {
        echo '<script>console.log("$success > 0")</script>';
        header("Location: profile.php");
    }
    else {
        echo '<script>console.log("$success = 0")</script>';
    }

    echo '<script>console.log("end of file")</script>';
}
?>
