<?php

include 'config.php';

spl_autoload_register(function ($class_name) {
    include __DIR__ . '/' . $class_name . '.php';
});

$conn = new Database();
$conn->hostname = $config['hostname'];
$conn->port = ($config['port']) ? ':' . $config['port'] : '';
$conn->db_name = $config['database'];
$conn->user_name = $config['user_name'];
$conn->password = $config['password'];


$conn->connectDatabase();


$table_name = 'users';

// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS " . $conn->db_name . " (
                        `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        `name` VARCHAR(255) NOT NULL,
                        `email` VARCHAR(100) NOT NULL,
                        `phone` VARCHAR(50) NOT NUll,
                        `created_at` INT(11) NOT NULL,
                        `updated_at` INT(11) NOT NULL
            )";

// use exec() because no results are returned
$conn->db->exec($sql);

echo "Table " . $table_name . " created successfully";

