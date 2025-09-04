<?php
    //error_reporting(0);
    require('functions.php');
    session_start();
    $connection=mysqli_connect("localhost","root","");
    $db=mysqli_select_db($connection,"lms");
    $book_image="";
    $book_no;
    $book_name="";
    $book_author="";
    $book_cat="";
    $book_isbn="";
    $book_price="";
    $no_of_book="";
    $query="select *from dept_books where book_isbn='$_GET[bn]'";
    $query_run=mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($query_run)){
        $book_image=$row['book_image'];
        $book_no=$row["book_no"];
        $book_name=$row['book_name'];
        $book_author=$row['book_author'];
        $book_cat=$row['book_category'];
        $book_isbn=$row['book_isbn'];
        $book_price=$row['book_price'];
        $no_of_book=$row['no_copy'];
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Department Library Automation (LMS)</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <!-- jQuery -->
    <script type="text/javascript" src="bootstrap-5.3.3-dist/js/jquery_latest.js"></script>
    <!-- Bootstrap JS -->
    <script type="text/javascript" src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style type="text/css">
        body{
      background: #d6e6f8;
    }

.navbar {
  
  background: #3a6ea5 !important ;
  transition: background 0.5s ease;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.navbar-brand {
  font-weight: bold;
  color: #ffffff !important;
}
.home-icon i {
  color: #ffffff;
  transition: transform 0.3s ease;
}

.home-icon i:hover {
  transform: scale(1.2);
  color: #f0f0ff;
}
.logo1 {
    font-weight: bold;
    margin-bottom: 30px;
    color: #61678b;
    text-decoration: underline;
  }
          .card {
            
             height: 150px;
            max-width: 300px;
            width: 100%; 
        }

        .card-header {
            background-color: #BA96c1; /* Medium purple */
            color: white;
            font-weight: bold;
        }

        .btn-outline-primary {
            border-color: #BA96c1;
            color: #5e17eb;
        }

        .btn-outline-primary:hover {
            background-color: #9c8cb9;
            color: white;
        }

        marquee {

            padding: 5px;
            font-weight: bold;
            color: black;
        }
         /* Sidebar styling */
   
        .sidebar {
      height: 100%;
      width: 250px;
      position: fixed;
      top: 0;
      left: -250px;
      background-color: #2c3e50;
      padding-top: 60px;
      transition: 0.3s;
      z-index: 1000;
    }

.sidebar.active {
      left: 0;
    }

    .sidebar ul li {
      padding: 5px 20px;
    }

    .sidebar ul li a {
      color: white;
      text-decoration: none;
      display: block;
    }

    .sidebar ul li a:hover {
      background-color: blue;
    }

    .menu-icon {
      font-size: 1.5rem;
      color: white;
      padding: 0px;
      left: 0px;
      cursor: pointer;
    }

    .topbar {
     
      color: white;
      padding: 5px;
    }
    .navbar-brand{
        font-size: 25px !important;
        padding-top: 500px;
        padding-bottom: 100px;

    }
    .navbar .nav-link,
        .navbar-brand,
        .navbar .text-white strong {
            color: #fff !important;
        }
         .navbar {
            background-color: #3a6ea5; /* Deep Purple */
        }
        .custom-btn:hover {
        background-color: #fadada; /* Darker Blue on Hover */
        color: white; /* White Text on Hover */
      } 
      button a{
        text-decoration: none;
       

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
        <a class="dropdown-toggle" data-bs-toggle="collapse" href="#ecategory">E-Category</a>
        <div class="collapse" id="ecategory">
          <ul class="list-unstyled ps-3">
            <li><a href="add_ecategory.php">Add New E-Category</a></li>
            <li><a href="manage_ecategory.php">Manage E-Category</a></li>
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
            <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateFunction();">
              <div class="form-group mb-3">
               <label>Old Book Image:</label>
              <?php if($book_image): ?>
          <img src="image/<?php echo htmlspecialchars($book_image)?>" 
               alt="Book Cover" 
               style="max-width:150px; margin-bottom:10px;">
        <?php else: ?>
          <p><em>No cover uploaded</em></p>
        <?php endif; ?>
         <div class="form-group mb-3">
        <label>Choose New Book Image:</label>
        <input type="file" name="book_image" class="form-control">
    </div>
             </div> 
              <div class="form-group mb-3">
                    <label for="book_no">Book Number:</label>
                    <input type="text" name="book_no" value="<?php echo $book_no;?>" class="form-control" 
                    id="book_no" required="">
                </div>
                 <div class="form-group mb-3">
                    <label for="book_name">Book Name:</label>
                    <input type="text" name="book_name" id="book_name" value="<?php echo $book_name;?>" class="form-control" required="">
                </div>

                <div class="form-group mb-3">
                    <label for="book_author">Book Author:</label>
                    <input type="text" name="book_author" value="<?php echo $book_author;?>" class="form-control" required="" id="book_author">
                </div>

                <div class="form-group mb-3">
                    <label for="book_cat">Book Category:</label>
                    <input type="text" name="book_cat" value="<?php echo $book_cat;?>" class="form-control" 
                    id="book_cat" required="">
                </div>
                <div class="form-group mb-3">
                    <label for="book_isbn">Book ISBN:</label>
                    <input type="text" name="book_isbn" value="<?php echo $book_isbn;?>" class="form-control" required="" id="book_isbn">
                </div>
                <div class="form-group mb-3">
                    <label for="book_price">Book Price:</label>
                    <input type="text" name="book_price" value="<?php echo $book_price;?>" class="form-control" required="" id="book_price">
                </div>
                

                <div class="form-group mb-3">
                    <label for="nbook">No.of book:</label>
                    <input type="text" name="nbook" value="<?php echo $no_of_book;?>" class="form-control" required="" id="nbook">
                </div>
                
                <button class="btn btn-primary" name="update">Update Book</button>
                
            </form>
        </div>
        <div class="col-md-4"></div>
        
    </div>
    <script>
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
    
  function validateFunction() {
  const bookName = document.getElementById("book_name").value.trim();
  if (!/^[A-Za-z0-9\s]+$/.test(bookName)) {
    alert("Book Name can only contain letters, numbers and spaces.");
    return false;
  }

  const author = document.getElementById("book_author").value.trim();
  if (!/^[A-Za-z\s]+$/.test(author)) {
    alert("Author Name can only contain letters and spaces.");
    return false;
  }

  const bookNo = document.getElementById("book_no").value.trim();
  if (!/^[a-zA-Z0-9]+$/.test(bookNo)) {
    alert("Book number must contain only letters and numbers.");
    return false;
  }

  const bookPrice = document.getElementsByName("book_price")[0].value.trim();
  if (!/^\d+(\.\d{1,2})?$/.test(bookPrice)) {
    alert("Book price must be a valid number (up to 2 decimal places).");
    return false;
  }
   
  const no_book = document.getElementById("nbook").value.trim();
if (!/^[1-9][0-9]*$/.test(no_book)) {
    alert("Number of Books must be a positive number greater than 0.");
    return false;
}

const isbn = document.querySelector("input[name='book_isbn']").value.trim();

// Remove hyphens to count digits
const digitsOnly = isbn.replace(/-/g, "");

// Check if it contains only digits and hyphens, and has total 10 or 13 digits
if (!/^[\d-]+$/.test(isbn) || !(digitsOnly.length === 10 || digitsOnly.length === 13)) {
  alert("ISBN must contain only digits and optional hyphens, and be 10 or 13 digits long.");
  return false;
}

  return true; // All validations passed
}
  
</script>
</body>
</html>
<?php
// Establish database connection
$connection = mysqli_connect("localhost", "root", "", "lms");

// Check if form is submitted
if (isset($_POST['update'])) {
    $book_isbn = mysqli_real_escape_string($connection, $_GET['bn']); // Sanitize input

    $updates = [];
    $params = [];
    $types = "";

    // Define upload directories
    $image_dir = "image/";
    //$pdf_dir = "pdf/";

    // Create directories if not exist
    if (!is_dir($image_dir)) {
        mkdir($image_dir, 0777, true);
    }

    // Handle Book Image Upload
    // Handle file upload if a new image is selected
        if (!empty($_FILES['book_image']['name'])) {
            $file_name = $_FILES['book_image']['name'];
            $file_tmp = $_FILES['book_image']['tmp_name'];
            $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            $allowed_ext = array("jpg", "jpeg", "png", "gif");

            if (in_array($file_ext, $allowed_ext)) {
                $file_dest = "image/" . uniqid("book_") . "." . $file_ext;
                move_uploaded_file($file_tmp, $file_dest);
                $book_image = basename($file_dest);
            } else {
                echo "<script>alert('Invalid image file format. Only JPG, JPEG, PNG, and GIF are allowed.');</script>";
                exit;
            }
        }


    
    // Update other book details
     if (!empty($_POST['book_no'])) {
        $updates[] = "book_no = ?";
        $params[] = $_POST['book_no'];
        $types .= "s";
    }
    if (!empty($_POST['book_name'])) {
        $updates[] = "book_name = ?";
        $params[] = $_POST['book_name'];
        $types .= "s";
    }
    if (!empty($_POST['book_author'])) {
        $updates[] = "book_author = ?";
        $params[] = $_POST['book_author'];
        $types .= "s";
    }
    if (!empty($_POST['book_cat'])) {
        $updates[] = "book_category = ?";
        $params[] = $_POST['book_cat'];
        $types .= "s";
    }
    if (!empty($_POST['nbook'])) {
        $updates[] = "no_copy = ?";
        $params[] = $_POST['nbook'];
        $types .= "s";
    }
    if (!empty($_POST['book_isbn'])) {
        $updates[] = "book_isbn = ?";
        $params[] = $_POST['book_isbn'];
        $types .= "s";
    }
     if (!empty($_POST['book_price'])) {
        $updates[] = "book_price = ?";
        $params[] = $_POST['book_price'];
        $types .= "s";
    }


    // Check if any fields need updating
    if (!empty($updates)) {
        $query = "UPDATE dept_books SET " . implode(", ", $updates) . " WHERE book_isbn = ?";
        $stmt = mysqli_prepare($connection, $query);

        $types .= "s";
        $params[] = $book_isbn;
        mysqli_stmt_bind_param($stmt, $types, ...$params);

        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Book updated successfully!'); window.location.href='manage_deptbooks.php';</script>";
        } else {
            echo "<script>alert('Error updating book: " . mysqli_error($connection) . "');</script>";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('No fields to update!');</script>";
    }
}

mysqli_close($connection);
?>
