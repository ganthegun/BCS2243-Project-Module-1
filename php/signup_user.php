<?php
try {
    require "conn_db.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST['password'] === $_POST['password2']) {
            $name = $_POST['name'];
            $phoneNum = $_POST['phoneNum'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $type = $_POST['type'];
            $photo = basename($_FILES["photo"]["name"]);
            $targetPhotoPath = "../uploads/" . $photo;
            $photoType = pathinfo($targetPhotoPath, PATHINFO_EXTENSION);
            $allowTypes = array('jpg', 'png', 'jpeg');
            if (in_array($photoType, $allowTypes) && move_uploaded_file($_FILES["photo"]["tmp_name"], $targetPhotoPath)) {
                $sql = "INSERT INTO generaluser VALUES ('', '$name', '$phoneNum', '$email')";
                $conn->exec($sql);
                $user_id = $conn->lastInsertId();
                $sql = "INSERT INTO registereduser VALUES ('', '$user_id', '$username', '$password', '$type', '$photo')";
                $conn->exec($sql);
                session_start();
                $_SESSION['id'] = $user_id;
                header("location: qrcode.php");
                exit;
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
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>Sign Up</title>
</head>

<body>
    <div class="container">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <div class="row justify-content-center">
                <div class="col m-5">
                    <div class="m-5">
                        <h3>Fkom Food Kiosk System</h3>
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
                    <div class="m-5">
                        <select name="type" class="form-select" required>
                            <option selected disabled>Type</option>
                            <option value="student">Student</option>
                            <option value="staff">Staff</option>
                        </select>
                    </div>
                    <div class="input-group m-5">
                        <label class="input-group-text" for="photo">Upload Photo</label>
                        <input type="file" class="form-control" id="photo" name="photo">
                    </div>
                    <div class="m-5">
                        <button type="submit" class="btn btn-primary">Sign Up</button>
                    </div>
                </div>
                <div class="col">
                    <img src="../image/system_logo.jpg" alt="System Logo" class="img-fluid" id="qrcode">
                </div>
            </div>
        </form>
    </div>
</body>

</html>