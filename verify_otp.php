<?php
session_start();
include 'connection.php'; // Assuming this file contains the database connection details

if (isset($_POST['otp']) && !empty($_POST['otp'])) {
    $enteredOTP = $_POST['otp'];

    // Query to fetch the OTP record from the database based on the entered OTP
    $stmt = $conn->prepare("SELECT * FROM token WHERE OTP = ?");
    $stmt->bind_param("i", $enteredOTP);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Correct OTP
        $_SESSION['otp_verified'] = true;
        header("Location: new_password.php");
        exit();
    } else {
        // Incorrect OTP
        $_SESSION['error'] = "Invalid OTP. Please try again.";
        header("Location: Forgot_password_otp.php");
        exit();
    }
} else {
    $_SESSION['error'] = "OTP is missing.";
    header("Location: Forgot_password_otp.php");
    exit();
}
?>
