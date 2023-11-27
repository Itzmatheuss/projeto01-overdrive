<?php
require_once('autenticacao.php');
require_once('../model/Database.php');


$id = $_POST['id_empresa'];

$conn = new Database;

$delete = $conn->deletarEmpresa($id);