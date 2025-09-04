<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "lms");

if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

if (isset($_GET['request_id'])) {
    $request_id = intval($_GET['request_id']);
    $student_id = $_SESSION['id']; // ensure the student can delete only their own request

    $delete_query = "DELETE FROM student_request WHERE request_id = $request_id AND student_id = $student_id";

    if (mysqli_query($connection, $delete_query)) {
        echo "<script>alert('Request cancelled successfully.'); window.location.href='view_requested_book.php';</script>";
    } else {
        echo "<script>alert('Failed to cancel request.'); window.location.href='view_requested_book.php';</script>";
    }
} else {
    echo "<script>alert('Invalid request.'); window.location.href='view_requested_book.php';</script>";
}
?>
