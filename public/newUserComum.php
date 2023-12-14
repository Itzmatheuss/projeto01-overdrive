<?php

require_once('../private/model/Database.php');
$conn = new Database;
$result = $conn->viewEmpresas();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Usuário</title>
    <link rel="shortcut icon" href="ecology.png" type="image/x-icon">
    <link rel="stylesheet" href="css/newUserstyle.css">
    <link rel="stylesheet" href="./css/box.css">
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/jquery.mask.min.js"></script>
    <script src="js/alert.js"></script>
</head>
<body>
    <div class="img"></div>
    <div class="container">
        <header>Cadastro de Usuário</header>

        <form action="../private/controllers/saveUserComum.php" method="POST">
            <div class="form-first">
                <div class="details personal">
                    <span class="title">Detalhes do Usuário</span>

                    <div class="fields">
                        <div class="input-field">
                            <label for="nome">Nome Completo</label>
                            <input type="text" placeholder="Nome" id="nome" name="nome" maxlength="35" required>
                        </div>

                        <div class="input-field">
                            <label for="cpf">CPF</label>
                            <input type="text" placeholder="CPF" id="cpf" minlength="14" name="cpf" required>
                        </div>

                        <div class="input-field">
                            <label for="senha">Senha</label>
                            <input type="password" placeholder="Escolha sua senha" name="senha" id="senha" maxlength="25" required>
                            <span>Mensagem erro</span>
                        </div>
                        <div class="input-field">
                            <label for="confsenha">Confirmar senha</label>
                            <input type="password" placeholder="Confirme sua senha" name="senha" id="confsenha" maxlength="25" required>
                            <span>Mensagem erro</span>
                        </div>

                        <div class="input-field">
                            <label for="cnh">CNH</label>
                            <input type="text" placeholder="CNH" id="cnh" minlength="9" name="cnh" required>
                        </div>

                        <div class="input-field">
                            <label for="telefone">Telefone</label>
                            <input type="tel" placeholder="Telefone" id="telefone" name="telefone" minlength="14" required>
                        </div>

                        <div class="input-field">
                            <label for="endereco">Endereço</label>
                            <input type="text" placeholder="Endereço" id="endereco" maxlength="25" name="endereco" required>
                        </div>

                        <div class="input-field">
                            <label for="carro">Carro</label>
                            <input type="text" placeholder="Carro" id="carro" maxlength="15" name="carro" required>
                        </div>

                        <div class="input-field">
                            <label for="fkempresa">Empresa</label>
                            <select name="fkempresa" id="fkempresa" required>
                                <?php 
                                    foreach($result as $row){
                                        echo "
                                        <option value='{$row['id_empresa']}'>{$row['nome_fantasia']}</option>
                                        ";
                                    }
                                ?>
                            </select>
                    
                        </div>

                        <div class="input-field-type">
                            <input type="hidden" name="tipo" value="0" id="user">
                            </div>
                        </div>
                        </div>
                    
                        <div class="button">
                                <a href="index.php" class="btn-back">Voltar</a>
                            <button class="btn-send" type="button" onclick="checkPassword()" name="salvar_user">
                                <span class="btnText">Enviar</span>
                            </button>
                        </div>
                </div>
            </div>
        </form>

    <script>
        $(document).ready(function(){
        $("#cpf").mask("000.000.000-00");
        $("#cnh").mask("000000000");
        $("#telefone").mask("(00)00000-0000");
    });

    </script>
</body>
</html>

