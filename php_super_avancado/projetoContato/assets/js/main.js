$(function() {
    $("[data-action='open-modal']").on("click", function(e) {
        e.preventDefault()
        let modal = $("#modal")
        modal.fadeIn("slow")
        let link = $(this).attr("href")
        $.ajax({
            url: link,
            type: 'GET',
            success: function(html) {
                modal.children().html(html)
            },
            error: function(e) {

            }
        })
    })
})