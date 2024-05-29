<?php
require 'header.php';
?>
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="fstyle.css">
    <link rel="stylesheet" href="styless.css">
    <script src="./assets/js/script.js"></script>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap");

:root {
    --primary-color: #2c3855;
    --primary-color-dark: #435681;
    --text-dark: #333333;
    --text-light: #767268;
    --extra-light: #f3f4f6;
    --white: #ffffff;
    --max-width: 1200px;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.containerx {
    max-width: var(--max-width);
    margin: auto;
    padding: 5rem 1rem;
}


.booking__containerx {
    position: relative;
    display: flex;
    margin-top: 8rem;
    flex-direction: column;
    align-items: center;
    gap: 1rem;
    padding: 1rem 2rem;
    margin-left:1rem;
    margin-right:2rem;
    border-radius: 2rem;
    background-color: rgba(255, 255, 255, 0.7);
    -webkit-backdrop-filter: blur(10px);
    backdrop-filter: blur(10px);
    box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.1);
}

.booking__containerx form {
    width: 100%;
    max-width: 600px;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1rem;
}

.input__groupx {
    position: relative;
}

label {
    position: absolute;
    top: 50%;
    left: 0;
    transform: translateY(-50%);
    font-size: 1.2rem;
    font-weight: 500;
    color: var(--text-dark);
    pointer-events: none;
    transition: 0.3s;
}

input {
    width: 100%;
    padding: 10px 0;
    font-size: 1rem;
    outline: none;
    border: none;
    background-color: transparent;
    border-bottom: 1px solid var(--primary-color);
    color: var(--text-dark);
}

input:focus ~ label {
    font-size: 0.8rem;
    top: 0;
}

.form__groupx p {
    margin-top: 0.5rem;
    font-size: 0.8rem;
    color: var(--text-light);
}

.btnx {
    padding: 9px;
    margin-top: 19px;
    outline: none;
    border: none;
    font-size: 1.5rem;
    color: var(--white);
    background-color: var(--primary-color);
    border-radius: 10px;
    cursor: pointer;
    transition: 0.3s;
}

.btnx:hover {
    background-color: var(--primary-color-dark);
}

.select__optionx {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #fff;
    font-size: 16px;
    color: #333;
    outline: none;
    cursor: pointer;
}

.select__optionx option {
    background-color: #fff;
    color: #333;
}

.results {
    background-color: #ddd;
    padding: 20px 0;
    text-align: center;
}

.results h2.search-results {
    margin-top: 18rem;
}



/* Media Queries */
@media (max-width: 900px) {
    .booking__containerx form {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 600px) {
    .booking__containerx form {
        grid-template-columns: repeat(1, 1fr);
    }
}
.card-list-item .card-item-text {
  overflow: hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-line-clamp: 2; /* Show only 2 lines */
  -webkit-box-orient: vertical;
  cursor: pointer; 
}

.card-list-item .card-item-text:hover,
.card-list-item .card-item-text.expanded {
  overflow: visible;
  white-space: normal;
  height: auto;
  -webkit-line-clamp: unset; /* Show all lines on hover or when expanded */
}
.featured-car-card {
  background: var(--gradient);
  border: 1px solid var(--white);
  border-radius: var(--radius-18);
  padding: 10px;
  box-shadow: var(--shadow-1);
  max-width: 15rem;
}

.booking__container {
  position: absolute;
  bottom: -6rem;
  left: 50%;
  height: 155px;
  transform: translateX(-50%);
  width: calc(100% - 6rem);
  display: flex;
  align-items: center;
  gap: 1rem;
  padding: 3rem 2rem;
  border-radius: 2rem;
  background-color: rgba(255, 255, 255, 0.87);
  -webkit-backdrop-filter: blur(10px);
  backdrop-filter: blur(10px);
  box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.1);
}
.booking__container .btn {
    width: 20rem;
    /* height: 20rem; */
    /* margin-bottom: -13px; */
    padding: 9px;
    margin: 2px;
    /* margin-top: 19px; */
    outline: none;
    border: none;
    font-size: 1.5rem;
    color: var(--white);
    background-color: var(--primary-color);
    border-radius: 10px;
    cursor: pointer;
    transition: 0.3s;
}

.header .container {
  height: 70px;
  display: flex;
  margin-top: 3px;
  justify-content: space-between;
  align-items: center;
}
.header__content p {
    color: var(--extra-light);
    width: 150%;
}


.card-list-item .card-item-text {
  overflow: hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-line-clamp: 2; /* Show only 2 lines */
  -webkit-box-orient: vertical;
  cursor: pointer; /* Change cursor to pointer */
}

.card-list-item .card-item-text:hover,
.card-list-item .card-item-text.expanded {
  overflow: visible;
  white-space: normal;
  height: auto;
  -webkit-line-clamp: unset; /* Show all lines on hover or when expanded */
}

.featured-car-card .card-title {
    width: 100%;
}


.typer {
  font-size: 16px; 
  font-family: Arial, sans-serif; 
  font-weight: 400; 
}

.typer p {
  margin: 0; 
}
.typer p:first-child {
  margin-right: 8px;
  font-size: 12px;
  line-height: 16px;
  padding: 2px 4px;
  letter-spacing: 0.1px;
  color: #2c78f6;
  border-radius: 2px;
  background: rgba(44, 120, 246, 0.15);
  display: inline-block; 
  width: auto; 
}

.image-container {
    position: relative;
}

.save-icon {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 24px;
    color: #ccc; /* Default color */
    cursor: pointer;
    z-index: 2;
    color:transport;
}

.save-icon.saved {
    color: red; 
}
.save-icon.saved ion-icon {
        color: red; 
    }

    .result-message {
    font-size: 20px;
    margin: 20px 0;
    padding: 15px;
    background-color: #e9ecef;
    color: #333;
    border-left: 5px solid #007bff;
    border-radius: 4px;
    font-weight: 500;
}

.no-places-found {
    text-align: center;
    margin-top: 50px;
}

.no-places-found h3 {
    font-size: 24px;
    color: #ff4f4f;
}

.no-places-found p {
    font-size: 18px;
    color: #666;
    margin-bottom: 10px;
}



    </style>


<script>
document.addEventListener('DOMContentLoaded', function() {
    var williyaSelect = document.getElementById('williya');
    var citySelect = document.getElementById('city');
    var visitTypeSelect = document.getElementById('visitType');
    var paymentTypeSelect = document.getElementById('paymentType');
    var placeTypeSelect = document.getElementById('placeType');

    var originalPlaceTypeOptions = Array.from(placeTypeSelect.options);

    // Get cities data from PHP
    var cities = <?php
        $conn = mysqli_connect('localhost', 'root', '', 'islamda');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $cities = array();
        $sql = "SELECT * FROM Cities";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $cities[] = $row;
            }
        }
        $conn->close();
        echo json_encode($cities);
    ?>;

    // Populate city dropdown based on selected williya
    williyaSelect.addEventListener('change', function() {
        var selectedWilliya = williyaSelect.value;
        citySelect.innerHTML = '<option value="" disabled selected>Select city</option>';
        cities.forEach(function(city) {
            if (city.WilliyaID == selectedWilliya) {
                var option = document.createElement('option');
                option.value = city.CityID;
                option.textContent = city.CityName;
                citySelect.appendChild(option);
            }
        });
        citySelect.disabled = false;
        document.getElementById('cityGroup').style.display = selectedWilliya ? 'block' : 'none';
    });

    if (williyaSelect.value) {
        williyaSelect.dispatchEvent(new Event('change'));
    }

    citySelect.value = "<?php echo isset($_GET['city']) ? $_GET['city'] : ''; ?>";

    // Function to update placeType options
    function updatePlaceTypeOptions() {
        var visitType = visitTypeSelect.value;
        var paymentType = paymentTypeSelect.value;
        placeTypeSelect.innerHTML = '';

        originalPlaceTypeOptions.forEach(function(option) {
            var showOption = true;

            if (visitType === 'One day' && option.value === 'hotel') {
                showOption = false;
            }

            if (paymentType === 'gratuit' && (option.value === 'restaurant' || option.value === 'hotel')) {
                showOption = false;
            }

            if (showOption) {
                placeTypeSelect.appendChild(option.cloneNode(true));
            }
        });
    }

    visitTypeSelect.addEventListener('change', updatePlaceTypeOptions);
    paymentTypeSelect.addEventListener('change', updatePlaceTypeOptions);

    updatePlaceTypeOptions();
});
</script>





</head>
<body>
<container class="section__containerx header__containerx">
    <div class="booking__containerx">
        <form method="get" action="search.php" id="searchForm">
            <div class="form__groupx">
                <p>Where williya you like to go?</p>
                <div class="input__groupx">
                    <select class="select__optionx" name="williya" id="williya">
                        <option value="" disabled>Select williya</option>
                        <?php
                        $conn = mysqli_connect('localhost', 'root', '', 'islamda');
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $sql = "SELECT * FROM Williyas";
                        $resultWilliyas = $conn->query($sql);
                        if ($resultWilliyas->num_rows > 0) {
                            while ($row = $resultWilliyas->fetch_assoc()) {
                                $selected = isset($_GET['williya']) && $_GET['williya'] == $row["WilliyaID"] ? 'selected' : '';
                                echo "<option value='" . $row["WilliyaID"] . "' $selected>" . $row["WilliyaName"] . "</option>";
                            }
                        }
                        $conn->close();
                        ?>
                    </select>
                </div>
            </div>

            <div class="form__groupx hidden" id="cityGroup">
                <p>Select city you like to go?</p>
                <div class="input__groupx">
                    <select class="select__optionx" name="city" id="city">
                        <option value="" selected>Select city</option>
                        <?php foreach ($cities as $city) { ?>
                            <option value="<?= $city['CityID'] ?>" <?= isset($_GET['city']) && $_GET['city'] == $city['CityID'] ? 'selected' : '' ?> data-williya="<?= $city['WilliyaID'] ?>">
                                <?= $city['CityName'] ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="form__groupx">
                <p>Visit Type:</p>
                <div class="input__groupx">
                    <select class="select__optionx" name="visitType" id="visitType">
                        <option value="" selected>Select visit</option>
                        <option value="One day" <?= isset($_GET['visitType']) && $_GET['visitType'] == 'One day' ? 'selected' : ''; ?>>One day</option>
                        <option value="Multiple days" <?= isset($_GET['visitType']) && $_GET['visitType'] == 'Multiple days' ? 'selected' : ''; ?>>Multiple days</option>
                    </select>
                </div>
            </div>

            <div class="form__groupx">
                <p>Payment Type:</p>
                <div class="input__groupx">
                    <select class="select__optionx" name="paymentType" id="paymentType">
                        <option value="" selected>Select payment type</option>
                        <option value="gratuit" <?= isset($_GET['paymentType']) && $_GET['paymentType'] == 'gratuit' ? 'selected' : ''; ?>>Free</option>
                        <option value="non_gratuit" <?= isset($_GET['paymentType']) && $_GET['paymentType'] == 'non_gratuit' ? 'selected' : ''; ?>>Non Free</option>
                    </select>
                </div>
            </div>

            <div class="form__groupx">
                <p>Place Type:</p>
                <div class="input__groupx">
                    <select class="select__optionx" name="placeType" id="placeType">
                        <option value="" selected>Select place type</option>
                        <option value="hotel" <?= isset($_GET['placeType']) && $_GET['placeType'] == 'hotel' ? 'selected' : ''; ?>>Hotel</option>
                        <option value="restaurant" <?= isset($_GET['placeType']) && $_GET['placeType'] == 'restaurant' ? 'selected' : ''; ?>>Restaurant</option>
                        <option value="beach" <?= isset($_GET['placeType']) && $_GET['placeType'] == 'beach' ? 'selected' : ''; ?>>Beach</option>
                        <option value="museum" <?= isset($_GET['placeType']) && $_GET['placeType'] == 'museum' ? 'selected' : ''; ?>>Museum</option>
                        <option value="historical_monument" <?= isset($_GET['placeType']) && $_GET['placeType'] == 'historical_monument' ? 'selected' : ''; ?>>Historical Monument</option>
                        <option value="park" <?= isset($_GET['placeType']) && $_GET['placeType'] == 'park' ? 'selected' : ''; ?>>Park</option>
                        <option value="religious_site" <?= isset($_GET['placeType']) && $_GET['placeType'] == 'religious_site' ? 'selected' : ''; ?>>Religious Site</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btnx" id="searchButton">Search</button>
        </form>
    </div>
</container>


<?php
$conn = mysqli_connect('localhost', 'root', '', 'islamda');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$cities = array();

$sql = "SELECT * FROM Cities";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $cities[] = $row;
    }
}

$conn->close();
?>



<script>
document.addEventListener('DOMContentLoaded', function() {
    var williyaSelect = document.getElementById('williya');
    var citySelect = document.getElementById('city');
    var cities = <?php
        $conn = mysqli_connect('localhost', 'root', '', 'islamda');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $cities = array();
        $sql = "SELECT * FROM Cities";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $cities[] = $row;
            }
        }
        $conn->close();
        echo json_encode($cities);
    ?>;

    williyaSelect.addEventListener('change', function() {
        var selectedWilliya = williyaSelect.value;
        citySelect.innerHTML = '<option value="" selected>Select city</option>';
        cities.forEach(function(city) {
            if (city.WilliyaID == selectedWilliya || selectedWilliya === '') {
                var option = document.createElement('option');
                option.value = city.CityID;
                option.textContent = city.CityName;
                citySelect.appendChild(option);
            }
        });
        citySelect.disabled = false;
        document.getElementById('cityGroup').style.display = selectedWilliya ? 'block' : 'none';
    });

    if (williyaSelect.value) {
        williyaSelect.dispatchEvent(new Event('change'));
    }

    citySelect.value = "<?php echo isset($_GET['city']) ? $_GET['city'] : ''; ?>";

   
});
</script>



<section class="section featured-car" id="featured-car">
        <div class="container">

          <div class="title-wrapper">
             <!-- <h2 class="h2 section-title">Featured place</h2>  -->


            <a href="#" class="featured-car-link">
              

            </a>
          </div>

          <ul class="featured-car-list">
          <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "islamda";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$williya = isset($_GET['williya']) ? $_GET['williya'] : '';
$city = isset($_GET['city']) ? $_GET['city'] : '';
$visitType = isset($_GET['visitType']) ? $_GET['visitType'] : '';
$paymentType = isset($_GET['paymentType']) ? $_GET['paymentType'] : '';
$placeType = isset($_GET['placeType']) ? $_GET['placeType'] : '';

$query = "SELECT 
    Williyas.WilliyaName, 
    Cities.CityName, 
    Places.PlaceName, 
    Places.Description, 
    Places.Address, 
    Places.PlaceID,
    Places.Image,
    CASE
        WHEN h.PlaceID IS NOT NULL THEN 'hotel'
        WHEN r.PlaceID IS NOT NULL THEN 'restaurant'
        WHEN m.PlaceID IS NOT NULL THEN 'museum'
        WHEN b.PlaceID IS NOT NULL THEN 'beach'
        WHEN p.PlaceID IS NOT NULL THEN 'park'
        WHEN hm.PlaceID IS NOT NULL THEN 'historical monument'
        WHEN rs.PlaceID IS NOT NULL THEN 'religious site'
        ELSE 'Unknown'
    END AS PlaceType
FROM 
    Williyas 
INNER JOIN 
    Cities ON Williyas.WilliyaID = Cities.WilliyaID
INNER JOIN 
    Places ON Cities.CityID = Places.CityID
LEFT JOIN
    hotel h ON Places.PlaceID = h.PlaceID
LEFT JOIN
    restaurant r ON Places.PlaceID = r.PlaceID
LEFT JOIN
    museum m ON Places.PlaceID = m.PlaceID
LEFT JOIN
    beach b ON Places.PlaceID = b.PlaceID
LEFT JOIN
    park p ON Places.PlaceID = p.PlaceID
LEFT JOIN
    historicalmonuments hm ON Places.PlaceID = hm.PlaceID
LEFT JOIN
    religious_sites rs ON Places.PlaceID = rs.PlaceID";

if (!empty($city)) {
    $query .= " WHERE Cities.CityID = '$city'";
} else if (!empty($williya)) {
    $query .= " WHERE Williyas.WilliyaID = '$williya'";
}

if (!empty($placeType)) {
    $query .= " AND (
        (h.PlaceID IS NOT NULL AND '$placeType' = 'hotel') OR 
        (r.PlaceID IS NOT NULL AND '$placeType' = 'restaurant') OR 
        (m.PlaceID IS NOT NULL AND '$placeType' = 'museum') OR 
        (b.PlaceID IS NOT NULL AND '$placeType' = 'beach') OR
        (p.PlaceID IS NOT NULL AND '$placeType' = 'park') OR
        (hm.PlaceID IS NOT NULL AND '$placeType' = 'historical monument') OR
        (rs.PlaceID IS NOT NULL AND '$placeType' = 'religious site')
    )";
}

if ($visitType === 'One day') {
    $query .= " AND Places.PlaceID NOT IN (SELECT PlaceID FROM hotel)";
}

if (!empty($paymentType)) {
    if ($paymentType === 'gratuit') {
        $query .= " AND Places.paymentgratuit = 'free'";
    } elseif ($paymentType === 'non_gratuit') {
        $query .= " AND Places.paymentgratuit = 'non_free'";
    }
}
$result = $conn->query($query);



if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ?>
        <li>
            <div class="featured-car-card">
                <figure class="card-banner">
                    <img src="<?= $row['Image'] ?>" alt="<?= $row['PlaceName'] ?>" loading="lazy" width="440" height="300" class="w-100">
                </figure>
                <div class="card-content">
                    <div class="card-title-wrapper">
                      <h3 class="hh"><a href="details.php?id=<?= $row['PlaceID'] ?>"><?= $row['PlaceName'] ?></a></h3>
                    </div>
                    <div class="typer">
                        <p><?= $row['PlaceType'] ?></p>
                    </div>
                    <ul class="card-list">
                        <li class="card-list-item">
                            <ion-icon name="location-outline"></ion-icon>
                            <span class="card-item-text"><?= $row["Address"] ?></span>
                        </li>
                        <li class="card-list-item">
                            <ion-icon name="people-outline"></ion-icon>
                            <span class="card-item-text"><?= $row["Description"] ?></span>
                        </li>
                        
                    </ul>
                    <a href="details.php?id=<?= $row['PlaceID'] ?>" class="btn">View Details</a>
                </div>
            </div>
        </li>
        <?php
    }
} else {
    ?>
    <div class="no-places-found">
        <h3>Oops!</h3>
        <p>No places found for the selected criteria.</p>
        <p>Try refining your search or explore some other options.</p>
    </div>
    <?php

    
     
}

$conn->close();

?>

</ul>
    </div>

 </section>

 
      

    


</body>

</html>



