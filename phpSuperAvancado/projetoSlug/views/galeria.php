<h2>Galeria</h2>
<br>
<ul>
    <?php foreach($list as $l): ?>
    <li><a href="<?php echo BASE_URL; ?>galeria/abrir/<?php echo $l['slug'] ?>"><?php echo $l['titulo']; ?></a></li>
    <?php endforeach; ?>
</ul>