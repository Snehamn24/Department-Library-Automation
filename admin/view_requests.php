<?php
    session_start();

// Database Connection
$connection = mysqli_connect("localhost", "root", "", "lms");

// Check Connection
if (!$connection) {
    die("Database Connection Failed: " . mysqli_connect_error());
}

// SQL Query
$query =   "SELECT br.book_id , br.user_id, u.name, br.book_name 
          FROM book_requests br 
          INNER JOIN user u ON br.user_id = u.id";


$query_run = mysqli_query($connection, $query);

// Check for SQL Errors
if (!$query_run) {
    die("Query Failed: " . mysqli_error($connection));
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Library Management System (LMS)</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <!-- jQuery -->
    <script type="text/javascript" src="bootstrap-5.3.3-dist/js/jquery_latest.js"></script>
    <!-- Bootstrap JS -->
    <script type="text/javascript" src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <style type="text/css">
        #side-bar {
            background-color: lightblue;
            padding: 50px;
            width: 300px;
            height: 450px;
        }
        body {
            background-image: url('bookbackground1.jpg'); /* Path to your image */
            background-size: cover; /* Cover full screen */
            background-position: center; /* Center the image */
            background-repeat: no-repeat; /* No repeating */
            height: 100vh; /* Full viewport height */
        }
        .custom-btn {
        background-color: rgba(13, 110, 253, 0.2); /* Light Transparent Blue */
        color: #0d6efd; /* Primary Bootstrap Blue */
        border-color: #0d6efd; /* Keep Bootstrap Blue Border */
        transition: 0.3s;
         }

    .custom-btn:hover {
        background-color: rgba(13, 110, 253, 0.6); /* Darker Blue on Hover */
        color: white; /* White Text on Hover */
      }
    </style> 
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
            <a class="navbar-brand" href="admin_dashboard.php">Library Management System (LMS)</a>
        </div>&ndsp;&nbsp;&nbsp;
        <font style="color:white"> <span> <strong> Welcome : <?php echo $_SESSION['name'];?> </strong> </span> </font> &nbsp;&nbsp;|&nbsp;&nbsp;&ndsp;&ndsp;&nbsp;
        <font style="color:white"> <span> <strong> Email : <?php echo $_SESSION['email'];?> </strong> </span> </font>
        
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            My Profile
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="view_profile.php">View Profile</a></li>
                            <li><a class="dropdown-item" href="edit_profile.php">Edit Profile</a></li>
                            <li><a class="dropdown-item" href="change_password.php">Change Password</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <ul class="nav navbar-nav navbar-center">
                <li class="nav-item">
                    <a href="admin_dashboard.php" class="nav-link">Dashboard</a>
                    
             </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="bookDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               Book
               </a>
               <ul class="dropdown-menu" aria-labelledby="bookDropdown">
              <li><a class="dropdown-item" href="add_book.php">Add New Book</a></li>
              <li><a class="dropdown-item" href="manage_book.php">Manage Books</a></li>
             </ul>
       </li>
        </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="categoryDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               Category
               </a>
               <ul class="dropdown-menu" aria-labelledby="categoryDropdown">
              <li><a class="dropdown-item" href="add_category.php">Add New Category</a></li>
              <li><a class="dropdown-item" href="manage_category.php">Manage Category</a></li>
             </ul>
       </li>
        <!--</li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="authorDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               Authors
               </a>
               <ul class="dropdown-menu" aria-labelledby="authorDropdown">
              <li><a class="dropdown-item" href="add_author.php">Add New Authors</a></li>
              <li><a class="dropdown-item" href="#">Manage New Authors</a></li>
             </ul>-->
         <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="authorDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Request
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="authorDropdown">
                        <li><a class="dropdown-item" href="view_requests.php">View Requests</a></li>
                    
                    </ul>
                </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <li class="nav-item">
                    <a href="issue_book.php" class="nav-link">Issue book</a>
                </li>
            </ul>
        </div>
    </nav>
    <span><marquee>This is library management system. Library opens at 8:00 AM and closes at 8:00 PM</marquee></span><br><br>
    <div class="container mt-4">
        <h2 class="text-center">Requested Books</h2>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>User Name</th>
                    <th>Book Id</th>
                    <th>Book Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                 <?php
                if (mysqli_num_rows($query_run) > 0) {
                    while ($row = mysqli_fetch_assoc($query_run)) {
                        ?>
                        <tr>

                            <td><?php echo htmlspecialchars($row['user_id']); ?></td>
                            <td><?php echo htmlspecialchars($row['name']); ?></td>
                            <td><?php echo htmlspecialchars($row['book_id']); ?></td>
                            <td><?php echo htmlspecialchars($row['book_name']); ?></td>
                            
                            <td>
                                <button class="btn btn-success">
                                    
                                <a href="issue_book.php?bn=<?php echo urlencode($row['user_id']); ?>" class="text-white">Approve</a>
                            </button>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    echo "<tr><td colspan='4' class='text-center'>No Book Requests Found</td></tr>";
                }
                ?> 
            </tbody>
        </table>
    </div>
</body>
</html>