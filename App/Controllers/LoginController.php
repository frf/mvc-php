<?php

namespace App\Controllers;

use App\Lib\Auth;
use App\Models\Usuario;

class LoginController extends Controller
{
    private $app;

    public function __construct($app)
    {
        $this->app = $app;
    }

    public function index()
    {

        $this->existeLayout(false);

        self::setViewCss('/public/css/signin.css');

        self::setViewParam('nameController', $this->app->getNameController());

        $this->render('login/index');

    }

    public function entrar()
    {
        $this->existeLayout(false);

        if ($oUser = Usuario::logar($_POST)) {

            Auth::gravaSessao($oUser);

            $this->redirect('admin/');
        } else {

            $this->redirect('login/');
        }
    }

    public function sair()
    {
        $this->existeLayout(false);

        Auth::deslogar();

        $this->redirect('login/');

    }
    public function cadastrar()
    {

        $this->existeLayout(false);

        self::setViewParam('nameController', $this->app->getNameController());

        $this->render('login/cadastrar');

    }

    public function salvar()
    {
        $this->existeLayout(false);

        if($oUser = Usuario::salvar($_POST)){

            Auth::gravaSessao($oUser);

            $this->redirect('admin/');
        }

        $this->redirect('admin/index');

    }

}