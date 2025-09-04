<?php
session_start();
?>
<?php
     function get_issue_count(){
     	    $connection = mysqli_connect("localhost","root","");
              $db=mysqli_select_db($connection,"lms");
              $issue_count="";
              $query = "select count(*) as issue_count from pro_issue_book where p_id=". $_SESSION['id'];
              $query_run = mysqli_query($connection, $query);
              while($row=mysqli_fetch_assoc($query_run)){
              	$user_count=$row['user_count'];
              }
              return($user_count);
     }
?>