<?php
session_start();
function get_user_issue_book_count() {
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, "lms");
    $user_issue_book_count = 0;
    $query = "SELECT COUNT(*) AS user_issue_book_count FROM issued_books WHERE user_id=" . $_SESSION['id'];
    $query_run = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($query_run)) {
        $user_issue_book_count = $row['user_issue_book_count'];
    }
    return $user_issue_book_count;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Library Management System (LMS)</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        html, body {
            height: 100%;
            margin: 0;
            font-family: "Segoe UI", Arial, sans-serif;
            background: linear-gradient(135deg, #d6e6f8 50%, #d6e6f8 50%);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            table-layout: fixed;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
            word-wrap: break-word;
        }
        th {
            background-color: #f2f2f2;
        }
        img {
            width: 100px;
            height: auto;
        }
        .btn-primary {
            background: #3a6ea5;
            border: none;
            font-size: 1.1em;
            color: white;
            transition: 0.4s;
        }
        .navbar {
            background-color: #3a6ea5 !important;
        }
        .navbar .nav-link,
        .navbar-brand,
        .navbar .text-white strong {
            color: #fff !important;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <img src="booklogo.png" alt="booklogo" class="img-fluid" style="height: 50px; width: 50px;"> 
        &nbsp;&nbsp; 
        <a class="navbar-brand" href="student_dashboard.php">Dashboard</a>

        <div class="d-flex align-items-center text-white ms-3">
            <strong>Welcome: <?php echo $_SESSION['name']; ?></strong>&nbsp;&nbsp;|&nbsp;&nbsp;
            <strong>Email: <?php echo $_SESSION['email']; ?></strong>&nbsp;&nbsp;|&nbsp;&nbsp;
            <strong>User-Id: <?php echo $_SESSION['id']; ?></strong>&nbsp;&nbsp;&nbsp;&nbsp;
            <a class="nav-link d-flex align-items-center" href="professor_search.php" title="Search">
                <i class="bi bi-search" style="font-size: 1.2rem;"></i>&nbsp;Search 
            </a>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                        <img src="person_icon.png" alt="Profile" style="height: 25px; width: 25px; margin-right: 5px;"> My Profile
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="view_profile.php"><i class="bi bi-person-circle"></i> View Profile</a></li>
                        <li><a class="dropdown-item" href="edit_profile.php"><i class="bi bi-pen-fill"></i> Edit Profile</a></li>
                        <li><a class="dropdown-item" href="change_password.php"><i class="bi bi-key-fill"></i> Change Password</a></li>
                        <li><a class="dropdown-item" href="student_activity.php"><i class="bi bi-list-task"></i> Activity</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center" href="logout.php">
                        <i class="bi bi-box-arrow-right" style="font-size: 1.2rem; margin-right: 5px;"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<span><marquee>Department Library Automation. Library opens at 10:00 AM and closes at 4:00 PM</marquee></span><br><br>

<div class="container mt-4">
    <!-- Searchable Dropdown -->
    <form action="" method="POST">
        <div class="input-group mb-3">
            <select class="form-select" id="bookDropdown" name="search" style="width: 100%;" required>
                <option value="">-- Search or Select a Book --</option>
                <?php
                $connection = mysqli_connect("localhost", "root", "");
                $db = mysqli_select_db($connection, "lms");
                $query = "SELECT * FROM dept_books ORDER BY book_name";
                $query_run = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($query_run)) {
                    $selected = (isset($_POST['search']) && $_POST['search'] == $row['book_name']) ? "selected" : "";
                    echo "<option value='" . $row['book_name'] . "' $selected>" . $row['book_name'] . " by " . $row['book_author'] . "</option>";
                }
                ?>
            </select>
           <button type="submit" class="btn btn-primary" style="margin-left: 10px; margin-top: 4px;">Search</button>
        </div>
    </form>

    <!-- Result Table -->
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Book Image</th>
                    <th>Book Number</th>
                    <th>Book Name</th>
                    <th>Book Author</th>
                    <th>Book Category</th>
                    <th>Book ISBN</th>
                    <th>Number of Copies</th>
                    <th>Request Book</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_POST['search'])) {
                    $bookName = $_POST['search'];
                    $query = "SELECT * FROM dept_books WHERE book_name LIKE '%$bookName%'";
                    $result = mysqli_query($connection, $query);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $imageUrl = "admin/image/" . $row['book_image'];
                            ?>
                            <tr>
                                <td><img src="<?= $imageUrl ?>" alt="<?= $row['book_name'] ?>"></td>
                                <td><?= $row['book_no']; ?></td>
                                <td><?= $row['book_name']; ?></td>
                                <td><?= $row['book_author']; ?></td>
                                <td><?= $row['book_category']; ?></td>
                                <td><?= $row['book_isbn']; ?></td>
                                <td><?= $row['no_copy']; ?></td>
                                <td>
                                    <form action="student_request.php" method="POST">
                                        <input type="hidden" name="book_no" value="<?= $row['book_no']; ?>">
                                        <input type="hidden" name="book_name" value="<?= $row['book_name']; ?>">
                                        <input type="hidden" name="book_author" value="<?= $row['book_author']; ?>">
                                        <input type="hidden" name="book_cat" value="<?= $row['book_category']; ?>">
                                        <input type="hidden" name="book_isbn" value="<?= $row['book_isbn']; ?>">
                                        <button class="btn btn-primary">Request Book</button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo "<tr><td colspan='8'>No Record Found</td></tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- jQuery + Bootstrap + Select2 Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('#bookDropdown').select2({
            placeholder: "-- Search or Select a Book --",
            allowClear: true,
            language: {
                noResults: function() {
                    return "No matching books found";
                }
            }
        });
    });
</script>

</body>
</html>
