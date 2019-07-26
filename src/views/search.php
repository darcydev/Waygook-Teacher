<?php
// set DOCUMENT_ROOT variable
set_include_path(get_include_path() . PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT'] . "\Waygook-Teacher");

include("src/views/head.php");
include("src/views/header.php");

include("src/controllers/search.php");
?>

<main>

  <!-- SEARCH BAR -->
  <!-- TODO: include an onClick function, which updates the page (using AJAX) everytime the User clicks a 'search' button -->
  <section class="section search-bar">
    <!-- GENDER -->
    <label class="mdb-main-label">Gender</label>
    <select name="" id="gender-select" class="mdb-select md-form">
      <option value="all">All</option>
      <option value="male">Male</option>
      <option value="female">Female</option>
    </select>
    <!-- \.GENDER -->
    <!-- NATIONALITY -->
    <label class="mdb-main-label">Nationality</label>
    <select name="" id="nationality-select" class="mdb-select md-form">
      <option value="all">All</option>
      <option value="usa">USA</option>
      <option value="australia">Australia</option>
      <option value="canada">Canada</option>
      <option value="britain">Britain</option>
      <option value="south-africa">South Africa</option>
    </select>
  </section>
  <!-- \.SEARCH BAR -->

  <section class="section search">
    <div class="container search-container">
      <!-- PROFILE ITEMS -->
      <!-- open PHP loop -->
      <?php foreach ($users as $row) { ?>
      <div class="item">
        <div class="img-m round">
          <img
            src="<?php echo $row['profile_pic']; ?>"
            alt="profile-photo">
        </div>
        <h5>
          <?php echo $row['first_name']; ?>
        </h5>
        <a class="btn btn-outline-primary"
          href="//localhost/Waygook-Teacher/src/views/profile.php?userID=<?php echo $row['userID']; ?>">View
          more</a>
      </div>
      <!-- close PHP loop -->
      <?php } ?>
    </div>
  </section>

</main>

<?php
include("src/views/footer.php");
?>