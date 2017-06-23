<?php

namespace App\Controllers;

class AdminController extends Controller
{
    private $app;
    public $isAuth;

    public function __construct($app)
    {
        $this->app = $app;
    }

    public function index()
    {

        self::setViewParam('nameController',$this->app->getNameController());

        $this->render('admin/index');

    }

}