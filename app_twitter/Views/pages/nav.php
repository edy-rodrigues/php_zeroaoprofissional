<nav>
    <div class="nav-wrapper light-blue">
        <a href="<?php echo BASE_URL; ?>" class="brand-logo d-flex align-center flex-1"><img src="<?php echo BASE_URL; ?>assets/img/logo.png" alt="Logo do Twiiter"><span class="flex-1">Twitter</span></a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <li><a href="<?php echo BASE_URL; ?>user/perfil"><i class="material-icons right">person</i><?php echo !empty($name) ? ucfirst($name) : ''; ?></a></li>
            <li><a href="<?php echo BASE_URL; ?>login/logout"><i class="material-icons right">exit_to_app</i>Sair</a></li>
        </ul>
    </div>
</nav>
<ul class="sidenav" id="mobile-demo">
    <li><a href="<?php echo BASE_URL; ?>login/logout">Sair</a></li>
</ul>