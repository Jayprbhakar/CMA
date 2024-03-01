<?php
require_once("Includes/DB.php");
require_once("Includes/Functions.php");
require_once("Includes/Sessions.php");

if(isset($_POST["Submit"])) {
    $Category = $_POST["CategoryTitle"];
    // Check if $_SESSION["Username"] is set before accessing it
    $Admin = isset($_SESSION["Username"]) ? $_SESSION["Username"] : ""; 
    $DateTime = date("Y-m-d H:i:s"); // You can adjust the format based on your table structure

    if(empty($Category)){
        $_SESSION["ErrorMessage"] = "All fields must be filled out";
        Redirect_to("Categories.php");
    } elseif (strlen($Category) < 2){
        $_SESSION["ErrorMessage"] = "Category title should be greater than 2 characters";
        Redirect_to("Categories.php");
    } elseif (strlen($Category) > 49){
        $_SESSION["ErrorMessage"] = "Category title should be less than 50 characters";
        Redirect_to("Categories.php");
    } else {
        // Query to insert category title in the database
        global $ConnectingDB;
        $sql = "INSERT INTO category (title, author, datetime)
                VALUES (:category, :admin, :datetime)";
        $stmt = $ConnectingDB->prepare($sql);
        $stmt->bindValue(':category', $Category);
        $stmt->bindValue(':admin', $Admin);
        $stmt->bindValue(':datetime', $DateTime);
        $result = $stmt->execute();

        if ($result) {
            $_SESSION["SuccessMessage"] = "Category added successfully";
            Redirect_to("Categories.php");
        } else {
            $_SESSION["ErrorMessage"] = "Failed to add category";
            Redirect_to("Categories.php");
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
    <title>Categories</title>
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
                        <a href="Dashboard.php" class="nav-link">Dashbord</a>
                    </li>
                    <li class="nav-item">
                        <a href="Posts.php" class="nav-link">Posts</a>
                    </li>
                    <li class="nav-item">
                        <a href="Categories.php" class="nav-link">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a href="Admins.php" class="nav-link">Manage Admin</a>
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
                    <h1> <i class="fas fa-edit" style="color: #8e7cc3;"></i> Manage Categories</h1>
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
                <form action="Categories.php" method="post">
                    <div class="card">
                        <div class="card-header bg-secondary text-white">
                            <h1>Add New Category</h1>
                        </div>
                        <div class="card-body bg-dark">
                            <div class="form-group">
                                <label for="title"><span class="FieldInfo"> Category Title: </span></label>
                                <input class="form-control" type="text" name="CategoryTitle" placeholder="Type title here" id="title" value="">
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