<?php
    try {
        require "conn_db.php";
        $sql = "CREATE TABLE Orders (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            user_id INT UNSIGNED,
            payment_id INT UNSIGNED,
            status VARCHAR(50) NOT NULL,
            FOREIGN KEY (user_id) REFERENCES GeneralUser(id),
            FOREIGN KEY (payment_id) REFERENCES Payment(id)
        )";
        $conn->exec($sql);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }