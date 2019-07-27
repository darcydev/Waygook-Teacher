<?php

/* The controller page for retreving/uploading messages from the DB for inbox.php */

/* CONTACTS BAR */
/* retrieve all conversations involving $userLoggedIn */
$allContacts = $user->getAllContacts();

/* CONVERSATION */
/// $specificConversaton = $user->getConversation($otherUserID);