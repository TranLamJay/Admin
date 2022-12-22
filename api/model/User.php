<?php
class User
{
    private $id;
    private $name;
    private $email;
    private $password;

    public function __construct($id, $name, $email, $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function __destruct()
    {
        $this->id = "";
        $this->name = "";
        $this->email = "";
        $this->password = "";
    }

    public function getId(){
        return $this->id;
    }

    public function getname()
    {
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getAll()
    {
        $dbConn = new DbConnect("", "", "", "");
        $sql = "select * from accounts";
        return $dbConn->getAll($sql);
    }

    public function get($id)
    {
        $dbConn = new DbConnect("", "", "", "");
        $sql = "select * from accounts where id = :id";
        $data = [
            ':id' => $id,
        ];
        return $dbConn->get($sql, $data);
    }

    public function find()
    {
        $dbConn = new DbConnect("", "", "", "");
        $sql = "select * from accounts where email = :email and password = :password";
        $data = [
            ':email' => $this->email,
            ':password' => $this->password,
        ];
        return $dbConn->get($sql, $data);
    }

    public function insert()
    {
        $dbConn = new DbConnect("", "", "", "");
        $sql = "insert into accounts(id,name,email,password) values(:id,:name,:email,:password)";
        $data = [
            ':id' => $this->id,
            ':name' => $this->name,
            ':email' => $this->email,
            ':password' => $this->password
        ];
        return $dbConn->insertData($sql, $data);
    }

    public function update($id)
    {
        $dbConn = new DbConnect("", "", "", "");
        $sql = "update accounts set name = :name, email = :email, password = :password where id = :id";
        $data = [
            ':name' => $this->name,
            ':email' => $this->email,
            ':password' => $this->password,
            ':id' => $id
        ];
        return $dbConn->updateData($sql, $data);
    }
}
