<?php
// get list of all timezones
$timezones = DateTimeZone::listIdentifiers();

// EDIT PROFILE HANDLER
if (isset($_POST['edit-profile-button'])) {

  if (isset($_POST['timezone'])) {
    $user->updateTimezone($_POST['timezone']);
  }

  if (isset($_POST['old-pw'], $_POST['pw'], $_POST['pw2'])) {
    $old = md5($_POST['old-pw']);
    $pw = md5($_POST['pw']);
    $pw2 = md5($_POST['pw2']);
    $user->updatePassword($old, $pw, $pw2);
  }

  if (isset($_POST['skype-name'])) {
    $user->updateSkypeName($_POST['skype-name']);
  }
  
  if (isset($_POST['description'])) {
    $user->updateDescription($_POST['description']);
  }
}
?>

<!-- JS is in src/js/edit.js -->
<script>
  document.addEventListener("DOMContentLoaded", function(event) {
    displayEdit(<?php echo $isStudent; ?>);
  });
</script>