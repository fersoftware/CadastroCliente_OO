<?php

namespace Fersoftware\Database;


class Connection
{
    private static $config = array();
    private $conn;

    public function __construct()
    {
        $config = self::$config = parse_ini_file(__DIR__."/config.ini", true);
        $this->dsn = "{$config['driver']}:host={$config['host']};dbname={$config['dbName']}";
        $this->username = $config['user'];
        $this->password = $config['pass'];
    }

    public static function getConfig($x)
    {
        return self::$config[$x];
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