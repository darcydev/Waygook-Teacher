<link rel="stylesheet" type="text/css" href="assets/css/style.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="assets/js/script.js"></script>

<?php include("assets/jQuery/jQuery.php"); ?>

<link href="https://fonts.googleapis.com/css?family=Archivo" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

<?php // PayPal scripts. See here: https://bit.ly/2UyKj88 ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />

<?php
// PayPal transaction scripts
include("paypal/sdk-config.php");
include("paypal/sdk-environment.php");
include("paypal/create-transaction.php");
include("paypal/get-transaction.php");
include("paypal/capture-authorization.php");
include("paypal/create-authorization.php");
?>
