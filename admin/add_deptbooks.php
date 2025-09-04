<?php
//error_reporting(0);
//require('functions.php');

session_start();

$connection=mysqli_connect("localhost","root","","lms");
if(!$connection){
    die("Not connected");
}
//$sql="SELECT * FROM category";
//$all_categories=mysqli_query($connection,$sql);
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
            background:#d6e6f8;
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
            <form action="" method="post"  enctype="multipart/form-data" onsubmit="return validateFunction();">
                <div class="form-group mb-3"> 
                    <label for="book_image">Choose Book Image:</label>
                 <input type="file" name="book_image" class="form-control" id="book_image" 
                 accept="image/png, image/jpeg, image/jpg"  required>
             </div>
             <div class="form-group mb-3">
                    <label for="book_no">Book Number : </label>
                    <input type="text" name="book_no" id="book_no" class="form-control" required>
             </div>
                <div class="form-group mb-3">
                    <label for="book_name">Book Name:</label>
                    <input type="text" name="book_name" class="form-control" id="book_name" required="">
                </div>
                <div class="form-group mb-3">
                    <label for="book_author">Book Author:</label>
                    <input type="text" name="book_author" class="form-control" id="book_author" required="">
                </div>
                <div class="form-group mb-3">
                <label>Category Name:</label>
                <select name="book_cat" class="form-control" required>
               <option value="">Select a Category</option>
             <?php
             //$connection = mysqli_connect("localhost", "root", "", "lms");
             //if (!$connection) {
            //die("Database connection failed: " . mysqli_connect_error());
       // }
        
        $query = "SELECT cat_name FROM category ORDER BY cat_id DESC"; // Assuming 'category_name' is the column
        $result = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $row['cat_name'] . "'>" . $row['cat_name'] . "</option>";
        }
        mysqli_close($connection);
        ?>
    </select>
</div>

                <div class="form-group mb-3">
                 <label>Book ISBN-Number:</label>
                 <input type="text" name="book_isbn" class="form-control" required="">
                 </div>


                <div class="form-group mb-3" >
                    <label for="book_price">Book Price:</label>
                    <input type="text" name="book_price" class="form-control" id="book_price" required>
                </div>


                 <div class="form-group mb-3">
                    <label name="nbook">Number of Books:</label>
                    <input type="text" name="nbook" class="form-control" id="nbook" min="1" required="">
                </div>
                <button class="btn btn-primary" type="submit" name="add_book">Add Book</button>
                
            </form>
        </div>
        <div class="col-md-4"></div>
        
    </div>
    <script>
   
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


  return true; // All validations passed
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
// Process the form when submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['add_book'])) {
        $connection = mysqli_connect("localhost", "root", "", "lms");

        if (!$connection) {
            die("Database connection failed: " . mysqli_connect_error());
}

       $filename = $_FILES["book_image"]["name"];
        $tempname = $_FILES["book_image"]["tmp_name"];
        $folder = "./image/" . $filename;

       $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
       $fileType = mime_content_type($_FILES['book_image']['tmp_name']);
       $fileSize = $_FILES['book_image']['size'];

if (!in_array($fileType, $allowedTypes)) {
    echo "<script>alert('Only JPG, JPEG, and PNG files are allowed.');</script>";
    exit;
}

if ($fileSize > 2 * 1024 * 1024) { // 2 MB
    echo "<script>alert('Image size should not exceed 2MB.');</script>";
    exit;
}


        move_uploaded_file($tempname, $folder);
       $book_no=mysqli_real_escape_string($connection,$_POST["book_no"]);
       $book_name = mysqli_real_escape_string($connection, $_POST["book_name"]);
       $book_author = mysqli_real_escape_string($connection, $_POST["book_author"]);
       $book_cat = mysqli_real_escape_string($connection, $_POST["book_cat"]);
       $book_isbn = mysqli_real_escape_string($connection, $_POST["book_isbn"]);
       $no_book = mysqli_real_escape_string($connection, $_POST["nbook"]);
       $book_price=mysqli_real_escape_string($connection,$_POST["book_price"]);

        



        // Validate ISBN using the checksum method
        function isValidISBN($isbn) {
            $isbn = str_replace("-", "", $isbn); // Remove hyphens
            $length = strlen($isbn);

            if ($length == 10) {
                // ISBN-10 Validation
                $sum = 0;
                for ($i = 0; $i < 9; $i++) {
                    if (!is_numeric($isbn[$i])) return false;
                    $sum += ($isbn[$i] * (10 - $i));
                }
                $checksum = 11 - ($sum % 11);
                $checksum = ($checksum == 10) ? 'X' : (($checksum == 11) ? '0' : $checksum);
                return ($isbn[9] == $checksum);
            } elseif ($length == 13) {
                // ISBN-13 Validation
                $sum = 0;
                for ($i = 0; $i < 12; $i++) {
                    if (!is_numeric($isbn[$i])) return false;
                    $sum += $isbn[$i] * (($i % 2 == 0) ? 1 : 3);
                }
                $checksum = (10 - ($sum % 10)) % 10;
                return ($isbn[12] == $checksum);
            }
            return false; // Invalid ISBN length
        }

        if ($filename && $book_no && $book_name && $book_author && $book_cat && $book_isbn && $book_price && $no_book) {
            if (!isValidISBN($book_isbn)) {
                echo "<script>alert('Invalid ISBN number! Please enter a valid ISBN-10 or ISBN-13.');</script>";
            } else {
                // CHECK IF THE ISBN ALREADY EXISTS
                $check_query = "SELECT * FROM dept_books WHERE book_isbn = '$book_isbn'";
                $result = mysqli_query($connection, $check_query);

                if (mysqli_num_rows($result) > 0) {
                    // ISBN already exists, show an alert
                    echo "<script>alert('Book with this ISBN already exists!');</script>";
                } else {
                    // Insert the book if ISBN is valid and not found in the database
                    $query = "INSERT INTO dept_books (book_image,book_no, book_name, book_author,book_category, book_isbn,book_price,no_copy) 
                              VALUES ('$filename','$book_no','$book_name', '$book_author', '$book_cat', '$book_isbn', '$book_price','$no_book')";

                    if (mysqli_query($connection, $query)) {
                        echo "<script>alert('Book added successfully!');</script>";
                    } else {
                        echo "Error: " . mysqli_error($connection);
                    }
                }
            }
        } else {
            echo "<script>alert('Please fill in all fields.');</script>";
        }
        
        mysqli_close($connection);
    }
}
?>
