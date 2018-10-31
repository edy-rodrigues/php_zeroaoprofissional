<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Facebook</title>
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/main.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <?php include_once 'pages/nav.php'; ?>
    <?php $this->loadViewInTemplate($viewName, $viewData); ?>

    <script src="<?php echo BASE_URL; ?>assets/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/bootstrap.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/main.js"></script>

<?php include_once 'pages/footer.php'; ?>