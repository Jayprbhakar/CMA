<?php 
session_start(); // Start the session

require_once("Includes/DB.php");
require_once("Includes/Functions.php");
require_once("Includes/Sessions.php");

$DateTime = ""; // Define $DateTime with a default value

if (isset($_POST["Submit"])) {
    $PostTitle = $_POST["PostTitle"];
    $Category = $_POST["Category"];
    $Image = $_FILES["Image"]["name"];
    $Target = "Upload/" . basename($_FILES["Image"]["name"]);
    $PostText = $_POST["PostDescription"];
    
    // Check if 'Username' key is set in the $_SESSION array
    $Admin = isset($_SESSION["Username"]) ? $_SESSION["Username"] : "";

    if (empty($PostTitle)) {
        $_SESSION["ErrorMessage"] = "Title Can't be empty";
        Redirect_to("Location: AddNewPost.php"); 
    } elseif (strlen($PostTitle) < 5) {
        $_SESSION["ErrorMessage"] = "Post title should be greater than 5 characters";
        Redirect_to("Location: AddNewPost.php");
    } elseif (strlen($PostText) > 999) {
        $_SESSION["ErrorMessage"] = "Post Description should be less than 1000 characters";
        Redirect_to("Location: AddNewPost.php"); // Use header to redirect
    } else {
        // Query to insert post into DB when everything is fine
        global $ConnectingDB;
        $sql = "INSERT INTO posts(datetime,title,category,author,image,post)";
        $sql .= "VALUES(:dateTime,:postTitle,:categoryName,:adminName,:imageName,:postDescription)"; // Removed one :dateTime

        $stmt = $ConnectingDB->prepare($sql);
        $stmt->bindValue(':dateTime', $DateTime);
        $stmt->bindValue(':postTitle', $PostTitle);
        $stmt->bindValue(':categoryName', $Category);
        $stmt->bindValue(':adminName', $Admin);
        $stmt->bindValue(':imageName', $Image);
        $stmt->bindValue(':postDescription', $PostText);

        $Execute = $stmt->execute();

        move_uploaded_file($_FILES["Image"]["tmp_name"], $Target);

        if ($Execute) {
            $_SESSION["SuccessMessage"] = "Post with id : " . $ConnectingDB->lastInsertId() . " Added Successfully";
            Redirect_to("AddNewPost.php");
        } else {
            $_SESSION["ErrorMessage"] = "Something went wrong. Try Again!";
            Redirect_to("AddNewPost.php");
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
    <title>New Post</title>
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
                    <h1> <i class="fas fa-edit" style="color: #8e7cc3;"></i> Add New Post</h1>
                </div>
            </div>
        </div>
    </header>
    <!-- Header end -->

    <!-- Main Area here -->
        <section class="container py-2 mb-4">
            <div class="row">
                <div class="offset-lg-1 col-lg-10" style="min-height:400px;">
                    <?php 
                    echo ErrorMessage(); 
                    echo SuccessMessage();
                    ?>
                    <form action="AddNewPost.php" method="post" enctype="multipart/form-data">
                        <div class="card-body bg-dark">
                            <div class="form-group">
                                <!-- 1 div -->
                                <label for="title"><span class="FieldInfo"> Post Title: </span></label>
                                <input class="form-control" type="text" name="PostTitle" id="title" placeholder="Type title here" value="">
                            </div>
                                <div class="form-group">
                                    <!-- choose category 2nd div -->
                                    <label form="CategoryTitle"><span class="FieldInfo"> Choose Category </span></label>
                                    <!-- select field fetch the category -->
                                    <select class="form-control" id="CategoryTitle" name="Category">
                                        <?php 
                                            global $ConnectingDB;
                                            $sql = "SELECT id, title FROM category";
                                            $stmt = $ConnectingDB->query($sql); // Changed from ($sql) to ->query($sql)

                                            while ($DataRows = $stmt->fetch()) {
                                                $Id = $DataRows["id"];
                                                $CategoryName = $DataRows["title"];
                                                // echo '<option value="$Id"> $CategoryName</option>';
                                        ?>
                                        <option> <?php echo $CategoryName; ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group mb-1">
                                    <!-- 3rd div -->
                                    <div class="custom-file">
                                        <input class="custom-file-input" type="file" name="Image" id="imageSelect" value="">
                                        <label for="imageSelect" class="custom-file-label"> Select Image</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!-- 4th div post -->
                                    <label form="Post"><span class="FieldInfo"> Post: </span></label>
                                    <textarea class="form-control" name="PostDescription" id="PostDescription" cols="80" rows="8"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 mb-2">
                                        <a href="Dashboard.php" class="btn btn-warning btn-block"><i class="fas fa-arrow-left"></i> Back To Dashbord</a>
                                    </div>  
                                    <div class="col-lg-6 mb-2">
                                        <button type="submit" name="Submit" class="btn btn-success btn-block"><i class="fas fa-check"></i> Publish </button>
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