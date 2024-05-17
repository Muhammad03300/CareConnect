<?php
// Include the 2Checkout library
require_once('2co/lib/Twocheckout.php');

// Set your 2Checkout credentials
Twocheckout::privateKey('your-private-key');
Twocheckout::sellerId('your-seller-id');
Twocheckout::sandbox(true); // Set to false for production

// Get the token from the form submission
$token = $_POST['token'];

try {
    // Charge the customer using the 2Checkout API
    $charge = Twocheckout_Charge::auth(array(
        "merchantOrderId" => "123",
        "token" => $token,
        "currency" => 'USD',
        "total" => '10.00',
        "billingAddr" => array(
            "name" => 'John Doe',
            "addrLine1" => '123 Main St',
            "city" => 'City',
            "state" => 'CA',
            "zipCode" => '12345',
            "country" => 'USA',
            "email" => 'john@example.com',
            "phoneNumber" => '555-555-5555'
        )
    ));

    // Check the status of the charge
    if ($charge['response']['responseCode'] == 'APPROVED') {
        // Payment successful
        echo "Payment successful!";
    } else {
        // Payment failed
        echo "Payment failed: " . $charge['response']['responseCode'];
    }
} catch (Twocheckout_Error $e) {
    // Handle errors
    echo "Error: " . $e->getMessage();
}
?>
