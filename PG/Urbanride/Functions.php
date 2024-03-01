<?php require_once("DB.php"); ?>
<?php
function Redirect_to($New_Location){
    // Redirect_to("Location:".$New_Location);
}
function CheckUserNameExistsOrNot($UserName){
    global $ConnectingDB;
    $sql = "SELECT username FROM admins WHERE username = :userName"; // Changed ":" to "="
    $stmt = $ConnectingDB->prepare($sql);
    $stmt->bindValue(':userName', $UserName);   
    $stmt->execute();
    $Result = $stmt->rowCount(); // Corrected the function name to rowCount()
    if ($Result == 1) {
        return true;
    } else {
        return false;
    }
}
function Login_Attempt($Username, $Password) { // Correct variable names
    global $ConnectingDB;
    $sql = "SELECT * FROM admins WHERE username=:userName AND password=:passWord LIMIT 1";
    $stmt = $ConnectingDB->prepare($sql);
    $stmt->bindValue(':userName', $Username); // Correct variable names
    $stmt->bindValue(':passWord', $Password); // Correct variable names
    $stmt->execute();
    $Result = $stmt->rowCount(); // Corrected the function name to rowCount()
    if ($Result == 1) {
        return $stmt->fetch(); // No need to assign to $Found_Account
    } else {
        return null;
    }
}
?>
