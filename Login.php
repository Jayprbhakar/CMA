<?php require_once("Includes/DB.php"); ?>
<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>

<?php
if (isset($_POST["Submit"])) {
    $Username = $_POST["Username"];
    $Password = $_POST["Password"];
    
    if (empty($Username) || empty($Password)) {
        $_SESSION["ErrorMessage"] = "All fields must be filled out";
    } else {
        $Found_Account = Login_Attempt($Username, $Password);
        
        if ($Found_Account) {
            $_SESSION["User_ID"] = $Found_Account["id"];
            $_SESSION["Username"] = $Found_Account["username"];
            $_SESSION["AdminName"] = $Found_Account["aname"];
            $_SESSION["SuccessMessage"] = "Welcome " . $_SESSION["AdminName"];
            
            if (isset($_SESSION["TrackingURL"])) {
                $redirectURL = $_SESSION["TrackingURL"];
                unset($_SESSION["TrackingURL"]);
                Redirect_to($redirectURL);
            } else {
                Redirect_to("Dashboard.php");
            }
        } else {
            $_SESSION["ErrorMessage"] = "Incorrect Username/Password";
            Redirect_to("Login.php");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- favicon -->
    <link rel="icon" href="Images/favicon-32x32.png" type="image/x-icon">
    <!-- Fontawesome for icon -->
    <script src="https://kit.fontawesome.com/660f58b07b.js" crossorigin="anonymous"></script>
    <!-- CDN of css -->
    <link rel="stylesheet" href="Bootstrap 4.2.1/css/bootstrap.min.css">
    <!-- css style -->
    <link rel="stylesheet" href="Css/Style.css">
    <title>Login</title>
</head>
<body>
    <!-- navbar -->
    <div style="height: 10px; background-color: #b0afd6"></div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a href="" class="navbar-brand">JPCMS</a>
            <!-- Collapse bar -->
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapseCMS">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapseCMS">
                
            </div>
        </div>
    </nav>
    <div style="height: 10px; background-color: #8e7cc3"></div>
    <!-- Navbar end -->

    <!-- Main Area -->
    <div class="container py-9 mb-7">
        <div class="row">
            <div class="col-sm-6" style="min-height:5px background:red;">
                
            </div>
        </div>
    </div>
    <!-- Main Area End -->


    <!-- Header -->
    <header class="bg-dark text-white py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                </div>
            </div>
        </div>
    </header> &nbsp;
    <!-- Header The end -->

    <!-- Main Area -->
    <section>
        <div class="container">
            <div class="row">
                <div class="offset-sm-3 col-sm-6 mt-5" style="min-height:520px;">
                    <?php 
                        echo ErrorMessage(); 
                        echo SuccessMessage();
                    ?>
                    <div class="card bg-secondary text-light">
                        <div class="card-header">
                            <h4>Welcome Back</h4></div>
                            <div class="card-body bg-dark">
                            <form class="" action="Login.php" method="post">
                                <div class="form-group">
                                    <label for="username"><span class="">Username:</span></label> 
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text text-white bg-info"><i class="fas fa-user"></i></span> 
                                        </div>
                                        <input type="text" class="form-control" name="Username" id="username" value="">
                                    </div>
                                </div>
                                <!-- password field -->
                                <div class="form-group">
                                    <label for="password"><span class="">Password:</span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text text-white bg-info"><i class="fas fa-lock"></i></span>
                                        </div>
                                        <input type="password" class="form-control" name="Password" id="password" value="">
                                    </div>
                                </div>
                                <input type="submit" name="Submit" class="btn btn-info btn-block" value="Login">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </section> <br>
    <!-- End Main Area -->

    <!-- Footer -->
    <footer class="bg-dark text-white">
        <div class="container">
            <div class="row">
                <div class="col-4"></div>
                    <p class="lead text-center">Theme By | JP yadav | <span id="year"></span> &copy; ----All right Reserved.</p>
                    <p class="text-center small">
                        <a style="color: white; text-decoration: none; cursor: pointer; " href="https://www.teamwork.com/blog/web-development-projects/" target="_blank" ></a>This site is only used for manage your content and upload a blog using website friendliness functionality have all the rights.No allow to copy the content to this website <br>&trade; Etuclose.com etc.</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <div style="height: 10px; background-color: #8e7cc3"></div>


    
    

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js"></script>
    <!-- This is js cdn link to function the bar and etc -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js"></script> 

    <script>
        // $ mean out our jquery
        $('#year').text(new Date().getFullYear());
    </script>
</body>
</html>