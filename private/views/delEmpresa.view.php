<?php
require_once('../model/Database.php');


$conn = new Database;
$id = $_GET['id_empresa'];
$result = $conn->pesquisaEmpresa($id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar Empresa</title>
    <link rel="shortcut icon" href="ecology.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/delUserstyle.css">
    <link rel="stylesheet" href="../css/box.css">
    <script src="../js/abrirConf.js"></script>
    <script src="../bootstrap/js/jquery-3.7.1.min.js"></script>
    <script src="../bootstrap/js/jquery.mask.min.js"></script>
    <script src="../bootstrap/js/mask.js"></script>
</head>
<body>
    <div class="img"></div>
    <div class="container">
        <header>Deletar Empresa</header>
        <?php include_once('../controllers/mensagem.php'); 
       
        ?>

        <form id="deleteForm" action="../controllers/deleteEmpresa.php" method="post">
            <div class="form-first">
                <div class="details personal">
                    <span class="title">Detalhes da Empresa</span>

                    <div class="fields">
                        <div class="input-field">
                            <label for="nome">Nome da Empresa</label>
                            <input type="text" placeholder="Nome" id="nome" value="<?=$result['nome']?>">
                        </div>

                        <div class="input-field">
                            <label for="nome_fantasia">Nome Fantasia</label>
                            <input type="text" placeholder="Nome Fantasia" id="nome_fantasia" value="<?=$result['nome_fantasia']?>">
                        </div>

                        <div class="input-field">
                            <label for="cnpj">CNPJ</label>
                            <input type="text" placeholder="CNPJ" id="cnpj" value="<?=$result['cnpj']?>">
                        </div>

                        <div class="input-field">
                            <label for="endereco">Endereço</label>
                            <input type="text" placeholder="Endereço" id="endereco" value="<?=$result['endereco']?>">
                        </div>

                        <div class="input-field">
                            <label for="telefone">Telefone</label>
                            <input type="tel" placeholder="Telefone" id="telefone" value="<?=$result['telefone']?>">
                        </div>

                        <div class="input-field">
                            <label for="responsavel">Responsável</label>
                            <input type="text" placeholder="Responsável" id="responsavel" value="<?=$result['responsavel']?>">
                        </div>
                    </div>
                    <input type="hidden" name="id_empresa" value="<?=$result['id_empresa']?>">
                        <div class="button">
                            <a href="adminEmpr.view.php" class="btn-back" >Voltar</a>
                            <button class="btn-send" type="button" onclick="abrirConf()" name="edit_empresa">
                                <span class="btnText">DELETAR EMPRESA</span>
                            </button>
                        </div>

                        <div id="conf">
                            <div class="conf-content">
                                <strong class="cuidado">
                                    <p>CUIDADO !!!</p>
                                </strong>
                                <p>Ao deletar a empresa todos os colaboradores serão deletados juntos.</p>
                                <p>Tem certeza que deseja deletar esta empresa ?</p>
                                <button type="button" onclick="fecharConf()" id="back">Cancelar</button>
                                <button type="button" onclick="confirmarDelete()" id="send">Deletar</button>
                            </div>
                        </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>