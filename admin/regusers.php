<?php
    error_reporting(0);
    require('functions.php');
    session_start();
    
    // Database Connection
    $connection = mysqli_connect("localhost", "root", "", "lms");
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Fetch Users
    $query = "SELECT * FROM users";
    $query_run = mysqli_query($connection, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Library Management System (LMS)</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">

    <!-- Bootstrap JS -->
    <script type="text/javascript" src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>

    <style type="text/css">
        body {
            background-color: lightblue;
        }
        .custom-btn {
            background-color: rgba(13, 110, 253, 0.2); /* Light Transparent Blue */
            color: #0d6efd; /* Bootstrap Primary Blue */
            border-color: #0d6efd;
            transition: 0.3s;
        }
        .custom-btn:hover {
            background-color: rgba(13, 110, 253, 0.6);
            color: white;
        }
    </style> 
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="admin_dashboard.php">Library Management System (LMS)</a>
            <div class="navbar-text text-white">
                <strong>Welcome: <?php echo $_SESSION['name']; ?></strong> |
                <strong>Email: <?php echo $_SESSION['email']; ?></strong>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <!-- Marquee -->
    <span><marquee>This is a library management system. Library opens at 8:00 AM and closes at 8:00 PM</marquee></span><br><br>

    <!-- User Table -->
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <table class="table table-bordered text-center">
                <tr>
                    <th>User-Id</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Address</th>
                </tr>

                <?php
                // Base path for images
                $base_url = "http://localhost/library_management_system/";

                while ($row = mysqli_fetch_assoc($query_run)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";

                    // Fixing the Image Path Issue
                    $imagePath = !empty($row['user_img']) ? $base_url . $row['user_img'] : $base_url . "images/default.jpg";
                    
                    echo "<td><img src='" . $imagePath . "' height='100px' width='100px' onerror='this.src=\"images/default.jpg\"'></td>";

                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['gender'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['mobile'] . "</td>";
                    echo "<td>" . $row['address'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
        <div class="col-md-2"></div>
    </div>

</body>
</html>
