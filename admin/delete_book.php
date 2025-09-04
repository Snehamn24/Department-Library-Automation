<?php       
    // Establish database connection
    $connection = mysqli_connect("localhost", "root", "", "lms");

    // Check connection
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get book ISBN from URL parameter safely
    if (isset($_GET['bn'])) {
        $book_isbn = mysqli_real_escape_string($connection, $_GET['bn']);
        
        // Delete query
        $query = "DELETE FROM book WHERE book_isbn = '$book_isbn'";
        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            echo "<script>alert('BOOK DELETED!!!'); window.location.href='manage_book.php';</script>";
        } else {
            echo "Error deleting book: " . mysqli_error($connection);
        }
    } else {
        echo "<script>alert('Invalid request!'); window.location.href='manage_book.php';</script>";
    }

    // Close connection
    mysqli_close($connection);
?>
