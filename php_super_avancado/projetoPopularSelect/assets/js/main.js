console.log("JAVASCRIPT = TRUE")

const BASE_URL = "http://phpzeroaoprofissional.pc:8080/phpSuperAvancado/projetoPopularSelect/";

$(function() {
    $("#select-modulo").on("change", function() {
        let item = $(this).val()
        
        $.ajax({
            url: BASE_URL+"home/pegarAulas",
            type: 'POST',
            data: {modulo: item},
            dataType: 'JSON',
            success: function(json) {
                let html = ""

                for(var i in json) {
                    html += '<option value="'+ json[i].id +'">'+ json[i].titulo +'</option>'
                }

                $("#select-aula").html(html)
            },
            error: function() {
                console.log("erro");
            }
        })
    })
})