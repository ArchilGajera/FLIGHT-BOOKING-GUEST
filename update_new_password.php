<?php
include 'connection.php';

if (isset($_POST['btn'])) {
    $email = $_POST['email'];
    $pwd = $_POST['pswd'];
    
    // Update password
    $update_query = "UPDATE registration SET password=? WHERE email=?";
    $stmt = $con->prepare($update_query);
    $stmt->bind_param("ss", $pwd, $email);
    
    if ($stmt->execute()) {
        // Password updated successfully
        
        // Delete token
        $delete_token_query = "DELETE FROM token WHERE Email=?";
        $stmt = $con->prepare($delete_token_query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        
        // Redirect to login page with success message
        setcookie('success', "Password updated successfully", time() + 2, "/");
        header("Location: login.php");
        exit();
    } else {
        // Error updating password
        setcookie('error', 'Error updating password', time() + 2, "/");
        header("Location: new_password.php"); // Redirect back to new password page
        exit();
    }
}
?>
