<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate email address
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Email is valid, process it (example: store in a text file)
        $file = 'subscribers.txt';
        
        // Append the email address to the file
        file_put_contents($file, $email . PHP_EOL, FILE_APPEND | LOCK_EX);
        
        echo "Thank you for subscribing!";
    } else {
        echo "Invalid email address. Please try again.";
    }
}
?>