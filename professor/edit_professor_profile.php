<?php
    session_start();
    $connection = mysqli_connect("localhost","root","");
              $db=mysqli_select_db($connection,"lms");
              $name="";
              $email="";
              //$id="";
              $mobile="";
              $address="";
              $query = "SELECT * FROM professor WHERE p_email = '$_SESSION[email]'";
              $query_run = mysqli_query($connection, $query);
              while($row=mysqli_fetch_assoc($query_run)){ 
                $name=$row['p_name'];
                $email=$row['p_email'];
                //$id=$row['p_idcard'];
                $mobile=$row['p_mobile'];
                $address=$row['p_address'];
            }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Library Management System (LMS)</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <!-- jQuery -->
    <script type="text/javascript" src="bootstrap-5.3.3-dist/js/jquery_latest.js"></script>
    <!-- Bootstrap JS -->
    <script type="text/javascript" src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style type="text/css">
       html, body {
            height: 100%;
            margin: 0;
            font-family: "Segoe UI", Arial, sans-serif;
            background: linear-gradient(135deg, #d6e6f8 50%, #d6e6f8 50%);
            /*background :rgba(216, 236, 247);*/
        }

        .navbar {
            background-color: #3a6ea5 !important; /* Deep Purple */
        }

        .navbar .nav-link,
        .navbar-brand,
        .navbar .text-white strong {
            color: #fff !important;
        }

        .main-container {
            display: flex;
            flex-direction: row;
            height: calc(100vh - 100px); /* Adjust for navbar + marquee */
            width: 100%;
        }
        .btn-primary
        {
           background: #3a6ea5;
           border: none;
           border-radius: 30px;
           padding: 12px 25px;
           font-size: 1.1em;
           margin: 10px 0;
           width: 30%;
          color: white;
          transition: 0.4s;
        }
        .btn-primary:hover {
      background: linear-gradient(to right, #3a6ea5, #3a6ea5);
      transform: scale(1.05);
      color: #f9f9f9;
  }
    </style> 
</head>
<body>
       <!-- Navbar -->
    
    <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <img src="../booklogo.png" alt="booklogo" class="img-fluid" style="height: 50px; width: 50px; padding-bottom: 5px;"> 
        &nbsp;&nbsp; 
        <a class="navbar-brand" href="professor_dashboard.php">Dashboard</a>
        
        <div class="d-flex align-items-center text-white ms-3">
            <strong>Welcome: <?php echo $_SESSION['name']; ?></strong>&nbsp;&nbsp;|&nbsp;&nbsp;
            <strong>Email: <?php echo $_SESSION['email']; ?></strong>&nbsp;&nbsp;|&nbsp;&nbsp;
            <strong>User-Id: <?php echo $_SESSION['id']; ?></strong>&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a class="nav-link d-flex align-items-center" href="professor_search.php" title="Search">
                <i class="bi bi-search" style="font-size: 1.2rem;"></i>&nbsp;
                Search 
            </a>
        </div>


        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <li class="nav-item">
   
   
</li>
            <ul class="navbar-nav align-items-center">
                <!-- Search Icon -->
        <li class="nav-item">
            
        </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="../person_icon.png" alt="Profile" style="height: 25px; width: 25px; margin-right: 5px;">
                        My Profile
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="view_professor_profile.php"><i class="bi bi-person-circle"></i>
                        View Profile</a></li>
                        <li><a class="dropdown-item" href="edit_professor_profile.php"><i class="bi bi-pen-fill"></i>
                        Edit Profile</a></li>
                        <li><a class="dropdown-item" href="change_professor_password.php"><i class="bi bi-key-fill"></i>
                        Change Password</a></li>
                        <li><a class="dropdown-item" href="professor_activity.php"><i class="bi bi-list-task"></i>
                        Activity</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center" href="../logout.php">
                        <i class="bi bi-box-arrow-right" style="font-size: 1.2rem; margin-right: 5px;"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
    <span><marquee>Department Library Automation. Library opens at 10:00 AM and closes at 4:00 PM</marquee></span><br><br>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form action="update_professor.php" method="post" onsubmit="return validateFunction();">
                <div class="form-group mb-3">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" value="<?php echo $name;?>" name="name" id="name"> 
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" value="<?php echo $email;?>" name="email" id="email"> 
                </div>
                
                <div class="form-group mb-3">
                    <label for="mobile">Mobile:</label>
                    <input type="text" class="form-control" value="<?php echo $mobile;?>" name="mobile" id="mobile"> 
                </div>
                <div class="form-group mb-3">
                    <label for="address">Address:</label>
                  <textarea rows="3" cols="40" id="address" name="address" class="form-control"><?php echo $address;?></textarea>
                </div>
                <button type="submit" name="update" class="btn btn-primary">Update</button>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>

    <script type="text/javascript">
        
        function validateFunction() {
            var name = document.getElementById("name").value;
            var regex = /^[A-Za-z\s]+$/;
            if (!regex.test(name)) {
                alert("Only alphabets and spaces are allowed in the Full Name field.");
                document.getElementById("name").value = "";
                return false;
            }

            var email = document.getElementById("email").value;
            var emailv = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            if (!emailv.test(email)) {
                alert("Invalid email");
                document.getElementById("email").value = "";
                return false;
            }

            var mobile = document.getElementById("mobile").value;
            var mobileRegex = /^(\+91)?[6-9]\d{9}$/;
            if (!mobileRegex.test(mobile)) {
                alert("Invalid mobile number! Enter a valid 10-digit number.");
                document.getElementById("mobile").value = "";
                return false;
            }

            var address = document.getElementById("address").value;
            var addressRegx = /^[a-zA-Z0-9\s,.-]{5,}$/;
            if (!addressRegx.test(address)) {
                alert("Invalid address");
                document.getElementById("address").value = "";
                return false;
            }

            return true;
        }


    </script>
</body>
</html>
