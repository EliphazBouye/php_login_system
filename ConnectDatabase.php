<?php

class ConnectDatabase
{
    private $pdo;
    private $config = [
        'host' => 'localhost',
        'dbname' => 'test',
        'user' => 'root',
        'psswd' => 'root',
    ];

    public function __construct()
    {
        $dsn = "mysql:host={$this->config['host']};dbname={$this->config['dbname']}";
        try {
            $this->pdo = new PDO($dsn, $this->config['user'], $this->config['psswd']);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }catch (PDOException $e){
            die("Error : " . $e->getMessage());
        }
    }

    public function getPdo()
    {
        return $this->pdo;
    }
}