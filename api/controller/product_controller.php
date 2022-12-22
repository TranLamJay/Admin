<?php
include '../util/DbConnect.php';
include '../model/Product.php';
include '../util/upload.php';

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case "GET":
        $path = explode('/', $_SERVER['REQUEST_URI']);
        if (isset($path[6]) && is_numeric($path[6])) {
            $product = new Product('', '', '', '', '', '','','');
            $data = $product->get($path[6]);
        } else {
            $product = new Product('', '', '', '', '', '','','');
            $data = $product->getAll();
        }
        echo json_encode($data);
        break;
}

$id = isset($_POST['id']) ? $_POST['id'] : '';
$name = isset($_POST['name']) ? $_POST['name'] : '';
$price = isset($_POST['price']) ? $_POST['price'] : '';
$color = isset($_POST['color']) ? $_POST['color'] : '';
$GB = isset($_POST['gb']) ? $_POST['gb'] : '';
$describe = isset($_POST['describe']) ? $_POST['describe'] : '';
$file = isset($_FILES['image']) ? $_FILES['image'] : '';
$loai_id = isset($_POST['loai_id']) ? $_POST['loai_id'] : '';
$dirUpload = '../uploaded_img/';

if (isset($_POST['add'])) {
    $product = new Product($id, $name, $price, $color, $GB, $describe, $file['name'],$loai_id);
    if (upload($file, $dirUpload) === 0) {
        header('location:../../pages/product.php');
    } else {
        if ($product->insert() === 1) {
            echo "<script>alert('Thêm thành công sản phẩm: $name'); window.location.assign('../../pages/product.php')</script>";
        } else {
            echo "<script>alert('Giá sai kiểu dữ liệu. Không thêm được'); window.location.assign('../../pages/product.php')</script>";
        }
    }
} elseif (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    $product = new Product('', '', '', '', '', '','','');
    if ($product->delete($id) === 1) {
        echo "<script>alert('Xoá thành công'); window.location.assign('../../pages/listproduct.php')</script>";
    }
} elseif (isset($_POST['edit'])) {
    $id = $_POST['edit'];
    $product = new Product('', '', '', '', '', '','','');
    $data = $product->get($id);
    session_start();
    $_SESSION['edit'] = $data;
    header('location:../../pages/product.php');
} else if (isset($_POST['update'])) {
    $id = $_POST['update'];
    if ($file['name'] === '') {
        $product = new Product('', '', '', '', '', '');
        $data = $product->get($id);
        $product->setName($name);
        $product->setPrice($price);
        $product->setDescription($description);
        $product->setCategory($category);
        $product->setOption($option);
        $product->setImage($data['image']);
        if ($product->update($id) === 1) {
            session_start();
            unset($_SESSION['edit']);
            echo "<script>alert('Cập nhật thành công sản phẩm: $name'); window.location.assign('../../pages/listproduct.php')</script>";
        }
    } else {
        $product = new Product('', '', '', '', '', '');
        $product->setName($name);
        $product->setPrice($price);
        $product->setDescription($description);
        $product->setCategory($category);
        $product->setOption($option);
        $product->setImage($file['name']);
        if (upload($file, $dirUpload) === 0) {
            header('location:../../pages/product.php');
        } else {
            if ($product->update($id) === 1) {
                session_start();
                unset($_SESSION['edit']);
                echo "<script>alert('Cập nhật thành công sản phẩm: $name'); window.location.assign('../../pages/listproduct.php')</script>";
            }
        }
    }
}
