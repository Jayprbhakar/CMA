<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Your CMS Name</title>

    <!-- Include Bootstrap CSS from CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">

    <!-- Custom CSS for purple and white color scheme -->
    <style>
        body {
            background-color: #8e7cc3; /* Purple background */
            color: #fff; /* White text color */
        }

        /* Navbar styles */
        .navbar {
            background-color: #563d7c; /* Dark purple navbar */
        }

        .navbar-dark .navbar-nav .nav-link {
            color: #fff; /* White navbar text color */
        }

        /* Header styles */
        header {
            background-color: #563d7c; /* Dark purple header */
            color: #fff; /* White header text color */
        }

        /* Footer styles */
        footer {
            background-color: #563d7c; /* Dark purple footer */
            color: #fff; /* White footer text color */
            text-align: center;
            padding: 10px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a href="CMS_Project.html" class="navbar-brand">JPCMS</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item nav-brand">
                        <a href="Logout.php" class="nav-link text-danger">
                        <i class="fa-solid fa-right-from-bracket"></i></i> Logout</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="Dashboard.php">Dashboard</a>
                    </li> -->
                    <!-- Add more navigation links as needed -->
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header class="text-center py-5">
        <h1>About Us</h1>
        <p>
            Welcome to Your CMS Name, a powerful and versatile content management system designed to help you manage and publish your content with ease.
        </p>
    </header>

    <!-- Main Content -->
    <div class="container" style="min-height: 60vh">
        <h2>Our Mission</h2>
        <p>
            Our mission is to provide you with the tools and features necessary to create, organize, and publish your content effectively. We strive to simplify content management and empower content creators.
        </p>

        <!-- Add more content here -->

    </div>

    <!-- Footer -->
    <footer class="text-center py-3">
        <p>&copy; <?php echo date("Y"); ?> JPCMS. All rights reserved.</p>
    </footer>

    <!-- Include Bootstrap JS (optional) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</body>
</html>
