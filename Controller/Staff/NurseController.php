<?php

$title = "Nurses";

$admin = $db->table('admins')->where('id', $_SESSION['AdminID'])->first();

require_once $AdminTemplate.'/header.php';
require_once $AdminTemplate.'/nurse.php';
require_once $AdminTemplate.'/footer.php';