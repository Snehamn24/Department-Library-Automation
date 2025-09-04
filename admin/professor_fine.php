<?php
$conn = mysqli_connect("localhost", "root", "", "lms");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$current_date = date('Y-m-d');
$query = "SELECT * FROM pro_issue_book WHERE return_date < ? AND status = 'issued'";
$stmt  = $conn->prepare($query);
$stmt->bind_param("s", $current_date);
$stmt->execute();
$result = $stmt->get_result();

$fine_rate_per_day = 5;

while ($row = $result->fetch_assoc()) {
    $professor_id = $row['p_id'];
    $book_num     = $row['book_num'];
    $return_date  = $row['return_date'];

    //  Step 1: Check if professor exists
    $checkProf = $conn->prepare("SELECT * FROM professor WHERE p_id = ?");
    $checkProf->bind_param("i", $professor_id);
    $checkProf->execute();
    $profResult = $checkProf->get_result();

    if ($profResult->num_rows === 0) {
        // If professor not found, skip
        continue;
    }

    $days_late   = floor((strtotime($current_date) - strtotime($return_date)) / (60 * 60 * 24));
    $fine_amount = $days_late * $fine_rate_per_day;

    //  Step 2: Get book_id from dept_books
    $lookup = $conn->prepare("SELECT sno FROM dept_books WHERE book_no = ?");
    $lookup->bind_param("s", $book_num);
    $lookup->execute();
    $lookup_result = $lookup->get_result();

    if ($lookup_row = $lookup_result->fetch_assoc()) {
        $book_id = $lookup_row['sno'];

        //  Step 3: Check if fine already exists
        $chk = $conn->prepare("SELECT fine_id FROM professor_fines WHERE professor_id = ? AND book_id = ? AND status = 'unpaid'");
        $chk->bind_param("ii", $professor_id, $book_id);
        $chk->execute();
        $chk_result = $chk->get_result();

        if ($chk_result->num_rows > 0) {
            // Update existing fine
            $update = $conn->prepare("UPDATE professor_fines SET days_late = ?, fine_amount = ?, calculated_on = NOW() WHERE professor_id = ? AND book_id = ? AND status = 'unpaid'");
            $update->bind_param("diii", $days_late, $fine_amount, $professor_id, $book_id);
            $update->execute();
        } else {
            //  Insert new fine
            $insert = $conn->prepare("INSERT INTO professor_fines (professor_id, book_id, days_late, fine_amount, status, calculated_on) VALUES (?, ?, ?, ?, 'unpaid', NOW())");
            $insert->bind_param("iiid", $professor_id, $book_id, $days_late, $fine_amount);
            $insert->execute();
        }

        $chk->close();
    }

    $lookup->close();
    $checkProf->close();
}

$stmt->close();
$conn->close();

echo "Fine calculation/update completed successfully.";
?>
