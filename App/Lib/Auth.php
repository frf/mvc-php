<?php
/**
 * Created by PhpStorm.
 * User: joel
 * Date: 22/06/2017
 * Time: 16:32
 */

namespace App\Lib;


use App\Models\Usuario;

class Auth
{

    public static function checkController($oController)
    {
        if(!self::usuarioLogado()) {
            return property_exists($oController, 'isAuth');
        }

        return false;
    }

    public static function usuario()
    {
        return $_SESSION['oUser'];
    }

    public static function usuarioLogado()
    {
        return isset($_SESSION['oUser']);
    }

    public static function gravaSessao($oUsuario)
    {

        $oU = new \stdClass();
        $oU->id         = $oUsuario['id'];
        $oU->usuario    = $oUsuario['usuario'];
        $oU->perfil     = $oUsuario['perfil'];

        $_SESSION['oUser'] = $oU;

    }

    public static function deslogar()
    {
        unset($_SESSION['oUser']);
    }

}