<?php
// get list of all timezones
$timezones = DateTimeZone::listIdentifiers();

// UPLOAD PROFILE PHOTO HANDLER
// the 'upload photo' section is contained within a seperate form to the 'edit profile' section
if (isset($_POST['upload-profile-pic'])) {
  if (!empty($_FILES['profile-pic']['name'])) {
    $currentDir = getcwd();
    $targetDir = "/Waygook-Teacher/public/images/profile_pics/";

    // to avoid the issue of duplicate file names in server,
    // save the file as a random number ahead of the fileName (fe "283572893572875johnlennon.png")
    // BUG: rand() is not secure (as it is predictable), consider using random_bytes() instead
    $fileName = rand() . $_FILES['profile-pic']['name'];
    $fileSize = $_FILES['profile-pic']['size'];
    $fileTmpName = $_FILES['profile-pic']['tmp_name'];
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
    $uploadPath = $_SERVER['DOCUMENT_ROOT'] . $targetDir . basename($fileName);
    $db_uploadPath = $targetDir . basename($fileName);

    $rowsAffected = $user->updateProfilePic($db_uploadPath, $fileExtension, $fileSize, $uploadPath);

    if ($rowsAffected > 0) {
      // BUG: not working!
      $successUpload = move_uploaded_file($fileTmpName, $uploadPath);
    }
  }
}

// EDIT PROFILE HANDLER
// as each of the form inputs are optional, we have to check one-by-one, whether the User has completed
// that particular field.
if (isset($_POST['edit-profile-button'])) {

  if (isset($_POST['timezone'])) {
    $user->updateUserDetails('timezone', $_POST['timezone']);
  }

  if (isset($_POST['old-pw'], $_POST['pw'], $_POST['pw2'])) {
    // TODO: md5 encryption is very bad
    $old = md5($_POST['old-pw']);
    $pw = md5($_POST['pw']);
    $pw2 = md5($_POST['pw2']);
    $user->updatePassword($old, $pw, $pw2);
  }

  if (isset($_POST['skype-name'])) {
    $user->updateUserDetails('skype_name', $_POST['skype-name']);
  }

  if (isset($_POST['description'])) {
    $user->updateUserDetails('description', $_POST['description']);
  }

  if (isset($_POST['nationality'])) {
    $user->updateUserDetails('nationality', $_POST['nationality']);
  }

  if (isset($_POST['education-level'])) {
    $user->updateUserDetails('education_level', $_POST['education-level']);
  }

  if (isset($_POST['dob'])) {
    $user->updateUserDetails('dob', $_POST['dob']);
  }

  if (isset($_POST['rate'])) {
    $user->updateUserDetails('rate', $_POST['rate']);
  }
}
?>

<!-- JS is in src/js/edit.js -->
<script>
  document.addEventListener("DOMContentLoaded", function(event) {
    displayEdit(<?php echo $isStudent; ?>);
  });
</script>