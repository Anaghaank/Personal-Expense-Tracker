<?php
require('config.php');
if (isset($_POST['firstname'])) {
  if ($_POST['password'] == $_POST['confirm_password']) {
    $firstname = mysqli_real_escape_string($con, stripslashes($_POST['firstname']));
    $lastname = mysqli_real_escape_string($con, stripslashes($_POST['lastname']));
    $email = mysqli_real_escape_string($con, stripslashes($_POST['email']));
    $password = mysqli_real_escape_string($con, stripslashes($_POST['password']));

    $query = "INSERT INTO `users` (firstname, lastname, password, email)
              VALUES ('$firstname','$lastname', '" . md5($password) . "', '$email')";
    $result = mysqli_query($con, $query);
    if ($result) {
      header("Location: login.php");
      exit();
    }
  } else {
    echo "<script>alert('Error: Passwords do not match');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register | Volunteer Platform</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <!-- Custom CSS -->
  <!-- Custom Enhanced CSS -->
<style>
  body {
    background: linear-gradient(135deg, #e0eafc, #cfdef3);
    font-family: 'Inter', sans-serif;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    margin: 0;
  }

  .card {
    background: rgba(255, 255, 255, 0.85);
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    padding: 40px;
    width: 100%;
    max-width: 480px;
    backdrop-filter: blur(10px);
    transition: all 0.3s ease;
  }

  .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 16px 40px rgba(0, 0, 0, 0.15);
  }

  h3 {
    font-weight: 600;
    color: #333;
  }

  .form-control {
    border-radius: 12px;
    padding: 10px 14px;
    font-size: 15px;
    border: 1px solid #ced4da;
    transition: 0.2s ease;
  }

  .form-control:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.15rem rgba(13, 110, 253, 0.25);
  }

  .btn-primary {
    border-radius: 30px;
    padding: 10px;
    font-weight: 600;
    transition: background 0.3s;
  }

  .btn-primary:hover {
    background-color: #084298;
  }

  .form-icon {
    position: absolute;
    right: 16px;
    top: 50%;
    transform: translateY(-50%);
    color: #adb5bd;
    pointer-events: none;
  }

  .text-muted a {
    color: #0d6efd;
    text-decoration: none;
  }

  .text-muted a:hover {
    text-decoration: underline;
  }

  .alert {
    margin-bottom: 20px;
    border-radius: 12px;
  }
</style>

<body>
  <div class="container">
    <div class="card mx-auto">
      <h3 class="text-center mb-4">Create Your Account</h3>

      <?php if (!empty($message)): ?>
        <div class="alert alert-danger text-center"><?php echo $message; ?></div>
      <?php endif; ?>

      <form method="POST" action="">
        <div class="row g-3">
          <div class="col-md-6">
            <input type="text" class="form-control" name="firstname" placeholder="First Name" required>
          </div>
          <div class="col-md-6">
            <input type="text" class="form-control" name="lastname" placeholder="Last Name" required>
          </div>
        </div>

        <div class="mt-3">
          <input type="email" class="form-control" name="email" placeholder="Email Address" required>
        </div>

        <div class="mt-3">
          <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
        </div>

        <div class="mt-3">
          <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required>
        </div>

        <div class="mt-4 d-grid">
          <button type="submit" class="btn btn-primary">Register</button>
        </div>

        <div class="text-center mt-3 text-muted">
          Already have an account? <a href="login.php">Login here</a>
        </div>
      </form>
    </div>
  </div>
</body>

</html>
