<nav id="sidebar" class="sidebar">
  <ul>
    <!-- SEND MESSAGE LINK -->
    <li id='sidebar-message' data-toggle="modal" data-target="#send-message-modal"><img src="https://img.icons8.com/dusk/64/000000/new-message.png" alt="message-icon">
      <span>Message</span>
    </li>
    <!-- \.SEND MESSAGE LINK -->
    <!-- SCHEDULE LESSON LINK -->
    <li id="sidebar-schedule" data-toggle="modal" data-target="#schedule-lesson-modal"><img src="https://img.icons8.com/officel/64/000000/overtime.png" alt="calendar-icon">
      <span>Schedule</span>
    </li>
    <!-- \.SCHEDULE LESSON LINK -->
    <!-- EDIT PROFILE -->
    <a id="sidebar-edit" href="/<?php echo $_SESSION['projectPath']; ?>src/views/edit.php">
      <img src="https://img.icons8.com/dusk/64/000000/contract-job.png" alt="profile-icon">
      <span>Edit</span>
    </a>
    <!-- \.EDIT PROFILE LINK -->
  </ul>
</nav>

<script src="/<?php echo $_SESSION['baseURL']; ?>js/sidebar.min.js"></script>