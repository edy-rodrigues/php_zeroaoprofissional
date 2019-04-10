<a href="<?php echo BASE_URL; ?>contato/add" class="btn my">Adicionar Contato</a>
<table width="100%">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th colspan="2">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($lista as $c): ?>
        <tr>
            <td><?php echo $c['id']; ?></td>
            <td><?php echo $c['nome']; ?></td>
            <td><?php echo $c['email']; ?></td>
            <td><a href="<?php echo BASE_URL; ?>contato/edit/<?php echo $c['id']; ?>" class="btn">Editar</a></td>
            <td><a href="<?php echo BASE_URL; ?>contato/delete/<?php echo $c['id']; ?>" class="btn btn-red">Excluir</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>