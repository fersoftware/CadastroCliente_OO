<?php

namespace Fersoftware\Database;


class Connection
{
    private $conn;
    private $dsn;
    private $username;
    private $password;

    public function __construct()
    {
        $driver = 'mysql';
        $host = 'localhost';
        $dbname = 'cadclientedb';
        $user = 'root';
        $pass = '102030';

        $this->dsn = "{$driver}:host={$host};dbname={$dbname}";
        $this->username = $user;
        $this->password = $pass;
    }

    public function getConnection()
    {
        if(!$this->conn instanceof \PDO)
        {
            try
            {
                $this->conn = new \PDO($this->dsn,$this->username,$this->password);

            }
            catch (\PDOException $ex)
            {
                die("Erro de conexão: {$ex->getMessage()}");
            }
        }

        return $this->conn;
    }

}