<?php

namespace App\Controllers;

class DocController extends Controller
{
    private $app;

    public function __construct($app)
    {
        $this->app = $app;
    }

    public function index()
    {

        self::setViewParam('nameController',$this->app->getNameController());

        $this->render('doc/index');

    }

    public function api()
    {
        self::setViewParam('nameController',$this->app->getNameController());

        $this->render('api/index');
    }

}