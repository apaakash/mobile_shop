<?php
$PassError = false;
$UserError = false;

$conn = new mysqli('localhost', 'root', '', 'sumit');

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM reg WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $UserError = true;
    } else {
        if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['image']['tmp_name'];
            $fileName = $_FILES['image']['name'];
            $fileSize = $_FILES['image']['size'];
            $fileType = $_FILES['image']['type'];

            $uploadFileDir = 'img/';
            $dest_path = $uploadFileDir . $fileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {

                $sql = "INSERT INTO reg (name, email,phone, password, image) VALUES ('$name', '$email','$phone', '$password', '$dest_path')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    header("Location: register.php");
                } else {
                    echo "Error: some error while ";
                }
            } else {
                echo "Error moving the uploaded file.";
            }
        } else {
            echo "Error in file upload.";
        }
    }
}
?>
<head>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
    <style>
        .file {
            padding-top: 10px;
        }

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
<!-- contact section -->
<section class="contact_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="heading_container">
                    <h2>
                        Register Now
                        <?php echo $UserError ? "<h1 class='errorText'>User Allredy Register</h1>" : ""; ?>
                    </h2>
                </div>
                <form method="post" enctype="multipart/form-data">
                    <div>
                        <input type="text" name="name" placeholder="Enter Name" required />
                    </div>
                    <div>
                        <input type="email" name="email" placeholder="Enter Email" required />
                    </div>

                    <div>
                        <input type="text" name="phone" placeholder="Phone Number" required />
                    </div>

                    <div>
                        <input type="password" name="password" class="message-box" placeholder="Enter Password" required />
                    </div>
                    <div>
                        <input type="file" class="file" placeholder="Select file" name="image" accept="images/*" required />
                    </div>
                    <div class="d-flex ">
                        <button type="submit" name="submit" class="btn">Register</button> &numsp;
                        <a href="login.php">Login</a>
                    </div>
                    
                </form>
            </div>
