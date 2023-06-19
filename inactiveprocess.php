<?php
if (isset($_POST['password']) && isset($_POST['id']) && isset($_POST['inactiveacc'])) {
    include "db_conn.php";
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $inactiveacc = mysqli_real_escape_string($conn, $_POST['inactiveacc']);

    $sql = "SELECT * FROM users WHERE password = '$password' AND id = '$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $sql1 = mysqli_query($conn, "UPDATE users SET status = 2 WHERE id = '$inactiveacc'");
        if ($sql1) {
            echo 'inactive';
        } else {
            echo 'error';
        }
    } else {
        echo 'Invalid Password';
    }
}
?>
