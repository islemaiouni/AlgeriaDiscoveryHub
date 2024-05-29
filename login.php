<?php
require_once('functions.php');
require 'header.php';

// Redirect logged-in users to index.php
if (isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}

// Check if login form is submitted
if (isset($_POST['login_btn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Attempt to log in the user
    loginUser($username, $password);

    // Check if there's a stored redirect URL
    if (isset($_SESSION['redirect_url'])) {
        $redirect_url = $_SESSION['redirect_url'];
        unset($_SESSION['redirect_url']); // Clear the stored URL
        header("Location: $redirect_url"); // Redirect the user back to the stored URL
        exit();
    } else {
        // If there's no stored redirect URL, redirect the user to index.php
        header('Location: index.php');
        exit();
    }
}

// Store the current page URL in a session variable
$_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AlgeriaDiscoveryHub - Login</title>
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
            margin: 9rem auto;
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
    </style>
</head>
<body class="bg-light text-dark">
    <div class="containerq-fluid min-vh-100 d-flex">
        <div class="row w-100">
            <div class="col-lg-6 d-flex justify-content-center align-items-center bg-light p-5">
                <div class="w-100" style="max-width: 400px;">
                    <div class="text-center mb-4">
                        <h1 class="h3 mb-3 fw-bold">Welcome back !</h1>
                        <p class="text-muted">Algeria Discovery The Easy and best one to Make your next Trip.</p>
                    </div>
                    <form method="post" action="login.php">
                        <?php if (isset($_SESSION['errors'])): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php
                                foreach ($_SESSION['errors'] as $error) {
                                    echo htmlspecialchars($error) . '<br>';
                                }
                                unset($_SESSION['errors']);
                                ?>
                            </div>
                        <?php endif; ?>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between">
                                <label for="password" class="form-label">Password</label>
                            </div>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100" name="login_btn">Sign in</button>
                    </form>
                    <p class="text-center text-muted mt-3">Don't have an account? <a href="register.php" class="text-decoration-underline">Register</a></p>
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
