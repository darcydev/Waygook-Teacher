<?php
include("../../classes/MyPDO.php");

$db = MyPDO::instance();

if (isset($_POST['id']) && isset($_POST['duration']) && isset($_POST['t_id']) && isset($_POST['t_pay'])) {
    // confirm the lesson
    $sql = "UPDATE Lessons
            SET confirmed = ?
            WHERE lessonID = ?";
    $stmt = $db->run($sql, [1, $_POST['id']]);

    // update Teacher's statistics
    $hours = $_POST['duration'] / 60;
    $sql = "UPDATE Users
            SET lesson_hours = lesson_hours + ?,
                account_balance = account_balance + ?
            WHERE userID = ?";
    $stmt = $db->run($sql, [$hours, $_POST['t_pay'], $_POST['t_id']]);
}
?>
