<?php
require_once('autenticacao_cpf.php');
require_once('../model/Database.php');


$id = $_POST['id_empresa'];

$conn = new Database;

try{
    $delete = $conn->deletarEmpresa($id);
}
catch(PDOException $e){
    echo "Erro: " .$e->getMessage();
    exit();
}