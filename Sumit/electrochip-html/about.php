<?php
session_start(); 
if (!isset($_SESSION['user_id'])) {
    
    header('Location: index.php');
    exit(); 
}

include 'header.php'; 
?>
<style>
</style>
<!-- about section -->
<section class="about_section layout_padding">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="detail-box">
          <div class="heading_container">
            <h2>
              Welcome to Easyshop
            </h2>
          </div>
          <p>
            At Easyshop, we pride ourselves on being one of
            the leading mobile retailers in the region,
            offering the latest smartphones, accessories,
            and cutting-edge technology at unbeatable prices.
            Whether you're looking for the newest iPhone,
            Samsung Galaxy, or an affordable yet powerful Android device,
            we’ve got you covered.
          </p>
          <a href="">
            Read More
          </a>
        </div>
      </div>
      <div class="col-md-6">
        <div class="img_container">
          <div class="img-box b1">
            <img src="images/a2.jpg" alt="" />
          </div>
          <div class="img-box b2">
            <img src="images/a1.jpg" alt="" />
          </div>
        </div>

      </div>

    </div>
  </div>
</section>

<!-- end about section -->

<?php include  "footer.php"; ?>