<?php include "header.php";?>
<?php
$conn = new mysqli('localhost', 'root', '', 'sumit');
?>
<?php
if (isset($_POST['submit'])) {
    $item_name = $_POST['item_name'];
    $price = $_POST['price'];

    $image = $_FILES['image']['name'];

    $img = "products/";

    $data = $img . $image;


    if (move_uploaded_file($_FILES['image']['tmp_name'], $data)) {
        $sql = "INSERT INTO products (image,item_name, price) VALUES ('$image','$item_name', '$price')";
    } else {
        echo "<p>Sorry, there was an error uploading your file.</p>";
    }

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Data inserted')</script>";
    } else {
        echo "<script>alert('Data not inserted. Please try again.')</script>";
    }
}
?>
<style>
    .product-container {
        background-color: rgba(255, 255, 255, 0.5);
        backdrop-filter: blur(30px);
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
    }
    .container {
        max-width: 1200px;
        padding-top: 20px;
        color: white;
        background: linear-gradient(to right bottom, wheat, wheat, wheat);
        margin-top: 50px;
        border-radius: 10px;
        box-shadow: 5px 5px 5px 5px black;

    }

    .del {
        text-decoration: none;
        color: white;
    }

    .pro {
        padding-left: 500px;
        color: white;
    }

    /* Form styles */
    .product-form {
        display: flex;
        flex-direction: column;
    }

    .product-form h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }

    .input-group {
        margin-bottom: 15px;
    }

    .input-group label {
        font-size: 14px;
        color: #555;
        margin-bottom: 5px;
    }

    .input-group input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 14px;
    }

    .product-form button {
        background-color: #4caf50;
        color: white;
        padding: 10px;
        border: none;
        border-radius: 50px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .product-form button:hover {
        background-color: #45a049;
    }

    .product-container {
        margin-left: 500px;
        margin-top: 50px;
        box-shadow: 5px 5px 5px 5px black;


    }

    .input-group textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 14px;
    }

    .container .table thead th {
        padding: 1.5rem;
        font-size: 1.3rem;
        background-color: black;
        color: blue;
    }

    .container .table td {
        padding: 1.5rem;
        font-size: 1.3rem;
        color: black;
    }
</style>

    <div class="product-container">
    <form class="product-form" method="post" enctype="multipart/form-data">
        <h2>Add Product</h2>
        <div class="input-group">
            <label>Product Name</label>
            <input type="text" name="item_name" placeholder="product Name" required>
        </div>
        <div class="input-group">
            <label>Product price</label>
            <input type="text" name="price" placeholder="price" required>
        </div>
        <div class="input-group">
            <label for="image">Product Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required>
        </div>
        <button type="submit" name="submit"> insert Product</button>
    </form>
