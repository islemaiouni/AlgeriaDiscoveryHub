<?php
require_once('functions.php');
require 'header.php';

if (isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}

if (isset($_POST['register_btn'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];

    // Check if the username is numeric
    if (is_numeric($username)) {
        $_SESSION['errors'][] = "Username must be a string, not a number.";
        header('Location: register.php');
        exit();
    }

    // Register user and handle registration status
    $registration_status = registerUser();

    if ($registration_status === true) {
        // Log in the user automatically after successful registration
        loginUser($username, $password_1);
        header('Location: index.php');
        exit();
    } else {
        // Store errors in session and redirect back to registration form
        $_SESSION['errors'] = $registration_status;
        header('Location: register.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AlgeriaDiscoveryHub - Register</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">

    <style>
        .min-vh-100 {
            min-height: 100vh;
        }
        .bg-dark { 
            background-color: #343a40 !important; 
        }
        .text-muted { 
            color: #6c757d !important; 
        }
        .rounded-md {
            border-radius: 0.375rem;
        }
        .btn-custom-primary {
            background-color: #0d6efd;
            color: #fff;
            border: none;
        }
        .btn-custom-primary:hover {
            background-color: #0b5ed7;
        }
        .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }
        .containerq {
            max-width: 400px;
           
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
            width: 100%;
            padding-right: 0px;
            padding-left: 15px;
            margin-right: auto;
            margin-top: 6rem;
            margin: 20rem auto;
            margin-left: auto;
            
        }
        .website-header {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
        }
        .website-name {
            font-family: 'Arial', sans-serif;
            font-size: 24px;
            color: #333;
            margin-left: 10px;
        }
        .description {
            font-size: 14px;
            text-align: center;
            color: #666;
        }
        .icon-algeria img {
            width: 20px;
            height: auto;
        }
        .image-container img {
            position: absolute;
            margin-top: 4rem;
            margin-left: 18px;
            top: 0;
            left: 0;
            right: 0;
            height: 92%;
            width: 100%;
            object-fit: cover;
        }
        .cont{
            margin-top: 3rem;
      
            
        }
    </style>
</head>
<body class="bg-light text-dark">
  <div class=" containerq-fluid min-vh-100 d-flex">
    <div class="row w-100">
      <div class="cont col-lg-6 d-flex justify-content-center align-items-center bg-light p-5">
        <div class="w-100" style="max-width: 400px;">
          <div class="text-center mb-4">
            <h1 class="h3 mb-3 fw-bold">Join Us Today!</h1>
            <p class="text-muted">Explore the treasures of Algeria, one site at a time with the best trips and experiences.</p>
          </div>
          <form method="post" action="register.php">
            <?php if (isset($_SESSION['errors'])): ?>
                <div class="alert alert-danger">
                    <?php
                    foreach ($_SESSION['errors'] as $error) {
                        echo '<p>' . htmlspecialchars($error) . '</p>';
                    }
                    unset($_SESSION['errors']);
                    ?>
                </div>
            <?php endif; ?>
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" id="username" name="username" value="<?php echo isset($username) ? htmlspecialchars($username) : ''; ?>" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" required>
            </div>
            <div class="mb-3">
              <label for="password_1" class="form-label">Password</label>
              <input type="password" class="form-control" id="password_1" name="password_1" required>
            </div>
            <div class="mb-3">
              <label for="password_2" class="form-label">Confirm Password</label>
              <input type="password" class="form-control" id="password_2" name="password_2" required>
            </div>
            <button type="submit" class="btn btn-primary w-100" name="register_btn">Register</button>
          </form>
          <p class="text-center text-muted mt-3">Already have an account? <a href="login.php" class="text-decoration-underline">Sign in</a></p>
        </div>
      </div>
      <div class="col-lg-6 d-none d-lg-block image-container">
        <img src="./outdoor-view-young-woman-uses-tourist-equipment-making-coffee-has-portable-gas-stove-stump.jpg" alt="Tourism Discovery">
      </div>
    </div>
  </div>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
