<?php
// Database connection
$servername = "localhost";
$username = "root"; // Default XAMPP username
$password = ""; // Default XAMPP password
$dbname = "kia_motors"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind parameters
$stmt = $conn->prepare("INSERT INTO reviews (name, model, rating, service, location, review) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssisss", $name, $model, $rating, $service, $location, $review);

// Set parameters
$name = $_POST['name'];
$model = $_POST['model'];
$rating = intval($_POST['rating']);
$service = $_POST['service'];
$location = $_POST['location'];
$review = $_POST['review'];

// Execute SQL statement
if ($stmt->execute()) {
    header("Location: review_success.html");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
