<?php require_once "config.php"; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>APP Classificados</title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- CSS -->
    <!-- JS -->
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/main.js"></script>
    <!-- JS -->
</head>
<body>

<nav class="navbar navbar-inverse bg-dark">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="./" class="navbar-brand">APP Classificados</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <?php if(isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])): ?>
            <li><a href="meus-anuncios.php">Meus Anúncios</a></li>
            <li><a href="sair.php">Sair</a></li>
            <?php else: ?>
            <li><a href="cadastre-se.php">Cadastre-se</a></li>
            <li><a href="login.php">Login</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>