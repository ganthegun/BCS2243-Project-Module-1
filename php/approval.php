<?php
    try {
        require "conn_db.php";
        session_start();
        $admin_id = $_SESSION['id'];
        if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['approve'])) {
            $id = $_POST['approve'];
            $stmt = $conn->prepare("UPDATE foodvendor
            SET approval = 'approved', admin_id = '$admin_id'
            WHERE id = $id;");
            $stmt->execute();
        }
        if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['reject'])) {
            $id = $_POST['reject'];
            $stmt = $conn->prepare("UPDATE foodvendor
            SET approval = 'rejected', admin_id = '$admin_id'
            WHERE id = $id;");
            $stmt->execute();
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>display</title>
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container border">
        <div class="row justify-content-center text-center border">
            <div class="col border">
                <h6>Vendor Name</h6>
            </div>
            <div class="col border">
                <h6>Vendor Photo</h6>
            </div>
            <div class="col border">
                <h6>Approval</h6>
            </div>
        </div>
        <?php
            $stmt = $conn->prepare("SELECT * FROM foodvendor WHERE approval IS NULL"); 
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $id = $row['id'];
                $name = $row['name'];
                $photo = 'uploads/' . $row["photo"];
        ?>
        <div class="row justify-content-center text-center border">
            <div class="col border">
                <?php echo $name?>
            </div>
            <div class="col border">
                <img src="<?php echo $photo?>" alt="Photo of potential vendor" class="img-fluid">
            </div>
            <div class="col border">
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                    <span>
                        <button type="submit" name="approve" value="<?php echo $id ?>" class="btn btn-primary">Approve</button>
                    </span>
                    <span>
                        <button type="submit" name="reject" value="<?php echo $id ?>" class="btn btn-primary">Reject</button>
                    </span>
                </form>
                
            </div>
        </div>
        <?php      
            }
        ?>
    </div>
</body>
</html>
<?php
    } catch (Throwable $th) {
        echo $th;
    }
?>
