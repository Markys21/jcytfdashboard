<?php
session_start();
include "db_conn.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';
require './PHPMailer/src/Exception.php';

function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function updateAccount($conn, $password, $unameedit, $contactedit, $emailedit, $passedit, $repassedit, $roleidedit, $updateaccountid)
{
    if ($password === '') {
        $result = array('status' => 'error', 'message' => 'Password Required');
    } else {
        $password = mysqli_real_escape_string($conn, $password);
        $id = $_SESSION['id']; // Retrieve the 'id' from the session
        $sql = "SELECT * FROM users WHERE password = '$password' AND id = '$id' AND status = '1'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $unameedit = validate($unameedit);
            $contactedit = validate($contactedit);
            $emailedit = validate($emailedit);
            $passedit = validate($passedit);
            $repassedit = validate($repassedit);
            $roleidedit = validate($roleidedit);
            $updateaccountid = validate($updateaccountid);

            // Check if the username or email already exists for other users
            $sqltest = mysqli_query($conn, "SELECT * FROM users WHERE user_name = '$unameedit' OR email = '$emailedit'");
            if (mysqli_num_rows($sqltest) > 0) {
                $result = array('status' => 'error', 'message' => 'Username or email is already in use by another user.');
            } else {
                // Update the user account information only if it's the currently logged-in account
                $sql = "UPDATE users SET user_name = '$unameedit', password = '$passedit', contact = '$contactedit', email = '$emailedit', roleid = '$roleidedit', status = '1' WHERE md5(id) = '$updateaccountid'";

                if (mysqli_query($conn, $sql)) {
                    $mail = new PHPMailer();
                    try {
                        $mail->isSMTP();
                        $mail->SMTPAuth = true;
                        $mail->SMTPSecure = 'tls';
                        $mail->Host = 'smtp.gmail.com';
                        $mail->Port = 587;
                        $mail->Username = 'jcytfchurch92@gmail.com'; // Replace with your Gmail email address
                        $mail->Password = 'txncdnjbiolxvxvs'; // Replace with your Gmail password
                        $mail->setFrom('jcytfchurch92@gmail.com', 'JCYTF'); // Replace with your Gmail email address and desired sender name
                        $mail->addAddress($emailedit); // Add recipient email address

                        // Email content
                        $message = '
                            <table style="border-collapse: collapse; width: 1000px; margin: 0 auto; text-align: center;">
                                <tr>
                                    <td style="font-size: 16px; font-weight: 600; text-align: left; padding: 20px 0;"><strong>Hello ' . $unameedit . ',</strong></td>
                                </tr>
                                <tr>
                                    <td style="padding: 30px; background-color: #d97706; border-radius: 4px; font-size: 24px; font-weight: bold; color: #fff;">
                                        Your account details have been updated.</td>
                                </tr>
                                <tr>
                                    <td style="padding: 30px 0; font-size: 20px;"><strong>Username:</strong> ' . $unameedit . '</td>
                                </tr>
                                <tr>
                                    <td style="padding: 0 0 30px; font-size: 20px;"><strong>Password:</strong> ' . $passedit . '</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 16px; font-weight: 600; color: #626262; line-height: 22px;">Please keep this information confidential and do not share it with others.</td>
                                </tr>
                                <tr>
                                    <td style="border-bottom: 5px solid #ccc;"></td>
                                </tr>
                                <tr>
                                    <td style="margin: 0; text-align: left; font-size: 12px; font-weight: 400; color: #858585; line-height: 22px; padding: 10px 0;">&copy; Jesus Christ Yesterday, Today and Forever. All Rights Reserved.</td>
                                </tr>
                            </table>';

                        $mail->isHTML(true);
                        $mail->Subject = 'Account Details Updated';
                        $mail->Body = $message;
                        $mail->Subject = 'Jesus Christ Yesterday, Today, and Forever: Your Account';
                        $mail->ContentType = 'text/html';
                        $mail->CharSet = 'UTF-8';
                        $mail->send();

                        $result = array('status' => 'success');
                    } catch (Exception $e) {
                        $result = array('status' => 'error', 'message' => 'Failed to send email. Error: ' . $mail->ErrorInfo);
                    }
                } else {
                    $result = array('status' => 'error', 'message' => 'Failed to update account.');
                }
            }
        } else {
            $result = array('status' => 'error', 'message' => 'Invalid Password');
        }
    }

    return $result;
}

if (isset($_POST['password'])) {
    $password = $_POST['password'];
    $result = updateAccount($conn, $password, $_POST['unameedit'], $_POST['contactedit'], $_POST['emailedit'], $_POST['passedit'], $_POST['repassedit'], $_POST['roleidedit'], $_POST['updateaccountid']);
    echo json_encode($result);
}
?>
