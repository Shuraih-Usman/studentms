<?php
if(!session_id()) {
    session_start();
}
use App\General;
require_once __DIR__.'/db.php';
require_once __DIR__.'/config.php';
require_once __DIR__.'/../vendor/autoload.php';

$db = new DBFlex('sqlite', null, null, null, null, $dbPath);
$ALL = new General;

$controller = ROOT.'/Controller';
$view = ROOT.'/View';
$AdminCont = $controller.'/Admin';
$AdminTemplate = $view.'/Admin';
$StaffCont = $controller.'/staff';
$StaffTemp = $view.'/staff';
$MainCont = $controller.'/Main';
$MainTem = $view.'/Main';


require_once __DIR__.'/functions.php';