<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login de Acesso</title>
</head>
<body>
<form method="post">
    <h2>Login de Acesso</h2>
    E-mail: <br>
    <input type="text" name="email"><br><br>
    Senha: <br>
    <input type="password" name="pass"><br><br>
    <input type="submit" value="Entrar">
    <a href="<?php echo BASE_URL; ?>login/sign_in">Cadastre-se</a>
</form>
</body>
</html>