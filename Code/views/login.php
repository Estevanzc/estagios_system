<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fazer Login - Seção de estágios</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <form action="fazerLogin.php" method="post" class="login-form">
                <img class="logo" src="uploads/logo.png" alt="">
                <h1>Bem-vindo de Volta!</h1>
                <h4>Digite suas informações para entrar</h4>
                <input type="text" name="login" id="email" placeholder="Digite seu E-mail">
                <input type="password" name="senha" id="passwd" placeholder="Digite sua Senha">
            
                <button type="submit">Entrar</button>
        </form>

        <div class="bg-decoration">
            <div class="decorative-circle"></div>
            <div class="decorative-circle-small"></div>
        </div>
    </div>

    <script src="./script.js"></script>
</body>
</html>