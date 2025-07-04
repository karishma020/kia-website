<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "kia";

// Connect to DB
$conn = new mysqli($host, $user, $password, $db);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$model = $_POST['model'];
$date = $_POST['date'];

// Insert into DB
$sql = "INSERT INTO test_drives (name, email, phone, model, date) VALUES ('$name', '$email', '$phone', '$model', '$date')";
if ($conn->query($sql) === TRUE) {
  echo "Test drive booked successfully!";
} else {
  echo "Error: " . $conn->error;
}

$conn->close();
?>
