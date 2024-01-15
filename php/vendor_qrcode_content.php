<?php
try {
    include "conn_db.php";
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM foodvendor WHERE id = '$id'");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Profile</title>
</head>

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
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-lg-center">
                        <img src="../uploads/<?php echo $row['photo'] ?>" alt="Photo of user" class="img-fluid">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <table class="table table-striped table-hover table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="row">Name</th>
                                    <td><?php echo $row['name'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Phone Number</th>
                                    <td><?php echo $row['phoneNum'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Email</th>
                                    <td><?php echo $row['email'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Username</th>
                                    <td><?php echo $row['username'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Password</th>
                                    <td><?php echo $row['password'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>