<?php

use App\App;
use App\Lib\Error;

session_start();

error_reporting(E_ALL & ~E_NOTICE);

require_once("vendor/autoload.php");

try {
    $app = new App();
    $app->run();
}catch (\Exception $e){
    $oError = new Error($e);
    $oError->render();
}