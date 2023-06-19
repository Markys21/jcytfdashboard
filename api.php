<?php

include_once ("core.php");

$connect = mysqli_connect("localhost", "u491894228_jcytf_user","HostingerAwesome123","u491894228_jcytf_db");
$sql = "SELECT * FROM tblevents ORDER BY ID DESC";
$result = mysqli_query($connect, $sql);
$json = array();

while($row = mysqli_fetch_assoc($result)){
    $json[]=$row;
}

echo json_encode($json)

?>