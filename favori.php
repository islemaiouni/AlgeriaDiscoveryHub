<?php
// Start session
session_start();

require 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="styless.css">
  
    <title>Your Favorite Places</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .saved-places-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .title-wrapper {
            text-align: center;
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 28px;
            color: #333;
            margin: 0;
        }

        .featured-car-list {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .featured-car-card {
            width: 300px;
            background-color: #fff;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .featured-car-card:hover {
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        .card-banner {
            position: relative;
            overflow: hidden;
            border-radius: 10px 10px 0 0;
        }

        .card-banner img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: all 0.3s ease;
        }

        .card-content {
            padding: 20px;
        }

        .card-content h3 {
            font-size: 20px;
            color: #333;
            margin-top: 0;
        }

        .typer p {
            margin: 10px 0;
            font-size: 16px;
            color: #777;
        }

        .card-list {
            padding: 0;
            margin: 10px 0;
            list-style-type: none;
        }

        .card-list-item {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
            color: #555;
        }

        .card-list-item ion-icon {
            margin-right: 5px;
            font-size: 18px;
            color: #999;
        }

        .card-item-text {
            flex: 1;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            cursor: pointer;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            text-align: center;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<section class="section featured-car" id="featured-car">
    <div class="saved-places-container">
        <div class="title-wrapper">
            <h2 class="h2 section-title">Your Favorite Places</h2> 
            <a href="#" class="featured-car-link"></a>
        </div>

        <ul class="featured-car-list">
            <?php
            // Database connection
            $conn = mysqli_connect('localhost', 'root', '', 'islamda');
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Check if user is logged in
            if (isset($_SESSION['user']) && isset($_SESSION['user']['UserID'])) {
                $userID = $_SESSION['user']['UserID'];

                // Query to retrieve saved places for the user
                $query = "SELECT p.PlaceID, p.PlaceName, p.Description, p.Address, p.CityID, p.Image, p.longitude, p.latitude, p.paymentgratuit
                          FROM places p
                          INNER JOIN savedplaces sp ON p.PlaceID = sp.PlaceID
                          WHERE sp.UserID = $userID";

                // Execute the query
                $result = $conn->query($query);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        // Display each saved place
                        echo '<li>
                                <div class="featured-car-card">
                                    <figure class="card-banner">
                                        <div class="image-container">
                                            <a href="#" onclick="toggleSaved(event, ' . $row['PlaceID'] . ')" class="save-icon saved">
                                                <ion-icon name="heart"></ion-icon>
                                            </a>
                                            <img src="' . $row['Image'] . '" alt="' . $row['PlaceName'] . '" loading="lazy">
                                        </div>
                                    </figure>
                                    <div class="card-content">
                                        <div class="card-title-wrapper">
                                            <h3 class="hh">
                                                <a href="der.php?id=' . $row['PlaceID'] . '">' . $row['PlaceName'] . '</a>
                                            </h3>
                                        </div>
                                        <div class="typer">
                                            <p>' . $row['paymentgratuit'] . '</p>
                                        </div>
                                        <ul class="card-list">
                                            <li class="card-list-item">
                                                <ion-icon name="location-sharp"></ion-icon>
                                                <span class="card-item-text">' . $row['Address'] . '</span>
                                            </li>
                                            <li class="card-list-item">
                                                <ion-icon name="people-sharp"></ion-icon>
                                                <span class="card-item-text">' . $row['Description'] . '</span>
                                            </li>
                                        </ul>
                                        <a href="der.php?id=' . $row['PlaceID'] . '" class="btn">View Details</a>
                                    </div>
                                </div>
                            </li>';
                    }
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            } else {
                
                echo '<div class="title-wrapper">
                <p>You need to login to see your favorite places.</p>
                <a href="login.php" class="btn">Login</a>
            </div>';
            }

            // Close database connection
            $conn->close();
            ?>
        </ul>
    </div>
</section>

</body>
</html>
