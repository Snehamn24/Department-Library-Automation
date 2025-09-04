<?php
if (isset($_POST['issue_book'])) {
    $connection = mysqli_connect("localhost", "root", "", "lms");

    if (!$connection) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    $book_isbn = $_POST['book_isbn'] ?? '';
    $book_name = $_POST['book_name'] ?? '';
    $user_id = $_POST['user_id'] ?? '';
    $user_name = $_POST['user_name'] ?? '';
    $issue_date = $_POST['issue_date'] ?? '';
    $return_date = $_POST['return_date'] ?? '';
    $status = $_POST['status'] ?? '';

    // Check if all fields are provided
    if (empty($book_isbn) || empty($book_name) || empty($user_id) || empty($user_name) || empty($issue_date) || empty($return_date) || empty($status)) {
        echo "<script>alert('Error: All fields are required!'); window.location.href='issue_book.php';</script>";
        exit();
    }

    // Check if the same book is already issued to this user
    $checkQuery = "SELECT * FROM issued_books WHERE book_isbn = ? AND user_id = ? AND status = 'Issued'";
    $stmt = mysqli_prepare($connection, $checkQuery);
    mysqli_stmt_bind_param($stmt, "si", $book_isbn, $user_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0) {
        echo "<script>alert('Error: This book is already issued to the same user!'); window.location.href='issue_book.php';</script>";
        exit();
    }
    mysqli_stmt_close($stmt);

    // Check if the user already has 3 books issued
    $countQuery = "SELECT COUNT(*) FROM issued_books WHERE user_id = ? AND status = 'Issued'";
    $stmt = mysqli_prepare($connection, $countQuery);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $issuedCount);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    if ($issuedCount >= 3) {
        echo "<script>alert('Error: A user cannot issue more than 3 books!'); window.location.href='issue_book.php';</script>";
        exit();
    }

    // Insert into database
    $insertQuery = "INSERT INTO issued_books (book_isbn, book_name, user_id, user_name, issue_date, return_date, status) 
                    VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($connection, $insertQuery);
    mysqli_stmt_bind_param($stmt, "ssissss", $book_isbn, $book_name, $user_id, $user_name, $issue_date, $return_date, $status);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Book issued successfully!'); window.location.href='issue_book.php';</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_stmt_error($stmt) . "'); window.location.href='issue_book.php';</script>";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($connection);
}
?>
