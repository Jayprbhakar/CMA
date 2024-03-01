<?php
require_once("Includes/DB.php");
require_once("Includes/Functions.php");
require_once("Includes/Sessions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- favicon -->
    <link rel="icon" href="Images/favicon-32x32.png" type="image/x-icon">
    <!-- Fontawesome for icons -->
    <script src="https://kit.fontawesome.com/660f58b07b.js" crossorigin="anonymous"></script>
    <!-- CDN for CSS -->
    <link rel="stylesheet" href="Bootstrap 4.2.1/css/bootstrap.min.css">
    <!-- CSS style -->
    <link rel="stylesheet" href="Css/Style.css">
    <title>Blog Webpage</title>
</head>
<body>
    <!-- Navbar -->
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
                        <a href="Blog.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="Blog.php" class="nav-link">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Features</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <form class="form-inline d-none d-sm-block" action="Blog.php" method="get">
                        <div class="form-group">
                            <input class="form-control mr-2" type="text" name="Search" placeholder="Search Here" value="">
                            <button class="btn btn-primary" name="SearchButton">Go</button>
                        </div>
                    </form>
                </ul>
            </div>
        </div>
    </nav>
    <div style="height: 10px; background-color: #8e7cc3"></div>
    <!-- Navbar end -->

    <!-- Header -->
<section>
    <div class="container">
        <div class="row mt-4">

            <!-- Main Area Start -->
            <div class="col-sm-8">
                <h1>The Complete Responsive CMS Blog.</h1>
                <h1 class="lead"> The Complete blog developed using PHP by Jayprabhakar Yadav</h1>
                <?php 
                 global $ConnectingDB;
                 if(isset($_GET["SearchButton"])){
                    $Search = $_GET["Search"]; // Corrected variable name
                    $sql = "SELECT * FROM posts 
                    WHERE datetime LIKE :search 
                    OR title LIKE :search 
                    OR category LIKE :search 
                    OR post LIKE :search";
                    $stmt = $ConnectingDB->prepare($sql);
                    $stmt->bindValue(':search','%'.$Search.'%');
                    $stmt->execute();

                 } 
                 // the default SQL query  
                 else {
                    $sql = "SELECT * FROM posts ORDER BY id DESC";
                    $stmt = $ConnectingDB->query($sql);
                 }
                 while ($DataRows = $stmt->fetch()) {
                    $PostId          = $DataRows["id"];
                    $DateTime        = $DataRows["datetime"];
                    $PostTitle       = $DataRows["title"];
                    $Category        = $DataRows["category"];
                    $Admin           = $DataRows["author"];
                    $image           = $DataRows["image"];
                    $PostDescription = $DataRows["post"];
                 ?>
                <div class="card">
                    <img src="Upload/<?php echo htmlentities($image); ?>" style="max-height: 150px;" class="img-fluid card-img-top"/>
                    <div class="card-body">
                        <h4 class="card-title"> <?php echo htmlentities($PostTitle); ?></h4>
                        <small class="text-muted"> Written By <?php echo htmlentities($Admin); ?> On <?php echo htmlentities($DateTime); ?></small>
                        <span style="float:right;" class="badge badge-dark text-light" >Comment 20</span>
                        <hr>
                        <p class="card-text">
                            <?php 
                            echo htmlentities($PostDescription);
                            if(strlen($PostDescription) > 150) {
                                $PostDescription = substr($PostDescription, 0, 150) . "...";
                            }
                            echo $PostDescription;
                            ?>
                        </p>
                        <a href="FullPost.php" style="float:right;">
                            <span class="btn btn-info">Read More >> </span>
                        </a>
                    </div>
                </div>
                <?php } ?>
            </div>
            <!-- Main Area End -->

            <!-- Side Area Start -->
            <!-- <div class="col-sm-4" style="min-height:50px; background:green;"> -->

            </div>
        </div>
    </div> 
</section>
    
    <!-- Header The end -->

    <!-- Main
