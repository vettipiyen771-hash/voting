<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "oline_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}

$aadhaar = $_POST['aadhaar'];
$pass    = $_POST['password'];

// Aadhaar validation (12 digits)
if (!preg_match('/^[0-9]{12}$/', $aadhaar)) {
    die("❌ Invalid Aadhaar number.");
}

// Hash password before storing
$hashedPass = password_hash($pass, PASSWORD_DEFAULT);

// Insert into DB
$sql = "INSERT INTO users (aadhaar, password) VALUES ('$aadhaar', '$hashedPass')";

if ($conn->query($sql) === TRUE) {
    echo "✅ Record stored successfully!";
} else {
    echo "❌ Error: " . $conn->error;
}

$conn->close();
?>
