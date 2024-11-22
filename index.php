<?php

require_once __DIR__.'/config/init.php';

$request = $_SERVER['REQUEST_URI'];
$output = [];

if(strpos($request, 'Admin')) {
    require_once ROOT.'/Routes/Admin.php';
} else if(strpos($request, 'Staff')) {
    require_once ROOT.'/Routes/Staff.php';
}  else if(strpos($request, 'Doctor')) {
    require_once ROOT.'/Routes/Doctor.php';
} else {
    
    require_once ROOT.'/Routes/Main.php';
}


