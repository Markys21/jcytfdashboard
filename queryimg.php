<?php

include_once ("core.php");

// Connect to the database
$host = 'localhost';
$dbname = 'u491894228_jcytf_db';
$username = 'u491894228_jcytf_user';
$password = 'HostingerAwesome123';
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

$imageData = array();
$directory = './images/';
$files = scandir($directory);

foreach ($files as $file) {
  if ($file !== '.' && $file !== '..') {
    $filePath = $directory . $file;
    $imageData[] = array(
      'file_name' => $file,
      'url' => $filePath
    );
  }
}

// Retrieve all data from the database
$sql = "SELECT * FROM tblevents ORDER BY ID DESC";
$stmt = $conn->query($sql);
$json = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Return the image data and database data as JSON response to the React request
$data = array('img_data' => $imageData, 'db' => $json);
header('Content-Type: application/json');
echo json_encode($data);

?>