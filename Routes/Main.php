<?php

use App\Student\Auth;

$landing = '#^/$#';
$apply = '#^/apply$#';
$loginPage = '#^/login$#';
$logoutPage = '#^/logout$#';
$homePage = '#^/home$#';
$apply_process = '#^/apply-process$#';
$resultPage = '#^/results$#';
$printPage = '#^/print/?(\?.*)?$#';
$accountPage = '#^/account$#';
$process = '#^/process/([a-z0-9-]+)$#i';
$home = '#^/home/?(\?.*)?$#';
$active = 0;


if (preg_match($landing, $request)) {       
    require_once $MainCont . '/index.php';
} elseif (preg_match($apply, $request)) {
    require_once $MainCont . '/register.php';
}  elseif (preg_match($apply_process, $request)) {
    require_once $MainCont . '/reg-process.php';
} else if(preg_match($loginPage , $request)) {

    require_once $MainCont.'/login.php';
}

if (isset($_SESSION['USERID'])) {
    if (preg_match($homePage, $request)) {
        $active = 1;
        require_once $MainCont . '/HomeController.php';
    } elseif (preg_match($process, $request, $output)) {

        
        $page = $output[1];
        require_once $MainCont . '/process/' . $page . '.php';
    } elseif (preg_match($resultPage, $request)) {
        $active = 3;
        require_once $MainCont . '/ResultController.php';
    } elseif (preg_match($printPage, $request)) {
        $active = 4;
        require_once $MainCont . '/PrintController.php';
    } elseif (preg_match($accountPage, $request)) {
        $active = 5;
        require_once $MainCont . '/AccountController.php';
    } elseif (preg_match($logoutPage, $request)) {
        (new Auth)->logout();
        Redirect(APP_URL . '/login');
        exit;
    } else {

        require_once $view . '/404.php';
    }
}
