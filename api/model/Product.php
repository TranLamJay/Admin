<?php
class Product
{
    private $id;
    private $name;
    private $price;
    private $color;
    private $GB;
    private $describe;
    private $image;
    private $loai_id;

    public function __construct($id, $name, $price, $color, $GB, $describe, $image,$loai_id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->color = $color;
        $this->GB = $GB;
        $this->describe = $describe;
        $this->image = $image;
        $this->loai_id= $loai_id;
    }

    public function __destruct()
    {
        $this->id = "";
        $this->name = "";
        $this->price = "";
        $this->color = "";
        $this->GB = "";
        $this->describe = "";
        $this->image = "";
        $this->loai_id="";
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

    public function getGB()
    {
        return $this->GB;
    }

    public function setGB($GB)
    {
        $this->GB = $GB;
    }

    public function getDescribe()
    {
        return $this->describe;
    }

    public function setDescribe($describe)
    {
        $this->describe = $describe;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getLoai_id(){
        return $this->loai_id;
    }

    public function setLoai_id($loai_id){
        $this->loai_id = $loai_id;
    }

    public function get($id)
    {
        $dbConn = new DbConnect('', '', '', '');
        $sql = "select * from noodles where id = :id";
        $data = [
            ':id' => $id
        ];
        return $dbConn->get($sql, $data);
    }

    public function getAll()
    {
        $dbConn = new DbConnect('', '', '', '');
        $sql = "select * from noodles";
        return $dbConn->getAll($sql);
    }

    public function insert()
    {
        $dbConn = new DbConnect('', '', '', '');
        $sql = "insert into noodles(id, name, price, color, GB, describe, image, loai_id) values(:id, :name, :price, :color, :GB, :describe, :image, :loai_id )";
        $data = [
            ':name' => $this->name,
            ':price' => $this->price,
            ':color' => $this->color,
            ':GB' => $this->GB,
            ':describe' => $this->describe,
            ':image' => $this->image,
            ':loai_id' => $this->loai_id,
        ];
        return $dbConn->insertData($sql, $data);
    }

    public function delete($id)
    {
        $dbConn = new DbConnect('', '', '', '');
        $sql = "delete from noodles where id = :id";
        $data = [
            ':id' => $id,
        ];
        return $dbConn->deleteData($sql, $data);
    }

    public function update($id)
    {
        $dbConn = new DbConnect('', '', '', '');
        $sql = "update noodles set id = :id, name = :name, price = :price, color = :color, GB = :GB, describe = :describe, image = :image, loai_id = :loai_id where id = :id";
        $data = [
            ':name' => $this->name,
            ':price' => $this->price,
            ':color' => $this->color,
            ':GB' => $this->GB,
            ':describe' => $this->describe,
            ':image' => $this->image,
            ':loai_id' => $this->loai_id,
            ':id' => $id
        ];
        return $dbConn->updateData($sql, $data);
    }
}
