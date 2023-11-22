<?php
session_start();
use Database;

if(empty($_POST['cpf']) || empty($_POST['senha'])){
    header('Location: /public/index.php');
    exit;
}

