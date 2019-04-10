$(function() {

    // $("#form").on("submit", (e) => {
    //     e.preventDefault()

    //     // FORM DATA
    //     var form = $("#form")[0]
    //     var data = new FormData(form)

    //     $.ajax({
    //         type: 'POST',
    //         url: 'uploadFile.php',
    //         data: data,
    //         contentType: false,
    //         processData: false,
    //         success: function(msg) {
    //             alert(msg)
    //         }, error: function(msg) {
    //             alert(msg)
    //         }
    //     })
    // })

    $("button").on("click", function() {
        var data = new FormData()

        var file = $("input[name='file']")[0].files;
        var nome = $("input[name='txt-nome']").val();

        if(file.length > 0) {

            data.append('txt-nome', nome)
            data.append('file', file[0])

            $.ajax({
                type: 'POST',
                url: 'uploadFile.php',
                data: data,
                contentType: false,
                processData: false,
                success: function(msg) {
                    alert(msg)
                }, error: function(msg) {
                    alert(msg)
                }
            })
        }

    })

})