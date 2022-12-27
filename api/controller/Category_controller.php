<?php
include '../util/DbConnect.php';
include '../model/Category.php';


$id = isset($_POST['id']) ? $_POST['id'] : '';
$name = isset($_POST['name']) ? $_POST['name'] : '';

if (isset($_POST['add'])) {
    $category = new Category($id, $name);
    if ($category->insert() === 1) {
        echo "<script>alert('Thêm thành công danh mục: $name'); window.location.assign('../../pages/Category/Create_Category.php')</script>";
    } else {
        echo "<script>alert('Id hoặc tên danh mục đã tồn tại. Không thêm được'); window.location.assign('../../pages/Category/Create_Category.php')</script>";
    }
} elseif (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    $category = new Category($id, '');
    if ($category->delete() === 1) {
        echo "<script>alert('Xoá thành công danh mục: $id'); window.location.assign('../../pages/Category/ListCategory.php')</script>";
    } else {
        echo "<script>alert('Có sản phẩm thuộc danh mục này. Không xoá được'); window.location.assign('../../pages/Category/ListCategory.php')</script>";
    }
} elseif (isset($_POST['edit'])) {
    $id = $_POST['edit'];
    $category = new Category($id, '');
    $data = $category->get();
    session_start();
    $_SESSION['edit'] = $data;
    header('location:../../pages/Category/Create_Category.php');
} else if (isset($_POST['update'])) {
    $id = $_POST['update'];
    $category = new Category($id, '');
    $category->setName($name);
    if ($category->update() === 1) {
        session_start();
        unset($_SESSION['edit']);
        echo "<script>alert('Cập nhật thành công danh mục: $name'); window.location.assign('../../pages/Category/ListCategory.php')</script>";
    }
}
