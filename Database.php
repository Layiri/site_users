<?php

/**
 * Class Database
 * @property PDO $db
 * @property string $hostname
 * @property string $port
 * @property string $db_name
 * @property string $user_name
 * @property string $password
 *
 *
 */
class Database implements IDatabase
{
    public $db;
    public $hostname;
    public $port;
    public $db_name;
    public $user_name;
    public $password;


    /**
     * Connect to Database
     *
     */
    public function connectDatabase()
    {
        try {
            $this->db = new PDO('mysql:host=' . $this->hostname . $this->port . ';dbname=' . $this->db_name, $this->user_name, $this->password);
            // set the PDO error mode to exception
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}