<?php
    try {
        require "conn_db.php";
        $sql = "CREATE TABLE OrderItem (
            order_id INT UNSIGNED,
            menu_id INT UNSIGNED,
            quantity INT UNSIGNED NOT NULL,
            specialRemark TEXT,
            FOREIGN KEY (order_id) REFERENCES Orders(id),
            FOREIGN KEY (menu_id) REFERENCES Menu(id),
            PRIMARY KEY (order_id, menu_id)
        )";
        $conn->exec($sql);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }