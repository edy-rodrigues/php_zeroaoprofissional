$(function() {

    $("#form").on("submit", function(e) {
        e.preventDefault()

        var data = new FormData($(this)[0])

        $.ajax({
            type: 'POST',
            url: 'login.php',
            data: data,
            contentType: false,
            processData: false,
            success: function(msg) {
                alert(msg)
            }, error: function(msg) {
                alert(msg)
            }
        })
    })

})