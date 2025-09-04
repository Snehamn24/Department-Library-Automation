<?php
session_start(); // Ensure session is started

$connection = mysqli_connect("localhost", "root", "", "lms");


// Prepare the update query
$query = "UPDATE admins SET ";
$updates = [];

if (!empty($_POST['name'])) {
    $updates[] = "name = '" . mysqli_real_escape_string($connection, $_POST['name']) . "'";
}
if (!empty($_POST['email'])) {
    $updates[] = "email = '" . mysqli_real_escape_string($connection, $_POST['email']) . "'";
}
if (!empty($_POST['mobile'])) {
    $updates[] = "mobile = '" . mysqli_real_escape_string($connection, $_POST['mobile']) . "'";
}
if (!empty($_POST['address'])) {
    $updates[] = "address = '" . mysqli_real_escape_string($connection, $_POST['address']) . "'";
}

if (!empty($updates)) {
    $query .= implode(", ", $updates) . " WHERE email = '" . mysqli_real_escape_string($connection, $_SESSION['email']) . "'";
    
    // Execute the query and check for errors
    if (mysqli_query($connection, $query)) {
        echo "<script>alert('Updated successfully'); window.location.href='admin_dashboard.php';</script>";
    } else {
        echo "Error updating record: " . mysqli_error($connection);
    }
} else {
    echo "<script>alert('No changes were made.'); window.location.href='admin_dashboard.php';</script>";
}

?>
