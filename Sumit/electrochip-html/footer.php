<!-- info section -->
<?php
//$conn = new mysqli('localhost', 'root', '', 'sumit');

// if (isset($_POST['submit'])) {
//     $feedback = $_POST['feedback'];

//     $sql = "INSERT INTO feedback (feedback) VALUES ('$feedback')";
//     $result = mysqli_query($conn, $sql);
//     if ($result) {
//         echo "<script>alert('Feedback Sand Success');</script>";
//         exit();
//     } else {
//         echo "Error: some error while ";
//     }
// }

?>
<section class="info_section layout_padding">
    <div class="container">
        <div class="info_contact">
            <div class="row">
                <div class="col-md-4">
                    <a href="">
                        <img src="images/location-white.png" alt="">
                        <span>
                            Dokmardi silvassa
                        </span>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="">
                        <img src="images/telephone-white.png" alt="">
                        <span>
                            Call : +91 9157960130
                        </span>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="">
                        <img src="images/envelope-white.png" alt="">
                        <span>
                            ap9157@gmail.com.com
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-lg-9">
                <div class="info_form">
                    <form action="" method="post">
                        <input type="text" name="feedback" placeholder="Enter your Feedback">
                        <button type="submit" name="submit">
                            Sand
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-md-4 col-lg-3">
                <div class="info_social">
                    <div>
                        <a href="">
                            <img src="images/fb.png" alt="">
                        </a>
                    </div>
                    <div>
                        <a href="">
                            <img src="images/twitter.png" alt="">
                        </a>
                    </div>
                    <div>
                        <a href="">
                            <img src="images/linkedin.png" alt="">
                        </a>
                    </div>
                    <div>
                        <a href="">
                            <img src="images/instagram.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- end info section -->

<!-- footer section -->
<footer class="container-fluid footer_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-9 mx-auto">
                <p>
                    &copy; 2024 All Rights Reserved
                    <a href=""> Made by Akash</a>
                </p>
            </div>
        </div>
    </div>
</footer>
<!-- footer section -->


<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.js"></script>

</body>

</html>