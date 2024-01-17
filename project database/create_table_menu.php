<?php
    try {
        require "conn_db.php";
        $sql = "CREATE TABLE Menu (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            kiosk_id INT UNSIGNED NOT NULL,
            name VARCHAR(255) NOT NULL,
            description TEXT,
            category VARCHAR(50) NOT NULL,
            quantityAvailable INT UNSIGNED NOT NULL,
            price DECIMAL(10, 2) NOT NULL,
            photo TEXT NOT NULL,
            FOREIGN KEY (kiosk_id) REFERENCES Kiosk(id)
        )";
        $conn->exec($sql);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }