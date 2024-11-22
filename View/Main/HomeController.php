<?php

$title = "Student Interface";

$user = $db->table('Students')->where('id', $_SESSION['USERID'])->first();

$patientTotal = $db->table('Students')->count();

$appoint_1 = $db->table('Scores')
                    ->count();


require_once $MainTem.'/header.php';
require_once $MainTem.'/home.php';
require_once $MainTem.'/footer.php';