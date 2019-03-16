<?php
if (isset($_POST['deposit-employment-button'], $userLoggedInID, $_GET['userID'])) {
    // variables fetched from header.php
    // as only Students can click the deposit-employment-form button, the
    // userLoggedIn will always be the student
    $s_id = $userLoggedInID;
    $t_id = $row['userID'];
    $t_rate = $row['rate'];
    $deposit = $_POST['employment_deposit'];

    $rowsAffected = $employment->insertORupdateEmployment($s_id, $t_id, $t_rate, $deposit);

    if ($rowsAffected == 1) {
        header("Location: lesson-list.php");
    } else {
        // alert message if DB fails to update
        echo "Sorry, there was an error creating/updating the Employment";
    }
}
?>
