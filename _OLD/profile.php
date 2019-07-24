<?php
include("includes/header.php");

/* **
PAGE DETAILS:
    ** Profile.php displays a User's profile.
    ** userLoggedIn could either be:
        a) viewing thier own profile, or
        b) viewing the profile of another User
    ** Depending on whether it is a) or b), the side-nav will adjust. For instance,
    ** a User will be able to edit their own profile, but obviously not another
    ** User's profile, etc.

TODO:
    ** Display the User's reviews

IDEA:
    ** Include a Google calendar plugin
** */

// if User is viewing own profile, show 'edit-profile' button
// else, show 'send-message' button
if ($row['username'] == $userLoggedIn) {
    echo '<script>
            $(document).ready(function() {
                $("#edit-profile-link").show();
                $("#send-message-link").hide();
            });
        </script>';
} else {
    echo '<script>
            $(document).ready(function() {
                $("#edit-profile-link").hide();
                $("#send-message-link").show();
            });
        </script>';
}
?>

<div class="profile-info-container settings-profile-container">
  <?php include("includes/side-nav.php"); ?>
  <div class="profile-content settings-profile-content">
    <div class="box">
      <div class="box-content">
        <?php include("includes/profile-info-container.php"); ?>
        <div class="profile-text-container">
          <div class="profile-content profile-description">
            <div class="profile-description-title">
              <h3><?php echo $lang['background']; ?></h3>
            </div>
            <p>
              <!-- nl2br ensures that the line breaks are printed -->
              <?php echo nl2br($row['description']); ?>
            </p>
          </div>
          <?php
                    /* **
                    ** REVIEWS SECTION
                        ** think of IDEA how to present the reviews
                    <div class="profile-content profile-description">
                        <div class="profile-description-title">
                            <h3><?php echo $lang['reviews']; ?></h3>
        </div>
        <p>
          <!-- echo number of User's reviews -->
          <?php // TODO: present reviews in as 'divs you can cycle through' ?>
          <p><?php echo $user->getReviews($_GET['userID'])?></p>
        </p>
      </div>
      ** */
      ?>
    </div>
  </div>
</div>
</div>
</div>

<?php include("includes/footer.php"); ?>