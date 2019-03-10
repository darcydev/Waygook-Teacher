<?php
include("../../classes/MyPDO.php");

$db = MyPDO::instance();

if (isset($_POST['id'])) {
    $sql = "UPDATE Lessons SET confirmed = ? WHERE lessonID = ?";
    $stmt = $db->run($sql, [1, $_POST['id']]);
}
?>
