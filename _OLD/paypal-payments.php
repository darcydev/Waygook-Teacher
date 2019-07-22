<?php
include("includes/header.php");
/// include("includes/included-files.php");
// Include Functions
require 'paypal-functions.php';

// For sandbox payments, set to `true`
// For live payments, set to `false`
$enableSandbox = true;

// PayPal settings
$paypalConfig = [
    'email' => 'darcyelsing@gmail.com',
    'return_url' => 'http://waygookteacher.com/payment-successful.php',
    'cancel_url' => 'http://waygookteacher.com/payment-cancelled.php',
    'notify_url' => 'http://waygookteacher.com/paypal-payments.php'
];

$paypalUrl = $enableSandbox ? 'https://www.sandbox.paypal.com/cgi-bin/webscr' : 'https://www.paypal.com/cgi-bin/webscr';

$itemAmount = $_POST['deposit'] * $_POST['employmentRate'];
$itemName = $itemAmount . ' lessons';

// if the custom field (employmentID) is set in the form
// (other than as the default of 0)
// that is, if the Employment already exists
if ($_POST['custom'] != 0) {
    $employmentID = $_POST['custom'];
// if the custom field (employmentID) is not set in the form
// that is, if the Employment doesn't already exist
} else {
    $rate = $_POST['employmentRate'];
    $studentID = $_POST['student'];
    $teacherID = $_POST['teacher'];
    // create the Employment in the DB
    $row = $employment->createEmployment($studentID, $teacherID, $rate);
    // set the employmentID as the ID for the newly-created row in the DB
    $employmentID = $row['employmentID'];
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
    $data['custom'] = $employmentID;

    // Build the query string from the data.
    $queryString = http_build_query($data);

    // Redirect to paypal IPN
    header('location:' . $paypalUrl . '?' . $queryString);
    exit();

} else {
    // Handle the PayPal response.

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

    // check that the transaction has come from PayPal, and
    // check that we've not already processed the transaction (???)
    if (verifyTransaction($_POST) && checkTxnid($data['txn_id'])) {
        // get the variables from the data array
        $employmentID = $data['custom'];
        $amount = $data['payment_amount'];
        // insert the Incoming_Payment into the DB
        $rowsAffected = $payment->insertIncomingPayment($employmentID, $amount);

        // if the Incoming_Payment was successfully inserted into the DB
        if ($rowsAffected == 1) {
            // update the Employment in the DB with the added deposit amount
            $rowsAffected = $employment->updateEmploymentAmount($employmentID, $amount);
        // if the Incoming_Payment wasn't inserted into the DB
        } else {
            //
        }

    }
}

?>
