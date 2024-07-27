<?php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate email
    $email = $_POST["email"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Invalid email format
        echo "Invalid email address.";
        exit;
    }

    // Save email to a file or database
    // For demonstration purposes, let's save it to a text file
    $file = 'subscribers.txt';
    $current = file_get_contents($file);
    $current .= $email . "\n";
    file_put_contents($file, $current);

    // Redirect back to the previous page
    header("Location: " . $_SERVER["HTTP_REFERER"]);
    exit;
} else {
    // If accessed directly, redirect to the home page
    header("Location: index.html");
    exit;
}
?>
