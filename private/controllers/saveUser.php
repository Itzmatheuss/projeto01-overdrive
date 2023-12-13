<?php
require_once('autenticacao_cpf.php');
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

if(empty($nome) || empty($cpf) || empty($senha) || empty($cnh) || empty($telefone) || empty($endereco) || empty($carro) || empty($fkempresa)){
    $_SESSION['mensagem_erro'] = "Falha no cadastro do usuário !";
    header("Location: ../views/adminUser.view.php");
    exit();
}

$usuario = new Usuario($nome,$cpf,$senha,$cnh,$telefone,$endereco,$carro,$admin,$fkempresa);


try{
    if($conn->cadastraUsuario($usuario)){
        header("Location: ../views/adminUser.view.php");
        exit();
    }else{
        $_SESSION['mensagem_erro'] = "Falha no cadastro do usuário !";
        header("Location: error404.php");
        exit();
    }
}

catch(PDOException $e){
    $_SESSION['mensagem_erro'] = "Erro: " . $e->getMessage();
    header("Location: error404.php");
    exit();
}