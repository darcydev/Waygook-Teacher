<!-- MODAL: SCHEDULE LESSON FORM -->
<div id='schedule-lesson-modal' class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">SCHEDULE LESSON</h4>
      </div>

      <!-- MODAL BODY -->
      <div class="modal-body mb-1">
        <form id="send-message-form" method="POST">
          <div class="md-form">
            <input class='form-control' name='date' placeholder="Lesson date" type="date" required>
          </div>
          <div class="md-form">
            <input class='form-control' name='time' placeholder="Lesson time" type="time" required>
          </div>
          <div class="md-form">
            <input class='form-control' name='duration' placeholder="Duration (minutes)" type="number" min="15" max="240" step="15" required>
          </div>
          <div class="md-form">
            <select class='form-control select' name='with' type="text" required>
              <!-- PHP LOOP: iterate over $userEmployments, and add each as an option -->
              <?php foreach ($userEmployments as $emp) {
                $otherID = $emp[$otherUserRole . '_id'];
                $otherFN = $user->getOtherUser($otherID)['first_name'];
                $prepaidMinutes = floor(($emp['prepaid_amount'] / $emp['rate']) * 60);
                ?>
                <option value='<?php echo $otherID; ?>'><?php echo $otherFN; ?> (<?php echo $prepaidMinutes; ?> minutes remaining)</option>
              <?php } ?>
              <!-- \.PHP LOOP -->
            </select>
          </div>
          <div class="text-center mt-2">
            <button name='schedule-lesson-button' type="submit" class="btn btn-primary">Send message</button>
          </div>
        </form>
      </div>
      <!-- \.MODAL BODY -->

    </div>
  </div>
</div>
<!-- \.MODAL: SCHEDULE LESSON FORM -->