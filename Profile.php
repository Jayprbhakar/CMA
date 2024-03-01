<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Bootstrap 4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="Css/Style.css">
    <title>My Profile</title>
</head>
<body>
    <!-- Include your navigation bar here if needed -->

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4>My Profile</h4>
                    </div>
                    <div class="card-body">
                        <!-- Display user information here -->
                        <div class="form-group">
                            <label type="submit">Username:</label>
                            <input type="text" id="username" class="form-control" value="YourUsername" readonly>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" class="form-control" value="youremail@example.com" readonly>
                        </div>
                        <!-- You can add more user-related fields as needed -->

                        <!-- Edit profile button -->
                        <button class="btn btn-warning" id="editProfileBtn">Edit Profile</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include your footer here if needed -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js"></script>
</body>
</html>
