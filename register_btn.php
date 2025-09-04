<?php
$connection = mysqli_connect("localhost", "root", "", "lms");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected<br>";

// Get values from POST request
$Name = isset($_POST['name']) ? $_POST['name'] : '';
$Uucms = isset($_POST['uucms']) ? $_POST['uucms'] : '';
$Email = isset($_POST['email']) ? $_POST['email'] : '';
$Password = isset($_POST['password']) ? $_POST['password'] : '';
$Mobile = isset($_POST['mobile']) ? $_POST['mobile'] : '';
$Address = isset($_POST['address']) ? $_POST['address'] : '';

// Check if email already exists
$emailQuery = "SELECT * FROM student WHERE email = ?";
$stmt = mysqli_prepare($connection, $emailQuery);
mysqli_stmt_bind_param($stmt, "s", $Email);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);

if (mysqli_stmt_num_rows($stmt) > 0) {
    echo "<script>alert('Email already registered. Please try with another email!'); window.location.href='signup_form.php';</script>";
    mysqli_stmt_close($stmt);
    exit();
}
mysqli_stmt_close($stmt);

// Check all required fields are filled
if (!empty($Name) && !empty($Uucms) && !empty($Email) && !empty($Password) && !empty($Mobile) && !empty($Address)) {
    $insertQuery = "INSERT INTO student (name, uucms, email, password, mobile, address) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connection, $insertQuery);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssss", $Name, $Uucms, $Email, $Password, $Mobile, $Address);
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>
                    alert('Registration successful... You may login now !!');
                    window.location.href = 'index.php';
                  </script>";
        } else {
            echo "Error executing statement: " . mysqli_stmt_error($stmt);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($connection);
    }
} else {
    echo "<script>alert('All fields are required!'); window.location.href='signup_form.php';</script>";
}
?>
