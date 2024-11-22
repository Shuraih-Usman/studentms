<?php
use App\Staff\Auth;

$title = 'Teacher Login Page';
$Auth = new Auth();

if($Auth->isLogin()) {
    Redirect(STAFF_URL.'/home');
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];

    
    $login = $Auth->Login($username, $password, $db);



    if($login['s'] == 1) {
        $success = $login['m'];
        Redirect(STAFF_URL.'/home');
    } else {
        $error = $login['m'];
    }
}

require_once $StaffTemp.'/login.php';