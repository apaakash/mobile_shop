<?php
session_start();
if (!isset($_SESSION['user_id'])) {

  header('Location: index.php');
  exit();
}
include 'header.php';
?>
<?php
$Data_alert = false;

$conn = new mysqli('localhost', 'root', '', 'sumit');

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $number = $_POST['number'];
  $message = $_POST['message'];

  $sql = "INSERT INTO user_contact (name, email,number, message) VALUES ('$name', '$email','$number', '$message')";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    $Data_alert = true;
  } else {
    echo "Error: some error while ";
  }
}

?>
<style>
  .btn {
    border: none;
    display: inline-block;
    padding: 12px 20px;
    background-color: #4b208c;
    color: #ffffff;
    border-radius: 10px;
  }

  .btn:hover {
    background-color: #5625a1;
  }

  .errorText {
    color: blue;
    font-weight: bold;
  }
</style>
<section class="contact_section layout_padding">
  <div class="container ">
    <div class="heading_container">
      <h2>
        Contact Us
      </h2>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <form action="" method="post">
          <?php echo $Data_alert ? "<h1 class='errorText'>Request Success</h1>" : ""; ?>
          <br>
          <br>
          <div>
            <input type="text" name="name" placeholder="Name" />
          </div>
          <div>
            <input type="email" name="email" placeholder="Email" />
          </div>
          <div>
            <input type="text" name="number" placeholder="number Number" />
          </div>
          <div>
            <input type="text" name="message" class="message-box" placeholder="Message" />
          </div>
          <div class="d-flex ">
            <button name="submit" type="submit" class="btn">SAND</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- end contact section -->

<?php include  "footer.php"; ?>