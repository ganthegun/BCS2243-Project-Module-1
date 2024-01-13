<?php
    require "conn_db.php";
    session_start();
    $id = $_SESSION['id'];

    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $phoneNum = $_POST['phoneNum'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $type = $_POST['type'];
        $photo = basename($_FILES["photo"]["name"]); 
        $targetPhotoPath = "./uploads/" . $photo;
        $photoType = pathinfo($targetPhotoPath,PATHINFO_EXTENSION);  
        $allowTypes = array('jpg','png','jpeg'); 
        if(in_array($photoType, $allowTypes) && move_uploaded_file($_FILES["photo"]["tmp_name"], $targetPhotoPath)) {
            $sql = "UPDATE generaluser JOIN registereduser ON generaluser.id = registereduser.user_id SET name = '$name', phoneNum = '$phoneNum', email = '$email', username = '$username', password = '$password', type = '$type', photo = '$photo' WHERE user_id = '$id'";
            $conn->exec($sql);
            header("location: index_user.php"); 
            exit;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>User user_profile</title>
</head>

<?php
    $stmt = $conn->prepare("SELECT * FROM generaluser JOIN registereduser ON generaluser.id = registereduser.user_id WHERE user_id = '$id'");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <h3>User Profile</h3>
        </div>
    </div>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <div class="row justify-content-center">
            <div class="col m-5">
                <div class="row-cols-auto">
                <img src="./uploads/<?php echo $row['photo'] ?>" alt="User Photo" class="img-fluid">
                </div>
                <div class="input-group row-cols-auto">
                    <label class="input-group-text" for="photo">Upload Photo</label>
                    <input type="file" class="form-control" id="photo" name="photo" value="<?php echo $row['photo'] ?>">
                </div>
            </div>
            <div class="col m-5">
                <div class="input-group m-5">
                    <span class="input-group-text"><label for="name">Name</label></span>
                    <input type="text" id="name" class="form-control" name="name" value="<?php echo $row['name'] ?>" required>
                </div>
                <div class="input-group m-5">
                    <span class="input-group-text"><label for="phoneNum">Phone No.</label></span>
                    <input type="text" id="phoneNum" class="form-control" name="phoneNum" value="<?php echo $row['phoneNum'] ?>" required>
                </div>
                <div class="input-group m-5">
                    <span class="input-group-text"><label for="email">E-mail</label></span>
                    <input type="email" id="email" class="form-control" name="email" value="<?php echo $row['email'] ?>" required>
                </div>
                <div class="input-group m-5">
                    <span class="input-group-text"><label for="username">Username</label></span>
                    <input type="text" id="username" class="form-control" name="username"  value="<?php echo $row['username'] ?>" required>
                </div>
                <div class="input-group m-5">
                    <span class="input-group-text"><label for="password">Password</label></span>
                    <input type="password" id="password" class="form-control" name="password"  value="<?php echo $row['username'] ?>" required>
                </div>
                <div class="m-5">
                    <select name="type" class="form-select" value="<?php echo $row['name'] ?>" required>
                        <option selected disabled>type</option>
                        <option value="student">Student</option>
                        <option value="staff">Staff</option>
                        <option value="foodVendor">Food Vendor</option>
                    </select>
                </div>
                <div class="m-5">
                    <button type="submit" class="btn btn-primary" name="update">Update</button>
                </div>
            </div>
        </div>
    </form>
</div>
</body>
</html>

