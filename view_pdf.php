<?php
    error_reporting(0);
    session_start();
    $connection = mysqli_connect("localhost", "root", "", "lms");
    
    if (!$connection) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    $book_isbn = "";
    $query = "SELECT book_pdf FROM book WHERE book_id='$_GET[bi]'";
    $query_run = mysqli_query($connection, $query);
    $info = mysqli_fetch_assoc($query_run);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View PDF with Notes</title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <style>
        .container {
            display: flex;
            height: 100vh;
        }
        .pdf-viewer {
            flex: 2;
            border-right: 2px solid #ccc;
        }
        body{
         background-color: black;
        }
        
    </style>
</head>
<body>

    <!-- PDF Viewer Section -->
    <div class="pdf-viewer">
        <!--<embed type="application/pdf" src="admin/pdf/<?php echo $info['book_pdf']; ?>#toolbar=0" width="100%" height="100%">-->
         <embed type="application/pdf" src="admin/pdf/<?php echo $info['book_pdf']; ?>" width="1500" height="700">   
    </div>


</body>
</html>

