<!DOCTYPE html>
<head>
   <title>PDF</title>
   <style >
      body{
         background-color: black;
      }
   </style>
</head>

</html>
<?php
   // error_reporting(0);
    require('functions.php');
    session_start();
    $connection=mysqli_connect("localhost","root","");
    $db=mysqli_select_db($connection,"lms");
    $book_isbn="";
    $query="select book_pdf from book where book_isbn='$_GET[bi]'";
    $query_run=mysqli_query($connection,$query);
    while($info = mysqli_fetch_assoc($query_run)){
        ?>
        <embed type="application/pdf" src="pdf/<?php echo $info['book_pdf']; ?>" width="1500" height="700">

        <?php
    }
?>