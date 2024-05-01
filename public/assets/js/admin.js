(function ($) {
    
    $(".alert").delay(4000).slideUp(200, function() {
        $(this).alert('close');
    });
    $('#userDropdown').on('click', function () {
        if ($(this).parent().find('.dropdown-menu').hasClass('show')) {
            $(this).parent().find('.dropdown-menu').removeClass('show');
        } else {
            $(this).parent().find('.dropdown-menu').addClass('show');
        }
    })

})(jQuery);