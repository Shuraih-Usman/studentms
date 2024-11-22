<?php

$title = "Account";


$admin =  $ALL->getRow('Teachers', 'id', $_SESSION['StaffID']);

if(!$admin) {
    Redirect('/home');
} 

require_once $StaffTemp.'/header.php';
require_once $StaffTemp.'/account.php';
require_once $StaffTemp.'/footer.php';