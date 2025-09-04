<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "lms");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if book_name is provided
if (isset($_POST['book_name']) && !empty($_POST['book_name'])) {
    $book_name = $_POST['book_name'];

    // Use prepared statement for security
    $stmt = $conn->prepare("SELECT * FROM books WHERE book_name = ? LIMIT 1");
    $stmt->bind_param("s", $book_name);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch book details
    if ($result->num_rows > 0) {
        $book = $result->fetch_assoc();
        echo "<h4>" . htmlspecialchars($book['book_name']) . "</h4>";
        echo "<p><strong>Author:</strong> " . htmlspecialchars($book['book_author']) . "</p>";
        echo "<p><strong>Category:</strong> " . htmlspecialchars($book['book_cat']) . "</p>";
        echo "<p><strong>ISBN:</strong> " . htmlspecialchars($book['book_isbn']) . "</p>";
        echo "<p><strong>Cost:</strong> ₹" . htmlspecialchars($book['book_cost']) . "</p>";
    } else {
        echo "<p class='text-danger'><strong>❌ Book details not found.</strong></p>";
    }
    
    // Close statement
    $stmt->close();
} else {
    echo "<p class='text-danger'><strong>❌ Error: Book Name not received.</strong></p>";
}

// Close database connection
$conn->close();
?>
