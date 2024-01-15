<?php
require "conn_db.php";
session_start();

if (isset($_POST['approve'])) {
    $sql = "SELECT foodvendor.id AS vendor_id, foodvendor.name AS vendor_name, foodvendor.photo AS vendor_photo, kiosk.name AS kiosk_name, description AS kiosk_description FROM foodvendor JOIN kiosk ON foodvendor.id = kiosk.vendor_id WHERE approval IS NULL;";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
    die;
}

if (isset($_POST['view'])) {
    $sql = "SELECT * FROM generaluser JOIN registereduser ON generaluser.id = registereduser.user_id;";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
    die;
}

if (isset($_POST['view2'])) {
    $sql = "SELECT * FROM foodvendor";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
    die;
}