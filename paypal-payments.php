<?php
include("includes/header.php");
/// include("includes/included-files.php");
// Include Functions
require 'paypal-functions.php';

// For sandbox payments, set to `true`
// For live payments, set to `false`
$enableSandbox = true;

// PayPal settings. Change these to your account details and the relevant URLs
// for your site.
$paypalConfig = [
    'email' => 'darcyelsing@gmail.com',
    'return_url' => 'http://waygookteacher.com/payment-successful.php',
    'cancel_url' => 'http://waygookteacher.com/payment-cancelled.php',
    'notify_url' => 'http://waygookteacher.com/paypal-payments.php'
];

$paypalUrl = $enableSandbox ? 'https://www.sandbox.paypal.com/cgi-bin/webscr' : 'https://www.paypal.com/cgi-bin/webscr';

// Product being purchased.
if (isset($_POST['deposit'])) {
    $itemAmount = $_POST['deposit'];
    $itemName = $itemAmount . ' lessons';
} else {
    echo "Sorry, the number of lessons was not selected";
}

// Check if paypal request or response
if (!isset($_POST["txn_id"]) && !isset($_POST["txn_type"])) {

    // Grab the post data so that we can set up the query string for PayPal.
    // Ideally we'd use a whitelist here to check nothing is being injected into
    // our post data.
    $data = [];
    foreach ($_POST as $key => $value) {
        $data[$key] = stripslashes($value);
    }

    // Set the PayPal account.
    $data['business'] = $paypalConfig['email'];

    // Set the PayPal return addresses.
    $data['return'] = stripslashes($paypalConfig['return_url']);
    $data['cancel_return'] = stripslashes($paypalConfig['cancel_url']);
    $data['notify_url'] = stripslashes($paypalConfig['notify_url']);

    // Set the details about the product being purchased, including the amount
    // and currency so that these aren't overridden by the form data.
    $data['item_name'] = $itemName;
    $data['amount'] = $itemAmount;
    $data['currency_code'] = 'USD';

    // Add any custom fields for the query string.
    //$data['custom'] = USERID;

    // Build the query string from the data.
    $queryString = http_build_query($data);

    // Redirect to paypal IPN
    header('location:' . $paypalUrl . '?' . $queryString);
    exit();

} else {
    // Handle the PayPal response.

    // Create a connection to the database.
    //// $db = MyPDO::instance();

    // Assign posted variables to local data array.
    $data = [
        'item_name' => $_POST['item_name'],
        'item_number' => $_POST['item_number'],
        'payment_status' => $_POST['payment_status'],
        'payment_amount' => $_POST['mc_gross'],
        'payment_currency' => $_POST['mc_currency'],
        'txn_id' => $_POST['txn_id'],
        'receiver_email' => $_POST['receiver_email'],
        'payer_email' => $_POST['payer_email'],
        'custom' => $_POST['custom'],
    ];

    // We need to verify the transaction comes from PayPal and check we've not
    // already processed the transaction before adding the payment to our
    // database.
    if (verifyTransaction($_POST) && checkTxnid($data['txn_id'])) {

        // insert the payment into the DB

        $u_id = 23;
        $e_id = 10;
        $amount = 5.00;
        $date = date("Y-m-d H:i:s");
        $rowsAffected = $payment->insertIncomingPayment($u_id, $e_id, $amount, $date);

        //// $rowsAffected = $payment->insertIncomingPayment($u_id, $e_id, $amount);

        mail("darcyeprice@hotmail.com", "Test 4.3.1", "test");

        // if the payment was successfully inserted into the DB
        if ($rowsAffected == 1) {
            // Payment successfully added.
            mail("darcyeprice@hotmail.com", "Test 4.4", "test");
        // if there was an error inserting the payment into the DB
        } else {
            mail("darcyeprice@hotmail.com", "Test 4.5", "test");
        }

    }
}

?>
