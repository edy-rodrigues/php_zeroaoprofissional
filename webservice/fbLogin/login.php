<?php
require_once "fb.php";

$helper = $fb->getRedirectLoginHelper();

$permissions = array('email', 'user_photos');

$loginurl = $helper->getLoginUrl('https://localhost/php_zeroaoprofissional/webservice/fbLogin/callback.php', $permissions);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login de Acesso</title>
</head>
<body>
    <a href="<?php echo htmlspecialchars($loginurl); ?>">Fazer login com Facebook</a>
</body>
</html>