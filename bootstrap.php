<?php
/**
 * Created by PhpStorm.
 * User: fabiorocha
 * Date: 16/06/17
 * Time: 23:56
 */

use App\App;

session_start();

require_once 'config.php';       // Configuracoes do sistema
require_once("vendor/autoload.php");

$app = new App();
$app->run();