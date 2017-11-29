(function($) {

    $(document).ready(function() {
        $('.button-collapse').sideNav();

        setTimeout(function() {
            $('input:-webkit-autofill').each(function(){
                if ($(this).val().length !== "") {
                    $(this).siblings('label').addClass('active');
                }
            });
        }, 0);
    });

}(jQuery));
