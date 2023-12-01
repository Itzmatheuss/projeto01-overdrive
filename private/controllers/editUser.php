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
$fkempresa=$_POST["fkempresa"];
$admin=$_POST["tipo"];

$conn= new Database;
$empresa_dados = $conn->pesquisaFkEmpresa($fkempresa);
$empresa = $empresa_dados['nome_fantasia'];

if($empty($nome) || empty($cpf) || empty($cnh) || empty($telefone) || empty($endereco) || empty($carro) || empty($admin) || empty($fkempresa)){
    $_SESSION['mensagem_erro'] = "Falha no cadastro do usuário !";
    header("Location: ../views/adminUser.view.php");
    exit();
}

try{
    
    if($senha!= null){
        $usuario = new Usuario($nome,$cpf,$senha,$cnh,$telefone,$endereco,$carro,$empresa,$admin,$fkempresa);
        }else{
            
            $result = $conn->pesquisaUsuario($id);
            $senha = $result['senha'];
            $usuario = new Usuario($nome,$cpf,$senha,$cnh,$telefone,$endereco,$carro,$empresa,$admin,$fkempresa);
        }
    
    if($conn->alterUser($usuario,$id)){
        header("Location: ../views/adminUser.view.php");
        $_SESSION['mensagem']="Usuário alterado com sucesso !";
    }else{
        header("Location: ../views/adminUser.view.php");
        $_SESSION['mensagem_erro']="Falha no cadastro ! Tente novamente.";
    }

}

catch(PDOException $e){
    $_SESSION['mensagem_erro'] = "Erro: " . $e->getMessage();
    header("Location: error404.php");
    exit();
}