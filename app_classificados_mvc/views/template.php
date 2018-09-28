<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>App Classificados</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/main.css">
</head>
<body>
    <nav class="navbar navbar-inverse bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="<?php echo BASE_URL; ?>" class="navbar-brand">APP Classificados</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <?php if(isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])): ?>
                <li><a href="<?php echo BASE_URL; ?>anuncios">Meus Anúncios</a></li>
                <li><a href="<?php echo BASE_URL; ?>login/sair">Sair</a></li>
                <?php else: ?>
                <li><a href="<?php echo BASE_URL; ?>cadastrar">Cadastre-se</a></li>
                <li><a href="<?php echo BASE_URL; ?>login">Login</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <?php $this->loadViewInTemplate($viewName, $viewData); ?>

    <script src="<?php echo BASE_URL; ?>assets/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/bootstrap.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/main.js"></script>
</body>
</html>