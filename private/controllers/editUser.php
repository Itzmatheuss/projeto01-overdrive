<?php
require_once('autenticacao.php');
require_once('../model/Database.php');
require_once('../model/User.php');

$id = $_POST['id_user'];

$nome = $_POST["nome"];
$cpf=$_POST["cpf"];
$senha=($_POST["senha"] != null ) ? password_hash($_POST["senha"],PASSWORD_DEFAULT) : null;
$cnh=$_POST["cnh"];
$telefone=$_POST["telefone"];
$endereco=$_POST["endereco"];
$carro=$_POST["carro"];
$empresa=$_POST["empresa"];
$admin=$_POST["tipo"];

$conn = new Database;

if($senha!= null){
    $usuario = new Usuario($nome,$cpf,$senha,$cnh,$telefone,$endereco,$carro,$empresa,$admin);
    }else{
        
        $result = $conn->pesquisaUsuario($id);
        $senha = $result['senha'];
        $usuario = new Usuario($nome,$cpf,$senha,$cnh,$telefone,$endereco,$carro,$empresa,$admin);
    }

if($conn->alterUser($usuario,$id)){
    header("Location: .//adminUser.view.php");
}else{
    header("Location: error404.php");
}
