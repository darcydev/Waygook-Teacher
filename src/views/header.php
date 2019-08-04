<header class="site-header">
  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-dark primary-color">
    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="basicExampleNav">
      <!-- Links -->
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/Waygook-Teacher/public/index.php">WaygookTeacher
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a id="profile-nav-link" class="nav-link" href="/Waygook-Teacher/src/views/profile.php">Profile</a>
        </li>
        <li class="nav-item">
          <a id="inbox-nav-link" class="nav-link" href="/Waygook-Teacher/src/views/inbox.php">Inbox</a>
        </li>
        <li class="nav-item">
          <a id="search-nav-link" class="nav-link" href="/Waygook-Teacher/src/views/search.php">Search</a>
        </li>
        <li class="nav-item">
          <a id="calendar-nav-link" class="nav-link" href="/Waygook-Teacher/src/views/calendar.php">Calendar</a>
        </li>
        <li class="nav-item">
          <a id="login-nav-link" class="nav-link" href="#" data-toggle="modal" data-target="#modalLRForm">Login/Register</a>
          <a id="logout-nav-link" class="nav-link" href="/Waygook-Teacher/src/views/logout.php">Logout</a>
        </li>

        <!-- REMOVED: Dropdown -->
        <!--         <li id="dropdown-nav-link" class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">more</a>
          <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
          </div>
        </li> -->
        <!-- \.REMOVED: Dropdown -->
      </ul>
      <!-- Links -->
    </div>
    <!-- Collapsible content -->
  </nav>
  <!-- /.NAVBAR -->
</header>

<?php
// function takes a bool of whether the User is logged in or not
/* echo "<script>displayNavLinks($isLoggedIn);</script>"; */
// FIXME: JS file isn't being loaded before this function is being called
if ($isLoggedIn) {
  echo "<script>displayNavLinks(true);</script>";
} else {
  echo "<script>displayNavLinks(false);</script>";
}
?>