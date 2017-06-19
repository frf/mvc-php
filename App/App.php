<?php

/**
 * Created by PhpStorm.
 * User: fabiorocha
 * Aplicação principal para iniciar sistema
 * Date: 17/06/17
 * Time: 00:19
 */

namespace App;

class App
{
    private $controller;
    private $controllerFile;
    private $controllerName;
    private $action;
    private $params;
    private $token;

    /*
     * @Author: Fabio Rocha
     * Contructior para passagem de parametros iniciais para aplicação
     */
    public function __construct()
    {
        $this->friendlyUrl();

        if($this->controller == "api" && empty($this->getToken()) && $this->getToken() != TOKEN){
            header("HTTP/1.1 401 Unauthorized");
            require_once PATH . "/App/Views/error/401.php";
            exit;
        }

        define ('APP_HOST', $_SERVER['HTTP_HOST']);


    }

    /* @Author: Fabio Rocha
     * Method inicio da aplicacao
     */
    public function run()
    {

        /*
         * Caso nao venha nenhum controller definir nome de controler como Null
         * Sendo assim o / se permanece como Null sem nenhuma definicao
         */
        if($this->controller) {
            $this->controllerName = preg_replace('/[^a-zA-Z]/i', '', ucwords($this->controller) . 'Controller');
        }else{
            $this->controllerName = null;
        }

        $this->controllerFile = $this->controllerName. '.php' ;
        $this->action         = preg_replace( '/[^a-zA-Z]/i', '', $this->action );

        /*
         * Ustilizar como padrao a class HomeController
         */
        if ( ! $this->controller ) {

            $this->controller = new \App\Controllers\HomeController($this);
            $this->controller->index();

            return;

        }

        if ( ! file_exists( PATH . '/App/Controllers/' . $this->controllerFile) ) {
            require_once PATH . "/App/Views/error/404.php";
            return;
        }

        $noClass = "\\App\\Controllers\\" . $this->controllerName;

        $oController = new $noClass($this);

        if ( ! class_exists($noClass) ) {

            require_once PATH . "/App/Views/error/500.php";

            return;

        }

        if ( method_exists($oController , $this->action ) ) {

            $oController->{$this->action}( $this->params );

            return;

        }else if ( ! $this->action && method_exists($oController, 'index' ) ) {

            $oController->index( $this->params );

            return;

        } else{

            require_once PATH . "/App/Views/error/500.php";

            return;
        }

        require_once PATH . "/App/Views/error/404.php";

        return;

    }
    /*
     * @Author: Fabio Rocha
     * @Return: Array posicao
     */
    function checkArray ( $array, $key ) {
        if ( isset( $array[ $key ] ) && !empty( $array[ $key ] ) ) {
            return $array[ $key ];
        }
        return null;
    }
    /*
     * @Author: Fabio Rocha
     * Preocessa URL amigavel para montagem dos parametros de controller,action e parametros
     */
    public function friendlyUrl () {

        if ( isset( $_GET['url'] ) ) {

            $path           = $_GET['url'];
            $this->token    = $_GET['token'];

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
    public function getToken(){
        return $this->token;
    }
}