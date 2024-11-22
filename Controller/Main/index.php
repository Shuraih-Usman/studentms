<?php

$title = APP_NAME;

$slides = scandir(PUBLIC_PATH.'/slides');
$gallery = scandir(PUBLIC_PATH.'/gallery');

require_once $MainTem.'/index.php';