<?php

use App\Staff\Auth;

$loginPage = '#^/Staff/login$#';
$logoutPage = '#^/Staff/logout$#';
$homePage = '#^/Staff/home$#';
$studentPage = '#^/Staff/students$#';
$resultPage = '#^/Staff/results$#';
$printPage = '#^/Staff/print/?(\?.*)?$#';
$accountPage = '#^/Staff/account$#';
$process = '#^/Staff/process/([a-z0-9-]+)$#i';
$home = '#^/Staff/?(\?.*)?$#';
$active = 0;

if (!isset($_SESSION['StaffID']) && !preg_match($loginPage, $request)) {
    Redirect(APP_URL . '/Staff/login');
    exit;
}

if (preg_match($loginPage, $request)) {
        
    require_once $StaffCont . '/login.php';
}

if (isset($_SESSION['StaffID'])) {
    if (preg_match($home, $request)) {
        Redirect(STAFF_URL . '/home');
        exit;
        
    } elseif (preg_match($homePage, $request)) {
        $active = 1;
        require_once $StaffCont . '/HomeController.php';
    } elseif (preg_match($process, $request, $output)) {
        // Capture the process page from URL and require the appropriate file
        $page = $output[1];
        require_once $StaffCont . '/process/' . $page . '.php';
    } elseif (preg_match($studentPage, $request)) {
        $active = 2;
        require_once $StaffCont . '/StudentController.php';
    } elseif (preg_match($resultPage, $request)) {
        $active = 3;
        require_once $StaffCont . '/ResultController.php';
    } elseif (preg_match($printPage, $request)) {
        $active = 4;
        require_once $StaffCont . '/PrintController.php';
    } elseif (preg_match($accountPage, $request)) {
        $active = 5;
        require_once $StaffCont . '/AccountController.php';
    } elseif (preg_match($logoutPage, $request)) {
        // Handle staff logout and redirect to login page
        (new Auth)->logout();
        Redirect(STAFF_URL . '/login');
        exit;
    } else {
        // If no match, display 404 error page
        require_once $view . '/404.php';
    }
}
