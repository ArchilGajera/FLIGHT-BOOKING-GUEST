

<?php

include 'connection.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('PHPMailer\PHPMailer.php');
require('PHPMailer\SMTP.php');
require('PHPMailer\Exception.php');

?>
<?php include 'navbar.php'; ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Page</title>
    <link rel="stylesheet" href="css/signup.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="css/tooplate-style.css">
    <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    <style>
       .error {
        color: red;
       }
    </style>
   
   
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form id="signup-form" method="post">
                    <div class="form-group">
                        <label for="first-name" style="color:white; font-weight:bold;">First Name:</label>
                        <input type="text" class="form-control" id="fn" name="fn">
                        <span id="fn_err" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="email" style="color:white; font-weight:bold;">Email address:</label>
                        <input type="email" class="form-control" id="em" name="em">
                        <span id="em_err" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="password" style="color:white; font-weight:bold;">Password:</label>
                        <input type="password" class="form-control" id="pw" name="pw">
                        <span id="pw_err" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="confirm-password" style="color:white; font-weight:bold;">Confirm Password:</label>
                        <input type="password" class="form-control" id="cpw" name="cpw">
                        <span id="cpw_err" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                    <label for="file1"><b>Select Profile Picture:</b></label>
                    <input type="file" class="form-control" id="file1" name="pic">
                    <span id="file1_err"></span>
                </div>
                    <button class="btn btn-secondary" onclick="javascript:window.location.href='index.php'" style="color:white; font-weight:bold;">Home</button>
                   <div> <br> </div>
                   <input type="submit" class="btn btn-primary col-md-12" value="Submit" name="btn" style="color:white; font-weight:bold;">
                    <!-- <button type="submit" class="btn btn-primary" style="color:white; font-weight:bold;">Submit</button> -->
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#signup-form').validate({
                rules: {
                    fn: {
                        required: true,
                        minlength: 2,
                        maxlength: 30
                    },
                    em: {
                        required: true,
                        email: true
                    },
                    pw: {
                        required: true,
                        minlength: 5,
                        maxlength: 30
                    },
                    cpw: {
                        required: true,
                        minlength: 5,
                        maxlength: 30,
                        equalTo: "#pw"
                    }
                },
                messages: {
                   fn: {
                    required:  "Please enter your first name."
                   },
                   em: {
                    required:"Please enter your email address."
                   },
                   pw: {
                    required:"Please enter your password."
                   },
                   cpw: {
                    required: "Please provide a password.",
                    equalTo: "Your password and confirmation password must match."
                   }
                },
                errorPlacement: function (error, element) {
                    if (element.attr('id') == "fn") {
                        $('#fn_err').html(error);
                    } else if (element.attr('id') == "ln") {
                        $('#ln_err').html(error);
                    } else if (element.attr('id') == "em") {
                        $('#em_err').html(error);
                    } else if (element.attr('id') == "pw") {
                        $('#pw_err').html(error);
                    } else if (element.attr('id') == "cpw") {
                        $('#cpw_err').html(error);
                    }
                }
            });
        });
    </script>
</body>

<?php
if (isset($_POST['btn'])) {
    $fn = $_POST['fn'];
    $em = $_POST['em'];
    $pw = $_POST['pw'];
    $pic = $_FILES['pic']['name'];  
    $token = uniqid() . uniqid();
    $pic_name = uniqid() . $pic;

    $q = "INSERT INTO `registration`(`fullname`, `email`, `password`, `profile_pic`,`token`) VALUES ('$fn','$em','$pw','$pic_name','$token')";

    if (mysqli_query($con, $q)) {
        if (!is_dir("img/profile_pictures")) {
            mkdir("img/profile_pictures");
        }
        move_uploaded_file($_FILES['pic']['tmp_name'], "img/profile_pictures/" . $pic_name);
        $mail = new PHPMailer();
        try {
            // Server settings
            $mail->isSMTP(); // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = 'archilgajera203@gmail.com'; // SMTP username
            $mail->Password = 'gkig eiqt lwtf vzvh'; // SMTP password
            $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465; // TCP port to connect to
            // $mail->SMTPDebug = 2;

            // Recipients
            $mail->setFrom('archilgajera203@gmail.com', 'Archil Gajera'); // Sender's email address and name
            $mail->addAddress($em, $fn); // Recipient's email address and name

            // Attachments
            //$mail->addAttachment('/path/to/attachment/file.pdf', 'Attachment.pdf'); // Path to the attachment and optional filename

            // Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'Account Verification';
            $mail->Body    = 'Congratulations! ' . $fn . ' Your account has been created successfully. This email is for your account verification. <br> Kindly click on the link below to verify your account. You will be able to login into your account only after account verification. <br>
            <a href="http://localhost/btech/Sample_A/verify_account.php?em=' . $em . '&token=' . $token . '">Click here to verify your account</a>';

            // Send the email
            if ($mail->send()) {
                setcookie("success", "Registration Successfull. Activation mail is sent to your registered email account. Kindly activate your account to login.", time() + 2, "/");
?>
                <script>
                    window.location.href = "login.php";
                </script>
            <?php
            } else {
                setcookie("error", "Error in sending mail. Please try again later.", time() + 2, "/");
            ?>
                <script>
                    window.location.href = "signup.php";
                </script>
        <?php
            }
        } catch (Exception $e) {
            echo "Email sending failed. Error: {$mail->ErrorInfo}";
        }
    } else {
        setcookie("error", "Error in registration. Please try again later.", time() + 2, "/");
        ?>
        <script>
            window.location.href = "signup.php";
        </script>
<?php
    }
}