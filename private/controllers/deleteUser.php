<?php
require_once('autenticacao.php');
require_once('../model/Database.php');


$id = $_POST['id_user'];

$conn = new Database;

try{
    $delete = $conn->deletarUsuario($id);

}
catch(PDOException $e){
    echo "Erro: " .$e->getMessage();
    exit();
}