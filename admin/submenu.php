<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Submenu</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <ul class="nav navbar-nav navbar-center">
                <li class="nav-item">
                    <a href="admin_dashboard.php" class="nav-link">Dashboard</a>
                </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="bookDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        E-Books
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="bookDropdown">
                        <li><a class="dropdown-item" href="add_books.php">Add New E-Book</a></li>
                        <li><a class="dropdown-item" href="manage_book.php">Manage E-Books</a></li>
                    </ul>
                </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="categoryDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Category
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="categoryDropdown">
                        <li><a class="dropdown-item" href="add_category.php">Add New Category</a></li>
                        <li><a class="dropdown-item" href="manage_category.php">Manage Category</a></li>
                    </ul>
                </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="categoryDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Department Books
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="categoryDropdown">
                        <li><a class="dropdown-item" href="add_deptbooks.php">Add Dept. Books</a></li>
                        <li><a class="dropdown-item" href="manage_deptbooks.php">Manage Dept. Books</a></li>
                    </ul>
                </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                
                    
               
            </ul>
        </div>
    </nav>

</body>
</html>