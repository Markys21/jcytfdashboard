<?php
include "db_conn.php";
session_start();
$useridotp = $_SESSION['id'];
$sql= mysqli_query($conn, "update users set otp ='', time='' where id='$useridotp'");
echo 'OTP has been Expired!!';
?>