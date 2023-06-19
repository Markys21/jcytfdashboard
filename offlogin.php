<?php

// session_destroy();
// unset($_SESSION['id']);
include "db_conn.php";
session_start();
if (isset($_POST['uname']) && isset($_POST['pass'])) {

	function validate($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$uname = validate($_POST['uname']);

	$pass = validate($_POST['pass']);

	if (empty($uname)) {
		header("Location: index.php?error=User Name is required");
		exit();
	} else if (empty($pass)) {
		header("Location: index.php?error=Password is required");
		exit();
	} else {
		$sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass' AND status = '1' AND roleid = 'user'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$otp = "";
			$numbers = array();
			for ($i = 0; $i < 6; $i++) {
			$otp .= rand(1,9); // Generates a random number between 1 and 49 (inclusive)
			}
			
			// echo $otp;
			
			$row = mysqli_fetch_assoc($result);
			if ($row['user_name'] === $uname && $row['password'] === $pass) {
				$_SESSION['user_name'] = $row['user_name'];
				$_SESSION['email'] = $row['email'];
				$useremail = $_SESSION['email'];

				$_SESSION['id'] = $row['id'];
				$userid = $row['id'];
				mysqli_query($conn, "update users set otp = '$otp', time = '02:00' where id = '$userid'");
				require './PHPMailer/src/PHPMailer.php';
				require './PHPMailer/src/SMTP.php';
				require './PHPMailer/src/Exception.php';
				$mail = new PHPMailer\PHPMailer\PHPMailer();

				try {
					$mail->isSMTP();
					$mail->SMTPAuth = true;
					$mail->SMTPSecure = 'tls';
					$mail->Host = 'smtp.gmail.com';
					$mail->Port = 587;
					$mail->Username = 'jcytfchurch92@gmail.com';
					$mail->Password = 'txncdnjbiolxvxvs';
					$mail->setFrom('jcytfchurch92@gmail.com', 'JCYTF');
					$mail->addAddress($useremail);
					

					//Table
					$table = '<table style="border-collapse: collapse; width: 1000px; height margin: 0 auto; text-align: center;">';
					// $table .= '<tr style="background-color: #d97706;">';
					$table .= '<center>';
					$table .= '<tr>';
					$table .= '<td style="font-size:16px; ; font-weight:600; text-align:left;"><strong>Hello ' . $uname . ', <br>To complete JCYTF verification, please use the code: </br></strong></td>';
					$table .= '</tr>';
					$table .= '<tr>';
					$table .= '<td style="padding: 30px; background-color: #d97706; height:96px; margin-top:20px; border-radius:4px; line-height: 96px; text-align:center; font-size: 32px; font-weight:900p;"><strong>' . $otp . '</strong></td>';
					$table .= '</tr>';
					$table .= '<td style="font-size:12px; font-weight:600; color:#626262; line-height: 17px; margin-top: 20px; margin:0;">The code can be used only once and will expire in 2 minutes. If you didn\'t request the code, please disregard this email. This is an automatically generated email, please do not reply to it.</td>';
					$table .= '<tr style="border-bottom: 5px solid #ccc;">';
					$table .= '<td style="margin: 0; text-align: left; font-size:12px; font-weight:400; color: #858585; line-height:17px;">© Jesus Christ Yesterday, Today and Forever All Right Reserved.</td>';
					$table .= '</tr>';
					$table .= '</center>';
					$table .= '</table>';

					$mail->isHTML(true);
					$mail->Body = $table;

					$mail->ContentType = 'text/html';
					$mail->CharSet = 'UTF-8';
					$mail->send();
					echo 'Correct';
				} catch (Exception $e) {
					echo 'Failed to send email. Error:' . $mail->ErrorInfo;

				}



				
			} else {
				header("Location: index.php?error=Incorect Username or password");
				exit();
			}
		} else {
			echo 'Error';
			
		}
	}

} else {
	header("Location: offindex.php");
	exit();
}

?>