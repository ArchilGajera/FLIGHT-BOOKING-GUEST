<?php

include 'connection.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require('PHPMailer\PHPMailer.php');
require('PHPMailer\SMTP.php');
require('PHPMailer\Exception.php');

if (isset($_POST['btn'])) {
    $em = $_POST['em'];
    $q2 = "SELECT * FROM registration WHERE email='$em'";
    $result = mysqli_query($con, $q2);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $q1 = "SELECT * FROM token WHERE Email='$em'";
        $countem = mysqli_num_rows(mysqli_query($con, $q1));
        if ($countem == 1) {
            $error_msg = "OTP for resetting password is sent to your registered email address. New OTP will be generated if the old OTP expires";
            header("Location: forget_password_otp.php?error_msg=" . urlencode($error_msg));
            exit();
        } else {
            date_default_timezone_set("Asia/Kolkata");
            $s_time = date("Y-m-d G:i:s");
            $token = hash('sha512', $s_time);
            $otp = mt_rand(100000, 999999);
            $ins_token = "INSERT INTO token VALUES ('','$em','$s_time','$token',$otp)";
            if (mysqli_query($con, $ins_token)) {
                $mail = new PHPMailer();
                try {
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'archilgajera203@gmail.com';
                    $mail->Password = 'gkig eiqt lwtf vzvh';
                    $mail->SMTPSecure = 'ssl';
                    $mail->Port = 465;
                    $_SESSION['forget_em'] = $em;
                    $_SESSION['forget_token'] = $token;
                    $mail->setFrom('archilgajera203@gmail.com', 'Archil Gajera');
                    while ($row = mysqli_fetch_array($result)) {
                        $mail->addAddress($em, $row[0]);
                    }
                    $mail->isHTML(true);
                    $mail->Subject = 'Password Reset';
                    $mail->Body = 'Your OTP to reset your account password is ' . $otp;
                    if ($mail->send()) {
                        $error_msg = "OTP to reset your password is sent to your registered email address";
                        header("Location: forget_password_otp.php?error_msg=" . urlencode($error_msg));
                        exit();
                    } else {
                        $error_msg = "Error in sending OTP. Please try again later.";
                        header("Location: forget_password.php?error_msg=" . urlencode($error_msg));
                        exit();
                    }
                } catch (Exception $e) {
                    echo "Email sending failed. Error: {$mail->ErrorInfo}";
                }
            } else {
                $error_msg = "Email is not registered";
                header("Location: forget_password.php?error_msg=" . urlencode($error_msg));
                exit();
            }
        }
    } else {
        $error_msg = "Email not found in our records. Please register first.";
        header("Location: forget_password.php?error_msg=" . urlencode($error_msg));
        exit();
    }
}
?>