<?php
// Start session if not already started
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'islamda');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Retrieve placeId and saved status from the GET parameters
    $placeId = $_GET['placeId'];
    $saved = $_GET['saved'];

    if (isset($_SESSION['user'])) {
        // User is logged in
        $userId = $_SESSION['user']['UserID'];

        // Prepare SQL statement based on whether the place is being saved or unsaved
        if ($saved === 'true') {
            $sql = "INSERT INTO savedplaces (UserID, PlaceID) VALUES (?, ?)";
        } else {
            $sql = "DELETE FROM savedplaces WHERE UserID = ? AND PlaceID = ?";
        }

        // Prepare and execute the SQL statement
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $userId, $placeId);
        $stmt->execute();
        $stmt->close();

        // Redirect the user back to the previous page
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        // User not logged in, redirect to login page
        header('Location: login.php');
        exit();
    }
} else {
    // Invalid request method
    echo "Invalid request method";
}
?>
