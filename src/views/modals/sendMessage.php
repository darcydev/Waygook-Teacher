<!-- MODAL: SEND MESSAGE FORM -->
<div id='send-message-modal' class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">To: INSERT NAME via DOM</h4>
      </div>

      <!-- MODAL BODY -->
      <div class="modal-body mb-1">
        <form id="send-message-form" method="POST">
          <div class="md-form">
            <textarea name="send-message-text" type='text' oninput='this.style.height = "";this.style.height = this.scrollHeight + 3 + "px"'></textarea>
          </div>
          <div class="text-center mt-2">
            <button name='send-message-button' type="submit" class="btn btn-primary">Send message</button>
          </div>
        </form>
      </div>
      <!-- \.MODAL BODY -->

    </div>
  </div>
</div>
<!-- \.MODAL: SEND MESSAGE FORM -->