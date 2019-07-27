<?php
// set DOCUMENT_ROOT variable
set_include_path(get_include_path() . PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT'] . "\Waygook-Teacher");

require_once("src/views/head.php");
require_once("src/views/header.php");

require_once("src/controllers/profile.php");
require_once("src/controllers/edit.php");
?>

<script src="/Waygook-Teacher/src/js/edit.js"></script>

<div class="container">
  <h2>Edit Profile</h2>
  <hr>
  <div class="row">
    <!-- left column -->
    <div class="col-md-3">
      <form method="POST" enctype="multipart/form-data">
        <div class="text-center">
          <img src="<?php echo $userLoggedInRow['profile_pic']; ?>" class="avatar img-circle" alt="profile-pic">
          <h6>Upload a different photo...</h6>
          <input name="profile-pic" type="file" class="form-control">
          <button name="upload-profile-pic" class="btn btn-outline-primary" type="submit">Upload picture</button>
        </div>
      </form>
    </div>

    <!-- edit form column -->
    <div class="col-md-9 personal-info">
      <div class="alert alert-info alert-dismissable">
        <a class="panel-close close" data-dismiss="alert">×</a>
        <i class="fa fa-coffee"></i>
        This is an <strong>.alert</strong>. Use this to show important messages to the user.
      </div>
      <h3>Personal info</h3>

      <form method="POST">
        <div class="form-group">
          <label class="col-lg-3 control-label">First name:</label>
          <div class="col-lg-8">
            <input name="first-name" class="form-control" type="text" value=<?php echo $userLoggedInRow['first_name']; ?> disabled>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Last name:</label>
          <div class="col-lg-8">
            <input name="last-name" class="form-control" type="text" value=<?php echo $userLoggedInRow['last_name']; ?> disabled>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Email:</label>
          <div class="col-lg-8">
            <input name="email" class="form-control" type="text" value=<?php echo $userLoggedInRow['email']; ?> disabled>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Time Zone:</label>
          <div class="col-lg-8">
            <div class="ui-select">
              <select name="timezone" class="form-control">
                <!-- PHP LOOP: iterate over $timezones, and add each as an option -->
                <?php foreach ($timezones as $tz) { ?>
                  <option value="<?php echo $tz; ?>"><?php echo $tz; ?></option>
                <?php } ?>
                <!-- \.PHP LOOP -->
              </select>
            </div>
          </div>
        </div>
        <!-- NEW PASSWORD -->
        <div class="form-group">
          <label class="col-md-3 control-label">New password:</label>
          <div class="col-md-8">
            <input name="pw" class="form-control" type="password">
          </div>
        </div>
        <!-- \.NEW PASSWORD -->
        <!-- CONFIRM NEW PASSWORD -->
        <div class="form-group">
          <label class="col-md-3 control-label">Confirm password:</label>
          <div class="col-md-8">
            <input name="pw2" class="form-control" type="password" onChange="displayOldPassword();">
          </div>
        </div>
        <!-- \.CONFIRM NEW PASSWORD -->
        <!-- OLD PASSWORD -->
        <div id="edit-profile-old-pw" class="form-group" style="display: none;">
          <label class="col-md-3 control-label">Old password:</label>
          <div class="col-md-8">
            <input name="old-pw" class="form-control" type="password">
          </div>
        </div>
        <!-- \.OLD PASSWORD -->
        <!-- SKYPE NAME -->
        <div class="form-group">
          <label class="col-md-3 control-label">Skype username:</label>
          <div class="col-md-8">
            <input name="skype-name" class="form-control" type="text" value=<?php echo $userLoggedInRow['skype_name']; ?>>
          </div>
        </div>
        <!-- \.SKYPE NAME -->
        <!-- PROFILE DESCRIPTION -->
        <div class="form-group">
          <label class="col-md-3 control-label">Profile Descripton:</label>
          <div class="col-md-8">
            <textarea name="description" type="text" class="form-control" oninput='this.style.height = "";this.style.height = this.scrollHeight + 3 + "px"'><?php echo $userLoggedInRow['description']; ?></textarea>
          </div>
        </div>
        <!-- /.PROFILE DESCRIPTION -->
        <!-- TEACHER ONLY EDIT FORM -->
        <div id="teacher-edit">
          <!-- NATIONALITY -->
          <div class="form-group">
            <label class="col-md-3 control-label">Nationality:</label>
            <div class="col-lg-8">
              <div class="ui-select">
                <select name="nationality" class="form-control">
                  <option value="USA">USA</option>
                  <option value="Korea">Korea</option>
                  <option value="Canada">Canada</option>
                  <option value="UK">UK</option>
                  <option value="Ireland">Ireland</option>
                  <option value="Australia">Australia</option>
                  <option value="South Africa">South Africa</option>
                  <option value="India">India</option>
                  <option value="Philippines">Philippines</option>
                  <option value="Other">Other</option>
                </select>
              </div>
            </div>
          </div>
          <!-- /.NATIONALITY -->
          <!-- EDUCATION LEVEL -->
          <div class="form-group">
            <label class="col-md-3 control-label">Education Level:</label>
            <div class="col-lg-8">
              <div class="ui-select">
                <select name="education-level" class="form-control">
                  <option value="Tertiary">Tertiary</option>
                  <option value="Bachelor">Bachelor</option>
                  <option value="Masters">Masters</option>
                  <option value="Doctorate">Doctorate</option>
                </select>
              </div>
            </div>
          </div>
          <!-- \.EDUCATION LEVEL -->
          <!-- DOB -->
          <div class="form-group">
            <label class="col-md-3 control-label">DOB:</label>
            <div class="col-md-8">
              <input name="dob" class="form-control" type="date">
            </div>
          </div>
          <!-- \.DOB -->
          <!-- HOURLY RATE -->
          <div class="form-group">
            <label class="col-md-3 control-label">Hourly Rate ($USD):</label>
            <div class="col-md-8">
              <input name="rate" class="form-control" type="number" name="rate" min="1" max="500" step="0.01" value=<?php echo $userLoggedInRow['rate']; ?>>
            </div>
          </div>
          <!-- \.HOURLY RATE -->
        </div>
        <!-- \.TEACHER ONLY EDIT FORM -->
        <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
            <button name="edit-profile-button" class="btn btn-primary" type="submit">Save profile</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<?php
include("src/views/footer.php");
?>