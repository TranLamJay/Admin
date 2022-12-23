<?php
session_start();
include_once "../model/User.php";

if (isset($_POST)) {
    if ($_POST['contact-login'] == 'Login') {
        $username = isset($_POST['contact-username'])?$_POST['contact-username']:"";
        $email = isset($_POST['contact-email'])?$_POST['contact-email']:"";
        $password = isset($_POST['contact-password'])?md5($_POST['contact-password']):"";

        $user = new User($username, $email, $password);
       
        $data = $user->getData();

        
        if ($email == $data['email'] && $password == $data['password']) {
            $_SESSION['username'] = $data['name'];
            $_SESSION['is_login'] = true;
            header("Location: ../../pages/user/ListUser.php");
            // exit();
        } else {
            header("Location: ../../pages/samples/login-2.php");
            // exit();
        }
    } else {
        header("Location: ../../pages/samples/login-2.php");
        // exit();
    }
}
?>