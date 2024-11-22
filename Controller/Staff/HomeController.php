<?php

$title = "Teachers Interface";

$user = $db->table('Teachers')->where('id', $_SESSION['StaffID'])->first();

$patientTotal = $db->table('Students')->count();

$appoint_1 = $db->table('Scores')
                    ->count();


require_once $StaffTemp.'/header.php';
require_once $StaffTemp.'/home.php';
require_once $StaffTemp.'/footer.php';