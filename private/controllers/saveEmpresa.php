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


$empresa = new Empresa($nome,$nome_fantasia,$cnpj,$endereco,$telefone,$responsavel);
print_r($empresa);
$conn = new Database;

try{
    if($conn->cadastraEmpresa($empresa)){
        header("Location: ../views/adminEmpr.view.php");
    }else{
        
        header("Location: error404.php");
    }
}

catch(PDOException $e){
    echo "Erro: " .$e->getMessage();
    exit();
}