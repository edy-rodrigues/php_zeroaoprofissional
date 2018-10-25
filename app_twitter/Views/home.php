<div class="container d-flex">
    <aside class="flex-1 m-1">
        <div class="p-1">
            <h5 class="m-auto">Relacionamentos</h5>
            <div class="d-flex justify-content-around mt-1">
                <span><?php echo $qt_followed; ?> Seguidores</span><span><?php echo $qt_following; ?> Seguindo</span>
            </div>
        </div>
        <hr>
        <div class="p-1">
            <h5 class="m-auto">Sugestões de Amigos</h5>
            <div class="d-flex column mt-1">
                <?php if(count($user_suggestion) > 0): ?>
                <?php foreach($user_suggestion as $user): ?>
                <div class="d-flex justify-content-around align-center p-1">
                    <span><?php echo ucfirst($user['name']); ?></span><a class="btn light-blue waves-effect" href="<?php echo BASE_URL ?>user/follow/<?php echo $user['id']; ?>"><i class="material-icons right">person_add</i>Seguir</a>
                </div>
                <?php endforeach; ?>
                <?php else: ?>
                <strong>Não há nehuma susgetão!</strong>
                <?php endif; ?>
            </div>
        </div>
    </aside>
    <main class="flex-3 m-1">
        ...
    </main>
</div>