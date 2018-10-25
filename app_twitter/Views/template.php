<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Meu site</title>
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/materialize.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/default.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/main.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <?php require_once 'pages/nav.php'; ?>
    <?php $this->loadViewInTemplate($viewName, $viewData); ?>
    <?php require_once 'pages/footer.php'; ?>

    <script src="<?php echo BASE_URL; ?>assets/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/materialize.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/main.js"></script>
    <?php echo isset($script) && !empty($script) ? $script : ''; ?>