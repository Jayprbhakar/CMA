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
    <title>Comments</title>
</head>
<body style="position: relative; min-height: 100vh;">
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
                    <h1> <i class="fas fa-comments" style="color: #8e7cc3;"></i> Manage Comments</h1>
                </div>
            </div>
        </div>
    </header> &nbsp;
    <!-- Header The end -->

    <!-- Main Area -->
    <section class="container py-2 mb-4">
        <div class="row" style="min-height:30px;">
            <div class="col-lg-12" style="min-height:400px;">
            <h2>Un-Approved Comments</h2>
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Date&Time</th>
                        <th>Comment</th>
                        <th>Actions</th>
                        <th>Details</th>
                    </tr>

                </thead>
            <?php
            // global $ConnectinDB;
            // $sql = "SELECT * FROM comments WHERE status='OFF' ORDER BY id desc";
            // $Execute = $ConnectingDB->query($sql);
            // $SrNo = 0;
            // while ($DataRows = $Execute->fetch()) {
                // $CommentId = $DataRows["id"];
                // $DateTimeOfComment = $DataRows["datetime"];
                // $CommenterName = $DataRows["name"];
                // $CommentContent = $DataRows["comment"];
                // $CommentPostId = $DataRows["post_id"];

            // }
            ?>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
            
            </table>
            </div>
        </div>

    </section>
    <!-- End Main Area -->

    <!-- Footer -->
    <footer class="bg-dark text-white mt-auto">
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