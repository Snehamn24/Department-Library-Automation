<?php
session_start(); // Ensure session is started

$connection = mysqli_connect("localhost", "root", "", "lms");


// Prepare the update query
$query = "UPDATE professor SET ";
$updates = [];

if (!empty($_POST['name'])) {
    $updates[] = "p_name = '" . mysqli_real_escape_string($connection, $_POST['name']) . "'";
}
if (!empty($_POST['email'])) {
    $updates[] = "p_email = '" . mysqli_real_escape_string($connection, $_POST['email']) . "'";
}
if (!empty($_POST['mobile'])) {
    $updates[] = "p_mobile = '" . mysqli_real_escape_string($connection, $_POST['mobile']) . "'";
}
if (!empty($_POST['address'])) {
    $updates[] = "p_address = '" . mysqli_real_escape_string($connection, $_POST['address']) . "'";
}

if (!empty($updates)) {
    $query .= implode(", ", $updates) . " WHERE p_email = '" . mysqli_real_escape_string($connection, $_SESSION['email']) . "'";
    
    // Execute the query and check for errors
    if (mysqli_query($connection, $query)) {
        echo "<script>alert('Updated successfully'); window.location.href='professor_dashboard.php';</script>";
    } else {
        echo "Error updating record: " . mysqli_error($connection);
    }
} else {
    echo "<script>alert('No changes were made.'); window.location.href='professor_dashboard.php';</script>";
}

?>
