<div class="container-fluid">
    <h1>Usuário</h1>
    <button class="btn btn-info my-3" id="btn-add">Adicionar Usuário</button>
    <table class="table table-striped table-responsive table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Senha</th>
                <th colspan="2">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($list as $user): ?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['nome']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><?php echo $user['senha']; ?></td>
                <td><a href="" class="btn btn-info btn-editar" data-id="<?php echo $user['id']; ?>">Editar</a></td>
                <td><a href="" class="btn btn-danger btn-excluir" data-id="<?php echo $user['id']; ?>">Excluir</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div id="modal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form class="modal-content" id="form-modal" name="form-modal">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                </div>
                <div class="modal-footer">
                    
                </div>
            </form>
        </div>
    </div>
</div>