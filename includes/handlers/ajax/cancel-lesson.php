<?php
include("../../classes/MyPDO.php");

$db = MyPDO::instance();

if (isset($_POST['id'])) {
    $sql = "DELETE FROM Lessons
            WHERE lessonID = ?";
    $stmt = $db->run($sql, [$_POST['id']]);
}
?>
