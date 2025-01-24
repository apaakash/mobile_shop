<?php include "header.php";?>
<?php
$conn = new mysqli('localhost', 'root', '', 'sumit');
?>
<style>
    .product-container {
        margin-left: 400px;
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
        background-color: white;
        color: black;
        border-radius: 10px;
    }

    .container .table td {
        padding: 1.5rem;
        font-size: 1.3rem;
        color: black;
    }

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
        background: linear-gradient(to right bottom, white, white, white);
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
        color: black;
        font-weight: bold;
    }
</style>
<!-- table -->
<div class="container">
    <table class="table">
        <h1 class="pro">Products</h1>
        <thead>
            <tr>
                <th>Product No</th>
                <th>Product Image</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            $get_c = "select * from products";
            $run_c = mysqli_query($conn, $get_c);

            while ($row_p = mysqli_fetch_array($run_c)) {

                $p_id = $row_p['p_id'];
                $p_img = $row_p['image'];
                $p_name = $row_p['item_name'];
                $p_price = $row_p['price'];

                $i++;

            ?>
                <tr>
                    <td class="a1"><?php echo $i; ?></td>
                    <td><img src="products/<?php echo $row_p['image']; ?>" height="100" alt=""></td>
                    <td class="a1"><?php echo $p_name; ?></td>
                    <td class="a1">₹<?php echo $p_price; ?>/-</td>
                    <td class="a1">
                        <button type="button" class="btn btn-success"><a class="del" href="products.php?del_id=<?php echo $p_id; ?>"></i> Delete </a>
                        </button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<!-- table end -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
<?php

if (isset($_GET['del_id'])) {
    $p_id = $_GET['del_id'];

    $sql = "DELETE FROM products WHERE p_id = $p_id";

    $result = mysqli_query($conn, $sql);
}
?>