<?php

// an empty message will not be submitted
if (isset($_POST['send-message-button'], $_GET['userID']) && trim($_POST['send-message-text'] !== '')) {
  $toUser = $_GET['userID'];
  $text = $_POST['send-message-text'];

  $rowsAffected = $user->insertMessage($text, $toUser);
}
