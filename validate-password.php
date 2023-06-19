<?php
session_start();
include "db_conn.php";

if (isset($_POST['password']) && isset($_POST['id'])) {
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $id = mysqli_real_escape_string($conn, $_POST['id']);

    $sql = "SELECT * FROM users WHERE password = '$password' AND id = '$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        echo 'success';
    } else {
        echo 'Invalid password';
    }
    exit; // Exit to prevent executing the rest of the PHP script
}

?>