<?php
// set DOCUMENT_ROOT variable
set_include_path(get_include_path() . PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT'] . "\Waygook-Teacher");

require_once("src/views/head.php");
require_once("src/views/header.php");
?>

<main>

  <div class="container calendar">

    <!-- SIDEBAR -->
    <section class="section">
      <?php include("src/views/sidebar.php"); ?>
    </section>
    <!-- \.SIDEBAR -->

    <div id="wrap">

      <div id="calendar"></div>

      <div style='clear:both'></div>

    </div>

  </div>

</main>

<?php
include("src/views/footer.php");
?>

<script src="/Waygook-Teacher/src/js/calendar.js"></script>