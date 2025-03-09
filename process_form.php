<?php
// Database connection
$servername = "your_server";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['Name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$date = $_POST['date'];
$location = $_POST['Location'];
$guests = $_POST['Enter_number'];
$message = $_POST['Message'];

// Insert into database
$sql = "INSERT INTO bookings (name, phone, email, event_date, location, guests, message) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssss", $name, $phone, $email, $date, $location, $guests, $message);
$stmt->execute();

// Email configuration
$to = "nicaman9@gmail.com";
$subject = "New Booking Request";
$email_message = "New booking request details:\n\n";
$email_message .= "Name: " . $name . "\n";
$email_message .= "Phone: " . $phone . "\n";
$email_message .= "Email: " . $email . "\n";
$email_message .= "Date: " . $date . "\n";
$email_message .= "Location: " . $location . "\n";
$email_message .= "Number of Guests: " . $guests . "\n";
$email_message .= "Message: " . $message . "\n";

$headers = 'From: webmaster@cheers315.com' . "\r\n" .
    'Reply-To: ' . $email . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

// Send email
mail($to, $subject, $email_message, $headers);

// Redirect back with success message
header("Location: index.html?status=success");
?> 