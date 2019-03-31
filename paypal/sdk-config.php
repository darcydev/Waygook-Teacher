<?php
// COPIED FROM: https://developer.paypal.com/docs/api/quickstart/environment/

// Autoload SDK package for composer based installations
require 'vendor/autoload.php';

$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        // Client ID (sandbox)
        'ARvfpMvKkiNJfbgwGh4WW6x4temHSHbz9U-pkUbcbPAtibI64cb9GFMuCgqfFHPooxOGRGgfewGSi3oz',
        // Secret (sandbox)
        'EJg1jZEJzTFhBmp5ANqrmPGEgCAr3KP_Q7V6fgK6a6M7Qj4jsL-tVp84UWl7co9VDOG-6Q0ogT5pcD0V'
  )
);
?>
