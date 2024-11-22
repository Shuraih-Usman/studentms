<?php

$title = "Account";


$row =  $ALL->getRow('Students', 'id', $_SESSION['USERID']);

if(!$row) {
    Redirect('/home');
} 

require_once $MainTem.'/header.php';
require_once $MainTem.'/account.php';
require_once $MainTem.'/footer.php';