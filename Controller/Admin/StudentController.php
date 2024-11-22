<?php

$title = "Students";

$admin = $db->table('Admins')->where('id', $_SESSION['AdminID'])->first();

require_once $AdminTemplate.'/header.php';
require_once $AdminTemplate.'/student.php';
require_once $AdminTemplate.'/footer.php';