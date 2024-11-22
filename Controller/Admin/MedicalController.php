<?php

$title = "Medical Records";


$appointements =  $db->table('appointments')->where('status', 'Scheduled')->get();

require_once $AdminTemplate.'/header.php';
require_once $AdminTemplate.'/medical.php';
require_once $AdminTemplate.'/footer.php';