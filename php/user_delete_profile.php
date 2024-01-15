<?php
try {
    require "user_side.php";
    $id = $_SESSION['id'];
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['delete'])) {
        $password = $_POST['password'];
        $sql = "SELECT password FROM registereduser WHERE user_id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row['password'] == $password) {
            $sql = "DELETE FROM registereduser WHERE user_id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            if ($stmt->execute()) {
                $sql = "DELETE FROM generaluser WHERE id = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':id', $id);
                if ($stmt->execute()) {
                    header("location: logout.php");
                    exit();
                }
            }
        } else {
            echo "<script>alert('Incorrect password!')</script>";
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
    <title>Delete Profile</title>
</head>

<body>
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-10">
            <div class="container">
                <div class="row justify-content-lg-center">
                    <div class="col-lg-6 mt-5">
                        <h3>Delete Account</h3>
                    </div>
                </div>
                <div class="row justify-content-lg-center">
                    <div class="col-lg-6 p-3 mb-5 text-bg-warning rounded-5">
                        <p>Are you sure you want to delete your account?</p>
                        <p>This will immediately log you out of your account and you will not be able to login again.</p>
                    </div>
                </div>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                    <div class="row justify-content-lg-center">
                        <div class="col-lg-6">
                            <h5>Password</h5>
                        </div>
                    </div>
                    <div class="row justify-content-lg-center">
                        <div class="col-lg-6 mb-5">
                            <input type="password" class="form-control" name="password" required>
                        </div>
                    </div>
                    <div class="row justify-content-lg-center">
                        <div class="col-auto">
                            <button class="btn btn-warning" name="delete">Delete</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>