<?php
    try {
        require "conn_db.php";
        $sql = "CREATE TABLE InkioskPurchase (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            user_id INT UNSIGNED,
            payment_id INT UNSIGNED,
            FOREIGN KEY (user_id) REFERENCES RegisteredUser(id),
            FOREIGN KEY (payment_id) REFERENCES Payment(id)
        )";
        $conn->exec($sql);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }