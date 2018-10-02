<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projeto com Composer</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/main.css">
</head>
<body>

    <?php $this->loadViewInTemplate($viewName, $viewData); ?>

    <script src="<?php echo BASE_URL; ?>assets/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/bootstrap.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/main.js"></script>
</body>
</html>