<?php require_once("Includes/DB.php"); ?>
<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>


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
    <title>Blog Webpage</title>
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
                        <a href="CMS_Project.html" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="About.php" class="nav-link">About Us</a>
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
                <h1 class="lead"> The Complete blog develop using PHP by Jayprabhakar yadav</h1>
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
                    <img src="Upload/<?php echo htmlentities($image); ?>" style="max-height:1550px" class="img-fluid card-img-top"/>
                    <div class="card-body">
                        <h4 4class="card-title"> <?php echo htmlentities ($PostTitle); ?></h4>
                        <small class="text-muted"> Written By <?php echo htmlentities ($Admin); ?> On <?php echo htmlentities ($DateTime); ?></small>
                        <span style="float:right;" class="badge badge-dark text-light" >Comment 20</span>
                        
                        <hr>
                        <p class="card-text"><?php echo htmlentities ($PostDescription); ?>
                         <?php 
                          if(strlen($PostDescription)>150) {
                            $PostDescription = substr($PostDescription,0,150)."...";}
                            echo $PostDescription;
                         ?>
                        </p>
                        <a href="FullPost.php?id=<?php echo $PostId; ?>" style="float:right;">
                            <span class="btn btn-info">Read More >> </span>
                        </a>
                        
                        
                    </div>
                    <?php } ?>
                </div>

                
            </div>
            <!-- Main Area End -->

            <!-- Side Area Start -->
            <!-- <div class="col-sm-4" style="min-height:50px; background:green;"> -->

            </div>
        </div>
    </div> 
</section>
    
    <!-- Header The end -->

    <!-- Main Area -->

    
    
    
    
    
    
    <!-- End Main Area -->

    <!-- Footer -->
    <footer class="bg-dark text-white" >
        <div class="container">
            <div class="row mt-5">
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