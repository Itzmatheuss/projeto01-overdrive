<?php
require_once('autenticacao.php');
require_once('../model/Database.php');


$id = $_POST['id_user'];

$conn = new Database;

$delete = $conn->deletarUsuario($id);