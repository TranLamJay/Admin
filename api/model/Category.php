<?php
class Category
{
    private $id;
    private $name;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function __destruct()
    {
        $this->id = "";
        $this->name = "";
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function get()
    {
        $dbConn = new DbConnect('', '', '', '');
        $sql = "select * from loaisanpham where id = :id";
        $data = [
            ':id' => $this->id
        ];
        return $dbConn->get($sql, $data);
    }

    public function getAll()
    {
        $dbConn = new DbConnect('', '', '', '');
        $sql = "select * from loaisanpham";
        return $dbConn->getAll($sql);
    }

    public function insert()
    {
        $dbConn = new DbConnect('', '', '', '');
        $sql = "insert into loaisanpham(id, name) values(:id, :name)";
        $data = [
            ':id' => $this->id,
            ':name' => $this->name
        ];
        return $dbConn->insertData($sql, $data);
    }

    public function delete()
    {
        $dbConn = new DbConnect('', '', '', '');
        $sql = "delete from loaisanpham where id = :id";
        $data = [
            ':id' => $this->id,
        ];
        return $dbConn->deleteData($sql, $data);
    }

    public function update()
    {
        $dbConn = new DbConnect('', '', '', '');
        $sql = "update loaisanpham set name = :name where id = :id";
        $data = [
            ':name' => $this->name,
            ':id' => $this->id
        ];
        return $dbConn->updateData($sql, $data);
    }
}
