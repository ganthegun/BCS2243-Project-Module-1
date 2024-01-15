<?php
    try {
        require "conn_db.php";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($_POST['password'] == $_POST['password2']) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $type = $_POST['type'];
                if ($type == "student" || $type == "staff") {
                    $stmt = $conn->prepare("UPDATE registereduser SET password = '$password' WHERE username = '$username' AND user_id = (SELECT id FROM generaluser WHERE email = '$email')"); 
                } else {
                    $stmt = $conn->prepare("UPDATE $type SET password = '$password' WHERE username = '$username' AND email = '$email'");
                }
                if ($stmt->execute()) {
                    echo "<h6>Password successfully updated!<\h6>";
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
    <title>Forget Password</title>
</head>
<body>
    <div class="container justify-content-center text-center">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="row">
                <div class="col">
                    <img src="../image/system_logo.jpg" alt="System Logo" class="img-fluid">
                </div>
                <div class="col m-5">
                    <div class="m-5">
                        <h3>Fkom Food Kiosk System</h3>
                    </div>
                    <div class="input-group m-5">
                        <span class="input-group-text"><label for="username">Username</label></span>
                        <input type="text" id="username" class="form-control" name="username" required>
                    </div>
                    <div class="input-group m-5">
                        <span class="input-group-text"><label for="password">New Password</label></span>
                        <input type="password" id="password" class="form-control" name="password" required>
                    </div>
                    <div class="input-group m-5">
                        <span class="input-group-text"><label for="password2">Confirmed Password</label></span>
                        <input type="password" id="password2" class="form-control" name="password2" required>
                    </div>
                    <div class="input-group m-5">
                        <span class="input-group-text"><label for="email">Email</label></span>
                        <input type="email" id="email" class="form-control" name="email" required>
                    </div>
                    <div class="m-5">
                        <select name="type" class="form-select" required>
                            <option selected disabled>type</option>
                            <option value="student">Student</option>
                            <option value="staff">Staff</option>
                            <option value="foodVendor">Food Vendor</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    
                </div>
            </div>
        </form>
    </div>
</body>
</html>