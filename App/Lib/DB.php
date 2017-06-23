<?php
/*
 * @Author Fabio Rocha
 */
namespace App\Lib;

use PDO;
use PDOException;
use Exception;

class DB
{
    private $error;
    private $host;
    private $name;
    private $username;
    private $password;
    private $driver;
    private $pdo;

    public function __construct()
    {
        $oConfigDb = $_SESSION['oConfig']->getConfig()->db;

        $this->host         = (!empty($oConfigDb->host))        ? $oConfigDb->host      : "";
        $this->name         = (!empty($oConfigDb->name))        ? $oConfigDb->name      : "";
        $this->username     = (!empty($oConfigDb->username))    ? $oConfigDb->username  : "";
        $this->password    = (!empty($oConfigDb->password))   ? $oConfigDb->password : "";
        $this->driver       = (!empty($oConfigDb->driver))      ? $oConfigDb->driver    : "";

        $this->pdo = $this->connect();
    }

    protected function connect() {

        $pdoConfig  = $this->driver . ":". "host=" . $this->host . ";";
        $pdoConfig .= "dbname=".$this->name.";";

        try {
            return  new PDO($pdoConfig, $this->username, $this->password);
        } catch (PDOException $e) {
            throw new Exception("Erro de conexão com o banco de dados",500);
        }
    }

    public function query($sql, $data_array = null ) {

        $query  = $this->pdo->prepare( $sql );
        $exec   = $query->execute( $data_array );

        if ( $exec ) {
            return $query;
        } else {
            $error       = $query->errorInfo();
            $this->error = $error[2];

            throw new \Exception($this->error);
        }
    }

    public function insert($table, $cols ,  $values) {

        $stmt = "INSERT INTO $table ( $cols ) VALUES ( $values ) ";

        $insert = $this->query( $stmt );

        if ( $insert ) {

            if ( method_exists( $this->pdo, 'lastInsertId' )
                && $this->pdo->lastInsertId()
            ) {
                $this->last_id = $this->pdo->lastInsertId();
            }

            // Retorna a consulta
            return $insert;
        }

        return;
    }

    public function update($table, $values) {

        $stmt = "UPDATE $table SET $values ";

        $insert = $this->query( $stmt );

        return;
    }

    public function delete($table, $where)
    {
        return $this->query("DELETE FROM $table WHERE $where" );
    }

}