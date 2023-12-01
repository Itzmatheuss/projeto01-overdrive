<?php
require_once('autenticacao.php');
require_once('../model/Database.php');
require_once('../model/Empresa.php');

$nome = $_POST["nome"];
$nome_fantasia=$_POST["nome_fantasia"];
$cnpj=$_POST["cnpj"];
$endereco=$_POST["endereco"];
$telefone=$_POST["telefone"];
$responsavel=$_POST["responsavel"];

if( empty($nome) || empty($nome_fantasia)|| empty($cnpj)|| empty($endereco|| empty($telefone)||  empty($responsavel) )){
    $_SESSION['mensagem_erro'] = "Falha no cadastro da empresa !";
    header("Location: ../views/adminUser.view.php");
    exit();
}

$empresa = new Empresa($nome,$nome_fantasia,$cnpj,$endereco,$telefone,$responsavel);


$conn = new Database;

try{
    if($conn->cadastraEmpresa($empresa)){
        header("Location: ../views/adminEmpr.view.php");
    }else{
        
        header("Location: error404.php");
    }
}

catch(PDOException $e){
    $_SESSION['mensagem_erro'] = "Erro: " . $e->getMessage();
    header("Location: error404.php");
    exit();
}