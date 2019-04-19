<?php
// COPIED FROM HERE: https://bit.ly/2X9zbvo

namespace Sample;

use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;

ini_set('error_reporting', E_ALL); // or error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

class PayPalClient {
    /**
     * Returns PayPal HTTP client instance with environment that has access
     * credentials context. Use this instance to invoke PayPal APIs, provided the
     * credentials have access.
     */
    public static function client() {
        return new PayPalHttpClient(self::environment());
    }

    /**
     * Set up and return PayPal PHP SDK environment with PayPal access credentials.
     * This sample uses SandboxEnvironment. In production, use ProductionEnvironment.
     */
    public static function environment() {
        $clientId = getenv("CLIENT_ID") ?: "ARvfpMvKkiNJfbgwGh4WW6x4temHSHbz9U-pkUbcbPAtibI64cb9GFMuCgqfFHPooxOGRGgfewGSi3oz";
        $clientSecret = getenv("CLIENT_SECRET") ?: "EJg1jZEJzTFhBmp5ANqrmPGEgCAr3KP_Q7V6fgK6a6M7Qj4jsL-tVp84UWl7co9VDOG-6Q0ogT5pcD0V";
        return new SandboxEnvironment($clientId, $clientSecret);
    }
}
?>
