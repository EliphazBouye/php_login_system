<?php
require 'ManagerData.php';

if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_retype'])){
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $password_retype = htmlspecialchars($_POST['password_retype']);

    $user = new ManagerData();
    $getUser = $user->getUser($email);
    $data = $user->data;
    $row = $user->row;


    if($row === 0)
    {
        if(strlen($username) <= 100){
            if(strlen($email) <= 100){
                if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                    if($password === $password_retype){
                        $password = hash('sha256', $password);
                        $ip = $_SERVER['REMOTE_ADDR'];
                        $newUser = (new ManagerData())->newUser($username, $email, $password, $ip);
                    }else(header('Location: signup.php?signup_err=password'));
                }else(header('Location: signup.php?signup_err=email'));
            }else(header('Location: signup.php?signup_err=email_length'));
        }else(header('Location: signup.php?signup_err=username_length'));
    }else{header('Location: signup.php?signup_err=already');}
}



?>