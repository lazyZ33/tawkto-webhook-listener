<?php

$secret_key = 'your_secret_key';  // Add the Secret Key From Tawk.to

$body = file_get_contents('php://input');
$signature = isset($_SERVER['HTTP_X_TAWK_SIGNATURE']) ? $_SERVER['HTTP_X_TAWK_SIGNATURE'] : '';

function verifySignature($body, $signature, $secret_key) {
    $digest = hash_hmac('sha1', $body, $secret_key);
    return $signature === $digest;
}

if (!verifySignature($body, $signature, $secret_key)) {
    // If the signature is invalid, return a 403 Forbidden response
    header('HTTP/1.1 403 Forbidden');
    echo "Forbidden: Invalid Signature";
    exit;
}

$data = json_decode($body, true);

// I am using 'chat:start' event, it's validation for that...
if (isset($data['event']) && $data['event'] == 'chat:start') {
    $chat_id = isset($data['chatId']) ? $data['chatId'] : 'Unknown';
    $visitor_name = isset($data['visitor']['name']) ? $data['visitor']['name'] : 'Unknown';
    $visitor_email = isset($data['visitor']['email']) ? $data['visitor']['email'] : 'Unknown';
    $visitor_city = isset($data['visitor']['city']) ? $data['visitor']['city'] : 'Unknown';
    $visitor_country = isset($data['visitor']['country']) ? $data['visitor']['country'] : 'Unknown';
    $property_name = isset($data['property']['name']) ? $data['property']['name'] : 'Unknown';
    
    $to = 'abc@gmail.com';  // Change this email
    $subject = 'New Chat Started';
    $message = "A new chat has started!\n\n"
             . "Chat ID: $chat_id\n"
             . "Visitor: $visitor_name\n"
             . "Email: $visitor_email\n"
             . "City: $visitor_city\n"
             . "Country: $visitor_country\n"
             . "Property: $property_name";
    $headers = 'From: no-reply@yourdomain.com' . "\r\n" . //Change this email as well 
               'Reply-To: no-reply@yourdomain.com' . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    // Send the email
    mail($to, $subject, $message, $headers);
}
?>
