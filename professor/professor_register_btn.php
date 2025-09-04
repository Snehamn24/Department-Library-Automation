<?php
$connection = mysqli_connect("localhost", "root", "", "lms");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected";

// Check if all form inputs exist before using them
$Name = isset($_POST['name']) ? $_POST['name'] : '';
$Email = isset($_POST['email']) ? $_POST['email'] : '';
//$Id = isset($_POST['idcard']) ? $_POST['idcard'] : '';
$Password = isset($_POST['password']) ? $_POST['password'] : '';
$Mobile = isset($_POST['mobile']) ? $_POST['mobile'] : '';
$Address = isset($_POST['address']) ? $_POST['address'] : '';

// Check for existing email
$emailQuery = "SELECT * FROM professor WHERE p_email = ?";
$stmt = mysqli_prepare($connection, $emailQuery);
mysqli_stmt_bind_param($stmt, "s", $Email);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);

if (mysqli_stmt_num_rows($stmt) > 0) {
    echo "<script>alert('Email already registered. Please try with another email!'); window.location.href='professor_signup_form.php';</script>";
    mysqli_stmt_close($stmt);
    exit();
}

// Ensure required fields are filled before inserting into database
if (!empty($Name) && !empty($Email) && !empty($Password)  && !empty($Mobile) && !empty($Address)) {
    $query = "INSERT INTO professor (p_name,p_email,p_pass,p_mobile,p_address) VALUES ('$Name', '$Email','$Password', '$Mobile', '$Address')";

    if (mysqli_query($connection, $query)) {
        echo "<script>
                alert('Registration successful... You may login now !!');
                window.location.href = 'professor_login.php';
              </script>";
    } else {
        echo "Error: " . mysqli_error($connection);
    }
} else {
    echo "All fields are required!";
}
?>
