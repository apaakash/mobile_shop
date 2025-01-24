<?php
include "header.php";

$conn = new mysqli('localhost', 'root', '', 'sumit');

if (isset($_GET['order_delete'])) {
    $delete_id = $_GET['order_delete'];

    $delete_query = "DELETE FROM orders WHERE id = '$delete_id'";
    
    if (mysqli_query($conn, $delete_query)) {
        echo "<script>alert('Order has been deleted successfully');</script>";
        echo "<script>window.location.href='order.php';</script>";
    } else {
        echo "<script>alert('Failed to delete the order');</script>";
    }
}
?>

<style>
    body{
        background-color: white;
    }
    .container {
        width: 1200px;
        padding-top: 20px;
        color: black;
        margin-right: 170px;
    }

    .del {
        text-decoration: none;
        color: white;
        font-weight: bold;
    }
    .del:hover{
        color: red;
    }
    .up {
        text-decoration: none;
        color: white;
        font-weight: bold;
    }
    .up:hover{
        color: red;
    }
    #act{
        text-decoration: none; 
    }

    .pro {
        padding-left: 400px;
    }
    .head1{
        color: black;
        font-size: 14px;
    }
    #action{
        margin-top: 20px;
}
</style>

<!-- table -->
<div class="container">
    <table class="table">
        <h1 class="pro">ORDERS</h1>
        <thead>
            <tr class="head1">
                <th>No</th>
                <th>Name</th>
                <th>Number</th>
                <th>Method</th>
                <th>Flat</th>
                <th>City</th>
                <th>State</th>
                <th>Country</th>
                <th>Pin Code</th>
                <th>Total Quantity</th>
                <th>Total Price</th>
                <!-- extra content-->
                <th>City1</th>
                <th>street</th>
                <th>latitude</th>
                <th>longitude</th>
                <!-- end-->
                <th>Action</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            $get_c = "SELECT * FROM orders";
            $run_c = mysqli_query($conn, $get_c);

            while ($row_c = mysqli_fetch_array($run_c)) {
                $o_id = $row_c['id'];
                $name = $row_c['name'];
                $number = $row_c['number'];
                $method = $row_c['method'];
                $flat = $row_c['flat'];
                $city = $row_c['city'];
                $state = $row_c['state'];
                $country = $row_c['country'];
                $pin_code = $row_c['pin_code'];
                $total_quantity = $row_c['total_quantity'];
                $total_price = $row_c['total_price'];

                $city1 = $row_c['city1'];
                $street = $row_c['street'];
                $latitude = $row_c['latitude'];
                $longitude = $row_c['longitude'];
                $i++;
            ?>
                <tr class=" head1">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $number; ?></td>
                    <td><?php echo $method; ?></td>
                    <td><?php echo $flat; ?></td>
                    <td><?php echo $city; ?></td>
                    <td><?php echo $state; ?></td>
                    <td><?php echo $country; ?></td>
                    <td><?php echo $pin_code; ?></td>
                    <td><?php echo $total_quantity; ?></td>
                    <td><?php echo number_format($total_price, 2); ?></td> 
                    <td><?php echo $city1; ?></td>
                    <td><?php echo $street; ?></td>
                    <td><?php echo $latitude; ?></td>
                    <td><?php echo $longitude; ?></td>
                    <td >
                        <button type="button" class="btn btn-success">
                            <a class="del" id="act" href="order.php?order_delete=<?php echo $o_id; ?>"> Delete </a>
                        </button>
                        <button type="button" class="btn btn-success" id="action">
                            <a class="up" href="update_order.php?order_id=<?php echo $o_id; ?>">Update</a>
                        </button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<!-- table end -->
