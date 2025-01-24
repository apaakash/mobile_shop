<?php
include "header.php";
$conn = new mysqli('localhost', 'root', '', 'sumit');

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    $query = "SELECT * FROM orders WHERE id = '$order_id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $city1 = $row['city1'];
        $street = $row['street'];
        $latitude = isset($row['latitude']) ? $row['latitude'] : '';  // Default to empty if not set
        $longitude = isset($row['longitude']) ? $row['longitude'] : '';  // Default to empty if not set
    } else {
        echo "<script>alert('Order not found!');</script>";
        exit();
    }
} else {
    echo "<script>alert('Order ID is missing!');</script>";
    exit();
}

if (isset($_POST['update'])) {
    $city1 = $_POST['city1'];
    $street = $_POST['street'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    $update_query = "UPDATE orders SET city1 = '$city1', street = '$street', latitude = '$latitude', longitude = '$longitude' WHERE id = '$order_id'";

    if (mysqli_query($conn, $update_query)) {
        echo "<script>alert('Order has been updated successfully');</script>";
        echo "<script>window.location.href='order.php';</script>";
    } else {
        echo "<script>alert('Failed to update the order');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Order</title>
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }

        .container {
            width: 50%;
            margin: auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .container h1 {
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .form-group button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
        }

        .form-group button:hover {
            background-color: #218838;
        }
    </style>
    <script>
        // handle auto-fill of latitude and longitude based on selected city and street
        const locations = {
            "Silvassa": [{
                    name: "Main Road",
                    lat: 20.2765,
                    lng: 73.0202
                },
                {
                    name: "Dadra Road",
                    lat: 20.2745,
                    lng: 73.0250
                },
                {
                    name: "Vasona",
                    lat: 20.2690,
                    lng: 73.0335
                },
                {
                    name: "Silvassa - Daman Road",
                    lat: 20.2830,
                    lng: 73.0125
                },
                {
                    name: "Khanvel",
                    lat: 20.2080,
                    lng: 73.0500
                },
                {
                    name: "Dokmardi",
                    lat: 20.3235,
                    lng: 73.0198
                },
                {
                    name: "Ambica Nagar",
                    lat: 20.2750,
                    lng: 73.0300
                },
                {
                    name: "Moti Daman",
                    lat: 20.2900,
                    lng: 73.0175
                },
                {
                    name: "Government Quarter",
                    lat: 20.2780,
                    lng: 73.0230
                }
            ],
            "Vapi": [{
                    name: "GIDC Vapi",
                    lat: 20.3662,
                    lng: 72.9226
                },
                {
                    name: "Vapi - Daman Road",
                    lat: 20.3670,
                    lng: 72.9125
                },
                {
                    name: "Vapi Bypass",
                    lat: 20.3735,
                    lng: 72.9333
                },
                {
                    name: "Vapi Industrial Area",
                    lat: 20.3685,
                    lng: 72.9260
                },
                {
                    name: "Vapi Railway Station",
                    lat: 20.3575,
                    lng: 72.9265
                },
                {
                    name: "Hanuman Mandir Road",
                    lat: 20.3600,
                    lng: 72.9250
                },
                {
                    name: "Surat - Vapi Road",
                    lat: 20.3815,
                    lng: 72.9395
                }
            ]
        };


        function updateCoordinates() {
            var city = document.getElementById("city1").value;
            var street = document.getElementById("street").value;

            if (city && street) {
                // Find the selected street and get the corresponding coordinates
                var selectedLocation = locations[city].find(location => location.name === street);

                if (selectedLocation) {
                    document.getElementById("latitude").value = selectedLocation.lat;
                    document.getElementById("longitude").value = selectedLocation.lng;
                } else {
                    document.getElementById("latitude").value = '';
                    document.getElementById("longitude").value = '';
                }
            }
        }

        // Function to populate street dropdown based on selected city
        function updateStreets() {
            var city = document.getElementById("city1").value;
            var streetSelect = document.getElementById("street");
            streetSelect.innerHTML = '<option value="">Select Street</option>'; // Clear existing options

            if (city && locations[city]) {
                locations[city].forEach(function(location) {
                    var option = document.createElement("option");
                    option.value = location.name;
                    option.text = location.name;
                    streetSelect.appendChild(option);
                });
            }
        }
    </script>
</head>

<body>
    <div class="container">
        <h1>Update Order</h1>
        <form action="update_order.php?order_id=<?php echo $order_id; ?>" method="POST">
            <div class="form-group">
                <label for="city1">City1:</label>
                <select id="city1" name="city1" onchange="updateStreets(); updateCoordinates()" required>
                    <option value="">Select City</option>
                    <option value="Silvassa" <?php if ($city1 == "Silvassa") echo "selected"; ?>>Silvassa</option>
                    <option value="Vapi" <?php if ($city1 == "Vapi") echo "selected"; ?>>Vapi</option>
                </select>
            </div>
            <div class="form-group">
                <label for="street">Street:</label>
                <select id="street" name="street" onchange="updateCoordinates()" required>
                    <option value="">Select Street</option>
                    <!-- Streets will be populated based on city selection -->
                </select>
            </div>
            <div class="form-group">
                <label for="latitude">Latitude:</label>
                <input type="text" id="latitude" name="latitude" value="<?php echo $latitude; ?>" required>
            </div>
            <div class="form-group">
                <label for="longitude">Longitude:</label>
                <input type="text" id="longitude" name="longitude" value="<?php echo $longitude; ?>" required>
            </div>
            <div class="form-group">
                <button type="submit" name="update">Update Order</button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            updateStreets(); // Populate streets based on the pre-selected city
            updateCoordinates(); // Populate latitude and longitude based on the selected street
        });
    </script>
</body>

</html>