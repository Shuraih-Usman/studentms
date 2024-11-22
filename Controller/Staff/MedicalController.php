<?php

$title = "Medical Records";


$appointements =  $db->table('appointments')
                ->where('status', 'Scheduled')
                ->where('doctor_id', $_SESSION['DoctorID'])
                ->get();

require_once $StaffTemp.'/header.php';
require_once $StaffTemp.'/medical.php';
require_once $StaffTemp.'/footer.php';