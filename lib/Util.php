<?php

/**
 * Created by PhpStorm.
 * User: fabiorocha
 * Date: 17/06/17
 * Time: 23:33
 */
class Util
{

    public static function convertDate($dt,$format){



        if($format == "Y-m-d"){
            $aDate = explode("/",$dt);

            $date = new DateTime($aDate[2]."-".$aDate[1]."-".$aDate[0]);

            return $date->format('Y-m-d');

        }else if($format == "d/m/Y"){
            $date = new DateTime($dt);

            return $date->format('d/m/Y');
        }else{

            $date = new DateTime($dt);

            return $date->format('d/m/Y');
        }

    }

    public static function formatMoney($valor,$lang, $simbolo = false)
    {
        if($lang == "pt") {
            if($simbolo) {
                $simbolo = "R$";

                return $simbolo . " " . number_format($valor, 2, ',', '.');
            }else{
                return number_format($valor, 2, ',', '.');
            }
        }else if($lang == "en") {
            if($simbolo) {
                $simbolo = "US$";

                return $simbolo . " " . number_format($valor, 2, '.', ',');
            }else{
                return number_format($valor, 2, '.', ',');
            }
        }
    }
}