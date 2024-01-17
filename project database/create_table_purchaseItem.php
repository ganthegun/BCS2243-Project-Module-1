<?php
    try {
        require "conn_db.php";
        $sql = "CREATE TABLE PurchaseItem (
            purchase_id INT UNSIGNED,
            menu_id INT UNSIGNED,
            quantity INT UNSIGNED NOT NULL,
            specialRemark TEXT,
            FOREIGN KEY (purchase_id) REFERENCES InKioskPurchase(id),
            FOREIGN KEY (menu_id) REFERENCES Menu(id),
            PRIMARY KEY (purchase_id, menu_id)
        )";
        $conn->exec($sql);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }