console.log("JAVASCRIPT = TRUE")

$(function() {
    $("input[type='submit']").on("click", function(e) {
        e.preventDefault()

        var form = $("form")
        var data = new FormData(form[0])

        $.ajax({
            type: 'POST',
            url: 'http://phpzeroaoprofissional.pc:8080/phpSuperAvancado/projetoAjaxMvc/ajax',
            data: data,
            contentType: false,
            processData: false,
            success: function(res) {
                $(".borda").html(res)
            },
            error: function(res) {
                console.log(res)
            }
        })
    })
})