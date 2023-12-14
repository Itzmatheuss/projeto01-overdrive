<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/box.css">
    <link rel="shortcut icon" href="./images/ecology.png" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/jquery.mask.min.js"></script>
    <script src="js/alert.js"></script>

</head>

<body>
    <div class="img"></div>
  
    <main class="container">
        <div class="logo">
            <img src="images/ten13.png" alt="">
            <h3>Seja Bem Vindo !</h3>
            <p>Insira seu login e senha para acessar o site.</p>
        </div>
        <form action="/estagiopoo/projeto01-overdrive/private/controllers/login.php" method="post">
            <div class="inputs">
                <span class="material-symbols-outlined">
                    group
                </span>

                <input type="text" autocomplete="off" maxlength="14" placeholder="Insira seu CPF" id="cpf" name="cpf" required>
            </div>
            <div class="inputs">
                <span class="material-symbols-outlined">
                    lock
                </span>

                <input type="password" placeholder="Insira sua senha" name="senha" required>
            </div>
            <div class="inputs button">
                <input type="submit" value="Entrar">
            </div>
            <div class="newuser">
                <p>Ainda não tem conta ?<a href="newUserComum.php"> Criar conta</a> </p>
            </div>
        </form>
        <div id="conf">
            <div class="conf-content">
                <strong class="alert">
                    <p>Usuário ou senha incorreta !!</p>
                </strong>
                <button type="button" onclick="fecharConf()" id="back">Tentar Novamente</button>
            </div>
        </div>
        <div id="conf_user">
            <div class="conf-content">
                <strong class="alert">
                    <p>Usuário ou senha incorreta !!</p>
                </strong>
                <button type="button" onclick="fecharConf_user()" id="back">Tentar Novamente</button>
            </div>
        </div>

        <div id="confnewUser">
            <div class="conf-content">
                <strong class="alert-success">
                    <p>Cadastro efetuado com sucesso !!</p>
                </strong>
                <button type="button" onclick="fecharSucesso()" id="back">Fazer login</button>
            </div>
        </div>
        <div id="conf_newUser">
            <div class="conf-content">
                <strong class="alert">
                    <p>Falha no cadastro !!</p>
                </strong>
                <button type="button" onclick="fecharErro()" id="back">Tentar Novamente</button>
            </div>
        </div>
    </div>

    </main>
    <script>
        $(document).ready(function() {
            $("#cpf").mask("000.000.000-00");
        });
        document.addEventListener("DOMContentLoaded", function() {
            // Verifica se há parâmetros na URL
            const urlParams = new URLSearchParams(window.location.search);
            
            // Verifica se o parâmetro 'senhaIncorreta' está presente e é 'true'
            if (urlParams.has('senhaIncorreta') && urlParams.get('senhaIncorreta') === 'true') {
                abrirConf();
            }
            if (urlParams.has('usuarioIncorreto') && urlParams.get('usuarioIncorreto') === 'true') {
                abrirConf_user();
            }

            if (urlParams.has('sucesso') && urlParams.get('sucesso') === 'true') {
                abrirSucesso();
            }
            if (urlParams.has('error') && urlParams.get('error') === 'true') {
                abrirErro();
            }
        });
    </script>
</body>

</html>