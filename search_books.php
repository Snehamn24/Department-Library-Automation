<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "lms");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['query']) && !empty($_GET['query'])) {
    $search_query = mysqli_real_escape_string($conn, $_GET['query']);

    // Query to fetch books based on search query
    $query = "SELECT *FROM books WHERE book_name LIKE '%$search_query%'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<p class='text-success'><strong> Book is Present</strong></p>";
        echo "<ul class='list-group'>";
        while ($row = mysqli_fetch_assoc($result)) {
            // Pass the book name instead of book ID
            echo "<li class='list-group-item'>
                <a href='fetch_books.php' class='book-link' data-name='" . htmlspecialchars($row['book_name']) . "'>" 
                . htmlspecialchars($row['book_name']) . 
                "</a>
            </li>";
        }
        echo "</ul>";
    } else {
        echo "<p class='text-danger'><strong> No books found.</strong></p>";
    }
}
mysqli_close($conn);
?>
