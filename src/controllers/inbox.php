<?php

/* The controller page for retreving/uploading messages from the DB for inbox.php */

// retrieve all conversations involving $userLoggedIn
$allContacts = $user->getAllContacts();