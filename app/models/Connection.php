<?php

namespace app\models;

use PDO;

abstract class Connection
{
    private $dbname = 'mysql:host=localhost; dbname=db_leme';
    private $user = 'root';
    private $pass = '1q2w3e4r5t6y7u@@M';

    protected function connect()
    {
        session_start();
    
        try {
            $conn = new \PDO($this->dbname, $this->user, $this->pass);
            $conn->exec('set names utf8');
            return $conn;
        } catch (\PDOException $erro) {
            echo $erro->getMessage();
        }
      
    }
}
