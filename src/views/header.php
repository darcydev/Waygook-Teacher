<header class="site-header">
  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-dark primary-color">
    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
      aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="basicExampleNav">
      <!-- Links -->
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="//localhost/Waygook-Teacher/public/index.php">WaygookTeacher
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a id="profile-nav-link" class="nav-link" href="//localhost/Waygook-Teacher/src/views/profile.php">Profile</a>
        </li>
        <li class="nav-item">
          <a id="search-nav-link" class="nav-link" href="//localhost/Waygook-Teacher/src/views/search.php">Search</a>
        </li>
        <li class="nav-item">
          <a id="login-nav-link" class="nav-link" href="#" data-toggle="modal"
            data-target="#modalLRForm">Login/Register</a>
          <a id="logout-nav-link" class="nav-link" href="//localhost/Waygook-Teacher/src/views/logout.php">Logout</a>
        </li>

        <!-- Dropdown -->
        <li id="dropdown-nav-link" class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">more</a>
          <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">Schedule</a>
            <a class="dropdown-item" href="#">Calendar</a>
            <a class="dropdown-item" href="#">Messages</a>
            <a class="dropdown-item" href="#">Edit Profile</a>
            <a class="dropdown-item" href="#">Settings</a>
          </div>
        </li>
      </ul>
      <!-- Links -->
    </div>
    <!-- Collapsible content -->
  </nav>
  <!-- /.NAVBAR -->
</header>

<?php
// Call the displayNavLinks function with the boolean variable $loggedIn of whether a User is currently logged in
// or not.
if ($loggedIn == true) {
	echo "<script>displayNavLinks(true);</script>";
} else {
	echo "<script>displayNavLinks(false);</script>";
}
?>