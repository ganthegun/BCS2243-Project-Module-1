<?php
try {
    require "vendor_side.php";
    $id = $_SESSION['id'];
    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $phoneNum = $_POST['phoneNum'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $photo = basename($_FILES["photo"]["name"]);
        $targetPhotoPath = "../uploads/" . $photo;
        $photoType = pathinfo($targetPhotoPath, PATHINFO_EXTENSION);
        $allowTypes = array('jpg', 'png', 'jpeg');
        if (in_array($photoType, $allowTypes) && move_uploaded_file($_FILES["photo"]["tmp_name"], $targetPhotoPath)) {
            $sql = "UPDATE foodvendor SET name = '$name', phoneNum = '$phoneNum', email = '$email', username = '$username', password = '$password', photo = '$photo' WHERE id = '$id'";
            $conn->exec($sql);
        } else {
            $sql = "UPDATE foodvendor SET name = '$name', phoneNum = '$phoneNum', email = '$email', username = '$username', password = '$password' WHERE id = '$id'";
            $conn->exec($sql);
        }
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
</head>

<?php
$stmt = $conn->prepare("SELECT * FROM foodvendor WHERE id = '$id'");
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<body>
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-10">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-auto">
                        <h3>User Profile</h3>
                    </div>
                </div>
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 text-lg-center">
                            <div class="row-cols-auto my-5 border border-black">
                                <img src="../uploads/<?php echo $row['photo'] ?>" alt="User Photo" class="img-fluid">
                            </div>
                            <div class="input-group row-cols-auto my-5">
                                <label class="input-group-text" for="photo">Upload Photo</label>
                                <input type="file" class="form-control " id="photo" name="photo" value="<?php echo "../uploads/" . $row['photo'] ?>">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-group my-5">
                                <span class="input-group-text"><label for="name">Name</label></span>
                                <input type="text" id="name" class="form-control" name="name" value="<?php echo $row['name'] ?>" required>
                            </div>
                            <div class="input-group my-5">
                                <span class="input-group-text"><label for="phoneNum">Phone No.</label></span>
                                <input type="text" id="phoneNum" class="form-control" name="phoneNum" value="<?php echo $row['phoneNum'] ?>" required>
                            </div>
                            <div class="input-group my-5">
                                <span class="input-group-text"><label for="email">E-mail</label></span>
                                <input type="email" id="email" class="form-control" name="email" value="<?php echo $row['email'] ?>" required>
                            </div>
                            <div class="input-group my-5">
                                <span class="input-group-text"><label for="username">Username</label></span>
                                <input type="text" id="username" class="form-control" name="username" value="<?php echo $row['username'] ?>" required>
                            </div>
                            <div class="input-group my-5">
                                <span class="input-group-text"><label for="password">Password</label></span>
                                <input type="password" id="password" class="form-control" name="password" value="<?php echo $row['password'] ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class=" col-auto">
                            <button type="submit" class="btn btn-primary" name="update">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>