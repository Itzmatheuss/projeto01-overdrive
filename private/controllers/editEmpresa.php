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
$empresa = new Empresa($nome,$nome_fantasia,$cnpj,$endereco,$telefone,$responsavel);

try {
    
    if($conn->alterEmpresa($empresa,$id)){
        header("Location: ../views/adminEmpr.view.php");
        $_SESSION['mensagem']="Empresa alterada com sucesso !";
    }else{
        header("Location: ../views/adminEmpr.view.php");
        $_SESSION['mensagem']="Falha ao alterar Empresa ! Tente novamente.";
    }

} 

catch(PDOException $e){
    echo "Erro: " .$e->getMessage();
    exit();
}

