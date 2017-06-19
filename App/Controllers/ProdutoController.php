<?php

namespace App\Controllers;

use App\Models\Produto;



class ProdutoController extends Controller
{

    private $app;

    public function __construct($app)
    {
        $this->app = $app;

        self::setViewParam('nameController',$this->app->getNameController());

    }

    public function index()
    {

        $oProduto = new Produto();

        $oListaProduto = $oProduto->listar();

        self::setViewParam('aListaProduto',$oListaProduto);

        $this->render('produto/index');

    }

    public function cadastrar()
    {

        $oProduto = new Produto();

        $oProduto->listar();

        $this->render('produto/cadastrar');

    }

    public function salvar()
    {

        $oProduto = new Produto();

        $oProduto->salvar($_POST);

        $this->redirect('produto/index');

    }

    public function atualizar()
    {

        $oProduto = new Produto();

        $oProduto->atualizar($_POST);

        $this->redirect('produto/index');

    }

    public function editar()
    {

        $oProduto = new Produto();

        self::setViewParam('aProduto',$oProduto->listar($this->app->getParams()[0]));

        $this->render('produto/editar');

    }

    public function excluir($param)
    {
        $id = $param[0];

        $oProduto = new Produto();

        $oProduto->excluir($id);

        $this->redirect('produto/index');

    }

}