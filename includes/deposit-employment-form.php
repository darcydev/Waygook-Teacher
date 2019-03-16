<?php
// the variables are fetched in header.php
// because only Students are able to click the link to the deposit-employment-form
// the Student will always be $userLoggedIn
// the Teacher will always be $_GET['userID']
?>

<div id="deposit-employment-form" class="overlay-item auth-forms">
    <div class="overlay-container">
        <div id="deposit-employment-close" class="close-button menu-button">
            <img src="assets/images/icons/icons8-multiply-26.png" alt="close-button">
        </div>
        <form class="schedule-form auth-form form" method="POST">
            <p>
                <label for="employment-student"><?php echo $lang['student']; ?></label>
                <input type="text" class="readonly" name="employment-student" value="<?php echo $userLoggedInRow['first_name']; ?>" readonly>
            </p>
            <p>
                <label for="employment-teacher"><?php echo $lang['teacher']; ?></label>
                <input type="text" class="readonly" name="employment-teacher" value="<?php echo $row['first_name']; ?>" readonly>
            </p>
            <p>
                <label for="employment-deposit"><?php echo $lang['employment deposit']; ?></label>
                <input name="employment-deposit" type="number" step="0.05" min="1" max="1000">
            </p>
            <button type="submit" id="deposit-employment-button" name="deposit-employment-button" class="button"><?php echo $lang['deposit for lessons']; ?></button>
        </form>
    </div>
</div>
