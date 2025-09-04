<?php


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
            background: #d6e6f8;
        }
        .btn-primary
        {
           background: linear-gradient(to right,  #3a6ea5, #3a6ea5);
           border: none;
           border-radius: 30px;
           padding: 12px 25px;
           font-size: 1.1em;
           margin: 10px 0;
           width: 30%;
          color: white;
          transition: 0.4s;
        }
        .btn-primary:hover {
      background: linear-gradient(to right, #3a6ea5, #3a6ea5);
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
            <form action="" method="post"  enctype="multipart/form-data" onsubmit="return validateFunction();">
                <div class="form-group mb-3">
                    <label for="book_image">Choose Book Image:</label>
                 <input type="file" name="book_image" class="form-control" id="book_image" required>
             </div>
                <div class="form-group mb-3">
                    <label for="book_name">Book Name:</label>
                    <input type="text" name="book_name" id="book_name" class="form-control" required="">
                </div>
                <div class="form-group mb-3">
                    <label for="book_author">Book Author:</label>
                    <input type="text" name="book_author" id="book_author" class="form-control" required="">
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
        
        $query = "SELECT cat_name FROM e_category"; // Assuming 'category_name' is the column
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
                 <input type="text" name="book_isbn" class="form-control" required>
                 </div>


                <div class="form-group mb-3" >
                    <label>Choose Book PDF:</label>
                    <input type="file" name="book_pdf" class="form-control" required>
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

    if (pdfFile.size > 20 * 1024 * 1024) {
      alert("PDF size should be less than 20MB.");
      return false;
    }
  }

  return true; //  All validations passed
}

// Sidebar toggle logic (unrelated to form validation)
const toggleBtn = document.getElementById('toggleBtn');
const sidebar = document.getElementById('sidebar');
toggleBtn.addEventListener('click', function () {
  sidebar.classList.toggle('active');
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
        move_uploaded_file($tempname, $folder);
       $book_name = mysqli_real_escape_string($connection, $_POST["book_name"]);
       $book_author = mysqli_real_escape_string($connection, $_POST["book_author"]);
       $book_cat = mysqli_real_escape_string($connection, $_POST["book_cat"]);
       $book_isbn = mysqli_real_escape_string($connection, $_POST["book_isbn"]);
      
        $pdf=$_FILES['book_pdf']['name'];//for multimedia data we should use $_FILES instead of $_POST
        $pdf_type=$_FILES['book_pdf']['type'];
        $pdf_size=$_FILES['book_pdf']['size'];
        $pdf_tem_loc=$_FILES['book_pdf']['tmp_name'];
        $pdf_store="pdf/".$pdf;//store $pdf to the pdf folder
                
        move_uploaded_file($pdf_tem_loc,$pdf_store);


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

        if ($filename && $book_name && $book_author && $book_cat && $book_isbn  && $pdf) {
            if (!isValidISBN($book_isbn)) {
                echo "<script>alert('Invalid ISBN number! Please enter a valid ISBN-10 or ISBN-13.');</script>";
            } else {
                // CHECK IF THE ISBN ALREADY EXISTS
                $check_query = "SELECT * FROM book WHERE book_isbn = '$book_isbn'";
                $result = mysqli_query($connection, $check_query);

                if (mysqli_num_rows($result) > 0) {
                    // ISBN already exists, show an alert
                    echo "<script>alert('Book with this ISBN already exists!');</script>";
                } else {
                    // Insert the book if ISBN is valid and not found in the database
                    $query = "INSERT INTO book (book_image,book_name, book_author, book_cat, book_isbn,book_pdf) 
                              VALUES ('$filename','$book_name', '$book_author', '$book_cat', '$book_isbn','$pdf')";

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
