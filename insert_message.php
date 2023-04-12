<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize input data
$user = mysqli_real_escape_string($conn, $_POST['user']);
$message = mysqli_real_escape_string($conn, $_POST['message']);

// Insert message into database
$sql = "INSERT INTO messages (user, message) VALUES ('$user', '$message')";
$conn->query($sql);

// Get updated chat messages
$sql = "SELECT * FROM messages ORDER BY created_at DESC";
$result = $conn->query($sql);

// Display chat messages
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<p><strong>" . $row["user"] . "</strong>: " . $row["message"] . "</p>";
    }
} else {
    echo "No messages yet";
}

$conn->close();
?>
