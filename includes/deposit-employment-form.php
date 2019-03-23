<?php
// the variables are fetched in header.php
// because only Students are able to click the link to the deposit-employment-container
// the Student will always be $userLoggedIn
// the Teacher will always be $_GET['userID']


// DELETED FROM form action=
/// action="https://www.sandbox.paypal.com/cgi-bin/webscr"

// in order to get the value of X hours
// see if the specific Employment exists
// if so, use the rate from the Employment
// if not, use the rate from the Teacher
// the reasoning is that a Teacher may have a different rate for each Employment
$s_id = $userLoggedInID;
$t_id = $row['userID'];
$employment_row = $employment->getThisEmployment($s_id, $t_id);
// check if the specific Employment already exists already
if (! $employment_row) {
    // if not, $rate equals Teacher's current rate
    $rate = $row['rate'];
} else {
    // if so, $rate equals Employment's current rate
    $rate = $employment_row['rate'];
}
?>

<div id="deposit-employment-container" class="overlay-item auth-forms">
    <div class="overlay-container">
        <div id="deposit-employment-close" class="close-button menu-button">
            <img src="assets/images/icons/icons8-multiply-26.png" alt="close-button">
        </div>
        <form id="deposit-employment-form" class="schedule-form auth-form form" method="POST" target="_top">
            <p>
                <label for="employment-student"><?php echo $lang['student']; ?></label>
                <input type="text" class="readonly" name="employment-student" value="<?php echo $userLoggedInRow['first_name']; ?>" readonly>
            </p>
            <p>
                <label for="employment-teacher"><?php echo $lang['teacher']; ?></label>
                <input type="text" class="readonly" name="employment-teacher" value="<?php echo $row['first_name']; ?>" readonly>
            </p>
            <p>
                <label for="deposit"><?php echo $lang['# lessons buy']; ?></label>
                <select onchange="updateAmount(this.value)" id="deposit" name="deposit" class="select" type="text">
                    <option value="" disabled selected><?php echo $lang['select option']; ?></option>
                    <option value="<?php echo $rate * 5 ?>"><?php echo $lang['5 lessons']; ?></option>
                    <option value="<?php echo $rate * 10 ?>"><?php echo $lang['10 lessons']; ?></option>
                    <option value="<?php echo $rate * 20 ?>"><?php echo $lang['20 lessons']; ?></option>
                    <option value="<?php echo $rate * 50 ?>"><?php echo $lang['50 lessons']; ?></option>
                </select>
            </p>
        </form>
    </div>
</div>
