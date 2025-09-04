<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Department Library Automation</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" />

  <style>
    html, body {
      height: 100%;
      margin: 0;
      font-family: "Segoe UI", Arial, sans-serif;
      background: linear-gradient(135deg, #eaf3fb 50%, #d6e6f8 50%);
    }

    .container-flex {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100%;
      padding: 2rem;
    }

    .left-section {
      flex: 1;
      max-width: 400px;
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 8px 24px rgba(0,0,0,0.1);
      padding: 2rem;
      margin-right: 10rem;
    }

    .card-header {
      font-size: 1.8rem;
      font-weight: bold;
      color: #1f4e79;
      margin-bottom: 1rem;
      text-align: center;
    }

    .logo {
      display: block;
      margin: 0 auto 1rem;
      width: 60px;
      height: 60px;
    }

    .left-section p {
      text-align: center;
      color: #555;
      margin-bottom: 2rem;
    }

    .btn-gradient {
  display: block;
  width: 100%;
  margin-bottom: 1rem;
  padding: 0.75rem;
  color: #fff;
  background: linear-gradient(#bde3fb, #92bcfa); /* Light blue gradient */
  border: none;
  border-radius: 50px; /* Oval shape */
  font-weight: 500;
  transition: opacity 0.3s;
  text-decoration: none;
  text-align: center;
}

.btn-gradient:hover {
  opacity: 0.9;
  background: linear-gradient(#6a92c8, #6a92c8);
  transform: scale(1.05); /* Slight zoom on hover */
 
}


    .btn-gradient:hover {
      opacity: 0.85;
    }

    .right-section {
      flex: 1;
      text-align: center;
    }

    .right-section img {
      max-width: 1000% !important;
      height: auto;
      max-height: 300%;
    }

    @media (max-width: 768px) {
      .container-flex {
        flex-direction: column;
        padding: 1rem;
      }

      .left-section {
        margin-right: 0;
        margin-bottom: 2rem;
      }
    }
    



  </style>
</head>
<body>

  <div class="container-flex" style="padding-left: 7em;">
    <!-- Left Section -->
    <div class="left-section">
      <div class="card-header">Computer Science Department Library</div>
      <img src="booklogo.png" alt="Library Logo" class="logo" />
      <p>Welcome to Computer Science Department Library Automation System</p>
      <a href="admin/index.php" class="btn-gradient">Admin Portal</a>
      <a href="professor/professor_login.php" class="btn-gradient">Professor Login</a>
      <a href="index.php" class="btn-gradient">Student Login</a>
    </div>

    <!-- Right Section -->
    <div class="right-section">
      <!-- Replace with your image -->
      <img src="bookbg1.avif" alt="Library Illustration" />
    </div>
  </div>

  <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
