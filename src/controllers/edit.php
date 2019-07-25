<?php
// get list of all timezones
$timezones = DateTimeZone::listIdentifiers();

// EDIT PROFILE HANDLER
if (isset($_POST['edit-profile-button'])) {

  if (isset($_POST['first-name'])) {
    /// $result = $user->updateRate($_POST['first-name']);
  }

  $fn = $_POST['first-name'];
  $ln = $_POST['last-name'];
  $em = $_POST['email'];
  $tz = $_POST['timezone'];
  $pw = md5($_POST['password']);
  $pw2 = md5($_POST['confirm-password']);
  $skype = $_POST['skype-name'];

  if (isset($_POST['description'])) {
    echo $_POST['description'];
    $user->updateDescription($_POST['description']);
  }

  /// $desc = $_POST['description'];
  $nation = $_POST['nationality'];
  $edu = $_POST['education-level'];
  $dob = $_POST['dob'];

  if (isset($_POST['rate'])) {
    /// $result = $user->updateRate($_POST['rate']);
  }
}
?>

<!-- JS is in src/js/edit.js -->
<script>
  document.addEventListener("DOMContentLoaded", function(event) {
    displayEdit(<?php echo $isStudent; ?>);
  });
</script>