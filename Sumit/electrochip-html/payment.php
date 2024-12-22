<?php
session_start(); // Start the session
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login or index page
    header('Location: index.php');
    exit(); // Stop further execution of the script
}

include 'header.php';
?>
<?php

$conn = new mysqli('localhost', 'root', '', 'sumit');

if (isset($_POST['order_btn'])) {
    $name = $_POST['name'];
    $number = $_POST['number'];
    $method = $_POST['method'];
    $flat = $_POST['flat'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $pin_code = $_POST['pin_code'];

    $cart_query = mysqli_query($conn, "SELECT SUM(quantity) AS total_quantity, SUM(price * quantity) AS total_price FROM cart");
    $cart_result = mysqli_fetch_assoc($cart_query);

    $total_quantity = $cart_result['total_quantity'];
    $total_price = $cart_result['total_price'];

    $detail_query = mysqli_query($conn, "INSERT INTO orders(name, number, method, flat, city, state, country, pin_code, total_quantity, total_price) 
    VALUES('$name','$number','$method','$flat','$city','$state','$country','$pin_code', '$total_quantity', '$total_price')");

    if ($detail_query == true) {
        mysqli_query($conn, "DELETE FROM cart");

        echo "
        <div class='card order-card'>
            <h2>Your Address</h2>
                <ul class='card1'>
                    <li><strong>Name: </strong> " . $name . "</li>
                    <li><strong>Number: </strong> " . $number . "</li>
                    <li><strong>Address: </strong> " . $flat . "</li>
                    <li><strong>City: </strong> " . $city . "</li>
                    <li><strong>State: </strong> " . $state . "</li>
                    <li><strong>Country: </strong> " . $country . "</li>
                    <li><strong>Total-Quantity: </strong> " . $total_quantity . "</li>
                    <li><strong>Total-Price: ₹</strong>" . $total_price . "</li>
                    <li><strong>Payment-Method: </strong>" . $method . "</li>
                    <li><strong>Payment Successful <i class='bi bi-patch-check-fill'></i></strong></li>
                    
                </ul>
            <a href='shop.php' class='btn btn-success bt'>Continue Shopping</a>
        </div>
";
    }
}
?>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .form-container {
        background-color: white;
        padding: 20px;
        border-radius: 30px;
        width: 80%;
        max-width: 800px;
        margin: 30px;
        margin-top: 30px;
        margin-left: 20%;
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
        background-color: #fff;
        padding: 10px 0;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        z-index: 10;
    }

    form {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
    }

    .input-box {
        flex: 1 1 calc(50% - 20px);
        min-width: 200px;
    }

    .input-box label {
        display: block;
        margin-bottom: 5px;
        color: #333;
    }

    .input-box input,
    .input-box select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        outline: none;
    }

    .input-box input:focus,
    .input-box select:focus {
        border-color: #007bff;
    }

    .submit-box {
        text-align: center;
        flex-basis: 100%;
        margin-top: 20px;
    }

    .submit-box input {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    .submit-box input:hover {
        background-color: #0056b3;
    }

    .shop_btn {
        padding: 20px;
        background-color: blue;
        border-radius: 5px;
        color: white;
    }

    .card,
    .order-card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
        width: 50%;
        position: relative;
        background-color: lightblue;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 10px;
        margin: 30px 50px;
        z-index: 100;
        max-height: 400px;
        overflow-y: auto;
    }

    .card1 {
        font-size: 20px;
        padding-left: 10%;
        list-style-type: none;
    }

    .order-card {
        position: fixed;
        top: 10%;
        left: 50%;
        transform: translateX(-50%);
        z-index: 999;
        background-color: lightblue;
        border-radius: 10px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .bt {
        font-size: 20px;
        display: block;
        margin: auto;
        padding: 10px 20px;
        background-color: #28a745;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .bt:hover {
        background-color: #218838;
    }

    .card h2 {
        background-color: lightsalmon;
        color: white;
        font-family: Arial, Helvetica, sans-serif;
    }
</style>
<div class="form-container">
    <br><br>
    <h2>User Address Form</h2>
    <form action="" method="post">

        <div class="input-box">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Enter your name" required>
        </div>

        <div class="input-box">
            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="number" placeholder="Enter your phone number" required>
        </div>

        <div class="input-box">
            <label for="flat">Address</label>
            <input type="text" id="flat" name="flat" placeholder=" Flat No., Building" required>
        </div>

        <div class="input-box">
            <label for="city">City</label>
            <input type="text" id="city" name="city" placeholder=" City" required>
        </div>

        <div class="input-box">
            <label for="state">State</label>
            <input type="text" id="state" name="state" placeholder=" State" required>
        </div>

        <div class="input-box">
            <label for="country">Country</label>
            <input type="text" id="country" name="country" placeholder=" Country" required>
        </div>

        <div class="input-box">
            <label for="pin_code">Pin Code</label>
            <input type="text" id="pin_code" name="pin_code" placeholder=" 123456" required>
        </div>

        <div class="input-box">
            <label for="payment_method">Payment Method</label>
            <select id="payment_method" name="method" required>
                <option value="" disabled selected>Select payment method</option>
                <option value="Credit Card">Credit Card</option>
                <option value="Debit Card">Debit Card</option>
                <option value="Net Banking">Net Banking</option>
            </select>
        </div>

        <div class="submit-box">
            <input type="submit" name="order_btn">
        </div>

    </form>
</div>

<?php
include "footer.php";
?>