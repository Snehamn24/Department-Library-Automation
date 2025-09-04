<?php
    //error_reporting(0);
    require('functions.php');
    session_start();
    $connection=mysqli_connect("localhost","root","");
    $db=mysqli_select_db($connection,"lms");
    $book_image="";
    $book_isbn="";
    $book_name="";
    $book_author="";
    $book_cat="";
    $book_pdf="";
    $query="select *from book where book_isbn='$_GET[bn]'";
    $query_run=mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($query_run)){
        $book_image=$row['book_image'];
        $book_name=$row['book_name'];
        $book_author=$row['book_author'];
        $book_cat=$row['book_cat'];
        $book_isbn=$row['book_isbn'];
        $book_pdf=$row['book_pdf'];
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
         <link rel="stylesheet" type="text/css" href="admin_style.css">
    <style type="text/css">
        
        body {
            
           background:#d6e6f8;
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
        <label for="book_image">Choose New Book Image:</label>
        <input type="file" name="book_image" class="form-control" id="book_image">
    </div>
             </div>
                <div class="form-group mb-3">
                    <label for="book_isbn">Book ISBN:</label>
                    <input type="text" name="book_isbn" id="book_isbn" value="<?php echo $book_isbn;?>" class="form-control" required="">
                </div>
                <div class="form-group mb-3">
                    <label for="book_name">Book Name:</label>
                    <input type="text" name="book_name" value="<?php echo $book_name;?>" class="form-control" required="" id="book_name">
                </div>
                <div class="form-group mb-3">
                    <label for="book_author">Book Author:</label>
                    <input type="text" name="book_author" value="<?php echo $book_author;?>" class="form-control" required="" id="book_author">
                </div>
                <div class="form-group mb-3">
                    <label for="book_cat">Book Category:</label>
                    <input type="text" name="book_cat" value="<?php echo $book_cat;?>" class="form-control" required="" id="book_cat">
                </div>
                
               <div class="form-group mb-3">
            <label>Choose New Book PDF:</label>
            <?php if($book_pdf): ?>
          <a href="pdf/<?php echo htmlspecialchars($book_pdf)?>">
            Download / View PDF
          </a>
        <?php else: ?>
          <p><em>No PDF uploaded</em></p>
        <?php endif; ?>
    </div>
    <div class="form-group mb-3">
        <label>Choose New Book PDF:</label>
        <input type="file" name="book_pdf" class="form-control">
    </div>
              
                <button class="btn btn-primary" name="update">Update Book</button>
                
            </form>
        </div>
        <div class="col-md-4"></div>
        
    </div>
    <script>

   function validateFunction() {
  const bookName = document.getElementById("book_name").value.trim();
  if (!/^[A-Za-z\s]+$/.test(bookName)) {
    alert("Book Name can only contain letters and spaces.");
    return false;
  }

  const bookcat = document.getElementById("book_cat").value.trim();
  if (!/^[A-Za-z\s]+$/.test(bookcat)) {
    alert("Book Category can only contain letters and spaces.");
    return false;
  }

  const author = document.getElementById("book_author").value.trim();
  if (!/^[A-Za-z\s]+$/.test(author)) {
    alert("Author Name can only contain letters and spaces.");
    return false;
  }

  const imageInput = document.getElementById("book_image");
  const pdfInput = document.querySelector("input[name='book_pdf']");

  // Validate image file
  if (imageInput.files.length > 0) {
    const allowedImageTypes = ["image/jpeg", "image/png", "image/jpg", "image/webp"];
    const imageFile = imageInput.files[0];

    if (!allowedImageTypes.includes(imageFile.type)) {
      alert("Only JPG, JPEG, PNG, and WEBP images are allowed.");
      return false;
    }

    if (imageFile.size > 2 * 1024 * 1024) {
      alert("Image size should be less than 2MB.");
      return false;
    }
  }

  // Validate PDF file
  if (pdfInput.files.length > 0) {
    const pdfFile = pdfInput.files[0];

    if (pdfFile.type !== "application/pdf") {
      alert("Only PDF files are allowed.");
      return false;
    }

    if (pdfFile.size > 10 * 1024 * 1024) {
      alert("PDF size should be less than 10MB.");
      return false;
    }
}

    const isbn = document.querySelector("input[name='book_isbn']").value.trim();

// Remove hyphens to count digits
const digitsOnly = isbn.replace(/-/g, "");

// Check if it contains only digits and hyphens, and has total 10 or 13 digits
if (!/^[\d-]+$/.test(isbn) || !(digitsOnly.length === 10 || digitsOnly.length === 13)) {
  alert("ISBN must contain only digits and optional hyphens, and be 10 or 13 digits long.");
  return false;
}

  return true; //  All validations passed
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
    $pdf_dir = "pdf/";

    // Create directories if not exist
    if (!is_dir($image_dir)) {
        mkdir($image_dir, 0777, true);
    }
    if (!is_dir($pdf_dir)) {
        mkdir($pdf_dir, 0777, true);
    }

    // Handle Book Image Upload
    if (!empty($_FILES['book_image']['name'])) {
        $image_file = $image_dir . basename($_FILES["book_image"]["name"]);
        if (move_uploaded_file($_FILES["book_image"]["tmp_name"], $image_file)) {
            $updates[] = "book_image = ?";
            $params[] = basename($image_file); // Store only filename
            $types .= "s";
        } else {
            echo "<script>alert('Error uploading book image!');</script>";
        }
    }

    // Handle Book PDF Upload
    if (!empty($_FILES['book_pdf']['name'])) {
        $pdf_file = $pdf_dir . basename($_FILES["book_pdf"]["name"]);
        if (move_uploaded_file($_FILES["book_pdf"]["tmp_name"], $pdf_file)) {
            $updates[] = "book_pdf = ?";
            $params[] = basename($pdf_file); // Store only filename
            $types .= "s";
        } else {
            echo "<script>alert('Error uploading book PDF!');</script>";
        }
    }

    // Update other book details
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
        $updates[] = "book_cat = ?";
        $params[] = $_POST['book_cat'];
        $types .= "s";
    }

    if (!empty($_POST['book_isbn'])) {
    $updates[] = "book_isbn = ?";
    $params[] = $_POST['book_isbn'];
    $types .= "s";
}


    // Check if any fields need updating
    if (!empty($updates)) {
        $query = "UPDATE book SET " . implode(", ", $updates) . " WHERE book_isbn = ?";
        $stmt = mysqli_prepare($connection, $query);

        $types .= "s";
        $params[] = $book_isbn;
        mysqli_stmt_bind_param($stmt, $types, ...$params);

        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Book updated successfully!'); window.location.href='manage_book.php';</script>";
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
