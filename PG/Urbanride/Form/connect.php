<?php
// Database connection parameters
$host = "localhost";
$username = "root";
$password = "";
$database = "urbanride";

// Create a database connection
$connection = new mysqli($host, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Get user input
$username = $_POST['username'];
$password = $_POST['password'];

// Secure the input
$username = $connection->real_escape_string($username);
$password = $connection->real_escape_string($password);

// Query to check user credentials
$query = "SELECT id, username, password FROM users WHERE username = '$username'";
$result = $connection->query($query);

if ($result) {
    $user = $result->fetch_assoc();
    
    // Verify the password
    if ($user && password_verify($password, $user['password'])) {
        // Successful login
        echo "Login successful. Welcome, " . $user['username'];
    } else {
        // Invalid credentials
        echo "Login failed. Invalid username or password.";
    }
} else {
    // Database query error
    echo "Error: " . $connection->error;
}

// Close the database connection
$connection->close();
?>
