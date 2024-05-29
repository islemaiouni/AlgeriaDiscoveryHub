<?php

$conn = mysqli_connect('localhost', 'root', '', 'islamda');


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$williyaId = $_GET['williyaId'];
$sql = "SELECT * FROM Cities WHERE WilliyaID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $williyaId);
$stmt->execute();
$result = $stmt->get_result();

$cities = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $cities[] = array(
            'CityID' => $row['CityID'],
            'CityName' => $row['CityName']
        );
    }
}


$conn->close();

echo json_encode($cities);
?>
