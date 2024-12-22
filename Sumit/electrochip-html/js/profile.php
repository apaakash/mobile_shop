<?php 
include "header.php"; 
$conn = new mysqli('localhost', 'root', '', 'sumit');
?>
<?php
$query = "SELECT * FROM reg";


$result = mysqli_query($conn, $query);

$user_data = mysqli_fetch_assoc($result);

?>
<style>
    .card {
        margin-left: 500px;
        margin-top: 30px;

    }

    .card-body {
        font-weight: bold;
        border: transparent;
        border-radius: 5px;

    }

    .button a {
        border: none;
        display: inline-block;
        padding: 12px 20px;
        background-color: #4b208c;
        color: #ffffff;
        border-radius: 10px;
        margin: 20px 35%;
    }

    .button a:hover {
        background-color: #5625a1;
    }
</style>
<div class="card" style="width: 30rem;">
    <img src="../electrochip-html/img/<?php echo $user_data['image']; ?>" class="card-img-top" alt="image">
    <div class="card-body">
        <h3>Name : <?php echo $user_data['name']; ?></h3>
        <br>
        <h3 class="card-text">Email : <?php echo $user_data['email']; ?></h3>
    </div>
    <div class="d-flex button">
        <a href="logout.php">Logout</a>
    </div>
</div>  