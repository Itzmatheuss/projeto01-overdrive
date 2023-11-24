<?php
require_once('autenticacao.php');
require_once('../model/Database.php');
require_once('../model/User.php');

$nome = $_POST["nome"];
$cpf=$_POST["cpf"];
$senha=password_hash($_POST["senha"],PASSWORD_DEFAULT);
$cnh=$_POST["cnh"];
$endereco=$_POST["endereco"];
$telefone=$_POST["telefone"];
$carro=$_POST["carro"];
$empresa=$_POST["empresa"];
$admin=$_POST["tipo"];

$usuario = new Usuario($nome,$cpf,$senha,$cnh,$telefone,$endereco,$carro,$empresa,$admin);
print_r($usuario);
$conn = new Database;

if($conn->cadastraUsuario($usuario)){
    header("Location: ../views/adminUser.view.php");
}else{
    
    header("Location: error404.php");
}
