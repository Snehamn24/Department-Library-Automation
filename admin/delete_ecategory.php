<?php       
    // Establish database connection
    $connection = mysqli_connect("localhost", "root", "", "lms");

    // Check connection
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get book ISBN from URL parameter safely
    if (isset($_GET['cat_id'])) {
        $cat_id = mysqli_real_escape_string($connection, $_GET['cat_id']);
        
        // Delete query
        $query = "DELETE FROM e_category WHERE cat_id = '$cat_id'";
        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            echo "<script>alert('CATEGORY DELETED!!!'); window.location.href='manage_ecategory.php';</script>";
        } else {
            echo "Error deleting book: " . mysqli_error($connection);
        }
    } else {
        echo "<script>alert('Invalid request!'); window.location.href='manage_ecategory.php';</script>";
    }

    // Close connection
    mysqli_close($connection);
?>
