<?php require_once("Includes/DB.php"); ?>
<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>

<?php
// $_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];
// Confirm_Login();
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
    <title>Dashbord</title>
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
            <div class="col-md-12 mb-2">
                <h1> <i class="fas fa-cog" style="color:#8e7cc3;"></i> Dashboard</h1>
            </div>
            <div class="col-lg-3 mb-2">
                <a class="btn btn-primary btn-block" href="AddNewPost.php">
                    <i class="fas fa-edit"></i> Add New Post
                </a>
            </div>
            <div class="col-lg-3 mb-2">
                <a class="btn btn-info btn-block" href="Categories.php">
                    <i class="fas fa-folder-plus"></i> Add New Category
                </a>
            </div>
            <div class="col-lg-3 mb-2">
                <a class="btn btn-warning btn-block" href="Admins.php">
                    <i class="fas fa-user-plus"></i> Add New Admin
                </a>
            </div>
            <div class="col-lg-3 mb-2">
                <a class="btn btn-success btn-block" href="Comments.php">
                    <i class="fas fa-check"></i> Approve Comments
                </a>
            </div>
        </div>
    </div>
</header>
    <!-- Header The end -->

    <!-- Main Area -->
    <?php
    echo ErrorMessage();
    echo SuccessMessage();
    ?>
    <!-- Left side area Start -->
    <section class="container py-2 mb-4" >
        <div class="row">
            <div class="col-lg-2">
                <div class="class text-center bg-dark text-white mb-3">
                    <div class="card-body">
                        <h1 class="lead">Posts</h1>
                        <h4 class="display-5">
                            <i class="fab fa-readme"></i>
                            <?php 
                            global $ConnectingDB;
                            $sql = "SELECT COUNT(*) FROM posts";
                            $stmt = $ConnectingDB->query($sql);
                            $TotalRows = $stmt->fetch();
                            $TotalPosts = array_shift($TotalRows);
                            echo $TotalPosts;
                            ?>
                        </h4>
                    </div>
                </div>

                <div class="class text-center bg-dark text-white mb-3">
                    <div class="card-body">
                        <h1 class="lead">Categories</h1>
                        <h4 class="display-5">
                            <i class="fas fa-folder"></i>
                            <?php 
                            global $ConnectingDB;
                            $sql = "SELECT COUNT(*) FROM category";
                            $stmt = $ConnectingDB->query($sql);
                            $TotalRows = $stmt->fetch();
                            $TotalCategories = array_shift($TotalRows);
                            echo $TotalCategories;
                            ?>
                        </h4>
                    </div>
                </div>
                
                <div class="class text-center bg-dark text-white mb-3">
                    <div class="card-body">
                        <h1 class="lead">Admins</h1>
                        <h4 class="display-5">
                            <i class="fas fa-users"></i>
                            <?php 
                            global $ConnectingDB;
                            $sql = "SELECT COUNT(*) FROM admins";
                            $stmt = $ConnectingDB->query($sql);
                            $TotalRows = $stmt->fetch();
                            $TotalAdmins = array_shift($TotalRows);
                            echo $TotalAdmins;
                            ?>
                        </h4>
                    </div>
                </div>

                <div class="class text-center bg-dark text-white mb-3">
                    <div class="card-body">
                        <h1 class="lead">Comments</h1>
                        <h4 class="display-5">
                            <i class="fas fa-comments"></i>
                            7
                            <?php
                            // global $ConnectingDB;
                            // $sql = "SELECT COUNT(*) FROM comments";
                            // $stmt = $ConnectingDB->query($sql);
                            // $TotalRows = $stmt->fetch();
                            // $TotalComments = array_shift($TotalRows);
                            // echo $TotalComments;
                            ?>
                        </h4>
                    </div>
                </div>
            </div>

            <!-- Left side area End -->

            <!-- Right side area Start -->
            <div class="col-lg-10">
            <h1>Top Posts</h1>
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>No.</th>
                        <th>Title</th>
                        <th>Date&Time</th>
                        <th>Author</th>
                        <th>Comments</th>
                        <th>Details</th>
                    </tr>

                </thead>
                <?php
                $SrNo = 0;
                global $ConnectingDB;
                $sql = "SELECT * FROM posts ORDER BY id desc LIMIT 0,5";
                $stmt = $ConnectingDB->query($sql);
                while ($DataRows=$stmt->fetch()) {
                    $PostId = $DataRows["id"];
                    $DateTime = $DataRows["datetime"];
                    $Author = $DataRows["author"];
                    $Title = $DataRows["title"];
                    $SrNo++;
                
                ?>
                <tbody>
                    <tr>
                        <td><?php echo $SrNo; ?></td>
                        <td><?php echo $Title; ?></td>
                        <td><?php echo $DateTime; ?></td>
                        <td><?php echo $Author; ?></td>
                        <td>
                            <span class="badge badge-success">00</span>
                            <span class="badge badge-danger">00</span>
                        </td>
                        <td>
                        <a target="_blank" href="FullPost.php?id<?php echo $PostId; ?>">
                        <span class="btn btn-info">Preview</span></a> </td>
                    </tr>
                </tbody>
                <?php } ?>
            </table>
            </div>
            <!-- Right side area End -->

        </div>
    </section>
    <!-- End Main Area -->

    <!-- Footer -->
    <footer class="bg-dark text-white" >
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