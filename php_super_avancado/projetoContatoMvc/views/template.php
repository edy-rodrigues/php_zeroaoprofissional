<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projeto Contato MVC</title>
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/main.css">
</head>
<body>

    <header>
        <h1>Meu sistema de Contatos</h1>
    </header>
    
    <section>
        <?php $this->loadViewInTemplate($viewName, $viewData); ?>
    </section>

    <footer>
        Todos os direitos reservados
    </footer>
    <script src="<?php echo BASE_URL; ?>assets/js/main.js"></script>
</body>
</html>