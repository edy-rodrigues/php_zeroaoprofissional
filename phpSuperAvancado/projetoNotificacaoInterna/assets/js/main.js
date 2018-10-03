console.log("JAVASCRIPT = TRUE")

function verificarNotificacao() {

    $.ajax({
        url: 'http://phpzeroaoprofissional.pc:8080/phpSuperAvancado/projetoNotificacaoInterna/home/verificaNotificacao',
        type: 'POST',
        dataType: 'JSON',
        success: function(json) {
            if(json.qtde_notificacao > 0) {
                $(".notificacoes").addClass("temNotif").text(json.qtde_notificacao)
            } else {
                $(".notificacoes").removeClass("temNotif").text(0)
            }
        }
    })

}

$(function() {
    setInterval(verificarNotificacao, 2000)
    verificarNotificacao()

    $(".notificacoes").on("click", function() {
        $.ajax({
            url: "http://phpzeroaoprofissional.pc:8080/phpSuperAvancado/projetoNotificacaoInterna/home/showNotificacao",
            type: 'POST',
            dataType: 'JSON',
            success: function(json) {
                console.log(`Mostrando Notificação ${"teste"}`)
            }
        })
    })

    $("#add-notif").on("click", function() {
        $.ajax({
            url: "http://phpzeroaoprofissional.pc:8080/phpSuperAvancado/projetoNotificacaoInterna/home/addNotificacao"
        })
    })
})