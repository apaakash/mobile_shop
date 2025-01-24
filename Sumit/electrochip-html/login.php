<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'sumit');

$logPassError = false;
$logUserError = false;

if (isset($_POST['submit1'])) {
    $user_email = $_POST['user_email'];
    $pass = $_POST['pass'];

    $sql = "SELECT * FROM reg WHERE email = '$user_email'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        $resArr = mysqli_fetch_assoc($result);

        if ($pass == $resArr['password']) {
            $_SESSION['user_id'] = $resArr['id'];
            header("Location: index.php");
            exit;
        } else {
            $logPassError = true;
        }
    } else {
        $logUserError = true;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <!-- Fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- Responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
    <style>
        .contact_section .btn {
            border: none;
            display: inline-block;
            padding: 12px 20px;
            background-color: #4b208c;
            color: #ffffff;
            border-radius: 10px;
        }

        .contact_section .btn:hover {
            background-color: #5625a1;
        }
    </style>
</head>
<body>
    <!-- Login section -->
    <section class="contact_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="heading_container">
                        <h2>Login Now</h2>
                        <?php echo $logUserError ? "<h1 class='errorText'>Wrong Email</h1>" : ""; ?>
                        <?php echo $logPassError ? "<h1 class='errorText'>Wrong Password</h1>" : ""; ?>
                    </div>
                    <form method="post">
                        <div>
                            <input type="email" name="user_email" placeholder="Email" required />
                        </div>
                        <div>
                            <input type="password" name="pass" placeholder="Enter Password" required />
                        </div>
                        <div class="d-flex">
                            <button type="submit" name="submit1" class="btn">Login</button> &numsp;
                            <a href="register.php">Register</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End login section -->
</body>
</html>
