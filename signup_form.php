<!DOCTYPE html>
<html>
<head>
    <title>LMS</title>
    <meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1"> 
    <link rel="stylesheet" type="text/css" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <script type="text/javascript" src="bootstrap-5.3.3-dist/js/jquery_latest.js"></script> 
    <script type="text/javascript" src="bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
    <style type="text/css">
        html, body {
            height: 100%;
            margin: 0;
            font-family: "Segoe UI", Arial, sans-serif;
            background: linear-gradient(135deg, #eaf3fb 50%, #d6e6f8 50%);
        }

        .btn-custom {
            width: 20%;
            padding: 10px;
            background: linear-gradient(90deg, #3a6ea5, #30597c);
            color: white;
            border: none;
            border-radius: 8px;
            transition: 0.4s;
        }

        .btn-custom:hover {
            background: linear-gradient(#77a6c0, #6a92c9);
            transform: scale(1.05);
            color: #f9f9f9;
        }

        h3 {
            font-weight: bold;
            font-size: 2em;
            margin-bottom: 20px;
            color: #30597c;
            text-align: center;
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

        .logo1 {
            font-weight: bold;
            margin-bottom: 20px;
            color: #61678b;
            text-decoration: underline;
            margin-top: 10px;
        }

        .marquee {
            font-weight: bold;
        }

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg custom-navbar">
        <div class="container-fluid">
            <img src="booklogo.png" alt="booklogo" class="img-fluid" style="height: 50px; width: 50px; padding-bottom: 5px;"> 
            &nbsp;&nbsp; 
            <a class="navbar-brand" href="index.php">Department Library Automation</a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link home-icon" href="admin/admin_dashboard.php">
                        <i class="bi bi-house-door-fill fs-4"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="d-flex justify-content-center align-items-center" style="min-height: calc(100vh - 80px); padding: 20px;">
        <div class="col-md-10 p-4 rounded d-flex align-items-center" style="background-color: #ffffff; border: 2px solid #ffffff; box-shadow: 0 0 20px rgba(0,0,0,0.1);">

            <!-- Left side: Image -->
            <div class="col-md-5 text-center" style="background-color: white;">
                <img src="sign_up.png" alt="Registration Icon" class="img-fluid" style="max-height: 500px;max-width: 500px;">
            </div>

            <!-- Right side: Form -->
            <div class="col-md-7 ps-4" style="background-color: white;">
                <h3>
                    <img src="sign_in.png" alt="icon" style="height: 31px; width: 30px; margin-right: 10px;">
                    Student Registration Form
                </h3>
                <form action="register_btn.php" method="post" onsubmit="return validateFunction();">
                    <div class="form-group mb-2">
                        <label for="name"><i class="bi bi-person-fill me-2"></i> Full Name:</label>
                        <input type="text" id="name" name="name" class="form-control form-control-sm" required>
                    </div>

                    <div class="form-group mb-2">
                        <label for="uucms"><i class="bi bi-person-fill me-2"></i> UUCMS ID:</label>
                        <input type="text" id="uucms" name="uucms" class="form-control form-control-sm" required>
                    </div>

                    <div class="form-group mb-2">
                        <label for="email"><i class="bi bi-envelope-fill"></i> Email ID:</label>
                        <input type="text" id="email" name="email" class="form-control form-control-sm" required>
                    </div>

                    <div class="form-group mb-2">
                        <label for="password"><i class="bi bi-lock-fill"></i> Password:</label>
                        <div class="input-group input-group-sm">
                            <input type="password" id="password" name="password" class="form-control" required>
                            <span class="input-group-text">
                                <i class="bi bi-eye-slash" id="togglePassword" style="cursor: pointer;"></i>
                            </span>
                        </div>
                    </div>    

                    <div class="form-group mb-2">
                        <label for="mobile"><i class="bi bi-telephone-fill me-2"></i> Mobile number:</label>
                        <input type="text" id="mobile" name="mobile" class="form-control form-control-sm" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="address"><i class="bi bi-house-door-fill me-2"></i> Address:</label>
                        <textarea rows="2" class="form-control form-control-sm" name="address" id="address" required></textarea>
                    </div>

                    <div class="d-flex gap-3">
                        <button type="submit" class="btn btn-custom">Register</button>
                        <!--<a class="logo1" href="index.php">Login</a>-->
                    </div>
                </form>
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

            var password = document.getElementById("password").value;
            var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{5,}$/;
            if (!passwordRegex.test(password)) {
                alert("Password should be of minimum 5 characters with uppercase, lowercase, number and special character.");
                document.getElementById("password").value = "";
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
