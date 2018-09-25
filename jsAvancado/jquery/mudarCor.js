(function($) {
    $.fn.mudarCor = function(cor) {
        this.each(function() {
            $(this).css({'color': cor, 'text-decoration': 'none'});
            $(this).hover(function() {
                $(this).css('background-color', '#FF0000')
            }, function() {
                $(this).css('background-color', '#FFF')
            })
        })
        return this;
    }
}(jQuery))