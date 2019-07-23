<?php

/* CONTROLLER PAGE FOR COLLECTING PROFILES TO DISPLAY ON SEARCH.PHP */

/* SEARCH BAR */

/* RETRIVE RELEVANT PROFILES FROM DB */

// at first, select 12 random profiles from DB
$sql = "SELECT * FROM Users";
$stmt = $db->run($sql);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);