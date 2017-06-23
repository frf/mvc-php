<?php
/*
 * @Author Fabio Rocha
 */
namespace App;

use App\Lib\Auth;
use App\Lib\Config;
use App\Lib\Util;
use Exception;

class App
{
    private $controller;
    private $controllerFile;
    private $controllerName;
    private $action;
    private $params;
    private $token;
    private $oConfig;

    public function __construct()
    {
        /*
         * Constantes do sistema
         */
        define('APP_HOST', $_SERVER['HTTP_HOST']);
        define('PATH', realpath('./'));

        $this->friendlyUrl();
        $this->initConfig();

        if ($this->controller == "api" && empty($this->getToken()) && $this->getToken() != TOKEN) {
            header("HTTP/1.1 401 Unauthorized");
            require_once PATH . "/App/Views/error/401.php";
            exit;
        }
    }

    public function initConfig()
    {
        if(!file_exists(PATH . "/config.json")){
            throw new Exception("Arquivo de configuração inválido.!", 500);
        }

        $this->oConfig = new Config(PATH . "/config.json");
    }

    public function run()
    {

        if ($this->controller) {
            $this->controllerName = preg_replace('/[^a-zA-Z]/i', '', ucwords($this->controller) . 'Controller');
        } else {
            $this->controllerName = null;
        }

        $this->controllerFile = $this->controllerName . '.php';
        $this->action = preg_replace('/[^a-zA-Z]/i', '', $this->action);

        if (!$this->controller) {

            $this->controller = new \App\Controllers\HomeController($this);
            $this->controller->index();

            return;

        }

        if (!file_exists(PATH . '/App/Controllers/' . $this->controllerFile)) {

            throw new Exception("Página não encontrada.", 404);

        }

        $noClass = "\\App\\Controllers\\" . $this->controllerName;

        $oController = new $noClass($this);

        if (!class_exists($noClass)) {

            throw new Exception("Nosso suporte já esta verificando desculpe!", 500);

            return;

        }

        (Auth::checkController($oController)) ? Util::redirect('login/') : "";

        if (method_exists($oController, $this->action)) {

            $oController->{$this->action}($this->params);

            return;

        } else if (!$this->action && method_exists($oController, 'index')) {

            $oController->index($this->params);

            return;

        } else {

            throw new Exception("Nosso suporte já esta verificando desculpe!", 500);

        }

        throw new Exception("Página não encontrada.", 404);

        return;
    }

    public function friendlyUrl () {

        if ( isset( $_GET['url'] ) ) {

            $path           = $_GET['url'];
            $this->token    = (isset($_GET['token'])) ? $_GET['token'] : "";

            $path = rtrim($path, '/'); //REMOVE ULTIMA BARRA
            $path = filter_var($path, FILTER_SANITIZE_URL); // LIMPA URL

            $path = explode('/', $path);

            $this->controller  = $this->checkArray( $path, 0 );
            $this->action      = $this->checkArray( $path, 1 );

            // Configura os parâmetros
            if ( $this->checkArray( $path, 2 ) ) {
                //REMOVE CONTROLLER E ACTION
                unset( $path[0] );
                unset( $path[1] );

                //PEGA TODOS VALORES DO ARRAY
                $this->params = array_values( $path );
            }
        }
    }

    private function checkArray ( $array, $key ) {
        if ( isset( $array[ $key ] ) && !empty( $array[ $key ] ) ) {
            return $array[ $key ];
        }
        return null;
    }

    public function getToken(){
        return $this->token;
    }

    public function getController()
    {
        return $this->controller;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function getNameController()
    {
        return $this->controllerName;
    }

    public function getParams()
    {
        return $this->params;
    }

    public function getConfig(){
        return $this->oConfig->getConfig();
    }
}