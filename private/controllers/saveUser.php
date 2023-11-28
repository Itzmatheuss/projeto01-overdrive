<?php
require_once('autenticacao.php');
require_once('../model/Database.php');
require_once('../model/User.php');

$nome = $_POST["nome"];
$cpf=$_POST["cpf"];
$senha=password_hash($_POST["senha"],PASSWORD_DEFAULT);
$cnh=$_POST["cnh"];
$telefone=$_POST["telefone"];
$endereco=$_POST["endereco"];
$carro=$_POST["carro"];
$admin=$_POST["tipo"];
$fkempresa = $_POST['fkempresa'];

$conn= new Database;
$empresa_dados = $conn->pesquisaFkEmpresa($fkempresa);
$empresa = $empresa_dados['nome'];

$usuario = new Usuario($nome,$cpf,$senha,$cnh,$telefone,$endereco,$carro,$empresa,$admin,$fkempresa);



try{
    if($conn->cadastraUsuario($usuario)){
        header("Location: ../views/adminUser.view.php");
        exit();
    }else{
        header("Location: error404.php");
        exit();
    }
}

catch(PDOException $e){
    echo "Erro: " .$e->getMessage();
    exit();
}