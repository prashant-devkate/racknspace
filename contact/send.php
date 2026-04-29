<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Spam protection
    if (!empty($_POST['honeypot'])) {
        die("Spam detected");
    }

    // Collect data
    $first = htmlspecialchars($_POST['first_name']);
    $last = htmlspecialchars($_POST['last_name']);
    $email = htmlspecialchars($_POST['email']);
    $company = htmlspecialchars($_POST['company']);
    $industry = htmlspecialchars($_POST['industry']);
    $message = htmlspecialchars($_POST['message']);

    // Email config
    $to = "meetprashant1234@gmail.com";
    $subject = "New Enquiry - Rack N Space";

    $body = "
    New enquiry received:

    Name: $first $last
    Email: $email
    Company: $company
    Industry: $industry

    Message:
    $message
    ";

    $headers = "From: noreply@racknspace.com\r\n";
    $headers .= "Reply-To: $email\r\n";

    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Error sending message.";
    }
}
?>