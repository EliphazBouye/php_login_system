<?php
require 'ManagerData.php';

session_start();

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    $user = new ManagerData();
    $getUser = $user->getUser($email);
    $data = $user->data;
    $row = $user->row;

    if($row === 1){
        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
            $password = hash('sha256', $password);
            if($data['password'] === $password)
            {
                $_SESSION['user'] = $data['data'];
                header("Location: landing.php");
            }else{header('Location: login.php?login_err=password');}
        }else{header('Location: login.php?email_err=email');}
    }else{header('Location: login.php?login_err=already');}

    }else {
        header("Location: /");
    }

$testDb = (new ConnectDatabase())->getPdo();
