<?php
include '../util/DbConnect.php';
include '../model/Product.php';
include '../util/upload.php';

$name = isset($_POST['name']) ? $_POST['name'] : '';
$price = isset($_POST['price']) ? $_POST['price'] : '';
$color = isset($_POST['color']) ? $_POST['color'] : '';
$GB = isset($_POST['gb']) ? $_POST['gb'] : '';
$describe = isset($_POST['describe']) ? $_POST['describe'] : '';
$loai_id = isset($_POST['loai_id']) ? $_POST['loai_id'] : '';
$file = isset($_FILES['image']) ? $_FILES['image'] : '';
$dirUpload = '../upload_img/';

if (isset($_POST['add'])) {
    $product = new Product( $name, $price, $color, $GB, $describe, $file['name'],$loai_id);
    if (upload($file, $dirUpload) === 0) {
        header('location:../../pages/create_product/create_product.php');
    } else {
        if ($product->insert() === 1) {
            echo "<script>alert('Thêm thành công sản phẩm: $name'); window.location.assign('../../pages/create_product/create_product.php')</script>";
        } else {
            echo "<script>alert('Thông tin sai, không thể thêm!!'); window.location.assign('../../pages/create_product/create_product.php')</script>"; 
        }
    }
} elseif (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    $product = new Product('', '', '', '', '', '','','');
    if ($product->delete($id) === 1) {
        echo "<script>alert('Xoá sản phẩm thành công'); window.location.assign('../../pages/product/ListProduct.php')</script>";
    }
} elseif (isset($_POST['edit'])) {
    $id = $_POST['edit'];
    $product = new Product('', '', '', '', '', '','','');
    $data = $product->get($id);
    session_start();
    $_SESSION['edit'] = $data;
    header('location:../../pages/create_product/create_product.php');
} else if (isset($_POST['update'])) {
    $id = $_POST['update'];
    if ($file['name'] === '') {
        $product = new Product('', '', '', '', '', '', '','');
        $data = $product->get($id);
        $product->setName($name);
        $product->setPrice($price);
        $product->setColor($color);
        $product->setGB($GB);
        $product->setDescribe($describe);
        $product->setImages($data['images']);
        $product->setLoai_id($loai_id);
        if ($product->update($id) === 1) {
            session_start();
            unset($_SESSION['edit']);
            echo "<script>alert('Cập nhật thành công sản phẩm: $name'); window.location.assign('../../pages/product/ListProduct.php')</script>";
        }
    } else {
        $product = new Product('', '', '', '', '', '','','');
        $product->setName($name);
        $product->setPrice($price);
        $product->setColor($color);
        $product->setGB($GB);
        $product->setDescribe($describe);
        $product->setImages($file['name']);
        $product->setLoai_id($loai_id);
        if (upload($file, $dirUpload) === 0) {
            header('location:../../pages/create_product/create_product.php');
        } else {
            if ($product->update($id) === 1) {
                session_start();
                unset($_SESSION['edit']);
                echo "<script>alert('Cập nhật thành công sản phẩm: $name'); window.location.assign('../../pages/product/ListProduct.php')</script>";
            }
        }
    }
}
