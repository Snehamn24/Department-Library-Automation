<?php
     function get_user_count(){
     	        $connection = mysqli_connect("localhost","root","");
              $db=mysqli_select_db($connection,"lms");
              $user_count="";
              $query = "select count(*) as user_count from student";
              $query_run = mysqli_query($connection, $query);
              while($row=mysqli_fetch_assoc($query_run)){
              	$user_count=$row['user_count'];
              }
              return($user_count);
     }
     function get_book_count(){
     	      $connection = mysqli_connect("localhost","root","");
              $db=mysqli_select_db($connection,"lms");
              $book_count="0";
              $query = "select count(*) as book_count from book";
              $query_run = mysqli_query($connection, $query);
              while($row=mysqli_fetch_assoc($query_run)){
              	$book_count=$row['book_count'];
              }
              return($book_count);
     }
     function get_category_count(){
     	      $connection = mysqli_connect("localhost","root","");
              $db=mysqli_select_db($connection,"lms");
              $cat_count="";
              $query = "select count(*) as cat_count from users";
              $query_run = mysqli_query($connection, $query);
              while($row=mysqli_fetch_assoc($query_run)){
              	$category_count=$row['cat_count'];
              }
              return($cat_count);
     }
     function get_author_count(){
     	      $connection = mysqli_connect("localhost","root","");
              $db=mysqli_select_db($connection,"lms");
              $author_count="";
              $query = "select count(*) as author_count from user";
              $query_run = mysqli_query($connection, $query);
              while($row=mysqli_fetch_assoc($query_run)){
              	$category_count=$row['author_count'];
              }
              return($author_count);
     }
     function get_issued_book_count(){
     	     $connection = mysqli_connect("localhost","root","");
              $db=mysqli_select_db($connection,"lms");
              $issued_book_count="";
              $query = "select count(*) as issued_book_count from issued_books";
              $query_run = mysqli_query($connection, $query);
              while($row=mysqli_fetch_assoc($query_run)){
              	$category_count=$row['issued_book_count'];
              }
              return($issued_book_count);
     }
    
    function get_department_book_count(){
              $connection = mysqli_connect("localhost","root","");
              $db=mysqli_select_db($connection,"lms");
              $dept_book_count="";
              $query = "select count(*) as dept_book_count from dept_books";
              $query_run = mysqli_query($connection, $query);
              while($row=mysqli_fetch_assoc($query_run)){
               $dept_book_count=$row['dept_book_count'];
              }
              return($dept_book_count);
     }
      function get_professor_count(){
              $connection = mysqli_connect("localhost","root","");
              $db=mysqli_select_db($connection,"lms");
              $professor_count="";
              $query = "select count(*) as professor_count from professor";
              $query_run = mysqli_query($connection, $query);
              while($row=mysqli_fetch_assoc($query_run)){
               $professor_count=$row['professor_count'];
              }
              return($professor_count);
     }
   
     function get_deptrequest_count(){
              $connection = mysqli_connect("localhost","root","");
              $db=mysqli_select_db($connection,"lms");
              $request_count="";
              $query = "select count(*) as request_count from pro_book_requests where status != 'Approved'";
              $query_run = mysqli_query($connection, $query);
              while($row=mysqli_fetch_assoc($query_run)){
               $request_count=$row['request_count'];
              }
              return($request_count);
     }
      
   
       function get_deptissue_count(){
              $connection = mysqli_connect("localhost","root","");
              $db=mysqli_select_db($connection,"lms");
              $deptissue_count="";
              $query = "select count(*) as deptissue_count from pro_issue_book";
              $query_run = mysqli_query($connection, $query);
              while($row=mysqli_fetch_assoc($query_run)){
               $deptissue_count=$row['deptissue_count'];
              }
              return($deptissue_count);
     }
    

      function get_studentrequest_count(){
              $connection = mysqli_connect("localhost","root","");
              $db=mysqli_select_db($connection,"lms");
              $stu_request_count="";
              $query = "select count(*) as stu_request_count from student_request where status !='Approved'";
              $query_run = mysqli_query($connection, $query);
              while($row=mysqli_fetch_assoc($query_run)){
               $stu_request_count=$row['stu_request_count'];
              }
              return($stu_request_count);
     }

?>