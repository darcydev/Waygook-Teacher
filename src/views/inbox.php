<?php
// set DOCUMENT_ROOT variable
set_include_path(get_include_path() . PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT'] . "\Waygook-Teacher");

require_once("src/views/head.php");
require_once("src/views/header.php");

require_once("src/controllers/inbox.php");
?>

<main class="inbox flex">

  <!-- SIDE PANEL -->
  <section class="section side-panel">

    <!-- SEARCH BAR -->
    <div class="search header">
      <i class="fa fa-search" aria-hidden="true"></i>
      <input type="text" placeholder="Search contacts..." />
    </div>
    <!-- \.SEARCH BAR -->

    <!-- CONTACTS LIST -->
    <div class="contacts">
      <ul>
        <!-- PHP LOOP: CONVERSATION ITEMS -->
        <?php foreach ($allContacts as $item) { ?>
          <?php
          // In each conversation, there are two Users: theUserLoggedIn and 'the other User'
          // As iterate through each conversation, determine which is which.
          if ($userLoggedInRow['userID'] == $item['from_user_id']) {
            $otherUserID = $item['to_user_id'];
          } else {
            $otherUserID = $item['from_user_id'];
          }
          // fetch the DB details of the 'other User'
          $otherUserRow = $user->getOtherUser($otherUserID);
          ?>
          <li class="contact img-xs round" onclick="fetchUserDetails(<?php echo $otherUserRow['userID']; ?>);
                      fetchConversation(<?php echo $otherUserRow['userID']; ?>);">
            <div class="img-xs round">
              <img src="<?php echo $otherUserRow['profile_pic']; ?>" alt="profile-pic" />
            </div>
            <div class="preview">
              <p class="name"><?php echo $otherUserRow['first_name']; ?></p>
              <p class="text"><?php echo $item['message_content']; ?></p>
            </div>
          </li>
        <?php } ?>
        <!-- \.PHP LOOP: CONVERSATION ITEMS -->
      </ul>
    </div>

  </section>
  <!-- \.SIDE PANEL -->

  <!-- CONVERSATION -->
  <section class="section conversation">

    <div class="header img-s round">
      <img id="conversation-header-photo" src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
      <!-- TODO: href is intentionally not working for now, but later direct to User's page -->
      <a href="//localhost/Waygook-Teacher/src/views/profile.php?userID=<?php echo '15'; ?>">
        <p id="conversation-header-name">Harvey Specter</p>
      </a>
    </div>

    <div id='messages' class='messages'>
      <!-- DOM is updated from AJAX call in inbox.js -->
    </div>

    <div class="message-input">
      <textarea name="send-message" placeholder="Send message..."></textarea>
    </div>

  </section>
  <!-- \.CONVERSATION -->

</main>

<?php
include("src/views/footer.php");
?>

<script src="/Waygook-Teacher/src/js/inbox.js"></script>