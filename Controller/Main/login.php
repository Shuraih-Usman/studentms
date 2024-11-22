<?php
use App\Student\Auth;

$title = 'Student Login Page';
$Auth = new Auth();

if($Auth->isLogin()) {
    Redirect(APP_URL.'/home');
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['reg_number'];
    $password = $_POST['password'];

    
    $login = $Auth->Login($username, $password, $db);



    if($login['s'] == 1) {
        $success = $login['m'];
        Redirect(APP_URL.'/home');
    } else {
        $error = $login['m'];
    }
}

require_once $MainTem.'/login.php';