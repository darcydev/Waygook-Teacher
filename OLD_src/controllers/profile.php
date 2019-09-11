<?php
/* The controller page responsible for collecting PROFILE DETAILS for display on PROFILE.PHP */

// determine whether or not, a User is viewing their own profile
// if a User has reached profile.php from the navBar, $_GET['userID'] will NOT be in the URL, and therefore they're viewing their own profile
// else, if a Usher has reached profile.php from search.php, $_GET['userID'] will be in the URL, and therefore they're NOT viewing their own profile
if (isset($_GET['userID'])) {
  $sql = "SELECT * FROM Users WHERE userID = ?";
  $stmt = $db->run($sql, [$_GET['userID']]);
  $profileUser = $stmt->fetch(PDO::FETCH_ASSOC);
  // set variable for JS function (as called below)
  $isOwnProfile = false;
} else {
  $profileUser = $userLoggedInRow;
  // set variable for JS function (as called below)
  $isOwnProfile = true;
}
?>

<script>
document.addEventListener("DOMContentLoaded", function(event) {
  displaySideLinks(<?php echo $isOwnProfile; ?>);
});
</script>