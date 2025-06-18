<?php
require('config.php');
session_start();
$errormsg = "";

if (isset($_POST['email'])) {
  $email = mysqli_real_escape_string($con, stripslashes($_POST['email']));
  $password = mysqli_real_escape_string($con, stripslashes($_POST['password']));
  $query = "SELECT * FROM `users` WHERE email='$email' AND password='" . md5($password) . "'";
  $result = mysqli_query($con, $query) or die(mysqli_error($con));
  $rows = mysqli_num_rows($result);

  if ($rows == 1) {
    $_SESSION['email'] = $email;
    header("Location: index.php");
    exit();
  } else {
    $errormsg = "Incorrect email or password.";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login | Expense Tracker</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(135deg, #e0eafc, #cfdef3);
      font-family: 'Poppins', sans-serif;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .glass-card {
      background: rgba(255, 255, 255, 0.2);
      border-radius: 1rem;
      box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.2);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      border: 1px solid rgba(255, 255, 255, 0.18);
      padding: 3rem;
      max-width: 400px;
      width: 100%;
      animation: slideIn 0.8s ease forwards;
    }

    @keyframes slideIn {
      0% { transform: translateY(20px); opacity: 0; }
      100% { transform: translateY(0); opacity: 1; }
    }

    .glass-card h3 {
      font-weight: 600;
      text-align: center;
      margin-bottom: 10px;
      color: #343a40;
    }

    .glass-card p {
      text-align: center;
      color: #6c757d;
      margin-bottom: 30px;
    }

    .form-control {
      background: rgba(255, 255, 255, 0.6);
      border: none;
      border-radius: 0.5rem;
      padding: 0.75rem;
      margin-bottom: 1rem;
      transition: all 0.3s ease-in-out;
    }

    .form-control:focus {
      background: rgba(255, 255, 255, 0.8);
      box-shadow: 0 0 5px rgba(0, 123, 255, 0.4);
    }

    .btn-login {
      background-color: #28a745;
      border: none;
      border-radius: 0.5rem;
      padding: 0.75rem;
      color: white;
      font-weight: 500;
      transition: 0.3s;
    }

    .btn-login:hover {
      background-color: #218838;
    }

    .register-link {
      text-align: center;
      margin-top: 15px;
    }

    .register-link a {
      color: #d63384;
      text-decoration: none;
      font-weight: 500;
    }

    .alert {
      text-align: center;
      font-size: 0.9rem;
    }

  </style>
</head>
<body>
  <div class="glass-card">
    <h3>Welcome Back!</h3>
    <p>Login to your Expense Tracker</p>

    <?php if (!empty($errormsg)): ?>
      <div class="alert alert-danger py-2"><?php echo $errormsg; ?></div>
    <?php endif; ?>

    <form method="POST" autocomplete="off">
      <input type="email" name="email" class="form-control" placeholder="Email" required>
      <input type="password" name="password" class="form-control" placeholder="Password" required>
      <button type="submit" class="btn btn-login w-100">Login</button>
    </form>

    <div class="register-link">
      <p>Don't have an account? <a href="register.php">Register Here</a></p>
    </div>
  </div>

  <!-- Bootstrap Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
