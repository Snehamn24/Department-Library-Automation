<?php
// Include database connection
$conn = mysqli_connect("localhost", "root", "", "lms");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch today's date
$current_date = date('Y-m-d');

// 1. Query to get overdue books
$query = "SELECT * FROM stu_issue_book WHERE return_date < ? AND status = 'issued'";
$stmt  = $conn->prepare($query);
$stmt->bind_param("s", $current_date);
$stmt->execute();
$result = $stmt->get_result();

$fine_rate_per_day = 5; // ₹ per day

// 2. Loop through each overdue record
while ($row = $result->fetch_assoc()) {
    $student_id = $row['student_id'];
    $book_num     = $row['book_num'];
    $return_date  = $row['return_date'];

    // Calculate days late
    $days_late   = floor((strtotime($current_date) - strtotime($return_date)) / (60 * 60 * 24));
    $fine_amount = $days_late * $fine_rate_per_day;

    // 3. Lookup sno (book_id) from dept_books by book_num
    $lookup = $conn->prepare("SELECT sno FROM dept_books WHERE book_no = ?");
    $lookup->bind_param("s", $book_num);
    $lookup->execute();
    $lookup_result = $lookup->get_result();

    if ($lookup_row = $lookup_result->fetch_assoc()) {
        $book_id = $lookup_row['sno'];

        // 4. Check if a fine record already exists (unpaid)
        $chk = $conn->prepare("
            SELECT fine_id 
              FROM student_fines 
             WHERE student_id = ? 
               AND book_id      = ? 
               AND status       = 'unpaid'
        ");
        $chk->bind_param("ii", $professor_id, $book_id);
        $chk->execute();
        $chk_result = $chk->get_result();

        if ($chk_result->num_rows) {
            // 5a. Update existing fine
            $update = $conn->prepare("
                UPDATE student_fines
                   SET days_late     = ?,
                       fine_amount   = ?,
                       calculated_on = NOW()
                 WHERE student_id = ?
                   AND book_id      = ?
                   AND status       = 'unpaid'
            ");
            $update->bind_param("diii", $days_late, $fine_amount, $student_id, $book_id);
            $update->execute();
        } else {
            // 5b. Insert new fine record
            $insert = $conn->prepare("
                INSERT INTO student_fines 
                    (student_id, book_id, days_late, fine_amount, status, calculated_on)
                VALUES (?, ?, ?, ?, 'unpaid', NOW())
            ");
            $insert->bind_param("iiid", $student_id, $book_id, $days_late, $fine_amount);
            $insert->execute();
        }
        $chk->close();
    }
    $lookup->close();
}

// Clean up
$stmt->close();
$conn->close();

echo "Fine calculation/update completed for overdue books.";
?>
