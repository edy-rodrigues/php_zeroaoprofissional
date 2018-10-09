<h1>Projeto Paginação em MVC</h1>
<hr>
<table>
    <thead>
        <tr>
            <td>ID</td>
            <td>Titulo</td>
        </tr>
    </thead>
<?php foreach($list as $p): ?>
<tbody>
    <tr>
        <td><?php echo $p['id']; ?></td>
        <td><?php echo $p['titulo']; ?></td>
    </tr>
</tbody>
<?php endforeach; ?>
</table>
<hr>
<?php for($i = 1; $i <= $totalPages; $i++): ?>
    <?php if($paginaAtual == $i): ?>
        <a href="<?php echo BASE_URL; ?>?p=<?php echo $i ?>" style="color: darkcyan"><strong><?php echo $i ?></strong></a>
    <?php else: ?>
        <a href="<?php echo BASE_URL; ?>?p=<?php echo $i ?>"><?php echo $i ?></a>
    <?php endif; ?>
<?php endfor; ?>