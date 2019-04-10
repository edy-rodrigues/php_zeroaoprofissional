<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/img/icon_favicon.png" sizes="196x196" />
    <title>Facebook</title>
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/default.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/main.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg text-light">
        <div class="container d-flex flex-row justify-content-between">
            <a class="navbar-brand text-light" href="<?php echo BASE_URL; ?>">Facebook</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <form class="form-inline" method="post">
                <input class="form-control form-control-sm" placeholder="Email" type="email" name="email" aria-label="Email">
                <input class="form-control form-control-sm m-2" placeholder="Senha" type="password" name="pass" aria-label="Senha">
                <button type="submit" class="btn btn-primary btn-sm">Entrar</button>
                <?php if(count($error) > 0 && !empty($error['login'])): ?>
                <small class="text-warning text-form"><?php echo $error['login']; ?></small>
                <?php endif; ?>
            </form>
        </div>
    </nav>
    <div class="container my-4 d-flex flex-row">
        <div class="flex-1">
            <h3>Login Recentes</h3>
            <form>
            <div class="alert alert-info my-4 w-75" role="alert">
                <span>Em desenvolvimento</span>
            </div>
            </form>
        </div>
        <div class="flex-1">
            <h3>Criar uma nova conta</h3>
            <h6>É gratuito e sempre será.</h6>
            <form action="<?php echo BASE_URL; ?>login/sign_in" method="post">
                <div class="form-group">
                    <input class="form-control" placeholder="Nome" type="text" name="name" aria-label="Nome">
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Email" type="text" name="email" aria-label="Email">
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Senha" type="password" name="pass" aria-label="Senha">
                </div>
                <h6>Data de Nascimento</h6>
                <div class="form-group d-flex flex-row">
                    <select class="form-control" name="day-birthday">
                        <?php for($i = 1; $i <= 31; $i++): ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php endfor; ?>
                    </select>
                    <select class="form-control mx-2" name="month-birthday">
                        <?php for($i = 1; $i <= 12; $i++): ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php endfor; ?>
                    </select>
                    <select class="form-control" name="year-birthday">
                        <?php for($i = 2000; $i > 1900; $i--): ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="form-check form-check-inline ml-3">
                    <input class="form-check-input" type="radio" value="0" name="gender" id="chk-gender-female">
                    <label class="form-check-label" for="chk-gender-female">
                        Feminino
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" value="1" name="gender" id="chk-gender-male">
                    <label class="form-check-label" for="chk-gender-male">
                        Masculino
                    </label>
                </div>
                <small class="form-text text-muted">Ao clicar em Inscreva-se, você concorda com nossos Termos, Política de Dados e Política de Cookies. Você pode receber notificações por SMS e pode cancelar isso quando quiser.</small>
                <button type="submit" class="btn btn-success mt-4">Inscreva-se</button>
            </form>
        </div>
    </div>
</div>

    <script src="<?php echo BASE_URL; ?>assets/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/bootstrap.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/main.js"></script>
</body>
</html>