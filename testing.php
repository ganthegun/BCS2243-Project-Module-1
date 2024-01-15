<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 border" id="qrcode"></div>
        </div>
    </div>
    <script src="./davidshimjs-qrcodejs-04f46c6/qrcode.min.js"></script>
    <script>
        var qrcode = new QRCode("qrcode");
        qrcode.makeCode("https://github.com/ganjunweiCs/Login/blob/main/signup.php");
    </script>
</body>

</html>