<?php

$title = "Student Interface";

$user = $db->table('Students')->where('id', $_SESSION['USERID'])->first();


$appoint_1 = $db->table('Scores')
                    ->where('id', $_SESSION['USERID'])
                    ->count();


require_once $MainTem.'/header.php';
require_once $MainTem.'/home.php';
require_once $MainTem.'/footer.php';