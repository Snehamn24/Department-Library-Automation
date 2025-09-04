<?php
    require('functions.php');
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Department Library Automation</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <!-- jQuery -->
    <script type="text/javascript" src="bootstrap-5.3.3-dist/js/jquery_latest.js"></script>
    <!-- Bootstrap JS -->
    <script type="text/javascript" src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
     <link rel="stylesheet" type="text/css" href="admin_style.css">
    <style type="text/css">
        body {
            background: #d6e6f8;
        }
        .btn-primary
        {
           background: #3a6ea5;
           border: none;
           border-radius: 30px;
           padding: 12px 25px;
           font-size: 1.1em;
           margin: 10px 0;
           width: 50%;
          color: white;
          transition: 0.4s;
        }
        .btn-primary:hover {
      background: #3a6ea5;
      transform: scale(1.05);
      color: #f9f9f9;
  }

  
    </style> 
</head>
<body>
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">

            <div class="topbar">
   
   <i class="bi bi-list menu-icon" id="toggleBtn" style="font-size: 1.2rem; margin-right: 1px; color: white;margin-left: 1px;"></i>
&nbsp;&nbsp; 
  </div><div class="navbar-header">
                 <img src="../booklogo.png" alt="booklogo" class="img-fluid" style="height: 50px; width: 50px; padding-bottom: 5px;"> 
        &nbsp;
                <a class="navbar-brand" href="admin_dashboard.php">Dashboard</a>
            </div>&nbsp;&nbsp;&nbsp;
            <font style="color:white"> <span> <strong> Welcome : <?php echo $_SESSION['name'];?> </strong> </span> </font> &nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <font style="color:white"> <span> <strong> Email : <?php echo $_SESSION['email'];?> </strong> </span> </font>
        
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false"><img src="../person_icon.png" alt="Profile" style="height: 25px; width: 25px; margin-right: 5px;">
                            My Profile
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="view_profile.php"><i class="bi bi-person-circle"></i>
                            View Profile</a></li>
                            <li><a class="dropdown-item" href="edit_profile.php"><i class="bi bi-pen-fill"></i>
                            Edit Profile</a></li>
                            <li><a class="dropdown-item" href="change_password.php"><i class="bi bi-key-fill"></i>
                            Change Password</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center" href="../logout.php">
                        <i class="bi bi-box-arrow-right" style="font-size: 1.2rem; margin-right: 5px;"></i> Logout
                    </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Sidebar -->
  <div class="sidebar" id="sidebar">
    <ul class="nav flex-column">
      <li class="l1"><a href="admin_dashboard.php">Dashboard</a></li>
      <li>
        <a class="dropdown-toggle" data-bs-toggle="collapse" href="#ebooks">E-Books</a>
        <div class="collapse" id="ebooks">
          <ul class="list-unstyled ps-3">
            <li><a href="add_books.php">Add New E-Book</a></li>
            <li><a href="manage_book.php">Manage E-Books</a></li>
          </ul>
        </div>
      </li>
      <li>
        <a class="dropdown-toggle" data-bs-toggle="collapse" href="#category">Category</a>
        <div class="collapse" id="category">
          <ul class="list-unstyled ps-3">
            <li><a href="add_category.php">Add New Category</a></li>
            <li><a href="manage_category.php">Manage Category</a></li>
          </ul>
        </div>
      </li>
      <li>
        <a class="dropdown-toggle" data-bs-toggle="collapse" href="#deptbooks">Department Books</a>
        <div class="collapse" id="deptbooks">
          <ul class="list-unstyled ps-3">
            <li><a href="add_deptbooks.php">Add Dept. Books</a></li>
            <li><a href="manage_deptbooks.php">Manage Dept. Books</a></li>
          </ul>
        </div>
      </li>
      <li>
        <a class="dropdown-toggle" data-bs-toggle="collapse" href="#fine">Fine Calculation</a>
        <div class="collapse" id="fine">
          <ul class="list-unstyled ps-3">
            <li><a href="admin_professor_fine.php">Professor</a></li>
            <li><a href="admin_student_fine.php">Students</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
    <span><marquee>This is library management system. Library opens at 8:00 AM and closes at 8:00 PM</marquee></span><br><br>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form action="" method="post" onsubmit="return validateFunction();">
                <div class="form-group mb-3">
                    <label for="cat_name">Category Name:</label>
                    <input type="text" name="cat_name" id="cat_name" class="form-control" required="">
                </div>
               
                <button class="btn btn-primary" name="add_cat">Add Category</button>
                
            </form>
        </div>
        <div class="col-md-4"></div>
        
    </div>
     <script type="text/javascript">
  

  function validateFunction() {
    // get the field by id
    var cat = document.getElementById("cat_name").value.trim();
    // allow only letters and spaces
    var regex = /^[A-Za-z\s]+$/;

    if (!regex.test(cat)) {
      alert("Only alphabets and spaces are allowed in the Category field.");
      document.getElementById("cat_name").value = "";
      return false;
    }

    // if we get here, validation passed
    return true;
  }

  const toggleBtn = document.getElementById('toggleBtn');
  const sidebar = document.getElementById('sidebar');

  // Toggle sidebar open/close
  toggleBtn.addEventListener('click', function () {
    sidebar.classList.toggle('active');
  });

  // Optional: Close sidebar when clicking outside of it
  document.addEventListener('click', function (event) {
    if (!sidebar.contains(event.target) && !toggleBtn.contains(event.target)) {
      sidebar.classList.remove('active');
    }
  });

</script>   
</body>
</html>
<?php
if (isset($_POST['add_cat'])) {
    // Database connection
    $connection = mysqli_connect("localhost", "root", "", "lms");

    if (!$connection) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Get the category name safely
    $cat_name = isset($_POST['cat_name']) ? mysqli_real_escape_string($connection, $_POST['cat_name']) : '';

    if (!empty($cat_name)) {
        // Check if the category already exists
        $check_query = "SELECT * FROM category WHERE cat_name = '$cat_name'";
        $result = mysqli_query($connection, $check_query);

        if (mysqli_num_rows($result) > 0) {
            // Category already exists, show alert
            echo "<script>alert('Category already exists!');</script>";
        } else {
            // Insert new category
            $query = "INSERT INTO category (cat_name) VALUES ('$cat_name')";
            if (mysqli_query($connection, $query)) {
                echo "<script>alert('Category added successfully!');</script>";
            } else {
                echo "<script>alert('Error: " . mysqli_error($connection) . "');</script>";
            }
        }
    } else {
        echo "<script>alert('Please enter a category name.');</script>";
    }

    // Close the connection
    mysqli_close($connection);
}
?>


