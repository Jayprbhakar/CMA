<?php
// Include DB connection
require_once("Includes/DB.php");

// Sample user data
$username = "example_user";
$password = "example_password"; // Plain text password

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// SQL insert statement
$sql = "INSERT INTO users (username, password) VALUES (:username, :password)";

// Prepare the SQL statement
$stmt = $ConnectingDB->prepare($sql);

// Bind parameters
$stmt->bindValue(':username', $username);
$stmt->bindValue(':password', $hashed_password);

// Execute the statement
$result = $stmt->execute();

// Check if the insert was successful
if ($result) {
    echo "User inserted successfully.";
} else {
    echo "Error inserting user.";
}
?>
