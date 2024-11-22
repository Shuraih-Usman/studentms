<?php
use App\Admin\Auth;

$title = 'Admin Login Page';
$Auth = new Auth();

if($Auth->isLogin()) {
    Redirect(ADMIN_URL.'/home');
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];

    
    $login = $Auth->Login($username, $password, $db);



    if($login['s'] == 1) {
        $success = $login['m'];
        Redirect(APP_URL.'/Admin/home');
    } else {
        $error = $login['m'];
    }
}

require_once $AdminTemplate.'/login.php';