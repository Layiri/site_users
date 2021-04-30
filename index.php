<?php

echo 'Hello';


try {
//    CREATE DATABASE mydatabase CHARACTER SET utf8 COLLATE utf8_general_ci;
//

    $user = 'root';
    $password = '';
    $port = '3308';
    $database = 'landing';

    $dbh = new PDO('mysql:host=localhost:' . $port . ';dbname=landing', $user, $password);
    // set the PDO error mode to exception
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $table_name = 'users';
    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS " . $table_name . " (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(30) NOT NULL,
  lastname VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";

    // use exec() because no results are returned
    $dbh->exec($sql);
    echo "Table " . $table_name . " created successfully";

    $dbh = null;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}


die;