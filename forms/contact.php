<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Replace with your actual receiving email address
    $receiving_email_address = 'kutluhan@sabanciuniv.edu';

    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Validate email address
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Invalid email address';
        exit;
    }

    // Construct email headers
    $headers = 'From: ' . $email . "\r\n" .
               'Reply-To: ' . $email . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    // Construct email message
    $email_message = "Name: $name\n";
    $email_message .= "Email: $email\n";
    $email_message .= "Subject: $subject\n\n";
    $email_message .= "Message:\n$message";

    // Send email
    if (mail($receiving_email_address, $subject, $email_message, $headers)) {
        echo 'success';
    } else {
        echo 'Error sending email';
    }
} else {
    echo 'Invalid request';
}
?>
