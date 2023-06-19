<?php

$sname= "localhost";
$unmae= "u491894228_jcytf_user";
$password = "HostingerAwesome123";

$db_name = "u491894228_jcytf_db";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}

?>