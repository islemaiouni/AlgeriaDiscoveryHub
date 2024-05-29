<?php

session_start();


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "islamda";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if (isset($_SESSION['user'])) {
    // Retrieve user ID from session
    $userID = $_SESSION['user']['UserID'];
    

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve data from form
        $comment = $_POST["comment"];
        $placeID = $_POST["placeID"];
        
        
        $sql = "INSERT INTO comments (Comment, UserID, PlaceID) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sii", $comment, $userID, $placeID);
        
       
        if ($stmt->execute()) {
            
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        } else {
            
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        
        $stmt->close();
    }
} else {
    
    echo "User is not logged in.";
}

// Close database connection
mysqli_close($conn);
?>
