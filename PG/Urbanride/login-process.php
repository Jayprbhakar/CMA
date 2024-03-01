<?php
session_start();

// Database connection parameters
$dbHost = "localhost";
$dbUser = "root";
$dbPassword = " ";
$dbName = "log";

// Connect to the database
$conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputUsername = $_POST["username"];
    $inputPassword = $_POST["password"];

    $query = "SELECT * FROM users WHERE username = ?";

    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("s", $inputUsername);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            if (password_verify($inputPassword, $row["password"])) {
                $_SESSION["authenticated"] = true;
                header("Location: dashboard.php");
                exit();
            } else {
                echo "Invalid username or password. Please try again.";
            }
        } else {
            echo "Invalid username or password. Please try again.";
        }

        $stmt->close();
    }
}

$conn->close();
?>
