$(function() {

    $("input[name='txt-search']").on("keyup", function() {
        var text = $(this).val()

        $.ajax({
            type: 'POST',
            url: 'busca.php',
            dataType: 'JSON',
            data: {text: text},
            success: function(json) {
                var html = ""
                for(var i in json) {
                    html += "<li>ID: "+ json[i].id +", NOME: "+ json[i].nome +"</li>"
                }
                $("#result").html(html)
            }, error(msg) {
                console.log("Nenhum usuário foi encontrado")
            }
        })
    })

})