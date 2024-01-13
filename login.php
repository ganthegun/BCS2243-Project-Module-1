<?php
    try {
        require "conn_db.php";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $type = $_POST['type'];
            if ($type == "student" || $type == "staff") {
                $stmt = $conn->prepare("SELECT * FROM registereduser"); 
            } else {
                $stmt = $conn->prepare("SELECT * FROM $type"); 
            }
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                if ($_POST['username'] == $row['username'] && $_POST['password'] == $row['password']) {
                    if ($type == "student" || $type == "staff") {
                        session_start();
                        $_SESSION['id'] = $row['user_id'];
                        header("location: index_user.php");
                        exit();
                    } else if ($type == "foodVendor" && $row['approval'] == "approved") {
                        session_start();
                        $_SESSION['id'] = $row['id'];
                        header("location: index_vendor.php");
                        exit();
                    } else if ($type == "administrator") {
                        session_start();
                        $_SESSION['id'] = $row['id'];
                        header("location: index_admin.php");
                        exit();
                    }
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
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>Log In</title>
</head>
<body>
    <div class="container justify-content-center text-center">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="row">
                <div class="col">
                    <img src="./image/system_logo.jpg" alt="System Logo" class="img-fluid">
                    <div>
                        <a href="signup.php" class="btn btn-primary">Sign Up</a>    
                    </div>
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
                        <span class="input-group-text"><label for="password">Password</label></span>
                        <input type="password" id="password" class="form-control" name="password" required>
                    </div>
                    <div class="m-5">
                        <select name="type" class="form-select" id="type" required>
                            <option selected disabled>Type</option>
                            <option value="student">Student</option>
                            <option value="staff">Staff</option>
                            <option value="foodVendor">Food Vendor</option>
                            <option value="administrator">Administrator</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Log In</button>
                        </div>
                        <div class="col">
                            <a href="forgot_password.php" class="btn btn-primary">Forgot Password</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        document.getElementById("username").value = "";
        document.getElementById("password").value = "";
    </script>
</body>
</html>