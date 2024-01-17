<?php
    try {
        require "conn_db.php";
        $sql = "CREATE TABLE FoodVendor (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            admin_id INT UNSIGNED NULL,
            name VARCHAR(100) NOT NULL,
            phoneNum VARCHAR(15) NOT NULL UNIQUE,
            email VARCHAR(100) NOT NULL UNIQUE,
            username VARCHAR(100) NOT NULL UNIQUE,
            password VARCHAR(100) NOT NULL,
            photo TEXT NOT NULL,
            approval VARCHAR(20) NULL,
            FOREIGN KEY (admin_id) REFERENCES Administrator(id)
        )";
        $conn->exec($sql);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }