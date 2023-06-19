<?php
if (isset($_POST['password']) && isset($_POST['id'])) {
    include "db_conn.php";
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $id = mysqli_real_escape_string($conn, $_POST['id']);

    $sql = "SELECT * FROM users WHERE password = '$password' AND id = '$id'";
    $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) === 1) {
        // Password is correct
      if(isset($_POST['eventdecline']) && isset($_POST['reason'])){
    include 'connection.php';
    $reason = $_POST['reason'];
    $eventdecline = $_POST['eventdecline'];
    $sql = mysqli_query($con, "update tblevents set status = 4, reason = '$reason' where id='$eventdecline'");
    if($sql){
        echo 'Successfully Declined';
    }else{
        echo 'error';
    }


}
    } else {
        // Password is incorrect
        echo 'Incorrect Password';
    }
}


?>
