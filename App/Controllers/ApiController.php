<?php

namespace App\Controllers;

use App\Models\Produto;

class ApiController extends Controller
{
    private $app;

    public function __construct($app)
    {
        $this->app = $app;
    }


    public function produto()
    {

        $oProduto = new Produto();

        $oListaProduto = $oProduto->listar();

        $this->json($oListaProduto);

    }


}