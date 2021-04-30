<?php


/**
 * Class Model User for table users
 * @property int $id
 * @property string $full_name
 * @property string $email
 * @property string $phone
 * @property int $created_at
 * @property int $updated_at
 *
 * @property PDO $db
 * @property string $table
 */
class User
{
    public $id;
    public $full_name;
    public $email;
    public $phone;
    public $created_at;
    public $updated_at;
    private $db;

    public $table = 'users';

    /**
     * User constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * Insert user
     * @return bool
     */
    public function save()
    {
        $req = $this->db->prepare('INSERT INTO ' . $this->table . '(name,email,phone,created_at,updated_at) VALUES(:name, :email, :phone, :created_at, :updated_at)');
        $req->execute(array(
            'name' => $this->full_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'created_at' => time(),
            'updated_at' => time()
        ));
        return true;
    }

    /**
     * Update user
     * @return bool
     */
    public function update()
    {
        $req = $this->db->prepare('UPDATE ' . $this->table . ' SET name=:name,email=:email,phone=:phone,updated_at=:updated_at WHERE id=:id');
        $req->execute(array(
            'name' => $this->full_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'updated_at' => time(),
            'id' => $this->id
        ));
        return true;
    }

    /**
     * Delete element
     * @return bool
     */
    public function delete()
    {
        $req = $this->db->prepare("DELETE FROM " . $this->table . " WHERE id=?");
        $req->execute(array($this->id));

        return true;
    }

    /**
     * Get all users
     * @return array/
     */
    public function all()
    {
        $req = $this->db->prepare('SELECT *  FROM ' . $this->table);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_CLASS);
    }

    /**
     * Get one user
     * @param int $id
     * @return array
     */
    public function one(int $id)
    {
        $req = $this->db->prepare("SELECT * FROM " . $this->table . " WHERE id=:id");
        $req->execute(['id' => $id]);

        return $req->fetch();
    }

}