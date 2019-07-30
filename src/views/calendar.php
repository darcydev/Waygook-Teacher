<?php
// set DOCUMENT_ROOT variable
set_include_path(get_include_path() . PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT'] . "\Waygook-Teacher");

require_once("src/views/head.php");
require_once("src/views/header.php");

require_once("src/controllers/calendar.php");
?>

<main>

  <div class="container calendar">

    <!-- SIDEBAR -->
    <section class="section">
      <?php include("src/views/sidebar.php"); ?>
    </section>
    <!-- \.SIDEBAR -->

    <!-- AGENDA -->
    <section id='agenda' class="agenda">
      <!-- PHP LOOP: iterate over $allLessons, and add each as an HTML element -->
      <?php foreach ($allLessons as $les) { ?>
        <div id='lessonID' class='row row-striped'>
          <div class='col-2 text-right'>
            <h1 class='display-4'><span class='badge badge-secondary'><?php echo date("d", strtotime($les['datetime'])); ?></span></h1>
            <h2><?php echo date("M", strtotime($les['datetime'])); ?></h2>
          </div>
          <div class='col-10'>
            <!-- get the first name of 'other User' -->
            <h3><?php echo $isStudent ? $user->getOtherUser($les['teacher_id'])['first_name'] : $user->getOtherUser($les['student_id'])['first_name']; ?> lesson</h3>
            <ul>
              <li class='list-inline-item'><?php echo date("H:i T", strtotime($les['datetime'])); ?></li>
              <i class="far fa-clock"></i>
              <li class='list-inline-item'><?php echo $les['duration']; ?> minutes</li>
              <li class='list-inline-item'><i class='fab fa-skype' aria-hidden='true'></i></li>
            </ul>
            <ul class="btn-list">
              <li class="btn btn-success btn-sm">Confirm</li>
              <li class="btn btn-warning btn-sm">Reschedule</li>
              <li class="btn btn-danger btn-sm">Cancel</li>
            </ul>
          </div>
          <!-- TODO: include buttons -->
        </div>
      <?php } ?>
      <!-- \.PHP LOOP -->
    </section>
    <!-- \.AGENDA -->

  </div>

</main>

<?php
include("src/views/footer.php");
?>

<script src="/Waygook-Teacher/src/js/calendar.js"></script>