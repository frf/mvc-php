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

    /*
     * @Author: Fabio Rocha
     * Contructior para passagem de parametros iniciais para aplicação
     */
    public function __construct()
    {
    }

    /* @Author: Fabio Rocha
     * Method inicio da aplicacao
     */
    public function run()
    {
        $this->friendlyUrl();

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

        require_once "controllers/Controller.php";


        /*
         * Ustilizar como padrao a class HomeController
         */
        if ( ! $this->controller ) {

            require_once "controllers/HomeController.php";

            $this->controller = new \HomeController($this);
            $this->controller->index();

            return;

        }

        if ( ! file_exists( PATH . '/controllers/' . $this->controllerFile) ) {
            require_once PATH . "/views/error/404.php";
            return;
        }

        require_once "controllers/" . $this->controllerFile;

        $oController = new $this->controllerName($this);

        if ( ! class_exists($this->controllerName) ) {

            require_once PATH . "/views/error/500.php";

            return;

        }

        if ( method_exists($oController , $this->action ) ) {

            $oController->{$this->action}( $this->params );

            return;

        }else if ( ! $this->action && method_exists($oController, 'index' ) ) {

            $oController->index( $this->params );

            return;

        } else{

            require_once PATH . "/views/error/500.php";

            return;
        }

        require_once PATH . "/views/error/404.php";

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

            $path = $_GET['url'];

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

    public function getNameController()
    {
        return $this->controllerName;
    }
    public function getParams()
    {
        return $this->params;
    }
}