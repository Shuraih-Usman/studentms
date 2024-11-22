<?php

$title = "Account";


$admin =  $ALL->getRow('Admins', 'id', $_SESSION['AdminID']);

if(!$admin) {
    Redirect('/home');
} 

require_once $AdminTemplate.'/header.php';
require_once $AdminTemplate.'/account.php';
require_once $AdminTemplate.'/footer.php';