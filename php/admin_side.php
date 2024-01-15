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
        <a href="dashboard.php">Dashboard</a>
        <div class="dropdown">
            <button class="dropbtn">Administrator Profile</button>
            <div class="dropdown-content">
                <a href="admin_view_profile.php">View Profile</a>
                <a href="admin_update_profile.php">Update Profile</a>
                <a href="admin_delete_profile.php">Delete Profile</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Manage User Profile</button>
            <div class="dropdown-content">
                <a href="admin_manage_view_profile.php">View User Profile</a>
                <a href="admin_manage_update_profile.php">Update User Profile</a>
                <a href="admin_manage_delete_profile.php">Delete User Profile</a>
            </div>
        </div>
        <a href="logout.php">Log Out</a>
    </div>
</body>

</html>