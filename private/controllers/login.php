<?php

session_start();
require_once("../model/Database.php");

if(empty($_POST['cpf']) || empty($_POST['senha'])){
    session_destroy();
    header('Location: /estagiopoo/projeto01-overdrive/public/index.php');
    echo "Fail";
    exit;
}else{
    $conn = new Database();
    $login = $conn->login($_POST['cpf'],$_POST['senha']);

    echo "Boa";
}

