<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $subject = trim($_POST["subject"]);
    $message = trim($_POST["message"]);

    // Basic validation
    if (empty($name) || empty($email) || empty($phone) ||  empty($subject) || empty($message)) {
        die("<p style='color: red;'>All fields are required.</p>");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("<p style='color: red;'>Invalid email format.</p>");
    }

    // Email recipient & subject
    $to = "ansarigulistan91@gmail.com"; // Replace with your actual email
    $subject = "New Contact Form Submission";

    // Email content
    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Phone: $phone\n";
    $body .= "subject: $subject\n";
    $body .= "Message:\n$message\n";

    // Headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "<p style='color: green;'>Message sent successfully!</p>";
    } else {
        echo "<p style='color: red;'>Error sending message.</p>";
    }
} else {
    echo "<p style='color: red;'>Invalid request.</p>";
}
?>
