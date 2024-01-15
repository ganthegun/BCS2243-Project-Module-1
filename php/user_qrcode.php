<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-auto m-5">
                <h3>Scan QR code to view user profile</h3>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-auto border mb-5" id="qrcode"></div>
        </div>
        <div class="row justify-content-center">
            <div class="col-auto">
                <a href="user_index.php" class="btn btn-primary">to main page</a>
            </div>
        </div>
    </div>
    <script src="../davidshimjs-qrcodejs-04f46c6/qrcode.min.js"></script>
    <script>
        var id = <?php echo json_encode($_SESSION['id']); ?>;
        var qrcode = new QRCode("qrcode");
        qrcode.makeCode("http://localhost/web_project/php/qrcode_content.php?id=" + id);
    </script>
</body>

</html>