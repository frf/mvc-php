<?php
/**
 * Created by PhpStorm.
 * User: fabiorocha
 * Date: 17/06/17
 * Time: 18:30
 */

class HomeController extends Controller
{
    private $app;

    public function __construct($app)
    {
        $this->app = $app;
    }

    public function index()
    {

        self::setViewParam('nameController',$this->app->getNameController());

        $this->render('home/index');

    }

}