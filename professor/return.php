<?php
session_start();
$conn = mysqli_connect("localhost","root","","lms");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// 1) Ensure student is logged in
if (!isset($_SESSION['id'])) {
    header('Location: index.php');
    exit;
}
$p_id = (int)$_SESSION['id'];

// 2) Validate incoming issue_id
if (empty($_GET['issue_id'])) {
    $_SESSION['msg'] = "Invalid return request.";
    header('Location: view_issued_book.php');
    exit;
}
$issue_id = (int)$_GET['issue_id'];

// 3) Fetch that issued record and confirm it belongs to this professor / still Issued
$stmt = $conn->prepare("
    SELECT book_num
      FROM pro_issue_book
     WHERE issue_id    = ?
       AND p_id  = ?
       AND status      = 'Issued'
     LIMIT 1
");
$stmt->bind_param("ii", $issue_id, $p_id);
$stmt->execute();
$res = $stmt->get_result();

if ($res->num_rows === 0) {
    $_SESSION['msg'] = "No matching issued book found (or already returned).";
    header('Location: view_issued_book.php');
    exit;
}

$row     = $res->fetch_assoc();
$book_no = $row['book_num'];
$stmt->close();

// 4) Mark the book as returned
$u1 = $conn->prepare("
    UPDATE pro_issue_book
       SET status      = 'Returned',
           return_date = NOW()
     WHERE issue_id = ?
");
$u1->bind_param("i", $issue_id);
$ok1 = $u1->execute();
$u1->close();

// 5) Increase stock in dept_books
$u2 = $conn->prepare("
    UPDATE dept_books
       SET no_copy = no_copy + 1
     WHERE book_no = ?
");
$u2->bind_param("s", $book_no);
$ok2 = $u2->execute();
$u2->close();

// 6) Flash message & redirect
if ($ok1 && $ok2) {
    $_SESSION['msg'] = "Book successfully returned.";
} else {
    $_SESSION['msg'] = "Error processing return, please try again.";
}

header('Location: view_issued_book.php');
exit;
