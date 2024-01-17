<?php
    try {
        require "conn_db.php";
        $sql = "CREATE TABLE Payment (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            cost DECIMAL(10, 2) NOT NULL,
            method VARCHAR(50) NOT NULL,
            status VARCHAR(50) NOT NULL,
            pointsEarned INT UNSIGNED NOT NULL,
            pointsRedeemed INT UNSIGNED NOT NULL,
            transactionDate TIMESTAMP NOT NULL
        )";
        $conn->exec($sql);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }