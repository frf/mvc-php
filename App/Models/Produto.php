<?php

namespace App\Models;

use App\Lib\DB;
use App\Lib\Util;

class Produto extends DB
{

    public function listar($id=null)
    {

        try {

            if($id) {
                // Faz a consulta
                $query = $this->query(
                    "SELECT * FROM produto WHERE co_produto = $id"
                );

                return $query->fetch();
            }else{
                // Faz a consulta
                $query = $this->query(
                    'SELECT * FROM produto ORDER BY dt_cadastro'
                );

                return $query->fetchAll();

            }
        }catch (Exception $e){
            echo $e->getMessage();
        }

    }

    public function salvar($data)
    {
        try {

            $data['dt_validade'] = Util::convertDate($data['dt_validade'],"Y-m-d");
            $data['dt_cadastro'] = date("Y-m-d");
            $data['vl_produto']  = Util::formatMoney($data['vl_produto'],"en");

            $this->insert('produto',
                        "no_produto,vl_produto,ds_produto,dt_cadastro,dt_validade",
                        "'".$data['no_produto']."',".$data['vl_produto'].",'".$data['ds_produto']."','".$data['dt_cadastro']."','".$data['dt_validade']."'"
            );

        }catch (\Exception $e){
            echo $e->getMessage();

        }

    }

    public function atualizar($data)
    {
        try {
            $id = $data['co_produto'];

            $data['dt_validade'] = Util::convertDate($data['dt_validade'],"Y-m-d");
            $data['vl_produto']  = Util::formatMoney($data['vl_produto'],"en");

            $this->update('produto',
                "no_produto = '".$data['no_produto']."',vl_produto = ".$data['vl_produto'].",
                ds_produto= '".$data['ds_produto']."',
                dt_validade = '".$data['dt_validade']."' WHERE co_produto = $id");

        }catch (Exception $e){
            echo $e->getMessage();

        }

    }

    public function excluir($id)
    {
        try {

            $this->delete('produto',"co_produto = $id");

        }catch (Exception $e){
            exit($e->getMessage());

        }

    }

}