<?php

namespace App\Models;

use App\Lib\DB;
use App\Lib\Util;

class Produto
{
    public static function listar($id=null)
    {
        $db = new DB();

        try {

            if($id) {
                // Faz a consulta
                $query = $db->query(
                    "SELECT * FROM produto WHERE co_produto = $id"
                );

                return $query->fetch();
            }else{
                // Faz a consulta
                $query = $db->query(
                    'SELECT * FROM produto ORDER BY dt_cadastro'
                );

                return $query->fetchAll();

            }
        }catch (Exception $e){
            echo $e->getMessage();
        }

    }

    public static function salvar($data)
    {
        try {

            $db = new DB();

            $data['dt_validade'] = Util::convertDate($data['dt_validade'],"Y-m-d");
            $data['dt_cadastro'] = date("Y-m-d");
            $data['vl_produto']  = Util::formatMoney($data['vl_produto'],"en");

            $db->insert('produto',
                        "no_produto,vl_produto,ds_produto,dt_cadastro,dt_validade",
                        "'".$data['no_produto']."',".$data['vl_produto'].",'".$data['ds_produto']."','".$data['dt_cadastro']."','".$data['dt_validade']."'"
            );

        }catch (\Exception $e){
            echo $e->getMessage();

        }

    }

    public static function atualizar($data)
    {
        try {
            $db = new DB();

            $id = $data['co_produto'];

            $data['dt_validade'] = Util::convertDate($data['dt_validade'],"Y-m-d");
            $data['vl_produto']  = Util::formatMoney($data['vl_produto'],"en");

            $db->update('produto',
                "no_produto = '".$data['no_produto']."',vl_produto = ".$data['vl_produto'].",
                ds_produto= '".$data['ds_produto']."',
                dt_validade = '".$data['dt_validade']."' WHERE co_produto = $id");

        }catch (Exception $e){
            echo $e->getMessage();

        }

    }

    public static function excluir($id)
    {
        try {
            $db = new DB();

            $db->delete('produto',"co_produto = $id");

        }catch (Exception $e){
            exit($e->getMessage());

        }

    }

}