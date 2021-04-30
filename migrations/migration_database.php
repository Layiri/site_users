<?php

include_once '../config/config.php';
include_once '../helpers/Database.php';


$conn = Database::connectDatabase($config);


$table_name = 'users';
// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS " . $table_name . " (
                        `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        `name` VARCHAR(255) NOT NULL,
                        `email` VARCHAR(100) NOT NULL UNIQUE,
                        `phone` VARCHAR(50) NOT NUll UNIQUE,
                        `created_at` INT(11) NOT NULL,
                        `updated_at` INT(11) NOT NULL
            )";

// use exec() because no results are returned
$conn->exec($sql);

echo "Table " . $table_name . " created successfully";

