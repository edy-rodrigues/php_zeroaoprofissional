const BASE_URL = "http://phpzeroaoprofissional.pc:8080/phpSuperAvancado/projetoModal/"

class Usuario {
    editar(element, e) {
        e.preventDefault()
        let id = element.data("id")
        let modal = $("#modal")
        let self = this;
        
        $.ajax({
            url: BASE_URL + "ajax/getOneUser",
            type: "POST",
            dataType: "JSON",
            data: {id: id},
            beforeSend: function() {
                modal.find(".modal-body").text("Carregando...")
                modal.modal("show")
            },
            success: function(json) {
                modal.find(".modal-title").text("Alterando dados de login");
                let html = `<div class="form-group">
                                <label for="txt-nome">Nome:</label>
                                <input type="text" id="txt-nome" class="form-control" name="txt-nome" value="${json.nome}">
                            </div>
                            <div class="form-group">
                                <label for="txt-email">E-mail:</label>
                                <input type="text" id="txt-email" class="form-control" name="txt-email" value="${json.email}">
                            </div>
                            <div class="form-group">
                                <label for="txt-senha">Senha:</label>
                                <input type="password" id="txt-senha" class="form-control" name="txt-senha" value="${json.senha}">
                            </div>`
                            
                modal.find(".modal-body").html(html)

                html = `<input type="button" class="btn btn-secondary form-control" data-dismiss="modal" value="Fechar">
                        <input type="submit" class="btn btn-primary form-control" value="Salvar">`;
                modal.find(".modal-footer").html(html)
                modal.modal("show")

                $("#form-modal").on("submit", function(e) {
                    self.salvar(e, id, this)
                })
            },
            error: function() {
                modal.find(".modal-body").text("Não foi possível buscar este usuário")
                modal.modal("show")
            }
        })
    }

    salvar(e, id, element) {
        e.preventDefault();
        
        let modal = $("#modal")
        let data = $(element).serialize() + "&id="+id

        $.ajax({
            url: BASE_URL + "ajax/updateUser",
            dataType: "JSON",
            type: "POST",
            data: data,
            success: function() {
                $(window.document.location).attr('href', BASE_URL);
            },
            error: function() {
                modal.find(".modal-body").text("Não foi possível realizar está modificação")
                setTimeout(() => {
                    modal.modal("hide")
                }, 3000)
            }
        })
    }

    excluir(id) {
        $.ajax({
            url: BASE_URL + "ajax/deleteUser",
            dataType: "JSON",
            type: "POST",
            data: {id: id},
            success: function() {
                $(window.document.location).attr('href', BASE_URL);
            },
            error: function() {
                modal.find(".modal-body").text("Não foi possível realizar a exclusão!")
                setTimeout(() => {
                    modal.modal("hide")
                }, 3000)
            }
        })
    }

    add(data) {
        $.ajax({
            url: BASE_URL + "ajax/addUser",
            dataType: "JSON",
            type: "POST",
            data: data,
            success: function () {
                $(window.document.location).attr('href', BASE_URL);
            }, error: function() {
                modal.find(".modal-body").text("Não foi possível realizar a adição!")
                setTimeout(() => {
                    modal.modal("hide")
                }, 3000)
            }
        })
    }
}

const usuario = new Usuario

$(".btn-editar").on("click", function(e) {
    usuario.editar($(this), e)
})

$(".btn-excluir").on("click", function(e) {
    e.preventDefault()
    let modal = $("#modal")
    let id = $(this).data("id")
    console.log(id)
    modal.find(".modal-title").text("Confirmando ação:")
    modal.find(".modal-body").html("Tem certeza que deseja excluir?");
    let html = `<input type="button" class="btn btn-secondary form-control"         data-dismiss="modal" value="Cancelar">
            <input type="submit" class="btn btn-primary form-control" id="btn-excluir" value="Excluir">`;
    modal.find(".modal-footer").html(html);
    $("#btn-excluir").on("click", function(e) {
        e.preventDefault()
        usuario.excluir(id)
    })
    modal.modal("show")
})

$("#btn-add").on("click", function() {
    let modal = $("#modal")
    modal.find(".modal-title").text("Adicionar Usuário")
    let html = `<div class="form-group">
                    <label for="txt-nome">Nome:</label>
                    <input type="text" name="txt-nome" id="txt-nome" class="form-control">
                </div>
                <div class="form-group">
                    <label for="txt-email">E-mail:</label>
                    <input type="text" name="txt-email" id="txt-email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="txt-senha">Senha:</label>
                    <input type="password" name="txt-senha" id="txt-senha" class="form-control">
                </div>`
    modal.find(".modal-body").html(html)
    html = `<input type="button" class="btn btn-secondary form-control"         data-dismiss="modal" value="Cancelar">
            <input type="submit" class="btn btn-primary form-control" id="btn-adicionar" value="Adicionar">`
    modal.find(".modal-footer").html(html)
    $("#btn-adicionar").on("click", function(e) {
        e.preventDefault()
        let data = $("#form-modal").serialize()
        console.log(data)
        usuario.add(data)
    })
    modal.modal("show")
})