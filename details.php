<?php

session_start();

require 'header.php';

header('Content-Type: text/html; charset=UTF-8');

function calculateDaysAgo($timestamp) {
    $currentTime = time();
    $commentTime = strtotime($timestamp);
    $difference = $currentTime - $commentTime;
    $days = floor($difference / (60 * 60 * 24));

    if ($days == 0) {
        return "Today";
    } elseif ($days == 1) {
        return "Yesterday";
    } else {
        return $days . " days ago";
    }
}


?>
  
<!DOCTYPE html>
<html lang="fr ">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
  <title>Place Details</title>
  <link rel="stylesheet" href="styles.css"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <style>
  <style>
    /* Additional styles */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    .containers {
    margin-top: 6rem;
    margin-left: auto;
    margin-right: auto;
    /* margin-bottom: 10rem; */
    padding: 27px;
    padding: 0 auto;
    padding: auto;
}

   

    .place-details-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
      margin-top: 20px;
    }

    .place-details-grid img {
      
      max-width: 50rem;
      border-radius: 8px;
    }
    
    .info {
      
    }
    .hotel-grid {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    overflow: hidden;

}


    .det-info {
      flex-basis: 50%;
      padding: 20px;
    }

    .det-info h2 {
      font-size: 24px;
      margin-top: 0;
    }

    .det-info p {
      font-size: 16px;
      margin: 10px 0;
    }

    .det-grid {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      margin-top: 41px;
    }
   
    .author-details {
      flex-basis: 40%;
      padding: 20px;
    }

    .author-details h3 {
      font-size: 18px;
      margin-top: 0;
    }

    .author-details p {
      font-size: 14px;
      margin: 10px 0;
    }

    .action-buttons {
      margin-top: 20px;
      text-align: center;
    }

    .action-button {
      display: inline-block;
      padding: 10px 20px;
      background-color: #007bff;
      color: #fff;
      border-radius: 5px;
      text-decoration: none;
      transition: background-color 0.3s ease;
    }

    .action-button:hover {
      background-color: #0056b3;
    }
    .place-details {
    display: flex;
    flex-direction: column;
}

.info {
    order: 1;
}

.place-details img {
    max-width: 100%;
    height: 20rem;
}

@media screen and (min-width: 768px) {
    .place-details {
        flex-direction: row;
    }

    .info {
        order: 0;
        flex: 1;
        padding-right: 20px; /* Adjust as needed */
    }

    .place-details img {
        order: 1;
        flex: 1;
        max-width: 50rem;
        height: 20rem;
    }
}


    


    .place-details .det-info {
      flex-basis: 50%; /* Description and Address on the left */
    }
    .containerz {
    margin: 23px;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
}

.comment {
    margin-bottom: 20px;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    background-color: #fff;
}

.comment p.comment-text {
    margin: 5px 0;
}

.comment .comment-info {
    display: flex;
    gap: 10px;
    align-items: center;
    color: #666;
    font-size: 12px;
}

.comment .comment-info .comment-author {
    font-weight: bold;
}

textarea {
    width: calc(100% - 22px);
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button[type="submit"] {
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    background-color: #3b5998;
    color: #fff;
    cursor: pointer;
}

button[type="submit"]:hover {
    background-color: #2d4373;
}


#googleMapsButton {
  position: absolute;
    margin-top: 10px;
    /* margin-bottom: 9px; */
    /* top: 316px; */
    /* right: 10px; */
    z-index: 1000;
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 8px 7px;
    border-radius: 7px;
    cursor: pointer;
}
    
    
    #googleMapsButton:hover {
      background-color: #0056b3;
    }
    .contact-info {
    display: flex;
    gap:10px;
    align-items: center; /* Align items vertically */
}

.contact-info p {
    margin: 0; /* Remove default margins */
}
.room-features {
    display: flex;
    flex-wrap: wrap;
}

.features-container {
    display: flex;
    flex-wrap: wrap;
}

.feature {
    flex: 0 0 50%; /* Two features per line */
    padding: 5px;
}
/* this is css for nearby places*/
.containera {
  max-width: 960px;
  margin: 0 auto;
  padding: 0 15px;
}

.row {
  display: flex;
  flex-wrap: wrap;
  margin: 0 -15px;
}

.col-md-6 {
  flex: 0 0 50%;
  max-width: 50%;
  padding: 0 15px;
}

.place-card {
  border: 1px solid #ddd;
  border-radius: 5px;
  margin-bottom: 20px;
  padding: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  transition: box-shadow 0.3s ease;
}

.place-card:hover {
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
}

.place-image {
  width: 100px;
  height: 100px;
  border-radius: 5px;
  object-fit: cover;
}

.place-info {
  padding-left: 10px;
  overflow: hidden;
}

.text-xl {
  font-size: 1.25rem;
  margin: 0;
}

.font-semibold {
  font-weight: 600;
}

.text-lg {
  font-size: 1.125rem;
  margin: 0;
}

.text-sm {
  font-size: 0.875rem;
}

.text-gray-600 {
  color: #6b7280;
}

.text-blue-600 {
  color: #2563eb;
}

.hover\:underline:hover {
  text-decoration: underline;
}

.d-flex {
  display: flex;
}

.mt-4 {
  margin-top: 1rem;
}

.text-center {
  text-align: center;
}

.text-left {
  text-align: left;
}



.detail-row {
  display: flex;
  align-items: center;
  margin-bottom: 10px;
}

.detail-title {
  margin-right: 10px;
  font-weight: bold; /* Add bold font weight */
}

.detail-content {
  margin: 0;
}


/* Styles for the image container */
.place-details .image-container {
    position: relative;
    text-align: center;
}

/* Styles for the image */
.place-details .image-container img {
    max-width: 100%;
    height: auto;
}

/* Styles for the image navigation icons */
.place-details .image-navigation {
    position: absolute;
    top: 50%;
    width: 100%;
    display: flex;
    justify-content: space-between;
    transform: translateY(-50%);
}

.place-details .image-navigation span {
    cursor: pointer;
    background-color: rgba(255, 255, 255, 0.5);
    color: black;
    font-size: 24px;
    padding: 10px 15px;
    border-radius: 50%;
    transition: background-color 0.3s;
}

.place-details .image-navigation span:hover {
    background-color: rgba(0, 0, 0, 0.5);
    color: white;
}

.containerzs {
    max-width: 1200px;
    margin: 0 auto;
    background-color: #ffffff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.1);
}

.containerzs h2 {
    font-size: 28px;
    color: #333333;
    margin-bottom: 20px;
}

.containerzs p {
    font-size: 16px;
    color: #666666;
    margin-bottom: 20px;
}

.containerzs .comment {
    border-bottom: 1px solid #dddddd;
    padding-bottom: 20px;
    margin-bottom: 20px;
}

.containerzs .comment:last-child {
    border-bottom: none;
    margin-bottom: 0;
}

.containerzs .comment-info {
    margin-bottom: 10px;
}

.containerzs .comment-info .comment-author {
    font-weight: bold;
    color: #333333;
}

.containerzs .comment-info .comment-date {
    color: #999999;
}

.containerzs .comment-text {
    font-size: 16px;
    color: #333333;
}

.containerzs .comment-form textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #cccccc;
    border-radius: 5px;
    margin-bottom: 20px;
    resize: none;
}

.containerzs .comment-form button[type="submit"] {
    background-color: #007bff;
    color: #ffffff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
}

.containerzs .comment-form button[type="submit"]:hover {
    background-color: #0056b3;
}

.containerzs .login-link {
    font-size: 16px;
    color: #007bff;
    text-decoration: none;
}

.containerzs .login-link:hover {
    text-decoration: underline;
}

.containerzs .login-message {
    text-align: center;
    margin-top: 20px;
}

.containerzs .login-message p {
    margin-bottom: 10px;
}

.containerzs .login-btn {
    display: inline-block;
    background-color: #007bff;
    color: #ffffff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
    cursor: pointer;
}

.containerzs .login-btn:hover {
    background-color: #0056b3;
}

.place-detailsx {
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    margin-top: 3rem;
    background-color: #ffffff;
}
.place-detailsxz{
    max-width:20rem;
}

.place-detailsx h2 {
    color: #333;
    margin-top: 0;
}

.place-detailsx table {
    width: 100%;
    border-collapse: collapse;
}

.place-detailsx table td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
    min-width: 100px; /* Adjusted min-width for dynamic border width */
}

.place-detailsx table td:first-child {
    font-weight: bold;
    color: #666;
}

.place-detailsx table td.distance {
    font-style: italic;
}

.place-detailsx .tips-section {
    margin-top: auto;
}

.place-detailsx .tips-section h3 {
    margin-top: 0;
    color: #333;
}

.place-detailsx .tips-section p {
    margin-bottom: 0;
}

      

  </style>
  
   <script>
    // Function to open Google Maps with the specified location
    function openGoogleMaps(latitude, longitude, placeName) {
        var url = "https://www.google.com/maps/search/?api=1&query=" + latitude + "," + longitude + "&query_place_id=" + placeName;
        window.open(url, "_blank");
    }
  </script>
</head>
<body> 
<div class="containers">
  
  
  <?php
$conn = mysqli_connect('localhost', 'root', '', 'islamda');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  
}

if(isset($_GET['id'])) {
    $placeID = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM places WHERE PlaceID = $placeID";
    $result = $conn->query($sql);

    $commentsQuery = "SELECT comments.Comment, comments.Timestamp, users.Username
    FROM comments
    INNER JOIN users ON comments.UserID = users.UserID
    WHERE comments.PlaceID = $placeID";
    $commentsResult = mysqli_query($conn, $commentsQuery);

    if ($result->num_rows > 0) {
        $place = $result->fetch_assoc();
        $latitude = $place['latitude'];
        $longitude = $place['longitude'];
        $distanceToCenter = $place['distance_to_center'];
        $distanceToAirport = $place['distance_to_airport'];
        $nearestAirport = $place['nearest_airport'];
        $TravelInformation = $place['TravelInformation'];
        $HowToReach = $place['HowToReach'];

        if ($latitude !== null && $longitude !== null) {
            
            $nearbyPlaces = getNearbyPlaces($conn, $latitude, $longitude, $placeID);

          
        }

        
    
    
        echo '<div class="place-details">';
        if (!empty($place['Image'])) {
            echo '<img src="' . $place['Image'] . '" alt="' . $place['PlaceName'] . '">';
        } else {
            echo 'No image available';
        }
      

        echo '<div class="info">';
        echo '<h2>' . $place['PlaceName'] . ' Details</h2>';
        echo '<h5><i class="fa fa-map-marker"></i> Address: ' . $place['Address'] . '</h5>';
        echo '<p>Description: ' . $place['Description'] . '</p>';
       
        
if (checkPlaceExists($conn, 'hotel', $placeID)) {
    $hotelDetails = getHotelDetails($conn, $placeID);
    echo '<h4>Contact information</h4>';
    echo '<div class="contact-info">';
    echo '<p><i class="fa fa-phone"></i> Phone Number: ' . $hotelDetails['PhoneNumber'] . '</p>';
    echo '<p><a href="' . $hotelDetails['Website'] . '" target="_blank"><i class="fa fa-globe"></i> Visit hotel website</a></p>';
    echo '</div>';
} elseif (checkPlaceExists($conn, 'restaurant', $placeID)) {
    $restaurantDetails = getRestaurantDetails($conn, $placeID);
    echo '<h4>Contact information</h4>';
    echo '<div class="contact-info">';
    echo '<p><i class="fa fa-phone"></i> Phone Number: ' . $restaurantDetails['PhoneNumber'] . '</p>';
    echo '<p><a href="' . $restaurantDetails['Website'] . '" target="_blank"><i class="fa fa-globe"></i> Visit restaurant website</a></p>';
    echo '</div>';
} elseif (checkPlaceExists($conn, 'museum', $placeID)) {
    displaySuggestedDuration($conn, $placeID, 'museum');
} elseif (checkPlaceExists($conn, 'park', $placeID)) {
    displaySuggestedDuration($conn, $placeID, 'park');
} elseif (checkPlaceExists($conn, 'religious_sites', $placeID)) {
    displaySuggestedDuration($conn, $placeID, 'religious_sites');
} 
    
       

      echo '<button id="googleMapsButton" onclick="openGoogleMaps(' . $latitude . ', ' . $longitude . ', \'' . $place['PlaceName'] . '\')">View Location on Google Maps</button>';
        echo '</div>';
        echo '</div>';


        
        echo '<div id="map"></div>';

      
        
        if (checkPlaceExists($conn, 'hotel', $placeID)) {
            displayHotelDetails($conn, $placeID);
        } elseif (checkPlaceExists($conn, 'restaurant', $placeID)) {
            displayRestaurantDetails($conn, $placeID);
        } elseif (checkPlaceExists($conn, 'beach', $placeID)) {
            displayBeachDetails($conn, $placeID);
        } elseif (checkPlaceExists($conn, 'museum', $placeID)) {
            displayMuseumDetails($conn, $placeID);
        } elseif (checkPlaceExists($conn, 'religious_sites', $placeID)) {
            displayReligiousSiteDetails($conn, $placeID);
        }elseif (checkPlaceExists($conn, 'park', $placeID)) {
            displayParkDetails($conn, $placeID); 
        }elseif (checkPlaceExists($conn, 'historicalmonuments	', $placeID)) {
            displayHistoricalMonumentDetails($conn, $placeID);
        } else {
            echo "Invalid place type";
        }
        
        
    } else {
        echo "Place not found";
    }

    echo '<div class="place-detailsx">';
echo '<div class="place-detailsxz">';
echo '<h2>good to know</h2>';
echo '<div class="details-table">';
echo '<table>';

if (!is_null($distanceToCenter)) {
    echo '<tr><td class="label">Distance to Center:</td><td class="distance">' . $distanceToCenter . '</td></tr>';
}

if (!is_null($distanceToAirport)) {
    echo '<tr><td class="label">Distance to Airport:</td><td class="distance">' . $distanceToAirport . '</td></tr>';
}

if (!is_null($nearestAirport)) {
    echo '<tr><td class="label">Nearest Airport:</td><td>' . $nearestAirport . '</td></tr>';
}

echo '</table>';
echo '</div>';
echo '</div>';
echo '<div class="tips-section">';


if (!is_null($HowToReach)) {
    echo '<h3>How To Reach this place</h3>';
    echo '<p>' . $HowToReach . '</p>'; 
}


if (!is_null($TravelInformation)) {
    echo '<h3>Travel information</h3>';
    echo '<p>' . $TravelInformation . '</p>';
}

echo '</div>';
echo '</div>';

       
   
    
    
       
   
   
}

if (!empty($nearbyPlaces)) {
  echo "<h3>Nearby Places</h3>";
  echo '<div class="containera">';
  echo '<div class="row">';
  foreach ($nearbyPlaces as $place) {
    // Calculate distance between current place and nearby place
    $distance = round($place['distance'], 2); // Round to 2 decimal places

    echo '<div class="col-md-6">';
    echo '<div class="place-card">';
    echo '<a href="der.php?id=' . $place['PlaceID'] .'">'; 
    echo '<img src="' . $place['Image'] . '" alt="' . $place['PlaceName'] . '" class="place-image">';
    echo '<div class="place-info">';
    echo '<h2 class="text-xl font-semibold">' . $place['PlaceName'] . '</h2>';
    echo '<p class="text-gray-600">Distance: ' . $distance . ' km</p>'; // Display distance
    echo '</div>'; // close place-info
    echo '</a>'; // close link
    echo '</div>'; // close place-card
    echo '</div>'; // close col-md-6
  }
  echo '</div>'; // close row
  echo '</div>'; // close containera
} else {
  echo "<p>No nearby places found.</p>";
}

function getNearbyPlaces($conn, $latitude, $longitude, $placeID, $radius = 10) {
    // Query to retrieve nearby places within the specified radius
    $sql = "SELECT *,
            ( 6371 * acos( cos( radians($latitude) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians($longitude) ) + sin( radians($latitude) ) * sin( radians( latitude ) ) ) ) AS distance
            FROM places
            WHERE PlaceID != $placeID
            HAVING distance < $radius
            ORDER BY distance";

    // Execute query
    $result = $conn->query($sql);

    // Fetch 
    if ($result) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return array(); 
    }
}


function checkPlaceExists($conn, $tableName, $placeID) {
    $tableName = strtolower($tableName);
    $sql = "SELECT * FROM $tableName WHERE PlaceID = $placeID";
    $result = $conn->query($sql);
    return $result->num_rows > 0;
}
function displayHotelDetails($conn, $placeID) {
    $query = "SELECT * FROM hotel WHERE PlaceID = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $placeID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
?>
        <div class="det-con">
            <div class="det-grid">
                <div class="det-info">
                    <h2>Hotel Details</h2>
                    <div class="detail-row">
                        <h5 class="detail-title">Room Type:</h5>
                        <p class="detail-content"><?= htmlspecialchars($row['RoomType']) ?></p>
                    </div>
                    <div class="detail-row">
                        <h5 class="detail-title">Room View:</h5>
                        <p class="detail-content"><?= htmlspecialchars($row['RoomView']) ?></p>
                    </div>
                    <div class="detail-row">
                        <h5 class="detail-title">Low Price:</h5>
                        <p class="detail-content"><?= htmlspecialchars($row['LowPrice']) ?></p>
                    </div>
                    <div class="detail-row">
                        <h5 class="detail-title">High Price:</h5>
                        <p class="detail-content"><?= htmlspecialchars($row['HighPrice']) ?></p>
                    </div>
                    <div class="detail-row">
                        <a href="<?= htmlspecialchars($row['Website']) ?>" class="visit-website" target="_blank">Visit hotel website</a>
                    </div>
                </div>
                <div class="author-details">
                    <h4>Good to Know </h4>
                    <p><strong>Class Hotel:</strong> <?php for ($i = 0; $i < $row['HotelClass']; $i++) echo '<i class="fa fa-star"></i>'; ?></p>
                    <p><strong>Featured Hotel:</strong> <?= htmlspecialchars($row['FeaturedHotel']) ?></p>
                    <p><strong>Language Spoken:</strong> <?= htmlspecialchars($row['LANG-SPEAK']) ?></p>
                    <h4>Contact information</h4>
                
                    <p><i class="fa fa-phone"></i> <strong>Phone Number:</strong> <?= htmlspecialchars($row['PhoneNumber']) ?></p>
                </div>
            </div>
        </div>
<?php
    } else {
        echo "No hotel found with the given ID.";
    }

    mysqli_stmt_close($stmt);
}

function displayReligiousSiteDetails($conn, $placeID) {
    $query = "SELECT * FROM religious_sites WHERE PlaceID = $placeID";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $religiousSite = mysqli_fetch_assoc($result);
?>
        <div class="det-con">
            <div class="det-grid">
                <div class="det-info">
                    <h2>Religious Site Details</h2>

                    <?php if (!is_null($religiousSite['type_RelgionSite'])): ?>
                        <div class="detail-row">
                            <h5 class="detail-title">Type of Religious Site:</h5>
                            <p class="detail-content"><?= htmlspecialchars($religiousSite['type_RelgionSite']) ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if (!is_null($religiousSite['Religion'])): ?>
                        <div class="detail-row">
                            <h5 class="detail-title">Religion:</h5>
                            <p class="detail-content"><?= htmlspecialchars($religiousSite['Religion']) ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if (!is_null($religiousSite['dominant_style'])): ?>
                        <div class="detail-row">
                            <h5 class="detail-title">Dominant Style:</h5>
                            <p class="detail-content"><?= htmlspecialchars($religiousSite['dominant_style']) ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if (!is_null($religiousSite['Year_Built'])): ?>
                        <div class="detail-row">
                            <h5 class="detail-title">Year Built:</h5>
                            <p class="detail-content"><?= htmlspecialchars($religiousSite['Year_Built']) ?></p>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="author-details">
                    <h1>Good to Know</h1>

                    <?php if (!is_null($religiousSite['SuggestedDuration'])): ?>
                        <div class="detail-row">
                            <h5 class="detail-title">Suggested Duration:</h5>
                            <p class="detail-content"><?= htmlspecialchars($religiousSite['SuggestedDuration']) ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if (!is_null($religiousSite['Significance'])): ?>
                        <div class="detail-row">
                            <h5 class="detail-title">Significance:</h5>
                            <p class="detail-content"><?= htmlspecialchars($religiousSite['Significance']) ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if (!is_null($religiousSite['HistoricalBackground'])): ?>
                        <div class="detail-row">
                            <h5 class="detail-title">Historical Background:</h5>
                            <p class="detail-content"><?= htmlspecialchars($religiousSite['HistoricalBackground']) ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
<?php
    } else {
        echo "No religious site found with the given Place ID.";
    }
}


function displayHistoricalMonumentDetails($conn, $placeID) {
    $query = "SELECT * FROM historicalmonuments WHERE PlaceID = $placeID";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
?>
        <div class="det-con">
            <div class="det-grid">
                <div class="det-info">
                    <h2 style="font-weight: bold; color: black;">Historical Monument Details</h2>

                    <?php if (!is_null($row['Monument_Type'])): ?>
                        <div class="detail-row">
                            <h5 class="detail-title">Monument Type:</h5>
                            <p class="detail-content"><?= htmlspecialchars($row['Monument_Type']) ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if (!is_null($row['Historical_Background'])): ?>
                        <div class="detail-row">
                            <h5 class="detail-title">Historical Background:</h5>
                            <p class="detail-content"><?= htmlspecialchars($row['Historical_Background']) ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if (!is_null($row['Architect'])): ?>
                        <div class="detail-row">
                            <h5 class="detail-title">Architect:</h5>
                            <p class="detail-content"><?= htmlspecialchars($row['Architect']) ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if (!is_null($row['YearBuilt'])): ?>
                        <div class="detail-row">
                            <h5 class="detail-title">Year Built:</h5>
                            <p class="detail-content"><?= htmlspecialchars($row['YearBuilt']) ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if (!is_null($row['CurrentCondition'])): ?>
                        <div class="detail-row">
                            <h5 class="detail-title">Current Condition:</h5>
                            <p class="detail-content"><?= htmlspecialchars($row['CurrentCondition']) ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if (!is_null($row['CulturalSignificance'])): ?>
                        <div class="detail-row">
                            <h5 class="detail-title">Cultural Significance:</h5>
                            <p class="detail-content"><?= htmlspecialchars($row['CulturalSignificance']) ?></p>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="author-details">
                    <h1>Good to Know</h1>

                    <?php if (!is_null($row['Ownership'])): ?>
                        <div class="detail-row">
                            <h5 class="detail-title">Ownership:</h5>
                            <p class="detail-content"><?= htmlspecialchars($row['Ownership']) ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if (!is_null($row['HistoricalSignificance'])): ?>
                        <div class="detail-row">
                            <h5 class="detail-title">Historical Significance:</h5>
                            <p class="detail-content"><?= htmlspecialchars($row['HistoricalSignificance']) ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if (!is_null($row['SuggestedDuration'])): ?>
                        <div class="detail-row">
                            <h5 class="detail-title">Suggested Duration:</h5>
                            <p class="detail-content"><?= htmlspecialchars($row['SuggestedDuration']) ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
<?php
    } else {
        echo "No historical monument found with the given ID.";
    }
}



function displayRestaurantDetails($conn, $placeID) {
    $restaurantDetails = getRestaurantDetails($conn, $placeID);

    if (empty($restaurantDetails)) {
        echo "No restaurant found with the given ID.";
        return;
    }
?>
    <div class="det-con">
        <div class="det-grid">
            <div class="det-info">
                <h2>Restaurant Details</h2>

                <?php if (!empty($restaurantDetails['Res_Name'])): ?>
                <div class="detail-row">
                    <h5 class="detail-title">Restaurant Name:</h5>
                    <p class="detail-content"><?= htmlspecialchars($restaurantDetails['Res_Name']) ?></p>
                </div>
                <?php endif; ?>

                <?php if (!empty($restaurantDetails['Res_type'])): ?>
                <div class="detail-row">
                    <h5 class="detail-title">Restaurant Type:</h5>
                    <p class="detail-content"><?= htmlspecialchars($restaurantDetails['Res_type']) ?></p>
                </div>
                <?php endif; ?>

                <?php if (!empty($restaurantDetails['PhoneNumber'])): ?>
                <div class="detail-row">
                    <h5 class="detail-title">Phone Number:</h5>
                    <p class="detail-content"><?= htmlspecialchars($restaurantDetails['PhoneNumber']) ?></p>
                </div>
                <?php endif; ?>

                <?php if (!empty($restaurantDetails['Website'])): ?>
                <div class="detail-row">
                    <h5 class="detail-title">Website:</h5>
                    <p class="detail-content"><?= htmlspecialchars($restaurantDetails['Website']) ?></p>
                </div>
                <?php endif; ?>

            </div>
            <div class="author-details">
                <h4>Restaurant Information</h4>

                <?php if (!empty($restaurantDetails['Meals'])): ?>
                <div class="detail-row">
                    <h5 class="detail-title">Meals:</h5>
                    <p class="detail-content"><?= htmlspecialchars($restaurantDetails['Meals']) ?></p>
                </div>
                <?php endif; ?>

                <?php if (!empty($restaurantDetails['Cuisine'])): ?>
                <div class="detail-row">
                    <h5 class="detail-title">Cuisine:</h5>
                    <p class="detail-content"><?= htmlspecialchars($restaurantDetails['Cuisine']) ?></p>
                </div>
                <?php endif; ?>

                <?php if (!empty($restaurantDetails['SpecialDiets'])): ?>
                <div class="detail-row">
                    <h5 class="detail-title">Special Diets:</h5>
                    <p class="detail-content"><?= htmlspecialchars($restaurantDetails['SpecialDiets']) ?></p>
                </div>
                <?php endif; ?>

                <?php if (!empty($restaurantDetails['RestaurantStyle'])): ?>
                <div class="detail-row">
                    <h5 class="detail-title">Restaurant Style:</h5>
                    <p class="detail-content"><?= htmlspecialchars($restaurantDetails['RestaurantStyle']) ?></p>
                </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
<?php
}




function displayMuseumDetails($conn, $placeID) {
    $query = "SELECT * FROM museum WHERE PlaceID = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $placeID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        ?>
        <div class="det-con">
            <div class="det-grid">
                <div class="det-info">
                    <h2>Museum Details</h2>

                    <?php if (!empty($row['MuseumType'])): ?>
                        <div class="detail-row">
                            <h5 class="detail-title">Museum Type:</h5>
                            <p class="detail-content"><?= htmlspecialchars($row['MuseumType']) ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($row['TicketPrice'])): ?>
                        <div class="detail-row">
                            <h5 class="detail-title">Ticket Price:</h5>
                            <p class="detail-content">$<?= htmlspecialchars($row['TicketPrice']) ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($row['TypeExhibits'])): ?>
                        <div class="detail-row">
                            <h5 class="detail-title">Type of Exhibits:</h5>
                            <p class="detail-content"><?= htmlspecialchars($row['TypeExhibits']) ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($row['SpecialFeatures'])): ?>
                        <div class="detail-row">
                            <h5 class="detail-title">Special Features:</h5>
                            <p class="detail-content"><?= htmlspecialchars($row['SpecialFeatures']) ?></p>
                        </div>
                    <?php endif; ?>

                

                    <?php if (!empty($row['Architect'])): ?>
                        <div class="detail-row">
                            <h5 class="detail-title">Architect:</h5>
                            <p class="detail-content"><?= htmlspecialchars($row['Architect']) ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($row['YearBuilt'])): ?>
                        <div class="detail-row">
                            <h5 class="detail-title">Year Built:</h5>
                            <p class="detail-content"><?= htmlspecialchars($row['YearBuilt']) ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($row['Significance'])): ?>
                        <div class="detail-row">
                            <h5 class="detail-title">Significance:</h5>
                            <p class="detail-content"><?= htmlspecialchars($row['Significance']) ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($row['openHour']) || !empty($row['closeHour'])): ?>
                        <div class="detail-row">
                            <h5 class="detail-title">Opening Hours:</h5>
                            <p class="detail-content"><?= (!empty($row['openHour']) ? htmlspecialchars($row['openHour']) : "N/A") ?> - <?= (!empty($row['closeHour']) ? htmlspecialchars($row['closeHour']) : "N/A") ?></p>
                        </div>
                    <?php endif; ?>

                   
                </div>

                <div class="author-details">
                    <h4>Good to Know</h4>

                    <?php if (!empty($row['HistoricalBackground'])): ?>
                        <div class="detail-row">
                            <h5 class="detail-title">Historical Background:</h5>
                            <p class="detail-content"><?= htmlspecialchars($row['HistoricalBackground']) ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($row['ClosingDays'])): ?>
                        <div class="detail-row">
                            <h5 class="detail-title">Closing Days:</h5>
                            <p class="detail-content"><?= htmlspecialchars($row['ClosingDays']) ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($row['InteractiveExhibits'])): ?>
                        <div class="detail-row">
                            <h5 class="detail-title">Interactive Exhibits:</h5>
                            <p class="detail-content"><?= $row['InteractiveExhibits'] ? 'Yes' : 'No' ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($row['AudioGuideAvailability'])): ?>
                        <div class="detail-row">
                            <h5 class="detail-title">Audio Guide Availability:</h5>
                            <p class="detail-content"><?= $row['AudioGuideAvailability'] ? 'Yes' : 'No' ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($row['SuggestedDuration'])): ?>
                        <div class="detail-row">
                            <h5 class="detail-title">Suggested Duration:</h5>
                            <p class="detail-content"><?= htmlspecialchars($row['SuggestedDuration']) ?> minutes</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php
    } else {
        echo "No museum found with the given ID.";
    }

    mysqli_stmt_close($stmt);
}

function displayParkDetails($conn, $placeID) {
    $query = "SELECT * FROM park WHERE PlaceID = $placeID";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
?>
        <div class="det-con">
            <div class="det-grid">
                <div class="det-info">
                    <h2 style="font-weight: bold; color: black;">Park Details</h2>

                    <?php if (!is_null($row['ParkSurface'])): ?>
                        <p><span style="font-weight: bold; color: black;">Park Surface:</span> <?= htmlspecialchars($row['ParkSurface']) ?></p>
                    <?php endif; ?>

                    <?php if (!is_null($row['Park_Type'])): ?>
                        <p><span style="font-weight: bold; color: black;">Park Type:</span> <?= htmlspecialchars($row['Park_Type']) ?></p>
                    <?php endif; ?>

                    <?php if (!is_null($row['Activity'])): ?>
                        <p><span style="font-weight: bold; color: black;">Activities:</span> <?= htmlspecialchars($row['Activity']) ?></p>
                    <?php endif; ?>
                </div>

                <div class="author-details">
                    <h1>Good to Know</h1>

                    <?php if (!is_null($row['OpenHour']) && !is_null($row['CloseHour'])): ?>
                        <p><span style="font-weight: bold; color: black;">Open Hours:</span> <?= htmlspecialchars($row['OpenHour']) ?> to <?= htmlspecialchars($row['CloseHour']) ?></p>
                    <?php endif; ?>

                    <?php if (!is_null($row['is_always_open'])): ?>
                        <p><span style="font-weight: bold; color: black;">Always Open:</span> <?= $row['is_always_open'] ? 'Yes' : 'No' ?></p>
                    <?php endif; ?>

                    <?php if (!is_null($row['ClosedDay'])): ?>
                        <p><span style="font-weight: bold; color: black;">Closed Days:</span> <?= htmlspecialchars($row['ClosedDay']) ?></p>
                    <?php endif; ?>

                    <?php if (!is_null($row['SuggestedDuration'])): ?>
                        <p><span style="font-weight: bold; color: black;">Suggested Duration:</span> <?= htmlspecialchars($row['SuggestedDuration']) ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
<?php
    } else {
        echo "No park found with the given ID.";
    }
}


function displayBeachDetails($conn, $placeID) {
    $query = "SELECT * FROM beach WHERE PlaceID = $placeID";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        ?>
        <div class="det-con">
            <div class="det-grid">
                <div class="det-info">
                    <h2>Beach Details</h2>
                    <?php
                    $attributes = array(
                        'SuggestedDuration' => 'Suggested Duration',
                        'Category' => 'Beach Category',
                        'SandType' => 'Sand Type',
                        'WaterType' => 'Water Type',
                    );

                    foreach ($attributes as $attribute => $title) {
                        if (!is_null($row[$attribute])) {
                            $content = htmlspecialchars($row[$attribute]);
                            if ($attribute === 'LifeguardAvailability') {
                                $content = $row[$attribute] ? 'Yes' : 'No';
                            } elseif ($attribute === 'BeachLength') {
                                $content .= ' km';
                            }
                            echo '<div class="detail-row">';
                            echo '<h5 class="detail-title">' . $title . ':</h5>';
                            echo '<p class="detail-content">' . $content . '</p>';
                            echo '</div>';
                        }
                    }
                    ?>
                </div>
                <div class="author-details">
                    <h4>Good to Know</h4>
                    <?php
                    $good_to_know = array(
                        'LifeguardAvailability' => 'Lifeguard Availability',
                        'ActivitiesAvailable' => 'Activities Available',
                        'accessibility' => 'Accessibility',
                        'BeachLength' => 'Beach Length (km)'
                    );

                    foreach ($good_to_know as $attribute => $title) {
                        if (!is_null($row[$attribute])) {
                            $content = htmlspecialchars($row[$attribute]);
                            if ($attribute === 'LifeguardAvailability') {
                                $content = $row[$attribute] ? 'Yes' : 'No';
                            } elseif ($attribute === 'BeachLength') {
                                $content .= ' km';
                            }
                            echo '<div class="detail-row">';
                            echo '<h5 class="detail-title">' . $title . ':</h5>';
                            echo '<p class="detail-content">' . $content . '</p>';
                            echo '</div>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
    } else {
        echo "No beach found with the given ID.";
    }
}



function getHotelDetails($conn, $placeID) {
    $sql = "SELECT * FROM hotel WHERE PlaceID = $placeID";
    $result = $conn->query($sql);
    return $result->fetch_assoc();
}

function getRestaurantDetails($conn, $placeID) {
    $sql = "SELECT * FROM restaurant WHERE PlaceID = $placeID";
    $result = $conn->query($sql);
    return $result->fetch_assoc();
}


function getBeachDetails($conn, $placeID) {
    $sql = "SELECT * FROM beach WHERE PlaceID = $placeID";
    $result = $conn->query($sql);
    return $result->fetch_assoc();
}
function displaySuggestedDuration($conn, $placeID, $tableName) {
    $query = "SELECT SuggestedDuration FROM $tableName WHERE PlaceID = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $placeID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
       
        echo '<div class="detail-info">';
        echo '<h4>Suggested Duration</h4>';  echo '<p class="detail-content">' . $row['SuggestedDuration'] . '</p>';
        echo '</div>';
    } else {
        echo "No $tableName found with the given ID.";
    }

    mysqli_stmt_close($stmt);
}





?>



</div>


<div class="containerzs">
    <?php
    
    if (!isset($_SESSION['user'])) {
        $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
    }
    ?>
    <h2>wrote review comment </h2>

    <h3>Comments</h3>
    <?php 
    if (isset($_SESSION['user'])) {
        while($comment = mysqli_fetch_assoc($commentsResult)): ?>
            <div class="comment">
                <div class="comment-info">
                    <span class="comment-author"><?php echo $comment['Username']; ?></span>
                    <span class="comment-date"><?php echo calculateDaysAgo($comment['Timestamp']); ?></span>
                </div>
                <p class="comment-text"><?php echo $comment['Comment']; ?></p>
            </div>
        <?php endwhile; ?>

        <h3>Add a Comment</h3>
        <form class="comment-form" action="submit_comment.php" method="post">
            <input type="hidden" name="placeID" value="<?php echo $placeID; ?>">
            <textarea name="comment" rows="4" placeholder="Write your comment here" required></textarea><br>
            <button type="submit">Submit</button>
        </form>
    <?php } else { ?>
        <div class="login-message">
            <p>You need to log in to add a comment.</p>
            <a href="login.php" class="login-btn">Login</a>
        </div>
    <?php } ?>
</div>

</body>
</html>