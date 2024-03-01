<?php
require_once("Includes/DB.php");
require_once("Includes/Functions.php");
require_once("Includes/Sessions.php");

if (isset($_POST["Submit"])) {
    $UserName   = $_POST["Username"];
    $Name       = $_POST["Name"];
    $Password   = $_POST["Password"];
    $ConfirmPassword = $_POST["ConfirmPassword"]; // Corrected the variable name
    $Admin = "JPCMS";

    date_default_timezone_set("Asia/Kolkata");
    $CurrentTime = time();
    $DateTime = strftime("%B-%d-%Y %H:%M:%S", $CurrentTime);

    if (empty($UserName)||empty($Password)||empty($ConfirmPassword)) {
        $_SESSION["ErrorMessage"] = "All fields must be filled out";
        Redirect_to("Admins.php");
    } elseif (strlen($Password) < 4) {
        $_SESSION["ErrorMessage"] = "Password should be greater than 3 characters";
        Redirect_to("Admins.php");
    } elseif ($Password !== $ConfirmPassword) { 
        $_SESSION["ErrorMessage"] = "Password and confirm Password should match";
        Redirect_to("Admins.php");
    } elseif (CheckUserNameExistsOrNot($UserName)) { 
        $_SESSION["ErrorMessage"] = "Username already exist. try Another One!";
        Redirect_to("Admins.php");
    } else {
        // Query to insert admin data into the database
        global $ConnectingDB;
        $sql = "INSERT INTO admins(datetime, username, password, aname, addedby)";
        $sql .= "VALUES(:dateTime,:userName,:password, :aName,:adminName)"; // Updated column names
        $stmt = $ConnectingDB->prepare($sql);
        $stmt->bindValue(':dateTime', $DateTime);
        $stmt->bindValue(':userName', $UserName);
        $stmt->bindValue(':password', $Password);
        $stmt->bindValue(':aName', $Name);
        $stmt->bindValue(':adminName', $Admin);
        $Execute=$stmt->execute();
        if ($Execute) {
            $_SESSION["SuccessMessage"] = "New Admin with the name of ".$Name." added successfully";
            Redirect_to("Admins.php");
        } else {
            $_SESSION["ErrorMessage"] = "Something went wrong. Please try again.";
            Redirect_to("Admins.php");
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
    <title>Admin Page</title>
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
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="MyProfile.php" class="nav-link">
                        <i class="fa-solid fa-user text-success"></i> My Profile</a>
                    </li>
                    <li class="nav-item">
                        <a href="Dashbord.php" class="nav-link">Dashbord</a>
                    </li>
                    <li class="nav-item">
                        <a href="Posts.php" class="nav-link">Posts</a>
                    </li>
                    <li class="nav-item">
                        <a href="Categories.php" class="nav-link">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a href="Admin.php" class="nav-link">Manage Admin</a>
                    </li>
                    <li class="nav-item">
                        <a href="Comments.php" class="nav-link">Comments</a>
                    </li>
                    <li class="nav-item">
                        <a href="Blog.php" class="nav-link">Live Blog</a>
                    </li>
                    <li class="nav-item">
                        <a href="About.php" class="nav-link">About</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="Logout.php" class="nav-link text-danger">
                        <i class="fa-solid fa-right-from-bracket"></i></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div style="height: 10px; background-color: #8e7cc3"></div>
    <!-- Navbar end -->

    <!-- Header -->
    <header class="bg-dark text-white py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1> <i class="fas fa-user" style="color: #8e7cc3;"></i> Manage Admins</h1>
                </div>
            </div>
        </div>
    </header>
    <!-- Header end -->

    <!-- Main Area -->
    <section class="container py-2 mb-4">
    
        <div class="row">
            <div class="offset-lg-1 col-lg-10" style="min-height:400px;">
                <?php 
                    echo ErrorMessage(); 
                    echo SuccessMessage();
                 ?>
                <form action="Admins.php" method="post">
                    <div class="card">
                        <div class="card-header bg-secondary text-white">
                            <h1>Add New Admin</h1>
                        </div>
                        <div class="card-body bg-dark">
                            <div class="form-group">
                                <label for="title"><span class="FieldInfo"> Username: </span></label>
                                <input class="form-control" type="text" name="Username" id="username" value="">
                            </div>
                            <div class="form-group">
                                <label for="title"><span class="FieldInfo"> Name: </span></label>
                                <input class="form-control" type="text" name="Name" id="Name" value="">
                                <small class="text-muted">Optional</small>
                            </div>
                            <div class="form-group">
                                <label for="title"><span class="FieldInfo"> Password: </span></label>
                                <input class="form-control" type="text" name="Password" id="Password" value="">
                            </div>
                            <div class="form-group">
                                <label for="title"><span class="FieldInfo"> Confirm Password: </span></label>
                                <input class="form-control" type="text" name="ConfirmPassword" id="ConfirmPassword" value="">
                            </div>
                                <div class="row">
                                    <div class="col-lg-6 mb-2">
                                        <a href="Dashboard.php" class="btn btn-warning btn-block"><i class="fas fa-arrow-left"></i> Back To Dashbord</a>
                                    </div>  
                                    <div class="col-lg-6 mb-2">
                                        <button type="submit" name="Submit" class="btn btn-success btn-block">
                                            <i class="fas fa-check"></i> Publish
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </section>

        
    
    
    
    
    
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