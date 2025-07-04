<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kia_motors";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare data for insertion
$name = $conn->real_escape_string($_POST['name']);
$model = $conn->real_escape_string($_POST['model']);
$rating = $conn->real_escape_string($_POST['rating']);
$service = $conn->real_escape_string($_POST['service']);
$location = $conn->real_escape_string($_POST['location']);
$review = $conn->real_escape_string($_POST['review']);

// Insert data into database
$sql = "INSERT INTO reviews (name, model, rating, service, location, review, date) 
        VALUES ('$name', '$model', '$rating', '$service', '$location', '$review', CURRENT_TIMESTAMP)";

if ($conn->query($sql) === TRUE) {
    // Redirect to success page
    header("Location: review_success.html");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
