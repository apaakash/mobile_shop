<?php
session_start();

$conn = new mysqli('localhost', 'root', '', 'sumit');

// Get the order_id from the URL
$order_id = isset($_GET['order_id']) ? $_GET['order_id'] : null;

// Initialize variables
$lat = $lng = null;
$city = $street = "";

// Fetch the coordinates of the selected order based on the order_id
if ($order_id) {
    $stmt = $conn->prepare("SELECT city1, street, latitude, longitude FROM orders WHERE id = ?");
    $stmt->bind_param("i", $order_id); // Bind the order_id to the prepared statement
    $stmt->execute();
    $stmt->bind_result($city, $street, $lat, $lng);
    $stmt->fetch();
    $stmt->close();
}

$conn->close();

// If coordinates are missing, redirect or display an error (optional)
if ($lat === null || $lng === null) {
    echo "<script>alert('Coordinates not found for this order!');</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Map Display</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC8ocCj74IPASUxqc0j03wfjK2_beZXCtM&callback=initMap" async defer></script>
    <style>
        #map {
            height: 400px;
            width: 100%;
        }

        #btn {
            font-size: 30px;
            color: black;
            text-decoration: none;
            padding-left: 500px;
            font-weight: normal;
        }
    </style>
</head>

<body>

    <h1>Your Order Location: <small><?php echo htmlspecialchars($city); ?> ,<?php echo htmlspecialchars($street); ?></small> <a href="myorder.php" id="btn">My Orders</a></h1>

    

    <div id="map"></div>


    <script>
        let map;
        let marker;

        function initMap() {
            const coordinates = {
                lat: <?php echo $lat; ?>,
                lng: <?php echo $lng; ?>
            };

            map = new google.maps.Map(document.getElementById('map'), {
                center: coordinates,
                zoom: 15,
            });

            marker = new google.maps.Marker({
                position: coordinates,
                map: map,
                title: '<?php echo htmlspecialchars($street . ", " . $city); ?>' // Display street and city in marker title
            });
        }
    </script>

</body>

</html>