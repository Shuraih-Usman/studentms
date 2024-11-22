<?php
use App\Admin\Auth;

$loginPage = '/\/Admin\/login/';
$logoutPage = '/\/Admin\/logout/';
$homePage = '/\/Admin\/home/';
$studentPage = '/\/Admin\/students/';
$resultPage = '/\/Admin\/results/';
$staffPage = '/\/Admin\/staffs/';
$teacherPage = '/\/Admin\/teachers/';
$printPage = '#^/Admin/print/?(\?.*)?$#';
$accountPage = '/\/Admin\/account/';
$process = '/\/Admin\/process\/([a-z0-9-]+)/i';
$active = 0;

if(!isset($_SESSION['AdminID']) && $request !== '/Admin/login') {
    Redirect(APP_URL.'/Admin/login');
} else {

    if($request === '/Admin') {

        Redirect(ADMIN_URL.'/home');

    } else if(preg_match($loginPage, $request, $output)) {
        require_once $AdminCont.'/login.php';
    } else if(preg_match($homePage, $request, $output)) {
        $active = 1;
        require_once $AdminCont.'/HomeController.php';
    }else if(preg_match($studentPage, $request, $output)) {
        $active = 2;
        require_once $AdminCont.'/StudentController.php';
    }else if(preg_match($process, $request, $output)) {
        $page = $output[1];
        require_once $AdminCont.'/process/'.$page.'.php';
    }else if(preg_match($resultPage, $request, $output)) {
        $active = 3;
        require_once $AdminCont.'/ResultController.php';
    } else if(preg_match($staffPage, $request, $output)) {
        $active = 4;
        require_once $AdminCont.'/StaffController.php';
    }  else if(preg_match($teacherPage, $request, $output)) {
        $active = 5;
        require_once $AdminCont.'/TeacherController.php';
    }  else if(preg_match($printPage, $request, $output)) {
        $active = 6;
         require_once $AdminCont.'/PrintController.php';
    }  else if(preg_match($accountPage, $request, $output)) {
        $active = 7;
        require_once $AdminCont.'/AccountController.php';
    }  else if(preg_match($logoutPage, $request, $output)) {
       
        $logout = (new Auth)->logout();
        echo $logout;
        Redirect(ADMIN_URL.$loginPage);
        
    } else {
        
        require_once $view.'/404.php';
    }
}



