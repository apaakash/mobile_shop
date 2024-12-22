<?php
session_start(); // Start session to check login status

include 'header.php'; // Include the header of the page

$conn = new mysqli('localhost', 'root', '', 'sumit'); // Database connection

// Query to get orders without latitude and longitude
$query = "SELECT id, name, total_price, order_date FROM orders"; // Fetch orders without coordinates
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
    <link rel="stylesheet" href="styles.css"> <!-- Include your CSS file for styling -->
    <style>
        /* Basic Styles for Table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            text-align: left;
            padding: 12px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f4f4f4;
            color: #333;
        }

        td {
            background-color: #fff;
        }

        tr:nth-child(even) td {
            background-color: #f9f9f9;
        }

        .order-table a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }

        .order-table a:hover {
            text-decoration: underline;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .container h1 {
            text-align: center;
            font-size: 2rem;
            color: #333;
        }

        .empty-message {
            text-align: center;
            font-size: 1.2rem;
            color: #888;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>My Orders</h1>

        <?php if (mysqli_num_rows($result) > 0): ?>
            <table class="order-table">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Name</th>
                        <th>Total Price</th>
                        <th>Order Date</th>
                        <th>Track Location</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($order = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>#{$order['id']}</td>
                                <td>{$order['name']}</td>
                                <td>₹{$order['total_price']}</td>
                                <td>{$order['order_date']}</td>
                                <td><a href='map.php?order_id={$order['id']}'>Map Location</a></td>
                            </tr>";
                    }
                    ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="empty-message">You have not placed any orders yet.</p>
        <?php endif; ?>
    </div>
</body>

</html>
