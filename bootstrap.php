<?php
/**
 * Created by PhpStorm.
 * User: fabiorocha
 * Date: 16/06/17
 * Time: 23:56
 */

use App\App;

session_start();

error_reporting(E_ALL & ~E_NOTICE);

require_once("vendor/autoload.php");

$app = new App();
$app->run();