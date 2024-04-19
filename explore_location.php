








<?php
include_once("connection.php");
include 'navbar.php';

// Check if location_id is set in the URL
if(isset($_GET['location_id'])) {
    // Get the location_id from the URL
    $location_id = $_GET['location_id'];
    
    // Query to fetch details of the selected photo based on its ID
    $q = "SELECT * FROM slider_images WHERE id = $location_id";
    $result = mysqli_query($con, $q);
    
    // Check if any result is found
    if(mysqli_num_rows($result) > 0) {
        // Fetch the details of the selected photo
        $a = mysqli_fetch_assoc($result);

        // Query to fetch hotel data based on location_id
        $hotels_query = "SELECT * FROM hotels WHERE location_id = $location_id";
        $hotels_result = mysqli_query($con, $hotels_query);
        
        // Query to fetch explore location data based on location_id
        $explore_location_query = "SELECT * FROM explore_location WHERE slider_image_id = $location_id";
        $explore_location_result = mysqli_query($con, $explore_location_query);
?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Explore Location</title>
        <link rel="stylesheet" href="css/login.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
        <!-- <link rel="stylesheet" href="css/tooplate-style.css"> -->
        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>

        <!-- <link rel="stylesheet" href="css/tooplate-style.css"> -->

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-vImzyWHZN4dD+QXOh5PSCOI/qVthmu7rjeNhwSBD9mdvB2ldR1HTZ3WM6R+24KGtqff4lBp3eRMwUHaKbYVqHg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
       <style>
        /* Style for hotel container */
        .hotel-container {
            font-family: serif;
            text-align: center; /* Center align hotel components */
        }

        /* Style for each hotel */
        .hotel {
            display: inline-block; /* Display hotels side by side */
            width: calc(33.33% - 20px); /* Adjust width to fit three hotels per row */
            margin: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            vertical-align: top; /* Align hotels to top of container */
            color: white; /* Set text color to white */
        }

        /* Style for hotel links */
        .hotel-links {
            margin-top: 10px; /* Add some margin above the links */
        }

        /* Style for the "View on Map" link */
        .map-link {
            margin-right: 10px; /* Add margin between the links */
            color: white; /* Set text color to white */
        }


            /* Style for explore page images */
    .explore-image {
        width: 100%; /* Ensure the image takes up the full width of its container */
        height: 300px; /* Set a fixed height for all images */
        object-fit: cover; /* Maintain aspect ratio and crop image if needed */
    }

    </style>
    </head>

   

    <!-- Display explore location information -->
    <div class="explore-location-container" style="font-family: serif; font-size: 20px;">
        <?php 
        if(mysqli_num_rows($explore_location_result) > 0) {
            while($explore_location_row = mysqli_fetch_assoc($explore_location_result)) {
        ?>
                <div class="visited-item" style="text-align: center;">
                    <!-- Display explore location image and description -->
                    <img src="img/<?php echo $explore_location_row['image_name']; ?>" alt="<?php echo $explore_location_row['Location']; ?>">
                    <div class="text-content">
                        <h5 style="color: white;"><?php echo $explore_location_row['Location']; ?></h5>
                        <span style="color: white;"><?php echo $explore_location_row['description']; ?></span> 
                    </div>
                </div>
        <?php
            }
        } else {
            echo "No explore locations found for this location.";
        }
        ?>
    </div>

    <!-- Display hotel information -->
    <div class="hotel-container">
        <?php 
        if(mysqli_num_rows($hotels_result) > 0) {
            while($hotels_row = mysqli_fetch_assoc($hotels_result)) {
        ?>
                <div class="raw hotel">
                    <h4><?php echo $hotels_row['name']; ?></h4>
                    <p><?php echo $hotels_row['address']; ?></p>
                    <div class="hotel-links">
                        <a href="<?php echo $hotels_row['maps_url']; ?>" class="map-link" target="_blank">View on Map</a>
                        <a href="<?php echo $hotels_row['website']; ?>"  style="color:white;" target="_blank">Check Hotel</a>
                    </div>
                </div><br>
        <?php
            }
        } else {
            echo "No hotels found for this location.";
        }
        ?>
    </div>

<?php
    } else {
        // Handle the case if no matching photo is found
        echo "No location found.";
    }
} else {
    // Handle the case if location_id is not set in the URL
    echo "Location ID not provided.";
}
?>
