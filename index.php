<?php

session_start();

require_once 'connection.php';


function isUserLoggedIn() {
  return isset($_SESSION['user']);
}





?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AlgeriaDiscoveryHub - the easy to discover best place in agleria </title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

  <!-- Custom CSS -->
 
  <link rel="stylesheet" href="styless.css">
  
 

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/6.0.1/css/ionicons.min.css" integrity="sha512-Zaw4D6/0eMkd2c96NE5sgaqyyPQGvC0kD2xrYTk6BJmE4q08wIapfNmuc8LZKJhZdE3X8ZlFgbqBKPwsSZ6qHw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  <!-- Google Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&family=Open+Sans&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
 
</head>

    <style>

     
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
  z-index:300;
  padding: 3rem 2rem;
  border-radius: 2rem;
  background-color: rgba(255, 255, 255, 0.87);
  -webkit-backdrop-filter: blur(10px);
  backdrop-filter: blur(10px);
  box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.1);
}

.booking__container .btn {
  width: 20rem;
  padding: 9px;
  margin: 2px;
  outline: none;
  border: none;
  font-size: 1.5rem;
  color: var(--white);
  background-color: var(--primary-color);
  border-radius: 10px;
  cursor: pointer;
  transition: 0.3s;
}

/* Media Queries for Responsiveness */

/* For tablets and smaller screens */
@media (max-width: 1024px) {
  .booking__container {
    width: calc(100% - 4rem);
    padding: 2.5rem 1.5rem;
    bottom: -6rem;
  }

  .booking__container .btn {
    width: 15rem;
    font-size: 1.3rem;
  }
}

@media (max-width: 888px) {
  .booking__container {
    flex-direction: column;
    height: auto;
    width: calc(100% - 2rem);
    padding: 2rem 1rem;
    bottom: -14rem;
    gap: 0.5rem;
  }

  .booking__container .btn {
    width: 100%;
    font-size: 1.2rem;
  }
}


/* For mobile devices */
@media (max-width: 768px) {
  .booking__container {
    flex-direction: column;
    height: auto;
    width: calc(100% - 2rem);
    padding: 2rem 1rem;
    bottom: -14rem;
    gap: 0.5rem;
  }

  .booking__container .btn {
    width: 100%;
    font-size: 1.2rem;
  }
}

/* For very small mobile devices */
@media (max-width: 480px) {
  .booking__container {
    padding: 1.5rem 0.5rem;
    bottom: -24rem;
  }

  .booking__container .btn {
    font-size: 1rem;
  }
}


.header__container {
  padding: 1rem 1rem 5rem 1rem;
  margin-top: 50px;
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
    color: #fff; 
    cursor: pointer;
    
}

.save-icon.saved {
    color: red; /* Saved color */
}
.save-icon.saved ion-icon {
        color: red; 
    }


    .alert {
  background-color: #fff3cd;
  border: 1px solid #ffeeba;
  color: #856404;
  padding: 0.75rem 1.25rem;
  margin-bottom: 1rem;
  border-radius: 0.25rem;
}

.alert button {
  margin-top: 0.5rem;
}

.alert button.btn {
  background-color: #ffc107;
  border-color: #ffc107;
  color: #212529;
}

.alert button.btn:hover {
  background-color: #e0a800;
  border-color: #d39e00;
  color: #212529;
}

.alert-box {
    position: fixed;
    top: 20px; /* Adjust as needed */
    right: 20px; /* Adjust as needed */
    padding: 15px;
    background-color: #4CAF50; /* Green color */
    color: white;
    border-radius: 5px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    z-index: 1000;
    display: none;
}

.alert-box.show {
    display: block;
}



    </style>

<body>
<?php
require 'header.php';




?>
<?php
// Establishing a database connection
$conn = mysqli_connect('localhost', 'root', '', 'islamda');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetching Williyas from the database
$williyas = array();
$sql = "SELECT * FROM Williyas";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $williyas[] = $row;
    }
}

// Closing the database connection
$conn->close();
?>
<header class="section__container header__container">
    <div class="header__image__container">
        <div class="header__content">
            <h1>Discover Your Perfect Destination and Plan Your Weekend Schedule from Home</h1>
            <p>Explore the best accommodations, tourist attractions, and much more. Discover our vacation packages for weekends, unique day trips, or extended holidays. Everything is available on our website, designed to offer you an exceptional tourist experience.</p>
        </div>
        <div class="booking__container">
            <form method="get" action="search.php" id="searchForm">
                <div class="form__group">
                    <p>Where would you like to go?</p>
                    <div class="input__group">
                        <select class="select__option" name="williya" id="williya">
                            <option value="" disabled selected>Select wilaya</option>
                            <?php foreach ($williyas as $williya) { ?>
                            <option value="<?php echo $williya['WilliyaID']; ?>" <?php if (isset($_GET['williya']) && $_GET['williya'] == $williya['WilliyaID']) echo 'selected'; ?>><?php echo $williya['WilliyaName']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form__group" id="cityGroup" style="display: none;">
                    <p>Où souhaites-tu aller dans cette wilaya ?</p>
                    <div class="input__group">
                        <select class="select__option" name="city" id="city">
                            <option value="" disabled selected>Select city</option>
                        </select>
                    </div>
                </div>

                <div class="form__group">
                    <p>Visit Type:</p>
                    <div class="input__group">
                        <select class="select__option" name="visitType" id="visitType">
                            <option value="" selected>Select visit type</option>
                            <option value="One day" <?php if (isset($_GET['visitType']) && $_GET['visitType'] == 'One day') echo 'selected'; ?>>One day</option>
                            <option value="Multiple days" <?php if (isset($_GET['visitType']) && $_GET['visitType'] == 'Multiple days') echo 'selected'; ?>>Multiple days</option>
                        </select>
                    </div>
                </div>

                <div class="form__group">
                    <p>Payment Type:</p>
                    <div class="input__group">
                        <select class="select__option" name="paymentType" id="paymentType">
                            <option value="" selected>Select payment type</option>
                            <option value="gratuit" <?php if (isset($_GET['paymentType']) && $_GET['paymentType'] == 'gratuit') echo 'selected'; ?>>Free</option>
                            <option value="non_gratuit" <?php if (isset($_GET['paymentType']) && $_GET['paymentType'] == 'non_gratuit') echo 'selected'; ?>>Non Free</option>
                        </select>
                    </div>
                </div>

                <div class="form__group">
                    <p>Type Site:</p>
                    <div class="input__group">
                        <select class="select__option" name="placeType" id="placeType">
                            <option value="" selected>Select place type</option>
                            <option value="hotel" <?php if (isset($_GET['placeType']) && $_GET['placeType'] == 'hotel') echo 'selected'; ?>>Hotel</option>
                            <option value="restaurant" <?php if (isset($_GET['placeType']) && $_GET['placeType'] == 'restaurant') echo 'selected'; ?>>Restaurant</option>
                            <option value="beach" <?php if (isset($_GET['placeType']) && $_GET['placeType'] == 'beach') echo 'selected'; ?>>Beach</option>
                            <option value="museum" <?php if (isset($_GET['placeType']) && $_GET['placeType'] == 'museum') echo 'selected'; ?>>Museum</option>
                            <option value="historical_monument" <?php if (isset($_GET['placeType']) && $_GET['placeType'] == 'historical_monument') echo 'selected'; ?>>Historical Monument</option>
                            <option value="park" <?php if (isset($_GET['placeType']) && $_GET['placeType'] == 'park') echo 'selected'; ?>>Park</option>
                            <option value="religious_site" <?php if (isset($_GET['placeType']) && $_GET['placeType'] == 'religious_site') echo 'selected'; ?>>Religious Site</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn" id="searchButton">Search</button>
            </form>
        </div>
    </div>
</header>


<main>
  <article>
  <script>
      document.addEventListener('DOMContentLoaded', function() {
          function updatePlaceTypeOptions() {
              var visitType = document.getElementById('visitType').value;
              var paymentType = document.getElementById('paymentType').value;
              var placeTypeSelect = document.getElementById('placeType');
              var originalPlaceTypeOptions = placeTypeSelect.querySelectorAll('option');

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

          var visitTypeSelect = document.getElementById('visitType');
          var paymentTypeSelect = document.getElementById('paymentType');

          visitTypeSelect.addEventListener('change', updatePlaceTypeOptions);
          paymentTypeSelect.addEventListener('change', updatePlaceTypeOptions);

          updatePlaceTypeOptions();

          var searchForm = document.getElementById('searchForm');

          searchForm.addEventListener('submit', function(event) {
              var selectedWilliya = document.getElementById('williya').value;

              if (!selectedWilliya) {
                  alert('Please select a wilaya before searching.');
                  event.preventDefault();
              }
          });
      });
    </script>



<?php
// Establishing a database connection
$conn = mysqli_connect('localhost', 'root', '', 'islamda');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetching Williyas from the database
$williyas = array();
$sql = "SELECT * FROM Williyas";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $williyas[] = $row;
    }
}

// Closing the database connection
$conn->close();
?>

    

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
      document.getElementById('williya').addEventListener('change', function() {
          if (this.value !== "") {
              document.getElementById('searchButton').disabled = false;
          } else {
              document.getElementById('searchButton').disabled = true;
          }
      });

      document.addEventListener('DOMContentLoaded', function() {
          var williyaSelect = document.getElementById('williya');
          var citySelect = document.getElementById('city');
          var cities = <?php echo json_encode($cities); ?>;

          williyaSelect.addEventListener('change', function() {
              var selectedWilliya = williyaSelect.value;
              citySelect.innerHTML = '<option value="" disabled selected>Select city</option>';
              cities.forEach(function(city) {
                  if (city.WilliyaID === selectedWilliya) {
                      var option = document.createElement('option');
                      option.value = city.CityID;
                      option.textContent = city.CityName;
                      citySelect.appendChild(option);
                  }
              });

              citySelect.disabled = false;

              document.getElementById('cityGroup').style.display = selectedWilliya ? 'block' : 'none';
          });

          document.getElementById('searchForm').addEventListener('submit', function(event) {
              var selectedWilliya = williyaSelect.value;
              var hiddenInput = document.createElement('input');
              hiddenInput.type = 'hidden';
              hiddenInput.name = 'selectedWilliya';
              hiddenInput.value = selectedWilliya;
              this.appendChild(hiddenInput);
          });

          // Retain selected city
          if (williyaSelect.value) {
              williyaSelect.dispatchEvent(new Event('change'));
              citySelect.value = "<?php echo isset($_GET['city']) ? $_GET['city'] : ''; ?>";
          }
      });
    </script>

    
    
      <section class="section featured-car" id="featured-car">
       
          <div class="title-wrapper">
             <!-- <h2 class="h2 section-title">Featured place</h2>  -->


            <a href="#" class="featured-car-link">
              

            </a>
          </div>

          <ul class="featured-car-list">
          <?php

// Database connection
$conn = mysqli_connect('localhost', 'root', '', 'islamda');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$query = "SELECT 
    p.PlaceID, 
    p.PlaceName, 
    p.Description, 
    p.Address, 
    p.Image, 
    c.CityName, 
    w.WilliyaName,
    CASE
        WHEN h.PlaceID IS NOT NULL THEN 'hotel'
        WHEN r.PlaceID IS NOT NULL THEN 'restaurant'
        WHEN b.PlaceID IS NOT NULL THEN 'beach'
        WHEN m.PlaceID IS NOT NULL THEN 'museum'
        WHEN hm.PlaceID IS NOT NULL THEN 'historicalmonuments'
        WHEN park.PlaceID IS NOT NULL THEN 'park'
        WHEN rs.PlaceID IS NOT NULL THEN 'religious site'
        ELSE 'Unknown'
    END AS PlaceType,
    p.paymentgratuit AS PaymentType
FROM 
    places p
INNER JOIN 
    cities c ON p.CityID = c.CityID
INNER JOIN 
    williyas w ON c.WilliyaID = w.WilliyaID
LEFT JOIN
    hotel h ON p.PlaceID = h.PlaceID
LEFT JOIN
    restaurant r ON p.PlaceID = r.PlaceID
LEFT JOIN
    beach b ON p.PlaceID = b.PlaceID
LEFT JOIN
    museum m ON p.PlaceID = m.PlaceID
LEFT JOIN
    historicalmonuments hm ON p.PlaceID = hm.PlaceID
LEFT JOIN
    park ON p.PlaceID = park.PlaceID
LEFT JOIN
    religious_sites rs ON p.PlaceID = rs.PlaceID;";

$result = $conn->query($query);

function isPlaceSaved($conn, $placeId, $userId) {
    // Prepare and execute SQL query to check if the place is saved by the user
    $sql = "SELECT * FROM savedplaces WHERE PlaceID = ? AND UserID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $placeId, $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // If any rows are returned, the place is saved by the user
    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}
if ($result) {
  while ($row = mysqli_fetch_assoc($result)) {
      $savedClass = isset($_SESSION['user']) ? (isPlaceSaved($conn, $row['PlaceID'], $_SESSION['user']['UserID']) ? 'saved' : '') : '';
?>
      <li>
          <div class="featured-car-card">
              <div class="image-container">
                  <a href="#" onclick="toggleSaved(event, <?= $row['PlaceID'] ?>)" class="save-icon <?= $savedClass ?>">
                      <i class="material-icons"><?= $savedClass === 'saved' ? 'favorite' : 'favorite_border' ?></i>
                  </a>
                  <figure class="card-banner">
                        <img src="<?= $row['Image'] ?>" alt="<?= $row['PlaceName'] ?>" loading="lazy" width="440" height="300" class="w-100">
                    </figure>
                
              </div>
              <div class="card-content">
                  <div class="card-title-wrapper">
                      <h3 class="hh"><a href="details.php?id=<?= $row['PlaceID'] ?>"><?= $row['PlaceName'] ?></a></h3>
                  </div>
                  <div class="typer">
                      <p><?= $row['PlaceType'] ?></p>
                      <p><?= $row['PaymentType'] ?></p>
                  </div>
                  <ul class="card-list">
                      <li class="card-list-item">
                          <i class="material-icons">location_on</i>
                          <span class="card-item-text"><?= $row['Address'] ?></span>
                      </li>
                      <li class="card-list-item">
                          <ion-icon name="people-sharp"></ion-icon>
                          <span class="card-item-text"><?= $row['Description'] ?></span>
                      </li>
                  </ul>
                  <a href="details.php?id=<?= $row['PlaceID'] ?>" class="btn">View Details</a>
              </div>
          </div>
      </li>
<?php
  }
} else {
  echo "Error: " . mysqli_error($conn);
}


$conn->close();
?>

</ul>
        </div>

     </section>
    

          

          
          
        
    <script>


function toggleSaved(event, placeId) {
    event.preventDefault();
    const icon = event.currentTarget;
    const saved = icon.classList.contains('saved');
    if (saved) {
        // Unsave the place
        window.location.href = `save_place.php?placeId=${placeId}&saved=false`;
    } else {
        // Save the place
        window.location.href = `save_place.php?placeId=${placeId}&saved=true`;
    }
}


    function redirectToLogin() {
        window.location.href = "login.php";
    }

    function showAlert(message) {
    var alertBox = document.getElementById('alertBox');
    alertBox.innerText = message;
    alertBox.style.display = 'block';
}



    </script>
   




<script>
    document.addEventListener('DOMContentLoaded', function() {
        var searchForm = document.getElementById('searchForm');

        searchForm.addEventListener('submit', function(event) {
            var selectedWilliya = document.getElementById('williya').value;

            if (!selectedWilliya) {
                alert('Please select a wilaya before searching.');
                event.preventDefault(); 
            }
        });
    });
</script>

<script src="./assets/js/script.js"></script>


</body>

</html>

         


         