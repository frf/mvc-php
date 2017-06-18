<?php

class DB
{
    private $error;

    public function __construct()
    {
        $this->connect();
    }
    protected function connect() {

        $pdoConfig  = DB_DRIVER . ":". "host=" . DB_HOST_NAME . ";";
        $pdoConfig .= "dbname=".DB_NAME.";";

        try {
            $this->pdo = new PDO($pdoConfig, DB_USERNAME, DB_PASSWORD);
        } catch (PDOException $e) {
            die('ERRO DE CONEXAO: ' . $e->getMessage());
        }
    }


    public function query( $stmt, $data_array = null ) {

        $query  = $this->pdo->prepare( $stmt );
        $exec   = $query->execute( $data_array );

        if ( $exec ) {
            return $query;
        } else {
            $error       = $query->errorInfo();
            $this->error = $error[2];

            throw new \Exception($this->error);
        }
    }


    public function insert( $table , $cols ,  $values) {

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

    public function update( $table , $values) {

        $stmt = "UPDATE $table SET $values ";

        $insert = $this->query( $stmt );

        return;
    }

    public function delete($table, $where)
    {
        return $this->query("DELETE FROM $table WHERE $where" );
    }
}