<?php
if (isset($_POST['password']) && isset($_POST['id'])) {
    include "db_conn.php";
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $id = mysqli_real_escape_string($conn, $_POST['id']);

    $sql = "SELECT * FROM users WHERE password = '$password' AND id = '$id'";
    $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) === 1) {
        // Password is correct
        if (isset($_POST['eventarchive'])) {
            include 'connection.php';
            $eventarchive = $_POST['eventarchive'];
            $sql = mysqli_query($con, "UPDATE tblevents SET status = 2 WHERE id = '$eventarchive'");

            if ($sql) {
                echo 'approved';
            } else {
                echo 'error';
            }
        }
    } else {
        echo 'invalid';
    }
}
?>
