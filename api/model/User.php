<?php
include_once "../util/DbConnect.php";
class User{

    private $username;  
    private $email;
    private $password;
    
    public function __construct($username,$email,$password){
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }
    
    public function setUsername($username){
        $this->username = $username;    
    }
    public function getUsername(){
        return $this->username;
    }
    public function setEmail($email){
        $this->email = $email;    
    }
    public function getEmail(){
        return $this->email;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function getPassword(){
        return $this->password;
    }

    public function insertData() {
        $dbCon = new DbConnect("","","","");
        $data = [
            'name' => $this->username,
            'email' => $this->email,
            'password' => $this->password
        ];
        $sql = "INSERT INTO user(name,email, password) VALUES (:name,:email, :password)";
        $dbCon->insertData($sql, $data);
    }

    public function getAllUser(){
        $dbCon = new DbConnect("","","","");
        $query = "SELECT * FROM user";
        $data = $dbCon->getAll($query);
        $dbCon->disconnect();
        return $data;
    }

    public function getData() {
        $dbCon = new DbConnect("","","","");
        $sql = "SELECT * FROM user WHERE email=:email";
        $data = ['email' => $this->email];
        return $dbCon->get($sql, $data);
    }

    public function deleteUser($username) {
        $dbCon = new DbConnect("","","","");
        $data = [
            'username' => $username
        ];
        $sql = "DELETE FROM user WHERE username=:username";
        $dbCon->deleteData($sql,$data);
    }
}