<?php
class Product
{
    private $name;
    private $price;
    private $color;
    private $GB;
    private $describe;
    private $images;
    private $loai_id;

    public function __construct( $name, $price, $color, $GB, $describe, $images,$loai_id)
    {
        $this->name = $name;
        $this->price = $price;
        $this->color = $color;
        $this->GB = $GB;
        $this->describe = $describe;
        $this->images = $images;
        $this->loai_id= $loai_id;
    }

    public function __destruct()
    {
        $this->name = "";
        $this->price = "";
        $this->color = "";
        $this->GB = "";
        $this->describe = "";
        $this->images = "";
        $this->loai_id="";
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

    public function getImages()
    {
        return $this->images;
    }

    public function setImages($images)
    {
        $this->images = $images;
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
        $sql = "select * from sanpham where id = :id";
        $data = [
            ':id' => $id
        ];
        return $dbConn->get($sql, $data);
    }

    public function getAll()
    {
        $dbConn = new DbConnect('', '', '', '');
        $sql = "select * from sanpham";
        return $dbConn->getAll($sql);
    }

    public function insert()
    {
        $dbConn = new DbConnect('', '', '', '');
        $sql = "insert into sanpham(name, price, color, gb, describe, images, loai_id) values( :name, :price, :color, :gb, :describe, :images, :loai_id )";
        $data = [
            ':name' => $this->name,
            ':price' => $this->price,
            ':color' => $this->color,
            ':gb' => $this->GB,
            ':describe' => $this->describe,
            ':images' => $this->images,
            ':loai_id' => $this->loai_id,
        ];
        return $dbConn->insertData($sql, $data);
    }

    public function delete($id)
    {
        $dbConn = new DbConnect('', '', '', '');
        $sql = "delete from sanpham where id = :id";
        $data = [
            ':id' => $id,
        ];
        return $dbConn->deleteData($sql, $data);
    }

    public function update($id)
    {
        $dbConn = new DbConnect('', '', '', '');
        $sql = "update sanpham set name = :name, price = :price, color = :color, gb = :gb, describe = :describe, image = :image, loai_id = :loai_id where id = :id";
        $data = [
            ':name' => $this->name,
            ':price' => $this->price,
            ':color' => $this->color,
            ':gb' => $this->GB,
            ':describe' => $this->describe,
            ':images' => $this->images,
            ':loai_id' => $this->loai_id,
            ':id' => $id
        ];
        return $dbConn->updateData($sql, $data);
    }
}
