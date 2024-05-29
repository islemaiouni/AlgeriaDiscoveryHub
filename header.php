<?php
$db = mysqli_connect('localhost', 'root', '', 'islamda');

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

$username = "";
$email = "";

if (isset($_SESSION['user'])) {
    $userID = $_SESSION['user']['UserID'];
    $query = "SELECT Username , Email FROM Users WHERE UserID = ?";
    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, "i", $userID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        $userData = mysqli_fetch_assoc($result);
        $username = $userData['Username'];
        $email = $userData['Email'];
    } else {
        header('Location: login.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlgeriaDiscoveryHub - Discover Best tourism in Algeria</title>
    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">
    <link rel="stylesheet" href="fstyle.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&family=Open+Sans&display=swap" rel="stylesheet">
    <style>
        .header .website-header {
            display: flex;
            align-items: center;
        }
        
        .header .website-header .icon-algeria img {
            width: 30px; /* Adjust size as needed */
            height: auto;
            margin-right: 10px;
        }
        
        .header .website-header .website-name {
            font-family: 'Montserrat', sans-serif;
            font-size: 22px;
            font-weight: bold;
            color: #333;
        }
        
        @media (max-width: 768px) {
            .header .website-header .website-name {
                font-size: 18px;
            }
            
            .header .website-header .icon-algeria img {
                width: 25px;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header class="header" data-header>
        <div class="container">
            <div class="overlay" data-overlay></div>

            <div class="website-header" onclick="redirectToIndex()">
            <div class="icon-algeria">
                <img src="map.png" alt="Algeria Map Icon">
            </div>
             <span class="website-name">AlgeriaDiscoveryHub</span>
            </div>
            

        

            <nav class="navbar" data-navbar>
                <ul class="navbar-list">
                    <li>
                        <a href="index.php" class="navbar-link" data-nav-link>Home</a>
                    </li>
                    <li>
                        <a href="#featured-car" class="navbar-link" data-nav-link>Explore </a>
                    </li>
                    <li>
                        <a href="favori.php" class="navbar-link" data-nav-link>Saved place </a>
                    </li>
                    <li>
                        <a href="about.php" class="navbar-link" data-nav-link>About us</a>
                    </li>
                    <?php if ($username !== "") : ?>
                        <li>
                            <a href="" class="navbar-link" data-nav-link><?php echo $email; ?> </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
            <div class="header-actions">
                <?php if ($username === "") : ?>
                    <a href="login.php" class="btn user-btn" aria-label="Login">Login</a>
                    <a href="register.php" class="btn user-btn" aria-label="Register">Register</a>
                <?php else : ?>
                    <a href="logout.php" class="btn user-btn" aria-label="Logout">Logout</a>
                <?php endif; ?>
                
                <button class="nav-toggle-btn" data-nav-toggle-btn aria-label="Toggle Menu">
                    <span class="one"></span>
                    <span class="two"></span>
                    <span class="three"></span>
                </button>
            </div>
        </div>
    </header>
    <script>
    function redirectToIndex() {
        window.location.href = 'index.php';
    }
    </script>

    <script src="./assets/js/script.js"></script>

</body>

</html>
