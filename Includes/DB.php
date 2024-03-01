<?php
    $DSN ='mysql:host=localhost;dbname=cms4.2.1';
    $ConnectingDB = new PDO($DSN,'root','');
?>

<?php
// Include DB connection
require_once("Includes/DB.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password from the form
    $username = $_POST["Username"];
    $password = $_POST["Password"];
    
    try {
        // Connect to the database using PDO
        $DSN ='mysql:host=localhost;dbname=cms4.2.1';
        $ConnectingDB = new PDO($DSN,'root','');

        // Prepare and execute SQL query to fetch user record
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $ConnectingDB->prepare($sql);
        $stmt->bindValue(':username', $username);
        $stmt->execute();
        
        // Fetch user record
        $user = $stmt->fetch();

        // Verify password
        if ($user && password_verify($password, $user['password'])) {
            // Successful login
            // Start session and store user data
            session_start();
            $_SESSION["UserId"] = $user["id"];
            $_SESSION["Username"] = $user["username"];
            
            // Redirect to dashboard or other authenticated page
            header("Location: Dashboard.php");
            exit;
        } else {
            // Invalid username or password
            $errorMessage = "Invalid username or password";
        }
    } catch (PDOException $e) {
        // Database connection error
        echo "Connection failed: " . $e->getMessage();
    }
}
?>

<!-- HTML form for login -->
<form action="login.php" method="post">
    <label for="username">Username:</label>
    <input type="text" name="Username" id="username" required><br>
    <label for="password">Password:</label>
    <input type="password" name="Password" id="password" required><br>
    <input type="submit" value="Login">
</form>

<?php if (isset($errorMessage)) { echo "<p>$errorMessage</p>"; } ?>
