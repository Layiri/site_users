<?php

include_once 'IDatabase.php';

/**
 * Class Database
 *
 */
class Database implements IDatabase
{
    /**
     * @param array $config
     * @return PDO
     */
    public static function connectDatabase(array $config)
    {
        try {
            $conn = new PDO("mysql:host=" . $config['db']['host'] . ";port=" . $config['db']['port'] . ";dbname=" . $config['db']['dbname'], $config['db']['username'], $config['db']['password']);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo "<br>" . $e->getMessage();
            die();
        }
    }
}