<?php
// the variables are fetched in header.php
// because only Students are able to click the link to the deposit-employment-container
// the Student will always be $userLoggedIn
// the Teacher will always be $_GET['userID']


// OUTDATED::::
// in order to get the value of X hours
// see if the specific Employment exists
// if so, use the rate from the Employment
// if not, use the rate from the Teacher
// the reasoning is that a Teacher may have a different rate for each Employment
$s_id = $userLoggedInID;
$t_id = $row['userID'];
$employment_row = $employment->getThisEmployment($s_id, $t_id);
$employmentID = $employment_row['employmentID'];
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
        <form id="deposit-employment-form" class="schedule-form auth-form form paypal" action="paypal-payments.php" method="post" target="_top">
            <input type="hidden" name="cmd" value="_xclick" />
            <input type="hidden" name="no_note" value="1" />
            <input type="hidden" name="lc" value="UK" />
            <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
            <input type="hidden" name="first_name" value="Customer's First Name" />
            <input type="hidden" name="last_name" value="Customer's Last Name" />
            <input type="hidden" name="payer_email" value="customer@example.com" />
            <input type="hidden" name="item_number" value="123456" / >
			<input type="hidden" name="custom" value="<?php echo $employmentID; ?>" / >
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
				<select id="deposit" name="deposit" class="select" type="text">
					<option disabled selected><?php echo $lang['select option']; ?></option>
                    <option value="5"><?php echo $lang['5 lessons']; ?></option>
                    <option value="10"><?php echo $lang['10 lessons']; ?></option>
                    <option value="20"><?php echo $lang['20 lessons']; ?></option>
                    <option value="50"><?php echo $lang['50 lessons']; ?></option>
				</select>
            </p>
            <input type="submit" name="submit" value="Submit Payment"/>
        </form>
	</div>
</div>
