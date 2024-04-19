<?php include 'navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/login.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="css/tooplate-style.css">
    <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>

    <!-- <link rel="stylesheet" href="css/tooplate-style.css"> -->
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
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form id="form1">
                    <div class="form-group">
                     <label for="email"  style="color:white; font-weight:bold; ">Email address:</label>
                        <input type="email" name="em" class="form-control"  id="em1">
                        <span id="em_err" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                    <label for="password" style="color:white;font-weight:bold; ">Password:</label>
                       <input type="password" name="pw" class="form-control"  id="pw1">
                      <span id="pw_err" class="text-danger" style="color:red;"></span> 
                    </div>
                    <button class="btn btn-secondary" onclick="javascript:window.location.href='forget_password.php'" style="color:white;font-weight:bold; " > Forget Password ? </button>
                    <div><br></div>
                    <button type="submit" class="btn btn-primary" style="color:white;font-weight:bold; " >Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script>
$(document).ready(function() {
    $.validator.addMethod("emregex",function(value, element) {
        var emRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        return emRegex.test(value);
    }, "Please enter a valid email address");
    $('#form1').validate({
        rules: {
            em: {
                required: true,
                emregex: true
            },
            pw: {
                required: true,
                minlength: 5,
                maxlength: 30,
                emregex: false
            }
        },
        messages:{
            pw: {
                required: "password is a required field",
                minlength: "password has atleast 5 characters",
                maxlength: "password has maximum 30 characters",
                emregex: "Please enter a valid password"
            }
        },
        errorPlacement: function (error, element) {
            if (element.attr('name') == "em") {
                $('#em_err').html(error);
            } else if (element.attr('name') == "pw") {

                $('#pw_err').html(error);
                
            }
        }
    });
});
    </script>
</body>
</html>