<?php

$title = "Appointments";

$doctors =  $db->table('doctors')->where('status', 1)->get();
$patients =  $db->table('patients')->where('status', 1)->get();

require_once $StaffTemp.'/header.php';
require_once $StaffTemp.'/appointment.php';
require_once $StaffTemp.'/footer.php';