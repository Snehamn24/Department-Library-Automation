<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "lms");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$password = "";
if (isset($_POST['current_password']) && isset($_POST['new_password']) && isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];

    // Fetch the current password
    $query = "SELECT password FROM admins WHERE email = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $password);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    // Check if current password matches
    if ($password === $current_password) {
        // Update with the new password
        $query = "UPDATE admins SET password = ? WHERE email = ?";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "ss", $new_password, $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        echo '<script type="text/javascript">
                alert("Updated successfully");
                window.location.href="admin_dashboard.php";
              </script>';
    } else {
        echo '<script type="text/javascript">
                alert("Current password is incorrect");
                window.location.href="change_password.php";
              </script>';
    }
} else {
    echo '<script type="text/javascript">
            alert("Please fill all fields");
            window.location.href="change_password.php";
          </script>';
}

mysqli_close($connection);
?>
