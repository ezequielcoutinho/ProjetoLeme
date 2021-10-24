<?php

namespace app\models;

use PDO;

abstract class Connection
{
    private $dbname = 'mysql:host=localhost; dbname=db_leme';
    private $user = 'root';
    private $pass = 'admin';

    protected function connect()
    {
        session_start();
    //  $empresa =  $_SESSION['empresa'] = 'Fibrocimento';
        try {
            $conn = new \PDO($this->dbname, $this->user, $this->pass);
            $conn->exec('set names utf8');
            return $conn;
        } catch (\PDOException $erro) {
            echo $erro->getMessage();
        }
      
    }
}
