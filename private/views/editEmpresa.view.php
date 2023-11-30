<?php
require_once('../model/Database.php');

$conn = new Database;
$id = $_GET['id_empresa'];

$result = $conn->pesquisaEmpresa($id);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Empresa</title>
    <link rel="shortcut icon" href="ecology.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/newUserstyle.css">
    <script src="../bootstrap/js/jquery-3.7.1.min.js"></script>
    <script src="../bootstrap/js/jquery.mask.min.js"></script>
    <script src="../bootstrap/js/mask.js"></script>
</head>
<body>
    <div class="img"></div>
    <div class="container">
        <header>Alterar dados da Empresa</header>

        <form action="../controllers/editEmpresa.php" method="post">
            <div class="form-first">
                <div class="details personal">
                    <span class="title">Detalhes da Empresa</span>

                    <div class="fields">
                        <div class="input-field">
                            <label for="nome">Nome da Empresa</label>
                            <input type="text" placeholder="Nome" id="nome" value="<?=$result['nome']?>" name="nome" maxlength="35">
                        </div>

                        <div class="input-field">
                            <label for="nome_fantasia">Nome Fantasia</label>
                            <input type="text" placeholder="Nome Fantasia" id="nome_fantasia" value="<?=$result['nome_fantasia']?>" name="nome_fantasia" maxlength="20">
                        </div>

                        <div class="input-field">
                            <label for="cnpj">CNPJ</label>
                            <input type="text" placeholder="CNPJ" id="cnpj" value="<?=$result['cnpj']?>" name="cnpj">
                        </div>

                        <div class="input-field">
                            <label for="endereco">Endereço</label>
                            <input type="text" placeholder="Endereço" id="endereco" value="<?=$result['endereco']?>" name="endereco" maxlength="30">
                        </div>

                        <div class="input-field">
                            <label for="telefone">Telefone</label>
                            <input type="tel" placeholder="Telefone" id="telefone" value="<?=$result['telefone']?>" name="telefone">
                        </div>

                        <div class="input-field">
                            <label for="responsavel">Responsável</label>
                            <input type="text" placeholder="Responsável" id="responsavel" value="<?=$result['responsavel']?>" name="responsavel" maxlength="20">
                        </div>
                    </div>
                    
                    <input type="hidden" name="id_empresa" value="<?=$result['id_empresa']?>">
                    <div class="button">
                            <a href="adminEmpr.view.php" class="btn-back" >Voltar</a>
                            <button class="btn-send" type="submit" name="edit_empresa">
                                <span class="btnText">Alterar</span>
                            </button>
                        </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>