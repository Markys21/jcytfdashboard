<?php
if(isset($_POST['uname']) && isset($_POST['pass']) && isset($_POST['txtotp'])){
    include "db_conn.php";
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    $txtotp = $_POST['txtotp'];
    $sql= mysqli_query($conn, "select * from users where user_name = '$uname' and password = '$pass' and otp = '$txtotp'");
    $resulta = mysqli_fetch_array($sql);
    if(mysqli_num_rows($sql)>0){
        session_start();
        $_SESSION['gate1'] = 'enter';
        $_SESSION['offid'] = $resulta['id'];
        echo 'Welcome';
        // echo mysqli_error($conn);
    }else{
        echo 'Error';
    }
    
}else{
    echo'error';
}


?>