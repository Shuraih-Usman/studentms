<?php

$title = "Admin Interface";

$admin = $db->table('Admins')->where('id', $_SESSION['AdminID'])->first();

$students = $db->table('Students')->count();
$teachers = $db->table('Teachers')->count();
$results = $db->table('Scores')->count();


$staffs = $db->table('Admins')->count();




$records = $db->table('Students')->orderBy('id')->limit(10)->get();

require_once $AdminTemplate.'/header.php';
require_once $AdminTemplate.'/home.php';
require_once $AdminTemplate.'/footer.php';



