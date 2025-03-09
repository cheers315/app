<?php
// Add authentication here to protect admin page

$servername = "your_server";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM bookings ORDER BY event_date DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin - Booking Requests</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    <div class="w3-container">
        <h2>Booking Requests</h2>
        <table class="w3-table-all">
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Date</th>
                <th>Location</th>
                <th>Guests</th>
                <th>Message</th>
            </tr>
            <?php while($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['phone']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['event_date']); ?></td>
                    <td><?php echo htmlspecialchars($row['location']); ?></td>
                    <td><?php echo htmlspecialchars($row['guests']); ?></td>
                    <td><?php echo htmlspecialchars($row['message']); ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html> 