<?php
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
        <div id="<?php echo $les['lessonID']; ?>" class='row row-striped<?php echo $les['cancelled'] ? ' cancelled' : '' ?><?php echo $les['confirmed'] ? ' confirmed' : '' ?>'>
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
              <li class='list-inline-item'><i class='fab fa-skype' aria-hidden='true'></i> <?php echo $isStudent ? $user->getOtherUser($les['teacher_id'])['skype_name'] : $user->getOtherUser($les['student_id'])['skype_name']; ?></li>
            </ul>
            <ul class="btn-list">
              <!-- TODO: include confirmation ('are you sure?') as a beforeSend to the fetch API -->
              <!-- the User can't confirm 'future lessons'. Thus, the confirm button will only display if the lesson is 'in the past' -->
              <li class="btn btn-success btn-sm<?php echo $les['datetime'] > date("Y-m-d H:i:s") ? ' display-none' : ''; ?>" onclick="confirmLesson(<?php echo $les['lessonID']; ?>);"><?php echo $les['confirmed'] ? 'Lesson Confirmed' : 'Confirm' ?></li>
              <!-- TODO: include reschedule lesson functionality -->
              <!-- <li class="btn btn-warning btn-sm" onclick="rescheduleLesson(<?php echo $les['lessonID']; ?>);">Reschedule</li> -->
              <li class="btn btn-danger btn-sm" onclick="cancelLesson(<?php echo $les['lessonID']; ?>);"><?php echo $les['cancelled'] ? 'Lesson Cancelled' : 'Cancel' ?></li>
            </ul>
          </div>
        </div>
      <?php } ?>
      <!-- \.PHP LOOP -->
    </section>
    <!-- \.AGENDA -->

  </div>

</main>

<?php
require_once("src/views/footer.php");
?>

<script src="/<?php echo $_SESSION['baseURL']; ?>js/calendar.min.js"></script>