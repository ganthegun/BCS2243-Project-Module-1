<?php
    try {
        require "conn_db.php";
        $sql = "CREATE TABLE Membership (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            registered_id INT UNSIGNED NOT NULL,
            points INT UNSIGNED NOT NULL,
            balance DECIMAL(10, 2) NOT NULL,
            startDate TIMESTAMP NOT NULL,
            renewalDate VARCHAR(255) NOT NULL,
            FOREIGN KEY (registered_id) REFERENCES RegisteredUser(id)
        )";
        $conn->exec($sql);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }