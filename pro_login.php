<!DOCTYPE html>
<html>
<head>
	<!-- <meta charset="utf-8"> -->
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
	<title>LMS</title>
	<meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1"> 
	<link rel="stylesheet" type="text/css" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
	<!-- Bootstrap Icons (Include in <head> if not already added) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
  	<script type="text/javascript" src="bootstrap-5.3.3-dist/js/jquery_latest.js"></script> 
  	<script type="text/javascript" src="bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
  	<style type="text/css">
  		#side-bar{
  			background-color: lightblue;
  			padding: 50px;
  			width:300px;
  			height: 450px;

  		}
  		body {
        background-image: url('bookbackground1.jpg'); /* Path to your image */
        background-color: #F7F9F0;
        background-size: cover; /* Cover full screen */
        background-position: center; /* Center the image */
        background-repeat: no-repeat; /* No repeating */
        height: 100vh; /* Full viewport height */

    }

  	</style> 
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">Library Management System</a>
				
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li class="nav-item">
					<a class="nav-link" href="admin/index.php">Admin Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="pro_index.php">Professor Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="index.php">Student Login</a>
				</li>
				
			</ul>
			
		</div>
	</nav><br>
	<span> <marquee> This is library management system . Library opens at 8:00 AM and close at 8:00 PM</marquee> </span><br><br>
	<div class="row">
		<!-- <div class="col-md-8" id="side-bar">
			  <div class="col-md-8 mx-auto p-4 border bg-light" id="side-bar"> 
			 <h5>Library Timing</h5>
			<ul>
				<li>
					Opening Timing : 8:00 AM
				</li>
				<li>Closing Timing : 8:00 PM</li>
				<li>Sunday Off</li>

			</ul>
			<h5>what we provide</h5>
			<ul>
				<li>
					Internet access
				</li>
				<li>News papers</li>
				<li>Magazines</li>
				<li>Discussion Room</li>
				<li>e library</li>
				<li>bibligraphy</li>

			</ul>
		</div> 
		 <div class="col-md-10" id="main_content"> -->
		 	
  <div class="d-flex justify-content-center align-items-center">
    <div class="col-md-8 bg-light p-4 rounded shadow">
		<center><h3>Student Login Form</h3></center>
		<form action="" method="post" onsubmit="return validateFunction();">
				
				<div class="form-group">
					<label for="email">Email ID:</label>
					<input type="text" id="email" name="email" class="form-control" required>
				</div>
				<!--<div class="form-group">
					<label for="password">Password:</label>
					<input type="password" id="password" name="password" class="form-control" required>
				</div>-->
				<div class="form-group">
               <label for="password">Password:</label>
               <div class="input-group">
                <input type="password" id="password" name="password" class="form-control" required>
                <span class="input-group-text">
            <i class="bi bi-eye-slash" id="togglePassword" style="cursor: pointer;"></i>
               </span>
           </div>
       </div>
       <button type="submit" name="login" class="btn btn-primary">Login</button> |
				<a href="signup_form.php"> Not registered yet ?</a>	
			</form>
           <?php
            session_start();

           if (isset($_POST['login'])) {
           $connection = mysqli_connect("localhost", "root", "");
           $db = mysqli_select_db($connection, "lms");

          if ($connection && $db) {
          // Sanitize the email input
          $email = mysqli_real_escape_string($connection, $_POST['email']);
          $password = $_POST['password']; // Capture password for comparison

         // Query to check for email existence
         $query = "SELECT * FROM user WHERE email = '$email'";
         $query_run = mysqli_query($connection, $query);

        if (mysqli_num_rows($query_run) > 0) {
            $row = mysqli_fetch_assoc($query_run);

            // Check if the password matches
            if ($password == $row['password']) {
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['id'] = $row['id'];
                header("Location: user_dashboard.php");
            } else {
                echo '<br><br><center><span class="alert-danger">Wrong Password</span></center>';
            }
        } else {
            // Incorrect email case
            echo '<br><br><center><span class="alert-danger">Incorrect Email</span></center>';
        }
    } else {
        echo '<br><br><center><span class="alert-danger">Database Connection Failed</span></center>';
    }
}
?>
    </div>
	</div>

		
	</div>

	</div>
	<script type="text/javascript">
     document.getElementById("togglePassword").addEventListener("click", function () {
    let passwordField = document.getElementById("password");
    let icon = this;
    
    if (passwordField.type === "password") {
        passwordField.type = "text";
        icon.classList.remove("bi-eye-slash");
        icon.classList.add("bi-eye");
    } else {
        passwordField.type = "password";
        icon.classList.remove("bi-eye");
        icon.classList.add("bi-eye-slash");
    }
});
    
</script>

</body>
</html>