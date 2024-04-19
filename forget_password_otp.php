<?php include 'navbar.php'?>
<link rel="stylesheet" href="css/login.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="css/tooplate-style.css">
    <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    <title>Otp verification</title>
    <style>
      #home-button{
        /* margin-right: 10px;
        margin-bottom: 10px;*/
      }

      /* Set maximum width for container and center it on the page*/
      .container-fluid{
        max-width: 600px;
        margin: 0 auto;
      }

      /* Adjust form layout for smaller screens*/
      @media (max-width: 767px){
        .form-group{
          margin-bottom: 1rem;
        }

        .btn-secondary, .btn-primary{
          width: 100%;
        }

        .col-md-6, .col-md-offset-3{
          width: 100%;
          margin: 0;
        }
      }

      /* Adjust form layout for landscape orientation on mobile devices*/
      @media (max-width: 480px) and (orientation: landscape){
        .form-group{
          margin-bottom: 0.5rem;
        }

        .btn-secondary, .btn-primary{
          width: 100%;
          margin-bottom: 0.5rem;
        }
      }

      /* Adjust form layout for portrait orientation on mobile devices*/
      @media (max-width: 480px) and (orientation: portrait){
        .form-group{
          margin-bottom: 1rem;
        }

        .btn-secondary, .btn-primary{
          width: 100%;
        }
      }
      .error {
        color:red;
      }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<script>
    function startTimer(duration, display) {
        var timer = duration,
            minutes, seconds;
        setInterval(function() {
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds;

            if (--timer < 0) {
                timer = 0;
            }
        }, 1000);
    }
    window.onload = function() {
        var oneMinute = 60,
            display = document.getElementById('#timer');

        startTimer(oneMinute, display);
    };

    function enable_reset_btn() {
        document.getElementById("r_btn").disabled = false;
    }
    setTimeout(enable_reset_btn, 60000);
</script>
<div class="container">
    <div class="row">
        <div class=col-lg-3></div>
        <div class=col-lg-6>
            <h2>OTP Verification</h2>
            <form action="forget_password_otp_action.php" method="post" id="form1">
                <div class="form-group">
                    <label for="otp1">Enter OTP:</label>
                    <input type="number" class="form-control" id="otp1" name="otp">
                    <span id="otp_err"></span>
                    <div>OTP will expire in <span id="timer">01:00</span></div>
                </div>

                 <input type="submit" class="btn" value="Verify OTP" name="btn" />
                <a href="resend_otp.php"> <input type="button" class="btn" value="Resend OTP" name="resend_btn" id="r_btn" disabled /></a>
            </form>
        </div>
    </div>
</div>
<br>
