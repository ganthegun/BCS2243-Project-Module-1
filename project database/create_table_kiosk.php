<?php
    try {
        require "conn_db.php";
        $sql = "CREATE TABLE Kiosk (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            vendor_id INT UNSIGNED,
            name VARCHAR(100) NOT NULL,
            location VARCHAR(255) NOT NULL,
            businessHour VARCHAR(255) NOT NULL,
            businessDay VARCHAR(255) NOT NULL,
            operationStatus VARCHAR(50) NOT NULL,
            FOREIGN KEY (vendor_id) REFERENCES FoodVendor(id)
        )";
        $conn->exec($sql);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }