<?php
 include_once("connection.php");
 $q = "select * from slider_images";
 $result = mysqli_query($con, $q);
 $count = mysqli_num_rows($result);
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    	<title>Flight - Travel and Tour</title>
    
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/fontAwesome.css">
        <!-- <link rel="stylesheet" href="css/hero-slider.css"> -->
        <link rel="stylesheet" href="css/owl-carousel.css">
        <link rel="stylesheet" href="css/datepicker.css">
        <link rel="stylesheet" href="css/tooplate-style.css">
        <link rel="stylesheet" href="css/navbar.css">


        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>

        <script src="js/currency.js"></script>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


        <script>
    $(document).ready(function(){
        $("#owl-mostvisited").owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            }
        });
    });
</script>

        
    </head>

<body>

    
    <section class="banner" id="top">
        <?php include 'navbar.php'; ?>

        
        

        <div class="container">
            <div class="row">
                
                <!-- <div class="col-md-5">
                    <div class="left-side">
                        <div class="logo">
                            <img src="img/logo.png" alt="Flight Project">
                        </div>
                        <div class="tabs-content">
                            <h4>Choose Your Direction:</h4>
                            <ul class="social-links">
                                <li><a href="http://facebook.com">Find us on <em>Facebook</em><i class="fa fa-facebook"></i></a></li>
                                <li><a href="http://youtube.com">Our <em>YouTube</em> Channel<i class="fa fa-youtube"></i></a></li>
                                <li><a href="http://instagram.com">Follow our <em>instagram</em><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                        <div class="page-direction-button">
                            <a href="contact.html"><i class="fa fa-phone"></i>Contact Us Now</a>
                        </div>
                    </div>
                </div> -->
                <div class="col col-offset-1">
                    <section id="first-tab-group" class="tabgroup">
                        <div id="tab1">
                            <div class="submit-form">
                                <h4>Check availability for direction:</h4>
                                <form id="form-submit" action="" method="get">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <fieldset class="from-to-date">
                                                <label for="from">From:</label>
                                                <select required name='from' onchange='this.form()'>
                                                    <option value="">Select a location...</option>
                                                    <option value="India">Ahemdabad</option>
                                                    <option value="Mumbai">Mumbai</option>
                                                    <option value="Singapore">Singapore</option>
                                                    <option value="Hollywood">Hollywood</option>
                                                    <option value="Tokyo">Tokyo</option>
                                                    <option value="New York">New York</option>
                                                    <option value="Paris">Paris</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-2">
                                            <fieldset>
                                                <label for="to">To:</label>
                                                <select required name='to' onchange='this.form()'>
                                                    <option value="">Select a location...</option>
                                                    <option value="India">Ahemdabad</option>
                                                    <option value="Mumbai">Mumbai</option>
                                                    <option value="Singapore">Singapore</option>
                                                    <option value="Hollywood">Hollywood</option>
                                                    <option value="Tokyo">Tokyo</option>
                                                    <option value="New York">New York</option>
                                                    <option value="Paris">Paris</option>
                                                </select>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-2">
                                            <fieldset>
                                                <label for="passengers" >Passengers:</label>
                                                <input name="passengers" type="text" min="1" value="1" class="form-control" id="passengers" required onchange='this.form()'>
                                            </fieldset>
                                        </div>   
                                                                             
                                        <div class="col-md-2">
                                            <fieldset>
                                                <label for="tclass">class</label>
                                                <select required name='tclass' onchange='this.form()'>
                                                    <option value="">Select travel class...</option>
                                                    <option value="economy">economy</option>
                                                    <option value="Premium economy">Premium economy</option>
                                                    <option value="buiness">buiness</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                        <!-- <div class="col-md-6">
                                            <div class="radio-select">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                                        <label for="round">Round</label>
                                                        <input type="radio" name="trip" id="round" value="round" requiredonchange='this.form.()'>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                                        <label for="oneway">Oneway</label>
                                                        <input type="radio" name="trip" id="oneway" value="one-way" requiredonchange='this.form.()'>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="col-md-4">
                                            <fieldset>  
                                                <button type="submit" id="form-submit" class="btn">Search</button>
                                            </fieldset>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>





    <section id="most-visited">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mx-12 ">
                    <div class="section-heading">
                        <h2>Most Visited Places</h2>
                    </div>
                </div>
                <div class="col-md-12 mx-12 ">
                <div id="owl-mostvisited" class="owl-carousel owl-theme">
    <?php
    while ($a = mysqli_fetch_array($result)) {
    ?>
        <div class="item px-2">
        <div class="visited-item">
        <a href="explore_location.php?location_id=<?php echo $a['id']; ?>">
        <img src="img/<?php echo $a[1]; ?>" alt="ahemdabad">
    </a>
    <div class="text-content">
        <h4><?php echo $a[2]; ?></h4>
        <span><?php echo $a[3]; ?></span>
    </div>
</div>
        </div>
    <?php
    }
    ?>
</div>

                </div>
            </div>
        </div>
    </section>
           
        
        



    <!-- <footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-12">
                <div class="primary-button">
                    <a href="#" class="scroll-top">Back To Top</a>
                </div>
            </div>
            <div class="col-md-12 mx-12">
                <ul class="social-icons">
                    <li><a href="https://www.facebook.com/your-facebook-page-url" target="_blank"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="https://www.twitter.com/your-twitter-page-url" target="_blank"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="https://www.linkedin.com/your-linkedin-page-url" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="https://www.instagram.com/your-instagram-page-url" target="_blank"><i class="fa fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer> -->


    
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="js/vendor/bootstrap.min.js"></script>
    
    <script src="js/datepicker.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(document).ready(function() {

        

        // navigation click actions 
        $('.scroll-link').on('click', function(event){
            event.preventDefault();
            var sectionID = $(this).attr("data-id");
            scrollToID('#' + sectionID, 750);
        });
        // scroll to top action
        $('.scroll-top').on('click', function(event) {
            event.preventDefault();
            $('html, body').animate({scrollTop:0}, 'slow');         
        });
        // mobile nav toggle
        $('#nav-toggle').on('click', function (event) {
            event.preventDefault();
            $('#main-nav').toggleClass("open");
        });
    });
    // scroll function
    function scrollToID(id, speed){
        var offSet = 0;
        var targetOffset = $(id).offset().top - offSet;
        var mainNav = $('#main-nav');
        $('html,body').animate({scrollTop:targetOffset}, speed);
        if (mainNav.hasClass("open")) {
            mainNav.css("height", "1px").removeClass("in").addClass("collapse");
            mainNav.removeClass("open");
        }
    }
    if (typeof console === "undefined") {
        console = {
            log: function() { }
        };
    }
    </script>
</body>
</html>
<?php include 'footer.php';?>