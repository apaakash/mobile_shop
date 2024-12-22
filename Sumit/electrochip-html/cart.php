<?php
session_start(); 
if (!isset($_SESSION['user_id'])) {
    
    header('Location: index.php');
    exit();
}

include 'header.php'; 
?>
<?php  
$conn = new mysqli('localhost', 'root', '', 'sumit');

?>

<?php
if (isset($_POST['update_update_btn'])) {
    $update_value = $_POST['update_quantity'];
    $update_id = $_POST['update_quantity_id'];
    $update_quantity_query = mysqli_query($conn, "UPDATE cart SET quantity = '$update_value' WHERE p_id = '$update_id'");
    if ($update_quantity_query) {
    }
}

if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM cart WHERE p_id = '$remove_id'");
}

if (isset($_GET['delete_all'])) {
    mysqli_query($conn, "DELETE FROM cart");
}

?>

<style>
    .main {
        margin-left: 300px;
    }

    .img-cart {
        display: block;
        height: 100px;
        width: 100px;
        margin-left: auto;
        margin-right: auto;
    }

    table tr td {
        border: 1px solid #FFFFFF;
    }

    table tr th {
        background: #eee;
    }

    .panel-shadow {
        box-shadow: rgba(0, 0, 0, 0.3) 7px 7px 7px;
    }

    .bta {
        margin: 20px 30px;
    } 
</style>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
<div class="container bootstrap snippets bootdey main">
    <div class="col-md-9 col-sm-8 content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-info panel-shadow">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Item Name</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        &nbsp;
                                        &nbsp;
                                        <th>Total Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $select_cart = mysqli_query($conn, "SELECT * FROM cart");
                                    $grand_total = 0;
                                    if (mysqli_num_rows($select_cart) > 0) {
                                        while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                                            $price = (float) $fetch_cart['price'];
                                            $quantity = (int) $fetch_cart['quantity'];
                                            $sub_total = $price * $quantity;
                                    ?>
                                            <tr>
                                                <td><img src="../admin/products/<?php echo $fetch_cart['image']; ?>" class="img-cart"></td>
                                                <td><strong><?php echo $fetch_cart['item_name']; ?></strong>
                                                </td>
                                                <td>₹<?php echo $fetch_cart['price']; ?>/-</td>
                                                <td>
                                                    <form class="form-inline" method="post">
                                                        <input type="hidden" name="update_quantity_id" value="<?php echo $fetch_cart['p_id']; ?>">
                                                        <input type="number" name="update_quantity" min="1" value="<?php echo $quantity; ?>" class="input">
                                                        <input type="submit" value="Update" name="update_update_btn" class="btn btn-primary mt-3">
                                                    </form>
                                                </td>
                                                &nbsp;
                                                &nbsp;
                                                <td class="ac">₹<?php echo number_format($sub_total, 2); ?>/-</td>
                                                <td>
                                                    <a href="cart.php?remove=<?php echo $fetch_cart['p_id']; ?>"
                                                        onclick="return confirm('Remove item from cart?')" class="delete-btn">
                                                        <i class="fa fa-trash-o"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                    <?php
                                            $grand_total += $sub_total;
                                        }
                                    }
                                    ?>
                                    <!-- <tr>
                                        <td colspan="4" class="text-right">Total Product</td>
                                        <td></td>
                                    </tr> -->
                                    <tr>
                                        <td colspan="4" class="text-right"><strong>Total Price</strong></td>
                                        <td>₹<?php echo number_format($grand_total, 2); ?>/-</td>
                                        <td><a href="cart.php?delete_all"
                                                onclick="return confirm('Are you sure you want to delete all?');" class="delete-btn"><i class="fa fa-trash-o"></i> Delete All </a>
                                        </td>
                                    </tr>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <a href="shop.php" class="btn btn-success bta"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Continue Shopping</a>
                    <a href="payment.php" class="btn btn-primary pull-right bta <?= ($grand_total > 1) ? '' : 'disabled'; ?>">Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>