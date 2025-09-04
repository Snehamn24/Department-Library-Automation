<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "lms");

if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Get user ID from session
$student_id = (int)$_SESSION['id'];

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // —— 1) Prevent more than 3 pending requests ——
    $countSql = "
      SELECT COUNT(*) AS cnt
        FROM student_request
       WHERE student_id = $student_id
         AND status  = 'Pending'
    ";
    $countRes = mysqli_query($connection, $countSql);
    $countRow = mysqli_fetch_assoc($countRes);
    if ((int)$countRow['cnt'] >= 3) {
        echo "<script>
                alert('You cannot have more than 3 pending requests at once.');
                window.location.href = 'student_dashboard.php';
              </script>";
        exit();
    }

    // 2) Gather and sanitize form data
    $book_num    = mysqli_real_escape_string($connection, $_POST['book_num']);
    $book_name   = mysqli_real_escape_string($connection, $_POST['book_name']);
    $book_author = mysqli_real_escape_string($connection, $_POST['book_author']);

    // 3) Check availability
    $copies_query  = "
      SELECT no_copy 
        FROM dept_books 
       WHERE book_num = '$book_num'
    ";
    $copies_result = mysqli_query($connection, $copies_query);
    $copies_data   = mysqli_fetch_assoc($copies_result);

    if ($copies_data['no_copy'] <= 0) {
        echo "<script>
                alert('This book is currently not available (no copies left).');
                window.location.href='student_dashboard.php';
              </script>";
        exit();
    }

    // 4) Prevent duplicate requests for the same book
    $check_query  = "
      SELECT 1 
        FROM student_request 
       WHERE student_id = '$student_id' 
         AND book_num = '$book_num'
       LIMIT 1
    ";
    $check_result = mysqli_query($connection, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        echo "<script>
                alert('You have already requested this book.');
                window.location.href='student_dashboard.php';
              </script>";
        exit();
    }

    // 5) Insert the new request
    $insert_query = "
      INSERT INTO student_request
        (student_id, book_num, book_name, book_author, status)
      VALUES
        ('$student_id', '$book_num', '$book_name', '$book_author', 'Pending')
    ";
    if (mysqli_query($connection, $insert_query)) {
        echo "<script>
                alert('Book request submitted successfully!');
                window.location.href='student_dashboard.php';
              </script>";
    } else {
        echo "<script>
                alert('Error: Unable to submit request.');
                window.location.href='student_dashboard.php';
              </script>";
    }
}

mysqli_close($connection);
?>
