<?php
require_once('autenticacao.php');
require_once('../model/Database.php');
require_once('../model/Empresa.php');

$id = $_POST['id_empresa'];

$nome = $_POST["nome"];
$nome_fantasia=$_POST["nome_fantasia"];
$cnpj=$_POST["cnpj"];
$endereco=$_POST["endereco"];
$telefone=$_POST["telefone"];
$responsavel=$_POST["responsavel"];

$conn = new Database;

if(empty($nome) || empty($nome_fantasia)|| empty($cnpj)|| empty($endereco|| empty($telefone)||  empty($responsavel) )){
    $_SESSION['mensagem_erro'] = "Falha no cadastro da empresa !";
    header("Location: ../views/adminEmpr.view.php");
    exit();
}

$empresa = new Empresa($nome,$nome_fantasia,$cnpj,$endereco,$telefone,$responsavel);

try {
    
    if($conn->alterEmpresa($empresa,$id)){
        header("Location: ../views/adminEmpr.view.php");
        $_SESSION['mensagem']="Empresa alterada com sucesso !";
    }else{
        header("Location: ../views/adminEmpr.view.php");
        $_SESSION['mensagem_erro']="Falha ao alterar Empresa ! Tente novamente.";
    }

} 

catch(PDOException $e){
    $_SESSION['mensagem_erro'] = "Erro: " . $e->getMessage();
    header("Location: error404.php");
    exit();
}