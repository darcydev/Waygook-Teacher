<?php
// activate 'output buffering'
ob_start();
// enable use of sessions
session_start();

$timezone = date_default_timezone_set("Asia/Seoul");

// host = "locahost", user = "root", password = "root", mysql db name = "Waygook-Teacher"
$con = mysqli_connect("localhost", "root", "root", "Waygook-Teacher");

// if error connecting to db, print error msg
if(mysqli_connect_errno()) {
    echo "Failed to connect: " . mysqli_connect_errno();
}
?>
