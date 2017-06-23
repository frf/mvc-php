<?php

namespace App\Controllers;

use App\Lib\DB;
use App\Models\Usuario;


class UsuarioController extends Controller
{
    private $app;

    public function __construct($app)
    {
        $this->app = $app;

        self::setViewParam('nameController',$this->app->getNameController());

    }

    public function index()
    {

        $oListaProduto = Usuario::listar();

        self::setViewParam('aListaUsuario',$oListaProduto);

        $this->render('usuario/index');

    }

    public function cadastrar()
    {

        self::setViewJs('/public/js/jquery.maskMoney.min.js');
        self::setViewJs('/public/js/jquery-ui.js');
        self::setViewJs('/public/js/main.datepicker.js');
        self::setViewJs('/public/js/main.mask.money.js');
        self::setViewCss('/public/css/jquery-ui.min.css');

        $this->render('usuario/cadastrar');

    }

    public function salvar()
    {

        Usuario::salvar($_POST);

        $this->redirect('usuario/index');

    }

    public function atualizar()
    {

        Usuario::atualizar($_POST);

        $this->redirect('usuario/index');

    }

    public function editar()
    {

        self::setViewJs('/public/js/jquery.maskMoney.min.js');
        self::setViewJs('/public/js/jquery-ui.js');
        self::setViewJs('/public/js/main.datepicker.js');
        self::setViewJs('/public/js/main.mask.money.js');
        self::setViewCss('/public/css/jquery-ui.min.css');

        self::setViewParam('aUsuario',Usuario::listar($this->app->getParams()[0]));

        $this->render('usuario/editar');

    }

    public function excluir($param)
    {
        $id = $param[0];

        Usuario::excluir($id);

        $this->redirect('usuario/index');

    }

}