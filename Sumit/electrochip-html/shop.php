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
?>
<?php
if (isset($_POST['submit'])) {
  $product_id = $_POST['product_id'];
  $product_name = $_POST['product_name'];
  $product_price = $_POST['product_price'];
  $product_image = $_POST['product_image'];
  $product_quantity = 1; 


  $check_cart = mysqli_query($conn, "SELECT * FROM cart WHERE p_id='$product_id'");

  if (mysqli_num_rows($check_cart) > 0) {
    echo "<script>alert('Product is already in your cart.');</script>";
  } else {
    $insert_cart = mysqli_query($conn, "INSERT INTO cart (p_id, item_name, price, image, quantity) 
      VALUES ('$product_id', '$product_name', '$product_price', '$product_image', '$product_quantity')");
    if ($insert_cart) {
      echo "<script>alert('Product added to cart.');</script>";
    } else {
      $message = "Failed to add product to cart!";
      
    }
  }
}
?>

<!-- service section -->
<section class="service_section layout_padding">
  <div class="container">
    <div class="heading_container">
      <h2>
        Our Services
      </h2>
    </div>
    <div class="service_container">
      <?php
      $select_products = mysqli_query($conn, "SELECT * FROM products");
      if (mysqli_num_rows($select_products) > 0) {
        while ($fetch_product = mysqli_fetch_assoc($select_products)) {
      ?>
          <div class="box">
            <div class="img-box">
              <img src="../admin/products/<?php echo $fetch_product['image']; ?>" class="img1" alt="image">
            </div>
            <div class="detail-box">
              <h5>
                Price :₹<?php echo $fetch_product['price']; ?>/-
              </h5>
              <p>
                <?php echo $fetch_product['item_name']; ?>
              </p>

              <form action="" method="post">
                <input type="hidden" name="product_id" value="<?php echo $fetch_product['p_id']; ?>">
                <input type="hidden" name="product_name" value="<?php echo $fetch_product['item_name']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                <input type="submit" name="submit" value="Add to Cart" class="btn btn-primary">
              </form>
            </div>
            <!-- <div class="btn-box">
              <a href="">
                Add to cart
              </a>
            </div> -->
          </div>
      <?php
        }
      }
      ?>
    </div>
  </div>
</section>
<!-- end service section -->
<?php include  "footer.php"; ?>