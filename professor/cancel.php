<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "lms");

if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

if (isset($_GET['request_id'])) {
    $request_id = intval($_GET['request_id']);
    $professor_id = $_SESSION['id']; // ensure the professor can delete only their own request

    $delete_query = "DELETE FROM pro_book_requests WHERE request_id = $request_id AND professor_id = $professor_id";

    if (mysqli_query($connection, $delete_query)) {
        echo "<script>alert('Request cancelled successfully.'); window.location.href='view_professor_requestedbook.php';</script>";
    } else {
        echo "<script>alert('Failed to cancel request.'); window.location.href='view_professor_requestedbook.php';</script>";
    }
} else {
    echo "<script>alert('Invalid request.'); window.location.href='view_professor_requestedbook.php';</script>";
}
?>
