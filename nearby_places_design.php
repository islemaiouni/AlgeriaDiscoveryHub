
  <style>
  
    .place-card {
      border: 1px solid #ddd;
      border-radius: 5px;
      margin-bottom: 20px;
      padding: 5px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .place-image {
      width: 60px;
      height: 60px;
      border-radius: 5px;
      object-fit: cover;
    }
    .place-info {
      padding-left: 10px;
      overflow: hidden;
    }
  </style>

  <div class="container">
    <div class="row">
    <?php
    foreach ($nearbyPlaces as $place) {
        echo '<div class="col-md-6">';
        echo '<div class="place-card">';
        echo '<h2 class="text-xl font-semibold">' . $place['PlaceName'] . '</h2>';
        echo '<div class="mt-4">';
        echo '<div class="d-flex">';
        echo '<img src="' . $place['Image'] . '" alt="' . $place['PlaceName'] . '" class="place-image">';
        echo '<div class="place-info">';
        echo '<h4 class="text-lg font-semibold">' . $place['PlaceName'] . '</h4>';
      
       
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    ?>
    </div>
  </div>
</html>
