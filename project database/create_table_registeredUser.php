<?php
    try {
        require "conn_db.php";
        $sql = "CREATE TABLE RegisteredUser (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            user_id INT UNSIGNED NOT NULL,
            username VARCHAR(100) NOT NULL UNIQUE,
            password VARCHAR(100) NOT NULL,
            type VARCHAR(20) NOT NULL,
            photo TEXT NOT NULL,
            FOREIGN KEY (user_id) REFERENCES GeneralUser(id)
        )";
        $conn->exec($sql);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }