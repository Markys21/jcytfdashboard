<?php
if (isset($_POST['password']) && isset($_POST['id']) && isset($_POST['activeuser'])) {
    include "db_conn.php";
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $activeuser = mysqli_real_escape_string($conn, $_POST['activeuser']);

    $sql = "SELECT * FROM users WHERE password = '$password' AND id = '$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $sql1 = mysqli_query($conn, "UPDATE users SET status = 1 WHERE id = '$activeuser'");
        if ($sql1) {
            echo 'activated';
        } else {
            echo 'error';
        }
    } else {
        echo 'Invalid Password';
    }
}
?>
