<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "lms");

if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Get user ID from session
$pro_id = $_SESSION['id'];
$pro_name=$_SESSION['name'];

// Get book details from the form
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $book_num = $_POST['book_no'];
    $book_name = mysqli_real_escape_string($connection, $_POST['book_name']);
    $book_author = mysqli_real_escape_string($connection, $_POST['book_author']);

        // Check if the book has available copies
    $copies_query = "SELECT no_copy FROM dept_books WHERE book_no = '$book_num'";
    $copies_result = mysqli_query($connection, $copies_query);
    $copies_data = mysqli_fetch_assoc($copies_result);

    if ($copies_data['no_copy'] <= 0) {
        echo "<script>alert('This book is currently not available (no copies left).'); window.location.href='professor_dashboard.php';</script>";
        exit();
    }

    // Check if the user already requested this book
    $check_query = "SELECT * FROM pro_book_requests WHERE professor_id='$pro_id' AND book_num='$book_num'";
    $check_result = mysqli_query($connection, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        echo "<script>alert('You have already requested this book.'); window.location.href='professor_dashboard.php';</script>";
        exit();
    }

    // Insert request into database
    $insert_query = "INSERT INTO pro_book_requests (professor_id,professor_name,book_num, book_name, book_author, status) 
                     VALUES ('$pro_id','$pro_name','$book_num', '$book_name', '$book_author', 'Pending')";
    if (mysqli_query($connection, $insert_query)) {
        echo "<script>alert('Book request submitted successfully!'); window.location.href='professor_dashboard.php';</script>";
    } else {
        echo "<script>alert('Error: Unable to request the book.'); window.location.href='professor_dashboard.php';</script>";
    }
}
mysqli_close($connection);
?>
