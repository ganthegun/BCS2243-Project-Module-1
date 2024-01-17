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

if (isset($_POST['chart1'])) {
    $stmt = $conn->prepare("SELECT COUNT(*) FROM administrator");
    $stmt->execute();
    $result1 = $stmt->fetch(PDO::FETCH_ASSOC);

    $stmt = $conn->prepare("SELECT COUNT(*) FROM foodvendor");
    $stmt->execute();
    $result2 = $stmt->fetch(PDO::FETCH_ASSOC);

    $stmt = $conn->prepare("SELECT COUNT(*) FROM registereduser");
    $stmt->execute();
    $result3 = $stmt->fetch(PDO::FETCH_ASSOC);

    $stmt = $conn->prepare("SELECT COUNT(*) FROM generaluser");
    $stmt->execute();
    $result4 = $stmt->fetch(PDO::FETCH_ASSOC);

    $array1 = array((int)$result1['COUNT(*)'], (int)$result2['COUNT(*)'], (int)$result3['COUNT(*)'], (int)$result4['COUNT(*)']);
    echo json_encode([
        "yaxis" => $array1
    ]);
    die;
}



if (isset($_POST['post3'])) {
    $stmt = $conn->prepare("SELECT * FROM registereduser JOIN generaluser ON generaluser.id = registereduser.user_id");
    $stmt->execute();
    $result3 = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result3);
    die;
}

if (isset($_POST['posting'])) {
    $stmt = $conn->prepare("SELECT * FROM foodvendor");
    $stmt->execute();
    $result2 = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result2);
    die;
}


if (isset($_POST['postses'])) {
    $stmt = $conn->prepare("SELECT COUNT(*) As number, administrator.name AS name FROM foodvendor JOIN administrator ON foodvendor.admin_id = administrator.id GROUP BY admin_id");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
    die;
}