<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="images/ecology.png" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/jquery.mask.min.js"></script>
  
</head>
<body>
    <div class="img"></div>
    <main class="container">
        <div class="logo">
            <img src="images/ten13.png" alt="">
            <h3>Seja Bem Vindo !</h3>
            <p>Insira seu login e senha para acessar o site.</p>
        </div>
        <form action="#">
            <div class="inputs">
            <span class="material-symbols-outlined">
            group
            </span>
           
            <input type="text" autocomplete="off" maxlength="14" placeholder="Insira seu CPF" id="cpf" required>
            </div>
            <div class="inputs">
            <span class="material-symbols-outlined">
            lock
            </span>
            
            <input type="password" placeholder="Insira sua senha" required>
            </div>
            <div class="inputs button">
            <input type="submit" value="Entrar">
            </div>

        </form>
    </main>
        <script>
            $(document).ready(function(){
                $("#cpf").mask("000.000.000-00");
            });
        </script>
</body>
</html>