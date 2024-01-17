<?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "Food_Kiosk_System";

    try {
        $conn = new PDO("mysql:host=$servername", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE DATABASE $dbname";
        if ($conn->exec($sql)) {
            echo "successful";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }