<?php

require 'ConnectDatabase.php';

class ManagerData
{
    private $pdo;
    public $data;
    public $row;

    public function __construct()
    {
        $this->pdo = (new ConnectDatabase())->getPdo();
    }

    public function getUser(string $email)
    {
        $query = "SELECT username, email, password FROM users WHERE email=:email";
        $statement = $this->pdo->prepare($query);
        $statement->execute(['email' => $email]);
        $this->data = $statement->fetch();
        $this->row = $statement->rowCount();
    }

    public function newUser(string $username, $email, $password, $ip )
    {
        $query ="INSERT INTO users(username, email, password, ip) VALUES(:username, :email, :password, :ip)";
        $statement = $this->pdo->prepare($query);
        $statement->execute(['username'=> $username, 'email' => $email, 'password' => $password, 'ip' => $ip]);
        header('Location: landing.php');
    }
}
