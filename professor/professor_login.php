<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>LMS</title>
    <meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1"> 
    <link rel="stylesheet" type="text/css" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript" src="bootstrap-5.3.3-dist/js/jquery_latest.js"></script> 
    <script type="text/javascript" src="bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>

    <style>
        html, body {
            height: 100%;
            margin: 0;
            font-family: "Segoe UI", Arial, sans-serif;
            background: linear-gradient(135deg, #eaf3fb 50%, #d6e6f8 50%);
        }

        .custom-navbar {
            background: linear-gradient(90deg, #3a6ea5, #30597c);
            transition: background 0.5s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: bold;
            color: #ffffff !important;
        }

        .home-icon i {
            color: #ffffff;
            transition: transform 0.3s ease;
        }

        .home-icon i:hover {
            transform: scale(1.2);
            color: #f0f0ff;
        }

        #card-home {
            max-width: 850px;
            margin: 50px auto;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
            overflow: hidden;
            display: flex;
            flex-wrap: wrap;
        }

        .card-left {
            flex: 1;
            min-width: 300px;
            background-color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
        }

        .card-left img {
            max-width: 100%;
            height: auto;
        }

        .card-right {
            flex: 1;
            min-width: 300px;
            background-color: white;
            padding: 40px;
        }

        .card-right h3 {
            color: #30597c;
            font-weight: bold;
        }

        .form-control {
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .input-group-text {
            background-color: #eaf3fb;
            border-radius: 0 8px 8px 0;
        }

        .btn-custom {
            width: 100%;
            padding: 10px;
            background: linear-gradient(90deg, #3a6ea5, #30597c);
            color: white;
            border: none;
            border-radius: 8px;
            transition: 0.4s;
        }

        .btn-custom:hover {
            opacity: 0.9;
            background: linear-gradient(#77a6c0, #6a92c9);
            transform: scale(1.02);
        }

        .logo1 {
            display: block;
            text-align: center;
            margin-top: 15px;
            text-decoration: underline;
            color: #3a6ea5;
        }

        marquee {
            font-weight: bold;
            color: #30597c;
        }
        .input-group-text {
    background-color: #eaf3fb;
    border-radius: 0 8px 8px 0;
    padding: 0.375rem 0.75rem; /* Match Bootstrap input height */
    display: flex;
    align-items: center;
    height: 100%;
}

    </style> 
</head>
<body>

<nav class="navbar navbar-expand-lg custom-navbar">
  <div class="container-fluid">
    <img src="../booklogo.png" alt="booklogo" class="img-fluid" style="height: 50px; width: 50px;"> 
    &nbsp;&nbsp; 
    <a class="navbar-brand" href="professor_login.php">Department Library Automation</a>
    <ul class="navbar-nav ms-auto">
      <li class="nav-item">
        <a class="nav-link home-icon" href="../home.php">
          <i class="bi bi-house-door-fill fs-4"></i>
        </a>
      </li>
    </ul>
  </div>
</nav>

<span><marquee>This is Department Library Automation System. Library opens at 10:00 AM and closes at 4:00 PM.</marquee></span>

<div id="card-home">
  <div class="card-left">
    <img src="../teacher.png" alt="Student Illustration">
  </div>

  <div class="card-right">
    <center class="logo"><h3>Professor Login Form</h3></center>
    <form action="" method="post" onsubmit="return validateFunction();">
      <div class="form-group">
        <label for="email"><i class="bi bi-envelope-fill"></i> Email ID:</label>
        <input type="text" id="email" name="email" class="form-control" required>
      </div>

      <div class="form-group">
        <label for="password"><i class="bi bi-lock-fill"></i> Password:</label>
        <div class="input-group">
          <input type="password" id="password" name="password" class="form-control" required>
          <span class="input-group-text">
            <i class="bi bi-eye-slash" id="togglePassword" style="cursor: pointer;"></i>
          </span>
        </div>
      </div>

      <button type="submit" name="login" class="btn btn-custom">Login</button>
      <a class="logo1" href="../home.php">Home</a>
    </form>

    <?php
    if (isset($_POST['login'])) {
        $connection = mysqli_connect("localhost", "root", "");
        $db = mysqli_select_db($connection, "lms");

        if ($connection && $db) {
            $email = mysqli_real_escape_string($connection, $_POST['email']);
            $password = $_POST['password'];

            $query = "SELECT * FROM professor WHERE p_email = '$email'";
            $query_run = mysqli_query($connection, $query);

            if (mysqli_num_rows($query_run) > 0) {
                $row = mysqli_fetch_assoc($query_run);
                if ($password == $row['p_pass']) {
                    $_SESSION['name'] = $row['p_name'];
                    $_SESSION['email'] = $row['p_email'];
                    $_SESSION['id'] = $row['p_id'];
                    header("Location: professor_dashboard.php");
                } else {
                    echo '<br><br><center><span class="alert-danger">Wrong Password</span></center>';
                }
            } else {
                echo '<br><br><center><span class="alert-danger">Incorrect Email</span></center>';
            }
        } else {
            echo '<br><br><center><span class="alert-danger">Database Connection Failed</span></center>';
        }
    }
    ?>
  </div>
</div>

<script>
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
