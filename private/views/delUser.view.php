<?php

require_once('../model/Database.php');

$conn = new Database;
$id = $_GET['id_user'];

$result = $conn->pesquisaUsuario($id);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar Usuário</title>
    <link rel="shortcut icon" href="ecology.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/delUserstyle.css">
    <script src="../bootstrap/js/jquery-3.7.1.min.js"></script>
    <script src="../bootstrap/js/jquery.mask.min.js"></script>
    <script src="../bootstrap/js/mask.js"></script>
</head>
<body>
    <div class="img"></div>
    <div class="container">
        <header>Deletar Usuário</header>
    

        <form action="../controllers/deleteUser.php" method="post">
            <div class="form-first">
                <div class="details personal">
                    <span class="title">Detalhes do Usuário</span>

                    <div class="fields">
                        <div class="input-field">
                            <label for="nome">Nome Completo</label>
                            <input type="text" placeholder="Nome" id="nome" value="<?=$result['nome']?>">
                        </div>

                        <div class="input-field">
                            <label for="cpf">CPF</label>
                            <input type="text" placeholder="CPF" id="cpf" value="<?=$result['cpf']?>">
                        </div>

                        <div class="input-field">
                            <label for="senha">Senha</label>
                            <input type="password" placeholder="Escolha sua senha" id="senha">
                        </div>

                        <div class="input-field">
                            <label for="cnh">CNH</label>
                            <input type="text" placeholder="CNH" id="cnh" value="<?=$result['cnh']?>">
                        </div>

                        <div class="input-field">
                            <label for="telefone">Telefone</label>
                            <input type="tel" placeholder="Telefone" id="telefone" value="<?=$result['telefone']?>">
                        </div>

                        <div class="input-field">
                            <label for="endereco">Endereço</label>
                            <input type="text" placeholder="Endereço" id="endereco" value="<?=$result['endereco']?>">
                        </div>

                        <div class="input-field">
                            <label for="carro">Carro</label>
                            <input type="text" placeholder="Carro" id="carro" value="<?=$result['carro']?>">
                        </div>

                        <div class="input-field">
                            <label for="empresa">Empresa</label>
                            <input type="text" placeholder="Empresa" id="empresa" value="<?=$result['empresa']?>">
                        </div>

                        <div class="input-field-type">
                         
                            <div class="label"><label for="tipo">Tipo de Usuário</label></div>
                            <label for="admin">Adminstrador</label>
                            <input type="radio" name="tipo" value="1" <?php echo($result['admin'] == '1') ? 'checked' : ''; ?> id="admin">
                            <label for="user">Comum</label>
                            <input type="radio" name="tipo" value="0" <?php echo($result['admin'] == '0') ? 'checked' : ''; ?> id="user">
                        </div>
                    </div>
                    <input type="hidden" name="id_user" value="<?=$result['id_user']?>">
                        <div class="button">
                                <a href="adminUser.view.php" class="btn-back">Voltar</a>
                            <button class="btn-send" type="submit" name="edit_user">
                                <span class="btnText">DELETAR USUÁRIO</span>
                            </button>
                        </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>