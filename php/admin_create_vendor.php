<?php
try {
    require "admin_side.php";
    $admin_id = $_SESSION['id'];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST['password'] === $_POST['password2']) {
            $name = $_POST['name'];
            $phoneNum = $_POST['phoneNum'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $kiosk_name = $_POST['kiosk_name'];
            $kiosk_description = $_POST['kiosk_description'];
            $photo = basename($_FILES["photo"]["name"]);
            $targetPhotoPath = "../uploads/" . $photo;
            $photoType = pathinfo($targetPhotoPath, PATHINFO_EXTENSION);
            $allowTypes = array('jpg', 'png', 'jpeg');
            if (in_array($photoType, $allowTypes) && move_uploaded_file($_FILES["photo"]["tmp_name"], $targetPhotoPath)) {
                $sql = "INSERT INTO foodvendor VALUES ('', '$admin_id', '$name', '$phoneNum', '$email', '$username', '$password', '$photo', 'approved')";
                $conn->exec($sql);
                $vendor_id = $conn->lastInsertId();
                $sql = "INSERT INTO kiosk VALUES ('', '$vendor_id', '$kiosk_name', '$kiosk_description', NULL, NULL, NULL, NULL)";
                $conn->exec($sql);
                echo "<script>alert('Registration Successful!')</script>";
            }
        }
    }
} catch (Throwable $th) {
    echo $th;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
</head>

<body>
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-10">
        <div class="container">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <div class="row justify-content-center">
                <div class="col m-5">
                    <div class="m-5">
                        <h3>Register Vendor</h3>
                    </div>
                    <div class="m-5">
                        <h4>Personal information</h4>
                    </div>
                    <div class="input-group m-5">
                        <span class="input-group-text"><label for="name">Name</label></span>
                        <input type="text" id="name" class="form-control" name="name" required>
                    </div>
                    <div class="input-group m-5">
                        <span class="input-group-text"><label for="phoneNum">Phone No.</label></span>
                        <input type="text" id="phoneNum" class="form-control" name="phoneNum" required>
                    </div>
                    <div class="input-group m-5">
                        <span class="input-group-text"><label for="email">E-mail</label></span>
                        <input type="email" id="email" class="form-control" name="email" required>
                    </div>
                    <div class="input-group m-5">
                        <span class="input-group-text"><label for="username">Username</label></span>
                        <input type="text" id="username" class="form-control" name="username" required>
                    </div>
                    <div class="input-group m-5">
                        <span class="input-group-text"><label for="password">Password</label></span>
                        <input type="password" id="password" class="form-control" name="password" required>
                    </div>
                    <div class="input-group m-5">
                        <span class="input-group-text"><label for="password2">Confirmed Password</label></span>
                        <input type="password" id="password2" class="form-control" name="password2" required>
                    </div>
                    <div class="input-group m-5">
                        <label class="input-group-text" for="photo">Upload Photo</label>
                        <input type="file" class="form-control" id="photo" name="photo">
                    </div>
                    <div class="m-5">
                        <h4>Kiosk Details</h4>
                    </div>
                    <div class="input-group m-5">
                        <label class="input-group-text" for="kiosk_name">Kiosk Name</label>
                        <input type="text" class="form-control" id="kiosk_name" name="kiosk_name">
                    </div>
                    <div class="input-group m-5">
                        <label class="input-group-text" for="kiosk_description">Kiosk Description</label>
                        <textarea class="form-control" name="kiosk_description" id="kiosk_description" cols="30" rows="5"></textarea>
                    </div>
                    <div class="m-5">
                        <button type="submit" class="btn btn-primary">Sign Up</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
        </div>
    </div>
</body>

</html>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>Sign Up</title>
</head>

<body>
    
</body>

</html>