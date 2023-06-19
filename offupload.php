<?php
// Handle feature image upload
$featureImage = $_FILES['feature_image'];
$featureImageName = generateUniqueFilename($featureImage['name']);
move_uploaded_file($featureImage['tmp_name'], '../images/' . $featureImageName);

// Handle supporting images upload
$supportingImages = $_FILES['supporting_images'];
$supportingImageNames = [];
$arrimgs = array();
array_push($arrimgs, "");
foreach ($supportingImages['tmp_name'] as $key => $tmpName) {
    $same = false;
    for ($x = 0; $x < count($arrimgs); $x++) {
        if ($supportingImages['name'][$key] == $arrimgs[$x]) {
            $same = true;
            break;
        }
    }
    if (!$same) {
        array_push($arrimgs, $supportingImages['name'][$key]);
        $supportingImageName = generateUniqueFilename($supportingImages['name'][$key]);
        move_uploaded_file($tmpName, '../images/' . $supportingImageName);
        $supportingImageNames[] = $supportingImageName;
    }
}

date_default_timezone_set('Asia/Manila');
$todays_date = date("Y-m-d h:i:sa");
session_start();
$userid = $_SESSION['offid'];
$eventname = $_POST['eventname'];
$speaker = $_POST['speaker'];
$position = $_POST['position'];
$eventtime = $_POST['eventtime'];
$eventdate = $_POST['eventdate'];
$attendees = $_POST['attendees'];
$venue = $_POST['venue'];
$speakercontact = $_POST['speakercontact'];
$speakeremail = $_POST['speakeremail'];
$eventcreated = $todays_date;
$eventupdated = $todays_date;
$eventdesc = $_POST['eventdesc'];

// Save filenames to the database
$pdo = new PDO('mysql:host=localhost;dbname=u491894228_jcytf_db', 'u491894228_jcytf_user', 'HostingerAwesome123');
$stmt = $pdo->prepare('INSERT INTO tblevents 
(EventName, userid, Speaker, position, attendees, venue, contact, email, Description, date, time, created_at, updated_at, featuredimage, pictures) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
$stmt->execute([$eventname, $userid, $speaker, $position, $attendees, $venue, $speakercontact, $speakeremail, $eventdesc, $eventdate, $eventtime, $eventcreated, $eventupdated, $featureImageName, implode(',', $supportingImageNames)]);

// Function to generate a unique filename
function generateUniqueFilename($filename)
{
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    return uniqid() . '.' . $extension;
}
