<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Cookies</title>
</head>
<body>

    <?php
        echo "<h4>| User cookies |</h4>";
        echo "| Write code here: ";

        #cookie fuction with parameters

        $name = "system";
        // setcookie($name);
    ?>
    
</body>
    <?php
        $cookie_name = "user";
        $cookie_value = "90234";
        setcookie($cookie_name,$cookie_value, time() + 86400 * 30, "/");
    ?>

    #setcookie

    <?php
    if(!isset($_COOKIE[$cookie_name])) {
        echo "Cookie named";
        $cookie_name . "' is not set!"; 
    } 
    else {
        echo "Cookie'" . $cookie_name . "'is set!<br>";
        echo "Value is: " . 
        $_COOKIE[$cookie_name];
    }
    ?>

</html>