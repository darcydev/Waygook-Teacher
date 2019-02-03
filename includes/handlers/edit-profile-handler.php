<?php
if(isset($_POST['edit-profile-button'])) {
    $profilePic = $_POST['edit-profile-pic'];
    $description = $_POST['edit-description'];

    // if(isset($profilePic)) {}

    if(isset($description)) {
        $result = $account->updateDescription($description);
    }

    if($result == true) {
        header("Location: index.php");
    }

}
?>
