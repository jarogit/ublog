(function ($) {

    $(document).ready(function() {
        $('.easyadmin.new-post #post_title, .easyadmin.edit-post #post_title').change(function() {
            var $title = $(this);
            var $slug = $('#post_slug');
            if($.trim($slug.val()) == '') {
                $slug.val($.trim($title.val()).toLowerCase().replace(/\W/g,"-"));
            }
        })
    });

}( jQuery ));
