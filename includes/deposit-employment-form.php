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
$emp_id = $employment_row['employmentID'];
// check if the specific Employment already exists already
if (! $employment_row) {
    // if not, $rate equals Teacher's current rate
    $rate = $row['rate'];
} else {
    // if so, $rate equals Employment's current rate
    $rate = $employment_row['rate'];
}
?>

<!-- PAYPAL SMART BUTTONS -->
<!-- Include the PayPal JavaScript SDK -->
<!--
BACKGROUND TO ISSUE:
    ** The site was/is loading slowly, because PayPal script is loading on every
    ** page. As a fix, I attempted the following:
        *** Load the script only on necessary pages
        *** Load the script async in the header
    ** However, these solutions weren't working. So, I've reverted back to
    ** loading the script within the form as below.

MORE INFO:
    ** For info on optimize loading PayPal script, see here:
    ** https://developer.paypal.com/docs/checkout/troubleshoot/performance/#instant-render
-->
<!-- NOTE: within the url, I changed the parameter 'client-id' from sb -->
<script
  src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD">
</script>
<script>
// render the PayPal button into #deposit-employment-form
paypal.Buttons({
    // set up the transaction
    /* **
        ** this version is the 'basic integration'
        ** it creates the transaction on the Client-side
        ** therefore, it is suspectible to the User adjusting amount.value
        ** for use in sandbox only
    ** */
    createOrder: function(data, actions) {
        return actions.order.create({
            purchase_units: [{
                amount: {
                    // deposit_amount is got from onchange in deposit-employment-form.php
                    value: deposit_amount // REAL-AMOUNT
                    // value: 0.02 // TEST-AMOUNT
                }
            }]
        });
    },

    /* **
        ** this version is the more advanced integration
        ** it creates the transaction on the Server-side
        ** returns a successful response to the client with the orderID

    createOrder: function() {
        return fetch('http://127.0.0.1:8888/Waygook-Teacher/paypal/create-transaction.php', {
            method: 'post',
            headers: {
                'content-type': 'application/json'
            }
        }).then(function(res) {
            return res.json();
        }).then(function(data) {
            return data.orderID;
        });
    },
    ** */
    // finalize the transaction
    /* **
        ** this version is the 'basic integration'
        ** it creates the transaction on the Client-side
        ** returns a success alert message
    ** */
    onApprove: function(data, actions) {
        // Capture the funds from the transaction
        return actions.order.capture().then(function(details) {
            // Show a success message to your buyer
            alert('Transaction completed by ' + details.payer.name.given_name);
        });
    }
    /*
    onApprove: function(data) {
      return fetch('http://127.0.0.1:8888/Waygook-Teacher/assets/js/get-paypal-transaction', {
        headers: {
          'content-type': 'application/json'
        },
        body: JSON.stringify({
          orderID: data.orderID
        })
      }).then(function(res) {
        return res.json();
      }).then(function(details) {
        alert('Transaction approved by ' + details.payer_given_name);
        })
    }
    */
}).render('#deposit-employment-form');
</script>

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
