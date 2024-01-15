<?php
    require "conn_db.php";
    session_start();
    if (!isset($_SESSION['id'])) {
        header("location: login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script defer src="../js/dropdown.js"></script>
</head>

<body>
    <div class="sidenav">
        <img src="../image/system_logo.jpg" alt="Sidebar Image">
        <a href="user_dashboard.php">Dashboard</a>
        <div class="dropdown">
            <button class="dropbtn">Vendor Profile</button>
            <div class="dropdown-content">
                <a href="vendor_view_profile.php">View Profile</a>
                <a href="vendor_update_profile.php">Update Profile</a>
                <a href="vendor_delete_profile.php">Delete Profile</a>
            </div>
        </div>
        <a href="logout.php">Log Out</a>
    </div>
</body>

</html>