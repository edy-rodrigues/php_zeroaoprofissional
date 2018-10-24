<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Meu site</title>
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/default.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>
    <?php require_once 'pages/header.php'; ?>
    <?php require_once 'pages/menu.php'; ?>
    <main class="container">
        <?php $this->loadViewInTemplate($viewName, $viewData); ?>
    </main>
    <?php require_once 'pages/footer.php'; ?>
    <script src="<?php echo BASE_URL; ?>assets/js/main.js"></script>
</body>
</html>